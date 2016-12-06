<?php 

$manufacturer_id = $_GET['id'];
$update_manufacturer_query=$obj_sup_admin->select_manufacturer_info_by_id($manufacturer_id);

$row=mysqli_fetch_assoc($update_manufacturer_query);

if(isset($_POST['edit_manufacturer'])){

	$message =$obj_sup_admin->update_manufacturer_info($_POST);
}

?>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Manufacturer</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form name="edit_manufacturer_form" class="form-horizontal" action="" method="post">
				<fieldset>
					<h2 style="color:green"><?php if(isset($message)){echo $message;}?></h2>
					<div class="control-group">
						<label class="control-label" for="typeahead">Manufacturer Name </label>
						<div class="controls">
							<input type="text" name="manufacturer_name" class="span6 typeahead" id="typeahead" value="<?php echo $row['manufacturer_name'];?>">

							<input type="hidden" name="manufacturer_id" class="span6 typeahead" id="typeahead" value="<?php echo $row['manufacturer_id'];?>">

						</div>
					</div>



					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Manufacturer Description</label>
						<div class="controls">
							<textarea name="manufacturer_description" class="cleditor" id="textarea2" rows="3">
					<?php echo $row['manufacturer_description'];?></textarea>
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
						<button type="submit" name="edit_manufacturer" class="btn btn-primary">Save Manufacturer</button>
						<button type="reset" class="btn">Reset</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div><!--/span-->
</div><!--/row-->

<script type="text/javascript">
	document.forms['edit_manufacturer_form'].elements['publication_status'].value="<?php echo $row['publication_status'];?>"
</script>