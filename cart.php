` <?php   
 session_start();  
include_once 'db_conn.php';
error_reporting(0);
include_once 'header.php';
$id   = $_SESSION["username"];

if (isset($_POST["hidden_seller"])){
	$seller = $_POST["hidden_seller"];
	$name = $_POST["hidden_name"];
	$price = $_POST["hidden_price"];
	$brand =   $_POST["hidden_brand"];
	$img   =    $_POST["hidden_img"];
	$static =  $_POST["hidden_static"];


	$insert_sql = "INSERT INTO cart (id, photo, seller,name, brand, price, static)
	VALUES ('".$id."', '".$img."', '".$seller."', '".$name."', '".$brand."', '".$price."', '".$static."')";

	if ($conn->query($insert_sql) === TRUE) {
		//DO
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if ( isset($_GET["remove"])) {
	$remove_id = $_GET["remove"];
	$remove_sql = "delete from cart where No_record = '".$remove_id."'";
	
		if ($conn->query($remove_sql) === TRUE) {
		header("Refresh:0");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	
}


								




?>




					<div class="checkoutlist">					
						<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Photo</th>
									<th>Seller</th>
									<th>Product Name</th>
									<th>Brand</th>
									<th>Unit Price</th>
									
									<th>Total</th>
									<th>Remove</th>
								</tr>
								
								
								
							</thead>
							<tbody>
							
						<?php   
							$id = $_SESSION["username"];
							
							$sql = "SELECT * FROM cart where id = '".$id."'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									#echo "id: " . $row["id"]. " - photo: " . $row["photo"]. " " . $row["name"]. "<br>";
								
                          ?> 
								<tr>
									<td><img src="<?php echo $row["photo"]; ?>"> </td>
									<td><?php echo $row["seller"]; ?></td>
									<td><?php echo $row["name"]; ?></td>
									<td><?php echo $row["brand"]; ?></td>
									<td>$ <?php echo $row["price"]; ?></td>
									
									<td>$ <?php echo number_format( 1 * $row["price"], 2); ?></td>  
									<td><span class="text-danger"><a href="cart.php?remove=<?php echo $row["No_record"] ?>">Remove</a></span></td>
								</tr>	
		                          <?php $total = $total + (1 * $row["price"]); 
								  } ?>  
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><strong>Total: $<?php echo $total?></strong></td>
								</tr>		  
							</tbody>
							
							<?php  
							}  
							?> 
							
						</table>

						<p class="buttons center">				
							<button class="btn" type="button">Update</button>
							<button class="btn" type="button">Continue</button>
							<button class="btn btn-inverse" type="submit" id="checkout">Checkout</button>
						</p>					
					</div>

 
 
 
<?php
    include_once 'footer.php';
?>