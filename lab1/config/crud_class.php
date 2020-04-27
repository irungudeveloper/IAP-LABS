<?php 

	require_once('database_class.php');
	require_once('crud_interface.php');
	/**
	 * 
	 */
	class Crud extends Database implements CrudInterface
	{
		private $pdo;
		private $connect;

		private $fname;
		private $lname;
		private $username;
		private $password;
		private $hash;
		private $city;
		private $user_id;

		function __construct()
		{
			$this->pdo = new Database;
			$this->connect = $this->pdo->connect();
			return $this->connect;
		}

		public function getUserData($fname,$lname,$username,$password,$city)
		{
			$this->fname = $fname;
			$this->lname = $lname;
			$this->username = $username;
			$this->password = $password;
			$this->city = $city;
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

			$username_check = $this->isUserExist($username);


			if ($username_check = 0) 
			{
				
				try 
					{
					
						$sql = "INSERT INTO student(f_name,l_name,city,username,password)VALUES(:f_name,:l_name,:city,:username,:password)";
						$stmt = $con->prepare($sql);
						$stmt->execute([
								'f_name'=>$f_name,
								'l_name'=>$l_name,
								'city'=>$city,
								'username'=>$username,
								'password'=>$hash
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

	}

 ?>