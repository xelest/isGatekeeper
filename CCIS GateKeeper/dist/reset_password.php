<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
         <title>CCIS | Internal Systems </title>
        <link rel="icon" href="img/MCL LOGO.png">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
        <link href="assets/css/master.css" rel="stylesheet">
        <link href="css/mycss.css" rel="stylesheet">
        
      <script src="js/script_date_time.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="mcl-gray">
        <div id="layoutAuthentication">
            <nav class="sb-topnav navbar navbar-expand mcl-darkgray">
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <div class="input-group-append">
                    
                    </div>
                </div>
            </form>
            <!-- Navbar-->
        </nav>
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-4 col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header mcl-blue"><h3 class="text-center font-weight-light my-3">System User Password Reset</h3></div>
                                    <div class="card-body mcl-blue">
                                        <div class="small mb-3"></div>
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <input class="form-control" name="uname" id="uname" py-4 id="inputEmailAddress" type="text" aria-describedby="emailHelp" placeholder="Username" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="login.html">Return to login</a>
                                                <button type="submit"class="btn mcl-yellow" name='pwdreset' class="btn btn-primary btn-block">Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center mcl-blue">
                                        <div class="small"><a href="login.html">Internal Systems | Gatekeeper</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 mcl-darkgray mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; CCIS College of Computer and Information Science 2020</div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

<?php 
  $con = mysqli_connect('localhost', 'root', '', 'mclccisn_gatekeeper');
  
  //on page load
  $username = "";
  $uid = "";
  //default
  $pwd1 = "changeme";

  if (isset($_POST['pwdreset'])) {
    $uname = $_POST['uname'];
    $pwdN = passAjinomoto($pwd1);
    $status = "A";

  if($uname != 'admin')
  {
      $sql_u = "SELECT * FROM systemusers WHERE `uname`='$uname'";
      $res_u = mysqli_query($con, $sql_u);
    
      if (mysqli_num_rows($res_u) > 0) 
      {
          $query = "UPDATE `systemusers` SET `password`='$pwdN',`status`='$status' WHERE `uname`='$uname'";
                    
           $results = mysqli_query($con, $query);
           //echo 'Saved!';
           echo "<script type='text/javascript'>alert('Password Reset Success!');</script>";
           exit();
          header('location: login.html');
       
      }
      else
      {
        $name_error = "invalid user"; 
        echo "<script type='text/javascript'>alert('$name_error');</script>";
      }
  }
  else
  {
      echo "<script type='text/javascript'>alert('Not allowed to reset System Administrator');</script>";
  }

  }

  function passAjinomoto($keypass){
      $dbcon = mysqli_connect('localhost', 'root', '', 'mclccisn_gatekeeper');
      $p2 = $keypass;
      $p1 = md5($p2);
      $getQRY = mysqli_query($dbcon, "SELECT PASSWORD('$p1') as PWORD;");
      while($rowX = $getQRY->fetch_assoc()){
      $pwordX = $rowX['PWORD'];
      }
      $pwordX = md5($pwordX);
      return $pwordX;
    }



?>
