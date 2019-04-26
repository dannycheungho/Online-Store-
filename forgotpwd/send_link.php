<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

error_reporting(0);

include_once 'header.php';

$_SESSION['username'];

$_SESSION['NickName'];

$_SESSION['search_condition'];

if(isset($_POST['submit_email']) && $_POST['email'])
{
  //mysqli_connect('localhost','root','');
  //mysqli_select_db('s356f');
  require('config.php');
  $pass="";
  $email = $_POST['email'];
 // echo $email;
  $select=mysqli_query($db, "select Login_Email,Login_PW from login where Login_Email='$email'");
  
  if(!$select){
            echo("Error: ".mysqli_error($db) );
            exit();
        }
  
  if(mysqli_num_rows($select)>0)
  {
    while($row=mysqli_fetch_array($select))
    {
      $email=md5($row['Login_Email']);
      $pass=$row['Login_PW'];
    }

//Load Composer's autoloader
require './vendor/autoload.php';
	$email = $_POST['email'];
	$mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "cheungkahoforwork@gmail.com";
    // GMAIL password
    $mail->Password = "p43q77d24g09";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='cheungkahoforwork@gmail.com';
    $mail->FromName='IT9 inc.';
    $mail->AddAddress($email, "user");
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password';
    $mail->Body    = 'http://localhost/s356f/reset_pass.php?key='.$email.'&reset='.$pass;
	if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
}
?>

 
<?php
	include(dirname(__FILE__).'footer.php');
?>