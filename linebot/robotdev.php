<?php
   // echo "Hello LINE bot World!"; 
   
  // limitless-falls-79984.herokuapp.com/robotcar.php
    $API_URL = 'https://api.line.me/v2/bot/message/reply';
    $APIPUSH_URL = 'https://api.line.me/v2/bot/message/push';
    $APIProfile_URL = 'https://api.line.me/v2/bot/profile/';
    $ACCESS_TOKEN = 'gHEeOPuzTzztR02NmC82fAppfIocpbH6nGxElIYWvlRTsUgsPCl5BU/fv/zvA8kjjXNgIT3Xtzdfv+ECo71ufl3IMupOK1BW+LhXRc38fGq3EMQKY/xa6X1dUzne67QNY8oSTIcm1PJHkSYe0dfZCwdB04t89/1O/w1cDnyilFU=';
    $POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);
    $request = file_get_contents('php://input');  
    $request_array = json_decode($request, true); 
    
    $externalIp = file_get_contents('http://androidserver.ddns.net/line_bot/getrealip.php');
    $post_data = http_build_query($request_array);
    $options = array('http' => array(
       'method' => 'POST',
       'header' => 'Content-type: application/x-www-form-urlencoded',
       'content' => $post_data
     ));
    $context = stream_context_create($options);
    $result = file_get_contents('http://'.$externalIp.':85/line_bot/connectrobotdev.php', false, $context);
    $pushdata2= json_decode($result, true);
 

    $push_body2 = json_encode($pushdata2, JSON_UNESCAPED_UNICODE);
    $send_result2 = send_reply_message($API_URL, $POST_HEADER, $push_body2);



    function send_reply_message($url, $post_header, $post_body)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
    function push_message($url, $post_header, $post_body)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    function GET_Profile($url, $post_header, $post_body)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
   
?>