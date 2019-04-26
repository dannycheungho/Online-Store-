<?php
session_start();
error_reporting(0);
include_once 'header.php';

$sorting = $_POST['sorting'];
?>
<script>
    model = new Array();
    model["Brand"] = [""];
    model["Apple"] = ["iPhone 6", "iPhone 6s", "iPhone 7", "iPhone X", "iPhone XS", "iPhone XS Max", "iPad mini 4", "iPad Pro"];  //apple
    model["Samsung"] = ["Note 5", "Note 8", "Note 9", "S7", "S8", "S9"];                                                //samsung
    model["Sony"] = ["C4", "Z3", "X", "XZ2", "XZ3"];                                                                 //sony
    model["HTC"] = ["10", "U", "U11", "U12"];                                                                       //htc
    model["LG"] = ["V20", "V30+", "G4", "G5", "G6"];                                                               //LG
    model["Mi"] = ["8+", "MIX 2", "Note 5", "Max 3"];                                                              //MI

    function renew(index) {
        console.log(index);
        for (var i = 0; i < model[index].length; i++) {
            document.myForm.model.options[i] = new Option(model[index][i], model[index][i]);
            document.myForm.model.length = model[index].length;
        }
    }
</script>

<div class="container" >

    <div class="col-md-12" style="padding: 0px; border-bottom: 1px dotted #ccc;">
        <div class="product-bit-title text-center">
            <div role="tabpanel" class="tab-pane active container-fluid" id="home">
                <p style="color: #5a88ca; font-size: 20px; text-align: left; margin-top: 20px;">Filter</p>

                <form name="myForm" action="?" method="POST">
                    <div class="row">
                        <div class="col-md-3" style="margin: 20px 0px;">
                            <select onchange="renew(this.value);" style="border: 0; border-bottom: 2px solid #5a88ca; text-align: center; height:30px; width:250px;">  
                                <option selected disabled hidden>Brand</option>
                                <option value="Apple">Apple</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Sony">Sony</option>
                                <option value="HTC">HTC</option>
                                <option value="LG">LG</option>
                                <option value="Mi">Mi</option>
                            </select>
                        </div>
                        <div class="col-md-3" style="margin: 20px 0px;">
                            <select name="model" style="border: 0; border-bottom: 2px solid #5a88ca; text-align: center; height:30px; width:250px;">
                                <option selected disabled hidden>Model</option>
                            </select>
                        </div>
                        <div class="col-md-4" style="margin: 20px 0px;">
                            <div style="display: inline;">
                                <input style="border: 0; border-bottom: 2px solid #5a88ca; text-align: center; width: 40%; height: 30px; margin-right: 3%;" type="number" name="min_price" min="0" placeholder="Lowest" class="">
                            </div>
                            <span>-</span>
                            <div style="display: inline;">
                                <input style="border: 0; border-bottom: 2px solid #5a88ca; text-align: center; width: 40%; height: 30px; margin-left: 3%;" type="number" name="max_price" min="0" placeholder="Highest" class="">
                            </div>
                        </div>
                        <div class="col-md-2" style="margin: 20px 0px;">
                            <button class="btn btn-default" type="submit" name="find" style="margin-bottom: 30px;">Submit</button>
                        </div>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>

<!--End Container-->
</div>

<?php
if (isset($_POST["find"])) {
    $_SESSION['search_condition'] = $_POST["model"];
    
    if($_POST["min_price"] != ""){
        $_SESSION['MINprice'] = $_POST["min_price"];
    }
    else{
        $_SESSION['MINprice'] = "0";
    }
    
    if($_POST["max_price"] != ""){
        $_SESSION['MAXprice'] = $_POST["max_price"];
    }
    else{
        $_SESSION['MAXprice'] = PHP_INT_MAX;
    }
    
    if ($_SESSION['search_condition'] == "" && $_POST["min_price"] == "" && $_POST["max_price"] == "") {
        echo "<script>window.location = 'shop.php'</script>";
    } else {
        //echo $_SESSION['search_condition'];
        echo "<script>window.location = 'search_result.php'</script>";
    }
}
?>

<?php
if($sorting == "" || $sorting == "date_d"){
    $shop_all_sql = 'SELECT * FROM product_info order by Upload_Date DESC';
}
if($sorting == "date_a"){
    $shop_all_sql = 'SELECT * FROM product_info order by Upload_Date';
}
if($sorting == "p_a"){
    $shop_all_sql = 'SELECT * FROM product_info order by Price';
}
if($sorting == "p_d"){
    $shop_all_sql = 'SELECT * FROM product_info order by Price DESC';
}
if($sorting == "d_d"){
    $shop_all_sql = 'SELECT * FROM product_info order by Depreciation_Rate DESC';
}
if($sorting == "d_a"){
    $shop_all_sql = 'SELECT * FROM product_info order by Depreciation_Rate';
}


//echo $_SESSION['search_condition'] . '<br>';
//echo $search_sql;
//include_once 'db_conn.php';

function Searching_item($shop_all_sql) {
    include_once 'db_conn.php';

    $result = mysqli_query($conn, $shop_all_sql);
    return $result;
}
?>

<?php
$search_result = Searching_item($shop_all_sql)
?>

<div class="container" style="margin-top: 30px; padding: 0px 30px;">
    <form method="POST" action="?">
        <select name="sorting" style="border: 0; border-bottom: 2px solid #5a88ca; text-align: center; height:30px; width:250px;" onchange="this.form.submit()">
            <option selected disabled hidden value="">Sort by</option>
            <option value="date_d">Latest to oldest</option>
            <option value="date_a">Oldest to latest</option>
            <option value="p_a">Lower price to higher price</option>
            <option value="p_d">Higher price to lower price</option>
            <option value="d_d">Higher depreciation to lower depreciation</option>
            <option value="d_a">Lower depreciation to higher depreciation</option>
        </select>
    </form>
</div>


<div class="single-product-area">
    <div class="container">
        <div class="row" style="padding: 0px 15px;">
            <?php
            $counting = 0;
            while ($row = mysqli_fetch_array($search_result)) {
                if ($row[11] == '0000-00-00') {
                    echo '<div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper" style="text-align: center;">
                                <a href="buy_item.php?item_id='.$row[0].'"><img src="' . $row[12] . '" style="height:200px; object-fit: contain;"></a>
                            </div>
                                <h2><a href="buy_item.php?item_id='.$row[0].'">' . $row[1] . '</a></h2>
                                ' . $row[3] . '
                            <div class="product-carousel-price">
                                <ins>$' . $row[2] . '</ins>
                            </div>
                            <div class="depreciation-rate">
                                Depreciation: ' . $row[6] . '%
                            </div>
                            <div class="upload-date">
                                ' . $row[10] . '
                            </div>
                        </div>
                    </div>';
                    $counting++;
                    if ($counting == 4) {
                        echo '</div><div class="row" style="padding: 0px 15px;">';
                        $counting = 0;
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
