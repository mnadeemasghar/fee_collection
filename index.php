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
<h2>Welcome to The Fee System</h2>
<h3>Student</h3>
<ul>
<li><a href="newstd.php">Add New Student</a></li>
<li><a href="newfaimly.php">Add New Family</a></li>
<li><a href="viewstd.php">View/Edit Student</a></li>
<li><a href="bulkupdatestd.php">Update Bulk Students</a></li>
</ul>

<h3>Slips</h3>
<ul>
<li><a href="createslips.php">Create Slips</a></li>
<li><a href="printslips.php">View/Print Slips</a></li>
</ul>

<h3>Payment</h3>
<ul>
<li><a href="payment.php">Receive Payment</a></li>
<li><a href="viewpaymentbyfn.php">View Payment by Family Number</a></li>
</ul>
</div>
</body>
</html>