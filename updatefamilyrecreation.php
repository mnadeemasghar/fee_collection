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

<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - <a href=updatebyfamily.php>Update by Family</a> - Update Family Recreation Fund

<h2>Update Family Recreation Fund</h2>

<?php


if(isset($_POST["update"])){
$data = $_POST["data"];
$fn = $_POST["fn"];

$update = mysqli_query($con,"UPDATE students SET recreation = '$data' WHERE students.faimlynum = '$fn'");
if($update){

echo "Data Updated";

}

else
{

echo "Data not updated<br>". mysqli_error();

}

}

else{
echo "<form action=updatefamilyrecreation.php method=post >";
echo "<table>
<tr><td>Enter Recreation Fund</td><td><input type=text name=data ></td></tr>
<tr><td>Enter Family Number</td><td><input type=text name=fn ></td></tr>
<tr><td></td><td><input type=submit name=update value=update ></td></tr>
</table>";
echo "</form>";
}?>
</div>

</body>
</html>