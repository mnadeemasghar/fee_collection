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
<a href=index.php>Home</a> - Create Slips

<h2>Create Slips</h2>

<form action=createslips.php method=post>

<table>
<tr>
	<td>Create slips for the month</td><td><input type=text name=month></td><td>year</td><td><input type=text name=year></td>
</tr>
	<td><input type=submit name=submit value="Create Slips"></td>
<tr>

</tr>
</table>

</form>
<?php
if(isset($_POST["submit"])){



$month = $_POST["month"]. "-" . $_POST["year"];
$x = 0;
$result = mysqli_query($con,"SELECT * FROM iphs.students WHERE active = 'Y' GROUP BY faimlynum");

while($row = mysqli_fetch_array($result)){
$faimlynum = $row["faimlynum"];
$sum = mysqli_fetch_array(
		mysqli_query(
			$con,
			"SELECT 
				SUM( admission ) AS admission,
				SUM( tuition ) AS tuition,
				SUM( sports ) AS sports,
				SUM( building ) AS building,
				SUM( medical ) AS medical,
				SUM( recreation ) AS recreation,
				SUM( examination ) AS examination,
				SUM( buscharge ) AS buscharge 
				FROM iphs.students 
				WHERE faimlynum = $faimlynum"));
$total = $sum["admission"] + $sum["tuition"] + $sum["sports"] + $sum["building"] + $sum["medical"] + $sum["recreation"] + $sum["examination"] + $sum["buscharge"];

$stnum = mysqli_fetch_array(
			mysqli_query(
				$con,
				"SELECT 
				count( faimlynum ) AS faimlynum 
				FROM iphs.students 
				WHERE faimlynum = $faimlynum"));

$stnum = $stnum["faimlynum"];
$faimlynum = $faimlynum;
$month = $month;
$admission = $sum["admission"];
$tuition = $sum["tuition"];
$sports = $sum["sports"];
$building = $sum["building"];
$medical = $sum["medical"];
$recreation = $sum["recreation"];
$examination = $sum["examination"];
$buscharge = $sum["buscharge"];
$total = $total;

$insert = mysqli_query(
	$con,
	"INSERT INTO iphs.slips 
		(stnum, faimlynum, month, admission, tuition, sports, building, medical, recreation, examination, buscharge, total)
	VALUES ('$stnum', '$faimlynum', '$month', '$admission', '$tuition', '$sports', '$building', '$medical', '$recreation', '$examination', '$buscharge', '$total')");
if($insert){$x=$x+1;}else{echo "Data not entered ". mysqli_error();}
}
echo $x. " New Slips Created";
}
?>
</div>
</body>
</html>