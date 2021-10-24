<?Php
if(isset($_REQUEST['regno'])){
    require "connection.php";

    $id = $_REQUEST['regno'];
    $student = mysqli_query($con,"SELECT * FROM students WHERE id = $id");
    $student = mysqli_fetch_array($student);
    if(empty($student)){
        $result = [
            "message" => "Record not Found",
            "status" => "error"
        ];
    }
    else{
        $registration_id = $student['id'];
        
        $attendances = mysqli_query($con,"SELECT * FROM attendances WHERE registration_id = $registration_id AND year(date) = year(now()) AND month(date) = month(now()) AND day(date) = day(now())");
        $attendances = mysqli_fetch_array($attendances);
    
        if(!empty($attendances)){
            $result = [
                "message" => "Doubplicate Attandance",
                "status" => "success",
                "attendances" => $attendances,
                "student" => $student
            ];
        }
        else{
            $insert = mysqli_query($con,"INSERT INTO attendances (registration_id, user_type)VALUES ('$registration_id', 'student')");
            $last_id = $con->insert_id;

            $attendances = mysqli_query($con,"SELECT * FROM attendances WHERE id = $last_id");
            $attendances = mysqli_fetch_array($attendances);

            if($insert){
                $result = [
                    "message" => "Attandance Marked",
                    "status" => "success",
                    "attendances" => $attendances,
                    "student" => $student
                ];
            }
            else{
                $result = "Something wrong ";
            }
        }
    }
}
print json_encode($result);
?>