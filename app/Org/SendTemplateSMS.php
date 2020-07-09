<?php


namespace App\Org;
//容联云通讯 短信验证码类
use App\Org\SDK\REST;
class SendTemplateSMS{

//主帐号
    private $accountSid= '8aaf07087206ba18017206f15c9e0045';

//主帐号Token
    private $accountToken= 'e8b3293d3c6b4fde8c448cdd685e9730';

//应用Id
    private $appId='8aaf07087206ba18017206f15d06004b';

//请求地址，格式如下，不需要写https://
    private $serverIP='app.cloopen.com';

//请求端口
    private $serverPort='8883';

//REST版本号
    private $softVersion='2013-12-26';
   public function sendTemplateSMS($to)
    {
        // 初始化REST SDK

        $rest = new REST($this->serverIP,$this->serverPort,$this->softVersion);
        $rest->setAccount($this->accountSid,$this->accountToken);
        $rest->setAppId($this->appId);

        // 发送模板短信
//     echo "Sending TemplateSMS to $to <br/>";

        $num="";
        for($i=0;$i<4;$i++){
            $num .= rand(0,9);
        }
        $datas=array($num,5);
        $tempId='1';
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
//            echo "result error!";
            echo json_encode(array('errcode'=>202));
        }
        if($result->statusCode!=0) {

             //TODO 添加错误处理逻辑
            echo json_encode(array('errcode'=>201,'msg'=>$result->statusMsg));
        }else{
            echo json_encode(array('errcode'=>100,'num'=>$num));

            //TODO 添加成功处理逻辑
        }
    }

}