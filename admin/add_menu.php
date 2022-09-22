<?php include_once('db_connect.php');?>


<?php
  include_once('header.php'); 

 ?>


<div class="my-3">
<?php 
   include ('topbar.php') 
   ?>
</div>

<style>
    .row.menu {
    margin-top: 56px;
}
</style>

<?php 
      
	  if(isset($_POST['submit'])){
		extract($_POST);
		$sql = "INSERT INTO product_list VALUES (NULL,'$name','$description','$category_id','$price','$img')";
		$db->query($sql);
		if($db->affected_rows>0){
		  echo "Value added successful";
		}
		}
	  
	
	?>

<div class="row menu">

		<div class="col-lg-2">
		<?php
		  include_once('left_menu.php');
		 ?>
		</div>
			<!-- FORM Panel -->
			 <div class="col-md-8 m-auto">
			<form action="" method="post" class="mt-5" id="manage-menu">
				<div class="card">
					<div class="card-header">
						    <h1 class="text-center">Menu Form</h1>
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Menu Name</label>
								<input type="text" class="form-control" name="name">
							</div>
							<div class="form-group">
								<label class="control-label">Menu Description</label>
								<textarea cols="30" rows="3" class="form-control" name="description"></textarea>
							</div>
							

							 <div class="form-group">
								<label class="control-label">Category </label>
								<select name="category_id" id="" class="custom-select browser-default">
									<?php
									 $cat = $db->query("SELECT * FROM category_list order by name asc ");
									 while($row=$cat->fetch_assoc()):
									?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
									<?php
									  endwhile;
									 ?>
								</select>
								
							</div> 
							 <div class="form-group">
								<label class="control-label">Price</label>
								<input type="number" class="form-control text-right" name="price" step="any">
							</div>
							<div class="form-group">
								<label for="" class="control-label">Image</label>
								<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
							</div>
							<div class="form-group">
								<img src="<?php echo isset($image_path) ? '../assets/img/'.$cover_img :'' ?>" alt="" id="cimg">
							</div> 
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button name="submit" class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-menu').get(0).reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div> 
			<!-- FORM Panel -->