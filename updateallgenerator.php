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
<a href=index.php>Home</a> - <a href=bulkupdatestd.php>Update Bulk Students</a> - <a href=updatebyall.php>Update All Active Students</a> - Update All Students Generator Fee

<h2>Update All Students Generator Fee</h2>

<?php
$con = mysql_connect("localhost","root","root","iphs");
if(!$con){echo "Unable to Connect". mysql_error();}

if($_POST["update"]=='update'){
$sports = $_POST["sports"];

$update = mysql_query("UPDATE iphs.students SET sports = '$sports' WHERE students.active = 'Y'",$con);
if($update){

echo "Data Updated";

}

else
{

echo "Data not updated<br>". mysql_error();

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