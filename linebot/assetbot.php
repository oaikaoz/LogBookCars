<?php
   // echo "Hello LINE bot World!";

    $API_URL = 'https://api.line.me/v2/bot/message/reply';
    $APIPUSH_URL = 'https://api.line.me/v2/bot/message/push';
    $APIProfile_URL = 'https://api.line.me/v2/bot/profile/';
    $ACCESS_TOKEN = "q/33PeZ0m0SKUUNr36XYg37LIrz+Qk2uW8pWVddhiNGm0EHDP6knf84R13bxj3FaE29rhdF9V6HnkVcsOS3tFdM5ErEqgPeqD2fqpn66iNTlqPEDmdHDbdGxjMuwdp+G6H+bYgCwzQ7BsboWC39qLAdB04t89/1O/w1cDnyilFU=";
    $POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);
    $request = file_get_contents('php://input');  
    $request_array = json_decode($request, true); 
    
    $externalIp = file_get_contents('http://androidserver.ddns.net/line_bot/getrealip.php'); //del
    $post_data = http_build_query($request_array);
    $options = array('http' => array(
       'method' => 'POST',
       'header' => 'Content-type: application/x-www-form-urlencoded',
       'content' => $post_data
     ));
    $context = stream_context_create($options);
    $result = file_get_contents('http://'.$externalIp.':85/line_bot/connectasset.php', false, $context); // change 127
    $pushdata2= json_decode($result, true);
 

        if (is_array($pushdata2) || is_object($pushdata2))
        {
            foreach ($pushdata2 as  $arr_data) {
            
            $push_body2 = json_encode($arr_data, JSON_UNESCAPED_UNICODE);
            $send_result2 = push_message($APIPUSH_URL, $POST_HEADER, $push_body2);
                
            }
        }


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