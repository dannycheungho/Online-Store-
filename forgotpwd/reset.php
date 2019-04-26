<?php
	session_start();
	error_reporting(0);
	include_once 'header.php';

?>
<html>
  <body>
    <form method="post" action="send_link.php">
      <p>Enter Email Address To Send Password Link</p>
      <input type="text" name="email">
      <input type="submit" name="submit_email">
    </form>
  </body>
</html>

<?php
	include __DIR__ . "/../footer.php";
?>