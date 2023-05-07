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
    $query = "SELECT * FROM hostel_info WHERE hostel_id= $id";
    $exec = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($exec);
    return $row;
}

function update_data($connection, $id)
{
    $id = $_GET["id"];
    $hostel_name = $_POST["hostel_name"];
    $no_of_rooms = $_POST["no_of_rooms"];
    $no_of_students = $_POST["no_of_students"];
    $gender = $_POST["gender"];

    $sql = "UPDATE hostel_info SET hostel_name = '$hostel_name', no_of_rooms = '$no_of_rooms', no_of_students = '$no_of_students', gender = '$gender' WHERE hostel_id = $id";

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

                <p>Hostel Name: <span class="required">* </span><br /><input type="text" size="65" name="hostel_name" id="hostel_name" value="<?php echo isset($editData) ? $editData['hostel_name'] : '' ?>"/></p>
                <br />

                <p>No of Rooms: <span class="required">* </span><br /><input type="text" size="65" name="no_of_rooms" id="no_of_rooms" value="<?php echo isset($editData) ? $editData['no_of_rooms'] : '' ?>"/></p>
                <br />

                <p>No of students: <span class="required">* </span><br /><input type="text" size="65" name="no_of_students" id="no_of_students" value="<?php echo isset($editData) ? $editData['no_of_students'] : '' ?>"/></p>
                <br />

                <p>Gender: <span class="required">* </span><br /><input type="text" size="65" name="gender" id="gender" value="<?php echo isset($editData) ? $editData['gender'] : '' ?>"/></p>
                <br />  

                <div class="buttons">
                    <input name="up-stu" id="up-stu" type="submit" value="Update" />
                </div>
                <br>
            </form>
        </div>
    </div>

</body>

</html>