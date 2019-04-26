<?php
    session_start();
    error_reporting(0);
    include_once 'header.php';
?>
<?php
session_start();
include_once('config2.php');
$id = $_SESSION["NickName"];
try {
 if ( isset ( $_POST['userid'] ) ) { 
 $id = $_SESSION["NickName"];
 $chatkit->createUser([
   'id' => $id,
   'name' => $id,
   'avatar_url' => 'https://placekitten.com/400/500',
 ]);
 
	$chatkit->addUsersToRoom([
	  'room_id' => '19383866',
	  'user_ids' => ['ham', $id]
	]);
 

 header("Location:chatroom.php");
 }
}
catch (exception $e) {
 echo "Username already use";
}


    //則其一寫就好

?>

<html>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: absolute;
  bottom: 93px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
  
}

/* Add styles to the form container */
.form-container {
  max-width: 600px;
  width: 290px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">  

function openForm() {
  document.getElementById("myForm").style.display = "block";
  document.getElementById("myDiv").style.display = "none";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}


$(document).ready(function(){
  $("#username").click(function(){
	var id = "null";
    $.post("chat_index.php",
    {
      userid: id
    },
    function(data,status){
      location.replace("chatroom.php")
    });
  });
});


</script>
</head>
<body>

<button class="open-button" onclick="openForm()">chat here</button>
<div class="form-popup" id="myForm" >
  <form action="" class="form-container">
    <h1>Login</h1>


    <button type="button" class="btn" onclick="myFunction2()" name="username" id="username" >Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

</body>
</html>


<?php
    include_once 'footer.php';
?>