<?php 
require_once('vendor/autoload.php');

$chatkit = new Chatkit\Chatkit([
  'instance_locator' => 'v1:us1:1fb82e6e-d3b8-4e97-be5b-f98b8a522aea',
  'key' => 'f0b9a017-e6b8-4370-9cab-4c4228837abb:bD+OQwo9KZzuoWbgQh8DOoOz329+ln29jrhz5+rMQGQ='
]);

$chatkit->deleteUser([ 'id' => 'ham' ]);
$chatkit->deleteUser([ 'id' => 'ham2' ]);

$chatkit->authenticate([ 'user_id' => 'ham' ]);

$chatkit->createUser([
  'id' => 'ham',
  'name' => 'Hamilton Chapman',
  'avatar_url' => 'https://placekitten.com/200/300',
  'custom_data' => [
    'my_custom_key' => 'some data'
  ]
]);

$chatkit->authenticate([ 'user_id' => 'ham2' ]);

$chatkit->createUser([
  'id' => 'ham2',
  'name' => 'Hamilton Chapman',
  'avatar_url' => 'https://placekitten.com/200/300',
  'custom_data' => [
    'my_custom_key' => 'some data'
  ]
]);

$chatkit->createRoom([
  'creator_id' => 'ham',
  'name' => 'Room name 1',
  'room_id' => '1001',
  'user_ids' => ['ham2'],
  'private' => true,
  'custom_data' => ['foo' => 'bar']
]);

$chatkit->addUsersToRoom([
  'user_ids' => ['ham', 'ham2'],
  'room_id' => '1001'
]);

?>
