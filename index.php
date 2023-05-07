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
    <div class="insert">
        <a href="./createhostel.php">Add Hostel
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Hostel id</th>
                <th>Hostel Name</th>
                <th>No of rooms</th>
                <th>Boys/Girls</th>
                <th>No of students</th>
            </tr>
        </thead>

        <tbody>
            <?php
            require_once "./connect.php";

            $sql = "SELECT * FROM hostel_info";

            if ($result = mysqli_query($connection, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $count = 1;
                    foreach ($rows as $row) { ?>
                        <tr>
                            <td><?= $row["hostel_id"]; ?></td>
                            <td><?= $row["hostel_name"]; ?></td>
                            <td><?= $row["no_of_rooms"]; ?></td>
                            <td><?= $row["no_of_students"]; ?></td>
                            <td><?= $row["gender"]; ?></td>
                            <td>
                                <a id="update" name="update" href="./updatehostel.php?id=<?= $row["hostel_id"]; ?>" class="btn btn-success btn-sm">Edit
                                </a>&nbsp;
                            </td>
                            <td>
                                <a id="delete" name="delete" value="Delete" href="./deletehostel.php?id=<?= $row["hostel_id"]; ?>" class="btn btn-danger btn-sm">Delete
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


    <div class="room">
        <a href="./indexroom.php">Go to rooms table</a>
    </div>

    <div class="student">
        <a href="./indexstudent.php">Go to student table</a>
    </div>

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