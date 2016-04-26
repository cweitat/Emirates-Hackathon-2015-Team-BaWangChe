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
    	.borderless td,  .borderless tr{
		    border: none;
		  }
		.top-buffer { 
			margin-top:20px; 
		}
    #ExtraPanel {
      position: fixed;
    }
    </style>
    <script>
    $('document').ready(function(){
        $('#ExtraPanel').hide();
        $('#RowID').click(function() {
          $('#ExtraPanel').show();
        });
      });
    </script>
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
    <div class="col-md-8"/>
    	<div class="row">
	    	<table class="table table-hover">
          <tbody>
            <tr><th>Date and Time</th><td>23/12/2012 18:00</td></tr>
            <tr><th>Number of people</th><td>1</td></tr>
            <tr><th>Preferred Language</th><td>English</td></tr>
          </tbody>
        </table>
        <br/>
        <table class="table">
          <h3>Routes</h3>
          <tr><th>Pick-up Point</th><th>Destination</th><th>Est. Duration</th></tr>
          <tr><td>Orchard Road</td><td>Jurong East</td><td>60 mins</td></tr>
          <tr><td>Jurong East</td><td>Mandai Road</td><td>10 mins</td></tr>
          <tr><td>Mandai Road</td><td>Orchard Road</td><td>55 mins</td></tr>
        </table>
        <table class="table">
          <tbody class="">
            <tr><th>Description</th></tr>
            <tr><td>Traveller seeking for Drivers to guide me around Singapore. Hope to learn more about Singapore's Culture.</td></tr>
          </tbody>
        </table>
        
		</div>
    <div class="row">
      <table class="table table-hover">
        <thead>
          <th>You</th>
          <th>Vehicle Model</th>
          <th>Bid (USD)</th>
          <th>Ratings</th>
        </thead>
        <tbody>
          <tr id="RowID">
            <td>*</td>
            <td>Honda Civic</td>
            <td>30</td>
            <td><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></td>
          </tr>
        </tbody>
        </table>
    </div>
	</div>
  <div class="col-md-4" >
    <div class="col-md-11 col-md-offset-1">
    <div id="ExtraPanel">
      <div class="panel panel-default">
        <div class="panel-heading">Additional Perks</div>
        <div class="panel-body">
          <ul class="list-group">
            <li class="list-group-item">Free Wifi on Cab</li>
            <li class="list-group-item">Introduction to Singapore</li>
            <li class="list-group-item">Teach you Chinese</li>
            <li class="list-group-item">Free Beer on Cab</li>
            <li class="list-group-item">Flexible Scheldule</li>
          </ul>
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>

    
  </body>
</html>