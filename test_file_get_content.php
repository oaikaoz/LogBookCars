<?php

$options = array('http' => array(
    'method' => 'POST',
    'header' => 'Content-type: application/x-www-form-urlencoded',
    'content' => $post_data
  ));
 $context = stream_context_create($options);
 $result = file_get_contents('https://roh2.triplet.co.th/logbookcar/report/index.php', false, $context);

 echo $result;
?>