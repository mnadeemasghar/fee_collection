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
<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - Update All Active Students

<h2>Update All Active Students</h2>

<ul>
<li><a href="updatealltution.php">Update All Students Tuition Fee</a></li>
<li><a href="updateallgenerator.php">Update All Students Generator Fee</a></li>
<li><a href="updateallbuilding.php">Update All Students Building Fund</a></li>
<li><a href="updateallmedical.php">Update All Students Medical Fee</a></li>
<li><a href="updateallrecreation.php">Update All Students Recreation Fund</a></li>
<li><a href="updateallexamination.php">Update All Students Examination Fee</a></li>
<li><a href="updateallbuscharge.php">Update All Students Bus Charges</a></li>
</ul>
</div>
</body>
</html>