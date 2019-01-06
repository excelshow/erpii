<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Qr extends CI_Controller {


//   门店二维码
    public function index(){
        $user = $this->session->userdata('jxcsys');

        if ($user['orgWhere'] != 'lowId='.$user['lowId']){

            var_dump("您尚未在组织中，添加失败！");exit;
        }
        if(file_exists("image/qr/".$user['lowId'].'/'.$user['lowId'].'.jpg')){
            var_dump("图片已存在");exit;

        }
        $appid = "wx753a3c4c7a501de8";
        $appsecret = "7237bb051936fca47440cb9c545dba96";

        $access_token =  $this->db->where(['id'=>1])->get('ci_accesstoken')->row();

        if(!$access_token || $access_token->time < time()){

            //获取$access_token
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $appsecret . "";

            $result = $this->curl_post($url);

            $access_tokens = json_decode($result, true);

            $edit = $this->db->update('ci_accesstoken',array('accesstoken'=>$access_tokens['access_token'],'time'=>time() + 7000),array('id'=>1));


            $access_token =  $this->db->where(['id'=>1])->get('ci_accesstoken')->row();
        }

        //   $qrcodes = '{"expire_seconds": 1800, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_str": "&'.$user['topId'].'&'.$user['midId'].'&'.$user['lowId'].'"}}}';
        $qrcodes = '{"action_name": "QR_LIMIT_STR_SCENE", "action_info": {"scene": {"scene_str": "&'.$user['topId'].'*'.$user['midId'].'#'.$user['lowId'].'@"}}}';

        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=" .$access_token->accesstoken . "";

        $momo = json_decode($qrcodes, true);

        $result = $this->curl_post($url, $momo);

        $rs = json_decode($result, true);

        $data = [
            'ticket' => $rs['ticket'],  //数据
        ];

        $qrcode = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $data['ticket'] . "";

        $dir = iconv("UTF-8", "GBK", "image/qr/".$user['lowId']);
        if (!file_exists($dir)){
            mkdir ($dir,0777,true);
        }
        $image = file_put_contents($user['lowId'].'.jpg',file_get_contents($qrcode));

        $file = $user['lowId'].'.jpg'; //旧目录
        $newFile = "image/qr/".$user['lowId'].'/'.$user['lowId'].'.jpg'; //新目录
        copy($file,$newFile); //拷贝到新目录
        unlink($file); //删除旧目录下的文件


        $this->load->view('/settings/qr');
    }

    public function curl_post($url, array $params = array())
    {

        $data_string = json_encode($params);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json'
            )
        );
        $data = curl_exec($ch);

        curl_close($ch);
        return ($data);
    }
}