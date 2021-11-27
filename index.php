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
        <?php
        require "nav_bar.php";
        require_once "home.php";
        ?>
    </div>
</body>
</html>