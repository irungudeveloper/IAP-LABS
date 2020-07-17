<?php 

  include_once  'DBConnector.php';
  include_once  'user.php';

  $con = new DBConnector;
  if(isset($_POST['btn-login'])){
   $username = $_POST['username'];
   $password = $_POST['password'];

   $instance = User::create();
   $instance->setPassword($password);
   $instance->setUsername($username);

   if($instance->isPasswordCorrect()){
      $instance->login();

      $con->closeDatabase();

      $instance->createUserSession();
   }else{
     $con->closeDatabase();
     header("Location:login.php");
   }

  }
?>

<html>
   <head>
     <title>CRUD OPERATIONS</title>
      <script type="text/javascript" src="validate.js"></script>

      <link rel="stylesheet" type="text/css" href="validate.js">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>

   <body class="jumbotron">

    <div class="container bg-white mt-5">
        <div class="row justify-content-center p-3">

            <div class="col-md-10 col-10 col-sm-10"> 
              <p class="text-center text-danger">LOGIN FORM</p>
                <form method="post" name="login" id="login" action="<?=$_SERVER['PHP_SELF'] ?>">
      
           <input type="text" name="username" placeholder="Username" required class="form-control m-2">
         
            <input type="password" name="password" placeholder="Password" required class="form-control m-2">

            <div class="row justify-content-center" >
                <button type="submit" name="btn-login" class="btn btn-solid btn-success pl-5 pr-5"> <strong>LOGIN</strong></button>
            </div>
        
         
       </form>


            </div>

          
        </div> 
    </div>
         
   </body>


</html>