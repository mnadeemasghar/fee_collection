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
<a href=index.php>Home</a> - Receive Payments

<h2>Receive Payments</h2>

<form action=payment.php method=post>

<table>
<tr>
	<td>Sr. No:</td><td><input type=text name=id></td>
</tr>
	<td></td><td><input type=submit name=submit value="View"></td>
<tr>

</tr>
</table>

</form>
<?php

if($_POST["submit"]=='View' || $_GET["slip"]){
$con = mysql_connect("localhost","root","root","iphs");
if(!$con){echo "Unable to Connect". mysql_error();}

if($_POST["submit"]=='View'){ $id = $_POST["id"];} else  {$id = $_GET["slip"];}

$slipdata = mysql_query("SELECT * FROM iphs.slips WHERE id = $id",$con);

while($row = mysql_fetch_array($slipdata)){

$faimlynum = $row["faimlynum"];
$total = $row["total"];
$month = $row["month"];

echo "<table><tr><td class=sprt >";
$paid = mysql_fetch_array(mysql_query("SELECT SUM(amount) AS amount FROM iphs.payments WHERE srno = $id",$con));



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

$paymentdata = mysql_query("SELECT * FROM iphs.payments WHERE srno = $id",$con);

while($payment = mysql_fetch_array($paymentdata)){

echo "<tr><td>";
echo date("d-m-y",$payment["date"]);
echo "</td><td>";
echo $payment["amount"]."</td></tr>";

}
echo "</table>";
/*--------------------Payment History Section End------------------------------------------*/


echo "</td></tr></table>";
}
if($_POST["submit"]=='Receive'){
$con = mysql_connect("localhost","root","root","iphs");
if(!$con){echo "Unable to Connect". mysql_error();}
$amount = $_POST["amount"];
$srno = $_POST["srno"];
$date = time();

$insert = mysql_query("INSERT INTO iphs.payments (srno, amount, date)VALUES ('$srno', '$amount', '$date')",$con);
if($insert){echo "Amount Recorded";}else{echo "Amount not recorded ".mysql_error();}
}
?>
</div>
</body>
</html>