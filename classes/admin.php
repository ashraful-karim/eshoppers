<?php 

class Admin{

	private $connection ;

	public function __construct(){
		$host_name ="localhost";
		$user_name="root";
		$db_password="";
		$db_name ="ashraful_eshoppers";

		$this->connection =mysqli_connect($host_name,$user_name,$db_password,$db_name);

		if(!$this->connection){
			die("DataBase is not Connected".mysqli_error($this->connection));
		}

	}

	public function admin_login_check($data){

		$email_address = $data['email_address'];
		$password =md5($data['password']);

		$query = "SELECT * FROM tbl_admin WHERE email_address ='$email_address' AND admin_password ='$password' ";

		$admin_login_query = mysqli_query($this->connection,$query);

		$admin_info = mysqli_fetch_assoc($admin_login_query);

		if($admin_info){

			session_start();
			$_SESSION['admin_id']=$admin_info['admin_id'];
			$_SESSION['admin_name']=$admin_info['admin_name'];
			
			

			header('Location:admin_master.php');

		}else{

			$message = "Your email And password is invalid";

			return $message;
		}


	}
}





 ?>