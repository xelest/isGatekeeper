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

@keyframes slide-slow {
  from {
    margin-left: 100%;
  }

  to {
    margin-left: 0%;
  }
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

@keyframes slide-right {
  from {
    margin-left: -50%;
  }

  to {
    margin-left: 0%;
  }
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
<div class="bg"></div>
<div class="bg-overlay"></div>
<div class="parent-container-vertical" style="position: absolute; top: 0; margin: 0; height: 100%; width: 100%; overflow: hidden;">
<div class="myBar label-center" style="position: absolute; float: right; right: 10px; top: 10px; color: white;" data-value="0"></div>
        <div id="titlemcl" class="item-container" style="font-family: 'Noto Sans', sans-serif; color: white; border-style: none; margin-top: 5%;">
        <h1 style="text-align: center;margin: 0; padding: 0; font-size: 2.5rem;letter-spacing: 1px;"> MALAYAN COLLEGES LAGUNA</h1>
        <h4 style="text-align: center;margin: 0; padding: 0; letter-spacing: 1px;" id="date_time"> </h4>
        </div>

<p id="getUID" hidden></p>
<div class="row"><div class="card-body"></div></div>
<div class="row"><div class="card-body"></div></div>


<div class="row" id="show_user_data">
  <div class="card-body">
    <div class="row">
      <div class="col-1"></div>
        <div class="col-5" style="align-items: center;" >
          <div class="card" style="background: rgba(0, 0, 0, 0.4);" >
            <div class="card-header" style="border-color: white; color: cyan;"><h3 style="font-family: 'Noto Sans', sans-serif; color: transparent;" align="right">asd</h3></div>
            <div class="card-body slide-right">

              <div class="row" style="height: 5vh; color: white;">
              <div class="col-6" hidden>asd</div>
              <div class="col-6"><h1 style="letter-spacing: 3px;" hidden>asd</h1></div>
            </div>


    <div style="border-color: white; color: cyan;"><h3 style="font-family: 'Noto Sans', sans-serif; color: white;">
      <form>
              <table class="table table-borderless" style="width: 100% !important; color: white;">
                  <thead>
                  </thead>
               <!-- <tr>
                  <td align="left" class="lf">RFID</td>
                  <td style="font-weight:bold" >:</td>
                  <td align="left"><?php //echo '--------------';?></td>
                </tr>
                <tr >
                  <td align="left" class="lf">MCL ID</td>
                  <td style="font-weight:bold">:</td>
                  <td align="left"><?php //echo '--------------';?></td>
                </tr> -->
                <tr>
                  <td align="left" class="lf">Firstname</td>
                  <td style="font-weight:bold">:</td>
                   <td align="left"><?php echo '--------------';?></td>
                </tr>
                <tr>
                  <td align="left" class="lf">Lastname</td>
                  <td style="font-weight:bold">:</td>
                  <td align="left"><?php echo '--------------';?></td>
                </tr>
                <tr >
                  <td align="left" class="lf">Position</td>
                  <td style="font-weight:bold">:</td>
                   <td align="left"><?php echo '--------------';?></td>
                </tr>
              </table>        
      </form>
    </div>


            <div class="row" style="height: 5vh; color: white;">
              <div class="col-6" hidden>asd</div>
              <div class="col-6" hidden><h1 style="letter-spacing: 3px;">asd</h1></div>
            </div>


            </div>

             <div class="card-footer" style="font-family: 'Noto Sans', sans-serif; color: white; border-color: white; color: transparent" align="center"><h3>no msg</h3><h6>1234</h6>
            </div>

          </div>
        </div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-4" style="align-items: center;">
          <div class="row"><div class="card-body"></div></div>
          <div class="row"><div class="card-body"></div></div>
          <img class="slide-slow" id="img1" src=<?php echo '"'.$imgname.'"'?>  alt="Avatar" style="width: 375px; height: 375px; border: solid 8px <?php echo $bordercolor; ?>">
        </div>

    </div>
  </div>
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
          xmlhttp.open("GET","tap-in-new-data.php?id="+str,true);
          xmlhttp.send();
          (function countdown(remaining) {
              if(remaining === 0)
                  location.reload(true);
              //document.getElementById('countdown').innerHTML = remaining;
              setTimeout(function(){ countdown(remaining - 1); }, 1000);
          })(5);
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
