<?php 



if(isset($_GET['status'])){
	if($_GET['status']=='unpublished'){

		$manufacturer_id = $_GET['id'];
		$message = $obj_sup_admin->unpublished_manufacturer_by_id($manufacturer_id);
	}elseif($_GET['status']=='published'){
		$manufacturer_id = $_GET['id'];
		$message = $obj_sup_admin->published_manufacturer_by_id($manufacturer_id);
	}elseif($_GET['status']=='delete'){
		$manufacturer_id = $_GET['id'];
		$message = $obj_sup_admin->delete_manufacturer_by_id($manufacturer_id);
	}
}


$show_manufacturer_query=$obj_sup_admin->save_all_manufacturer_info();



?>

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<h2 style="color:tomato"><?php if(isset($message)){echo $message;unset($message);}?></h2>
			<h2><?php if(isset($_SESSION['message'])){
					echo $_SESSION['message'];
					unset($_SESSION['message']);

				}?></h2>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
				<thead>
					<tr>
						<th>Manufacturer ID</th>
						<th>Manufacturer Name</th>
						<th>Manufacturer Description</th>
						<th>Publication status</th>
						<th>Actions</th>
					</tr>
				</thead>   
				<tbody>

					<?php while($row=mysqli_fetch_assoc($show_manufacturer_query)){?>
					<tr>
						<td><?php echo $row['manufacturer_id'];?></td>
						<td class="center"><?php echo $row['manufacturer_name'];?></td>
						<td class="center"><?php echo $row['manufacturer_description'];?></td>
						<td class="center">
							<?php if($row['publication_status'] ==1){
								echo "Published";
							}else{
								echo "Unpublished";
							}


							?>
						</td>
						<td class="center">
							<?php if($row['publication_status']==1){?>
							<a title="Unpublish" class="btn btn-success" href="?status=unpublished&&id=<?php echo $row['manufacturer_id'];?> ">
								<i class="halflings-icon white arrow-down"></i>  
							</a>

							<?php } else{?>

							<a title="Publish" class="btn btn-danger" href="?status=published&&id=<?php echo $row['manufacturer_id'];?>">
								<i class="halflings-icon white arrow-up"></i>  
							</a>

							<?php }?>
							<a class="btn btn-info" href="edit_manufacturer.php?id=<?php echo $row['manufacturer_id'];?>" title="Edit">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a onclick="return check_delete();" class="btn btn-danger" href="?status=delete&&id=<?php echo $row['manufacturer_id']; ?>" title="Delete">
								<i class="halflings-icon white trash"></i> 
							</a>
						</td>
					</tr>


					<?php }  ?>



				</tbody>
			</table>            
		</div>
	</div><!--/span-->

</div><!--/row-->