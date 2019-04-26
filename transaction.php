<?php
session_start();
error_reporting(0);

if ($_SESSION['NickName'] == NULL) {
    echo '<a href="login_page.php">Please Login</a>';
} else {
    $id = $_GET['item_id'];

    $query_item = "SELECT * FROM product_info WHERE Item_ID = '$id'";

    function Searching_item($query_item) {
        include_once 'db_conn.php';

        $result = mysqli_query($conn, $query_item);
        return $result;
    }
    ?>

    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="css/styles.css">
            <!--- --->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Credit Card Validation Demo</title>

            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/styles.css">
            <link rel="stylesheet" type="text/css" href="css/demo.css">

        </head>

        <body>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="js/jquery.payform.min.js" charset="utf-8"></script>
            <script src="js/script.js"></script>


            <div class="creditCardForm">
                <div class="heading">
                    <h1>Confirm Purchase</h1>
                </div>
                <div class="payment">
                    <form>
                        <div class="form-group owner">
                            <label for="owner">Owner</label>
                            <input type="text" class="form-control" id="owner">
                        </div>
                        <div class="form-group CVV">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv">
                        </div>
                        <div class="form-group" id="card-number-field">
                            <label for="cardNumber">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber">
                        </div>
                        <div class="form-group" id="expiration-date">
                            <label>Expiration Date</label>
                            <select>
                                <option value="01">January</option>
                                <option value="02">February </option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <select>
                                <option value="18"> 2018</option>
                                <option value="19"> 2019</option>
                                <option value="20"> 2020</option>
                                <option value="21"> 2021</option>
                                <option value="22"> 2022</option>
                                <option value="23"> 2023</option>
                            </select>
                        </div>
                        <div class="form-group" id="credit_cards">
                            <img src="img/visa.jpg" id="visa">
                            <img src="img/mastercard.jpg" id="mastercard">
                            <img src="img/amex.jpg" id="amex">
                        </div>
                        <div class="form-group" id="pay-now">
                            <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>

    </body>
</html>
