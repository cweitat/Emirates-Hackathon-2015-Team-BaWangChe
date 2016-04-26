<?php
	require_once '/../../vendor/autoload.php';
    //require_once '/vendor/autoload.php';
    session_start();
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
    ParseClient::initialize('nfnGj0lhVukk6XdN9Ifj5srvbMKgtRhJLFuJyXeF', 'BzzHpEDrKX6sej1Uuwvy5LPLjJccBCUmrzNfXeoW', 'NQ07hpdH5KMwPBuyU4cUc6Qww1fJAzHwHKHYXmGA');


    // Login, return TRUE on successful login
    function login($username,$password){
		try{
			$user = new ParseUser();
			$user->logIn($username,$password);
		} catch(ParseException $ex){
			//Useless
			return false;
		}
		return true;
    }

    //Logouts, no return value
    function logout($user){
    	$user->logOut();
    }

    //Return true if successful, false otherwise
    function registerCustomer($username,$password,$name,$contact,$paypal){
    	$user = new ParseUser();
    	$user -> setUsername($username);
    	$user -> setPassword($password);
        $user->set("name", $name);
        $user->set("CONTACT_NUMBER", $contact);
        $user->set("PAYPAL_USERNAME", $paypal);
    	//$user -> signUp();
    	try {
  			$user->signUp();
		} catch (ParseException $ex) {
  			// error in $ex->getMessage();
  			return false;
		}
		return true;
    }

    //Return true if successful, false otherwise
    function registerDriver($username,$password,$name,$contact,$paypal,$license,$location,$vehicle){
        $user = new ParseUser();
        $user -> setUsername($username);
        $user -> setPassword($password);
        $user->set("name", $name);
        $user->set("CONTACT_NUMBER", $contact);
        $user->set("PAYPAL_USERNAME", $paypal);
        //$user -> signUp();
        try {
            $user->signUp();
        } catch (ParseException $ex) {
            // error in $ex->getMessage();
            return false;
        }
        $objectID = $user->getObjectId();
        $driver = new ParseObject("Driver");
        $driver->set("DriverObjID", $objectID);
        $driver->set("LicenseNo", $license);
        $driver->set("Location", $location);
        $driver->set("Vehicle", $vehicle);

        try {
            $driver->save();
        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            echo 'Failed to create new object, with error message: ' + $ex->getMessage();
        }

        return true;
    }

    //return User, null if unable to login
    function getUser($username,$password){
    	if (!login($username,$password))
    		return null;
    	else{
    		$user = new ParseUser();
    		$user->logIn($username,$password);
    		$user = ParseUser::getCurrentUser();
    		return $user;
    	}
    }

    //Return empty array if nothing found
    //SELECT * FROM $class_name WHERE $collumn_name = $target
    function getArr($collumn_name,$target,$class_name){
    	$query = new ParseQuery($class_name);
        $object = $query->equalTo($collumn_name,$target);
        return $query->find();
    }

    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

?>