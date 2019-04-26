<!-- https://colorlib.com/wp/template/creative-login-form/ -->

<?php
session_start();
?>

<html>

    <head>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);

            .login-page {
                width: 360px;
                padding: 8% 0 0;
                margin: auto;
            }
            .form {
                position: relative;
                z-index: 1;
                background: #FFFFFF;
                max-width: 360px;
                margin: 0 auto 100px;
                padding: 45px;
                text-align: center;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            }
            .form input {
                font-family: "Roboto", sans-serif;
                outline: 0;
                background: #f2f2f2;
                width: 100%;
                border: 0;
                margin: 0 0 15px;
                padding: 15px;
                box-sizing: border-box;
                font-size: 14px;
            }
            .form select {
                font-family: "Roboto", sans-serif;
                outline: 0;
                background: #f2f2f2;
                width: 100%;
                border: 0;
                margin: 0 0 15px;
                padding: 15px;
                box-sizing: border-box;
                font-size: 14px;
            }

            .form button {
                font-family: "Roboto", sans-serif;
                text-transform: uppercase;
                outline: 0;
                background: #5a88ca;
                width: 100%;
                border: 0;
                padding: 15px;
                color: #FFFFFF;
                font-size: 14px;
                -webkit-transition: all 0.3 ease;
                transition: all 0.3 ease;
                cursor: pointer;
            }
            .form button:hover,.form button:active,.form button:focus {
                background: #5a88ca;
            }
            .form .message {
                margin: 15px 0 0;
                color: #b3b3b3;
                font-size: 12px;
            }
            .form .message a {
                color: #5a88ca;
                text-decoration: none;
            }
            .form .register-form {
                display: none;
            }
            .container {
                position: relative;
                z-index: 1;
                max-width: 300px;
                margin: 0 auto;
            }
            .container:before, .container:after {
                content: "";
                display: block;
                clear: both;
            }
            .container .info {
                margin: 50px auto;
                text-align: center;
            }
            .container .info h1 {
                margin: 0 0 15px;
                padding: 0;
                font-size: 36px;
                font-weight: 300;
                color: #1a1a1a;
            }
            .container .info span {
                color: #4d4d4d;
                font-size: 12px;
            }
            .container .info span a {
                color: #000000;
                text-decoration: none;
            }
            .container .info span .fa {
                color: #EF3B3A;
            }
            body {
                background: #FFFFFF; /* fallback for old browsers */
                font-family: "Roboto", sans-serif;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
        </style>
    </head>

    <body>
    <h1 style="margin-top: 30px; text-align: center;"><a href="./"><img src="img/it_logo_1.png" style="height: 50px;"></a></h1>
    <div class="login-page">
        <div class="form">
            <form class="register-form" action="?" method = "post">
                <input type="text" name="firstname" placeholder="Firstname" required/>
                <input type="text" name="lastname" placeholder="Lastname" required/>
                <input type="text" name="nickname" placeholder="Nickname" required/>
                <input type="text" name="email" placeholder="Email Address" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <select name="gender" required>
                    <option selected disabled hidden value="">Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Others</option>
                </select>
                <input type="Reset" name="reset" value="Reset" style="text-transform: uppercase;">
                <button type="submit" name="regist" value="Create">create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" action="?" method = "post">
                <input type="text" name="login_email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login" value="Login">Login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
				<p class="message">  <a href="reset.php">Forgot password</a></p>
            </form>
        </div>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            $('.message a').click(function () {
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
            });
        </script>

        <?php
        if (isset($_POST["login"])) {
            include_once 'db_conn.php';

            $salt1 = "qy1s";    // DON'T EDIT
            $salt2 = "21ma";    // DON'T EDIT

            $id = $_POST['login_email'];

            $end_pw = md5($salt1 . $_POST["password"] . $salt2);    //DON'T EDIT

            $query3 = "SELECT Login_Email, Login_PW FROM login WHERE Login_Email = '" . $id . "' AND Login_PW = '$end_pw'";     //login sql
            $query6 = "SELECT Name FROM personal_info WHERE Email_Address = '" . $id . "'";     //Display Hi, "user".

            $login = mysqli_query($conn, $query3);      //login
            $getName = mysqli_query($conn, $query6);    //get name

            if ($row = mysqli_fetch_array($login)) {
                if ($row2 = mysqli_fetch_array($getName)) {
                    $_SESSION['username'] = $id;
                    $_SESSION['NickName'] = $row2[0];
                    echo"<script>window.location = 'index.php'</script>"; // 直接跳到this url
                }
            } else {
                echo '<script>window.alert("Incorrect Email or Password!")</script>';
            }
        }

        if (isset($_POST['regist'])) {
            if (strlen($_POST["password"]) >= 8) {
                $salt1 = "qy1s";    // DON'T EDIT
                $salt2 = "21ma";    // DON'T EDIT

                $end_pw = md5($salt1 . $_POST["password"] . $salt2);    //DON'T EDIT

                if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

                    include_once 'db_conn.php';

                    //Insert user details in to personal_info table
                    $query1 = "INSERT INTO personal_info (NAME, FirstName, LastName, Email_Address, Gender, Create_Date)" .
                            "VALUES ('" . $_POST["nickname"] . "' , '" . $_POST["firstname"] . "' , '" . $_POST["lastname"] . "' , '" . $_POST["email"] . "' , '" . $_POST["gender"] . "' , '" . date("Y-m-d") . "')";

                    //Insert login info into login table
                    $query2 = "INSERT INTO login (Login_Email, Login_PW)" . "VALUES ('" . $_POST["email"] . "' , '" . $end_pw . "')";

                    if (mysqli_query($conn, $query1) && mysqli_query($conn, $query2)) {
                        echo '<script>window.alert("Registered successfully!")</script>';
                        //echo 'SQL for personal info is '.$query1.'<br>';
                        //echo 'SQL for login info is '.$query2.'<br>';
                        //echo $_POST["email"];
                        //echo $end_pw;
                    } else {
                    }
                } else {
                    echo '<script>window.alert("Error Email Address!")</script>'; //Do a pop up effect
                }
            } else {
                echo '<script>window.alert("PW must be >= 8!")</script>'; //Do a pop up effect
            }
        }
        ?>

    </body>

</html>
