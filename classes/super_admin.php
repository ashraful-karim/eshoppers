<?php 

class Super_admin{

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

	/*Insert category in to data base*/

public function save_category_info($data){


$query = "INSERT INTO tbl_category (category_name,category_description,publication_status) VALUES ('$data[category_name]','$data[category_description]','$data[publication_status]')";
$add_category_query = mysqli_query($this->connection,$query);

if($add_category_query){
	$message ="Category added successfully";
	return $message;
}else{
	die("QUERY FAILED".mysqli_error($this->connection));
}

}

/*show all data in manage category page*/

public function save_all_category_info(){

	$query = "SELECT * FROM tbl_category";
	$show_category_query = mysqli_query($this->connection,$query);

	if($show_category_query){
		return $show_category_query;
	}else {
		die("Query Failed".mysqli_error($this->connection));
	}

}


/*logout admin master page*/
public function logout(){
	
	unset($_SESSION['admin_name']);
	unset($_SESSION['admin_id']);
	
		header('Location:index.php');
	
}
/*Unpublished category function*/
public function unpublished_category_by_id($category_id){

	$query = "UPDATE tbl_category SET publication_status = 0 WHERE category_id='$category_id'";
	$unpublished_category_query = mysqli_query($this->connection,$query);

	if($unpublished_category_query){
		$message = "The category is unpublished Successfully";
		return $message;
	}else {
		die("Query Failed".mysqli_error($this->connection));
	}

}

/*Published category by id*/
public function published_category_by_id($category_id){
		$query = "UPDATE tbl_category SET publication_status = 1 WHERE category_id='$category_id'";
	$published_category_query = mysqli_query($this->connection,$query);

	if($published_category_query){
		$message = "The category is published Successfully";
		return $message;
	}else {
		die("Query Failed".mysqli_error($this->connection));
	}


}


/*Select all category info by id query*/
public function select_category_info_by_id($category_id){

	$query = "SELECT * FROM tbl_category WHERE category_id = '$category_id'";
	$show_category_query = mysqli_query($this->connection,$query);

	if($show_category_query){
		
		return $show_category_query;
	}else {
		die("Query Failed".mysqli_error($this->connection));
	}

}

/*Update category info */

public function update_category_info($data){
	$query = "UPDATE tbl_category SET category_name='$data[category_name]',category_description='$data[category_description]',publication_status='$data[publication_status]' WHERE category_id = '$data[category_id]'";
	$update_category_query = mysqli_query($this->connection,$query);

	if($update_category_query){
		$_SESSION['message'] = 'Category Updated successfully';
		header('Location:manage_category.php');
		
	}else {
		die("Query Failed".mysqli_error($this->connection));
	}
}

/*Delete category by id*/
	 public function delete_category_by_id($category_id){
	 	$query = "DELETE FROM tbl_category WHERE category_id='$category_id'";
	 	$delete_category_query = mysqli_query($this->connection,$query);

	 	if($delete_category_query){
	 		$message = 'Category Deleted Successfully';
	 		return $message;
	 			
	 	}else {
	 		die("Query Failed".mysqli_error($this->connection));
	 	}
	 }

	 /*save Manufacturer Info*/

	 public function save_manufacturer_info($data){

	 		$query = "INSERT INTO tbl_manufacturer (manufacturer_name,manufacturer_description,publication_status) VALUES ('$data[manufacturer_name]','$data[manufacturer_description]','$data[publication_status]')";
	 		$add_manufacturer_query = mysqli_query($this->connection,$query);

	 		if($add_manufacturer_query){
	 			$message ="Manufacturer added successfully";
	 			return $message;
	 		}else{
	 			die("QUERY FAILED".mysqli_error($this->connection));
	 		}


	 }

	 /*select all manufacturer info */

	 public function save_all_manufacturer_info(){

	 		$query = "SELECT * FROM tbl_manufacturer";
	 		$show_manufacturer_query = mysqli_query($this->connection,$query);

	 		if($show_manufacturer_query){
	 			return $show_manufacturer_query;
	 		}else {
	 			die("Query Failed".mysqli_error($this->connection));
	 		}

	 }


	 /*Unpublished manufacturer by id*/

	 public function unpublished_manufacturer_by_id($manufacturer_id){

	 	$query = "UPDATE tbl_manufacturer SET publication_status = 0 WHERE manufacturer_id='$manufacturer_id'";
	 	$unpublished_manufacturer_query = mysqli_query($this->connection,$query);

	 	if($unpublished_manufacturer_query){
	 		$message = "The Manufacturer is unpublished Successfully";
	 		return $message;
	 	}else {
	 		die("Query Failed".mysqli_error($this->connection));
	 	}


	 }

	 /*Published Manufacturer By id */

	 public function published_manufacturer_by_id($manufacturer_id){

	 	$query = "UPDATE tbl_manufacturer SET publication_status=1 WHERE manufacturer_id = '$manufacturer_id'";


	 	$published_manufacturer_query=mysqli_query($this->connection,$query);

	 	if($published_manufacturer_query){
	 		$message = "The Manufacturer is Published Successfully";
	 		return $message;
	 	}else {
	 		die("Query Failed".mysqli_error($this->connection));
	 	}
	 }

	 public function select_manufacturer_info_by_id($manufacturer_id){

	 	$query = "SELECT * FROM tbl_manufacturer WHERE manufacturer_id = '$manufacturer_id'";
	 	$update_manufacturer_query = mysqli_query($this->connection,$query);

	 	if($update_manufacturer_query){
	 		return $update_manufacturer_query;
	 	}else {
	 		die("Query Failed".mysqli_error($this->connection));
	 	}

	 }

	 /*Update manufacturer data*/

	 public function update_manufacturer_info($data){

	 	$query = "UPDATE tbl_manufacturer SET manufacturer_name='$data[manufacturer_name]',manufacturer_description='$data[manufacturer_description]',publication_status='$data[publication_status]' WHERE manufacturer_id='$data[manufacturer_id]'";

	 	$update_manufacturer_query=mysqli_query($this->connection,$query);
	 	if($update_manufacturer_query){
	 		$_SESSION['message']="<h2 style='color:lightgreen'>"."Manufacturer Item Updated Successfully"."</h2>";
	 		header('Location:manage_manufacturer.php');
	 	}


	 }

	 /*Delete Manufacturer by id*/

	 public function delete_manufacturer_by_id($manufacturer_id){
	 	$query = "DELETE FROM tbl_manufacturer WHERE manufacturer_id='$manufacturer_id'";

	 	if(mysqli_query($this->connection,$query)){
	 		$message = "Manufacturer Info Delete Successfully";
	 		return $message;
	 	}else{
	 		die("Delete Query Failed".mysqli_error($this->connection));
	 	}


	 }

	 /*Save product info and upload a product image  */

	 public function save_product_info($data){

	 	$directory = '../assets/product_images/';
	 	$target_file = $directory.$_FILES['product_image']['name'];
	 	$file_type = pathinfo($target_file,PATHINFO_EXTENSION);
	 	$file_size = $_FILES['product_image']['size'];
	 	$image = getimagesize($_FILES['product_image']['tmp_name']);
	 	if($image){
	 		if(file_exists($target_file)){
	 			die("The Image Is already Exist");
	 		}else{
	 			if($file_size > 5242880){
	 				die('File is too large');
	 			}else{
	 				if($file_type !='jpg' && $file_type !='png' && $file_type != 'gif'){
	 					die('File type is not valid');
	 				}else{
	move_uploaded_file($_FILES['product_image']['tmp_name'],$target_file);
	$query ="INSERT INTO tbl_product (product_name,category_id,manufacturer_id,product_price,stock_amount,minimum_stock_amount,product_short_description,product_long_description,product_image,publication_status) VALUES('$data[product_name]','$data[category_id]','$data[manufacturer_id]','$data[product_price]','$data[stock_amount]','$data[minimum_stock_amount]','$data[product_short_description]','$data[product_long_description]','$target_file','$data[publication_status]')";

	if(mysqli_query($this->connection,$query)){
		$message="Product uploaded successfully";
		return $message;
	}else{
		die('Product Upload Failed'.mysqli_error($this->connection));
	}
	 				}
	 			}
	 		}

	 	}else{
	 		die('The is not an Image file,Please insert a image');

	 	}
	 	
	 }


	 /*Select all Product Info*/

	 public function select_all_product_info(){

	 	$query ="SELECT p.product_id,p.product_name,p.category_id,p.manufacturer_id,p.product_price,p.stock_amount,p.publication_status,c.category_name,m.manufacturer_name FROM tbl_product as p,tbl_category as c,tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id";
	 	$show_product_query = mysqli_query($this->connection,$query);

	 	if($show_product_query){
	 		return $show_product_query;

	 	}else{
	 		die('Select Product Query Failed'.mysqli_error($this->connection));
	 	}


	 }


	 /*Select product Info for View product Details*/


	 public function select_all_product_details_by_id($product_id){
	 		$query ="SELECT p.*,c.category_name,m.manufacturer_name FROM tbl_product as p,tbl_category as c,tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND p.product_id=$product_id";
	 		$show_product_query_details = mysqli_query($this->connection,$query);

	 		if($show_product_query_details){
	 			return $show_product_query_details;

	 		}else{
	 			die('Select Product Query Failed'.mysqli_error($this->connection));
	 		}

	 }


	 public function unpublished_product_by_id($product_id){

	 	$query = "UPDATE tbl_product SET publication_status=0 WHERE product_id = '$product_id'";
	 	if(mysqli_query($this->connection,$query)){
	 		$message ="Product Is Unpublished successfully";
	 		return $message;
	 	}else{
	 		die("Product Unpublished Failed".mysqli_error($this->connection));
	 	}
	 }

	 public function published_product_by_id($product_id){

	 	$query = "UPDATE tbl_product SET publication_status=1 WHERE product_id = '$product_id'";
	 	if(mysqli_query($this->connection,$query)){
	 		$message ="Product Is Published successfully";
	 		return $message;
	 	}else{
	 		die("Product Published Failed".mysqli_error($this->connection));
	 	}
	 }

	 public function delete_product_by_id($product_id){
	 	$query = "DELETE FROM tbl_product WHERE product_id='$product_id'";

	 	$delete_product_query = mysqli_query($this->connection,$query);

	 	if($delete_product_query){
	 		$message = "Product is Deleted Succesfully";
	 		return $message;
	 	}else{
	 		die("Product Delete Query Failed".mysqli_error($this->connection));
	 	}

	 }

	 /*Mange order page Query */

	 public function select_all_order_info(){

	 	$query = "SELECT o.*,c.first_name,c.last_name,p.payment_type,p.payment_status FROM tbl_order as o,tbl_customer as c, tbl_payment as p WHERE o.customer_id=c.customer_id AND o.order_id=p.order_id ";
	 	if(mysqli_query($this->connection,$query)){

	 		$query_result =mysqli_query($this->connection,$query);
	 		return $query_result;

	 	}else{
	 		die("Manage Order Query Failed".mysqli_error($this->connection));
	 	}


	 }

	 /* Select customer info by order id for View order Details*/

	 public function select_customer_info_by_order_id($order_id){

	 	$query = "SELECT o.order_id,o.customer_id,c.* FROM tbl_order as o,tbl_customer as c WHERE o.customer_id = c.customer_id AND o.order_id='$order_id'";

	 	$customer_query_result =mysqli_query($this->connection,$query);
	 	if($customer_query_result){
	 		return $customer_query_result;
	 	}else{
	 		die('Customer Info by Order Id query failed'.mysqli_error($this->connection));
	 	}

	 }

	 /* payment Query for view order details*/

	 public function select_payment_info_by_order_id($order_id){

	 	$query = "SELECT o.order_id,p.* FROM tbl_payment as p,tbl_order as o WHERE o.order_id=p.order_id AND o.order_id='$order_id'";

	 	$payment_query_result =mysqli_query($this->connection,$query);
	 	if($payment_query_result){
	 		return $payment_query_result;
	 	}else{
	 		die('Payment Info by Order Id query failed'.mysqli_error($this->connection));
	 	}
	 }

	 /*Shipping Query for view order details*/

	 public function select_shipping_info_by_order_id($order_id){
	 	$query = "SELECT o.order_id,o.shipping_id,s.* FROM tbl_shipping as s,tbl_order as o WHERE o.shipping_id=s.shipping_id AND o.order_id='$order_id' ";

	 	$shipping_query_result =mysqli_query($this->connection,$query);
	 	if($shipping_query_result){
	 		return $shipping_query_result;
	 	}else{
	 		die('Shipping Info by Order Id query failed'.mysqli_error($this->connection));
	 	}


	 }

	 public function select_product_info_by_order_id($order_id){

	 	$sql = "SELECT o.*,p.product_id FROM tbl_product as p, tbl_order_details as o WHERE o.product_id = p.product_id AND o.order_id = '$order_id'";

	 	$product_info_result = mysqli_query($this->connection,$sql);
	 	if($product_info_result){
	 		return $product_info_result;
	 	}else{
	 		die('Product info query failed'.mysqli_error($this->connection));
	 	}


	 }

	 /* */


}

?>