<?php 

$manufacturer_query = $obj_app->select_manufacturer();

$cat_query=$obj_app->select_category();

 
 


 ?>
			<div class="col-sm-3">
				<div class="left-sidebar">


					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
						
						<div class="panel panel-default">

						<?php while($row =mysqli_fetch_assoc($cat_query)){ ?>
							<div class="panel-heading">
								<h4 class="panel-title"><a href="category.php?id=<?php echo $row['category_id'];?>">

							<?php echo $row['category_name']; ?>
								</a></h4>
							</div>

						<?php } ?>
						</div>
					</div><!--/category-products-->
				
					<div class="brands_products"><!--brands_products-->
						<h2>Brands</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">


<?php while($manufacturer=mysqli_fetch_assoc($manufacturer_query)){ ?>

								<li><a href="manufacturer.php?magic=<?php echo $manufacturer['manufacturer_id'];?>"> <span class="pull-right">(50)</span><?php echo $manufacturer['manufacturer_name']; ?></a></li>
		<?php } ?>
							</ul>
						</div>
					</div><!--/brands_products-->
					
					<div class="price-range"><!--price-range-->
						<h2>Price Range</h2>
						<div class="well text-center">
							 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
							 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div><!--/price-range-->
					
					<div class="shipping text-center"><!--shipping-->
						<img src="assets/font_end_assets/images/home/shipping.jpg" alt="" />
					</div><!--/shipping-->
				
				</div>
			</div>