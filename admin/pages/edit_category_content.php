<?php 

$category_id = $_GET['id'];
$show_category_query = $obj_sup_admin->select_category_info_by_id($category_id);
$row = mysqli_fetch_assoc($show_category_query);

if(isset($_POST['update_category'])){

	$message =$obj_sup_admin->update_category_info($_POST);
}

 ?>

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="" method="post" name="edit_category_form">
						  <fieldset>
						  <h2 style="color:green"><?php if(isset($message)){echo $message;}?></h2>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Category Name </label>
							  <div class="controls">
								<input type="text" name="category_name" class="span6 typeahead" id="typeahead" value="<?php echo $row['category_name'];?>">
								<input type="hidden" name="category_id" class="span6 typeahead" id="typeahead" value="<?php echo $row['category_id'];?>">
								
							  </div>
							</div>
							

							          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea name="category_description"class="cleditor" id="textarea2" rows="3"><?php echo $row['category_description'];?></textarea>
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
							  <button type="submit" name="update_category" class="btn btn-primary">Update Category</button>
							  <button type="reset" class="btn">Reset</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
			<script type="text/javascript">
				document.forms['edit_category_form'].elements['publication_status'].value="<?php echo $row['publication_status'];?>"
			</script>