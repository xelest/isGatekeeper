<?php
$connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");
$cnt = 0;
if(isset($_POST["submit_calendar"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv' && $filename[0] == 'calendar')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    //check data from database
    $item0 = mysqli_real_escape_string($connect, $data[0]);
     $result = mysqli_query($connect, "SELECT * FROM user_account WHERE caldendar_dates='$item1'");
    if(mysqli_num_rows($result) > 0)
    {
    echo "Date already exist";
    }
    else{ //if data exist do nothing, else insert this new data
     $item0 = mysqli_real_escape_string($connect, $data[0]);
     $item1 = mysqli_real_escape_string($connect, $data[1]);

    if($item0 == 'day_no')
    {

    }
    else
    {
    $query = "INSERT INTO `calendar`(calendar_dates)
                VALUES('$item1')";
    
                mysqli_query($connect, $query);
    $cnt = $cnt + 1;
        }
    }

   }
   fclose($handle);
   if($cnt == 0)
   {
    echo "<script>alert('0 records created!');</script>";
   }
   else
   {
    echo "<script>alert('$cnt Records created!');</script>";
   }
   
  }
  else
  echo "<script>alert('invalid file or file type');</script>";
 }
}
?>
