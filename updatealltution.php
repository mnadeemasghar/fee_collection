<?php
// Start the session
session_start();
?>

<html>
<head>
<?php require "header.php"; ?>
</head>
<body>
<div class=wraper>
<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - <a href=updatebyall.php>Update All Active Students</a> - Update All Students Tuition Fee

<h2>Update All Students Tuition Fee</h2>

<?php


if(isset($_POST["update"])){
$tuition = $_POST["tuition"];

$update = mysqli_query($con,"UPDATE iphs.students SET tuition = '$tuition' WHERE students.active = 'Y'");
if($update){

echo "Data Updated";

}

else
{

echo "Data not updated<br>". mysqli_error();

}

}

else{
echo "<form action=updatealltution.php method=post >";
echo "<table>
<tr><td>Enter Tuition Fee</td><td><input type=text name=tuition ></td></tr>
<tr><td></td><td><input type=submit name=update value=update ></td></tr>
</table>";
echo "</form>";
}?>

</div>
</body>
</html>