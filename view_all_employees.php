<!DOCTYPE html>
<html lang="en">
<head>
<?php require "header.php"; ?>
</head>
<body>
    <div class=wraper>
    <?php require "nav_bar.php"; ?>

        <a href=index.php>Home</a> - View All Employees
        <h2>View All Employees</h2>

        <table class="table table-bordered">
            <thead>
                <th>Sr.</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Salary</th>
            </thead>
            <tbody>
                <?php
                $employees = mysqli_query($con,"SELECT * FROM employees");

                while($row = mysqli_fetch_array($employees)){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['designation']."</td>";
                    echo "<td>".$row['salary']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>