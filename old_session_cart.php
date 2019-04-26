 <?php   
 session_start();  
include_once 'db_conn.php';
error_reporting(0);
include_once 'header.php';

 if(isset($_POST["addtocart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
					 'item_seller'               =>     $_POST["hidden_seller"],
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
					 'item_brand'          =>     $_POST["hidden_brand"],
					 'item_img'          =>     $_POST["hidden_img"],  
                     'item_static'          =>     $_POST["hidden_static"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],
				'item_seller'               =>     $_POST["hidden_seller"],
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_brand'          =>     $_POST["hidden_brand"],
				'item_img'          =>     $_POST["hidden_img"],  
                'item_static'          =>     $_POST["hidden_static"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
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
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?> 
								<tr>
									<td><img src="<?php echo $values["item_img"]; ?>"> </td>
									<td><?php echo $values["item_seller"]; ?></td>
									<td><?php echo $values["item_name"]; ?></td>
									<td><?php echo $values["item_brand"]; ?></td>
									<td>$ <?php echo $values["item_price"]; ?></td>
									
									<td>$ <?php echo number_format( 1 * $values["item_price"], 2); ?></td>  
									<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
								</tr>	
		                          <?php $total = $total + (1 * $values["item_price"]); 
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