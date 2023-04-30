<?php
require_once 'dbh.inc.php';
if(isset($_POST["updatereq"])) {
    $date = $_POST["date"];
    $duration = $_POST["duration"];
    $status = $_POST["status"];
    $id = $_POST["id"];
    
    $sql = "UPDATE requests SET request_date = '$date', request_duration = '$duration', request_status = '$status' WHERE request_id = $id;";
    mysqli_query($conn, $sql);

    header("location: ../dashboard.php?error=none");
    exit();
} else {
    header("location: ../dashboard.php?error=nosubmit");
    exit();
}