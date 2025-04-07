<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CCIS | </title>

    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="css/mycss.css" rel="stylesheet">
    
  <script src="js/script_date_time.js"></script>

  <style>
    td{
      font-family: "Lato", "Helvetica Neue", Arial, Helvetica, sans-serif !important;
      font-size: 15px !important;
      font-weight: 400px !important;
      color: rgb(47, 51, 61) !important;
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
                            <div class="col-7"><h3>Logs </h3></div>

                            <div class="col-5"><div class="card-body" style="text-align: right;" ><span id="date_time"></span></div></div>
                        </div>
                    </div>

                    <div class="row"><div class="col-6">
                    <!--=============TABLE PROFILE========== -->
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Tap-In Logs
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="tapout_table" cellspacing="0">
                                        <thead>
                                              <tr>     
                                                  <th>Log No</th>  
                                                  <th>ID No</th>
                                                  <th>Tap In Date</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          <?php

                                            //config
                                            include_once('connection.php');

                                            $msql = "SELECT `log_no`, `id_no`, `inDate` FROM `tapin_logs` order by `log_no` DESC";
                                            //fetch
                                            $result1 = mysqli_query($con, $msql);

                                            //contents populate
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                            echo "<tr>";
                                            foreach ($row1 as $field => $value) {
                                                echo "<td>" . $value . "</td>";
                                            }
                                            echo "</tr>";
                                            }
                                            ?>     
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                       
                    </div>
                   <!--=============MODAL========== -->
                   <div class="col-6">
                   <!--=============TABLE PROFILE========== -->

                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Tap-Out Logs
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="tapin_table"  width="100%" cellspacing="0">
                                        <thead>
                                          <tr>     
                                              <th>Log No</th>  
                                              <th>ID No</th>
                                              <th>Tap Out</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php

                                    //config
                                    include_once('connection.php');
                                  
                                 $msql = "SELECT `log_no`, `id_no`, `outDate` FROM `tapout_logs` order by `log_no` DESC";
                                  //fetch
                                  $result1 = mysqli_query($con, $msql);

                                  //contents populate
                                  while ($row1 = mysqli_fetch_assoc($result1)) {
                                      echo "<tr>";
                                      foreach ($row1 as $field => $value) {
                                          echo "<td>" . $value . "</td>";
                                      }
                                      echo "</tr>";
                                  }
                                    ?>      
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                       
                    </div>

                   <!--=============MODAL========== -->
               </div>

        </div>
    </div>
</div>
    </div>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    

    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/vendor/DataTables/datatables.min.js"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script type="text/javascript">window.onload = date_time('date_time');</script>

    <script>
    $(document).ready(function() {
    $('#tapin_table').DataTable();
    } );

     $(document).ready(function() {
    $('#tapout_table').DataTable();
    } );

  </script>
</body>

</html>