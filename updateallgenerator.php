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

<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - <a href=updatebyall.php>Update All Active Students</a> - Update All Students Generator Fee

<h2>Update All Students Generator Fee</h2>

<?php


if(isset($_POST["update"])){
$sports = $_POST["sports"];

$update = mysqli_query($con,"UPDATE students SET sports = '$sports' WHERE students.active = 'Y'");
if($update){

echo "Data Updated";

}

else
{

echo "Data not updated<br>". mysqli_error();

}

}

else{
echo "<form action=updateallgenerator.php method=post >";
echo "<table>
<tr><td>Enter Generator Fee</td><td><input type=text name=sports ></td></tr>
<tr><td></td><td><input type=submit name=update value=update ></td></tr>
</table>";
echo "</form>";
}?>

</div>
</body>
</html>