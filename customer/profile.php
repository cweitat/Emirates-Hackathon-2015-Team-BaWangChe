<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
    <link href="../static/css/starter-template.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
      <style type="text/css">
      td{
        width:auto;

      }
      tr, td, table{
        border:none;
      }
    .top-buffer { 
      margin-top:20px; 
    }
    #ExtraPanel {
      position: fixed;
    }
    </style>
    <?php
      //require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php');
      include '../static/php/functions.php';
      use Parse\ParseObject;
      use Parse\ParseQuery;
      use Parse\ParseACL;
      use Parse\ParsePush;
      use Parse\ParseUser;
      use Parse\ParseInstallation;
      use Parse\ParseException;
      use Parse\ParseAnalytics;
      use Parse\ParseFile;
      use Parse\ParseCloud;
      use Parse\ParseClient;
      /*===========
      ||Test User||
      ===========*/
      $username = "test1";
      $password = "123456";
      $user = getUser($username,$password);
      if ($user == NULL)
        echo("ERROR OCCURED!");
    ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <nav id="nav_bar" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">BWC</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashbord</a></li>
            <li><a href="trips.php">Trips</a></li>
            <li class="active"><a href="#">Profile</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
            <div class=" navbar-text" id='logout_button'>
              <li><a class="navbar-link" href='#'>Logout</a></li>
             </div>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
  <div class="col-md-12"/>
        <div class="row">

        <h2>Welcome <?php echo($user->get("name")); ?>!</h2>
        <h4>Here's your profile overview!</h4>
        <div>
        <table class="table">
            <tbody>
              <tr><td>
<form class="form-horizontal">
  <div class="form-group">
    <label for="exampleInputFirstName1">Name</label>
    <input type="text" class="form-control" id="exampleInputFirstName1" placeholder="Enter Name" disabled="true" value='<?php echo($user->get("name")); ?>'>
  </div>
  <div class="form-group">
    <label for="exampleInputLastName1">Telephone</label>
    <input type="tel" class="form-control" id="exampleInputLastName1" placeholder="Enter Phone Number" value='<?php echo($user->get("CONTACT_NUMBER")); ?>'>
  </div>
  <div class="form-group">
    <label for="exampleInputAddress">Address</label>
    <input type="text" class="form-control" id="exampleInputAddress" placeholder="Enter Address" value='<?php echo($user->get("Address")); ?>'>
  </div>
  <div class="form-group">
    <label for="exampleInputCountry">Country</label>
    <input type="text" class="form-control" id="exampleInputCountry" placeholder="Enter Country" value='<?php echo($user->get("COUNTRY")); ?>'>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email" value='<?php echo($user->get("email")); ?>'>
  </div>
   <div class="checkbox">
    <label>
      <input type="checkbox" checked='<?php echo(($user->get("email")) == ($user->get("PAYPAL_EMAIL"))? "true":"false") ?>'> Paypal Email is same as email above.
    </label>
  </div><br/>
  <div class="form-group">
    <label for="exampleInputPPEmail">Paypal Email</label>
    <input type="email" class="form-control" id="exampleInputPPEmail" placeholder="Enter Paypal Email" value='<?php echo($user->get("PAYPAL_EMAIL")); ?>'>
  </div>
 
 
  <button type="submit" class="btn btn-default">Save Settings</button>
</form>
              </td>
              <td width="40%">&nbsp; </td>
                <td>
<img src="../resources/dp.jpg" width="210">
<br/>
<form class="form-horizontal">
 <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Only .jpg and .png accepted.</p>
  </div>

  <div class="form-group">
    <label for="exampleInputNewPassword">New Password</label>
    <input type="password" class="form-control" id="exampleInputNewPassword" placeholder="Enter New Password">
  </div>
  <div class="form-group">
    <label for="exampleInputANewPassword">Type again your new Password</label>
    <input type="password" class="form-control" id="exampleInputANewPassword" placeholder="Enter New Password">
  </div>
  <button type="submit" class="btn btn-default">Save Password</button>

                </td></tr>
            </tbody>
          </table>
        </div>        
      </div>
          </tbody>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../static/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    -->
  </body>
</html>
