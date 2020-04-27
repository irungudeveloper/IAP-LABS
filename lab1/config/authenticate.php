<?php 

	interface Authenticate
	{
		public function isPasswordCorrect();
		public function login();
		public function logout();
		public function createFormErrorSession();
	}

 ?>