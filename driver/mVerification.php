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
    <script src="http://malsup.github.io/jquery.blockUI.js"></script>
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
    .btn-circle {
      width: 240px;
      height: 240px;
      text-align: center;
      padding: 110px 0;
      font-size: 20px;
      line-height: 1.42;
      border-radius: 120px;
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

    <script>
window.addEventListener("DOMContentLoaded", function() {
  // Grab elements, create settings, etc.
  var canvas = document.getElementById("canvas"),
    context = canvas.getContext("2d"),
    video = document.getElementById("video"),
    videoObj = { "video": true },
    errBack = function(error) {
      console.log("Video capture error: ", error.code); 
    };

  // Put video listeners into place
  if(navigator.getUserMedia) { // Standard
    navigator.getUserMedia(videoObj, function(stream) {
      video.src = stream;
      video.play();
    }, errBack);
  } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
    navigator.webkitGetUserMedia(videoObj, function(stream){
      video.src = window.webkitURL.createObjectURL(stream);
      video.play();
    }, errBack);
  }
  else if(navigator.mozGetUserMedia) { // Firefox-prefixed
    navigator.mozGetUserMedia(videoObj, function(stream){
      video.src = window.URL.createObjectURL(stream);
      video.play();
    }, errBack);
  }
  document.getElementById("snap").addEventListener("click", function() {
    context.drawImage(video, 0, 0, 640, 480);
    $( "#video" ).remove();
    $( "#snap" ).remove();
    $.blockUI();
    setTimeout( function(){
      window.location.replace("./mSuccess.php");
    }, 3000 );
  });
}, false);


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
      <video id="video" width="640" height="480" autoplay></video>
      <button id="snap">Snap Photo</button>
      <canvas id="canvas" width="640" height="480"></canvas>
    </div>
  </body>
</html>

<video autoplay></video>
<img src="">
<canvas style="display:none;"></canvas>



