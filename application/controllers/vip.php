<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Vip extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->common_model->checkpurview(303);
    }

//    VIP卡列表
    public function index(){
        $user = $this->session->userdata('jxcsys');

        if($user['orgWhere'] == 'lowId='.$user['lowId']){
            $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));
            $orgids = array($user['lowId'], $user['midId']);
            $data = $this->db->where($where)->where_in('orgid',$orgids)->get('ci_vipcard')->result();
        }else{
            $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));
            $data = $this->db->where($where)->get('ci_vipcard')->result();
        }

        foreach ($data as $k=>$v){

            $data[$k]->content = json_decode($v->content);

            if ($v->time != 0 && $v->time<time() && $v->status == 0){
                $this->db->update('ci_vipcard',array('status'=>2),array('id'=>$v->id));
                $data[$k]->status = 2 ;
            }
        }

        $this->load->view('/settings/vip_card',['data'=>$data]);
    }

    //    VIP卡添加页面
    public function add(){

        $user = $this->session->userdata('jxcsys');

        if ($user['orgWhere'] != 'lowId='.$user['lowId']){
            die("您尚未在组织中，添加失败！");
        }

        $org = $this->db->where('parentId',$user['midId'])->get('ci_org')->result();

        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));
        $meal = $this->db->where($where)->get('ci_meal')->result();

        $arr = '';

        foreach ($meal as $k=>$v){

            foreach (json_decode($v->content) as $key=>$value){
                $arr .= $value->name.':'.$value->number.'次'.';    ';
            }
            $meal[$k]->content = $arr;
            $arr = '';
        }

        $this->load->view('/settings/vip_card_add',['meal'=>$meal,'org'=>$org,'orgid'=>$user['midId']]);
    }

    //    执行VIP卡添加页面
    public function doadd(){
        $data = str_enhtml($this->input->post(NULL,TRUE));
        $user = $this->session->userdata('jxcsys');
        $total = [];
        $t = 0 ;

        foreach ($data['data'] as $k=>$v){
           $meal = $this->db->where('id',$v['id'])->get('ci_meal')->row();
            $total[$t]['id'] = $meal->id;
            $total[$t]['name'] = $meal->name;
            $total[$t]['price'] = $meal->price;
            $total[$t]['content'] = $meal->content;
            $t++;
        }

        if($data['time'] == 0){
            $time = 0;
        }else{
            $time = strtotime("+".$data['time']." months",time());
        }

        $add =array(
            'name'=>$data['name'],
            'price'=>$data['price'],
            'time'=> $time,
            'number'=>$data['number'],
            'status'=>$data['status'],
            'orgid'=>$data['orgid'],
            'orgname'=>$data['orgname'],
            'username' =>$data['username'],
            'phone' =>$data['phone'],
            'wechat' =>$data['wechat'],
            'content'=>json_encode($total),
            'topId'=>$user['topId'],
            'midId'=>$user['midId'],
            'lowId'=>$user['lowId'],
        );
        $vipcard_res = $this->db->insert('ci_vipcard',$add);
        if($vipcard_res){
            $res['code'] = 0;
            $res['text'] = "添加成功";
            die(json_encode($res));
        }else{
            $res['code'] = 1;
            $res['text'] = "添加失败";
            die(json_encode($res));
        }

    }

    //VIP卡修改页面
    public function edit(){
        $id = str_enhtml($this->input->get('id',TRUE));
        $data = $this->db->where(['id'=>$id])->get('ci_vipcard')->row();

        $user = $this->session->userdata('jxcsys');

        $org = $this->db->where('parentId',$user['midId'])->get('ci_org')->result();

        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));
        $meal = $this->db->where($where)->get('ci_meal')->result();
        $arr = '';

        foreach ($meal as $k=>$v){

            foreach (json_decode($v->content) as $key=>$value){
                $arr .= $value->name.':'.$value->number.'次'.';    ';
            }
            $meal[$k]->content = $arr;
            $arr = '';
        }
        $this->load->view('/settings/vip_card_add',['meal'=>$meal,'data'=>$data,'org'=>$org,'orgid'=>$user['midId']]);
    }


    //执行修改操作
    public function doedit(){
        $data = str_enhtml($this->input->post(NULL,TRUE));
        $total = [];
        $t = 0 ;
        foreach ($data['data'] as $k=>$v){
            $meal = $this->db->where('id',$v['id'])->get('ci_meal')->row();
            $total[$t]['id'] = $meal->id;
            $total[$t]['name'] = $meal->name;
            $total[$t]['price'] = $meal->price;
            $total[$t]['content'] = $meal->content;
            $t++;
        }
        $edit = $this->db->update('ci_vipcard',array('status'=>$data['status'],'username'=>$data['username'],'phone'=>$data['phone'], 'content'=>json_encode($total),'wechat'=>$data['wechat']),array('id'=>$data['id']));
        if($edit){
            $res['code'] = 0;
            $res['text'] = "修改成功";
            die(json_encode($res));
        }else{
            $res['code'] = 1;
            $res['text'] = "修改失败";
            die(json_encode($res));
        }

    }


    public function phone(){
        $user = $this->session->userdata('jxcsys');
        $mobile = str_enhtml($this->input->post('mobile',TRUE));
        $res =[];
        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'mobile'=>$mobile);
        $data = $this->db->where($where)->get('ci_customer')->row();
        $vip = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'status'=>0,'user_id'=>$data->id);
        $vip_data =  $this->db->where($vip)->get('ci_vipcard')->row();
        if($vip_data){
            $res['code'] = 1;
            $res['text'] = "此账号已有正在使用的VIP卡，请先停用再创建新的。";
            die(json_encode($res));
        }elseif($data){
            $res['code'] = 0;
            $res['text'] = $data;
            die(json_encode($res));

        }else{
            $res['code'] = 2;
            $res['text'] = '';
            die(json_encode($res));
        }

    }
}