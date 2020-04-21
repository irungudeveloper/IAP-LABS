<?php 

	require_once('config/crud_class.php');

	$crud_object = new Crud;

	if (isset($_POST['update'])) 
	{
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$city = $_POST['city'];

		try 
		{
		 
			$crud_object->updateStudent($id,$fname,$lname,$city);
			header("Location:index.php");

		}  
		catch (Exception $e) 
		{
		 	echo "Not Updated";
		} 
	}

 ?>