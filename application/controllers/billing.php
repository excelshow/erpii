<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Billing extends CI_Controller {



    //开单页面
    public function index(){
        $user = $this->session->userdata('jxcsys');


        $this->load->view('/settings/pick_up_car');
    }


}