<?php 

	require_once('config/crud_class.php');

	

	if (isset($_POST['submit']))
	{

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$city = $_POST['city'];
		$username = $_POST['u_name'];
		$password = $_POST['password'];

		if (empty($fname) || empty($lname) || empty($city) || empty($username) || empty($password)) 
		{
			echo '<script type="text/javascript">';
			echo ' alert("Please Fill All The Fields")';  //not showing an alert box.
			echo '</script>';
		} 
		else 
		{
				
			$crud_object = new Crud;

			$crud_object->getUserData($fname,$lname,$username,$password,$city);
			$crud_object->insertUser();
			
		}
		
	}

 ?>

 <?php require_once('layout.php') ?>

 <div class="row p-0 m-0">

 	<div class="col-md-12 ">
 		<a href="index.php"><button class="btn btn-primary float-right m-3 p-2">View All Users</button></a>
 	</div>
 	
 </div>
 
 <div class="row p-0 m-0 bg-white justify-content-center m-2">
 	<div class="col-md-10">
 		
 		<form name="create_user" action="create_user.php" method="POST" class="form jumbotron p-2 m-2" onsubmit="return validateForm()">



 		<label>FIRST NAME</label>
 		<input type="text" name="fname" class="form-control">
 		<br>
 		<label>LAST NAME</label>
 		<input type="text" name="lname" class="form-control">
 		<br>
 		<label>CITY</label>
 		<input type="text" name="city" class="form-control">
 		<br>
 		<label>USERNAME</label>
 		<input type="text" name="u_name" class="form-control">
 		<br>
 		<label>PASSWORD</label>
 		<input type="password" name="password" class="form-control">

 		<br>

 		<input type="submit" name="submit" value="Insert" class="btn btn-primary p-2">

 	</form>


 	</div>
 </div>

 <script type="text/javascript" src="js/authenticate.js"></script>	

 </body>
 </html>