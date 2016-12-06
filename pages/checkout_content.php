<?php 

if(isset($_POST['signup'])){

	$obj_app->save_customer_info($_POST);


}

 ?>
 <script type="text/javascript">
 	
 	var xmlHttp = new XMLHttpRequest();
 	function ajax_email_check(given_email,objID){

 	var server_page = 'customer_email_check.php?email='+given_email;
 	xmlHttp.open('GET',server_page);
 	xmlHttp.onreadystatechange = function (){

 			if(xmlHttp.readyState ==4 && xmlHttp.status ==200 ){

 				document.getElementById(objID).innerHTML=xmlHttp.responseText;

 				if(xmlHttp.responseText == 'email address is already exists'){
 					document.getElementById('signup').disabled=true;
 				}else{
 					 document.getElementById('signup').disabled=false;
 				}
 			}
 		}

 		xmlHttp.send(null);
 	}
 </script>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2 class="text-center text-success">You have to Login to complete Your valueable order. If you are not resgistered please register first .</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-6 col-lg-6 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<h2 style="color:#FE980F;margin-bottom: 20px;text-align:center">Register Here</h2>
				<form  class="" action="" method="post" style="width:60%;margin:0 auto;padding-bottom: 50px">
						<div class="from-group">
							<label class="">First Name</label>
							<input class="form-control" type="text" name="first_name" placeholder="Enter Your first Name">
						</div>
						<div class="from-group">
							<label class="">Last Name</label>
							<input class="form-control" type="text" name="last_name" placeholder="Enter Your last Name">
						</div>
			
						<div class="from-group">
							<label>Email</label>
							<input class="form-control" type="email" name="email" placeholder="Enter Your email" onblur="ajax_email_check(this.value,'res');">
							<span id="res"></span>
						</div>
						<div class="from-group">
							<label>Password</label>
							<input class="form-control" type="password" name="password" placeholder="Enter Your Password">
						</div>
						<div class="from-group">
							<label>Phone No</label>
							<input class="form-control" type="number" name="phone_number" placeholder="Enter Your Mobile Number">
						</div>
						<div class="from-group">
							<label>Address</label>
							<textarea name="address" class="form-control"></textarea>
						</div>
						<div class="from-group">
							<label>District</label>
							<input class="form-control" type="text" name="district" placeholder="Enter Your District">
						</div>
						<div class="from-group">
							<label>City</label>
							<input class="form-control" type="text" name="city" placeholder="Enter Your City">
						</div>
						<input type="submit" id="signup" name="signup" class="btn btn-primary btn-block" value="Sign Up">


					</form>
				
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-6 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-body">
			<h2 style="color:#FE980F;margin-bottom: 20px;text-align: center">Login Here</h2>
				<form action="" method="post" style=" width:50%;margin:0 auto;padding-bottom: 50px">
					<div class="from-group">
						<label>Email</label>
						<input class="form-control" type="email" name="email">
					</div>
					<div class="from-group">
						<label>Password</label>
						<input class="form-control" type="password" name="password">
					</div>
					<input type="submit" name="login" class="btn btn-primary btn-block" value="Log In">
				</form>
			</div>
		</div>
	</div>
</div>
</div>