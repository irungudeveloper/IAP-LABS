<?php 

	require_once('config/crud_class.php');

	if (isset($_POST['login'])) 
	{

		

		$username = $_POST['uname'];
		$password = $_POST['password'];

		

		$crud_object = new Crud;

		$crud_object->loginUserDetails($username,$password);
		$result = $crud_object->loginUser();

		if ($result == true) 
		{
			session_start();

			$_SESSION['username'] = $username;

			header('Location:private.php');
		}
		elseif ($result == 404) 
		{
			echo "Invalid Username";
		}
		elseif ($result == 403) 
		{
			echo "Invalid Password";
		}
	}

 ?>


 <?php require_once('layout.php') ?>

 <div class="row p-0 m-0">
 	<div class="col-md-12">
 		<a href="create_user.php"><button class="btn btn-primary p-3 m-2 float-right">Create New User</button></a>
 	</div>
 </div>
 
 <div class="row p-0 m-0 bg-white justify-content-center m-3 mt-5">
 		
 		<div class="col-md-10">

 			<form method="POST" action="login.php" class="form jumbotron p-2 m-2">
 				
 				<label>USERNAME</label>
		 		<input type="text" name="uname" class="form-control">
		 		<br>
		 		<label>PASSWORD</label>
		 		<input type="password" name="password" class="form-control">
		 		<br>
		 		<input type="submit" name="login" class="btn btn-primary p-2" value="LOG IN">

 			</form>
 			
 		</div>
 	
 </div>

 <script type="text/javascript" src="js/ajax-login-auth.js"></script>


 </body>
 </html>