<?php 



	$customer_id = $_SESSION['customer_id'];

	if(isset($_POST['shipping'])){

		$obj_app->save_shipping_info($_POST);

	}

	$query_result= $obj_app->select_all_customer_info($customer_id);

	$row=mysqli_fetch_assoc($query_result);



 ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2 class="text-center text-success">Welcome <?php echo $_SESSION['customer_name'];?>You have to fill up shipping address to complete Your valueable order..</h2>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-6 col-lg-6 col-sm-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<h2 style="color:#FE980F;margin-bottom: 20px;text-align:center">Shipping Details Here</h2>
			<form  class="" action="" method="post" style="width:60%;margin:0 auto;padding-bottom: 50px">
					<div class="from-group">
						<label class="">Full Name</label>
						<input class="form-control" type="text" name="full_name" placeholder="Enter Your first Name" value="<?php echo $row['first_name'].' '.$row['last_name'];?>">
					</div>
					
		
					<div class="from-group">
						<label>Email</label>
						<input class="form-control" type="email" name="email" placeholder="Enter Your email" value="<?php echo $row['email'];?>">
					</div>
					
					<div class="from-group">
						<label>Phone No</label>
						<input class="form-control" type="number" name="phone_number" placeholder="Enter Your Mobile Number" value="<?php echo $row['phone_number'];?>">
					</div>
					<div class="from-group">
						<label>Address</label>
						<textarea name="address" class="form-control"><?php echo $row['address'];?></textarea>
					</div>
					<div class="from-group">
						<label>District</label>
						<input class="form-control" type="text" name="district" placeholder="Enter Your District" value="<?php echo $row['district'];?>">
					</div>
					<div class="from-group">
						<label>City</label>
						<input class="form-control" type="text" name="city" placeholder="Enter Your City" value="<?php echo $row['city'];?>">
					</div>
					<input type="submit" name="shipping" class="btn btn-primary btn-block" value="Send Order">


				</form>
			
		</div>
	</div>
</div>