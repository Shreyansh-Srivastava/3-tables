<?php
# Include connection
require_once "./connect.php";

if (isset($_POST['add-stu'])) {
    $student_id = $_POST["student_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mob_no = $_POST["mob_no"];
    $dept = $_POST["dept"];
    $year = $_POST["year"];
    $hostel_id = $_POST["hostel_id"];
    $room_id = $_POST["room_id"];
 
    $sql = "INSERT INTO student_info (student_id,fname, lname, mob_no, dept, year,hostel_id,room_id) VALUES ('$student_id','$fname', '$lname', '$mob_no', '$dept', '$year', '$hostel_id', '$room_id')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<script>" . "alert('New record created successfully.');" . "</script>";
        echo "<script>" . "window.location.href='./'" . "</script>";
    } else {
        echo "Error:" . $sql . "<br>" . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <title>Student table</title>
</head>

<body>
    <div class="container">
        <div class="top_page">
            <h1 class="title">Insert New Record</h1>
        </div>
        <div class="bottom_page">
            <form action="" id="RegForm" class="RegForm" method="post" novalidate>
                <p>Student id: <span class="required">* </span><br /><input type="text" size="65" name="student_id" id="student_id" /></p>
                <br />

                <p>First Name: <span class="required">* </span><br /><input type="text" size="65" name="fname" id="fname" /></p>
                <br />

                <p>Last Name: <span class="required">* </span><br /><input type="text" size="65" name="lname" id="lname" /></p>
                <br />

                <p>Mobile No: <span class="required">* </span><br /><input type="text" size="65" name="mob_no" id="mob_no" /></p>
                <br />

                <p>Department: <span class="required">* </span><br /><input type="text" size="65" name="dept" id="dept" /></p>
                <br />

                <p>Year: <span class="required">* </span><br /><input type="text" size="65" name="year" id="year" /></p>
                <br />

                <p>Hostel id: <span class="required">* </span><br /><input type="text" size="65" name="hostel_id" id="hostel_id" /></p>
                <br />

                <p>Room id: <span class="required">* </span><br /><input type="text" size="65" name="room_id" id="room_id" /></p>
                <br />

                <div class="buttons">
                    <input name="add-stu" id="add-stu" type="submit" value="Insert" />
                </div>
                <br>
            </form>
        </div>
    </div>
</body>

</html>