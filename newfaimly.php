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
if($_POST["submit"]){
$con = mysql_connect("localhost","root","root","iphs");
if(!$con){echo "Unable to Connect". mysql_error();}
/*
$_SESSION["email"] = 
$_SESSION["password"] = */

$fname = $_POST["fname"];
$faimlynum = $_POST["faimlynum"];

$insert = mysql_query("INSERT INTO iphs.faimly (fname, faimlynum)VALUES('$fname','$faimlynum')",$con);
if($insert){echo "Data Entered";}else{echo "Data not Entered<br>".mysql_error();}
}
?>
</div>
</body>
</html>