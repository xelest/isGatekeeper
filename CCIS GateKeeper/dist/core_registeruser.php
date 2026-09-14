<?php 
  //$con = mysqli_connect('db', 'root', '', 'soilanalysisdb');
  //online
  $con = mysqli_connect('db', 'root', '', 'mclccisn_gatekeeper');

  //on page load
  $fname = "";
  $lname = "";
  $username = "";
  $pwd1 = "";
  $pwd2 = "";
  $pwdN = "";
  $role = "";


 if (isset($_POST['register'])) {
 	$uname = mysqli_real_escape_string($con, $_POST['uname']);
    $pwd1 = $_POST['pword'];
    $pwd2 = $_POST['pword2'];
    $dept = mysqli_real_escape_string($con, $_POST['department']);
    $pwdN = passAjinomoto($pwd1);
    $urole = mysqli_real_escape_string($con, $_POST['urole']);
    $status = "A";

      $sql_u = "SELECT * FROM systemusers WHERE uname='$uname'";
      $res_u = mysqli_query($con, $sql_u);
    
      if (mysqli_num_rows($res_u) > 0) 
      {
        if(strtoupper($uname)=='ADMIN')
        {
           $name_error = "NOT ALLOWED TO USE SYSTEM ADMIN AS ACCOUNT NAMES"; 
        echo "<script type='text/javascript'>alert('$name_error');</script>";
        }
        else
        {
          $name_error = "Sorry... username already taken"; 
        echo "<script type='text/javascript'>alert('$name_error');</script>";
        }
        
      }
      else
      {
        if ($pwd1 === $pwd2)
        {
           $query = "INSERT INTO systemusers (`uname`, `pword`, `status`, `urole`,`department`) 
                    VALUES ('".$uname."','".$pwdN."', 'A', '".$urole."','".$dept."')";
                    
           $results = mysqli_query($con, $query);
           if ($results) {
             echo "<script type='text/javascript'>alert('Record created. Success!');</script>";
           } else {
             echo "<script type='text/javascript'>alert('Registration failed. Please try again.');</script>";
           }

           exit();
        }
        else
        {
            echo "<script type='text/javascript'>alert('missmatched password!');</script>";
        }
  	}
  }

  function passAjinomoto($keypass){
      $dbcon = mysqli_connect('db', 'root', '', 'mclccisn_gatekeeper');
      $p2 = $keypass;
      $p1 = md5($p2);
      $getQRY = mysqli_query($dbcon, "SELECT PASSWORD('$p1') as PWORD;"); // 1st layer md5
      while($rowX = $getQRY->fetch_assoc()){
      $pwordX = $rowX['PWORD'];
      }
      $pwordX = md5($pwordX); // 2nd layer md5
      return $pwordX;
    }



?>