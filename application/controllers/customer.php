<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Customer extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->common_model->checkpurview(305);
    }

    //客户列表
    public function index() {
        $user = $this->session->userdata('jxcsys');
        $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));

        $data = $this->db->where($where)->get('ci_customer')->result();

        $this->load->view('/settings/customer',['data'=>$data]);

    }

    //客户添加
    public function add() {

        $data = str_enhtml($this->input->post(NULL,TRUE));
        $user = $this->session->userdata('jxcsys');
        $res = [];
        $org = $this->db->where('id',$user['orgId'])->get('ci_org')->result();

        $customer = array(
            'name'=>$data['name'],
            'sex'=>$data['gender'],
            'birthday'=>$data['birthday'],
            'mobile'=>$data['tel'],
            'resource'=>$data['source'],
            'address'=>$data['address'],
            'company'=>$data['company'],
            'service'=>$data['adviser'],
            'time'=>$data['record'],
            'org_name'=>$org[0]->name,
            'topId'=>$user['topId'],
            'midId'=>$user['midId'],
            'lowId'=>$user['lowId'],
        );

        $customer_res = $this->db->insert('ci_customer',$customer);
        $customer_id = $this->db->insert_id();
        if(!$customer_res){
            $res['code'] = 1;
            $res['text'] = "添加失败";
            die(json_encode($res));
        }
        if($data['car']){
            $str =  html_entity_decode($data['car']);
            $car = json_decode($str,true);//专业能力数组反序列化
            foreach ($car as $k=>$v){
                $singer = array(
                    'user_id'=>$customer_id,
                    'plateNo'=>$v['plateNo'],
                    'brand'=>$v['brand'],
                    'system'=>$v['system'],
                    'annual'=>$v['annual'],
                    'shape'=>$v['shape'],
                    'buytime'=>$v['buytime'],
                );
                if(!$this->db->insert('ci_car',$singer)){
                    $res['code'] = 1;
                    $res['text'] = "添加失败";
                }
            }
        }
        $res['code'] = 0;
        $res['text'] = "添加成功";
        die(json_encode($res));
    }

//    客户详情
    public function detail() {

        $id = $this->input->get('id');

        $data = $this->db->where('id',$id)->get('ci_customer')->row();
        $cars = $this->db->where('user_id',$id)->get('ci_car')->result();
        $this->load->view('/settings/customer_detail',['data'=>$data,'id'=>$id,'cars'=>$cars]);

    }

    //更新用户数据
    public function people(){
        $data = str_enhtml($this->input->post(NULL,TRUE));
        $res = [];
        $ress = $this->db->update('ci_customer',array('name'=>$data['name'],'sex'=>$data['gender'],'birthday'=>$data['birthday'],'mobile'=>$data['tel'],'resource'=>$data['source'],'address'=>$data['address'],'company'=>$data['company'],'service'=>$data['adviser'],'time'=>$data['record']),array('id'=>$data['id']));
        if($ress){
            $res['code'] = 0;
            $res['text'] = "添加成功";
            die(json_encode($res));
        }else{
            $res['code'] = 1;
            $res['text'] = "添加失败";
            die(json_encode($res));
        }
    }

    //更新用户发票信息
    public function invoice(){
        $data = str_enhtml($this->input->post(NULL,TRUE));
        $res = [];
        $ress = $this->db->update('ci_customer',array('rise'=>$data['rise'],'location'=>$data['location'],'bank'=>$data['bank'],'distinguish'=>$data['distinguish'],'mobilephone'=>$data['mobile'],'number'=>$data['number'],'company'=>$data['company'],'service'=>$data['adviser'],'time'=>$data['record']),array('id'=>$data['id']));
        if($ress){
            $res['code'] = 0;
            $res['text'] = "添加成功";
            die(json_encode($res));
        }else{
            $res['code'] = 1;
            $res['text'] = "添加失败";
            die(json_encode($res));
        }
    }

//    客户车辆信息
    public function car(){
        $id = $this->input->get('id');
        $data = $this->db->where('id',$id)->get('ci_car')->row();
        $this->load->view('/settings/customer_car_detail',['data'=>$data,'id'=>$id]);
    }
//    新增客户车辆信息
    public function newcar(){
        $id = $this->input->get('id');

        $this->load->view('/settings/customer_car_detail',['id'=>$id]);
    }
    //车辆添加
    public function caradd(){
        $data = str_enhtml($this->input->post(NULL,TRUE));

        $add = array(
            'user_id'=>$data['id'],
            'plateNo'=>$data['plateNo'],
            'brand'=>$data['brand'],
            'system'=>$data['system'],
            'annual'=>$data['annual'],
            'shape'=>$data['shape'],
            'vin'=>$data['vin'],
            'username'=>$data['username'],
            'notice'=>$data['notice'],
            'tel'=>$data['tel'],
            'engine'=>$data['engine'],
            'people_id'=>$data['people_id'],
            'color'=>$data['color'],
            'address'=>$data['address'],
            'price'=>$data['price'],
            'type'=>$data['type'],
            'registration'=>$data['registration'],
            'review'=>$data['review'],
            'nature'=>$data['nature'],
            'administrator'=>$data['administrator'],
            'phone'=>$data['phone'],
            'displacement'=>$data['displacement'],
            'front'=>$data['front'],
            'rear'=>$data['rear'],
            'transmission'=>$data['transmission'],
            'currentMileage'=>$data['currentMileage'],
            'adviceMileage'=>$data['adviceMileage'],
            'adviceTime'=>$data['adviceTime'],
            'compulsoryTime'=>$data['compulsoryTime'],
            'compulsoryNo'=>$data['compulsoryNo'],
            'compulsorySale'=>$data['compulsorySale'],
            'compulsoryCompany'=>$data['compulsoryCompany'],
            'commercialTime'=>$data['commercialTime'],
            'commercialCompany'=>$data['commercialCompany'],
            'commercialNo'=>$data['commercialNo'],
            'commercialSale'=>$data['commercialSale'],
            'policyHolder'=>$data['policyHolder'],
            'insured'=>$data['insured'],
            'remarks'=>$data['remarks'],
        );
        if($data['user_id']){
            $car_res = $this->db->update('ci_car',$add,array('id'=>$data['id']));
            if($car_res){
                $res['code'] = 0;
                $res['text'] = "修改成功";
                die(json_encode($res));
            }else{
                $res['code'] = 1;
                $res['text'] = "修改失败";
                die(json_encode($res));
            }
        }else{
            $car_res = $this->db->insert('ci_car',$add);
            if($car_res){
                $res['code'] = 0;
                $res['text'] = "新增成功";
                die(json_encode($res));
            }else{
                $res['code'] = 1;
                $res['text'] = "新增失败";
                die(json_encode($res));
            }
        }



    }
}
