<?php 

require "../classes/application.php";
$obj_app = new Application();
$category_query_result= $obj_app->select_all_published_category();
$manufacturer_query_result= $obj_app->select_all_manufacturer_info();


if(isset($_POST['add_product'])){

	$message =$obj_sup_admin->save_product_info($_POST);
}

?>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<fieldset>
					<h2 style="color:green"><?php if(isset($message)){echo $message;}?></h2>
					<div class="control-group">
						<label class="control-label" for="typeahead">Product Name </label>
						<div class="controls">
							<input type="text" name="product_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >

						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError">Category Name</label>
						<div class="controls">
							<select name="category_id" id="selectError" dat a-rel="chosen">
								<option>--Select Category Name--</option>
			<?php while($row = mysqli_fetch_assoc($category_query_result)){?>

						<option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>

			<?php } ?>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="selectError">Manufacturer Name</label>
						<div class="controls">

							<select name="manufacturer_id" id="selectError" dat a-rel="chosen">
							<option>--Select Manufacturer Name--</option>
			<?php  while($manu_rows=mysqli_fetch_assoc($manufacturer_query_result)){?>

								
						<option value="<?php echo $manu_rows['manufacturer_id'];?>"><?php echo $manu_rows['manufacturer_name'];?></option>
			<?php } ?>
								

							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Product Price </label>
						<div class="controls">
							<input type="number" name="product_price" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >

						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Stock Amount</label>
						<div class="controls">
							<input type="number" name="stock_amount" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >

						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Minimun Stock Amount</label>
						<div class="controls">
							<input type="number" name="minimum_stock_amount" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >

						</div>
					</div>
					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product Short Description</label>
						<div class="controls">
							<textarea name="product_short_description"class="cleditor" id="textarea2" rows="3"></textarea>
						</div>
					</div>

					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product Long Description</label>
						<div class="controls">
							<textarea name="product_long_description"class="cleditor" id="textarea2" rows="3"></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="typeahead">Product Image</label>
						<div class="controls">
							<input type="file" name="product_image" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >

						</div>
					</div>
					

					<div class="control-group">
						<label class="control-label" for="selectError">Publication Status</label>
						<div class="controls">
							<select name="publication_status" id="selectError" dat a-rel="chosen">
								<option>--Select Publication Status--</option>
								<option value="1">Published</option>
								<option value="0">Unpublished</option>

							</select>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" name="add_product" class="btn btn-primary">Save Product</button>
						<button type="reset" class="btn">Reset</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->

			</div><!--/row-->