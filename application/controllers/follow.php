<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Follow extends CI_Controller {

//   扫码关注注册
    public function index(){


        $encryptMsg = $GLOBALS["HTTP_RAW_POST_DATA"];
      //  file_put_contents('a.txt',$encryptMsg);exit;
        if($encryptMsg){
            $postObj = simplexml_load_string($encryptMsg, 'SimpleXMLElement', LIBXML_NOCDATA);
            $scenes = json_decode($postObj->EventKey, true);
            if($postObj->Event == 'subscribe'){
                $access_token =  $this->db->where(['id'=>1])->get('ci_accesstoken')->row();

                if(!$access_token || $access_token->time < time()){
                    $appid = "wx753a3c4c7a501de8";
                    $appsecret = "7237bb051936fca47440cb9c545dba96";

                    //获取$access_token
                    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $appsecret . "";

                    $result = $this->curl_post($url);

                    $access_tokens = json_decode($result, true);

                    $this->db->update('ci_accesstoken',array('accesstoken'=>$access_tokens['access_token'],'time'=>time() + 7000),array('id'=>1));

                    $access_token =  $this->db->where(['id'=>1])->get('ci_accesstoken')->row();
                }

                $ticket = $postObj->Ticket; //Ticket
                $openids = $postObj->FromUserName; //openid
                $eventKey =$postObj->EventKey;
                $topId = $this->cut('&','*',$eventKey);
                $midId = $this->cut('*','#',$eventKey);
                $lowId = $this->cut('#','@',$eventKey);

                $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token->accesstoken."&openid=".$openids."&lang=zh_CN";
                $res = $this->https_get($url);
                $result = json_decode($res,true);
                $wechat = $result['nickname'];
                $openid = $result['openid'];

                $customer = $this->db->where(['openid'=>$openid,'org_id'=>$lowId])->get('ci_customer')->row();
                $org_data =  $this->db->where(['id'=>$lowId])->get('ci_org')->row();
                if($customer){
                     $this->db->update('ci_customer',array('wechat'=>$wechat,'is_delete'=>1),array('openid'=>$openid,'org_id'=>$lowId));
                }else{
                    $add =array(
                        'wechat'=>$wechat,
                        'sex'=>$result['sex'],
                        'openid'=>$openid,
                        'is_delete'=> 0,
                        'topId'=> $topId,
                        'midId'=> $midId,
                        'lowId'=> $lowId,
                        'org_id'=> $lowId,
                        'org_name'=>$org_data->name,
                        'time'=>time(),
                    );
                    $this->db->insert('ci_customer',$add);
                }

            }else if($postObj->Event == 'SCAN'){
                $ticket = $postObj->Ticket; //Ticket
                $openids = $postObj->FromUserName; //openid
                $eventKey =$postObj->EventKey;

            }else if($postObj->Event == 'CLICK'){
                if($postObj->EventKey == 'V1001'){
                    $contentStr = "添加微信号：weibang_kefu";
                    $textTpl = "<xml>
                                  <ToUserName><![CDATA[%s]]></ToUserName>
                                  <FromUserName><![CDATA[%s]]></FromUserName>
                                  <CreateTime>%s</CreateTime>
                                  <MsgType><![CDATA[text]]></MsgType>
                                  <Content><![CDATA[%s]]></Content>
                                  <FuncFlag>%d</FuncFlag>
                                </xml>";
                    $resultStr = sprintf($textTpl, $postObj->FromUserName, $postObj->ToUserName, time(), $contentStr, 0);
                    return $resultStr;
                }
            }
        }
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

    /*

      * 发起GET网络提交

      * @params string $url : 网络地址

      */

    private function https_get($url)

    {

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($curl, CURLOPT_HEADER, FALSE) ;

        curl_setopt($curl, CURLOPT_TIMEOUT,60);

        if (curl_errno($curl)) {

            return 'Errno'.curl_error($curl);

        }

        else{$result=curl_exec($curl);}

        curl_close($curl);

        return $result;

    }

    function cut($begin,$end,$str){
        $b = mb_strpos($str,$begin) + mb_strlen($begin);
        $e = mb_strpos($str,$end) - $b;

        return mb_substr($str,$b,$e);
    }
}