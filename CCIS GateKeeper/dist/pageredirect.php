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
                            <div class="col-md-7 col-lg-7 mt-5">
                                      <div class="login-logo mt-5">
                                        <div><a href="#" class="mt-5"><h1 class="text-center font-weight-light mt-5"><b>R E D I R E C T I N G</b></h1></a></div>
                                        <div><h1 class="text-center font-weight-light my-3" id="countdown">5</h1></div>
                                      </div>
                                      <p class="login-box-msg text-center font-weight-light my-3">S E S S I O N&nbsp;&nbsp;S E C U R I T Y</p>
                                      <!-- /.login-logo -->
                                    

                                    <script>

                                        // Total seconds to wait
                                        var seconds = 5;

                                        function countdown() {
                                            seconds = seconds - 1;
                                            if (seconds < 0) {
                                                // Chnage your redirection link here
                                                window.location = "login.html";
                                            } else {
                                                // Update remaining seconds
                                                document.getElementById("countdown").innerHTML = seconds;
                                                // Count down using javascript
                                                window.setTimeout("countdown()", 1000);
                                            }
                                        }

                                        // Run countdown function
                                        countdown();

                                    </script>
                                    <?php 
                                    session_start();
                                    session_destroy(); ?>
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
