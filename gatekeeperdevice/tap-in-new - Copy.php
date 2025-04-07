<?php 
include_once 'connection.php';


$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents('UIDContainer.php',$Write);


                  $bordercolor = "#555555";
                  $imgname = "img/placeholder.jpg";
                  $notif_msg_header = "INVALID";
                  $notif_msg_details = "Please report to the Security Office";
                  $notif_msg_sender = "Welcome Guest";
                  $card1hide = "";

  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="js/script_date_time.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="js/bootstrap.min.js"></script>
      <script src="jquery.min.js"></script>
      
      <script>
        $(document).ready(function(){
           $("#getUID").load("UIDContainer.php");
          setInterval(function() {
            $("#getUID").load("UIDContainer.php");  
          }, 500);
        });
      </script>

  <?php
  $bg = array('img-1.jpg', 'img-8.png', 'img-9.jpg', 'img-10.png'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>

    <style>

body, html {
  height: 100%;
  width: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

.bg-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(6, 11, 61, 0.600);
}

.bg {
  /* The image used */
  background-image: url("img/<?php echo $selectedBg; ?>");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

img.slide-slow {
  animation: slide-slow 1.5s;
  margin-top:0%;
}



img {
  border-radius: 50%;
  width: 400px;
  height: 400px;
  -webkit-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
}

#card1 {
  animation: slide-right 1.5s;
  margin-top:0%;
  border-radius: 4px;
  padding: 5px;
}



.xheader{
  width: 100%;
  border-style: solid;
  border-width: 1px;
  color: white;
  border-color: #6C6A69;

}
.xcontent{
  width: 100%;
   border-style: solid;
  border-width: 1px;
  color: white;
border-color: #6C6A69;
  height: 50%;
}

.xfooter{
  width: 100%;
  border-color: #6C6A69;
  color: white;
}

</style>

  
    
</head>
<!-- -->
<body>
<!-- -->
 <p id="getUID" hidden></p>
<div class="col-md-4 col-lg-4" id="show_user_data"">

                             <div class="card">
                                <div class="card-header p-2">Profile</div>
                                <div class="card-body p-2">
                                 <div class="card-body" align="center" style="border-width: 1px solid;">
                                  <img class="slide-slow" id="img1" src=<?php echo $imgname?> 
                                  alt="Avatar" style="width: 150px; height: 150px; ">
                                 </div>
                                 <div class="card-body">
                     <table class="table table-borderless table-striped" style="width: 100% !important; color: grey;">
                      <thead>
                      </thead>
                    <tr >
                      <td style="width: 20%;">Time</td>
                      <td >:</td>
                      <td >NO DATA</td>
                    </tr>
                    <tr >
                      <td >ROOM</td>
                      <td >:</td>
                      <td >NO DATA</td>
                    </tr>
                    <tr >
                      <td >ID No</td>
                      <td >:</td>
                      <td >NO DATA</td>
                    </tr>
                    <tr>
                      <td >Firstname</td>
                      <td >:</td>
                      <td >NO DATA</td>
                    </tr>
                    <tr>
                      <td >Lastname</td>
                      <td >:</td>
                      <td >NO DATA</td>
                    </tr>
                    <tr >
                      <td >Position</td>
                      <td >:</td>
                      <td >NO DATA</td>
                    </tr>
              
                    
                  </table> </div>

                                
                                </div>
                                <div class="card-footer p-2">Profile</div>
                            </div>

                             

<!-- -->

<script>
      var myVar = setInterval(myTimer, 1000);
      var myVar1 = setInterval(myTimer1, 1000);
      var oldID="";
      clearInterval(myVar1);

      function myTimer() {
        var getID=document.getElementById("getUID").innerHTML;
        oldID=getID;
        if(getID!="") {
          myVar1 = setInterval(myTimer1, 500);
          showUser(getID);
          clearInterval(myVar);
        }
      }
      
      function myTimer1() {
        var getID=document.getElementById("getUID").innerHTML;
        if(oldID!=getID) {
          myVar = setInterval(myTimer, 500);
          clearInterval(myVar1);
        }
      }
      
      function showUser(str) {
        if (str == "") {
          document.getElementById("show_user_data").innerHTML = "";
          return;
        } else {
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("show_user_data").innerHTML = this.responseText;
            }
          };
          xmlhttp.open("GET","tap-in-new-data - Copy.php?id="+str,true);
          xmlhttp.send();
        }
      }
      
      var blink = document.getElementById('blink');
      setInterval(function() {
        blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
      }, 750); 
    </script>

    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script type="text/javascript">window.onload = date_time('date_time');</script>

    

</body>
</html>
