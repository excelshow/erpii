<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->common_model->checkpurview(302);
    }

    //开单页面
    public function index(){
        $user = $this->session->userdata('jxcsys');

        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));
        $goods = $this->db->where($where)->get('ci_goods')->result();
        $service = $this->db->where($where)->get('ci_service')->result();
        $where_serve = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'level'=>1);
        $one = $this->db->where($where_serve)->get('ci_serve')->result();
        $t = 0;
        $serve = [];
        foreach ($one as $k=>$v){
            $serve[$t]['id']= $v->id;
            $serve[$t]['name']= $v->name;
            $two = $this->db->where(['parentId'=>$v->id])->get('ci_serve')->result();
            $m = 0;
            foreach ($two as $key => $value){
                $serve[$t]['child'][$m]['id']= $value->id;
                $serve[$t]['child'][$m]['name']= $value->name;
                $three = $this->db->where(['parentId'=>$value->id])->get('ci_serve')->result();
                $n = 0;
                foreach ($three as $a=>$b){
                    $serve[$t]['child'][$m]['child'][$n]['id']= $b->id;
                    $serve[$t]['child'][$m]['child'][$n]['name']= $b->name;
                    $n ++;
                }
                $m ++;
            }
            $t ++;
        }

        $this->load->view('/settings/pick_up_car',['goods'=>$goods,'service'=>$service,'serve'=>$serve]);
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
        $user = $this->session->userdata('jxcsys');
        $res =[];
        if ($user['orgWhere'] != 'lowId='.$user['lowId']){
            $res['code'] = 1;
            $res['text'] = "您尚未在组织中，添加失败！";
            die(json_encode($res));
        }
        $image = $_FILES;
        $number = $this->input->post('number');
        $checks = $this->input->post('checks');
//        die(json_encode($checks));
        if($image){
            foreach ($image as $k=>$v){

                $dir = iconv("UTF-8", "GBK", "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7));
                if (!file_exists($dir)){
                    mkdir ($dir,0777,true);
                }
                $strs="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
                $name = substr(str_shuffle($strs),mt_rand(0,strlen($strs)-33),32);
                move_uploaded_file($v['tmp_name'],iconv("utf-8","gb2312","image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg'));

            }
        }

    }

    public function service(){
        $serve_id = str_enhtml($this->input->post('serve_id',TRUE));

        $serve = $this->db->where(['id'=>$serve_id])->get('ci_serve')->row();
        if($serve -> level == 3){
            $service = $this->db->where(['category_id'=>$serve_id])->get('ci_service')->result();
        }elseif ($serve -> level == 2){
            $service =[];
            $t = 0;
            $service_one = $this->db->where(['category_id'=>$serve_id])->get('ci_service')->result();
            foreach ($service_one as $k=>$v){
                $service[$t]['id'] = $v->id;
                $service[$t]['name'] = $v->name;
                $service[$t]['price'] = $v->price;
                $service[$t]['vip_price'] = $v->vip_price;
                $service[$t]['working'] = $v->working;
                $t++;
            }
            $one = $this->db->where(['parentId'=>$serve_id])->get('ci_serve')->result();

            foreach ($one as $key=>$val){
                $service_two = $this->db->where(['category_id'=>$val->id])->get('ci_service')->result();
                foreach ($service_two as $k=>$v){
                    $service[$t]['id'] = $v->id;
                    $service[$t]['name'] = $v->name;
                    $service[$t]['price'] = $v->price;
                    $service[$t]['vip_price'] = $v->vip_price;
                    $service[$t]['working'] = $v->working;
                    $t++;
                }
            }
        }elseif ($serve -> level == 1){
            $service =[];
            $t = 0;
            $service_one = $this->db->where(['category_id'=>$serve_id])->get('ci_service')->result();
            foreach ($service_one as $k=>$v){
                $service[$t]['id'] = $v->id;
                $service[$t]['name'] = $v->name;
                $service[$t]['price'] = $v->price;
                $service[$t]['vip_price'] = $v->vip_price;
                $service[$t]['working'] = $v->working;
                $t++;
            }
            $one = $this->db->where(['parentId'=>$serve_id])->get('ci_serve')->result();
            foreach ($one as $k1=>$v1){
                $service_two = $this->db->where(['category_id'=>$v1->id])->get('ci_service')->result();
                foreach ($service_two as $k2=>$v2){
                    $service[$t]['id'] = $v2->id;
                    $service[$t]['name'] = $v2->name;
                    $service[$t]['price'] = $v2->price;
                    $service[$t]['vip_price'] = $v2->vip_price;
                    $service[$t]['working'] = $v2->working;
                    $t++;
                }
                $two = $this->db->where(['parentId'=>$v1->id])->get('ci_serve')->result();
                foreach ($two as $k3=>$v3){
                    $service_two = $this->db->where(['category_id'=>$v3->id])->get('ci_service')->result();
                    foreach ($service_two as $k4=>$v4){
                        $service[$t]['id'] = $v4->id;
                        $service[$t]['name'] = $v4->name;
                        $service[$t]['price'] = $v4->price;
                        $service[$t]['vip_price'] = $v4->vip_price;
                        $service[$t]['working'] = $v4->working;
                        $t++;
                    }
                }
            }
        }
        die(json_encode($service));

    }

    public function meal(){
        $userId = str_enhtml($this->input->post('userId',TRUE));
        $user = $this->session->userdata('jxcsys');
        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));
        $data = $this->db->where($where)->get('ci_vipcard')->row();
//        $data['content'] = json_decode($data['content']);
        die(json_encode($data));
    }

}