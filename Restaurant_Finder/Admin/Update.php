<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update</title>
    <style>
        .big{
            width: 80%;
        }
        main{
            margin-bottom: 70px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Restaurant Finder</h1>
    </header>
    <main>
        <div id="Outerdiv">
            <h1>Update Restaurant Information</h1>
            <div id="buttonid">
             <form action="" method="get">
                <b>Restaurant Id : </b><input type="text" readonly="readonly" name="restid" value="<?php echo $_GET['restid'];?>"><br><br>
                <b>Restaurant Name : </b><input type="text" name="restname" placeholder="Enter Restaurant_name" value=""><br><br>
                <b>Restaurant Address : </b><input class="big" type="text" name="add" placeholder="Enter Restaurant's Address" value=""><br><br>
                <b>Longitude : </b><input type="text" name="long" placeholder="Enter Restaurant's Longitude"><br><br>
                <b>Latitude : </b><input type="text" name="lat" placeholder="Enter Restaurant's Latitude"><br><br>
                <input type="submit" name="submit" value="Update Record">
             </form>
            </div>
        </div>
    </main>
    
    <?php 
      error_reporting(0);
      include ('db_connection.php');
      
      if ($_GET['submit'])
      {
        $restid = $_GET['restid'];
        $restname = $_GET['restname'];
        $add = $_GET['add'];
        $long = $_GET['long'];
        $lat = $_GET['lat'];
        //$Location = $_GET['Location'];
        $sql="UPDATE restraw SET Rest_Name='$restname', Addres='$add', Longitude='$long', Latitude='$lat' WHERE Rest_Id='$restid'";
        $data=mysqli_query($con, $sql);
        if ($data) {
            echo "Record Updated Successfully";
            header('location:show_record[1].php');
        }
        else{
            echo "Record is not updated";
        }
      }
      else
      {
          echo "Click on button to save the changes";
      }
    ?>
    <br><br><button><a href="adminui.html">Home</a></button>
</body>
</html>