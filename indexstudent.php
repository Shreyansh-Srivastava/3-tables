<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System</title>
    <link rel="stylesheet" href="./style.css">

</head>
<body>
    <h1>Hostel Management System</h1>
    <?php
        require_once "./connect.php";
    ?>
    
    <div class="insert1">
        <a href="./createstudent.php">Add Student
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Student id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Mobile No</th>
                <th>Year</th>
                <th>Room id</th>
                <th>Hostel id</th>
            </tr>
        </thead>

        <tbody>
            <?php
            require_once "./connect.php";

            $sql = "SELECT * FROM student_info";

            if ($result = mysqli_query($connection, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $count = 1;
                    foreach ($rows as $row) { ?>
                        <tr>
                            <td><?= $row["student_id"]; ?></td>
                            <td><?= $row["fname"]; ?></td>
                            <td><?= $row["lname"]; ?></td>
                            <td><?= $row["mob_no"]; ?></td>  
                            <td><?= $row["dept"]; ?></td>
                            <td><?= $row["year"]; ?></td>
                            <td><?= $row["hostel_id"]; ?></td>
                            <td><?= $row["room_id"]; ?></td>  
                            <td>
                                <a id="update" name="update" href="./updatestudent.php?id=<?= $row["student_id"]; ?>" class="btn btn-success btn-sm">Edit
                                </a>&nbsp;
                            </td>
                            <td>
                                <a id="delete" name="delete" value="Delete" href="./deletestudent.php?id=<?= $row["student_id"]; ?>" class="btn btn-danger btn-sm">Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    # Free result set
                    mysqli_free_result($result);
                } else { ?>
                    <tr>
                        <td class="text-center text-danger fw-bold" colspan="10">** No records were found **</td>
                    </tr>
            <?php
                }
            }
            # Close connection
            mysqli_close($connection);
            ?>
        </tbody>
    </table>


    </div>

    <script>
        const delBtnEl = document.querySelectorAll(".btn-danger");
        delBtnEl.forEach(function(delBtn) {
            delBtn.addEventListener("click", function(e) {
                const message = confirm("Are you sure you want to delete this record?");
                if (message == false) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>