<?php

session_start();

error_reporting(0);

include_once 'db_conn.php';

include_once 'header.php';



$query4 = "SELECT * FROM personal_info WHERE Email_Address = '" . $_SESSION['username'] . "'";

$query14 = 'SELECT COUNT(Islike) FROM product_info WHERE Seller_Email = "' . $_SESSION["username"] . '"' . " AND Islike = 'L'";  //find someone like
$query15 = 'SELECT COUNT(Islike) FROM product_info WHERE Seller_Email = "' . $_SESSION["username"] . '"' . " AND Islike = 'D'";  //find someone dislike

//echo $query4;
//echo $_SESSION['username'];
$result = mysqli_query($conn, $query4);

$L = mysqli_query($conn, $query14); //like
$D = mysqli_query($conn, $query15); //dislike
$like_point = 0;

if(($C_L = mysqli_fetch_array($L)) && ($C_D = mysqli_fetch_array($D))){
    $like_point = $like_point + $C_L[0] - $C_D[0];
     //var_dump($row10[0]);
    //if($row11 = mysqli_fetch_array($D)) {
    //$like_point = $like_point + $row10[0] - $row11[0];
    //echo "$like_point";
    //var_dump($row10[0]);
    //echo "<br>";
    //var_dump($row11[0]);
    //}
    //var_dump($result2);
}
/*
if($row11 = mysql_fetch_array($result3)) {
    $like_point = $like_point - $row11[0];
    echo "$like_point";
}
*/
while ($row1 = mysqli_fetch_array($result)) {
    echo '<div class="container" style="margin-bottom: 40px;">';
    echo '<div class="col-md-12">';
    echo '<h2 class="page-header">Personal Info</h2>';
    echo '<table  style="width:100%">';
    echo '<tr><td style="padding: 15px 0px; width: 17%;">Nickname</td><td style="padding: 15px 0px; width: 83%;">' . $row1["Name"] . "</td></tr>";
    echo '<tr><td style="padding: 15px 0px; width: 17%;">Customer name</td><td style="padding: 15px 0px; width: 83%;">' . $row1["LastName"] . " " . $row1["FirstName"] . "</td></tr>";
    echo '<tr><td style="padding: 15px 0px; width: 17%;">Email address</td><td style="padding: 15px 0px; width: 83%;">' . $row1["Email_Address"] . "</td></tr>";
    echo '<tr><td style="padding: 15px 0px; width: 17%;">Gender</td><td style="padding: 15px 0px; width: 83%;">' . $row1["Gender"] . "</td></tr>";
    echo '<tr><td style="padding: 15px 0px; width: 17%;">Mark</td><td style="padding: 15px 0px; width: 83%;">' . $like_point . "</td></tr>";
    echo '<tr><td style="padding: 15px 0px; width: 17%;">Password</td><td><form action="change_pw.php" style="margin-bottom: 0px;"><button type="submit" class="btn btn-default">Change Password</button></form>';
    echo '</table>';
}
/*
if ($_SESSION['NickName'] != NULL) {

    echo "<a href='logout.php'>Logout</a><br>";
    echo "<a href='change_pw.php'>Change Password</a><br>";
} else {
    echo '<a href="login_page.php">Please Login</a>';
}
*/
?>

</div>

</div>

<?php
    include_once 'footer.php';
?>