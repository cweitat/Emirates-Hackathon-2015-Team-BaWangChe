<?php
require_once '../vendor/autoload.php';
session_start();
use Parse\ParseClient;
 
ParseClient::initialize('nfnGj0lhVukk6XdN9Ifj5srvbMKgtRhJLFuJyXeF', 'BzzHpEDrKX6sej1Uuwvy5LPLjJccBCUmrzNfXeoW', 'NQ07hpdH5KMwPBuyU4cUc6Qww1fJAzHwHKHYXmGA');

use Parse\ParseUser;
use Parse\ParseObject;
use Parse\ParseQuery;

function checkifUserExist()
{
	$user = ParseUser::getCurrentUser();
	if(!isset($user))
		$user = false;

	return $user;
}

function redirect($url,$permanent)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

function backToLogin()
{
	redirect('../Login.php',false);
}

function getLicenseNo($User)
{
	$query = new ParseQuery("Driver");
	$query->equalTo("DriverObjID", $User->getObjectId());
	$results = $query->find();
	$results = $results[0]->get('LicenseNo');
	return $results;
}

function getDPLink($User)
{
	$profilePhoto = $User->get("DISPLAY_PICTURE");
	$PhotoURL = $profilePhoto->getURL();
	return $PhotoURL;
}

function getAllActiveListing()
{
	$query = new ParseQuery("LISTING");
	$query->equalTo("STATUS", "Pending");
	$results = $query->find();
	return $results;
}

function getAllActiveBooking($User)
{
	$query = new ParseQuery("LISTING");
	$query->equalTo("Winner", $User->getObjectId());
	$results = $query->find();
	return $results;
}

function getAllActiveBid($User)
{
	$query = new ParseQuery("BIDDING");
	$query->equalTo("DRIVER_ID", $User->getObjectId());
	$results = $query->find();
	return $results;
}

function getListingByBid($ListingID)
{
	$query = new ParseQuery("LISTING");
	try {
	  $results = $query->get($ListingID);
	  return $results;
	  // The object was retrieved successfully.
	} catch (ParseException $ex) {
	  // The object was not retrieved successfully.
	  // error is a ParseException with an error code and message.
		return null;
	}
}

function getDriver($User)
{
	$query = new ParseQuery("Driver");
	$query->equalTo("DriverObjID", $User->getObjectId());
	$results = $query->find();
	return $results[0];
}

function getCustomerNameByID($ObjID)
{
	$query = ParseUser::query();
	$query->equalTo("objectId", $ObjID);
	$results = $query->find();
	return $results[0]->get('name');
}

function getCustomerContactByID($ObjID)
{
	$query = ParseUser::query();
	$query->equalTo("objectId", $ObjID);
	$results = $query->find();
	return $results[0]->get('CONTACT_NUMBER');
}

?>