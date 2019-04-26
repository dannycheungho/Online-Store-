<!DOCTYPE html>
<?php
session_start();

error_reporting(0);

include_once 'header.php';

$_SESSION['username'];

$_SESSION['NickName'];

$_SESSION['search_condition'];


?>

<?php

?>

<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            <li><img src="img/slide1.png" alt="Slide"></li>
            <li><img src="img/slide2.png" alt="Slide"></li>
            <li><img src="img/slide3.png" alt="Slide"></li>
            <li><img src="img/slide4.png" alt="Slide"></li>
        </ul>
    </div>
    <!-- ./Slider -->
</div> <!-- End slider area -->

<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        <img src="img/brand1.png" alt="">
                        <img src="img/brand3.png" alt="">
                        <img src="img/brand4.png" alt="">
                        <img src="img/brand5.png" alt="">
                        <img src="img/brand6.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->

<?php

$index_sql1 = 'SELECT * FROM product_info order by Upload_Date DESC';

//echo $_SESSION['search_condition'] . '<br>';
//echo $search_sql;
//include_once 'db_conn.php';

function Searching_item($index_sql) {
    include 'db_conn.php';

    $result = mysqli_query($conn, $index_sql);
    
    return $result;
    
}
?>

<?php
$index_result1 = Searching_item($index_sql1);
?>

<?php
$index_sql2 = 'SELECT * FROM product_info order by Price';

$index_result2 = Searching_item($index_sql2);

?>


<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Latest Products</h2>
                    <div class="product-carousel">
                        <?php
                        $counting = 0;
                        while ($row = mysqli_fetch_array($index_result1)) {
                            if ($row[11] == '0000-00-00') {
                                if ($counting <= 9) {
                                    echo '
                                   <div class="single-product">
                                        <div class="product-f-image">
                                            <a href="buy_item.php?item_id=' . $row[0] . '"><img src="' . $row[12] . '" style="height:200px; object-fit: contain;" alt=""></a>
                                        </div>

                                        <h2><a href="buy_item.php?item_id=' . $row[0] . '">' . $row[1] . '</a></h2>   
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
                                    </div>';
                                    $counting++;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->




<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Cheapest Products</h2>
                    <div class="product-carousel">
                        <?php
                        $counting = 0;
                        while ($row = mysqli_fetch_array($index_result2)) {
                            if ($row[11] == '0000-00-00') {
                                if ($counting <= 9) {
                                    echo '
                                   <div class="single-product">
                                        <div class="product-f-image">
                                            <a href="buy_item.php?item_id=' . $row[0] . '"><img src="' . $row[12] . '" style="height:200px; object-fit: contain;" alt=""></a>
                                        </div>
                                        
                                        <h2><a href="buy_item.php?item_id=' . $row[0] . '">' . $row[1] . '</a></h2>
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
                                    </div>';
                                    $counting++;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->


<?php
include_once 'footer.php';
?>
