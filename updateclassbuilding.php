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
<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - <a href=updatebyclass.php>Update by Class</a> - Update Class Building Fund

<h2>Update Class Building Fund</h2>

<?php
$con = mysql_connect("localhost","root","root","iphs");
if(!$con){echo "Unable to Connect". mysql_error();}

if($_POST["update"]=='update'){
$data = $_POST["data"];
$class = $_POST["class"];

$update = mysql_query("UPDATE iphs.students SET building = '$data' WHERE students.class = '$class'",$con);
if($update){

echo "Data Updated";

}

else
{

echo "Data not updated<br>". mysql_error();

}

}

else{
echo "<form action=updateclassbuilding.php method=post >";
echo "<table>
<tr><td>Enter Building Fund</td><td><input type=text name=data ></td></tr>
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