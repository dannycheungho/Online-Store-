<?php

session_start();
error_reporting(0);
include_once 'header.php';

if($_SESSION['username'] == NULL) {
    echo '<script type="text/javascript">window.location="login_page.php"</script>';
} else {
    echo '
        <div class="container" style="margin-bottom: 40px;">

            <div class="col-md-12">

                <h2 class="page-header">Upload a phone</h2>

                <form method="post" enctype="multipart/form-data" action="?">

                    <div class="form-group">
                        <label for="Brand">Brand</label>
                        <input class="form-control" type="text" name="Brand" id="Brand" placeholder="Enter Brand" required>
                    </div>

                    <div class="form-group">
                        <label for="Product_Name">Phone model</label>
                        <input class="form-control" type="text" name="Product_Name" id="Product_Name" placeholder="Enter phone model" required>
                    </div>

                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input class="form-control" type="number" min="1" name="Price" id="Price" placeholder="Enter Price" required>
                    </div>

                    <div class="form-group">
                        <label for="New_Or_Old">Phone status</label>
                        <select name = "isnew"class="form-control" id="New_Or_Old" required>
                        <option value="" selected disabled hidden>Select Phone status</option>
                        <option value="T">Brand new</option>
                        <option value="F">Old</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Depreciation_Rate">Depreciation rate</label>
                        <input class="form-control" type="number" min="0" max="100" name="Depreciation_Rate" id="Depreciation_Rate" placeholder="Enter depreciation rate" required>
                        <span class="help-block">100% depreciation rate means the phone is brand new, vice versa</span>
                    </div>

                    <div class="form-group">
                        <label for="Description">Description</label>
                        <input class="form-control" type="text" name="Description" id="Description" placeholder="Enter Description">
                    </div>

                    <div class="form-group">
                        <label for="image">Image of the phone</label>
                        <input type="file" id="image" name="image">
                    </div>

                    <button type="submit" name="upload" value="Upload" class="btn btn-default">Submit</button>

                </form>

            </div>
            
        </div>
    ';
}

//item detail
$pn = $_POST['Product_Name'];
$p = $_POST['Price'];
$b = $_POST['Brand'];
$n = $_POST['isnew'];
$dr = $_POST['Depreciation_Rate'];
$des = $_POST['Description'];
$image = $_FILES['image']['name'];

//item url in db
$target = "img_location/";
$url = $target.$_FILES['image']['name'];
$sql_item = "INSERT INTO product_info (Product_Name, Price, Brand, New, Depreciation_Rate, Description, Seller_Email, Upload_Date, url) "
        . "VALUES ('$pn', '$p', '$b', '$n', '$dr', '$des', " . "'" . $_SESSION['username'] . "'" . ", " . "'" . date("Y-m-d") . "'" . ", " . "'" . $url . "'" . ")";

if (isset($_POST['upload'])) {
    
    // echo $sql_item;
    
    include_once 'db_conn.php';
    
    /*
    echo $pn."<br>";
    echo $p."<br>";
    echo $b."<br>";
    echo $n."<br>";
    echo $dr."<br>";
    echo $des."<br>";
    echo $image."<br>";
    
    echo "URL is ".$target."<br>";
    
    echo $sql_item;
    */
    
    if($image != NULL)
    {
        if (mysqli_query($conn, $sql_item))
    {
        echo '<script>window.alert("Upload Successfully")</script>';
        echo '<script>window.location = "my_shop.php"</script>';
        
        if(move_uploaded_file($_FILES['image']['tmp_name'], $url))
        {
            //echo 'OK'. $url;
        }
        else 
        {
            //echo 'Cannot upload the image';
        }
        
    }
        else {
            //echo "Error";
        }
    } else {
        echo '<script>window.alert("Please attach a image of your phone!")</script>';
    }
    
}


include_once 'footer.php';

?>