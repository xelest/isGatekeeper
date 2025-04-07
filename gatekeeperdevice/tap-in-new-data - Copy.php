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

                     // $myqry = "INSERT INTO `tapin_logs`(`id_no`) VALUES ('".$user."')";
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


 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script_date_time.js"></script>
</head>
 
  <body>  
    
<!-- -->
 <p id="getUID" hidden></p>

                             <div class="card">
                                <div class="card-header p-2">Emergency Fire</div>
                                <div class="card-body p-2">
                                 <div class="card-body" align="center">
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
                   <td ><?php date_default_timezone_set("Asia/Manila"); echo "". date("h:i:s a");?></td>
                </tr>
                <tr >
                  <td align="left" class="lf">Position</td>
                  <td style="font-weight:bold">:</td>
                   <td align="left"><?php echo $acctype; ?></td>
                </tr>
                    <tr>
                      <td >ROOM</td>
                      <td >:</td>
                      <td >NO DATA</td>
                    </tr>
                    <tr >
                      <td >ID No</td>
                      <td >:</td>
                      <td ><?php echo $id;?></td>
                    </tr>
                    <td >Firstname</td>
                  <td >:</td>
                   <td ><?php echo $fname;?></td>
                </tr>

                <tr>
                  <td>Lastname</td>
                  <td >:</td>
                  <td ><?php echo $lname;?></td>
                </tr>
                  </table> </div>

                                
                                </div>
                                <div class="card-footer p-2" style="font-color: transparent;">Profile</div>
                            </div>


    
                                      
  </body>
</html>
