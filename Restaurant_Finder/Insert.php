<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row text-centre">
        <div class="container">
            <h1>Insert Restaurant Information</h1>
            <form action="Insert.php" method="get">
                <b>Restaurant ID:</b><input type="text" name="restid" placeholder="Insert Restaurant ID" ><br><br>
                <b>Restaurant Name:</b><input type="text" name="restname" placeholder="Insert Restaurant Name"><br><br>
                <b>Address:</b><input type="text" name="Addr" placeholder="Insert Restaurant's Address"><br><br>
                <b>Longitude:</b><input type="text" name="long" placeholder="Insert Longitude" ><br><br>
                <b>Latitude:</b><input type="text" name="lat" placeholder="Insert Latitude" ><br><br>
                <!--<b>Location:</b><input type="text" name="loc" placeholder="Insert Restaurant's Location"><br><br>-->
                <input type="submit" name="submit" value="Insert Restaurant Data"><br><br>
            </form>
            <button><a href="show_record[1].php">Show Restaurant Data</a></button>
        </div>
    </div>
    <?php
        error_reporting(0);
        include ('db_connection.php');
        if($_GET['submit'])
        {
        $restid = $_GET['restid'];
        $restname = $_GET['restname'];
        $Addr = $_GET['Addr'];
        $long=$_GET['long'];
        $lat=$_GET['lat'];
        //$Loc = $_GET['Loc'];
        $sql="INSERT INTO `restraunt` (`Rest_Id`, `Rest_Name`, `Addres`, `Location`) VALUES ('$restid', '$restname', '$Addr', ST_GeomFromText('POINT($long $lat)'))";
        $data=mysqli_query($con,$sql);
        if ($data) {
            echo "Record Inserted Successfully";
        }
        else{
            echo "Record is not Inserted";
        }
        }
    ?>
    <br><br><button><a href="adminui.html">Home</a></button>
</body>
</html>
