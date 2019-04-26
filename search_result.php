<?php
session_start();
error_reporting(0);
include_once 'header.php';

//var_dump($_SESSION["MINprice"]);
//var_dump($_SESSION["MAXprice"]);
$sorting = $_POST['sorting'];
?>


<?php
if($sorting == "" || $sorting == "date_d"){
    $search_sql = "SELECT * FROM product_info WHERE (Price BETWEEN " . $_SESSION["MINprice"] . " AND " . $_SESSION["MAXprice"] . ") AND (Product_Name LIKE '%" . $_SESSION["search_condition"] . "%' OR Brand LIKE '%" . $_SESSION["search_condition"] . "%' OR Model LIKE '%" . $_SESSION["search_condition"] . "%') ORDER BY Upload_Date DESC";

}
if($sorting == "date_a"){
    $search_sql = "SELECT * FROM product_info WHERE (Price BETWEEN " . $_SESSION["MINprice"] . " AND " . $_SESSION["MAXprice"] . ") AND (Product_Name LIKE '%" . $_SESSION["search_condition"] . "%' OR Brand LIKE '%" . $_SESSION["search_condition"] . "%' OR Model LIKE '%" . $_SESSION["search_condition"] . "%') ORDER BY Upload_Date";

}
if($sorting == "p_a"){
    $search_sql = "SELECT * FROM product_info WHERE (Price BETWEEN " . $_SESSION["MINprice"] . " AND " . $_SESSION["MAXprice"] . ") AND (Product_Name LIKE '%" . $_SESSION["search_condition"] . "%' OR Brand LIKE '%" . $_SESSION["search_condition"] . "%' OR Model LIKE '%" . $_SESSION["search_condition"] . "%') ORDER BY Price";

}
if($sorting == "p_d"){
    $search_sql = "SELECT * FROM product_info WHERE (Price BETWEEN " . $_SESSION["MINprice"] . " AND " . $_SESSION["MAXprice"] . ") AND (Product_Name LIKE '%" . $_SESSION["search_condition"] . "%' OR Brand LIKE '%" . $_SESSION["search_condition"] . "%' OR Model LIKE '%" . $_SESSION["search_condition"] . "%') ORDER BY Price DESC";

}
if($sorting == "d_d"){
    $search_sql = "SELECT * FROM product_info WHERE (Price BETWEEN " . $_SESSION["MINprice"] . " AND " . $_SESSION["MAXprice"] . ") AND (Product_Name LIKE '%" . $_SESSION["search_condition"] . "%' OR Brand LIKE '%" . $_SESSION["search_condition"] . "%' OR Model LIKE '%" . $_SESSION["search_condition"] . "%') ORDER BY Depreciation_Rate DESC";
}
if($sorting == "d_a"){
    $search_sql = "SELECT * FROM product_info WHERE (Price BETWEEN " . $_SESSION["MINprice"] . " AND " . $_SESSION["MAXprice"] . ") AND (Product_Name LIKE '%" . $_SESSION["search_condition"] . "%' OR Brand LIKE '%" . $_SESSION["search_condition"] . "%' OR Model LIKE '%" . $_SESSION["search_condition"] . "%') ORDER BY Depreciation_Rate";
}

//    $search_sql = "SELECT * FROM product_info WHERE (Price BETWEEN " . $_SESSION["MINprice"] . " AND " . $_SESSION["MAXprice"] . ") AND Product_Name LIKE '%" . $_SESSION["search_condition"] . "%' OR Brand LIKE '%" . $_SESSION["search_condition"] . "%' OR Model LIKE '%" . $_SESSION["search_condition"] . "%' ORDER BY Upload_Date DESC";

//
//
//echo $_SESSION['search_condition'] . '<br>';
//echo $search_sql;
//include_once 'db_conn.php';

function Searching_item($search_sql) {
    include_once 'db_conn.php';

    $result = mysqli_query($conn, $search_sql);
    return $result;
}
?>

<?php
    $search_result = Searching_item($search_sql);
    /*unset($_SESSION['MINprice']);
    unset($_SESSION['MAXprice']);
    unset($_SESSION['search_condition']);*/
?>

<div class="container">

    <div class="col-md-12">

        <h2 class='page-header'>Search Result</h2>
        <form method="POST" action="?" style="margin-bottom: 50px;">
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
            echo'</div><!--a-->';
            if($haveresult == false){
                echo 'Your search did not match any products.';
            }
        ?>
    </div>
</div>

<?php
include_once 'footer.php';
?>
