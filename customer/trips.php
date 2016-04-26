<!DOCTYPE html>
<html lang="en">
  <head>
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
       <style type="text/css"></style>
    <?php
      require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php');
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
            <li><a href="index.php">Dashboard</a></li>
            <li  class="active"><a href="#">Trips</a></li>
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
  <br/>
  <div class="row"  align="right"><a href="newtrip.php">
   <input  class="btn btn-info" type="submit" value="+ New Trip"></a>
  </div>
  <br/>
        <div class="row">
       
       <table class="table table-hover table-bordered">
            <tbody>
              <thead>
                <tr>
                <th><h4>Date</h4></th>
                <th><h4>Time</h4></th>
                <th><h4>Location</h4></th>
                <th><h4>Status</h4></th>
                <th><h4>Actions</h4></th>
                </tr>
              </thead> 
              <!--
              <tr class="success">
                <td>12/12/2015</td>
                <td>06:00</td>
                <td>Kintamani, Bali, Indonesia</td>
                <td>CONFIRMED</td>
                <td><button type="button">Delete</button>  <button type="button">View</button></td>
              </tr>
              <tr class="warning">
                <td>12/04/2015</td>
                <td>01:00</td>
                <td>Selangor, Malaysia</td>
                <td>PENDING</td>
                <td><button type="button">Delete</button><button type="button">View</button></td>
              </tr>
              <tr class="warning">
                <td>20/03/2015</td>
                <td>12:40</td>
                <td>UOB City Hall, Singapore</td>
                <td>PENDING</td>
                <td><button type="button">Delete</button><button type="button">View</button></td>
              </tr>
              <tr class="active">
                <td>12/12/2014</td>
                <td>05:40</td>
                <td>Kuala Lumpur International Airport, Malaysia</td>
                <td>CLOSED</td>
                <td><button type="button">Delete</button><button type="button">View</button></td>
              </tr>
            -->
            <?php
                //$ths = getArr("LIST_BY",$user->getObjectId(),"LISTING");
                $query = new ParseQuery("LISTING");
                $query->equalTo("LIST_BY",$user->getObjectId());
                $query->each(function($obj) {
                  $stat = $obj->get("STATUS");
                echo("<tr class=".($stat == "Confirmed" ? "success" : ($stat == "Pending"? "warning" : "active")).">"."\n");
                echo("<td>".(date_format($obj->get("START_DATETIME"),"Y-m-d"))."</td>"."\n");
                echo("<td>".(date_format($obj->get("START_DATETIME"),"H:i"))."</td>"."\n");
                echo("<td>".($obj->get("COUNTRY"))."</td>"."\n");
                echo("<td>".($obj->get("STATUS"))."</td>"."\n");
                echo("<td>");
                if ($obj->get("STATUS") != "Confirmed")
                  echo("<button type=\"button\">Delete</button>");
                echo("<a href=\"viewtrip.php\"\"><button type=\"button\">View</button></a>"."</td>"."\n");
                echo("</tr>"."\n");
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
