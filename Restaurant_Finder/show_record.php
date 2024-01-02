<!DOCTYPE html>
<html>
<head>
	<title>show records</title>
</head>
<body>
<?php
include ('db_connection.php');
$sql ="select * from restraunt";
$data =mysqli_query($con,$sql);
$total=mysqli_num_rows($data);
if ($total=mysqli_num_rows($data)) {
?>
	<table border="2">
    <tr>
        <th>Restaurant Id</th>
        <th>Restaurant Name</th>
        <th>Restaurant Address</th>
        <th>Operation</th>
    </tr>
	<?php
	while ($result = mysqli_fetch_array($data)) {
		echo "
			<tr>
				<td>".$result['Rest_Id']."</td>
                <td>".$result['Rest_Name']."</td>
                <td>".$result['Addres']."</td>
                
				<td><a href='./Update.php?restid=$result[Rest_Id] & restname=$result[Rest_Name] & add=$result[Addres]'> UPDATE </a> |
				<a href='./Delete.php?restid=$result[Rest_Id]'>DELETE</a></td>
			</tr>
		";
	    }
    }
else
{
 	echo "no record found";
}
?>
</table>
<br><br><button><a href="adminui.html">Home</a></button>
</body>
</html>