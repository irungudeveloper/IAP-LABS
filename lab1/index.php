<?php 

	require_once('config/crud_class.php');

	$crud_object = new Crud;

	$data = $crud_object->displayAll();
	
 ?>

 <?php require_once('layout.php') ?>

 	<button class="btn-primary pl-3 pr-3 text-white float-right m-3 p-3"><a href="create_user.php" class="m-2 text-white">Create New User</a></button>
 
 	<table class="table table-responsive-sm mt-4 p-3">
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
 						<input type="submit" name="edit" value="EDIT" class="btn-warning pl-3 pr-3 text-white">
 					</form>
 				</td>
 				<td>
 					<form method="GET" action="delete.php">
 						<input type="hidden" name="id" value="<?php echo $student->id ?>">
 						<input type="submit" name="delete" value="DELETE" class="btn-danger pl-3 pr-3 text-white">
 					</form>
 				</td>
 			</tr>

 			<?php } ?>		
 		</tbody>
 	
 	</table>

 </body>
 </html>