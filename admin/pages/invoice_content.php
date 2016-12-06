<?php 
$order_id=$_GET['id'];
$customer_query_result = $obj_sup_admin->select_customer_info_by_order_id($order_id);

$customer_info =mysqli_fetch_assoc( $customer_query_result);

$payment_query_result = $obj_sup_admin->select_payment_info_by_order_id($order_id);

$payment_info =mysqli_fetch_assoc($payment_query_result);

$shipping_query_result = $obj_sup_admin->select_shipping_info_by_order_id($order_id);

$shipping_info =mysqli_fetch_assoc($shipping_query_result);

$product_info_result = $obj_sup_admin->select_product_info_by_order_id($order_id);
$product_info =mysqli_fetch_assoc($product_info_result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<link rel="stylesheet" type="text/css" href="../assets/font_end_assets/css/bootstrap.min.css">
	<style type="text/css">

		.header-title h1{
			margin: 0;
			color: #FE980F;	
		}

		.header-title{
			margin-bottom: 20px;
		}
		.customer{
			border-left: 2px solid #FE980F;
			margin-top: 20px;
			float:left;
			padding-left: 50px;
			box-sizing: border-box;
			
		}
		.shipp{
			margin-top: 20px;
			float: left;

		}
		table th{
			background: #FE980F;
			color: #fff;
			text-align: center;
		}

		table .total{
			background: #FE980F;
			color: #fff;
			font-weight: bold;
		}
		
	</style>

</head>
<body>


	<div class="container">

		<div class="row">

			<div class="col-md-10">
				<div class="col-md-4 header-logo">

					<img src="../assets/font_end_assets/images/home/logo.png">

				</div>

				<div class="col-md-4 header-title text-center">
					<h1>Invoice Eshoppers Bd</h1>
					<h6>email: eshoppersbd@eshoppersbd.com</h6>

					<h4>Invoice Number: #12345</h4>
					<h4>Invoice Date: 25/11/2016</h4>
				</div>
			</div>
		</div>

		<div class="row">	

			<div class="col-md-10">

			<div class="col-md-4 col-md-offset-2 
			shipp">

					<h4>Customer Details</h4>

					<p><b>Customer name :</b><?php echo  $customer_info['first_name'].' '.$customer_info['last_name']; ?></p>
					<p><b>Customer email :</b><?php echo $customer_info['email']; ?></p>
					<p><b>Phone No:</b><?php echo $customer_info['phone_number']; ?></p>


				</div>
				<div class="col-md-6 customer">

					<h4>Shipping Details</h4>
					<p>Address :<?php echo  $shipping_info['address']; ?></p>
					<p>Zip Code :Dhaka 1209</p>
					<p>City: <?php echo  $shipping_info['city']; ?></p>
					<p>District: <?php echo  $shipping_info['district']; ?></p>


				</div>


			</div>
		</div>
		<hr>

		<div>	

			<div class="col-md-8">
				<table class="table">

					<thead>
						<th>Product name</th>
						<th>Quantity</th>
						<th>product Price</th>
						<th>Total</th>

					</thead>

					<tbody>
						<tr>
							<td><?php echo $product_info['product_name']; ?></td>
							<td><?php echo $product_info['product_quantity']; ?> </td>
							<td> <?php echo $product_info['product_price']; ?></td>
							<td> 

								<?php 

								$total_price= $product_info['product_price']*$product_info['product_quantity'];

								$grand_total =$total_price;
								$_SESSION['order_total'] = $grand_total;
								echo $grand_total.' '.'BDT';

								?>

							</td>


						</tr>
						<tr class="total">
							<td colspan="3">Grand TOTAL</td>
							<td><?php echo $grand_total.' '.'BDT'; ?></td>
						</tr>
					</tbody>
					
				</table>

				<hr>	

				<h4>Thank You For Your Order .</h4>
				<h5>If You have any question or Replace the product please Feel free to contact with Us </h5>
			</div>

		</div>		

	</div>

	

</body>
</html>