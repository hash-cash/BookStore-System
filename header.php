<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>College Accommodation Management System</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        if(isset($_GET["error"])) {
            if ($_GET["error"] == "invalidlogin") {
                echo '<p class="error center">Account not found! Please try again.</p>';
            } else if ($_GET["error"] == "wrongpass") {
                echo '<p class="error center">Incorrect password! Please try again.</p>';
            } else if ($_GET["error"] == "registered") {
                echo '<p class="successful center">Successfully Registered! Please login.</p>';
            } else if ($_GET["error"] == "welcome") {
                echo '<p class="successful center">Successfully logged in, Welcome ' . $_SESSION["username"] . '!</p>';
            } else if ($_GET["error"] == "none") {
                echo '<p class="successful center">Done!</p>';
            } else if ($_GET["error"] == "reqalready") {
                echo '<p class="error center">You already have a pending request!</p>';
            }
        }
    ?>
    <header class="header">
        <img src="images/logo.png">
        <h3 style="margin-top: 30px; margin-right: 200px; color: #024686">College Accommodation Management System</h3>
        <div class="menu">
            <div id="home" class="currentDiv"><a id="homeA" href="index.php" class="current">HOME</a></div>
            <?php
                if(isset($_SESSION["userid"])) {
                    echo '<div id="dashboard"><a id="dashboardA" href="dashboard.php">DASHBOARD</a></div>';
                } else {
                    echo '<div id="loginButton" onclick="toggleLogin()"><a id="loginButtonA" href="#">LOGIN</a></div>';
                }
            ?>
            <div id="random" class="hidden"><a id="randomA" href="#"></a></div>
            <div id="login" class="hidden">
                <form action="includes/login.inc.php" method="post">
                    <center><h1 style="margin-top: 35px; font-size: 2em;">Login</h1></center>
                    <input required type="text" name="uname" placeholder="Username/Email">
                    <input required type="password" name="pass" placeholder="Password">
                    <button type="submit" name="loggedin" value="LOGIN">LOGIN</button>
                </form>
                <label>Need an account? <a href="register.php" style="font-size: 1em;">Register</a></label><br><br>
            </div>
        </div>
    </header>