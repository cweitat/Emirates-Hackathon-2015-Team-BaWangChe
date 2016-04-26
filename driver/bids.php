<?php
require 'parseDB.php';
$user = checkifUserExist();
if(!$user)
{
	backToLogin();
}
$results = getAllActiveListing();
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
	    	<table class="table table-hover">
	    	<thead>
	    		<th>Date/Time</th>
	    		<th>Average Bid</th>
	    		<th>Prefered Language</th>
	    		<th>Distance</th>
	    		<th>Num Of Passenger</th>
	    	</thead>
	    	<tbody>
	    		<?php
	    		 
		    		for ($i = 0; $i < count($results); $i++) { 
					  $object = $results[$i];
					  echo 	"<tr onclick=\"document.location= './tripdetail.php?trip=" . $object->getObjectId() . '\'">' .  
					  		'<td>' . $object->get('START_DATETIME') ->format('d-m-Y H:i:s'). 
					  		'</td><td>' . $object->get('AvgBid') . 
							'</td><td>' . $object->get('PrefLang') . 
							'</td><td>' . $object->get('Distance') . 
							'</td><td>' . $object->get('NumOfPassenger') . 
							'</td></tr></a>';
					}
				?>
	    	</tbody>
	    	</table>

            
		</div>

    
  </body>
</html>