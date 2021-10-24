<!DOCTYPE html>
<html lang="en">
<head>
<?php require "header.php"; ?>
</head>
<body>
    <div class=wraper>
        <a href=index.php>Home</a> - Add Employee
        <h2>Add New Employee</h2>

        <form method="POST">
            <label>Name</label>
            <input class="form-control" type="text" name="name" placeholder="Enter name here" required>
            <label>Designation</label>
            <input class="form-control" type="text" name="designation" placeholder="Employee's designation" required>
            <label>Salary</label>
            <input class="form-control" type="number" name="salary" required>

            <input class="btn btn-success" type="submit" name="submit" value="Add">
        </form>

        <?php
        if(isset($_REQUEST['name']) && isset($_REQUEST['designation']) && isset($_REQUEST['salary'])){
            $name = $_REQUEST['name'];
            $designation = $_REQUEST['designation'];
            $salary = $_REQUEST['salary'];

            $insert = mysqli_query($con,"INSERT INTO employees (`name`, `designation`, `salary`)VALUES ('$name', '$designation', $salary)");
            if($insert){
                echo "Record Added";
            }
            else{
                echo "Record not Added";
            }
        }
        ?>
    </div>
</body>
</html>