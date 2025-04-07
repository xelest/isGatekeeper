<?php 
  $con = mysqli_connect('localhost', 'root', '', 'mclccisn_gatekeeper');
  
  //on page load
  $username = "";
  $uid = "";
  //default
  $pwd1 = "changeme";

  if (isset($_POST['pwdreset'])) {
  	$uname = $_POST['uname'];
    $pwdN = passAjinomoto($pwd1);
    $status = "A";

  if($uname != 'admin')
  {
      $sql_u = "SELECT * FROM systemusers WHERE `uname`='$uname'";
      $res_u = mysqli_query($con, $sql_u);
    
      if (mysqli_num_rows($res_u) > 0) 
      {
          $query = "UPDATE `systemusers` SET `password`='$pwdN',`status`='$status' WHERE `uname`='$uname'";
                    
           $results = mysqli_query($con, $query);
           //echo 'Saved!';
           echo "<script type='text/javascript'>alert('Password Reset Success!');</script>";
           exit();
          header('location: login.html');
       
      }
      else
      {
        $name_error = "invalid request"; 
        echo "<script type='text/javascript'>alert('$name_error');</script>";
      }
  }
  else
  {
      echo "<script type='text/javascript'>alert('Not allowed to reset System Administrator');</script>";
  }

  }

  function passAjinomoto($keypass){
      $dbcon = mysqli_connect('localhost', 'root', '', 'mclccisn_gatekeeper');
      $p2 = $keypass;
      $p1 = md5($p2);
      $getQRY = mysqli_query($dbcon, "SELECT PASSWORD('$p1') as PWORD;");
      while($rowX = $getQRY->fetch_assoc()){
      $pwordX = $rowX['PWORD'];
      }
      $pwordX = md5($pwordX);
      return $pwordX;
    }



?>