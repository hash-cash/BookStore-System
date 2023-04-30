<?php
session_start();
include_once 'functions.inc.php';

if (isset($_POST["updatep"])) {
    $name = $_POST["name"];
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $id = $_SESSION["userid"];

    require_once 'dbh.inc.php';

    $userFound = userExists($conn, $id);

    if($userFound === false) {
        header("location: ../dashboard.php?view=profile&error=invalidlogin");
        exit();
    }
    
    $passHashed = $userFound["user_password"];
    $checkPass = password_verify($pass, $passHashed);

    if($checkPass === false) {
        header("location: ../dashboard.php?view=profile&error=wrongpass");
        exit();
    } else if ($checkPass === true) {
        $sql = "UPDATE users SET user_name = '$name', user_uname = '$uname', user_email = '$email', user_phone = '$phone' WHERE user_id = $id;";
        mysqli_query($conn, $sql);

        $newcreds = userExists($conn, $id);

        $_SESSION["userid"] = $newcreds["user_id"];
        $_SESSION["userperm"] = $newcreds["user_perm"];
        $_SESSION["username"] = $newcreds["user_uname"];
        $_SESSION["usrname"] = $newcreds["user_name"];
        $_SESSION["useremail"] = $newcreds["user_email"];
        $_SESSION["userphone"] = $newcreds["user_phone"];
        header("location: ../dashboard.php?view=profile&error=none");
        exit();
    }

}