<?php

echo '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ustora Demo</title>
' . "
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
" . '
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
		
        <style>
            body {
                margin: 0;
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }
            main {
                display: block;
                flex: 1 0 auto;
                flex-shrink: 0;
            }
        </style>
		
		<!-- Chat JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
		<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/axios@0.17.0/dist/axios.min.js"></script>
		<script src=" https://unpkg.com/@pusher/chatkit-client"></script>
		<script src="chat.js"></script>
' . "
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
" . '
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="site-branding-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <h1><a href="./"><img src="img/it_logo_1.png" style="height: 45px;padding-left: 15px;"></a></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End site branding area -->

        <!--- start mainmenu-area --->

        <div class="mainmenu-area">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="./">Home</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="about_us.php">About Us</a></li>
							<li><a href="chat_index">Online Chat With Support</a></li>
                        </ul>

                        <div class="col-sm-3 col-md-3" style="padding-top: 5px; padding-bottom: 5px;">
                            <form class="navbar-form" role="search" action="?" method="POST">
                                <div class="input-group">
                                    <input id="search" name="item" type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" name="search_it" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--- start mainmenu-area --->
';

if (isset($_POST['search_it'])) {

    $_SESSION['search_condition'] = $_POST['item'];
    $_SESSION['MINprice'] = "0";
    $_SESSION['MAXprice'] = PHP_INT_MAX;

    if ($_SESSION['search_condition'] != NULL) {
        echo "<script>window.location = 'search_result.php'</script>";
        //header("Location: search_result.html");
    }
}

echo '
                        <ul class="nav navbar-nav navbar-right">
                        <li><a href="cart.php">Shopping Cart</a></li>
';


if ($_SESSION['username'] == NULL) {
    echo "<li><a href='login_page.php'>Login</a></li>";
	
} else {
    echo "
                            <li class='dropdown'>
                                <a href='personal_info.php' class='dropdown-toggle' data-toggle='dropdown'>" . 'Hi, ' . $_SESSION['NickName'] . "<span class='caret'></span></a>
                                <ul class='dropdown-menu' role='menu'>
                                    <li><a href='personal_info.php'>Info</a></li>
                                    <li><a href='my_shop.php'>My Shop</a></li>
                                    <li class='divider'></li>
                                    <li><a href='buy_record.php'>Buy Record</a></li>
                                    <li><a href='sell_record.php'>Sell Record</a></li>
                                    <li class='divider'></li>
                                    <li><a href='logout.php'>Logout</a></li>
                                </ul>
                            </li>
							";
							
}

echo '
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End mainmenu area -->
        <main>
 ';
?>
