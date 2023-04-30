<?php
require_once 'dbh.inc.php';
if(isset($_POST["updates"])) {
    $name = $_POST["name"];
    $perm = $_POST["perm"];
    $usrname = $_POST["usrname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $id = $_POST["id"];
    
    $sql = "UPDATE users SET user_name = '$name', user_perm = '$perm', user_uname = '$usrname', user_email = '$email', user_phone = '$phone' WHERE user_id = $id;";
    mysqli_query($conn, $sql);

    header("location: ../dashboard.php?error=none");
    exit();
} else {
    header("location: ../dashboard.php?error=nosubmit");
    exit();
}