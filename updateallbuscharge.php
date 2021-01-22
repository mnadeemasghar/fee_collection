<?php
// Start the session
session_start();
?>

<html>
<head>
<title>Islamic Public School Fee System</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class=wraper>
<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - <a href=updatebyall.php>Update All Active Students</a> - Update All Students Bus Charges

<h2>Update All Students Bus Charges</h2>

<?php
$con = mysqli_connect("localhost","root","root","iphs");
if(!$con){echo "Unable to Connect". mysqli_error();}

if(isset($_POST["update"])){
$data = $_POST["data"];

$update = mysqli_query($con,"UPDATE iphs.students SET buscharge = '$data' WHERE students.active = 'Y'");
if($update){

echo "Data Updated";

}

else
{

echo "Data not updated<br>". mysqli_error();

}

}

else{
echo "<form action=updateallbuscharge.php method=post >";
echo "<table>
<tr><td>Enter Bus Charge</td><td><input type=text name=data ></td></tr>
<tr><td></td><td><input type=submit name=update value=update ></td></tr>
</table>";
echo "</form>";
}?>

</div>
</body>
</html>