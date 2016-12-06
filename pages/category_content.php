<?php 

if(isset($_GET['id'])){

$category_id= $_GET['id'];
$query_result=$obj_app->select_product_info_by_category_id($category_id);

 }


 



 ?>

<section>
	<div class="container">
		<div class="row">

<?php include "includes/side_category.php"; ?>


			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Features Items</h2>
		<?php  while($row=mysqli_fetch_assoc($query_result)){ ?>		
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img   height="300" src="assets/<?php echo $row['product_image'];?>" alt="" />
									<h2><?php  echo $row['product_price'];?></h2>
									<p><?php  echo $row['product_name'];?></p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2><?php  echo $row['product_price'];?></h2>
										<p><?php  echo $row['product_name'];?></p>
										<a href="product-details.php?id=<?php echo $row['product_id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Product Details</a>
									</div>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>

<?php } ?>



					
					
					
			
					
				
					<ul class="pagination">
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li>
					</ul>
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>