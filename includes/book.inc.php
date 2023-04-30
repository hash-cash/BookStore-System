<?php
session_start();

if (isset($_POST["book"])) {
    $duration = $_POST["duration"];
    $date = $_POST["date"];
    $duration = $_POST["duration"];
    $uid = $_SESSION["userid"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(bookingExists($conn, $_SESSION["userid"]) !== false) {
        header("location: ../dashboard.php?error=reqalready");
        exit();
    }

    book($conn, $uid, $date, $duration);

} else {
    header("location: ../dashboard.php");
}