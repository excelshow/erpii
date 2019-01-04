<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Qr extends CI_Controller {

//    public function __construct(){
//        parent::__construct();
//        $this->common_model->checkpurview(303);
//    }

//   门店二维码
    public function index(){
        $user = $this->session->userdata('jxcsys');

        $this->load->view('/settings/qr');
    }


}