<?php
// Start the session
session_start();
?>

<html>
<head>
<?php require "header.php"; ?>
</head>
<body>
    <div class='text-white bg-primary'>
        <?php
        $students = mysqli_num_rows(mysqli_query($con,"SELECT * FROM students"));
        $families = mysqli_num_rows(mysqli_query($con,"SELECT * FROM faimly"));
        $payments = mysqli_fetch_array(mysqli_query($con,"SELECT sum(amount) as amount FROM payments"));
        ?>
    </div>
    <div class=wraper>
        <h2>Welcome to The Fee System</h2>
        <h3>Student</h3>
        <ul>
        <li><a href="newstd.php">Add New Student (<?php echo $students; ?>)</a></li>
        <li><a href="newfaimly.php">Add New Family (<?php echo $families; ?>)</a></li>
        <li><a href="viewstd.php">View/Edit Student</a></li>
        <li><a href="bulkupdatestd.php">Update Bulk Students</a></li>
        </ul>
        
        <h3>Employees</h3>
        <ul>
        <li><a href="add_employee.php">Add New Employee</a></li>
        <li><a href="view_all_employees.php">All Employees</a></li>
        <li><a href="#">Edit Employee</a></li>
        </ul>

        <h3>Slips</h3>
        <ul>
        <li><a href="createslips.php">Create Slips</a></li>
        <li><a href="printslips.php">View/Print Slips</a></li>
        </ul>

        <h3>Attendance</h3>
        <ul>
        <li><a href="attendance.php">Attendance</a></li>
        </ul>

        <h3>Payment</h3>
        <ul>
        <li><a href="payment.php">Receive Payment(<?php echo "Rs.".$payments['amount'];?>)</a></li>
        <li><a href="viewpaymentbyfn.php">View Payment by Family Number</a></li>
        </ul>
    </div>
</body>
</html>