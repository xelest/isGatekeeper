<?php
    require 'ConnDatabase.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT `rf_id`, `id_no` FROM rfaccounts where rf_id = ?";
  $q = $pdo->prepare($sql);
  if ($q != null){
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();}

$bordercolor = "#555555";
$imgname = "img/placeholder.jpg";
$notif_msg_header = "INVALID";
$notif_msg_details = "Please report to the Security Office";
$notif_msg_sender = "Welcome Guest";
$card1hide = "";
  
  $msg = null;
  if (!isset($data['id_no'])) {
    $msg = "Unregistered Card !!!";
    $data['rf_id']=$id;
    $data['id_no']="--------------";
  } else {

    $msg = "NO DATA";

    require 'connection.php';

       $lname = "NO DATA";
       $fname = "NO DATA";
       $id = "NO DATA";
       $acctype = "NO DATA";

if(isset($data['id_no']))
{
  if(isset($data['id_no']))
  {
    $user = $data['id_no'];
    $res = mysqli_query($con, "SELECT * FROM user_account WHERE `id_no`='".$user."' LIMIT 1");
    $row = mysqli_fetch_array($res);

                if (mysqli_num_rows($res) > 0) // user exist
                { 
                    if($row['acc_status'] == 'Active'){
                      $imgname = 'img/'.$row['id_no'].'.jpg';
                      $bordercolor = "#83B336";
                      $res2 = mysqli_query($con, "SELECT * FROM `attnmessage` WHERE `id_no`='".$user."' and `imsg_Status` = 'Active' ORDER BY `imsg_Date` DESC LIMIT 1");
                      if ($res2->num_rows > 0) {
                          // output data of each row
                          while($row2 = $res2->fetch_assoc()) {
                             $notif_msg_header = "WELCOME";
                             $notif_msg_details = $row2['imsg_details'];
                             $notif_msg_sender = $row2['imsg_sender'];
                                }
                            } else {
                              $notif_msg_header = "WELCOME";
                              $notif_msg_details = "";
                              $notif_msg_sender = "";
                              $card1hide = "$('#card1').hide();";
                            }

                    }
                    else
                    {
                       $imgname = 'img/'.$row['id_no'].'.jpg';
                       $bordercolor = "##FFFF00";
                       $notif_msg_header = "Welcome Back";
                      $notif_msg_details = "You are not currently enrolled.";
                      $notif_msg_sender = "";
                      $card1hide = "";
                    }
                    ///

                      //$myqry = "INSERT INTO `tapin_logs`(`id_no`) VALUES ('".$user."')";
                      //mysqli_query($con, $myqry);  
                      //insert_admin_report($user);


                      $res3 = mysqli_query($con, "SELECT * FROM `user_account` WHERE `id_no`='".$user."' LIMIT 1");

                      if ($res3->num_rows > 0) {
                        while($row3 = $res3->fetch_assoc()) {
                          $lname = $row3['lastname'];
                          $fname = $row3['firstname'];
                          $id = $row3['id_no'];
                          $acctype = $row3['acc_type'];
                         }  
                      }
                      else
                      {
                          $lname = "NO DATA";
                          $fname = "NO DATA";
                          $id = "NO DATA";
                          $acctype = "NO DATA";
                      }

                    }

                  ///////
                else if(mysqli_num_rows($res) == null) //invalid user
                { 
                    // this are new entry and does not exist in database
                  $bordercolor = "#555555";
                  $imgname = "img/placeholder.jpg";
                  $notif_msg_header = "INVALID";
                  $notif_msg_details = "Please report to the Security Office";
                  $notif_msg_sender = "Welcome Guest";
                  $card1hide = "";
                }          
    }
  }
  else
  {
                  $bordercolor = "#555555";
                  $imgname = "placeholder";
                  $notif_msg_header = "INVALID";
                  $notif_msg_details = "Please report to the Security Office";
                  $notif_msg_sender = "Welcome Guest";
                  $card1hide = "";
  }

  }



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CCIS | </title>

    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">
    
  <script src="js/script_date_time.js"></script>
  <!-- <script src="assets/js/dashboard-charts.js"></script> -->
  <style> 
    th, td, tr {
        padding: 10px !important;
        margin: 5px !important;
        font-size: medium;
    }

    table{
        margin-top: 10px;
    }

          img {
  border-radius: 50%;
  width: 400px;
  height: 400px;
  -webkit-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
}
  </style>
</head>

<body>
    <div class="wrapper">
        <div id="body" class="active">
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-4"><h3>Dashboard </h3></div>

                            <div class="col-8"><div class="card-body" style="text-align: right;" ><span id="date_time"></span></div></div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="card id="chartright">
                                <div class="content">
                                    <div class="head">
                                        <h4 class="mb-0">Tap Out Traffic</h4>
                                        <p class="text-muted">Tap Out Frequency</p>
                                    </div>
                                    <div class="canvas-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas class="chart chartjs-render-monitor" id="trafficflow" style="display: block; width: 882px; height: 441px;" width="882" height="441"></canvas>
                                    </div>
                                    <div class="ui hidden divider"></div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">Tap-Outs</div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate="" accept-charset="utf-8">
                                        <div class="form-row">
                                            <table class="table table-striped" id='Tap-Outs'>
                                              
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" id="chartright">
                                <div class="content">
                                    <div class="head">
                                        <h4 class="mb-0">Tap In Traffic</h4>
                                        <p class="text-muted">Today's Tap In Frequency</p>
                                    </div>
                                    <div class="canvas-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas class="chart chartjs-render-monitor" id="sales" style="display: block; width: 882px; height: 441px;" width="882" height="441"></canvas>
                                    </div>
                                    <div class="ui hidden divider"></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">Tap-Ins</div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate="" accept-charset="utf-8">
                                        <div class="form-row">
                                            <table class="table table-striped" id='Tap-Ins'>
                                              
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <p id="getUID" hidden></p>
                        <div class="col-md-4" id="show_user_data">

                             <div class="card">
                                <div class="card-header p-2">Emergency Fire</div>
                                <div class="card-body p-2">
                                 <div class="card-body">
                                  <img class="slide-slow" id="img1" src=<?php echo $imgname?> 
                                  alt="Avatar" style="width: 150px; height: 150px; ">
                                 </div>
                                 <div class="card-body">
                     <table class="table table-borderless table-striped" style="width: 100% !important; color: grey;">
                      <thead>
                      </thead>
                     <tr>

                 <tr>
                      <td style="width: 20%;">Firstname</td>
                      <td >:</td>
                      <td ><?php echo $fname;?></td>
                    </tr>
                    <tr>
                      <td >Lastname</td>
                      <td >:</td>
                      <td align="left"><?php echo $lname;?></td>
                    </tr>
                    <tr >
                      <td ">Position</td>
                      <td >:</td>
                      <td ><?php echo $acctype; ?></td>
                    </tr>
                     <tr >
                      <td ">ID No</td>
                      <td >:</td>
                      <td ><?php echo $acctype; ?></td>
                    </tr>
              </table>
                  </table> </div>

                                
                                </div>
                                <div class="card-footer p-2">asd</div>
                            </div>

                            
                    </div>
                

                
            </div>

        </div>

    </div>


    <div id="chartX" hidden> </div>

    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>

    <script type="text/javascript">window.onload = date_time('date_time');</script>

</body>
</html>

