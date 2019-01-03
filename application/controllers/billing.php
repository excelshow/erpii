<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Billing extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->common_model->checkpurview(302);
    }

    //开单页面
    public function index(){
        $user = $this->session->userdata('jxcsys');

//var_dump($user);
        $this->load->view('/settings/pick_up_car');
    }

    public function phone(){
        $mobile = str_enhtml($this->input->post('userPhone',TRUE));
        $user = $this->session->userdata('jxcsys');

        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'mobile'=>$mobile);

        $data =  $this->db->where($where)->get('ci_customer')->row();

        die(json_encode($data));
    }
}