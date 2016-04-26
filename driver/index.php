<?php

require 'parseDB.php';
$user = checkifUserExist();
if(!$user)
{
	backToLogin();
}
$results = getLicenseNo($user);
$DPURL = getDPLink($user);

$BookingResults = getAllActiveBooking($user);
$custname = array();
$custcontact = array();

for ($i = 0; $i < count($BookingResults); $i++) { 
    $object = $BookingResults[$i];
    $name = getCustomerNameByID($BookingResults[$i]->get('LIST_BY'));
    array_push($custname,$name);
}

for ($i = 0; $i < count($BookingResults); $i++) { 
    $object = $BookingResults[$i];
    $contact = getCustomerContactByID($BookingResults[$i]->get('LIST_BY'));
    array_push($custcontact,$contact);
}


$ActiveBid = getAllActiveBid($user);
$ActiveBidListing = Array();
for($i = 0; $i < count($ActiveBid); $i++) { 
    $object = $ActiveBid[$i];
    echo $ActiveBid[$i]->getObjectId();
    array_push($ActiveBidListing,getListingByBid($ActiveBid[$i]->get('LISTING_ID')));
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
    	.borderless td, .borderless th .borderless tr{
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
	    	<div class="row">
			    <div class="col-md-8">
			    	<h1>Current Bids</h1>
			    	<table class="table">
			    		<thead>
			    			<th>Date Time</th>
			    			<th>Distance</th>
			    			<th>Bid</th>
			    			<th>Average Bid</th>
			    		</thead>
			    		<tbody>
				    		<?php
				    		for($i = 0; $i < count($ActiveBid); $i++) { 
				    			echo '<tr><td>';
							    echo $ActiveBidListing[$i]->get('START_DATETIME') ->format('d-m-Y H:i:s');
							    echo '</td><td>';
							    echo $ActiveBidListing[$i]->get('Distance');
							    echo '</td><td>';
							    echo $ActiveBid[$i]->get('OFFER_AMOUNT');
							    echo '</td><td>';
							    echo $ActiveBidListing[$i]->get('AvgBid');
							    echo '</td></tr>';
							}
				    		?>
			    		</tbody>
			    	</table>
			    	<h1>Booking</h1>
			    	<table class="table">
			    		<thead>
			    			<th>Date/Time</th>
			    			<th>Customer Name</th>
			    			<th>Location</th>
			    			<th>Contact No.</th>
			    		</thead>
			    		<tbody>
			    		<?php  
			    			for ($i = 0; $i < count($BookingResults); $i++) { 
			                  $object = $BookingResults[$i];
			                  echo  "<tr onclick=\"document.location= './tripdetail.php?trip=" . $BookingResults[$i]->getObjectId() . '\'">' .  
			                      '<td>' . $BookingResults[$i]->get('START_DATETIME') ->format('d-m-Y H:i:s'). 
			                      '<td>' . $custname[$i]. 
			                      '</td><td>' . $BookingResults[$i]->get('Source') . 
			                    '</td><td>' . $custcontact[$i] . 
			                    '</td></tr></a>';
			                }
			    		?>
			    		</tbody>
			    	</table>
			    </div>
				<div class="col-md-4">
					<div class="profile">
						<div class="row text-center">
							<img width="200" src="<?php echo $DPURL; ?>" height="200" alt="Hello"/>
						</div>
						<div class="row top-buffer">
							<table class="table borderless text-center">
								<tr><td>Name:</td><td><?php echo $user->get('name'); ?></td></tr>
								<tr><td>Vehicle No.</td><td><?php echo $results; ?></td></tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	

    
  </body>
</html>