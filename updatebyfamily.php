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

<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - Update by Family

<h2>Update by Family</h2>

<ul>
<li><a href="updatefamilytution.php">Update Family Tuition Fee</a></li>
<li><a href="updatefamilygenerator.php">Update Family Generator Fee</a></li>
<li><a href="updatefamilybuilding.php">Update Family Building Fund</a></li>
<li><a href="updatefamilymedical.php">Update Family Medical Fee</a></li>
<li><a href="updatefamilyrecreation.php">Update Family Recreation Fund</a></li>
<li><a href="updatefamilyexamination.php">Update Family Examination Fee</a></li>
<li><a href="updatefamilybuscharge.php">Update Family Bus Charges</a></li>
</ul>
</div>
</body>
</html>