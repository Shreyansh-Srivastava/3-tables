<?php
  require_once "./connect.php";
    $id = $_GET["id"];

    $sql = "DELETE FROM room_info WHERE room_id = $id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<script>" . "alert('Record has been deleted successfully.');" . "</script>";
        echo "<script>" . "window.location.href='./'" . "</script>";
        exit;
    } else {
        echo "Oops ! Something went wrong. Please try again later.";
    }
