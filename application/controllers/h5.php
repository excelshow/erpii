<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class h5 extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->jxcsys = $this->session->userdata('jxcsys');
    }

    public function checkpurview($id=0) {
        !$this->jxcsys && redirect('h5/login');
        if ($id>0) {
            $data = $this->get_admin();
//		var_dump($id);
            if (count($data)>0) {
                if ($data['roleid']==0) return true;
                if (in_array($id,explode(',',$data['lever']))) return true;
            }
            //str_alert(-1,'对不起，您没有此页面的管理权');
            die('对不起，您没有此页面的管理权');//add by michen 20171101 for 权限不足提示乱码
        }
    }

    /**
     * 登录
     */
	public function login(){
        $data = str_enhtml($this->input->post(NULL,TRUE));
        if (is_array($data)&&count($data)>0) {
            !token(1) && die(json_encode(['code'=>5,'msg'=>'token验证失败']));
            strlen($data['username']) < 1 && die(json_encode(['code'=>1,'msg'=>'用户名不能为空']));
            strlen($data['userpwd']) < 1  && die(json_encode(['code'=>2,'msg'=>'密码不能为空']));
            $user = $this->data_model->get_admin('(a.username="'.$data['username'].'") or (a.mobile="'.$data['username'].'") ');//add for more
            //$user = $this->mysql_model->get_rows('admin','(username="'.$data['username'].'") or (mobile="'.$data['username'].'") ');
            if (count($user)>0) {
                $user['status']!=1 && die('账号被锁定');
                if ($user['userpwd'] == md5($data['userpwd'])) {
                    $data['jxcsys']['uid']      = $user['uid'];
                    $data['jxcsys']['name']     = $user['name'];
                    $data['jxcsys']['roleid']   = $user['roleid'];
                    $data['jxcsys']['username'] = $user['username'];
                    $data['jxcsys']['login']    = 'jxc';
                    //add for more
                    $data['jxcsys']['topId'] = intval($user['topId']);//此处三个ID与用户表的注意区分
                    $data['jxcsys']['midId'] = intval($user['midId']);
                    $data['jxcsys']['lowId'] = intval($user['lowId']);
                    $data['jxcsys']['orgId'] = intval($user['orgId']);//没什么用，但却是唯一标识
                    $data['jxcsys']['orgLevel'] = intval($user['orgLevel']);
                    $data['jxcsys']['orgName'] = $user['orgName'];
                    $data['jxcsys']['orgWhere'] = $user['orgWhere'];
                    $data['jxcsys']['orgMidWhere'] = $user['orgMidWhere'];
                    //add for more
                    $this->session->set_userdata($data);
                    $this->common_model->logs('登陆成功 用户名：'.$data['username']);
                    die(json_encode(['code'=>4,'msg'=>'登陆成功 用户名：'.$data['username']]));
                }
            }
            die(json_encode(['code'=>3,'msg'=>'账号或密码错误']));
        } else {
            $this->load->view('/h5/login');
        }
    }

    /**
     * 退出登录
     */
    public function loginout(){
        $this->session->sess_destroy();
        redirect(site_url('h5/login'));
    }

    public function index(){
        $this->checkpurview();
        redirect('h5/index_pick_up_car');
    }

    /**
     * 接车员首页
     */
    public function index_pick_up_car(){
        $this->checkpurview();
        $this->load->view('/h5/index_pick_up_car');
    }

    /**
     * 施工员首页
     */
    public function index_construction(){
        $this->checkpurview();
        $this->load->view('/h5/index_construction');
    }

    /**
     * 搜索客户
     */
    public function customer(){
        $this->checkpurview();
        $this->load->view('/h5/customer');
    }

    /**
     * 客户列表
     */
    public function customer_list(){
        $this->checkpurview();
        $data = null;
        $data['count'] = 0;
        if ($this->input->get('keyword')){
            $user = $this->jxcsys;
            $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));
            $data['items'] = $this->db->where($where)->like('mobile',$this->input->get('keyword'))->get('ci_customer')->result();
            $data['count'] = count($data['items']);
            $data['keyword'] = $this->input->get('keyword');
        }
        $this->load->view('/h5/customer_list',['data'=>$data]);
    }

    /**
     * 服务历史
     */
    public function sever_history(){
        $this->checkpurview();
        $this->load->view('/h5/sever_history');
    }

    /**
     * 新建服务记录简单版
     */
    public function sever_simple_add(){
        $this->checkpurview();
        $this->load->view('/h5/sever_simple_add');
    }

    /**
     * 新建服务记录详细版
     */
    public function sever_deailed_add(){
        $this->checkpurview();
        $this->load->view('/h5/sever_deailed_add');
    }

    /**
     * 施工任务列表
     */
    public function task_list(){
        $this->checkpurview();
        $this->load->view('/h5/task_list');
    }

    /**
     * 客户详情
     */
    public function customer_detail(){
        $this->checkpurview();
        $id = $this->input->get('uid');
        $data = $this->db->where('id',$id)->get('ci_customer')->row();
        $cars = $this->db->where('user_id',$id)->get('ci_car')->result();
        $this->load->view('/h5/customer_detail',['data'=>$data,'id'=>$id,'cars'=>$cars]);
    }

    /**
     * 编辑客户基本资料
     */
    public function customer_edit_base(){
        $this->checkpurview();
        $this->load->view('/h5/customer_edit_base');
    }

    /**
     * 编辑客户开票
     */
    public function customer_edit_invoice(){
        $this->checkpurview();
        $this->load->view('/h5/customer_edit_invoice');
    }

    /**
     * 编辑客户开票
     */
    public function customer_edit_car(){
        $this->checkpurview();
        $this->load->view('/h5/customer_edit_car');
    }

    /**
     * 接车开单选择客户
     */
    public function customer_select(){
        $this->checkpurview();
        $this->load->view('/h5/customer_select');
    }

}
