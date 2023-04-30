<?php

if (isset($_POST["registered"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $uname = $_POST["uname"];
    $phone = $_POST["phone"];
    $pass = $_POST["pass"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emailExists($conn, $email) !== false) {
        header("location: ../register.php?error=emailtaken");
        exit();
    } else if(unameExists($conn, $uname) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $uname, $phone, $pass);

} else {
    header("location: ../register.php");
}