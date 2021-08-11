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
		<a href=index.php>Home</a> - New Student

		<h2>Add New Student</h2>

		<form action=newstd.php method=post>

		<table class='table'>
		<tr>
			<td>Name</td><td><input type=text name=name></td>
		</tr>

		<tr>
			<td>Class</td>
			
			<td>
				<select name=class >
				<option value="PG">Play Group</option>
				<option value="Nursery">Nursery</option>
				<option value="Prep">Prep</option>
				<option value="1st">1st</option>
				<option value="2nd">2nd</option>
				<option value="3rd">3rd</option>
				<option value="4th">4th</option>
				<option value="5th">5th</option>
				<option value="6th">6th</option>
				<option value="7th">7th</option>
				<option value="8th">8th</option>
				<option value="9th">9th</option>
				<option value="10th">10th</option>
				</select> 

			</td>
		</tr>

		<tr>
			<td>Registration Number</td><td><input type=text name=regnum></td>
		</tr>

		<tr>
			<td>Faimly Number</td><td><input type=text name=faimlynum></td>
		</tr>
		<input type=hidden value=0 name=admission>

		<tr>
			<td>Default Tuition Fee</td><td><input type=text name=tuition></td>
		</tr>

		<tr>
			<td>Default Generator Fund</td><td><input type=text name=sports></td>
		</tr>

		<tr>
			<td>Default Building Fund</td><td><input type=text name=building></td>
		</tr>

		<tr>
			<td>Default Medical Fee</td><td><input type=text name=medical></td>
		</tr>

		<tr>
			<td>Default Recreation Fee</td><td><input type=text name=recreation></td>
		</tr>

		<tr>
			<td>Default Examination Fee</td><td><input type=text name=examination></td>
		</tr>

		<tr>
			<td>Default Bus charges</td><td><input type=text name=buscharge></td>
		</tr>

		<tr>
			<td>Active</td><td>
			
			<select name=active >
		<option value="Y">Yes ( Student Enrolled ) </option>
		<option value="N">No ( Student not Enrolled )</option>
		</select> 

			</td>
		</tr>

		<tr>
			<td></td><td><input type=submit name=submit value="Save and Create New"></td>
		</tr>
		</table>

		</form>
		<?php
		if(isset($_POST["submit"])){
			/*
			$_SESSION["email"] = 
			$_SESSION["password"] = */

			$name = $_POST["name"];
			$class = $_POST["class"];
			$regnum = $_POST["regnum"];
			$faimlynum = $_POST["faimlynum"];
			$admission = $_POST["admission"];
			$tuition = $_POST["tuition"];
			$sports = $_POST["sports"];
			$building = $_POST["building"];
			$medical = $_POST["medical"];
			$recreation = $_POST["recreation"];
			$examination = $_POST["examination"];
			$buscharge = $_POST["buscharge"];
			$active = $_POST["active"];

			$insert = mysqli_query($con, 
				"INSERT INTO
					iphs.students
					(
						name,
						class,
						regnum,
						faimlynum,
						admission,
						tuition,
						sports,
						building,
						medical,
						recreation,
						examination,
						buscharge,
						active
					)
					VALUES
					(
						'$name',
						'$class',
						'$regnum',
						'$faimlynum',
						'$admission',
						'$tuition',
						'$sports',
						'$building',
						'$medical',
						'$recreation',
						'$examination',
						'$buscharge',
						'$active'
					)
				"
			);
			if($insert){echo "Data Entered";}
			else{echo "Data not Entered<br>".mysqli_error();}
		}
		?>
	</div>
</body>
</html>