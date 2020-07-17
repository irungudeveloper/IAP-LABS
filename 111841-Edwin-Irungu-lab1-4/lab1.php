<?php 
   include_once "user.php";
   include_once "DBConnector.php";
   include_once "FileUploader.php";

   //Activate Database instance
   $con = new DBConnector();

   //Check for button click
   if(isset($_POST['btn-save'])){
      $first_name = $_POST['first_name'];
      $last_name  = $_POST['last_name'];
      $city       = $_POST['city_name'];
      $pass       = $_POST['password'];
      $uname       = $_POST['username'];

      $utc_timestamp = $_POST['utc_timestamp'];
      $offset = $_POST['time_zone_offset'];
      //Initialize session to set as temporary username
      $_SESSION['username'] = $uname;
      
      //Image file parameters
      $file_name = $_FILES['fileToUpload']['name'];
      $file_size = $_FILES['fileToUpload']['size'];
      $final_file_name = $_FILES['fileToUpload']['tmp_name'];
      $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));


      //Create User class instance
      $user = new User($first_name, $last_name, $city, $uname, $pass);

      //Pass timezone information to database
      $user->setUtcTimestamp($utc_timestamp);
      $user->setTimezoneOffset($offset);

      //FileUpload Instance
      $fileUpload = new FileUploader();

      //Setting the username
      $fileUpload->setUsername($uname);

      //Using setter methods
      $fileUpload->setOriginalName($file_name);
      $fileUpload->setFileType($file_type);
      $fileUpload->setFinalFileName($final_file_name);
      $fileUpload->setFileSize($file_size);

      //Check for valid criteria without Javascript
      if(!$user->validateForm())
      {
         $user->createFormErrorSessions();
         header("Location:lab1.php");
         die();
      }else{
		if ($fileUpload->fileWasSelected()) {
			// echo "SELECTED"."<br>";
			if ($fileUpload->fileTypeisCorrect()) {
				// echo "CORRECT TYPE"."<br>";
				if ($fileUpload->fileSizeIsCorrect()) {
					// echo "CORRECT SIZE"."<br>";

					if (!($fileUpload->fileAlreadyExists())) {
						// echo "FILE DOESNT EXIST"."<br>";
				    $user->save();
					 $fileUpload->uploadFile() ;

					}else{
						echo "FILE EXISTS"."<br>";

					}

				}else{
					echo "PICK A SMALLER SIZE"."<br>";
				}

			}else{
				echo "INCORRECT TYPE"."<br>";
			}


		}else{echo "NO FILE DETECTED"."<br>";}
	}
   $con->closeDatabase();
     






      // if($res){
      //       $con->closeDatabase();
      //       header("Location:lab1.php");
      // }else{
      //    $con->closeDatabase();
      //    echo "Unexpected error ):";
      // }
   }

?>




<html>
   <head>
        <title>CRUD OPERATIONS</title>
        <script type="text/javascript" src="validate.js"></script>
        <link rel="stylesheet" type="text/css" href="validate.css">

        <!-- Added Javascript paths--->
        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
       
       <script type="text/javascript" src="timezone.js"></script>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   </head>

   <body class="container jumbotron">

    
          <div class="row justify-content-center bg-white mb-3"> 
              <div class="col-sm-10 col-md-10 col-10">

                    <div class="row"> 
                      <div class="col-12 col-sm-12 col-md-12">
                            <p class="text-danger text-center mt-2">REGISTRATION FORM</p>

                      </div>
                      
                    </div>

                      <form method="post" name="user_details" id="user_details" onsubmit="return validateForm()" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF'] ?>">
         
                  <div id="form-errors">
                        <?php 
                        
                           session_start();
                             if(!empty($_SESSION['form_errors'])){
                              echo " ". $_SESSION['form_errors'] ."<br>";
                              unset($_SESSION['form_errors']);
                           }

                            if(!empty($_SESSION['exists'])){
                              echo " ". $_SESSION['exists'];
                              unset($_SESSION['exists']);
                           }
                           
                        ?>
                  </div> 
                 
            
               <input type="text"  name="first_name" required placeholder="First name" class="form-control m-2">
           <input type="text" name="last_name" placeholder="Last name" class="form-control m-2">
            <input type="text" name="city_name" placeholder="City" class="form-control m-2">
            <input type="text" name="username" id="uname" placeholder="Username" class="form-control m-2">
            <input type="password" name="password" placeholder="Password" class="form-control m-2">
            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control m-2">

            <div class="row justify-content-center"> 
               <button type="submit" name="btn-save" id="submit" class="btn btn-solid btn-success pl-5 pr-5  m-2">
              <strong>SAVE</strong> 
            </button>
            </div>
           
            <input type="hidden" name="utc_timestamp" id="utc_timestamp" value=""> 
            <input type="hidden" name="time_zone_offset" id="time_zone_offset" value="">
            
            <div class="row justify-content-center">
                <p> Already have an account <a href="login.php">Login</a></p> 
            </div>
            
       </form>

  

              </div>
              
                  
          </div> 
     

     

        <div class="row justify-content-center bg-white p-2">
                
          <p class="text-center text-danger">Results from the database:</p>
            <div class="col-sm-10 col-md-10 col-10">

               <?php 
      
             $user_disp= User::create();
             $user_disp->readAll();
      
              ?>


            </div> 
        </div>

     

   </body>

</html>