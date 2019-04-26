<?php
session_start();
error_reporting(0);
if ($_SESSION['username'] == NULL)
    echo '<script type="text/javascript">window.location="login_page.php"</script>';
include_once 'header.php';
?>

<?php
$my_shop_sql = 'SELECT * FROM product_info WHERE Seller_Email = "' . $_SESSION['username'] . '" order by Upload_Date DESC';

//echo $_SESSION['search_condition'] . '<br>';
//echo $search_sql;
//include_once 'db_conn.php';

function Searching_item($my_shop_sql) {
    include_once 'db_conn.php';

    $result = mysqli_query($conn, $my_shop_sql);
    return $result;
}
?>

<?php
$search_result = Searching_item($my_shop_sql)
?>
<div class="container">
    <div class="col-md-12">
    <div>
        <div class='btn-toolbar pull-right'>
            <form action="upload_item.php" style="margin-bottom: 0px;">
                <button type="submit" class="btn btn-default">Upload new product</button>
            </form>
        </div>
        <h2 class='page-header'>My Shop</h2>
    </div>


    <?php
        echo'<div class="row">';
        $counting = 0;
        $haveresult = false;
        while ($row = mysqli_fetch_array($search_result)) {
            if ($row[11] == '0000-00-00') {
                echo '<div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper" style="text-align: center;">
                            <a href="buy_item.php?item_id='.$row[0].'"><img src="' . $row[12] . '" style="height:200px; object-fit: contain;"></a>
                        </div>
                        <h2><a href="buy_item.php?item_id='.$row[0].'"> ' . $row[1] . '</a></h2>
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
                $haveresult = true;
                $counting++;
                if ($counting == 4) {
                    echo '</div><div class="row">';
                    $counting = 0;
                }
            }
        }
        echo'</div>';
        if($haveresult == false){
            echo 'There is no product in your shop.';
        }
    ?>
</div>

<?php
include_once 'footer.php';
?>