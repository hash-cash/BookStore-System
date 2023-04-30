<?php

if (isset($_POST["loggedin"])) {
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    loginUser($conn, $uname, $pass);
}