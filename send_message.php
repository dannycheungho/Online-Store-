<?php
include_once('config2.php');

$id = $_POST['userid'];
$content = $_POST['content'];

$chatkit->sendMessage([
  'sender_id' => $id ,
  'room_id' => '19383866',
  'text' => $content
]);
?>
