<?php 

$product_id = $_GET['id'];
$show_product_query_details=$obj_sup_admin->select_all_product_details_by_id($product_id);

$row=mysqli_fetch_assoc($show_product_query_details);
 ?>
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>View Product Details</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<tr>
					<td>Product Name</td>
					<td><?php echo $row['product_name']; ?></td>

				</tr>
				<tr>
					<td>category Name</td>
					<td><?php echo $row['category_name']; ?></td>
					
				</tr>
				<tr>
					<td>manufacturer Name</td>
					<td><?php echo $row['manufacturer_name']; ?></td>
					
				</tr>
				<tr>
					<td>Product Price</td>
					<td><?php echo $row['product_price']; ?></td>
					
				</tr>
				<tr>
					<td>Stock Amount</td>
					<td><?php echo $row['stock_amount']; ?></td>
					
				</tr>
				<tr>
					<td>Minimum Stock Amount</td>
					<td><?php echo $row['minimum_stock_amount']; ?></td>
					
				</tr>
				<tr>
					<td>Product Long Description</td>
					<td><?php echo $row['product_long_description']; ?></td>
					
				</tr>
				<tr>
					<td>Product Short Description</td>
					<td><?php echo $row['product_short_description']; ?></td>
					
				</tr>
				<tr>
					<td>Product Image</td>
					<td>
						<img style="width: 200px;height: 200px" src="<?php echo $row['product_image'];?>" alt="<?php echo $row['product_name'];?>">
					</td>
					
				</tr>
				<tr>
					<td>Publication Status</td>
					<td><?php 

					if($row['publication_status']==1){
						echo "published";
					}else{
						echo "Unpublished";
					}


					 ?></td>
					
				</tr>
			
			</table>            
		</div>
	</div><!--/span-->

</div><!--/row-->