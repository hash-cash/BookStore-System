<?php
    include_once 'header.php';

    if(!isset($_SESSION["userid"])){
        if(isset($_COOKIE["knownuser"])) {
            header('Location: known.php');
        }
    }
?>
    <div id="indexwrapper" class="wrapper">
        <div class="split">
            <div class="slideshow">
                <div class="prevbutton" onclick="plusIndex(-1)"></div>
                <div class="imageHolder"><div class="image"></div></div>
                <div class="nextbutton" onclick="plusIndex(1)"></div>
            </div>
            <div class="rightside">
                <?php
                if(isset($_SESSION["userid"])){
                    if($_SESSION["userperm"] === "user"){
                        echo '<h1>Hey ' . $_SESSION["usrname"] . ', want to book now?</h1>';
                        echo '<a href="dashboard.php">Book Now!</a>';
                    } else if($_SESSION["userperm"] === "manager" || $_SESSION["userperm"] === "admin"){
                        echo '<h1>Welcome back, ' . $_SESSION["usrname"] . '!</h1>';
                        echo '<a href="dashboard.php">Head To Dashboard!</a>';
                    }
                } else {
                    echo '<h1>Want to book with us?</h1>
                    <a href="register.php">Book Now!</a>';
                }
                ?>
            </div>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>