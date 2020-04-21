<?php 

	require_once('config/crud_class.php');

	$crud_object = new Crud;

	if (isset($_GET['delete'])) 
	{
		$id = $_GET['id'];

		$status = $crud_object->deleteStudent($id);

		header("Location:index.php");
	}

 ?>