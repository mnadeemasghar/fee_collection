<?php
// Start the session
session_start();
?>

<html>
<head>
<?php require "header.php"; ?>
</head>
<body>
<div id="data" class="wraper">
    <a href=index.php>Home</a> - Attendance
    <h2>Attendance</h2>
    <Label>ID:</Label>
    <input id="regno" type="text" name="regno" placeholder="registeration number" autocomplete="off" autofocus required>
    <input type="button" name="attend" value="Present" onclick="get_request_url()">
    <div id="attendance_card"
        style="
        margin: 50px;
        border: indianred;
        box-shadow: inherit;
        display:none;
        padding: 10px;"
    >
        <h1 id="name"></h1>
        <p id="user_type"></p>
        <h3 id="time"></h3>
        <p id="message"></p>
    </div>
</div>    

<script>
    // Get the input field
    var input = document.getElementById("regno");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
        // Cancel the default action, if needed
        event.preventDefault();
        get_request_url();
    }
    });

    function get_request_url(){
        const regno = document.getElementById('regno').value;
        const url = 'mark_attendance.php?regno='+regno;

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", url, true);
        xhttp.send();
        document.getElementById('regno').value = "";
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(xhttp.responseText);
                // console.log(response);
                if(response.status == "error"){
                    document.getElementById("message").innerHTML = response.message;
                    document.getElementById("attendance_card").style.display = "block";
                    document.getElementById("name").innerHTML = "";
                    document.getElementById("time").innerHTML = "";
                }
                else if (response.status == "success"){
                    document.getElementById("attendance_card").style.display = "block";
                    document.getElementById("message").innerHTML = response.message;
                    document.getElementById("name").innerHTML = response.student.name;
                    document.getElementById("time").innerHTML = response.attendances.date;
                }
            }
        };
    }
</script>
</body>
</html>