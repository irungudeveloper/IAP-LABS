<?php 

	interface FileUpload
	{
		public function checkFileSize();
		public function checkFileExtension();
		public function checkFileExists();

	}

 ?>