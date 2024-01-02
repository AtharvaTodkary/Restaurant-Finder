<?php
 $con=mysqli_connect('localhost','root','42.at_60.pr_@_ap','dbms mini project') or die("connection failed: ".mysqli_connect_error());
 if($con){
    //echo "Connection Established Successfully";
 }
 else{
    echo "Connection Could not be Established. Some Error has occured";
 }
 if(mysqli_connect_errno())
 {
    echo " fail to connect to mysql".mysqli_connect_error();
 }
 ?>