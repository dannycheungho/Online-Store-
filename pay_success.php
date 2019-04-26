<?php

session_start();

$item_for_sold = $_GET["item_id"];
echo $item_for_sold;

$query20 = "UPDATE product_info SET Buyer_Email = '" . $_SESSION['username'] . "' , Sell_Date = '" . date("Y-m-d") . "' WHERE Item_ID = " . $item_for_sold;
//echo $query20;
//include_once 'db_conn.php';
//$get_sell_rec = mysqli_query($conn, $query20);  
include_once 'db_conn.php';
if (mysqli_query($conn, $query20)) {
    echo '<script>window.alert("Successful Payment!")</script>';
    echo"<script>window.location = 'buy_record.php'</script>"; 
}
?>
