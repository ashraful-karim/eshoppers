<?php 

if(isset($_POST['btn'])){

	$message=$obj_app->update_cart_product_quantity($_POST);
}

if(isset($_GET['status'])){

	$cart_id = $_GET['id'];
	$message = $obj_app->delete_cart_by_id($cart_id);
}
$session_id = session_id();
$query_result=$obj_app->select_cart_product_by_session($session_id);


 ?>
<section id="cart_items">
	<div class="container">

	
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			  
			</ol>
		</div>

		<div class="breadcrumbs">
			<ol class="breadcrumb">
			<h2 style="color:#FE980F"><?php if(isset($message)){echo $message; unset($message);} ?></h2>
			  
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>


			<?php $sum= 0;while($row=mysqli_fetch_assoc($query_result)){?>
					<tr>
						<td class="cart_product">
							<a href=""><img width="100" height="100"
							src="assets/<?php echo $row['product_image'];?>" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href=""><?php echo $row['product_name']; ?></a></h4>
							<p>Product ID: <?php echo $row['product_id']; ?></p>
						</td>
						<td class="cart_price">
							<p><?php echo $row['product_price']; ?></p>
						</td>
						<td class="cart_quantity">
						<form action="" method="post">
							<div class="cart_quantity_button">
								
								<input class="cart_quantity_input" type="text" name="product_quantity" value="<?php echo $row['product_quantity']; ?>" autocomplete="off" size="2">
								<input  type="hidden" name="temp_cart_id" value="<?php echo $row['temp_cart_id']; ?>">
								<input name="btn"  type="submit" value="Update">
							</div>

						</form>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
			<?php 

				$total_price= $row['product_price']*$row['product_quantity'];

				$grand_total =$total_price;
				$_SESSION['order_total'] = $grand_total;
				echo 'BDT '.$grand_total;

			 ?>

							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="?status=delete&&id=<?php echo $row['temp_cart_id'];?>"><i class="fa fa-times"></i></a>
						</td>
					</tr>

					<?php $sum = $sum +$total_price;}  ?>
					
				</tbody>
			</table>
			<table class="table table-bordered table-responsive text-center" style="width: 50%;float: right;color:#FE980F;font-weight: bold;font-size: 20px">
				<tr>
					<td>SUB TOTAL</td>
					<td><?php echo "BDT".' '.$sum; ?></td>
				</tr>
				<tr>
					<td>VAT TOTAL</td>
					<td><?php 
					$vat = ($sum*15)/100;
					echo "BDT".' '.$vat; 

					?></td>
				</tr>
				<tr>
					<td>Grand TOTAL</td>
					<td><?php 


					echo "BDT".' '.($sum + $vat); ?></td>
				</tr>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">

				<?php 

				$customer_id = isset($_SESSION['customer_id']);
				$shipping_id = isset($_SESSION['shipping_id']);
				if($customer_id == NULL && $shipping_id == NULL){

				?>
					<a href="checkout.php" class="btn btn-primary pull-right">CheckOut</a>

				<?php }elseif($customer_id != NULL && $shipping_id ==NULL){ ?>
				
				<a href="shipping.php" class="btn btn-primary pull-right">CheckOut</a>	

				<?php }elseif($customer_id !=NULL && $shipping_id != NULL){ ?>

				<a href="payment.php" class="btn btn-primary pull-right">CheckOut</a>

				<?php } ?>
					<a href="index.php" class="btn btn-primary">Continue Shopping</a>
				</div>
			</div>
		</div>
	</div>
	
</div>

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
							
						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
						
						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>$59</span></li>
						<li>Eco Tax <span>$2</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>$61</span></li>
					</ul>
						<a class="btn btn-default update" href="">Update</a>
						<a class="btn btn-default check_out" href="">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
