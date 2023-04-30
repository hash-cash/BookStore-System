<?php
require_once 'dbh.inc.php';
if(isset($_GET["type"])) {
    if($_GET["type"] === "acc") {
        $status = 'Accepted';
    } else if ($_GET["type"] === "rej"){
        $status = 'Rejected';
    }
    $id = $_GET["id"];

    $sql = "UPDATE requests SET request_status='$status' WHERE request_id=$id;";
    mysqli_query($conn, $sql);
    
    header("location: ../dashboard.php?error=none");
    exit();
}