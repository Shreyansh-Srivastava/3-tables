<?php
# Include connection
require_once "./connect.php";

if (isset($_POST['add-hos'])) {
    $hostel_id = $_POST["hostel_id"];
    $hostel_name = $_POST["hostel_name"];
    $no_of_rooms = $_POST["no_of_rooms"];
    $no_of_students = $_POST["no_of_students"];
    $gender = $_POST["gender"];
 
    $sql = "INSERT INTO hostel_info (hostel_id,hostel_name, no_of_rooms, no_of_students, gender) VALUES ('$hostel_id','$hostel_name', '$no_of_rooms', '$no_of_students', '$gender')";
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
                <p>Hostel id: <span class="required">* </span><br /><input type="text" size="65" name="hostel_id" id="hostel_id" /></p>
                <br />

                <p>Hostel Name: <span class="required">* </span><br /><input type="text" size="65" name="hostel_name" id="hostel_name" /></p>
                <br />

                <p>No of Rooms: <span class="required">* </span><br /><input type="text" size="65" name="no_of_rooms" id="no_of_rooms" /></p>
                <br />

                <p>No of students: <span class="required">* </span><br /><input type="text" size="65" name="no_of_students" id="no_of_students" /></p>
                <br />

                <p>Gender: <span class="required">* </span><br /><input type="text" size="65" name="gender" id="gender" /></p>
                <br />                

                <div class="buttons">
                    <input name="add-hos" id="add-hos" type="submit" value="Insert" />
                </div>
                <br>
            </form>
        </div>
    </div>
</body>

</html>