<?php
session_start();
error_reporting(0);
include_once 'header.php';

$id = $_GET['item_id'];
?>

<div class="container" style="margin-bottom: 40px;">
    <div class="col-md-12">
        <h2 class="page-header">Edit Item Info</h2>
        <form role="form" method="post">
            <div class="form-group">
                <label for="Price">Price</label>
                <input class="form-control" type="number" min="1" name="Price" id="Price" placeholder="Enter New Price">
            </div>
            <div class="form-group">
                <label for="Depreciation_Rate">Depreciation Rate</label>
                <input class="form-control" type="number" min="0" max="100" name="Depreciation_Rate" id="Depreciation_Rate" placeholder="Enter New depreciation rate">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input class="form-control" type="text" name="Description" id="Description" placeholder="Enter New Description">
            </div>
            <div class="btn-group">
                <button type="submit" name="submit" value="Submit" class="btn btn-default">Submit</button>
                <button type="submit" class="btn btn-default" onclick="location.href='javascript:history.back()';return false;">Cancel</button>
            </div>
        </form>
    </div>
</div>

<?php

$p = $_POST['Price'];
$dr = $_POST['Depreciation_Rate'];
$d = $_POST['Description'];

if (isset($_POST['submit'])) {
    if($p != "" || $dr != "" || $d != ""){
        include_once 'db_conn.php';
        if($p != ""){
            $query10 = "UPDATE product_info SET Price = '" . $p . "'" . " WHERE Item_ID = '".$id."'";
            mysqli_query($conn, $query10);
        }
        if($dr != ""){
            $query11 = "UPDATE product_info SET Depreciation_Rate = '" . $dr . "'" . " WHERE Item_ID = '".$id."'";
            mysqli_query($conn, $query11);
        }
        if($d != ""){
            $query12 = "UPDATE product_info SET Description = '" . $d . "'" . " WHERE Item_ID = '".$id."'";
            mysqli_query($conn, $query12);
        }
        echo'<script>window.alert("Item Information Changed!")</script>';
        echo '<script>window.location = "buy_item.php?item_id='.$id.'"</script>';
    }
    else{
        echo'<script>window.alert("Please enter information for change!")</script>';
    }
}
?>


<?php
include_once 'footer.php';
?>