<?php
require "connect.php";
class student extends conn {

	public function getbyid($id){
		$stddata = mysqli_query($this->con, "SELECT * FROM students WHERE id = $id");
		while($row = mysqli_fetch_array($stddata)){
			return $this->data = array(
				'name' => $row["name"],
				'class' => $row["class"],
				'regnum' => $row["regnum"],
				'faimlynum' => $row["faimlynum"],
				'admission' => $row["admission"],
				'tuition' => $row["tuition"],
				'sports' => $row["sports"],
				'building' => $row["building"],
				'medical' => $row["medical"],
				'recreation' => $row["recreation"],
				'examination' => $row["examination"],
				'buscharge' => $row["buscharge"],
				'active' => $row["active"]
			);
		}
	}
}


?>