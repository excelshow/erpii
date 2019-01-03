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
        $mobile = str_enhtml($this->input->post('mobile',TRUE));
        $user = $this->session->userdata('jxcsys');

        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'mobile'=>$mobile);

        $data =  $this->db->where($where)->get('ci_customer')->row();

        die(json_encode($data));
    }

    public function car(){
        $user = $this->session->userdata('jxcsys');
        $car_number = str_enhtml($this->input->post('car_number',TRUE));
        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'plateNo'=>$car_number);
        $data =  $this->db->where($where)->get('ci_car')->row();
        die(json_encode($data));
    }

    public function start(){
        $data = $this->input->post(NULL,TRUE);

        die(json_encode($data));


//        $this->get_image_byurl('https://wx1.sinaimg.cn/mw690/006OBeunly1fygh06e99nj31hc0u01ky.jpg');
//        die(json_encode($data));
        foreach ($data['li_img'] as $k=>$v){

//            file_put_contents($img, file_get_contents($url));
//            $this->get_image_byurl($v);

        }

    }


    function get_image_byurl($url, $filename="") {

        if ($url == "") { return false; }

        $ext = strrchr($url, ".");  //得到图片的扩展名

        if($ext != ".gif" && $ext != ".jpg" && $ext != ".bmp") { $ext = ".jpg"; }

        if($filename == "") { $filename = time() . $ext; }  //以时间另起名，在此可指定相对目录 ，未指定则表示同php脚本执行的当前目录

        //以流的形式保存图片

        $write_fd = @fopen($filename,"a");

        @fwrite($write_fd, $this->CurlGet($url));  //将采集来的远程数据写入本地文件

        @fclose($write_fd);

        return($filename);  //返回文件名

    }


//远程获取

    function CurlGet($url){

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);    // https请求 不验证证书和hosts
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

            curl_setopt($curl, CURLOPT_URL, $url);

            curl_setopt($curl, CURLOPT_HEADER, false);

            //curl_setopt($curl, CURLOPT_REFERER,$url);
            curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; SeaPort/1.2; Windows NT 5.1; SV1; InfoPath.2)");  //模拟浏览器访问

            curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');

            curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie.txt');

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);

            $values = curl_exec($curl);

            curl_close($curl);

            return($values);

    }


}