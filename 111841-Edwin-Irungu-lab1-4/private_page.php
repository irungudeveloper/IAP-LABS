<?php
  include_once 'DBconnector.php';
  session_start();
  
  if(!isset($_SESSION['username'])){
   header("Location: login.php");
  }

  function fetchUserApiKey()
  {
   
	$dbcon = new DBconnector();
	$user = $_SESSION['username'];
	$myquery = mysqli_query($dbcon->conn, "SELECT * FROM users WHERE username='$user'");
	$user_array = mysqli_fetch_assoc($myquery);
	$uid = $user_array['id'];
	$good = mysqli_query($dbcon->conn, "SELECT * FROM api_keys WHERE user_id = '$uid' ORDER BY `api_keys`.`id` DESC") or die(mysqli_error($dbcon->conn));
	$key =  mysqli_fetch_assoc($good);
	return $key['api_key'];

  }


?>

<html>

    <head>
       <title>CRUD OPERATIONS</title>
       <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
       <script type="text/javascript" src="validate.js"></script>
       <link rel="stylesheet" type="text/css" href="validate.css">

      <!--CSS-->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script type="text/javascript" src="apikey.js"></script>


    </head>

    <body class="container jumbotron jumbotron-fluid">
    

    <div class="row">
    <div class="col-md-12 col-12 col-sm-12"> 
        <a href="logout.php" class="btn btn-danger float-right pl-5 pr-5 mb-3">Logout</a>
    </div> 
      
    </div>

                  


          <div class="row justify-content-center bg-white p-2">
              <div class="col-sm-11 col-md-11 col-11">

        <hr>
        <p>Here, we will create an API that will allow Users/Developer to order items from external systems</p>
        <hr>
        <p>We now put this feature of allowing users to generate an API key. Click the button to generate the API key</p>

        <button class="btn btn-primary" id="api-key-btn">Generate APi key</button> <br> <br>

        <!---The text area below will hold the APi key-->
        <strong>Your API key:</strong>(Note that if your API key is already in use by already running applications, generating new key will stop the application from functioning) <br>

        <textarea name="api_key" id="api_key" cols="100" rows="2" readonly class="form-control"> <?php echo fetchUserApiKey(); ?> </textarea>

        <p>Service Description:</p>
        We have a service/API that allows extrenal applications to order food and also pull all order status by using order id. Let's do it

        <hr>


              </div>

          </div>

     
      
    </body>

</html>