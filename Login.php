<html>
    <head>
        <title>Login</title>
        <script type="text/javascript" src="static/js/jquery-1.11.2.js"></script>
        <script type="text/javascript" src="static/js/bootstrap.js"></script>


        <link href="static/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="static/css/signin.css" rel="stylesheet">




    </head>
    <body>
        <div class="container">

            <form class="form-signin" action="Login.php" method="post">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" id="inputUsername" class="form-control" placeholder="Email address" name="fuser" autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="fpass">
            <div class="checkbox">

            </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="signinBtn">Sign in</button>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="signupBtn">Sign up</button>
            </form>
        </div>
    </body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: moklj
 * Date: 14/3/2015
 * Time: 3:47 PM
 */
include 'static/php/functions.php';
require 'vendor/autoload.php';
if(isset($_POST["signinBtn"]))
{
    $user = getUser($_POST["fuser"], $_POST["fpass"]);
    $isDriver = $user->get("isDriver");

    if(!isset($user))
        echo 'Login Failed';

    if($isDriver)
    {
        echo 'Driver Failed';
        redirect("driver/index.php");
    }
    else
    {
        echo 'Passenger Failed';
        redirect("customer/index.php");
    }
}

if(isset($_POST["signupBtn"]))
{
    redirect("registration.php");
}


?>