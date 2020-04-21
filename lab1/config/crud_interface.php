<?php 

	interface CrudInterface
	{
		public function insertStudent($f_name,$l_name,$city);
		public function deleteStudent($id);
		public function displayAll();
		public function editStudent($id);
		public function updateStudent($id,$A,$B,$C);

	}

 ?>