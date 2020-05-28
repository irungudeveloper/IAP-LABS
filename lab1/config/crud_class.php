<?php 

	require_once('database_class.php');
	require_once('crud_interface.php');
	require_once('authenticate.php');
	require_once('file_interface.php');
	/**
	 * 
	 */
	class Crud extends Database implements CrudInterface,Authenticate,FileUpload
	{
		//DB_Connection Variables
		private $pdo;
		private $connect;

		//User Data Variables
		private $fname;
		private $lname;
		private $username;
		private $password;
		private $hash;
		private $city;
		private $user_id;
		private $profile;

		//Profile verification variables
		private $img_size;
		private $img_extension;
		private $img_path;

		function __construct()
		{
			$this->pdo = new Database;
			$this->connect = $this->pdo->connect();
			return $this->connect;
		}


		// --------------------------------------------------------------------------//
		// Profile image verification functions -- Interface FileUpload

		public function getImageDetails($size,$extension,$path)
		{
			$this->img_size = $size;
			$this->img_extension = $extension;
			$this->img_path = $path;
		}

		public function checkFileSize()
		{
			if ($this->img_size < 50000) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function checkFileExtension()
		{

			$accepted_extensions = array('jpeg','jpg','png');

			if ( in_array($this->img_extension, $accepted_extensions) ) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function checkFileExists()
		{
			if (!file_exists($this->img_path)) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}


		// End of verifying profile image
		// --------------------------------------------------------------------------//

		// --------------------------------------------------------------------------//
		// All CRUD operations for users
		public function getUserData($fname,$lname,$username,$password,$city,$image)
		{
			$this->fname = $fname;
			$this->lname = $lname;
			$this->username = $username;
			$this->password = $password;
			$this->city = $city;
			$this->profile = $image;
		}

		public function getUserID($id)
		{
			$this->user_id = $id;
		}

		public function getUserUpdateData($id,$fname,$lname,$city)
		{

			$this->fname = $fname;
			$this->lname = $lname;
			$this->city = $city;
			$this->user_id = $id;

		}

		public function isUserExist($username)
		{
			$con = $this->connect;

			$sql ="SELECT username FROM student WHERE username=:username";

			try 
			{
				$stmt = $con->prepare($sql);
				$stmt->execute([
							'username'=>$username
						]);
				$data = $stmt->rowCount();

				return $data;

			} 
			catch (PDOException $e) 
			{
				return false;
			}
		}

		public function insertUser()
		{
			$con = $this->connect;

			$f_name = $this->fname;
			$l_name = $this->lname;
			$city = $this->city;
			$username = $this->username;
			$hash = password_hash($this->password, PASSWORD_DEFAULT);
			$image = $this->profile;

			$username_check = $this->isUserExist($username);


			if ($username_check == 0) 
			{
				
				try 
					{
					
						$sql = "INSERT INTO student(f_name,l_name,city,username,password,profile)VALUES(:f_name,:l_name,:city,:username,:password,:image)";
						$stmt = $con->prepare($sql);
						$stmt->execute([
								'f_name'=>$f_name,
								'l_name'=>$l_name,
								'city'=>$city,
								'username'=>$username,
								'password'=>$hash,
								'image'=>$image
						]);

						return true;
					} 

				catch (PDOException $e) 
					{
						return false;
					}

			}
			else
			{

				echo "Username Already Exists.. Pick Another One";
			}
			
		}

		public function displayAll()
		{
			$con = $this->connect;

			try 
			{
				$sql = "SELECT * FROM student";
				$stmt = $con->prepare($sql);
				$stmt->execute();

				$student = $stmt->fetchAll();

				return $student;
			} 
			catch (Exception $e) 
			{
				return false;
			}
		}

		public function editUser()
		{
			$con = $this->connect;
			$id = $this->user_id;

			try 
			{
				$sql ="SELECT * FROM student WHERE id=:id";
				$stmt = $con->prepare($sql);
				$stmt->execute([

						'id'=>$id

				]);

				$student = $stmt->fetchAll();

				return $student;

			} 
			catch (Exception $e) 
			{
				return false;
			}
		}

		public function updateUser()
		{

			$con = $this->connect;

			$id = $this->user_id;
			$fname = $this->fname;
			$lname = $this->lname;
			$city = $this->city;

			try {
				
				$sql = "UPDATE student SET f_name = :fname , l_name = :lname, city = :city WHERE id = :id";
				$stmt = $con->prepare($sql);
				$stmt->execute([
						'id'=>$id,
						'fname'=>$fname,
						'lname' => $lname,
						'city' => $city
				]);

				return true;

			} 
			catch (Exception $e) 
			{
				
				return false;
			}

		}

		public function deleteUser()
		{

			$con = $this->connect;
			$id = $this->user_id;

			try 
			{
				$sql = "DELETE FROM student WHERE id=:id";
				$stmt = $con->prepare($sql);
				$stmt->execute([

						'id'=>$id

					]);

				return true;
			} 
			catch (Exception $e) 
			{
				return false;
			}

		}

		// END OF CRUD OPERATIONS ON THE USERS
		// -----------------------------------------------------------------------------//
		
		//  Login functionalities of the USER
		// -----------------------------------------------------------------------------//
		public function loginUserDetails($username,$password)
		{
			$this->username = $username;
			$this->password = $password;

		}

		public function loginUser()
		{
			$con = $this->connect;
			$username = $this->username;
			$password = $this->password;

			$sql = "SELECT password FROM student WHERE username=:username";

			try 
			{
				$stmt = $con->prepare($sql);
				$stmt->execute([

						'username'=>$username

				]);

				$result = $stmt->rowCount();
				$data = $stmt->fetchAll();

				if ($result != 0) 
				{
					foreach ($data as $dbpassword) 
					{
						$hash = $dbpassword->password;
					}

					if (password_verify($password, $hash)) 
					{
						return true;
					}
					else
					{
						return 403;
					}
				}
				else
				{
					return 404;
				}

			} 
			catch (PDOException $e) 
			{
				return false;
			}
		}

		// END OF LOGIN FUNCTIONALITY
		// ------------------------------------------------------------------------------//

	}

	// END OF CLASS USER
	// ----------------------------------------------------------------------------------//

 ?>