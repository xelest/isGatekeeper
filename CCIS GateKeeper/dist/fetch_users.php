
  <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");  
 if(isset($_POST["imsg_no"]))  
 {  
      $query = "SELECT * FROM systemusers WHERE uid = '".$_POST["imsg_no"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row); 
 }  
 ?>