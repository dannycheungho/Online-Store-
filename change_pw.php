<?php
    session_start();
    error_reporting(0);
    include_once 'header.php';
?>

<div class="container" style="margin-bottom: 40px;">
    <div class="col-md-12">
        <h2 class="page-header">Change Password</h2>
        <form role="form" method="post">
            <div class="form-group">
                <label for="password_v2">New password</label>
                <input type="password" class="form-control" name="password_v2" placeholder="Enter new passowrd" required>
            </div>
            <div class="form-group">
                <label for="password_v3">Confirm new password</label>
                <input type="password" class="form-control" name="password_v3" placeholder="Password" required>
            </div>
            <div class="btn-group">
                <button type="submit" name="submit" value="Submit" class="btn btn-default">Submit</button>
                <button type="submit" class="btn btn-default" onclick="location.href='personal_info.php';return false;">Cancel</button>
            </div>
        </form>
    </div>
</div>

<?php

if ($_SESSION['username'] == NULL) {
    header('Location: login_page.php');
}

$pw_1 = $_POST['password_v2'];
$pw_2 = $_POST['password_v3'];

if (isset($_POST['submit'])) {
    if ((strlen($pw_1) >= 8) && (strlen($pw_2) >= 8)) {
        if ($pw_1 == $pw_2) {
            //echo 'same';
            $salt1 = "qy1s";    // DON'T EDIT
            $salt2 = "21ma";    // DON'T EDIT

            $new_pw = md5($salt1 . $pw_1 . $salt2);

            include_once 'db_conn.php';

            $query5 = "UPDATE login SET Login_PW = '" . $new_pw . "'" . " WHERE Login_Email = '" . $_SESSION['username'] . "'";
            echo $query5;


            if (mysqli_query($conn, $query5)) {
                echo '<script>window.alert("Password Changed!")</script>';
                echo "<script>window.location = 'personal_info.php'</script>";
            } else {
            }
        } else {
            echo '<script>window.alert("Incorrect Password Comfirmation!")</script>';
        }
    } else {
        echo '<script>window.alert("PW must be >= 8!")</script>';
    }
}
?>


<?php
    include_once 'footer.php';
?>

