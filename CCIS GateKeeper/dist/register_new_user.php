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
            <div id="layoutAuthentication_content">
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
                <main>
                    <div class="container">
                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header mcl-blue"><h3 class="text-center font-weight-light my-3" style="color: white; letter-spacing: 5px;">NEW USER</h3></div>
                                    <div class="card-body mcl-blue">
                                        <form method="post" action="">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="uname">Username</label>
                                                        <input class="form-control" name="uname" id="uname" py-4"  type="text" placeholder="Enter Username" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="urole">Account Role</label>
                                                        <select name="urole" class="form-control" required="" id="urole">
                                                            <option value="" selected="">Choose...</option>
                                                            <option value="System Administrator">System Administrator</option>
                                                            <option value="System User">System User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="urole">Department</label>
                                                        <select name="department" class="form-control" required="" id="department">
                                                            <option value="" selected="">Choose...</option>
                                                            <option value="Administrator">Admin</option>
                                                            <option value="Clinic">Clinic</option>
                                                            <option value="Admission Office">Admission's Office</option>
                                                            <option value="Registrar Office">Registrar's Office</option>
                                                            <option value="CCIS Faculty">CCIS Faculty</option>
                                                            <option value="CAS Faculty">CAS Faculty</option>
                                                            <option value="ETYCB Faculty">ETYCB Faculty</option>
                                                            <option value="SHS Faculty">SHS Faculty</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" name="pword" id="pword" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" id="pword2" name="pword2" id="pword2" type="password" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-success btn-block" value="Register" name="register" id="register" <div>
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
  //$con = mysqli_connect('localhost', 'root', '', 'soilanalysisdb');
  //online
  $con = mysqli_connect('localhost', 'root', '', 'mclccisn_gatekeeper');

  //on page load
  $fname = "";
  $lname = "";
  $username = "";
  $pwd1 = "";
  $pwd2 = "";
  $pwdN = "";
  $role = "";


 if (isset($_POST['register'])) {
    $uname = $_POST['uname'];
    $pwd1 = $_POST['pword'];
    $pwd2 = $_POST['pword2'];
    $dept = $_POST['department'];
    $pwdN = passAjinomoto($pwd1);
    $urole = $_POST['urole'];
    $status = "A";

      $sql_u = "SELECT * FROM systemusers WHERE uname='$uname'";
      $res_u = mysqli_query($con, $sql_u);
    
      if (mysqli_num_rows($res_u) > 0) 
      {
        if(strtoupper($uname)=='ADMIN')
        {
           $name_error = "NOT ALLOWED TO USE SYSTEM ADMIN AS ACCOUNT NAMES"; 
        echo "<script type='text/javascript'>alert('$name_error');</script>";
        }
        else
        {
          $name_error = "Sorry... username already taken"; 
        echo "<script type='text/javascript'>alert('$name_error');</script>";
        }
        
      }
      else
      {
        if ($pwd1 == $pwd2)
        {
           $query = "INSERT INTO systemusers (`uname`, `pword`, `status`, `urole`,`department`) 
                    VALUES ('$uname','$pwdN', '$status', '$urole','$dept')";
                    
           //$results = mysqli_query($con, $query);
         
            if(mysqli_query($con, $query) == TRUE)
                                                   {
                                                        echo "<script type='text/javascript'>alert('Record created. Success!');</script>";
                                                   }
                                                   else
                                                   {
                                                       echo "<script type='text/javascript'>alert('Record Failed.');</script>";
                                                   }    
           
           exit();
        }
        else
        {
            echo "<script type='text/javascript'>alert('missmatched password!');</script>";
        }
    }
  }

  function passAjinomoto($keypass){
      $dbcon = mysqli_connect('localhost', 'root', '', 'mclccisn_gatekeeper');
      $p2 = $keypass;
      $p1 = md5($p2);
      $getQRY = mysqli_query($dbcon, "SELECT PASSWORD('$p1') as PWORD;"); // 1st layer md5
      while($rowX = $getQRY->fetch_assoc()){
      $pwordX = $rowX['PWORD'];
      }
      $pwordX = md5($pwordX); // 2nd layer md5
      return $pwordX;
    }



?>