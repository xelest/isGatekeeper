<?php
  session_cache_expire(10);
  session_start();

  if($_SESSION['uname'] == ""){
    header('location: pageredirect.php');
  }

    if(!isset($_SESSION['uname'])){
    header('location: pageredirect.php');
  }

  if($_SESSION['urole'] != 'System User')
  {
      header('location: pageredirect.php');
  }


  include 'connection.php';
  $result = mysqli_query($con,"SELECT `department` FROM systemusers WHERE uname='".$_SESSION['uname']."' LIMIT 1");
  if(mysqli_num_rows($result) > 0)
  {
      while($row = $result->fetch_assoc())
      {
        $dept = $row['department'];
      }

  }
  else
  {

  }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CCIS | Internal Systems </title>
        <link rel="icon" href="img/LOGO.png">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

         <style>
          body{
              background-color: #E2E2E2 !important;
              color: #2F333D !important;
            }

            .mcl-blue{
              background-color: #095779 !important;
              color: #CCCC !important;
            }

            .mcl-darkgray{
              background-color: #2F333D !important;
              color: #CCCC !important;
            }

            .mcl-a-dark{
              background-color: #2F333D !important;
              color: #CCCC !important;
            }
            .mcl-a-dark:hover{
              background-color: #195387 !important;
              color: #white !important;
            }

  </style>

  <link href="css/mycss.css" rel="stylesheet">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand mcl-blue">
            <a class="navbar-brand" href="systemusers.php" style="color: white;">
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-bounding-box" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
  <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg> Gatekeeper</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars" style="color: white;"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <div class="input-group-append">
                    
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0" style="color: white;">
                <li class="nav-item dropdown" style="color: white;">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;"><i class="fas fa-user fa-fw" style="color: white;"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="about.php" target="abc_frame" class="dropdown-item"> About</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php" class="dropdown-item" id="btn-confirm" data-toggle="modal" data-target="#exampleModalCenter"> Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu mcl-darkgray">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Navigation</div>
                                  <a class="nav-link" href="systemusers.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Home
                            </a>                         
                            <div class="sb-sidenav-menu-heading">Featured Pages</div>
                            <li>    
                                     <a class="nav-link" id="members" href="members.php" target="abc_frame"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Members</a>
                                   <a class="nav-link" href="search_logs.php" target="abc_frame"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> All Tap Logs</a>


                                   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Reports" aria-expanded="false" aria-controls="collapseLayouts">
                                          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                          Reports
                                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                      </a>

                                  <div class="collapse" id="Reports" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                      <nav class="sb-sidenav-menu-nested nav">
                                      <a class="nav-link" href="admin_logs.php" target="abc_frame"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Admin Tap Logs</a>
                                      <a class="nav-link" href="reports_admin.php" target="abc_frame"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Admin Reports</a>
                                      <a class="nav-link" href="reports_SHS.php" target="abc_frame"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> SHS Reports</a>
                                      <a class="nav-link" href="reports.php" target="abc_frame"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> College Reports</a>
                                      <a class="nav-link" href="reports.php" target="abc_frame"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Teachers Reports</a>
                                          
                                      </nav>
                                  </div>




                                   <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Messaging" aria-expanded="false" aria-controls="collapseLayouts">
                                          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                          Messaging
                                          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                      </a>

                                  <div class="collapse" id="Messaging" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                      <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="messaging.php" data-toggle="modal" data-target="#msg"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Create Message</a>
                                           <a class="nav-link" href="messaging.php" target="abc_frame"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Messaging</a>

                                      </nav>
                                  </div>

                                  

             

                                </li>   

                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['uname']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                 <iframe src="dashboard.php" id="abc_frame" name="abc_frame" style="width: 100%; height: 100%; border: 0px;"></iframe>
                <footer class="py-4 bg-light mt-auto ">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; isGatekeeper | Internal Systems 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- LOGOUT MODAL FORM -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to Logout?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="window.location.href = 'logout.php';">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>       
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL FORM -->

        <!-- TAPIN MODAL FORM -->
        <div class="modal fade" id="tapin" tabindex="-1" role="dialog" aria-labelledby="tapin" aria-hidden="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header mcl-green">
                <h5 class="modal-title" id="tapin">Simulate Tap In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mcl-gray">
                
                  <!-- TAP IN -->
                <form action="../../gatekeeperdevice/getUID.php" method="POST" target="_blank">
                                             <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">RFID</label>
                                                <input class="form-control py-4" id="tap_in" name="UIDresult" type="text" placeholder="RFID NUMBER" required="required" />
                                            </div>
              </div>
              <div class="modal-footer mcl-gray">
                <input class="btn btn-secondary" type="submit" name="submit_tapin" class="fadeIn fourth" value="TAP IN" >
            </form>
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL FORM -->

        <!-- TAPOUT MODAL FORM -->
        <div class="modal fade" id="tapout" tabindex="-1" role="dialog" aria-labelledby="tapout" aria-hidden="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header mcl-red">
                <h5 class="modal-title" id="tapout">Simulate Tap Out</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mcl-gray">
                
                  <!-- TAP IN -->
                <form action="../../gatekeeperdevice/getUID_out.php" method="POST" target="_blank">
                                             <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">RFID</label>
                                                <input class="form-control py-4" id="tapout" name="UIDresult" type="text" placeholder="RFID NUMBER" required="required" />
                                            </div>
              </div>
              <div class="modal-footer mcl-gray">
                <input class="btn btn-secondary" type="submit" name="submit_tapout" class="fadeIn fourth" value="TAP OUT" >
            </form>
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL FORM -->

                <!-- RST MODAL FORM -->
        <div class="modal fade" id="rstpwd" tabindex="-1" role="dialog" aria-labelledby="rstpwd" aria-hidden="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="width: 90%;">
                            <div class="col-md-12 col-lg-12" style="height: 100% !important; width: 100% !important; padding: 0px; margin: 0px;;">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    <div class="card-header mcl-blue"><h3 class="text-center font-weight-light my-3">Quick Password Reset</h3></div>
                                    <div class="card-body mcl-blue">
                                        <form>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Identification Number</label>
                                                <input class="form-control name="uid" py-4" id="inputEmailAddress" type="text" aria-describedby="emailHelp" placeholder="Enter valid ID No." />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href=""></a>
                                                <button type="submit"class="btn mcl-yellow" name='pwdreset' class="btn btn-primary btn-block">Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center mcl-blue">
                                        <div class="small">Internal Systems | Gatekeeper</div>
                                    </div>
                                </div>
                            </div>


            </div>
          </div>
        </div>
        <!-- MODAL FORM -->


          <!-- MESSAGE   MODAL FORM -->
        <div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="msg" aria-hidden="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                            <div class="col-md-12 col-lg-12" style="height: 100% !important; width: 100% !important; padding: 0px; margin: 0px;">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    <div class="card-header mcl-blue"><h3 class="text-center font-weight-light my-3">CREATE MESSAGE</h3></div>
                                    <div class="card-body mcl-blue">
                                            <div class="form-group">
                                              <div class="row" >

                                                <div class="col-lg-12 col-sm-12 col-md-12">
                                                   <form method="POST"  action="" style="width: 100% !important">


                                                    <div class="input-group mb-3">
                                                      <div class="input-group-prepend">
                                                      <span class="input-group-text">Recipient</span>
                                                      </div>
                                                      <input type="text" name="rt" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                    </div>

                                                       <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                          <span class="input-group-text"
                                                            id="inputGroup-sizing-default">Sender&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        </div>
                                                         <select name="sr" id="sr" class="form-control" disabled>
                                                          <?php
                                                          switch ($dept) {
                                                          case 'CCIS Faculty':
                                                            echo "<script>document.getElementById('sr').value='CCIS Faculty';</script>";
                                                            echo "<option value='CCIS Faculty'>CCIS Faculty</option>";            
                                                            break;
                                                          case 'MITL Faculty':
                                                            echo "<script>document.getElementById('sr').value='MITL Faculty';</script>";
                                                            echo "<option value='MITL Faculty'>MITL Faculty</option>";
                                                            break;
                                                          case 'CAS Faculty':
                                                            echo "<script>document.getElementById('sr').value='CAS Faculty';</script>";
                                                            echo "<option value='CAS Faculty'>CAS Faculty</option>";
                                                            break;
                                                          case 'SHS Faculty':
                                                            echo "<script>document.getElementById('sr').value='SHS Faculty';</script>";
                                                            echo "<option value='SHS Faculty'>SHS Faculty</option>";
                                                            break;
                                                          case 'ETYCB Faculty':
                                                            echo "<script>document.getElementById('sr').value='ETYCB Faculty';</script>";
                                                            echo "<option value='ETYCB Faculty'>ETYCB Faculty</option>";
                                                            break;
                                                          case 'Clinic':
                                                            echo "<script>document.getElementById('sr').value='Clinic';</script>";
                                                            echo "<option value='Clinic'>Clinic</option>";
                                                            break;
                                                          case 'Admission Office':
                                                            echo "<script>document.getElementById('sr').value='Admission Office';</script>";
                                                            echo "<option value='Admission Office'>Admission's Office</option>";
                                                            break;
                                                          case 'Registrar Office':
                                                            echo "<script>document.getElementById('sr').value='Registrar Office';</script>";
                                                            echo "<option value='Registrar Office'>Registrar's Office</option>";
                                                            break;
                                                          default:
                                                            echo "<script>document.getElementById('sr').value='ND';</script>";

                                                        } 

                                                        ?>
                                                        </select>
                                                      </div>


                                                    <div class="input-group">
                                                      <div class="input-group-prepend">
                                                      </div>
                                                      <textarea class="form-control" name="msg" aria-label="With textarea" rows="5" cols="20"></textarea>
                                                    </div>
                                                    
      
                                                    <br>
                                                     <div class="row">
                                                      <div class="col-12" align="right">
                                                      <input class="btn btn-primary" type="submit" name="insertmsg" value="CREATE" align="right"/>
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                     </div></form>
                                                </div>


                              </div>
                                            </div>
                                    </div>
                                    <div class="card-footer text-center mcl-blue">
                                        <div class="small">Internal Systems | Gatekeeper</div>
                                    </div>
                                </div>
                            </div>


            </div>
          </div>
        </div>

  

        <!-- REGISTER MODAL FORM -->
        <div class="modal fade" id="regnew" tabindex="-1" role="dialog" aria-labelledby="regnew" aria-hidden="false">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                        

            <div class="col-md-12 col-lg-12" style="height: 100% !important; width: 100% !important; padding: 0px; margin: 0px;">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    <div class="card-header mcl-blue"><h3 class="text-center font-weight-light my-3" style="color: white; letter-spacing: 5px;">NEW USER</h3></div>
                                    <div class="card-body mcl-blue">
                                        <form method="POST" action="">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName" autocomplete="off">First Name</label>
                                                        <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName" autocomplete="off">Last Name</label>
                                                        <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="" autocomplete="off">Identification Number</label>
                                                        <input class="form-control py-4" id="" type="text" placeholder="Enter ID Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="">Account Role</label>
                                                        <select name="state" class="form-control" required="" id="myOption">
                                                            <option value="" selected="">Choose...</option>
                                                            <option value="Admin">Admin</option>
                                                            <option value="User">User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword" autocomplete="off">Password</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword" autocomplete="off">Confirm Password</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><a class="btn btn-success btn-block" href="">Register</a></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center mcl-blue">
                                        <div class="small">Internal Systems | Gatekeeper</div>
                                    </div>
                                </div>
                            </div>


            </div>
          </div>
        </div>
        <!-- MODAL FORM -->


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> 

        <script>
        $('#members').click(function () {
            $('#abc_frame').attr('src', '');
        });
        $('#maps').click(function () {
            $('#abc_frame').attr('src', 'Dashboard/geomap.php');
        });
        $('#plant-matrix').click(function () {
            $('#abc_frame').attr('src', 'plant_matrix.php');
        });
        $('#search').click(function () {
            $('#abc_frame').attr('src', 'search.html');
        });
        $('#analytics').click(function () {
            $('#abc_frame').attr('src', 'Dashboard/regions.php');
        });
        $('#reports').click(function () {
            $('#abc_frame').attr('src', 'reports/reportsIndex.php');
        });
        $('#recommends').click(function () {
            $('#abc_frame').attr('src', 'Dashboard/crops.php');
        });
    </script>

        
               
    </body>
</html>


<?php
require 'connection.php';

if(isset($_POST['insertmsg']))
{
 
        $rt = $_POST['rt'];
        $sr = $_POST['sr'];
        $msg = $_POST['msg'];
        $A = "Active";



        $query = mysqli_query($con, "SELECT * FROM `user_account` WHERE `id_no` = '".$rt."'");

          if (!$query)
          {
              die('Error: ' . mysqli_error($con));
          }
          else
          {
                      if(mysqli_num_rows($query) > 0)
                          {

                                      
                            $myqryX = "INSERT INTO `attnmessage`(`imsg_details`, `imsg_sender`, `id_no`, `imsg_Status`)
                                      VALUES                   ('" . $msg . "' , '" . $sr . "' , '" . $rt . "' , '" .$A . "')";

                                      
                                if(mysqli_query($con, $myqryX))
                                {
                                        echo "<script>alert('Message Created!')</script>";
                                }
                                else
                                {
                                        echo "<script>alert('Message FAILED!')</script>";
                                }

                          }
                          else
                          {

                                        echo "<script>alert('FAILED! No such ID exist!')</script>";

                          }
          }

        
}
               
              
include('uploader_minfo.php');
include('uploader_calendar.php'); 
include_once 'ND_UPDATER.php';
include_once 'php prototyping/generator_report_update.php';

?>