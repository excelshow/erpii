<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Card extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->common_model->checkpurview(304);
    }

    //储值卡列表
    public function index() {
        $user = $this->session->userdata('jxcsys');

        $like = array('car_num' => $this->input->post('matchCon'));

        if($user['orgWhere'] == 'lowId='.$user['lowId']){
            $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));
            $orgids = array($user['lowId'], $user['midId']);
            $data = $this->db->where($where)->where_in('orgid',$orgids)->like($like)->get('ci_storedcard')->result();
        }else{
            $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')));
            $data = $this->db->where($where)->like($like)->get('ci_storedcard')->result();
        }
        $org = $this->db->where('parentId',$user['midId'])->get('ci_org')->result();

        $this->load->view('/settings/stored_value_card',['data'=>$data,'like'=>$this->input->post('matchCon'),'org'=>$org,'orgid'=>$user['midId']]);
    }

    //添加储值卡
    public function add() {
        $data = str_enhtml($this->input->post(NULL,TRUE));
        $user = $this->session->userdata('jxcsys');
        $res = [];
        if ($user['orgWhere'] != 'lowId='.$user['lowId']){
            $res['code'] = 1;
            $res['text'] = "您尚未在组织中，添加失败！";
            die(json_encode($res));
        }else{
            $card = array(
                'car_num'=>$data['car_num'],
                'car_name'=>$data['car_name'],
                'sale'=>$data['sale'],
                'present'=>$data['present'],
                'addtime'=>time(),
                'orgid'=> $data['orgid'],
                'orgname'=>$data['orgname'],
                'topId'=>$user['topId'],
                'midId'=>$user['midId'],
                'lowId'=>$user['lowId'],
            );
            $card_res = $this->db->insert('ci_storedcard',$card);
            if($card_res){
                $res['code'] = 0;
                $res['text'] = "添加成功";
                die(json_encode($res));
            }else{
                $res['code'] = 1;
                $res['text'] = "添加失败";
                die(json_encode($res));
            }
        }

    }

    //修改储值卡
    public function edit() {
        $id = str_enhtml($this->input->post('id',TRUE));
        $data = $this->db->where('id',$id)->get('ci_storedcard')->row();
        $org = $this->db->where(['id'=>$data->orgid])->get('ci_org')->row();
        $res = [];
        if($org->level == 3){
            $org_data = $this->db->where(['parentId'=>$org->parentId])->get('ci_org')->result();
        }else{
            $org_data = $this->db->where(['parentId'=>$org->orgid])->get('ci_org')->result();
        }
        $res['data'] = $data;
        $res['org_data'] = $org_data;
        die(json_encode($res));
    }

    //执行修改储值卡
    public function doedit() {
        $res = [];
        $data = str_enhtml($this->input->post(NULL,TRUE));

        $edit = $this->db->update('ci_storedcard',array('car_num'=>$data['car_num'],'car_name'=>$data['car_name'],'sale'=>$data['sale'],'validity'=>$data['validity'],'present'=>$data['present'],'orgid'=>$data['orgid'],'orgname'=>$data['orgname']),array('id'=>$data['id']));
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

    //删除储值卡
    public function del() {
        $id = str_enhtml($this->input->post('id',TRUE));
        foreach ($id as $key=>$vel){
            $res = $this->db->where('id', $vel)->delete('ci_storedcard');
        }
        die(json_encode($res));
    }

    //购买储值卡

    public function buycard(){
        $user = $this->session->userdata('jxcsys');
        $mobile = str_enhtml($this->input->post('mobile',TRUE));
        $cardNumber = str_enhtml($this->input->post('cardNumber',TRUE));
        if($mobile){
            $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'mobile'=>$mobile);
            $data =  $this->db->where($where)->get('ci_customer')->row();
            die(json_encode($data));
        }elseif ($cardNumber){
            $where = array(substr($user['orgWhere'],0,strrpos($user['orgWhere'],'=')) => substr($user['orgWhere'],-1,strrpos($user['orgWhere'],'=')),'car_num'=>$cardNumber);
            $data =  $this->db->where($where)->get('ci_storedcard')->row();
            die(json_encode($data));
        }else{
            $this->load->view('/settings/buy_stored_value_card');
        }

    }
    public function dobuycard(){
        $data = str_enhtml($this->input->post(NULL,TRUE));

        $edit = $this->db->update('ci_storedcard',array('name'=>$data['username'],'actually_price'=>$data['receiptsMoney'],'payman'=>$data['payman'],'collectionTime'=>time(),'collectionRemarks'=>$data['collectionRemarks'],'source'=>$data['source'],'buy_id'=>$data['userId'],'status_sale'=>1),array('id'=>$data['cardId']));
        if($edit){
            $res['code'] = 0;
            $res['text'] = "购买成功";
            die(json_encode($res));
        }else{
            $res['code'] = 1;
            $res['text'] = "购买失败";
            die(json_encode($res));
        }
    }


    public function recharge(){
        $data = str_enhtml($this->input->post(NULL,TRUE));
        if($data){
            $edit_1 = $this->db->update('ci_storedcard',array('recharge_id'=>$data['userId'],'recharge_name'=>$data['username'],'recharge_time'=>time()),array('id'=>$data['cardId']));
            $balance = $this->db->where('id',$data['userId'])->get('ci_customer')->row();
            $edit_2 = $this->db->update('ci_customer',array('balance'=>$data['balance']+$balance->balance),array('id'=>$data['userId']));
            die(json_encode($data));
        }else{
            $this->load->view('/settings/recharge_stored_value_card');
        }
    }
}