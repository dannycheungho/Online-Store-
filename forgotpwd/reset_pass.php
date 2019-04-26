<?php
if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  require('config.php');
  $select=mysqli_query($db, "select Login_Email,Login_PW from login where Login_Email='$email' and Login_PW ='$pass'");
  
  if(!$select){
            echo("Error: ".mysqli_error($db) );
            exit();
  }
  if(mysqli_num_rows($select)==1)
  {
    ?>
    <form method="post" action="submit_new.php">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
    </form>
    <?php
  }
}
?>