<?php
	function getAppName(){
		return '万家康协同平台';
	}

    function sendCodeSms($mobilephone,$code){
        $url = "https://open.ucpaas.com/ol/sms/sendsms";
        $json=["sid"=>"8a253ce98d6e5a5722fd933602d27ff3",
                "token"=>"36f3af0aa3f53eaad77fef7696de9c29",
                "appid"=>"a59e9c04f8494a19949426c13f689841",
                "templateid"=>"79279",
                "param"=>$code,
                "mobile"=>$mobilephone];
        $json = json_encode($json);
        $data = getResult($url, $json,'post');
        return $data;
    }

    function getResult($url, $body = null, $method)
    {
        $data = connection($url,$body,$method);
        if (isset($data) && !empty($data)) {
            $result = $data;
        } else {
            $result = '没有返回数据';
        }
        return $result;
    }

    function connection($url, $body,$method)
    {
        if (function_exists("curl_init")) {
            $header = array(
                'Accept:application/json',
                'Content-Type:application/json;charset=utf-8',
            );
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            if($method == 'post'){
                curl_setopt($ch,CURLOPT_POST,1);
                curl_setopt($ch,CURLOPT_POSTFIELDS,$body);
            }
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $result = curl_exec($ch);
            curl_close($ch);
        } else {
            $opts = array();
            $opts['http'] = array();
            $headers = array(
                "method" => strtoupper($method),
            );
            $headers[]= 'Accept:application/json';
            $headers['header'] = array();
            $headers['header'][]= 'Content-Type:application/json;charset=utf-8';

            if(!empty($body)) {
                $headers['header'][]= 'Content-Length:'.strlen($body);
                $headers['content']= $body;
            }

            $opts['http'] = $headers;
            $result = file_get_contents($url, false, stream_context_create($opts));
        }
        return $result;
    }
?>