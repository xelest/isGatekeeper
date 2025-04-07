<?php
require 'connection.php';

if(isset($_POST['insertmsg']))
{
 
        $rt = '2016180067';
        $sr = "Test2";
        $msg = "Test3";
        $A = "A";


        
        $myqryX = "INSERT INTO `attnmessage`(`imsg_details`, `imsg_sender`, `id_no`, `imsg_Status`)
                  VALUES                   ('" . $sr . "' , '" . $sr . "' , '" . $rt . "' , '" .$A . "')";

                  
        if(mysqli_query($con, $myqryX))
        {
                echo "<script>alert('Message Created!')</script>";
        }
        else
        {
                echo "<script>alert('Message FAILED!')</script>";
                echo "<script>alert('".$rt."')</script>";
                echo "<script>alert('".$sr."')</script>";
                echo "<script>alert('".$msg."')</script>";
                echo "<script>alert('".$A."')</script>";
        }

        


}
               

?>