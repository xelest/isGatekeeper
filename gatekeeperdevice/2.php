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
                    //////
                      //$myqry = "INSERT INTO `tapin_logs`(`id_no`) VALUES ('".$user."')";
                     // mysqli_query($con, $myqry);  

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


 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script_date_time.js"></script>
</head>
 
  <body>  
    !-- -->
      <div class="bg"></div>
      <div class="bg-overlay" hidden> </div>
      <div class="parent-container-vertical" style="position: absolute; top: 0; margin: 0; height: 100%; width: 100%; overflow: hidden;">
      <div class="myBar label-center" style="position: absolute; float: right; right: 10px; top: 10px; color: white;" data-value="0"></div>
              <div id="titlemcl" class="item-container" style="font-family: 'Noto Sans', sans-serif; color: transparent; border-style: none; margin-top: 5%;">
              <h1 style="text-align: center;margin: 0; padding: 0; font-size: 2.5rem;letter-spacing: 1px;" >L</h1>
              <h4 style="text-align: center;margin: 0; padding: 0; letter-spacing: 1px;" >l </h4>
              </div>

      <p id="getUID" hidden></p>
      <div class="row"><div class="card-body"></div></div>
      <div class="row"><div class="card-body"></div></div>


      <div class="row" id="show_user_data">
  <div class="card-body">
    <div class="row">
      <div class="col-1"></div>
        <div class="col-5" style="align-items: center;">
          <div class="card" style="background: rgba(0, 0, 0, 0.4);">
            <div class="card-header" style="border-color: white; color: cyan;"><h3 style="font-family: 'Noto Sans', sans-serif; color: white;"><div class="row">
                <div class="col-6" style="color: #88E22A">
                  <?php echo "Tapped In :"?>
              </div>
              <div class="col-6" style="color: #88E22A" align="right">
                <?php date_default_timezone_set("Asia/Manila"); echo "". date("h : i : s");?>
              </div>
            </div></h3></div>
            <div class="card-body slide-right">

            <div class="row" style="height: 5vh; color: transparent;">
              <div class="col-6" >asd</div>
              <div class="col-6"><h1 style="letter-spacing: 3px;" hidden>asd</h1></div>
            </div>

    <div style="border-color: white; color: cyan;"><h3 style="font-family: 'Noto Sans', sans-serif; color: white;">
      <form>
              <table class="table table-borderless" style="width: 100% !important; color: white;">
                  <thead>
                  </thead>
                <tr>
                  <td align="left" class="lf">Firstname</td>
                  <td style="font-weight:bold">:</td>
                   <td align="left"><?php echo $fname;?></td>
                </tr>
                <tr>
                  <td align="left" class="lf">Lastname</td>
                  <td style="font-weight:bold">:</td>
                  <td align="left"><?php echo $lname;?></td>
                </tr>
                <tr >
                  <td align="left" class="lf">Position</td>
                  <td style="font-weight:bold">:</td>
                   <td align="left"><?php echo $acctype; ?></td>
                </tr>
              </table>        
      </form>
    </div>

    <p style="color:red;"></p>

 <div class="row" style="height: 5vh; color: white;">
              <div class="col-6" hidden>asd</div>
              <div class="col-6" hidden><h1 style="letter-spacing: 3px;">asd</h1></div>
            </div>


            </div>

              <div class="card-footer" style="font-family: 'Noto Sans', sans-serif; color: white; border-color: white; color: white;" align="center"><?php 
              if(!empty($notif_msg_details) || $notif_msg_details != null)
                {
                  echo "<h3>'".$notif_msg_details."'</h3> <h6>'".$notif_msg_sender."'</h6>";}
                  else{echo "<h6> no msg </6>";} ?>
            </div>
          </div>
        </div>
        <div class="col-1"></div>
        <div class="col-1"></div>
        <div class="col-4" style="align-items: center;">
          <div class="row"><div class="card-body"></div></div>
          <div class="row"><div class="card-body"></div></div>
          <img class="slide-slow" id="img1" src=<?php echo $imgname?>  alt="Avatar" style="width: 375px; height: 375px; border: solid 8px <?php echo $bordercolor; ?>">
        </div>


    </div>
  </div>
</div>

                                      
  </body>
</html>

<?php

function insert_admin_report($user)
                      {
                        require 'connection.php';
                        $idno = $user;
                           $res3 = mysqli_query($con, "SELECT * FROM `user_account` WHERE `id_no`='".$user."' AND acc_type='Admin' LIMIT 1");
                            if ($res3->num_rows > 0) 
                            {                
                                                  $date = date('Y-m-d');
                                                  $str1 = "00:00:00";
                                                  $str2 = "23:59:00";
                                                  $newfrdate = $date . ' ' . $str1;
                                                  $newtodate = $date . ' ' . $str2;
                                            //if admin account check if insert already existed
                                            $result3 = mysqli_query($con, "SELECT * FROM `reports_admin` WHERE `id_no`='".$user."' AND `Date`='".$date."'");
                                              if ($result3->num_rows > 0) 
                                              {//existing record - update

                                                          //get earliest time
                                                          $sql = "SELECT * FROM `tapin_logs` WHERE id_no='".$idno."' AND inDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY inDate ASC LIMIT 1";
                                                        $result = $con->query($sql);

                                                        if ($result->num_rows > 0) 
                                                        {
                                                          // output data of each row
                                                          while($row = $result->fetch_assoc()) 
                                                          {
                                                            $xdate = $row["inDate"];
                                                            $timestamp = $xdate;
                                                              $splitTimeStamp = explode(" ",$timestamp);
                                                              $NEWXdate = $splitTimeStamp[0];
                                                              $NEWXtime = $splitTimeStamp[1];
                                                          }
                                                           // echo " <hr> <br> ";
                                                        }

                                                              

                                                              if ($NEWXtime > '07:00:00')
                                                              {
                                                                $remarks = 'LATE';
                                                              }
                                                              else
                                                              {
                                                                $remarks = 'ONTIME';
                                                              }

                                             

                                                          $sqlz = 'SELECT * FROM user_account WHERE id_no = '.$idno.'';
                                                          $resultz = $con->query($sqlz);

                                                          if ($resultz->num_rows > 0) 
                                                          {
                                                            // output data of each row
                                                            while($rowz = $resultz->fetch_assoc()) {
                                                              $fname = $rowz["firstname"];
                                                              $lname = $rowz["lastname"];
                                                            }
                                                          } 
                                                          else 
                                                          {
                                                            //echo "0 results";
                                                          }

                                                      
                                                         $myqryY = " UPDATE `reports_admin` SET `Firstname`='".$fname."',`Lastname`='".$lname."',`TimeIn`='".$NEWXtime."',`TimeOut`='ND',`Duration`='ND',`Remarks`='TAPPED IN' WHERE `id_no`='".$idno."' AND `Date`='".$date."'";

  
                                                               if(mysqli_query($con, $myqryY) === TRUE)
                                                               {
                                                                  //echo " | inserted | <br>";
                                                               }
                                                               else
                                                               {
                                                                  //echo " | failed insert | <br>";
                                                                  //echo 'Error: '. $con->error;
                                                               }




                                                  
                                              }
                                              else
                                              { //no record - insert earliest time
                                                 
                                                //get earliest time
                                                  $sql = "SELECT * FROM `tapin_logs` WHERE id_no='".$idno."' AND inDate BETWEEN '".$newfrdate. "' AND '".$newtodate."' ORDER BY inDate ASC LIMIT 1";
                                                $result = $con->query($sql);

                                                if ($result->num_rows > 0) 
                                                {
                                                  // output data of each row
                                                  while($row = $result->fetch_assoc()) 
                                                  {
                                                    $xdate = $row["inDate"];
                                                    $timestamp = $xdate;
                                                      $splitTimeStamp = explode(" ",$timestamp);
                                                      $NEWXdate = $splitTimeStamp[0];
                                                      $NEWXtime = $splitTimeStamp[1];
                                                  }
                                                   // echo " <hr> <br> ";
                                                }

                                                      

                                                      if ($NEWXtime > '07:00:00')
                                                      {
                                                        $remarks = 'LATE';
                                                      }
                                                      else
                                                      {
                                                        $remarks = 'ONTIME';
                                                      }

                                     

                                                  $sqlz = 'SELECT * FROM user_account WHERE id_no = '.$idno.'';
                                                  $resultz = $con->query($sqlz);

                                                  if ($resultz->num_rows > 0) 
                                                  {
                                                    // output data of each row
                                                    while($rowz = $resultz->fetch_assoc()) {
                                                      $fname = $rowz["firstname"];
                                                      $lname = $rowz["lastname"];
                                                    }
                                                  } 
                                                  else 
                                                  {
                                                    //echo "0 results";
                                                  }

                                              


                                                      $myqryY = "INSERT INTO `reports_admin`(`id_no`,`Firstname`, `Lastname`, `Date`, `TimeIn`, `Remarks`)
                                                        VALUES ('".$idno."','".$fname."','".$lname."','".$NEWXdate."','".$NEWXtime."','".$remarks."')";

                                                       if(mysqli_query($con, $myqryY) === TRUE)
                                                       {
                                                          //echo " | inserted | <br>";
                                                       }
                                                       else
                                                       {
                                                          //echo " | failed insert | <br>";
                                                          //echo 'Error: '. $con->error;
                                                       }
                                          
                                  }
                                }
                            }//end if function reportadmin insert



?>


<?php



function get_compr($id_no,$frdate,$todate)
{
  include 'connection.php';

  $sqlz = "SELECT COUNT(inDate) as cntIN FROM `tapin_logs` WHERE id_no='$id_no' AND inDate BETWEEN '".$frdate."' AND '".$todate."'";
            $resultz = $con->query($sqlz);

    while($rowz = $resultz->fetch_assoc()) 
    {
      $cntIN = $rowz['cntIN'];
    }


    $sqlz = "SELECT COUNT(outDate) as cntOUT FROM `tapout_logs` WHERE id_no='$id_no' AND outDate BETWEEN '".$frdate."' AND '".$todate."'";
      $resultz = $con->query($sqlz);

    while($rowz = $resultz->fetch_assoc()) 
    {
      $cntOUT = $rowz['cntOUT'];
    }


    if($cntIN > $cntOUT) 
    { 
      //ALLOW TAPOUT

    }
    else
    {

    }

    if($cntIN <= $cntOUT) 
    { 
      //DO NOT ALLOW TAPIN

    }
    else
    {

    }
}



function check($number){ 
    if($number % 2 == 0){ 
        echo "Even";  
    } 
    else{ 
        echo "Odd"; 
    } 
} 
  
// Driver Code 
$number = 39; 
check($number) 
?> 


?>