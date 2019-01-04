<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Receive extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }
	 
	public function index(){

        $encryptMsg = file_get_contents('php://input');
// file_put_contents('a.txt', $encryptMsg);

        if($encryptMsg){

            $postObj = simplexml_load_string($encryptMsg, 'SimpleXMLElement', LIBXML_NOCDATA);
            $scenes = json_decode($postObj->EventKey, true);
            if($postObj->Event == 'subscribe'){
                $ticket = $postObj->Ticket; //Ticket
                $openids = $postObj->FromUserName; //openid
                $eventKey =$postObj->EventKey;

            }else if($postObj->Event == 'SCAN'){
                $ticket = $postObj->Ticket; //Ticket
                $openids = $postObj->FromUserName; //openid
                $eventKey =$postObj->EventKey;

                $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$login['access_token']."&openid=".$openids."&lang=zh_CN";
                $res = $this->https_get($url);
                $result = json_decode($res,true);
                $nickname = $result['nickname'];
                $openid = $result['openid'];


                $logins = Admin::find()->where(['openID'=>$openid])->one();

                if($logins){

                    $logins->login = $eventKey;
                    $logins->save();
                }

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
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */