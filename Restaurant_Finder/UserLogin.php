<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>User login</title>
    <style>
        #buttonid2{
            margin: 50px 50px;
        }
    </style>
</head>
<body>
    <header>
        <h1>User Login Page</h1>
    </header>
    <form action="" method="post">
        <div id="buttonid2">
            <p><b> User login</b></p>
            <input type="text" name="UserId" placeholder="Username"><br>
            <input type="password" name="pass" placeholder="Password"><br><br>
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
    <?php
    include "db_connection.php";

    if(isset($_POST['submit'])){

        $uname = mysqli_real_escape_string($con,$_POST['UserId']);
        $password = mysqli_real_escape_string($con,$_POST['pass']);

        if ($uname != "" && $password != ""){

            $sql = "select count(*) as cntUser from users where User_Name='".$uname."' and Password='".$password."'";//users database must be created
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];

            if($count > 0){
                $_SESSION['uname'] = $uname;
                header('Location: sample_userui.php');
            }else{
                echo "Invalid username and password";
            }

        }

    }
?>   
<br><br><button><a href="front.html">Login Page</a></button>
</body>
</html>