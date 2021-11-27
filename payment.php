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
<?php require "nav_bar.php"; ?>

<a href=index.php>Home</a> - Receive Payments

<h2>Receive Payments</h2>

<form action="payment.php" method="post">

<table>
<tr>
	<td>Sr. No:</td><td><input type=text name=id></td>
</tr>
	<td></td><td><input type="submit" name="submit" value="View"></td>
<tr>

</tr>
</table>

</form>
<?php
if(isset($_POST["submit"])){
	if (isset($_POST["id"])) {
		$id = $_POST["id"];
	}
	if (isset($_POST["srno"])) {
		$id = $_POST["srno"];
		if (isset($_POST["amount"])) {$amount = $_POST["amount"];} else{$amount = 0;}
		if (isset($_POST["srno"])) {$srno = $_POST["srno"];} else{$srno=0;}
		$date = time();
		$insert = mysqli_query($con,"INSERT INTO payments (srno, amount, date)VALUES ('$srno', '$amount', '$date')");
		if($insert){echo "Amount Recorded";}else{echo "Amount not recorded ".mysqli_error();}
	}

$slipdata = mysqli_query($con,"SELECT * FROM slips WHERE id = $id");

while($row = mysqli_fetch_array($slipdata)){

$faimlynum = $row["faimlynum"];
$total = $row["total"];
$month = $row["month"];

echo "<table><tr><td class=sprt >";
$paid = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(amount) AS amount FROM payments WHERE srno = $id"));



$balance = $total - $paid["amount"];
echo "<table><tr><td>Sr. No:</td><td>".$id."</td></tr>";
echo "<tr><td>Family No:</td><td>".$faimlynum."</td><td><a href=viewpaymentbyfn.php?fn=".$faimlynum."&slip=".$id." >View All Slips by Family No</a></td></tr>";
echo "<tr><td>Fee Month:</td><td>".$month."</td></tr>";
echo "<tr><td>Slip Amount:</td><td>".$total."</td></tr>";
echo "<tr><td>Paid Amount:</td><td>".$paid["amount"]."</td></tr>";
echo "<tr><td>Balance Amount:</td><td>".$balance."</td></tr>";


echo "<form action=payment.php method=post>";
echo "<tr><td>Received Amount:</td><td><input type=hidden name=srno value=".$id."><input type=text name=amount></td></tr>";
echo "<tr><td></td><td><input type=submit name=submit value=Receive></td></tr>";
echo "</form></table>";
}
echo "</td><td>";

/*--------------------Payment History Section Start------------------------------------------*/
echo "<h3>Payment History</h3>";
echo "<table border=1><tr><td>Date</td><td>Amount</td></tr>";

$paymentdata = mysqli_query($con,"SELECT * FROM payments WHERE srno = $id");

while($payment = mysqli_fetch_array($paymentdata)){

echo "<tr><td>";
echo date("d-m-y",$payment["date"]);
echo "</td><td>";
echo $payment["amount"]."</td></tr>";

}
echo "</table>";
/*--------------------Payment History Section End------------------------------------------*/


echo "</td></tr></table>";
}
?>
</div>
</body>
</html>