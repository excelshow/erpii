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

    //查询客户
    public function phone(){
        $mobile = str_enhtml($this->input->post('mobile',TRUE));
        $user = $this->session->userdata('jxcsys');
        $res = [];
        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'mobile'=>$mobile);

        $data =  $this->db->where($where)->get('ci_customer')->row();
        $where_vip = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'status'=>0,'user_id'=>$data->id);
        $data_vip =  $this->db->where($where_vip)->get('ci_vipcard')->row();
        if($data_vip->time <time()){
            $edit = $this->db->update('ci_vipcard',array('status'=>2),array('id'=>$data_vip->id));
        }else{
            $edit = null;
        }
        if($data){
            $res['code'] = 0;
            $res['text'] = $data;
            if($edit){
                $res['vipId'] = 0;
            }else{
                $res['vipId'] = $data_vip;
            }
            die(json_encode($res));
        }else{
            $res['code'] = 2;
            $res['text'] = '';
            $res['vipId'] = 0;
            die(json_encode($res));
        }

    }

    //查询车辆信息
    public function car(){
        $user = $this->session->userdata('jxcsys');
        $car_number = str_enhtml($this->input->post('car_number',TRUE));
        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'plateNo'=>$car_number);
        $data =  $this->db->where($where)->get('ci_car')->row();
        die(json_encode($data));
    }

    //生成订单
    public function start(){
        $user = $this->session->userdata('jxcsys');
        $res =[];
        if ($user['orgWhere'] != 'lowId='.$user['lowId']){
            $res['code'] = 1;
            $res['text'] = "您尚未在组织中，添加失败！";
            die(json_encode($res));
        }

//        die(json_encode($a));
        $image = $_FILES;
        $number = $this->input->post('number');
        if($image){
            $t0 = 0;$t1 = 0;$t2 = 0;$t3 = 0;$t4 = 0;$t5 = 0;$t6 = 0;$t7 = 0;$t8 = 0;
            $img = [];
            foreach ($image as $k=>$v){

                $dir = iconv("UTF-8", "GBK", "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7));
                if (!file_exists($dir)){
                    mkdir ($dir,0777,true);
                }
                $strs="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
                $name = substr(str_shuffle($strs),mt_rand(0,strlen($strs)-33),32);
                move_uploaded_file($v['tmp_name'],iconv("utf-8","gb2312","image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg'));
//
                if(substr($k,0,7) == 'li0_img'){
                    $img['li0_img'][$t0] = "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg';
                    $t0 ++;
                }elseif (substr($k,0,7) == 'li1_img'){
                    $img['li1_img'][$t1] = "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg';
                    $t1 ++;
                }elseif (substr($k,0,7) == 'li2_img'){
                    $img['li2_img'][$t2] = "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg';
                    $t2 ++;
                }elseif (substr($k,0,7) == 'li3_img'){
                    $img['li3_img'][$t3] = "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg';
                    $t3 ++;
                }elseif (substr($k,0,7) == 'li4_img'){
                    $img['li4_img'][$t4] = "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg';
                    $t4 ++;
                }elseif (substr($k,0,7) == 'li5_img'){
                    $img['li5_img'][$t5] = "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg';
                    $t5 ++;
                }elseif (substr($k,0,7) == 'li6_img'){
                    $img['li6_img'][$t6] = "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg';
                    $t6 ++;
                }elseif (substr($k,0,7) == 'li7_img'){
                    $img['li7_img'][$t7] = "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg';
                    $t7 ++;
                }elseif (substr($k,0,7) == 'li8_img'){
                    $img['li8_img'][$t8] = "image/".$user['lowId'].'-'.$user['orgName'].'/'.$number.'/'.substr($k,0,7).'/'.$name.'.jpg';
                    $t8 ++;
                }
            }

        }

        $add = array(
            'userId'=>$this->input->post('userId'),
            'describe'=>$this->input->post('describe'),
            'advice'=>$this->input->post('advice'),
            'report'=>$this->input->post('report'),
            'request'=>$this->input->post('request'),
            'remarks'=>$this->input->post('remarks'),
            'name'=>$this->input->post('name'),
            'phone'=>$this->input->post('phone'),
            'number'=>$this->input->post('number'),
            'songCarRen'=>$this->input->post('songCarRen'),
            'songCarRenPhone'=>$this->input->post('songCarRenPhone'),
            'service'=>$this->input->post('service'),
            'startTime'=>$this->input->post('startTime'),
            'estimateTime'=>$this->input->post('estimateTime'),
            'endTime'=>$this->input->post('endTime'),
            'brand'=>$this->input->post('brand'),
            'insureCompany'=>$this->input->post('insureCompany'),
            'system'=>$this->input->post('system'),
            'insuranceEndTime'=>$this->input->post('insuranceEndTime'),
            'shape'=>$this->input->post('shape'),
            'carShape'=>$this->input->post('carShape'),
            'engineNumber'=>$this->input->post('engineNumber'),
            'suggestedMaintenance'=>$this->input->post('suggestedMaintenance'),
            'carColor'=>$this->input->post('carColor'),
            'natureUsage'=>$this->input->post('natureUsage'),
            'frontWheelType'=>$this->input->post('frontWheelType'),
            'backWheelType'=>$this->input->post('backWheelType'),
            'carType'=>$this->input->post('carType'),
            'transmission'=>$this->input->post('transmission'),
            'displacement'=>$this->input->post('displacement'),
            'oilVolume'=>$this->input->post('oilVolume'),
            'wechat'=>$this->input->post('wechat'),
            'invoice'=>$this->input->post('invoice'),
            'VIPNumber'=>$this->input->post('VIPNumber'),
            'actual_total'=>$this->input->post('actual_total'),
            'service_total'=>$this->input->post('service_total'),
            'good_total'=>$this->input->post('good_total'),
            'schedule'=>1,
            'topId'=>$user['topId'],
            'midId'=>$user['midId'],
            'lowId'=>$user['lowId'],
            'checks'=>$this->input->post('checks'),
            'image'=>json_encode($img),
            'service_item'=>json_encode($this->input->post('service_item')),
            'vip_item'=>json_encode($this->input->post('vip_item')),
        );

        $billing = $this->db->insert('ci_billing',$add);
        if($billing){
            $res['code'] = 0;
            $res['text'] = "服务单已提交客户确认，请确认后开始施工。";
            die(json_encode($res));
        }else{
            $res['code'] = 1;
            $res['text'] = "服务单生成失败。";
            die(json_encode($res));
        }

    }

    //查询服务内容
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

    //VIP套餐查询显示
    public function meal(){
        $userId = str_enhtml($this->input->post('userId',TRUE));
        $user = $this->session->userdata('jxcsys');
        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'status'=>0,'user_id'=>$userId);
        $data = $this->db->where($where)->get('ci_vipcard')->row();

        die(json_encode($data));
    }

//    服务单列表
    public function billinglist(){
        $user = $this->session->userdata('jxcsys');

            $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));
            $data = $this->db->where($where)->get('ci_billing')->result();

        $this->load->view('/settings/pick_up_car_list',['data'=>$data]);
    }

    //    服务单详情
    public function billingdetail(){
        $user = $this->session->userdata('jxcsys');
        $id = $this->input->get('id');
        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'id'=>$id);
        $data = $this->db->where($where)->get('ci_billing')->row();
//var_dump($data);
        $this->load->view('/settings/pick_up_car_edit',['data'=>$data]);
    }
}