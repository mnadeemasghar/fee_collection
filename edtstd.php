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
<a href=index.php>Home</a> - Edit Student Data

<h2>Edit Student Data</h2>

<?php

if ($_POST["submit"]=='Update'){




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

$update = mysqli_query($con,"UPDATE students SET name = '$name', class = '$class', regnum = '$regnum',  faimlynum = '$faimlynum', admission = '$admission', tuition = '$tuition', sports = '$sports',  building = '$building',  medical = '$medical',  recreation = '$recreation',  examination = '$examination', buscharge = '$buscharge', active = '$active' WHERE id = $id ");

if($update){ echo "Data Updated <a href=viewstd.php>View All Students</a>";}else {echo "Data not Updated <br> ". mysqli_error();}

}

?>
</div>
</body>
</html>