<?php 
	
	require_once('config/crud_class.php');

	$crud_object = new Crud;

	if (isset($_GET['id'])) 
	{
		$u_id = $_GET['id'];
		$data = $crud_object->editStudent($u_id);

  ?>

  	<?php foreach ($data as $student) { ?>
  	
  		<form action="update.php" method="POST">
  			
  			<input type="hidden" name="id" value="<?php echo $student->id ?>">
  			<label>First Name</label>
  			<input type="text" name="fname" value="<?php echo $student->f_name ?>">
  			<br>

  			<label>Last Name</label>
  			<input type="text" name="lname" value="<?php echo $student->l_name ?>">
  			<br>

  			<label>City</label>
  			<input type="text" name="city" value="<?php echo $student->city ?>">

  			<br>

  			<input type="submit" name="update" value="Update">

  		</form>
  	
  	<?php } ?>

<?php }
else
{
	echo "No Data";
} 
?>