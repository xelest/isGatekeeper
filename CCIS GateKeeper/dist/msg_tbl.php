                
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");  
 $query = "SELECT * FROM attnmessage";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CCIS | </title>

  <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link href="assets/css/master.css" rel="stylesheet">
  <link href="css/mycss.css" rel="stylesheet">

  <script src="js/script_date_time.js"></script>

</head> 
      <body> 



   <div class="card">
                <div class="table-responsive">    
                     <div id="employee_table">  
                    <table class="table table-bordered table-striped" id="tapout_table" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Msg ID</th>
                          <th>Message</th>
                          <th>Sender</th>
                          <th>Recipient</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody> 
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["imsg_no"]; ?></td> 
                                    <td><?php echo $row["imsg_details"]; ?></td> 
                                    <td><?php echo $row["imsg_sender"]; ?></td> 
                                    <td><?php echo $row["id_no"]; ?></td> 
                                    <td><?php echo $row["imsg_Date"]; ?></td> 
                                    <td><?php echo $row["imsg_Status"]; ?></td> 
                                    <td>


                                      <input type="button" name="edit" value="Edit" id="<?php echo $row["imsg_no"]; ?>" class="btn btn-info btn-xs edit_data" />  


                                    </td>  
                               </tr>  
                               <?php  
                               }  
                               ?>
                             </tbody>
                          </table>  
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
  <script type="text/javascript">
    window.onload = date_time('date_time');
  </script>

  <script>
    $(document).ready(function () {
      $('#tapin_table').DataTable();
    });

    $(document).ready(function () {
      $('#tapout_table').DataTable();
    });

    $(document).ready( function () {
  var table = $('#example').DataTable();
  });
</script>


      </body>  
 </html>  
