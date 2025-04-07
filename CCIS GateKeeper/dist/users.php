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
                            <div class="col-7"><h3>Account Management </h3></div>

                            <div class="col-5"><div class="card-body" style="text-align: right;" ><span id="date_time"></span></div></div>
                        </div>
                    </div>

                    <div class="row"><div class="col-12">
                    <!--=============TABLE PROFILE========== -->
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                User Accounts
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="tapout_table" cellspacing="0">
                                        <thead>
                                                <tr>
                                                <th>User</th>
                                                <th>Access Level</th>
                                                <th>Department</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          <?php

                                            //config
                                            include_once('connection.php');

                                            $msql = "SELECT * from systemusers";
                                            //fetch
                                            $result = mysqli_query($con, $msql);
                                            ?>  


                                                    <?php  
                                               while($row = mysqli_fetch_array($result))  
                                               {  
                                               ?>  
                                               <tr>  
                                                    <td><?php echo $row["uname"]; ?></td> 
                                                    <td><?php echo $row["urole"]; ?></td> 
                                                    <td><?php echo $row["department"]; ?></td> 
                                                    <td><?php echo $row["status"]; ?></td> 
                                                    <td>

                                                      <input type="button" name="edit" value="Edit" id="<?php echo $row["uid"]; ?>" class="btn btn-info btn-xs edit_data" />  

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
                    </div>
                   <!--=============MODAL========== -->


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

   
</body>

</html>


<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  



                <div class="modal-header mcl-blue" align="center">  
                     <h4 class="modal-title" align="center">Activate / Deactivate Users</h4>  
                </div>  
                <div class="modal-body mcl-blue">  
                     <form method="post" id="insert_form">
                          <label>User</label>  
                          <input type="text" name="uname" id="uname" class="form-control" required readonly="" />  
                          <br />
                          <label>Status</label>  
                                 <select name="status" id="status" class="form-control" required>
                                    <option value="A" selected="">Active</option>
                                     <option value="D">Deactivate</option>
                                    </select>
                          <br />
                         

                          <input type="hidden" name="uid" id="uid" />  
                          <input type="submit" name="update" id="udpate" value="Update" class="btn btn-success" align="right" />
                          <button type="button" class="btn btn-secondary" data-dismiss="modal" align="right">Close</button>
                     </form>  
                </div>  
                                                <div class="card-footer text-center mcl-blue">
                                        <div class="small">Internal Systems | Gatekeeper</div>
                                    </div>




           </div>  
      </div>  
 </div>  


<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var imsg_no = $(this).attr("id");  
           $.ajax({  
                url:"fetch_users.php",  
                method:"POST",  
                data:{imsg_no:imsg_no},  
                dataType:"json",  
                success:function(data){
                     $('#uname').val(data.uname);
                     $('#uid').val(data.uid);
                     $('#status') .val(data.status);
                     $('#add_data_Modal').modal('show'); 
                }  
           });  
      });  
      
 });  
 </script>


 <?php  
 $connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");  

 if(isset($_POST['update']))  
 {  

      $uname = mysqli_real_escape_string($connect, $_POST["uname"]);  
      //echo "<script>alert('".$rcpnt."') </script>";

        //echo "<script>alert('".$sndr."') </script>";

      $uid = mysqli_real_escape_string($connect, $_POST["uid"]); // UID
      //echo "<script>alert('".$msgno."') </script>";

      $status = mysqli_real_escape_string($connect, $_POST["status"]);

      if($_POST["uid"] != '')  
      {  
           $query = "  
           UPDATE systemusers   
           SET `status` = '$status'    
           WHERE `uid`='".$uid."'";

           $message = 'User Updated!';  

           if(mysqli_query($connect, $query))
           {
             echo "<script>alert('".$message."') </script>";

           }
           else
           {
             echo "<script>alert(' UPDATE FAILED ') </script>";
           }
      }  
 }  
 ?>