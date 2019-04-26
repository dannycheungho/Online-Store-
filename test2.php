<?php
include_once('config2.php');


$chatkit->sendMessage([
  'sender_id' => "ham" ,
  'room_id' => '19389288',
  'text' => "hello"
]);
?>
