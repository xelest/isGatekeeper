<?php $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '';
  $DB_NAME = 'mclccisn_gatekeeper';


  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

  if(!$con)
  {
    die( "Unable to select database");
  }




  $mwf = array('21','22');
  $tth = array('21','22');
 $dday = '2021-1-8';

  $v1  = array(''.$dday.' 06:50:00',''.$dday.' 9:30:00');
  $v2 = array(''.$dday.' 07:30:00',''.$dday.' 13:30:00');

for($x = 0 ; $x <= 1; $x++)
{
  
$msql= "
SELECT DATE_FORMAT(
    FROM_UNIXTIME(
         RAND() * 
            (UNIX_TIMESTAMP('".$v1[$x]."') - UNIX_TIMESTAMP('".$v2[$x]."')) + 
             UNIX_TIMESTAMP('".$v2[$x]."')
                  ), '%Y-%m-%d %H:%i:%s')";

if ($result = mysqli_query($con, $msql)) {
 while ($row = mysqli_fetch_row($result)) {
 	$dt = $row[0]; 
  }
}

echo $dt;
echo "<br>";
}


$Gdate = array('4','5','6','7','8','9','12','13','14','15');
$Nname = array('ma','me','mi','mo','mu','na','ne','ni','no','nu');


for ($zdate = 0; $zdate < 10; $zdate++)
{
  for($name = 0; $name < 10; $name++)
  {
    echo "/";
    echo $Nname[$name];
    echo "/";
  }
    echo "/";
    echo $Gdate[$zdate];
    echo "<br>";
}




$sql = "SELECT * FROM tapin_logs";
$result = $con->query($sql);

if ($result->num_rows > 0) 
{
  // output data of each row
    while($row = $result->fetch_assoc()) 
    {

      $getid = $row["id_no"];
      $w = get_who($getid);
      $x = get_whof($getid);
     
      echo "" . $row["log_no"]. " 
            " . $row["id_no"]." 
            ".$w."
            ".$x."
            ". $row["inDate"]. 
            "<br>";
    }
} 
else 
{
  echo "0 results";
}



  function get_who($who){

  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '';
  $DB_NAME = 'mclccisn_gatekeeper';


  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

  if(!$con)
  {
    die( "Unable to select database");
  }

    $sql2 = 'SELECT * FROM user_account WHERE id_no = '.$who.'';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) {
      // output data of each row
      while($row2 = $result2->fetch_assoc()) {
        $lname = $row2["lastname"];
        $fname = $row2["firstname"];
      }
    } else {
      echo "0 results";
    }
 return $lname;
}

function get_whof($who){

  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '';
  $DB_NAME = 'mclccisn_gatekeeper';


  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

  if(!$con)
  {
    die( "Unable to select database");
  }

    $sql2 = 'SELECT * FROM user_account WHERE id_no = '.$who.'';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0) {
      // output data of each row
      while($row2 = $result2->fetch_assoc()) {
        $fname = $row2["firstname"];
      }
    } else {
      echo "0 results";
    }
 return $fname;
}




function get_date($when){
  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '';
  $DB_NAME = 'mclccisn_gatekeeper';

  //default start and end 9am - 5pm

}

?>