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

		function __construct()
		{
			$this->pdo = new Database;
			$this->connect = $this->pdo->connect();
			return $this->connect;
		}

		public function insertStudent($f_name,$l_name,$city)
		{
			$con = $this->connect;

			try 
			{
			
			$sql = "INSERT INTO student(f_name,l_name,city)VALUES(:f_name,:l_name,:city)";
			$stmt = $con->prepare($sql);
			$stmt->execute([
					'f_name'=>$f_name,
					'l_name'=>$l_name,
					'city'=>$city
			]);

			return true;
			} 
			catch (Exception $e) 
			{
				return false;
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

		public function editStudent($id)
		{
			$con = $this->connect;

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

		public function updateStudent($id,$fname,$lname,$city)
		{

			$con = $this->connect;

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

		public function deleteStudent($id)
		{

			$con = $this->connect;

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