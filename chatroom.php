<?php
	session_start();
    error_reporting(0);
    include_once 'header.php';


include_once('config2.php');
$id = $_SESSION['NickName'];
//echo "<script type='text/javascript'>alert('$id');</script>";

	if (isset($_POST['userid'])) {

	$chatkit->addUsersToRoom([
	  'room_id' => '19383866',
	  'user_ids' => ['ham', $id]
	]);

	

	
	
	}


?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">  
function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function setRandomColor() {
  $("#colorpad").css("background-color", getRandomColor());
}


function loadXMLDoc()  
{  
var xmlhttp;  
if (window.XMLHttpRequest)  
  {
  xmlhttp=new XMLHttpRequest();  
  }  
else  
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  
  }  
xmlhttp.onreadystatechange=function()  
  {  
  if (xmlhttp.readyState==4 && xmlhttp.status==200)  
    {  
    document.getElementById("message").innerHTML=xmlhttp.responseText;  
    }  
  }  
xmlhttp.open("POST","get_room_messages.php",true);  
xmlhttp.send();  
setTimeout("loadXMLDoc()",1000);  
}  
loadXMLDoc();
 
function sendMessage() {
$(document).ready(function(){
var content2=$("#content").val();
var id = '<?php Print($id); ?>';
alert(id);
$.ajax({
   
    type: "POST",
    url: "send_message.php",
    data: {
        "userid":id,
		"content":content2
            },
    error: function(jqXHR, textStatus, errorThrown) {
    alert(jqXHR.responseText);
    },
    success: function(data) {
    //alert('success');
}
   
});

});

}

function openForm() {
  location.replace("http://localhost/S356F/chat_index.php")
}


</script>  
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

#message {
	margin: 30px;
	margin-left: 28px;
}
#content {
	margin-left: 28px;
}
.right{
	border:1px solid #F00;float:right;
	} 

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
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
  max-width: 300px;
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

/* p1 button */
#p1_button {
	float: right;
}
</style>
<body>

	
	<div id="message"></div> 

	                    <div class="response" >
                        <form id="replyMessage">
                            <div class="form-group">
								<br>
                                <input type="text" placeholder="Enter Message" id='content' class="form-control" name='content' />
								<button type="button" id="p1_button" class="btn btn-primary" onclick="sendMessage()">Click</button>
                            </div>
                        </form>
                    </div>
	
	<p id="demo"></p>
	
	
		<button class="open-button" onclick="openForm()"><?php echo $_SESSION["NickName"];?>Logout</button>
	<div class="form-popup" id="myForm">
	  <form action="" class="form-container">
		<h1>Login</h1>

		<label for="email"><b>user name</b></label>
		<input type="text" placeholder="Enter Email" name="name" id='name' required>


		<button type="button" class="btn" onclick="myFunction2()" >Login</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	  </form>

	</div>
	

	
</body>
</html> 

<?php
    include_once 'footer.php';
?>



