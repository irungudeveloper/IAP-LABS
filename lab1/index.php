<?php 

	require_once('config/crud_class.php');

	$crud_object = new Crud;

	$data = $crud_object->displayAll();
	
 ?>

 <?php require_once('layout.php') ?>


 <div class="row p-0 m-0">
 	<div class="col-md-12">
 		<a href="create_user.php"><button class="btn btn-primary p-3 m-2 float-right">Create New User</button></a>
 		<a href="login.php"><button class="btn btn-primary p-3 m-2 pl-4 pr-4 float-right">Login</button></a>
 	</div>
 </div>

 	
 
<div class="row p-0 m-0 justify-content-center">
	<div class="col-md-11">
		<table class="table table-responsive-sm mt-4 p-3 bg-white ">
 		<thead>
 			<th>First Name</th>
 			<th>Last Name</th>
 			<th>City</th>
 			<th></th>
 			<th></th>
 		</thead>

 		<tbody>
 			<?php foreach ($data as $student) { ?>
 				<tr>
 				<td><?php echo $student->f_name ?></td>
 				<td><?php echo $student->l_name ?></td>
 				<td><?php echo $student->city ?></td>
 				<td>
 					<form method="GET" action="edit.php">
 						<input type="hidden" name="id" value="<?php echo $student->id ?>">
 						<input type="submit" name="edit" value="EDIT" class="btn btn-warning pl-3 pr-3 text-white">
 					</form>
 				</td>
 				<td>
 					<form method="GET" action="delete.php">
 						<input type="hidden" name="id" value="<?php echo $student->id ?>">
 						<input type="submit" name="delete" value="DELETE" class="btn btn-danger pl-3 pr-3 text-white">
 					</form>
 				</td>
 			</tr>

 			<?php } ?>		
 		</tbody>
 	
 	</table>
	</div>
</div>

 	

 </body>
 </html>