<?php
require_once '../vendor/autoload.php';
session_start();
use Parse\ParseClient;
 
ParseClient::initialize('nfnGj0lhVukk6XdN9Ifj5srvbMKgtRhJLFuJyXeF', 'BzzHpEDrKX6sej1Uuwvy5LPLjJccBCUmrzNfXeoW', 'NQ07hpdH5KMwPBuyU4cUc6Qww1fJAzHwHKHYXmGA');

use Parse\ParseUser;
use Parse\ParseObject;
use Parse\ParseQuery;

ParseUser::logOut();
$user = ParseUser::getCurrentUser();
if(!isset($user))
	backToLogin();

function backToLogin()
{
	redirect('../Login.php',false);
}
function redirect($url,$permanent)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}
?>