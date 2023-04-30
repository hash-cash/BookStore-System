<?php
function unameExists($conn, $info) {
    $sql = "SELECT * FROM users WHERE user_uname = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $info);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emailExists($conn, $info) {
    $sql = "SELECT * FROM users WHERE user_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $info);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginExists($conn, $info, $info2) {
    $sql = "SELECT * FROM users WHERE user_uname = ? OR user_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $info, $info2);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function userExists($conn, $info) {
    $sql = "SELECT * FROM users WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $info);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $uname, $phone, $pass) {
    $sql = "INSERT INTO users (user_name, user_email, user_uname, user_phone, user_password) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $uname, $phone, $hashedPass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=registered");
    exit();
}

function book($conn, $uid, $date, $duration) {
    $sql = "INSERT INTO requests (user_id, request_date, request_duration) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iss", $uid, $date, $duration);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../dashboard.php?error=none");
    exit();
}

function bookingExists($conn, $info) {
    $sql = "SELECT * FROM requests WHERE user_id = ? AND request_status='Pending';";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $info);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginUser($conn, $uname, $pass) {
    $userexists = loginExists($conn, $uname, $uname);

    if($userexists === false) {
        header("location: ../index.php?error=invalidlogin");
        exit();
    }

    $passHashed = $userexists["user_password"];
    $checkPass = password_verify($pass, $passHashed);

    if($checkPass === false) {
        header("location: ../index.php?error=wrongpass");
        exit();
    } else if ($checkPass === true) {
        session_start();
        $_SESSION["userid"] = $userexists["user_id"];
        $_SESSION["userperm"] = $userexists["user_perm"];
        $_SESSION["username"] = $userexists["user_uname"];
        $_SESSION["usrname"] = $userexists["user_name"];
        $_SESSION["useremail"] = $userexists["user_email"];
        $_SESSION["userphone"] = $userexists["user_phone"];
        $name = $_SESSION["usrname"];
        setcookie("knownuser", $name, time() + (86400 * 30), "/");
        header("location: ../index.php?error=welcome");
        exit();
    }
}