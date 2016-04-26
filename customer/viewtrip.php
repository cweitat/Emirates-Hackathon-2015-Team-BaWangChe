<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">

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
            <li><a href="profile.php">Profile</a></li>
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

        <h2>View Trip</h2>
        <h4>Bidders will appear at the bottom of the page!</h4>
        <div>
        <table class="table">
            <tbody>
              <tr><td width="50%">
                <h4>Type of booking</h4>
  <div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
    Per Trip Service
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" disabled>
    Full Day Service
  </label>
</div>
<form class="form-horizontal">
  <div class="form-group">
    <label for="exampleInputDate">Date & time</label>
    <input type="datetime-local" class="form-control" id="exampleInputDate" readonly>
  </div>
  <div class="form-group">
    <label for="exampleInputCountry">Country</label>
    <input type="text" class="form-control" id="exampleInputCountry" placeholder="Enter Country" readonly>
  </div>
  <div class="form-group">
    <label for="exampleInputL1">Location 1</label>
    <input type="text" class="form-control" id="exampleInputL1" placeholder="Enter Address" readonly>

  <br/>
    <label for="exampleInputL2">Location 2</label>
    <input type="text" class="form-control" id="exampleInputL1" placeholder="Enter Address" readonly>
  <br/>
    <label for="exampleInputL3">Location 3</label>
    <input type="text" class="form-control" id="exampleInputL1" placeholder="Enter Address" readonly>
  </div>
  

              </td>
              <td width="40%">&nbsp; </td>
                <td>



  <div class="form-group">
    <label for="exampleInputPPL">Number of People</label>
    <input type="number" class="form-control" id="exampleInputPPL" placeholder="Enter Number of People" readonly>
  </div>
    <div class="form-group">
      <label for="addon">Additional requirements (one per line)
  <textarea class="form-control" rows="3" cols="30" readonly></textarea>
</div>
   <div class="form-group">
    <label for="exampleInputL3">Price</label>
    <input type="number" class="form-control" id="exampleInputL1" placeholder="Enter Price " readonly>
  </div>
                </td></tr>
            </tbody>
          </table>

           <h3>New bid(s)</h3>
             <table class="table table-hover table-bordered">
            <tbody>
              <thead>
              
                <tr>
                <th><h4>Driver</h4></th>
                <th><h4>Email</h4></th>
                <th><h4>Telephone</h4></th>
                <th><h4>Rating</h4></th>
                <th><h4>Price</h4></th>
                <th><h4>Additional enhancements (No surcharge)</h4></th>
                <th><h4>Accept/Reject</h4></th>
</tr>
              </thead> 
    <tbody>
      <!--
           <tr>
            <td>
              Ahmad
<td>
 ahmad@cool.com
  </td>
<td>
 +62 999999
  </td>
  <td>
    <span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star-empty" aria-hidden="false"></span>
</td>
<td>
  $1.00
</td>
<td>
  Free Fish and chips<br/>$10 Preloaded SIM card
  </td>

<td>   <button type="button">Accept</button>&nbsp;<button type="button">Reject</button>
  </td>
  </tr>
   <tr>
            <td>
              Muthu
<td>
 muthu@mail.com
  </td>
<td>
 +62 888888 
  </td>
  <td>
    <span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star" aria-hidden="true"></span><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><span class="glyphicon glyphicon-star-empty" aria-hidden="false"></span>
</td>
<td>
  $5.00
</td>
<td>
  Speak english<br/>$5 Preloaded SIM card</br>Free tour<br/>Flexible Timing 
  </td>

<td>   <button type="button">Accept</button>&nbsp;<button type="button">Reject</button>
  </td>

  </tr>
  -->
<?php
  //SELECT * FROM LISTING
  $query = new ParseQuery("LISTING");
  //SELECT * FROM LISTING WHERE STATUS = 'Pending'
  $query->equalTo("STATUS","Pending");
  //SELECT * FROM LISTING WHERE STATUS = 'Pending' AND LIST_BY = '$user->getObjectId()'
  $query->equalTo("LIST_BY",$user->getObjectId());
  //$obj = Result(SELECT * FROM LISTING WHERE STATUS = 'Pending' AND LIST_BY = '$user->getObjectId()')
  $query->each(function($obj) {
    //SELECT * FROM BIDDING
    $qry = new ParseQuery("BIDDING");
    //SELECT * FROM BIDDING WHERE LISTING_ID = $obj.ObjectId
    $qry -> equalTo("LISTING_ID",$obj->getObjectId());
    //$obj2 = Result(SELECT * FROM BIDDING WHERE LISTING_ID = $obj.ObjectId)
    $qry -> each(function($obj2){
      //Building Table
      echo ("<tr>"."\n");
      //SELECT * FROM User where ObjectId = $obj2->get("DRIVER_ID")
      $dr = new ParseUser(null,$obj2->get("DRIVER_ID"));
      //Building table
      $dr->fetch();
      echo ("<td>".($dr->get("name"))."</td>");
      $dr->fetch();
      echo("<td>".($dr->get("email"))."</td>"."\n");
      $dr->fetch();
      echo("<td>".($dr->get("CONTACT_NUMBER"))."</td>"."\n");
      $dr->fetch();
      //SELECT * FROM Driver
      $qry2 = new ParseQuery("Driver");
      //SELECT * FROM Driver WHERE DriverObjID = $dr->getObjectId()
      $qry2 -> equalTo("DriverObjID",$dr->getObjectId());
      $ob = $qry2 -> first(); //In case there was more than one result
      echo("<td>".($ob->get("RATINGS"))."/5</td>"."\n");
      echo("<td>".$obj2->get("OFFER_AMMOUNT")."</td>\n");
      echo("<td>".$obj2->get("PERKS")."</td>\n");
      echo("<td><a href=\"cfmtrip.php\"\"><button type=\"button\">Accept</button></a>&nbsp;<button type=\"button\">Reject</button></td>\n");
      echo("</tr>"."\n");
    });
  });

?>
            

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
