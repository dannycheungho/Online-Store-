<?php
require_once(dirname(__FILE__) . '/vendor/autoload.php');
$chatkit = new Chatkit\Chatkit([
  'instance_locator' => 'v1:us1:1fb82e6e-d3b8-4e97-be5b-f98b8a522aea',
  'key' => 'f0b9a017-e6b8-4370-9cab-4c4228837abb:bD+OQwo9KZzuoWbgQh8DOoOz329+ln29jrhz5+rMQGQ='
]);
$data =  $chatkit->getRoomMessages([
  'room_id' => '19389288',
]) ;


//print_r($chatkit->getRoomMessages([ 'room_id' =>  '19383866' ]));
	foreach($data['body'] as $i => $item) {

		print  '<font color="#FF0000">'.$item['user_id'].'</font>&nbsp&nbsp'  ;
		$str = $item['created_at'];
		print  $item['text'];
		print  '<div class="right"><font  color="#FF0400">'.substr($str,11,-1).'</font></div>'."<br/> ";;
		// $array[$i] is same as $item
	}

?>
<?php
$today = date("F j, Y, g:i a");    

?>

