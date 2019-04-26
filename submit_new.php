<?php
if(isset($_POST['submit_password']))
{
	session_start();
    error_reporting(0);
	include_once 'header.php';
	require('config.php');
	$email = $_POST['email'];
	$pass = md5($salt1 . $_POST["password"] . $salt2); 
	echo $pass," and111 " , $email;
	echo "<br>"."update login set Login_PW='".$pass."' where Login_Email='".$email."'";
	$select=mysql_query($db, "update login set Login_PW='".$pass."' where Login_Email='".$email."'");
}
?>