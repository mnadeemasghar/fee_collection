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
<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - <a href=updatebyclass.php>Update by Class</a> - Update Class Tuition Fee

<h2>Update Class Tuition Fee</h2>

<?php


if(isset($_POST["update"])){
$data = $_POST["data"];
$class = $_POST["class"];

$update = mysqli_query($con,"UPDATE students SET tuition = '$data' WHERE students.class = '$class'");
if($update){

echo "Data Updated";

}

else
{

echo "Data not updated<br>". mysqli_error();

}

}

else{
echo "<form action=updateclasstution.php method=post >";
echo "<table>
<tr><td>Enter Tuition Fund</td><td><input type=text name=data ></td></tr>
<tr><td>Enter Class</td><td>

<select name=class >
  <option value=PG>Play Group</option>
  <option value=Nursery>Nursery</option>
  <option value=Prep>Prep</option>
  <option value=1st>1st</option>
  <option value=2nd>2nd</option>
  <option value=3rd>3rd</option>
  <option value=4th>4th</option>
  <option value=5th>5th</option>
  <option value=6th>6th</option>
  <option value=7th>7th</option>
  <option value=8th>8th</option>
  <option value=9th>9th</option>
  <option value=10th>10th</option>
</select> 

</td></tr>
<tr><td></td><td><input type=submit name=update value=update ></td></tr>
</table>";
echo "</form>";
}?>

</div>
</body>
</html>