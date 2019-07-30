<?php

$arrContextOptions=array(
    "ssl"=>array(
          "verify_peer"=>false,
          "verify_peer_name"=>false,
      ),
  );  
$url  ='https://roh2.triplet.co.th/index.php';
$response = file_get_contents($url, false, stream_context_create($arrContextOptions));
 echo $response;
?>