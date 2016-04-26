<?php
	include_once "static/php/functions.php";
	use Parse\ParseQuery;
	$username = "test1"; $password = "123456";
	if (getUser($username,$password))
	{
		echo "TRUE";
	}
	//$arr = getArr("LIST_BY","LISTING");
	echo ("<p>HI</p>");
?>