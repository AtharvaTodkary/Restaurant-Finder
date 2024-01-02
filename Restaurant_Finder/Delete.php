<?php
    include ('db_connection.php');
    $restid = $_GET['restid'];
    $sql ="DELETE FROM restraunt WHERE Rest_Id='$restid'";
    $data = mysqli_query($con,$sql);
    if ($data) {
    	echo "deleted";
    	header('location:show_record[1].php');
    }else
    {
    	echo "error";
    }
?>