
<?php
  include_once('header.php'); 

 ?>

<div class="my-3">
<?php 
   include ('topbar.php') 
   ?>
</div>


<!-- <div class="container-fluid"> -->

<style>

.col-md-10.mt-5.content {
    padding-left: 37px;
}

.row.order {
    margin-top: 56px;
}

</style>

<div class="row order">
<div class="col-md-2">
<?php include ('left_menu.php') ?>
</div>

<div class="col-md-10 content">
<div class="card">
	<div class="card-header">
		<h1 class="text-center">ORDER LIST</h1>
	</div>
		<div class="card-body">
			<table class="table table-bordered">
			
		<thead>
			 <tr>

			
			<th>Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Status</th>
			<th>Order</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			
			include_once('db_connect.php');
			$qry = $db->query("SELECT * FROM orders ");
			while($row=$qry->fetch_assoc()):
			 ?>
			 <tr>
			 		
			 		<td><?php echo $row['name'] ?></td>
			 		<td><?php echo $row['address'] ?></td>
			 		<td><?php echo $row['email'] ?></td>
			 		<td><?php echo $row['mobile'] ?></td>
			 		<?php if($row['status'] == 1): ?>
			 			<td class="text-center"><span class="badge badge-success">Confirmed</span></td>
			 		<?php else: ?>
			 			<td class="text-center"><span class="badge badge-secondary">For Verification</span></td>
			 		<?php endif; ?>
			 		<td>
			 			
						<a href="view_order.php?data-id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary view_order"  >View Order</a>
			 		</td>
			 </tr>
			<?php endwhile; ?>
		</tbody>
	</table>
		</div>
	<!-- </div> -->
	
</div>
</div>

</div>

<script>
	$('.view_order').click(function(){
		uni_modal('Order','view_order.php?id='+$(this).attr('data-id'))
	})
</script>