<?php 

	require_once('config/crud_class.php');

	$crud_object = new Crud;

	if (isset($_POST['submit']))
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$city = $_POST['city'];

		$crud_object->insertStudent($fname,$lname,$city);
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>LAB-1</title>
 </head>
 <body>
 
 	<a href="index.php">View All Users</a>

 	<form action="create_user.php" method="POST">
 		<label>FIRST NAME</label>
 		<input type="text" name="fname">
 		<br>
 		<label>LAST NAME</label>
 		<input type="text" name="lname">
 		<br>
 		<label>CITY</label>
 		<input type="text" name="city">

 		<br>

 		<input type="submit" name="submit" value="Insert">

 	</form>

 </body>
 </html>