<?php
/**
 * Created by PhpStorm.
 * User: moklj
 * Date: 14/3/2015
 * Time: 6:51 PM
 */

include 'static/php/functions.php';

require 'vendor/autoload.php';

if(isset($_POST["registerBtn"]))
{
    echo "register";

    if($_POST['inlineRadioOptions'] == "customer")
    {
        echo "YOLO";
        if(registerCustomer($_POST["fuser"], $_POST["fpass"], $_POST["fname"], $_POST["fcontact"], $_POST["fpaypal"]))
        {
            echo "<script type='text/javascript'>setTimeout(function(){alert('Registered Successfully!'},5000);)</script>";
            redirect("Login.php");
        }
    }
    else if ($_POST['inlineRadioOptions'] == "driver")
    {
        if(registerDriver($_POST["fuser"], $_POST["fpass"], $_POST["fname"], $_POST["fcontact"], $_POST["fpaypal"],
            $_POST["flicense"], $_POST["flocation"], $_POST["fvehicle"]))
        {
            echo "<script type='text/javascript'>setTimeout(function(){alert('Registered Successfully as a driver!'},0);)</script>";
            redirect("Login.php");
        }

    }

}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>Registration Page</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="static/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="static/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="static/css/regstyle.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <script type="text/javascript">
        function enableCustomerField() {
            document.getElementById('licenseInput').disabled= true;
            document.getElementById('locationInput').disabled= true;
            document.getElementById('vehicleInput').disabled= true;
        }
        function enableDriverField(){
            document.getElementById('licenseInput').disabled= false;
            document.getElementById('locationInput').disabled= false;
            document.getElementById('vehicleInput').disabled= false;
        }
    </script>

</head>
<body>
<div class="container">
    <div class="row text-center pad-top ">
        <div class="col-md-12">
            <h2>Registration Page</h2>
        </div>
    </div>
    <div class="row  pad-top">

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>   Register Yourself </strong>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <br/>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                            <input type="text" class="form-control" placeholder="Your Name" name="fname" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" class="form-control" placeholder="Your Email" name="fuser"/>
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" class="form-control" placeholder="Enter Password" name="fpass"/>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" class="form-control" placeholder="Retype Password" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"  ></i></span>
                            <input type="text" class="form-control" placeholder="Contact Number" name="fcontact"/>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-usd"  ></i></span>
                            <input type="text" class="form-control" placeholder="Paypal Username" name="fpaypal"/>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"  ></i></span>
                            <input id="licenseInput" type="text" class="form-control" placeholder="License" disabled="true" name="flicense"/>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"  ></i></span>
                            <input id="locationInput" type="text" class="form-control" placeholder="Location" disabled="true" name="flocation"/>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-transfer"  ></i></span>
                            <input id="vehicleInput" type="text" class="form-control" placeholder="Vehicle" disabled="true" name="fvehicle"/>
                        </div>
                        <div class="form-group input-group">

                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="customerRadio" value="customer" onclick="enableCustomerField()" checked="checked">Customer
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="driverRadio" value="driver" onclick="enableDriverField()">Driver
                            </label>
                        </div>

                        <button class="btn btn-success " name="registerBtn">Register Me</button>
                        <hr />
                        Already Registered ?  <a href="Login.php" >Login here</a>
                    </form>
                </div>

            </div>
        </div>


    </div>
</div>


<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
<!-- CORE JQUERY  -->
<script src="static/js/jquery-1.11.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="static/js/bootstrap.js"></script>

</body>
</html>
