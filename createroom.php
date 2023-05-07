<?php
# Include connection
require_once "./connect.php";

if (isset($_POST['add-room'])) {
    $room_id = $_POST["room_id"];
    $hostel_id = $_POST["hostel_id"];
    $room_no = $_POST["room_no"];
    $allocated = $_POST["allocated"];
 
    $sql = "INSERT INTO room_info (room_id,hostel_id,room_no,allocated) VALUES ('$room_id','$hostel_id','$room_no','$allocated')";
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
                <p>Room id: <span class="required">* </span><br /><input type="text" size="65" name="room_id" id="room_id" /></p>
                <br />

                <p>Hostel id: <span class="required">* </span><br /><input type="text" size="65" name="hostel_id" id="hostel_id" /></p>
                <br />

                <p>Room No: <span class="required">* </span><br /><input type="text" size="65" name="room_no" id="room_no" /></p>
                <br />

                <p>Allocated: <span class="required">* </span><br /><input type="text" size="65" name="allocated" id="allocated" /></p>
                <br />

                <div class="buttons">
                    <input name="add-room" id="add-room" type="submit" value="Insert" />
                </div>
                <br>
            </form>
        </div>
    </div>
</body>

</html>