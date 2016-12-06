<?php 

if(isset($_POST['btn'])){

	$obj_app->save_order_info($_POST);
}



 ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2 class="text-center" style="color:#FE980F;">You have to Give Us Payment Information to complete Your valueable order..</h2>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2 class="text-center" style="color:#FE980F; margin-bottom: 30px">Select Your Payment Method</h2>
					<hr/>
					<form class="form-horizontal" action="" method="post">

					<table class="table table-bordered">
						<tr>
							<td>Cash On Delivery</td>
							<td><input type="radio" name="payment_type" value="cash_on_delivery"></td>
						</tr>
						<tr>
							<td>Bkash</td>
							<td><input type="radio" name="payment_type" value="paypal"></td>
						</tr>
						<tr>
							<td>Paypal</td>
							<td><input type="radio" name="payment_type" value="bkash"></td>
						</tr>
						<tr>
							<td></td>
							<td><input  class="btn btn-primary" type="submit" name="btn" value="Confirm Order"></td>
						</tr>
					</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>