<?php
    session_start();
    error_reporting(0);
    include_once 'header.php';
?>

<div class="container" style="margin-bottom: 20px;">
    
    <div class="col-md-12">

        <?php
            echo'<h2 class="page-header">Sell record of ' . $_SESSION['NickName'] . '</h2>';
        ?>

        <table class="table table-striped">

            <tr><th>Product Name</th><th>Price</th><th>Brand</th><th>Seller Email</th><th>Buy Date</th><th>Like/Dislike</th></tr>

            <?php 
                $sell_record_sql = 'select Product_Name, Price, Brand, Buyer_Email, Sell_Date, Islike from product_info where Seller_Email = "' .$_SESSION['username'] .'" order by Sell_Date DESC';
                function Searching($sell_record_sql) {
                    include_once 'db_conn.php';

                    $resultas = mysqli_query($conn, $sell_record_sql);
                    return $resultas;
                }
            ?>

            <?php
                $sell_record_search = Searching($sell_record_sql);
            ?>

            <?php
                while ($sell_record_row = mysqli_fetch_array($sell_record_search)):
                    if($sell_record_row[4] != '0000-00-00') {
                        echo '<tr><td>'.$sell_record_row[0].'</td><td>'.$sell_record_row[1].'</td><td>'.$sell_record_row[2].'</td>'
                                . '<td><a href=\'others_info.php?email='.$sell_record_row[3].'\';return false;">'.$sell_record_row[3].'</a></td><td>'.$sell_record_row[4].'</td>';
                        if($sell_record_row[5] == ""){
                            echo'<td>Not Commented Yet</td></tr>';
                        }
                        if($sell_record_row[5] == "L"){
                            echo'<td>Liked</td></tr>';
                        }
                        if($sell_record_row[5] == "D"){
                            echo'<td>Disliked</td></tr>';
                        }
                    }
                endwhile;
            ?>

        </table>

    <div>

<div>

<?php
    include_once 'footer.php';
?>