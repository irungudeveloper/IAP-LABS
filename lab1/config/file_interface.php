<?php 

	interface FileUpload
	{

		public function correctFileSize();
		public function correctFileType();
		public function fileAlreadyExists();
		
	}

 ?>