<?php

class conn {
	public $con;
	function __construct() {
		$this->con = mysqli_connect("localhost","root","","iphs");
	}
	
	//if(!$con){
	//	echo "Unable to Connect". mysqli_error();
	//}
}
?>