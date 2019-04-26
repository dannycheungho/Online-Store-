<?php
	session_start();
    error_reporting(0);
	include_once 'header.php';
?>
<html>
  <body>
  <div style="margin:82px">
    <form method="post" action="send_link.php">
	<h3>Enter Email Address To Send Password Link</h3>
	
      <input type="text" name="email">
      <input type="submit" name="submit_email">
    </form>
  </div>
  </body>
</html>

<?php
	include_once 'footer.php';
?>