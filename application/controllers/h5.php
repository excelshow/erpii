<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class h5 extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    /**
     * 登录
     */
	public function login(){
        $this->load->view('/h5/login');
    }

    /**
     * 接车员首页
     */
    public function index_pick_up_car(){
        $this->load->view('/h5/index_pick_up_car');
    }

    /**
     * 施工员首页
     */
    public function index_construction(){
        $this->load->view('/h5/index_construction');
    }

    /**
     * 搜索客户
     */
    public function customer(){
        $this->load->view('/h5/customer');
    }

    /**
     * 客户列表
     */
    public function customer_list(){
        $this->load->view('/h5/customer_list');
    }

    /**
     * 客户列表
     */
    public function sever_history(){
        $this->load->view('/h5/sever_history');
    }

    /**
     * 新建服务记录简单版
     */
    public function sever_simple_add(){
        $this->load->view('/h5/sever_simple_add');
    }

    /**
     * 新建服务记录详细版
     */
    public function sever_deailed_add(){
        $this->load->view('/h5/sever_deailed_add');
    }

    /**
     * 施工任务列表
     */
    public function task_list(){
        $this->load->view('/h5/task_list');
    }

    /**
     * 客户详情
     */
    public function customer_detail(){
        $this->load->view('/h5/customer_detail');
    }

    /**
     * 编辑客户基本资料
     */
    public function customer_edit_base(){
        $this->load->view('/h5/customer_edit_base');
    }

    /**
     * 编辑客户开票
     */
    public function customer_edit_invoice(){
        $this->load->view('/h5/customer_edit_invoice');
    }

    /**
     * 编辑客户开票
     */
    public function customer_edit_car(){
        $this->load->view('/h5/customer_edit_car');
    }

}
