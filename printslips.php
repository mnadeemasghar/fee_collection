<?php
// Start the session
session_start();
?>

<html>
<head>
<?php require "header.php"; ?>
<?php if(isset($_GET["submit"])) { echo "<link href=head.css rel=stylesheet type= text/css >"; } ?>
</head>
<body>
<div class=wraper>
<?php
if(isset($_GET["submit"])){
$con = mysqli_connect("localhost","root","","iphs");
if(!$con){echo "Unable to Connect". mysqli_error();}


$month = $_GET["month"]. "-" . $_GET["year"];

$slips = mysqli_query($con,"SELECT * FROM iphs.slips WHERE month LIKE '$month' ");
while($row = mysqli_fetch_array($slips))
{
$id = $row["id"];
//$class = $row["class"];
//$regnum = $row["regnum"];
$faimlynum = $row["faimlynum"];
$admission = $row["admission"];
$tuition = $row["tuition"];
$sports = $row["sports"];
$building = $row["building"];
$medical = $row["medical"];
$recreation = $row["recreation"];
$examination = $row["examination"];
$buscharge = $row["buscharge"];
$total = $row["total"];
$stnum = $row["stnum"];


echo "<div class=slip >";
echo "<div>";

echo "<div class=sliphead> <img src='sliphead.png'></div><br><br>";
echo "<table class=prntslip>";
echo "<tr><td>Sr. No: </td><td>".$id."</td>";
echo "<td>Fee Month: </td><td>".$month."</td></tr>";

$name = mysqli_query($con,"SELECT * FROM iphs.students WHERE faimlynum = '$faimlynum' ");

echo "<tr><td>Name: </td><td>";

while($std = mysqli_fetch_array($name)){ echo $std["name"].", ";}

echo "</td>";
echo "<td>Class: </td><td>";

$name = mysqli_query($con,"SELECT * FROM iphs.students WHERE faimlynum = '$faimlynum' ");

while($std = mysqli_fetch_array($name)){ echo $std["class"].", ";}

echo "</td></tr>";
echo "</table>";

echo "<table class=prntslip><th>Fee</th><th>Rupees</th>";
echo "<tr><td class=feecl>Admission</td><td>".$admission."</td></tr>";
echo "<tr><td class=feecl>Tuition</td><td>".$tuition."</td></tr>";
echo "<tr><td class=feecl>Generator</td><td>".$sports."</td></tr>";
echo "<tr><td class=feecl>Building</td><td>".$building."</td></tr>";
echo "<tr><td class=feecl>Medical</td><td>".$medical."</td></tr>";
echo "<tr><td class=feecl>Recreation</td><td>".$recreation."</td></tr>";
echo "<tr><td class=feecl>Examination</td><td>".$examination."</td></tr>";
echo "<tr><td class=feecl>Bus Charge</td><td>".$buscharge."</td></tr>";
echo "<tr><td class=total>Grand Total</td><td class=total>Rs.".$total."</td></tr>";
echo "</table>";
echo "<div class=ad><img src='ad.png'></div>";
echo "</div>";

echo "<br>------------------------------------------------------Cut Here------------------------------------------------------<br>";

echo "<div>";
echo "<table class=prntslip>";
echo "<tr><td>Sr. No: </td><td>".$id."</td>";
echo "<td>Fee Month: </td><td>".$month."</td></tr>";

$name = mysqli_query($con,"SELECT * FROM iphs.students WHERE faimlynum = '$faimlynum' ");

echo "<tr><td>Name: </td><td>";

while($std = mysqli_fetch_array($name)){ echo $std["name"].", ";}

echo "</td>";
echo "<td>Class: </td><td>";

$name = mysqli_query($con,"SELECT * FROM iphs.students WHERE faimlynum = '$faimlynum' ");

while($std = mysqli_fetch_array($name)){ echo $std["class"].", ";}

echo "</td></tr>";
echo "</table>";

echo "<table class=prntslip ><th>Fee</th><th>Rupees</th>";
echo "<tr><td class=feecl>Admission</td><td>".$admission."</td></tr>";
echo "<tr><td class=feecl>Tuition</td><td>".$tuition."</td></tr>";
echo "<tr><td class=feecl>Generator</td><td>".$sports."</td></tr>";
echo "<tr><td class=feecl>Building</td><td>".$building."</td></tr>";
echo "<tr><td class=feecl>Medical</td><td>".$medical."</td></tr>";
echo "<tr><td class=feecl>Recreation</td><td>".$recreation."</td></tr>";
echo "<tr><td class=feecl>Examination</td><td>".$examination."</td></tr>";
echo "<tr><td class=feecl>Bus Charge</td><td>".$buscharge."</td></tr>";
echo "<tr><td><b>Grand Total</b></td><td>".$total."</td></tr>";
echo "</table>";
echo "</div>";
echo "</div>";
}

/*
$insert = mysqli_query($con,"INSERT INTO iphs.students (name, class, regnum, faimlynum, admission, tuition, sports, building, medical, recreation, examination, buscharge)VALUES('$name', '$class', '$regnum', '$faimlynum', '$admission', '$tuition', '$sports', '$building', '$medical', '$recreation', '$examination', '$buscharge')");
if($insert){echo "Data Entered";}else{echo "Data not Entered<br>".mysqli_error();}*/
}
else{
echo "<a href=index.php>Home</a> - View/Print Slips

<h2>View/Print Slips</h2>

<form action=printslips.php method=GET target=_blank>

<table>
<tr>
	<td>View/Print slips for the month of </td><td><input type=text name=month></td><td>year</td><td><input type=text name=year></td>
</tr>
	<td><input type=submit name=submit value=View/Print></td>
<tr>

</tr>
</table>

</form>";
}
?>
</div>
</body>
</html>