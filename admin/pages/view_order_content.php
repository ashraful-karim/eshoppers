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
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<h2 style="color:tomato"><?php if(isset($message)){echo $message;unset($message);}?></h2>
			<h2><?php if(isset($_SESSION['message'])){
				echo $_SESSION['message'];
				unset($_SESSION['message']);

			}?></h2>
			<table class="table table-striCped table-bordered bootstrap-datatable datatable">
				<h2>Customer Information</h2>
				<tr>
					<td width="50%">Cusmoter Name</td>
					<td><?php echo $customer_info['first_name'].' '.$customer_info['last_name']; ?></td>
				</tr>
				<tr>
					<td>Email Address</td>
					<td><?php echo $customer_info['email']; ?></td>
				</tr>

				<tr>
					<td>Phone Number</td>
					<td><?php echo $customer_info['phone_number']; ?></td>
				</tr>  
				<tr>
					<td>Address</td>
					<td><?php echo $customer_info['address']; ?></td>
				</tr>

				<tr>
					<td>City</td>
					<td><?php echo $customer_info['city']; ?></td>
				</tr>
				<tr>
					<td>District</td>
					<td><?php echo $customer_info['district']; ?></td>
				</tr>	

			</table>  
			<table class="table table-striCped table-bordered bootstrap-datatable datatable">
				<h2>Shipping Information</h2>
				<tr>
					<td width="50%">Full Name</td>
					<td><?php echo  $shipping_info['full_name']; ?></td>
				</tr>
				<tr>
					<td>Email Address</td>
					<td><?php echo  $shipping_info['email']; ?></td>
				</tr>

				<tr>
					<td>Phone Number</td>
					<td><?php echo  $shipping_info['phone_number']; ?></td>
				</tr>  
				<tr>
					<td>Address</td>
					<td><?php echo  $shipping_info['address']; ?></td>
				</tr>

				<tr>
					<td>City</td>
					<td><?php echo  $shipping_info['city']; ?></td>
				</tr>
				<tr>
					<td>District</td>
					<td><?php echo  $shipping_info['district']; ?></td>
				</tr>	

			</table> 
			<table class="table table-striCped table-bordered bootstrap-datatable datatable text-center">
				<h2>Payemnt Information</h2>
				<tr>
					<td width="50%">Payment Type</td>
					<td><?php echo $payment_info['payment_type']; ?></td>
				</tr>
				<tr>
					<td>Payment Status</td>
					<td><?php echo $payment_info['payment_status']; ?></td>
				</tr>

				<tr>
					<td>Payemnt Date</td>
					<td><?php echo $payment_info['payment_date']; ?></td>
				</tr>  


			</table>  

			<table class="table table-striCped table-bordered bootstrap-datatable datatable">
				<h2>Product Information</h2>
				<thead>
					<th>product Id</th>
					<th>Product Name</th>
					<th>Product price</th>
					<th>Product Image</th>
					<th>Product Quantity</th>
					<th>Total Price</th>

				</thead>		

				<tbody>	
					<td><?php echo $product_info['product_id']; ?></td>
					<td><?php echo $product_info['product_name']; ?></td>

					<td><?php echo $product_info['product_price']; ?></td> 
					<td><img src="<?php echo $product_info['product_image']; ?>" height="200" width="200"></td>
					<td><?php echo $product_info['product_quantity']; ?></td>   
					<td><?php echo $product_info['product_price'] * $product_info['product_quantity']; ?></td> 

				</tbody>		

			</table>        
		</div>
	</div><!--/span-->

</div><!--/row-->