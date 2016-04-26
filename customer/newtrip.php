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

    #gobtn{
      width:0%;
    }
    </style>

<script>
var x = document.getElementById("exampleInputA1");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    x.innerHTML = position.coords.latitude + 
    "," position.coords.longitude; 
}
</script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">

function typeCheck() {
    if (document.getElementById('full').checked) {
        document.getElementById('location').style.display = 'block';
    }
    else document.getElementById('location').style.display = 'none';

}

</script>
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

        <h2>New Trip</h2>
        <h4>Fill the form to have drivers to bid for your trip!</h4>
        <div>
        <table class="table">
            <tbody>
              <tr><td width="10%">
                <h4>Type of booking</h4>
  <div class="radio">
  <label>
    <input type="radio" onclick="javascript:typeCheck();"  name="optionsRadios" id="semi" value="option1" checked>
    Per Trip Service
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" onclick="javascript:typeCheck();" name="optionsRadios" id="full" value="option2">
    Full Day Service
  </label>
</div>
<form class="form-horizontal">
  <div class="form-group">
    <label for="exampleInputDate">Date & time</label>
    <input type="datetime-local" class="form-control" id="exampleInputDate" >
  </div>
  <div class="form-group">
    <label for="exampleInputCountry">Country</label>
    <input type="text" class="form-control" id="exampleInputCountry" placeholder="Enter Country">
  </div>
   <div class="form-group">
      <label for="exampleInputA1">Pick-up location</label>
            <div class="input-group">

                <div class="input-group">

               <input type="text" class="form-control" id="exampleInputL1" placeholder="Enter Address"> 
               <span id="gobtn" class="input-group-btn">
                  <button class="btn btn-default" type="button">
                     Go!
                  </button>
               </span>
            </div><!-- /input-group -->
      </div>
      <br/>
  <div class="form-group">
      <label for="exampleInputL1">Destination 1</label>
            <div class="input-group">

               <input type="text" class="form-control" id="exampleInputL1" placeholder="Enter Address"> 
               <span id="gobtn" class="input-group-btn">
                  <button class="btn btn-default" type="button">
                     Go!
                  </button>
               </span>
            </div><!-- /input-group -->
      </div>
  
<div id="location" class="form-group"  style="display:none">
    <label for="exampleInputL2">Destination 2</label>
     <div class="input-group">
    <input type="text" class="form-control" id="exampleInputL1" placeholder="Enter Address">
      <span id="gobtn" class="input-group-btn">
                  <button class="btn btn-default" type="button">
                     Go!
                  </button>
               </span>
             </div>
<br/>
    <label for="exampleInputL3">Destination 3</label>
     <div class="input-group">
    <input type="text" class="form-control" id="exampleInputL1" placeholder="Enter Address">
      <span id="gobtn" class="input-group-btn">
                  <button class="btn btn-default" type="button">
                     Go!
                  </button>
               </span>
  </div>
</div>
  

              </td>
              <td width="10%">&nbsp; </td>
                <td width="10%">



  <div class="form-group">
    <label for="exampleInputPPL">Number of People</label>
    <input type="number" class="form-control" id="exampleInputPPL" placeholder="Enter Number of People">
  </div>
    <div class="form-group">
      <label for="addon">Additional requirements (one per line)
  <textarea class="form-control" rows="3" cols="30"></textarea>
</div>
   <div class="form-group">
    <label for="exampleInputL3">Price</label>
    <input type="number" class="form-control" id="exampleInputL1" placeholder="Enter Price ">
    <h5>Recommended price: $10.00</h5>
  </div>
  
  <button type="submit" class="btn btn-default">List!</button>
</form>
                </td></tr>
            </tbody>
          </table>
        </div>        
     </div>
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
