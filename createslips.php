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
if($_POST["submit"]){
$con = mysql_connect("localhost","root","root","iphs");
if(!$con){echo "Unable to Connect". mysql_error();}


$month = $_POST["month"]. "-" . $_POST["year"];
$x = 0;
$result = mysql_query("SELECT * FROM iphs.students WHERE active = 'Y' GROUP BY faimlynum",$con);

while($row = mysql_fetch_array($result)){
$faimlynum = $row["faimlynum"];
$sum = mysql_fetch_array(mysql_query("SELECT SUM( admission ) AS admission,SUM( tuition ) AS tuition,SUM( sports ) AS sports,SUM( building ) AS building,SUM( medical ) AS medical,SUM( recreation ) AS recreation,SUM( examination ) AS examination,SUM( buscharge ) AS buscharge FROM iphs.students WHERE faimlynum = $faimlynum",$con));
$total = $sum["admission"] + $sum["tuition"] + $sum["sports"] + $sum["building"] + $sum["medical"] + $sum["recreation"] + $sum["examination"] + $sum["buscharge"];

$stnum = mysql_fetch_array(mysql_query("SELECT count( faimlynum ) AS faimlynum FROM iphs.students WHERE faimlynum = $faimlynum",$con));

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

$insert = mysql_query("INSERT INTO iphs.slips (stnum, faimlynum, month, admission, tuition, sports, building, medical, recreation, examination, buscharge, total)VALUES ('$stnum', '$faimlynum', '$month', '$admission', '$tuition', '$sports', '$building', '$medical', '$recreation', '$examination', '$buscharge', '$total')",$con);
if($insert){$x=$x+1;}else{echo "Data not entered ". mysql_error();}
}
echo $x. " New Slips Created";
}
?>
</div>
</body>
</html>