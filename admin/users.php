<?php 
include_once("header.php");

?>

	<div class="">
		<?php include_once("topbar.php")?>
			
	</div>

<style>
.row.user {
    margin-top: 32px;
}

h2.text-center.text {
    display: contents;
}
</style>

<div class="container-fluid">
	
	<!-- <div class="row">
		
	
	</div> -->
	<br>
	<div class="row user">
	<div class="col-lg-2">
		<?php include_once("left_menu.php");?>
		</div>
		<div class="card col-lg-10">
			<div class="card-header">
				<h2 class="text-center text">USERS</h2>
				<button class="btn btn-primary float-right btn-sm"><i class="fa fa-plus"></i> New user</button>
			</div>
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">User id</th>
					<th class="text-center">Name</th>
					<th class="text-center">Username</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include_once('db_connect.php');
 					$users = $db->query("SELECT * FROM users order by name asc");
 					
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr>
				 	<td>
					 <?php echo $row['id'] ?>
				 	</td>
				 	<td>
				 		<?php echo $row['name'] ?>
				 	</td>
				 	<td>
				 		<?php echo $row['username'] ?>
				 	</td>
				 	<td>
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">Action</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
								  </div>
								</div>
								</center>
				 	</td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
<script>
	
$('#new_user').click(function(){
	uni_modal('New User','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})

</script>