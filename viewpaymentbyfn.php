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
<a href=index.php>Home</a> - View Payments by Family Number

<h2>View Payments by Family Number</h2>

<?php


if(isset($_POST["submit"]) || isset($_GET["fn"])){

if(isset($_POST["submit"])){ $fn = $_POST["fn"];} else {$fn = $_GET["fn"]; $slip = $_GET["slip"]; echo "<a href=payment.php?slip=".$_GET["slip"].">Back to Slip</a>";}

$fndata = mysqli_query($con,"SELECT * FROM slips WHERE faimlynum = $fn");

echo "<table border=1px ><th>Slip Sr. No.</th><th>Fee Month</th><th>Amount</th><th>Paid</th><th>Balance</th>";

while($row = mysqli_fetch_array($fndata)){

$id = $row["id"];

$paid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) AS amount FROM payments WHERE srno = $id"));

if($row["total"] - $paid["amount"]>0){echo "<tr class=unpaid >";} else {echo "<tr>";}

echo "<td>";
echo "<a href=payment.php?slip=".$row["id"].">".$row["id"]."</a>";
echo "</td>";

echo "<td>";
echo $row["month"];
echo "</td>";

echo "<td>";
echo $row["total"];
echo "</td>";

echo "<td>";
echo $paid["amount"];
echo "</td>";

echo "<td>";
echo $row["total"] - $paid["amount"];
echo "</td>";

echo "</tr>";

}

echo "</table>";

}

else{

echo "<form action=viewpaymentbyfn.php method=post >";
echo "<table>";

echo "<tr><td>";
echo "Enter Family Number: ";
echo "</td><td>";
echo "	<select name=fn>";

$dt = mysqli_query($con,"SELECT DISTINCT faimlynum FROM slips ");

while($fai = mysqli_fetch_array($dt)){

echo "<option value=".$fai["faimlynum"]." >".$fai["faimlynum"]."</option>";

}			
echo "	</select>";
echo "</td></tr>";

echo "<tr><td></td><td>";
echo "<input type=submit name=submit value=View >";
echo "</td></tr>";

echo "</table>";
echo "</form>";
}
?>
</div>
</body>
</html>