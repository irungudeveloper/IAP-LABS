<?php 

	require_once('config/crud_class.php');

	$crud_object = new Crud;

	if (isset($_GET['delete'])) 
	{
		$id = $_GET['id'];

		$crud_object->getUserID($id);
		$status = $crud_object->deleteUser();

		header("Location:index.php");
	}

 ?>