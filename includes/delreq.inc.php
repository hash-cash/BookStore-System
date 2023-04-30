<?php
require_once 'dbh.inc.php';
if(isset($_POST["deletes"])) {
    $id = $_POST["id"];
    
    $sql = "DELETE FROM requests WHERE request_id = $id;";
    mysqli_query($conn, $sql);

    header("location: ../dashboard.php?error=none");
    exit();
} else {
    header("location: ../dashboard.php?error=nosubmit");
    exit();
}