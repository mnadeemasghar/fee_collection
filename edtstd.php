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
<a href=index.php>Home</a> - Edit Student Data

<h2>Edit Student Data</h2>

<?php

if ($_POST["submit"]=='Update'){

$con = mysql_connect("localhost","root","root","iphs");
if(!$con){echo "Unable to Connect". mysql_error();}


$id = $_POST["id"];
$name = $_POST["name"];
$class = $_POST["class"];
$regnum = $_POST["regnum"];
$faimlynum = $_POST["faimlynum"];
$admission = $_POST["admission"];
$tuition = $_POST["tuition"];
$sports = $_POST["sports"];
$building = $_POST["building"];
$medical = $_POST["medical"];
$recreation = $_POST["recreation"];
$examination = $_POST["examination"];
$buscharge = $_POST["buscharge"];
$active = $_POST["active"];

$update = mysql_query("UPDATE iphs.students SET name = '$name', class = '$class', regnum = '$regnum',  faimlynum = '$faimlynum', admission = '$admission', tuition = '$tuition', sports = '$sports',  building = '$building',  medical = '$medical',  recreation = '$recreation',  examination = '$examination', buscharge = '$buscharge', active = '$active' WHERE id = $id ",$con);

if($update){ echo "Data Updated <a href=viewstd.php>View All Students</a>";}else {echo "Data not Updated <br> ". mysql_error();}

}

?>
</div>
</body>
</html>