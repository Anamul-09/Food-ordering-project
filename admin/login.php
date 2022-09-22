<?php 
	include_once('db_connect.php');
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
		$result = $db->query($sql);
		$data =$result->fetch_assoc();
		if($result->num_rows>0){
			session_start();
			$_SESSION['login_id']= $data['id'];
			$_SESSION['login_name']= $data['name'];
			$_SESSION['login_username']= $data['username'];
			$_SESSION['login_type']= $data['type'];
			header("Location:index.php");
			// echo "Welcome";
		}else{
			echo "Email or password may be wrong";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Online Food Ordering System</title>
 	

<?php include('header.php'); ?>


</head>
<style>
	body{
		/* width: 100%;
	    height: calc(100%); */
	    background-image: url("assets/img/bg.jpg");
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		height: 100vh;
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white; 
	 } 
	#login-right{
		/* position: absolute; */
		right:0;
		width:70%;
		height: calc(100%);
		transform: translateX(21%);
		/* opacity: .55; */
		display: flex;
		margin: auto;
		align-items: center;
	}
	
	.logo img{
		height: 80%;
		width: 80%;
		margin: auto
	}
</style>

<body>


 
  		<div id="login-right">
  			<div class="card col-md-6">
			  <div class="card-header">
				<h2>Login form</h2>
				
			  </div>
	
  				<div class="card-body">
  					<form action="" method="post" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>

						  <div class="form-group">
  							<input type="submit" name="submit" value="Login" class="form-control btn btn-success">
  						</div>
  					</form>
  				</div>
  			</div>
  			</div>
  		</div>
   
		 
 


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
</body>
</html>