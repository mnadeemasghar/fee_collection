<?php
// Start the session
session_start();
//require_once "./class/Connect.php";
?>

<html>
  <head>
  <?php require "header.php"; ?>
  </head>
<body>
  <div class=wraper>
  <?php require "nav_bar.php"; ?>

  <a href=index.php>Home</a> - View Student Data

  <h2>View Student Data</h2>

  <?php

    if(isset($_POST["submit"])){
    require "./class/Student.php";
    $id = $_POST["id"];
    $student_data = new Student;
    $name = $student_data->getbyid($id)['name'];
    $class = $student_data->getbyid($id)['class'];
    $regnum = $student_data->getbyid($id)['regnum'];
    $faimlynum = $student_data->getbyid($id)['faimlynum'];
    $admission = $student_data->getbyid($id)['admission'];
    $tuition = $student_data->getbyid($id)['tuition'];
    $sports = $student_data->getbyid($id)['sports'];
    $building = $student_data->getbyid($id)['building'];
    $medical = $student_data->getbyid($id)['medical'];
    $recreation = $student_data->getbyid($id)['recreation'];
    $examination = $student_data->getbyid($id)['examination'];
    $buscharge = $student_data->getbyid($id)['buscharge'];
    $active = $student_data->getbyid($id)['active'];

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

    }
    //}

    else{


      echo "<table>
              <th>Reg. Num</th>
              <th>Name</th>
              <th>Class</th>
              <th>Family No</th>
              <th>Admission</th>
              <th>Tuition</th>
              <th>Generator</th>
              <th>Building</th>
              <th>Medical</th>
              <th>Recreation</th>
              <th>Examination</th>
              <th>Buscharge</th>
              <th>Active</th>
              <th>Edit</th>";

            $stddata = mysqli_query($con, "SELECT * FROM students");
            while($row = mysqli_fetch_array($stddata)){
        
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
                echo "<form action='viewstd.php' method='post' >";
                echo "<input type=hidden name=id value=".$row["id"].">";
                echo "<input type=submit name=submit value=Edit>";
                echo " </form>";
                echo "</td>";

              echo "</tr>";
            }
      echo "</table>";
    }
  ?>
  </div>
</body>
</html>