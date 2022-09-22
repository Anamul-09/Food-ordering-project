<?php include_once('db_connect.php');?>


<?php
  include_once('header.php'); 

 ?>


<div class="my-3">
<?php 
   include ('topbar.php') 
   ?>
</div>




 <!-- <div class="container-fluid"> -->
	
	<!-- <div class="col-lg-12"> -->
		<div class="row menu">

		<div class="col-lg-2">
		<?php
		  include_once('left_menu.php');
		 ?>
		</div>
			<!-- Table Panel -->

			<style>
			.col-md-8.product {
				
				margin-left: 50px;
			}

			.row.menu {
				margin-top: 56px;
			}
			</style>
			
			<div class="col-md-8 product">
				<div class="card">
				<div class="card-header">
					<h1 class="text-center">Product list</h1>
				</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">Menu id</th>
									<th class="text-center">Img</th>
									<th class="text-center">Details</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								// $i = 1;
								$cats = $db->query("SELECT * FROM product_list order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $row['id'] ?></td> 

								
									<td class="text-center">
										<img src="<?php echo isset($row['img_path']) ? '../assets/img/'.$row['img_path'] :'' ?>" alt="" id="cimg">
									</td>
									<td class="">
										<p>Name : <b><?php echo $row['name'] ?></b></p>
										<p>Description : <b class="truncate"><?php echo $row['description'] ?></b></p>
										<p>Price : <b><?php echo "$".number_format($row['price'],2) ?></b></p>
									</td>
									<td class=>
									<a href="delete_product.php?id=<?php echo $row['id']?>"><i class="fa fa-trash"></i></a>
                  					  <a href="edit_product.php?id=<?php echo $row['id']?>"><i class="fa fa-edit"></i></a>

									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	<!-- </div>	 -->

<!-- </div> -->
<style>
	img#cimg,.cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset !important;
	}
	.custom-switch,.custom-control-input,.custom-control-label{
		cursor:pointer;
	}
	b.truncate {
		 overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 3; 
   -webkit-box-orient: vertical;	
    font-size: small;
    color: #000000cf;
    font-style: italic;
}
</style>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage-menu').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_menu',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_menu').click(function(){
		start_load()
		var cat = $('#manage-menu')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='description']").val($(this).attr('data-description'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='price']").val($(this).attr('data-price'))
		if($(this).attr('data-status') == 1)
			$('#availability').prop('checked',true)
		else
			$('#availability').prop('checked',false)

		cat.find("#cimg").attr('src','../assets/img/'+$(this).attr('data-img_path'))
		end_load()
	})
	$('.delete_menu').click(function(){
		_conf("Are you sure to delete this menu?","delete_menu",[$(this).attr('data-id')])
	})
	function delete_menu($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_menu',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>