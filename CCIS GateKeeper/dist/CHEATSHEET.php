
<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "users"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

function check_this($tablename, $where)
{
	$host = "localhost"; /* Host name */
	$user = "root"; /* User */
	$password = ""; /* Password */
	$dbname = "users"; /* Database name */

	$con = mysqli_connect($host, $user, $password,$dbname);
	// Check connection
	if (!$con) {
	 die("Connection failed: " . mysqli_connect_error());
	}

	$query = "SELECT * FROM '".$tablename."' WHERE '".$where."'";
	$result = $con->query($$query);

	if ($result->num_rows > 0) 
	{
		return true;
	} 
	else 
	{
		return false;
	}
	$con.close();
	$con.die();
}
?>
//----------------------------------------------
<?php
$sql = "SELECT * FROM `tapin_logs` WHERE id_no='".$idno."'";
result = $con->query($sql);$

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
	$earliest = $row["inDate"];
	}
} 
else 
{

}
?>

//----------------------------------------------
<?
	$myqryY = "INSERT UPDATE DELETE";

	if(mysqli_query($con, $myqryY) === TRUE)
	{
		echo " | inserted | <br>";
	}
	 else
	{
		echo " | failed | <br>";
		echo 'Error: '. $con->error;
	}

?>
//----------------------------------------------

                     <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Log Records
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="tapout_table" cellspacing="0">
                                        <thead>
                                                <tr>
                                                <th>Id No</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Date</th>
                                                <th>Time In</th>
                                                <th>Time Out</th>
                                                <th>Duration</th>
                                                <th>Remarks</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          <?php

                                            //config
                                            include_once('connection.php');

                                            $msql = "SELECT * from reports_admin";
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
                </div>
   
//----------------------------------------------

 <?php  
 $connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");  
 $query = "SELECT * FROM attnmessage";  
 $result = mysqli_query($connect, $query);  
 ?> 

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
//----------------------------------------------

//----------------------------------------------

//----------------------------------------------

//----------------------------------------------

//----------------------------------------------

//----------------------------------------------

//----------------------------------------------

?>