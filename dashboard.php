<?php
    include_once 'header.php';
?>
    <div class="wrapper">
        <h1>Dashboard</h1>
        <div class="main">
            <div class="left">
            <div class="lmenu">
                <ul>
                    <?php
                        if(isset($_SESSION["userperm"])){
                            if($_SESSION["userperm"] === "user") {
                                echo '<li class="mone" id="mbooking" onclick="toggleMenu(this.innerText)">Booking</li>';
                                echo '<li id="mmyrequests" onclick="toggleMenu(this.innerText)">My Requests</li>';
                            } else if($_SESSION["userperm"] === "manager") {
                                echo '<li class="mone" id="mrequests" onclick="toggleMenu(this.innerText)">Accomodation Requests</li>';
                            } else if($_SESSION["userperm"] === "admin") {
                                echo '<li class="mone" id="musers" onclick="toggleMenu(this.innerText)">Users</li>';
                                echo '<li id="mrequests" onclick="toggleMenu(this.innerText)">Accomodation Requests</li>';
                                echo '<li id="mmanagers" onclick="toggleMenu(this.innerText)">Accomodation Managers</li>';
                                echo '<li mid="4" id="madmins" onclick="toggleMenu(this.innerText)">Admins</li>';
                            }
                        }
                    ?>
                    <li id="mprofile" onclick="toggleMenu(this.innerText)">My Profile</li>
                    <li onclick="location.href='includes/logout.inc.php';">Logout</li>
                </ul>
            </div>
            </div>
            <div class="right">
                <div class="options">
                <?php 
                if(isset($_SESSION["userperm"])){
                    if($_SESSION["userperm"] === "manager") {
                        if(isset($_GET["view"])){
                            if($_GET["view"] === "requests"){
                                include_once 'requests.php';
                            } else if($_GET["view"] === "profile"){
                                include_once 'profile.php';
                            }
                        } else {
                            include_once 'requests.php';
                        }
                    } else if($_SESSION["userperm"] === "admin") {
                        if(isset($_GET["view"])){
                            if($_GET["view"] === "users"){
                                include_once 'users.php';
                            } else if($_GET["view"] === "requests"){
                                include_once 'requests.php';
                            } else if($_GET["view"] === "managers"){
                                include_once 'managers.php';
                            } else if($_GET["view"] === "admins"){
                                include_once 'admins.php';
                            } else if($_GET["view"] === "profile"){
                                include_once 'profile.php';
                            }
                        } else {
                            include_once 'users.php';
                        }
                    } else if($_SESSION["userperm"] === "user") {
                        if(isset($_GET["view"])){
                            if($_GET["view"] === "booking"){
                                include_once 'booking.php';
                            } else if($_GET["view"] === "myrequests"){
                                include_once 'myrequests.php';
                            } else if($_GET["view"] === "profile"){
                                include_once 'profile.php';
                            }
                        }
                        else {
                            include_once 'booking.php';
                        }
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>