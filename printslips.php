<?php
// Start the session
session_start();
?>

<html>
<head>
<?php if(isset($_GET["submit"])){require "connection.php";}else{require "header.php";} ?>
<?php if(isset($_GET["submit"])) { echo "<link href=head.css rel=stylesheet type= text/css >"; } ?>
</head>
<body <?php if(isset($_GET["submit"])){ echo "onload='print()'";} ?> >
<div class=wraper>
<?php
if(isset($_GET["submit"])){
	$month = $_GET["month"]. "-" . $_GET["year"];
	$slips = mysqli_query($con,"SELECT * FROM slips WHERE month LIKE '$month' ");
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

	$name = mysqli_query($con,"SELECT * FROM students WHERE faimlynum = '$faimlynum' ");

	echo "<tr><td>Name: </td><td>";

	while($std = mysqli_fetch_array($name)){ echo $std["name"].", ";}

	echo "</td>";
	echo "<td>Class: </td><td>";

	$name = mysqli_query($con,"SELECT * FROM students WHERE faimlynum = '$faimlynum' ");

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

	$name = mysqli_query($con,"SELECT * FROM students WHERE faimlynum = '$faimlynum' ");

	echo "<tr><td>Name: </td><td>";

	while($std = mysqli_fetch_array($name)){ echo $std["name"].", ";}

	echo "</td>";
	echo "<td>Class: </td><td>";

	$name = mysqli_query($con,"SELECT * FROM students WHERE faimlynum = '$faimlynum' ");

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
	$insert = mysqli_query($con,"INSERT INTO students (name, class, regnum, faimlynum, admission, tuition, sports, building, medical, recreation, examination, buscharge)VALUES('$name', '$class', '$regnum', '$faimlynum', '$admission', '$tuition', '$sports', '$building', '$medical', '$recreation', '$examination', '$buscharge')");
	if($insert){echo "Data Entered";}else{echo "Data not Entered<br>".mysqli_error();}*/
}
else{
	echo "<a href=index.php>Home</a> - View/Print Slips
	<h2>View/Print Slips</h2>";

	$data = mysqli_query($con,"SELECT distinct month FROM slips");
	$results = mysqli_fetch_all($data);

	foreach($results as $result){
		$month = substr($result[0],0,strpos($result[0],'-'));
		$year = substr($result[0],strpos($result[0],'-')+1);
		echo "<li><a target='_blank' href='printslips.php?month=".$month."&year=".$year."&submit'>".$result[0]."</a></li>";
	}
}
?>
</div>
</body>
</html>