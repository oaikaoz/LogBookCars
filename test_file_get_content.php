


<?php

/*
$arrContextOptions=array(
    "ssl"=>array(
          "verify_peer"=>false,
          "verify_peer_name"=>false,
      ),
  );  
$url  ='https://roh2.triplet.co.th/index.php';
$response = file_get_contents($url, false, stream_context_create($arrContextOptions));
 echo $response;

*/


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://roh2.triplet.co.th/index.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: 70baa78d-450c-f2dd-bcc1-8f70e6dd7e32"
  ),
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>