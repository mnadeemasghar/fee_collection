<?php
// Start the session
session_start();
?>

<html>
<head>
<?php require "header.php"; ?></head>
<body>
<div class=wraper>
<?php require "nav_bar.php"; ?>

<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - Update by Class

<h2>Update by Class</h2>

<ul>
<li><a href="updateclasstution.php">Update Class Tuition Fee</a></li>
<li><a href="updateclassgenerator.php">Update Class Generator Fee</a></li>
<li><a href="updateclassbuilding.php">Update Class Building Fund</a></li>
<li><a href="updateclassmedical.php">Update Class Medical Fee</a></li>
<li><a href="updateclassrecreation.php">Update Class Recreation Fund</a></li>
<li><a href="updateclassexamination.php">Update Class Examination Fee</a></li>
<li><a href="updateclassbuscharge.php">Update Class Bus Charges</a></li>
</ul>
</div>
</body>
</html>