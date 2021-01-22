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
<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - <a href=updatebyfamily.php>Update by Family</a> - Update Family Tuition Fee

<h2>Update Family Tuition Fee</h2>

<?php
$con = mysqli_connect("localhost","root","root","iphs");
if(!$con){echo "Unable to Connect". mysqli_error();}

if(isset($_POST["update"])){
$data = $_POST["data"];
$fn = $_POST["fn"];

$update = mysqli_query($con,"UPDATE iphs.students SET tuition = '$data' WHERE students.faimlynum = '$fn'");
if($update){

echo "Data Updated";

}

else
{

echo "Data not updated<br>". mysqli_error();

}

}

else{
echo "<form action=updatefamilytution.php method=post >";
echo "<table>
<tr><td>Enter Tuition Fee</td><td><input type=text name=data ></td></tr>
<tr><td>Enter Family Number</td><td><input type=text name=fn ></td></tr>
<tr><td></td><td><input type=submit name=update value=update ></td></tr>
</table>";
echo "</form>";
}?>
</div>

</body>
</html>