<?php 

	require_once('config/crud_class.php');

	

	if (isset($_POST['submit']))
	{

//Variables for creating a user

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$city = $_POST['city'];
		$username = $_POST['u_name'];
		$password = $_POST['password'];

//Info about the profile image of the user
		$image = $_FILES['profile']['name'];
		$image_size = $_FILES['profile']['size'];
		$image_extension = pathinfo($image,PATHINFO_EXTENSION);
		
///Where the profile image will be stored
		$target_folder = "uploads/";
		$target_file = $target_folder.basename($_FILES['profile']['name']);

//Checks $ Insertion !!		

		if (empty($fname) || empty($lname) || empty($city) || empty($username) || empty($password)) 
		{
			echo '<script type="text/javascript">';
			echo ' alert("Please Fill All The Fields")';  //not showing an alert box.
			echo '</script>';
		} 
		else 
		{
				
			$crud_object = new Crud;

			$crud_object->getUserData($fname,$lname,$username,$password,$city,$image);
			$crud_object->getImageDetails($image_size,$image_extension,$target_file);

			$image_responses = array($crud_object->checkFileExists(),$crud_object->checkFileExtension(),$crud_object->checkFileSize() );

			if (in_array('0', $image_responses)) 
			{
				echo "Invalid Image upload";
			}
			else
			{
			
				$crud_object->insertUser();
				move_uploaded_file($_FILES['profile']['tmp_name'],$target_folder.$image);
			}
			
		}
		
	}

 ?>

 <?php require_once('layout.php') 
 // onsubmit="return validateForm()"
 ?>

 <div class="row p-0 m-0">

 	<div class="col-md-12 ">
 		<a href="index.php"><button class="btn btn-primary float-right m-3 p-2">View All Users</button></a>
 	</div>
 	
 </div>
 
 <div class="row p-0 m-0 bg-white justify-content-center m-2">
 	<div class="col-md-10">
 		
 		<form name="create_user" action="create_user.php" method="POST" class="form jumbotron p-2 m-2"enctype="multipart/form-data">



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

 		<label>Image Upload</label>
		<input type="file" name="profile" class="form-control"/>
		<div class="text-danger">
			<p>
				*Image must be less than 50KB's<br>
				*Extensions are jpeg,jpg or png<br>
				*Image cannot be replicated
			</p>
		</div>

		<br>

 		<input type="submit" name="submit" value="Insert" class="btn btn-primary p-2">

 	</form>


 	</div>
 </div>

 <script type="text/javascript" src="js/authenticate.js"></script>	

 </body>
 </html>