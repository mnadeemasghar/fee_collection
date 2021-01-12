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
<a href=index.php>Home</a> - View Student Data

<h2>View Student Data</h2>

<?php
$con = mysql_connect("localhost","root","root","iphs");
if(!$con){echo "Unable to Connect". mysql_error();}

if($_POST["submit"]=='Edit'){
$id = $_POST["id"];

$stddata = mysql_query("SELECT * FROM iphs.students WHERE id = $id",$con);

while($row = mysql_fetch_array($stddata)){

$name = $row["name"];
$class = $row["class"];
$regnum = $row["regnum"];
$faimlynum = $row["faimlynum"];
$admission = $row["admission"];
$tuition = $row["tuition"];
$sports = $row["sports"];
$building = $row["building"];
$medical = $row["medical"];
$recreation = $row["recreation"];
$examination = $row["examination"];
$buscharge = $row["buscharge"];
$active = $row["active"];

echo "<div class=warning>Note: Please re-write all fields wither it is correct or not.</div>";

echo "<form action=edtstd.php method=post>";

echo "<table>";

echo "<tr><td</td><td><input type=hidden name=id value=".$id."></td></tr>";

echo "<tr><td>Name</td><td><input type=text name=name value=".$name."></td></tr>";

echo "<tr><td>Class</td><td>";
echo "<select name=class >
  <option value=PG >Play Group</option>
  <option value=KG >K.G</option>
  <option value=Nursery >Nursery</option>
  <option value=1st >1st</option>
  <option value=2nd >2nd</option>
  <option value=3rd >3rd</option>
  <option value=4th >4th</option>
  <option value=5th >5th</option>
  <option value=6th >6th</option>
  <option value=7th >7th</option>
  <option value=8th >8th</option>
  <option value=9th >9th</option>
  <option value=10th >10th</option>
</select> ";

echo "</td></tr>";

echo "<tr><td>Registration Number</td><td><input type=text name=regnum value=".$regnum."></td></tr>";

echo "<tr><td>Faimly Number</td><td><input type=text name=faimlynum value=".$faimlynum."></td></tr>";

echo "<tr><td>Default Addmission Fee</td><td><input type=text name=admission value=".$admission."></td></tr>";

echo "<tr><td>Default Tuition Fee</td><td><input type=text name=tuition value=".$tuition."></td></tr>";

echo "<tr><td>Default Generator Fund</td><td><input type=text name=sports value=".$sports."></td></tr>";

echo "<tr><td>Default Building Fund</td><td><input type=text name=building value=".$building."></td></tr>";

echo "<tr><td>Default Medical Fee</td><td><input type=text name=medical value=".$medical."></td></tr>";

echo "<tr><td>Default Recreation Fee</td><td><input type=text name=recreation value=".$recreation."></td></tr>";

echo "<tr><td>Default Examination Fee</td><td><input type=text name=examination value=".$examination."></td></tr>";

echo "<tr><td>Default Bus charges</td><td><input type=text name=buscharge value=".$buscharge."></td></tr>";

echo "<tr><td>Active</td><td><select name=active >
  <option value=Y >Yes ( Student Enrolled ) </option>
  <option value=N >No ( Student not Enrolled )</option>
</select></td></tr>";

echo "<tr><td></td><td><input type=submit name=submit value=Update></td></tr>";
echo "</table></form>";

}}

else{


echo "<table border=1><th>Reg. Num</th><th>Name</th><th>Class</th><th>Family No</th><th>Admission</th><th>Tuition</th><th>Generator</th><th>Building</th><th>Medical</th><th>Recreation</th><th>Examination</th><th>Buscharge</th><th>Active</th><th>Edit</th>";

$stddata = mysql_query("SELECT * FROM iphs.students",$con);
while($row = mysql_fetch_array($stddata)){

$id = $row["id"];

echo "<tr>";

echo "<td>";
echo $row["regnum"];
echo "</td>";

echo "<td>";
echo $row["name"];
echo "</td>";

echo "<td>";
echo $row["class"];
echo "</td>";

echo "<td>";
echo $row["faimlynum"];
echo "</td>";

echo "<td>";
echo $row["admission"];
echo "</td>";

echo "<td>";
echo $row["tuition"];
echo "</td>";

echo "<td>";
echo $row["sports"];
echo "</td>";

echo "<td>";
echo $row["building"];
echo "</td>";

echo "<td>";
echo $row["medical"];
echo "</td>";

echo "<td>";
echo $row["recreation"];
echo "</td>";

echo "<td>";
echo $row["examination"];
echo "</td>";

echo "<td>";
echo $row["buscharge"];
echo "</td>";

echo "<td>";
echo $row["active"];
echo "</td>";

echo "<td>";
echo "<form action=viewstd.php method=post><input type=hidden name=id value=".$id." ><input type=submit name=submit value=Edit> </form>";
echo "</td>";

echo "</tr>";
}
echo "</table>";
}

?>
</div>
</body>
</html>