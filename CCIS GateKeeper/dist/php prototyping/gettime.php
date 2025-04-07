<?php
  $DB_HOST = 'localhost';
  $DB_USER = 'root';
  $DB_PASS = '';
  $DB_NAME = 'mclccisn_gatekeeper';


  $con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

  if(!$con)
  {
    die( "Unable to select database");
  }

$sql = "SELECT `id_no` from tapin_logs group by id_no";
$result = $con->query($sql);

//count the ids
if ($result->num_rows > 0) 
{
  $cnt = 1;
    while($row = $result->fetch_assoc()) 
    {
    	$ids[$cnt] = $row['id_no'];
    	$cnt++;
    }
} 
else 
{
  echo "0 results";
}


$sql = "SELECT `id_no` from tapin_logs group by id_no";
$result = $con->query($sql);

//count the ids
if ($result->num_rows > 0) 
{
  $cnt = 1;
    while($row = $result->fetch_assoc()) 
    {
    	$ids[$cnt] = $row['id_no'];
    	$cnt++;
    }
} 
else 
{
  echo "0 results";
}


//traverse the ids entry
for ($i = 1; $i<$cnt; $i++)
{
	$sql = "SELECT `id_no` from tapin_logs group by id_no";
	$result = $con->query($sql);

	//count the ids
	if ($result->num_rows > 0) 
	{
	  $cnt = 1;
	    while($row = $result->fetch_assoc()) 
	    {
	    	echo $row['id_no'];
	    	echo "<br>";
	    }
	} 
	else 
	{
	  echo "0 results";
	}


}





?>