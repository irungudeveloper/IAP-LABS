<?php 
	
	require_once('config/crud_class.php');

	$crud_object = new Crud;

	if (isset($_GET['id'])) 
	{
		$u_id = $_GET['id'];
		$data = $crud_object->editStudent($u_id);

  ?>

  <?php require_once('layout.php') ?>

  <div class="row p-0 m-0">
  	<div class="col-md-12">
  		<a href="index.php"><button class="btn btn-primary float-right m-2 p-3">View All Users</button></a>
  	</div>
  </div>

  <div class="row p-0 m-0 bg-white m-4 justify-content-center">
  	<div class="col-md-10 p-0 m-0">
  		<?php foreach ($data as $student) { ?>
  	
  		<form action="update.php" method="POST" class="form jumbotron m-4 p-2">
  			
  			<input type="hidden" name="id" value="<?php echo $student->id ?>">
  			<label>First Name</label>
  			<input type="text" name="fname" value="<?php echo $student->f_name ?>" class="form-control text-danger"> 
  			<br>

  			<label>Last Name</label>
  			<input type="text" name="lname" value="<?php echo $student->l_name ?>"  class="form-control text-danger">
  			<br>

  			<label>City</label>
  			<input type="text" name="city" value="<?php echo $student->city ?>"  class="form-control text-danger">

  			<br>

  			<input type="submit" name="update" value="Update" class="btn btn-primary p-3 ">

  		</form>
  	
  	<?php } ?>
  	</div>
  </div>

  	

<?php }
else
{
	echo "No Data";
} 
?>