<?php
require 'parseDB.php';
$user = checkifUserExist();
if(!$user)
{
  backToLogin();
}
$driverObj = "";
$name = "";
$email = "";
$location = "";
$model = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $location = $_POST["location"];
  $model = $_POST["model"];

  $user->set("name", $name);
  $user->set("email", $email);
  $user->set("location", $location);
  $user->set("model", $model);
  $user->save();
    // …
}else if($_SERVER['REQUEST_METHOD'] === 'GET'){
  $driverObj = getDriver($user);
  $name = $user->get('name');
  $email = $user->get('email');
  $location = $driverObj->get('Location');
  $model = $driverObj->get('Vehicle');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <script src="../static/js/jquery-1.11.2.js"></script>
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">
    <script src="../static/js/bootstrap.min.js"></script>
    <style type="text/css">
    	td{
    		width:auto;
    	}
    	.borderless td, .borderless th, .borderless tr{
		    border: none;
		}
		.top-buffer { 
			margin-top:20px; 
		}
    .nodegap {
      margin-top: 5px;
      margin-bottom: 5px;
    }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php include 'NavBar.php';?>
    <div class="container">
      <form method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="<?php echo $name;?>" placeholder="Enter Name">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input type="email" class="form-control" name="email" id="exampleInputPassword1" value="<?php echo $email;?>" placeholder="Email">
        </div>

        <div class="form-group">
          <label for="exampleInputFile">Dislay Picture</label>
          <input type="file" id="exampleInputFile">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Location</label>
          <input type="text" class="form-control" name="location" id="exampleInputPassword1" value="<?php echo $location;?>" placeholder="City">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Vehicle Model</label>
          <input type="text" class="form-control" name="model" id="exampleInputPassword1" value="<?php echo $model;?>" placeholder="Model of Vehicle">
        </div>
        <button type="submit" class="btn  btn-primary" style="float:right;">Submit</button>

      </form>
    </div>

    
  </body>
</html>