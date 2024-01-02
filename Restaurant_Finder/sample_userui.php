<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Restaurant Finder</title>
    <style>
        .t1{
            margin-left: 10%;
            margin-top: -100px;
            margin-bottom: 50px;
            align-items: center;
        }
        .t2{
            margin-left: 35%;
            margin-top: 10px;
            margin-bottom: 10px;
            align-items: center;
        }
        #map {
            height: 300px; 
            width: 45%;
            margin-left: 400px; 
            margin-bottom: 50px;
            align-self: center;
        }

    </style>
</head>
<body>
    <header>
        <h1>Restaurant Finder</h1>
    </header>
    <nav>
        <ul>
            <li><a href="source.html">Home</a></li>
            <li><a href="About.html">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="UserLogin.php">Log Out</a></li>
        </ul>
    </nav>
    <main>
        <div id="Outerdiv">
            <section>
                <h2>Welcome to Your Website</h2>
                <p>This is the main content of your website.</p>
            </section>
            <div id="buttonid">
                <form action="" method="get">
                    <input type="text" name="searched" placeholder="Search for Restaurants" >
                    <input type="submit" name="submit" value="Search Restraunt">
                </form>
            </div>
        </div>
    </main>    <?php
        error_reporting(0);
        include ('db_connection.php');
        if(isset($_GET['submit'])){
            $searched=$_GET['searched'];
            $sql ="select Rest_Name,Addres from restraw where Rest_Name like '%$searched%' or Addres like '%$searched%'";
            $data =mysqli_query($con,$sql);
            $total=mysqli_num_rows($data);
            if($total=mysqli_num_rows($data)){
        ?>
        <table class="t1" border="2">
        <tr>
            <td>Restaurant Name</td>
            <td>Restaurant Address</td>
        </tr>
        <?php 
        while($result = mysqli_fetch_array($data)){
            echo"
                <tr>
                    <td>".$result['Rest_Name']."</td>
                    <td>".$result['Addres']."</td> 
                </tr>
            ";
            } 
        }else{
        echo "No Record Found";
        }
    }
        ?>
        </table>

        
    <div class="butt">
        <form action="" method="post">
            <input type="text" name="find" placeholder="Search for Restaurants" >
            <input type="submit" name="submit" value="Search Restraunt">
        </form>
    </div>

    <?php
        error_reporting(0);
        include ('db_connection.php');
        if(isset($_POST['submit'])){
            $find=$_POST['find'];
            $sql2 ="select Rest_Name,Addres from restraunt where Rest_Name='$find'";
            $sql1="select Latitude,Longitude FROM restraw WHERE Rest_Name='$find'";
            $data2 =mysqli_query($con,$sql2);
            $data1=mysqli_query($con,$sql1);
            $result1=mysqli_fetch_array($data1);
            if($total2=mysqli_num_rows($data2)){
        ?>
        <table class="t2" border="2">
        <tr>
            <td>Restaurant Name</td>
            <td>Restaurant Address</td>
        </tr>
        <?php 
        while($result2 = mysqli_fetch_array($data2)){
            echo"
                <tr>
                    <td>".$result2['Rest_Name']."</td>
                    <td>".$result2['Addres']."</td> 
                </tr>
            ";
            } 
        }else{
        echo "No Record Found";
        }
    }
    ?>
    </table>
    <div id="map"></div>
        
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <script>
       var destination = {lat:<?php echo $result1['Latitude']?> , lng:<?php echo $result1['Longitude']?>};

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          center: destination,
          zoom: 12
        });
        var marker = new google.maps.Marker({
            position: destination,
            map: map,
            title: 'Youre Destination'
        });

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
            function(position) {
              var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };

              var marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'Your Location'
              });

              var directionsService = new google.maps.DirectionsService();
              var directionsRenderer = new google.maps.DirectionsRenderer();
              directionsRenderer.setMap(map);

              var request = {
                origin: pos,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
              };

              directionsService.route(request, function(result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                  directionsRenderer.setDirections(result);
                }
              });
            },
            function() {
              handleLocationError(true, map.getCenter());
            }
          );
        } else {
          handleLocationError(false, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, pos) {
        alert(
          browserHasGeolocation
            ? 'Error: The Geolocation service failed.'
            : 'Error: Your browser doesnt support geolocation.'
        );
      }
    </script>

    <footer>
        <p id="footerid">&copy; 2023 Your Website</p>
    </footer>

</body>
</html>