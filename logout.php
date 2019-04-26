<?php

session_start();

//unset($_SESSION['username']);
//unset($_SESSION['NickName']);
//unset($_SESSION['search_condition']);
//unset($_SESSION['MINprice']);
//unset($_SESSION['MAXprice']);
session_destroy();
header('Location: index.php');
?>