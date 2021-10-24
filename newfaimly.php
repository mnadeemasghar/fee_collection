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
<a href=index.php>Home</a> - New Family

<h2>Add New Family</h2>

<form action=newfaimly.php method=post>

<table>
<tr>
	<td>Faimly Name</td><td><input type=text name=fname></td>
</tr>

<tr>
	<td>Faimly Number</td><td><input type=text name=faimlynum></td>
</tr>

<tr>
	<td></td><td><input type=submit name=submit value="Save and Create New"></td>
</tr>
</table>

</form>
<?php
if(isset($_POST["submit"])){

/*
$_SESSION["email"] = 
$_SESSION["password"] = */

$fname = $_POST["fname"];
$faimlynum = $_POST["faimlynum"];


$insert = mysqli_query($con,"INSERT INTO faimly (fname, faimlynum)VALUES('$fname','$faimlynum')");
if($insert){echo "Data Entered";}else{echo "Data not Entered<br>".mysqli_error();}
}
?>
</div>
</body>
</html>