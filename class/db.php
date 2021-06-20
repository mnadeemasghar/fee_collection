class db{
	$con = mysqli_connect("localhost","root","","iphs");
	if(!$con){
		echo "Unable to Connect". mysqli_error();
	}
	else {
	return $con;
	}
}