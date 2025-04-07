<?php
$connect = mysqli_connect("localhost", "root", "", "mclccisn_gatekeeper");
$cnt = 0;
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv' && $filename[0] == 'user_account')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    //check data from database
    $item0 = mysqli_real_escape_string($connect, $data[0]);
     $result = mysqli_query($connect, "SELECT * FROM user_account WHERE id_no='$item0'");
    if(mysqli_num_rows($result) > 0)
    {
    echo "User exist";
    }
    else{ //if data exist do nothing, else insert this new data
     $item0 = mysqli_real_escape_string($connect, $data[0]);
     $item1 = mysqli_real_escape_string($connect, $data[1]);
     $item2 = mysqli_real_escape_string($connect, $data[2]);
     $item3 = mysqli_real_escape_string($connect, $data[3]);
     $item4 = mysqli_real_escape_string($connect, $data[4]);
     $item5 = mysqli_real_escape_string($connect, $data[5]);

    if($item0 == 'id_no')
    {

    }
    else
    {
    $query = "INSERT INTO `user_account`(id_no,pass_word,lastname,firstname,acc_type,acc_status)
                VALUES('$item0','$item1','$item2','$item3','$item4','$item5')";
    
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
