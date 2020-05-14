<?php 
	
	session_start();
	
	if ($_SESSION['username'] == null) 
	{
		header('Location:login.php');
	}

	// echo $_SESSION['username'];

 ?>

<?php require_once('layout.php'); ?>

<p>THIS IS A PRIVATE PAGE!!</p>
<a href="logout.php"><button class="btn btn-primary">LOG OUT</button></a>