<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Load functions ->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
    <link href="../static/css/starter-template.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      //Echo Error if unable to login
    ?>
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
            <li class="active"><a href="#">Dashbord</a></li>
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
    &nbsp;
  </div>
        <div class="row">
       <h3>Confirmed trip(s)</h3>
       <table class="table table-bordered table-hover  "  >
            <tbody>
              <thead>
                <tr>
                  <th><h4>Date</h4></th>
                  <th><h4>Time</h4></th>
                  <th><h4>Location</h4></th>
                  <th><h4></h4></th>
                </tr>
              </thead> 
              <!--
           <tr>
            <td>12/12/2015</td>
            <td>06:00</td>
            <td>Kintamani, Bali, Indonesia</td>
            <td><button type="button">View</button></td>
          </tr>
        -->
          <?php
          /*==================================
          ||Connect to Database and get data||
          ==================================*/
            $query = new ParseQuery("LISTING");
            //SELECT * FROM LISTING
            $query->equalTo("STATUS","Confirmed");
            //SELECT * FROM LISTING WHERE STATUS = Confirmed
            $query->equalTo("LIST_BY",$user->getObjectId());
            //SELECT * FROM LISTING WHERE STATUS = Confirmed AND LISTBY = $user->getObjectId()
            /*============
            ||Print Data|| 
            ============*/
            $query->each(function($obj) {
              echo ("<tr>"."\n");
              echo("<td>".(date_format($obj->get("START_DATETIME"),"Y-m-d"))."</td>"."\n");
              echo("<td>".(date_format($obj->get("START_DATETIME"),"H:i"))."</td>"."\n");
              echo("<td>".$obj->get("COUNTRY")."</td>"."\n");
              echo("<td><a href=\"viewtrip.php\"\"><button type=\"button\">View</button></a></td>"."\n");
              echo("<td><a href=\"viewtrip.php\"\"><button type=\"button\">QR Code</button></a></td>"."\n");
              echo("<tr>"."\n");
            });
          ?>
   </tbody>
</table>
<br/>
  <h3>New bid(s)</h3>
             <table class="table table-hover table-bordered">
            <tbody>
              <thead>
              
                <tr>
                <th><h4>Driver</h4></th>
                <th><h4>Date</h4></th>
                <th><h4>Time</h4></th>
                <th><h4>Location</h4></th>
                <th><h4></h4></th>
</tr>
              </thead> 
    <tbody>
      <!--
           <tr>
            <td>
              Ahmad
  <td>
    12/12/2015
  </td>
<td>
06:00
</td>

<td>
  Kintamani, Bali, Indonesia
</td>


<td>   <button type="button">View</button>
  </td>
  </tr>
-->
            <?php
            $query = new ParseQuery("LISTING");
            $query->equalTo("STATUS","Pending");
            $query->equalTo("LIST_BY",$user->getObjectId());
            //echo $query->count();
            $query->each(function($obj) {
              //SELECT * FROM BIDDING WHERE LISTING_ID = LISTING.objectId
              $qry1 = new ParseQuery("BIDDING");
              $qry1->equalTo("LISTING_ID",$obj->getObjectId());
              //echo $qry1->count();
              $qry1->each(function($obj2) {
                //SELECT name FROM User WHERE objectId = BIDDING.DRIVER_ID
                $dr = new ParseUser(null,$obj2->get("DRIVER_ID"));
                $dr->fetch();
                $nme = $dr->get("name");
                echo("<tr>"."\n");
                echo("<td>".$nme."</td>"."\n");
                echo("<td>".date_format($obj2->getCreatedAt(),"Y-m-d")."</td>"."\n");
                echo("<td>".date_format($obj2->getCreatedAt(),"H:i")."</td>"."\n");
                //SELECT COUNTRY FROM LISTING WHERE LISTING.ObjectId = BIDDING.LISTING_ID
                $qry2 = new ParseQuery("LISTING");
                $qry2 -> get($obj2->get("LISTING_ID"));
                $fst = $qry2->first();
                echo("<td>".$fst->get("COUNTRY")."</td>"."\n");
                echo("<td><a href=\"viewtrip.php\"\"><button type=\"button\">View</button></a></td>\n");
                echo("</tr>"."\n");
              });
            });
          ?>

            
            

            </tbody>
          </table>
        
        </div>        
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../static/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(".trip_tbl>tbody>tr:first").children().addClass("headings");
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    -->
  </body>
</html>
