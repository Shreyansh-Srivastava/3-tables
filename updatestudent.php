<?php
# Include connection
require_once "./connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $editData = edit_data($connection, $id);
}

if (isset($_POST['up-stu']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    update_data($connection, $id);
}

function edit_data($connection, $id)
{
    $query = "SELECT * FROM student_info WHERE student_id= $id";
    $exec = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($exec);
    return $row;
}

function update_data($connection, $id)
{
    $id = $_GET["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mob_no = $_POST["mob_no"];
    $dept = $_POST["dept"];
    $year = $_POST["year"];
    $hostel_id = $_POST["hostel_id"];
    $room_id = $_POST["room_id"];

    $sql = "UPDATE student_info SET fname = '$fname', lname = '$lname', mob_no = '$mob_no', dept = '$dept', year = '$year', hostel_id = '$hostel_id', room_id = '$room_id' WHERE student_id = $id";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<script>" . "alert('New record updated successfully.');" . "</script>";
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
    <link rel="stylesheet" href="./style.css">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <title>PHP CRUD Operations</title>
</head>

<body>
    <div class="container">
        <div class="top_page">
            <h1 class="title">Update The Record</h1>
        </div>
        <div class="bottom_page">
            <form action="" id="RegForm" class="RegForm" method="post" novalidate>
                <p>First Name: <span class="required">* </span><br /><input type="text" size="65" name="fname" id="fname" value="<?php echo isset($editData) ? $editData['fname'] : '' ?>" /></p>
                <br />

                <p>Last Name: <span class="required">* </span><br /><input type="text" size="65" name="lname" id="lname" value="<?php echo isset($editData) ? $editData['lname'] : '' ?>" /></p>
                <br />

                <p>Mobile No: <span class="required">* </span><br /><input type="text" size="65" name="mob_no" id="mob_no" value="<?php echo isset($editData) ? $editData['mob_no'] : '' ?>" /></p>
                <br />

                <p>Department: <span class="required">* </span><br /><input type="text" size="65" name="dept" id="dept" value="<?php echo isset($editData) ? $editData['dept'] : '' ?>" /></p>
                <br />

                <p>Year: <span class="required">* </span><br /><input type="text" size="65" name="year" id="year" value="<?php echo isset($editData) ? $editData['year'] : '' ?>" /></p>
                <br />

                <p>Hostel id: <span class="required">* </span><br /><input type="text" size="65" name="hostel_id" id="hostel_id" value="<?php echo isset($editData) ? $editData['hostel_id'] : '' ?>" /></p>
                <br />

                <p>Room id: <span class="required">* </span><br /><input type="text" size="65" name="room_id" id="room_id" value="<?php echo isset($editData) ? $editData['room_id'] : '' ?>" /></p>

                <div class="buttons">
                    <input name="up-stu" id="up-stu" type="submit" value="Update" />
                </div>
                <br>
            </form>
        </div>
    </div>

</body>

</html>