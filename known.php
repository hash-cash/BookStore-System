<?php
    include_once 'header.php';
    if(isset($_GET["notyou"])){
        setcookie("knownuser", "", time() - 1);
        header('Location: index.php');
    }
?>
    <div class="wrapper">
        <h1>Welcome Back!</h1>
        <div class="rform">
            <?php
                if(isset($_GET["error"])) {
                    if ($_GET["error"] == "usernametaken") {
                        echo '<p class="error">Username is already registered! Please login instead.</p>';
                    } else if ($_GET["error"] == "emailtaken") {
                        echo '<p class="error">Email is already registered! Please login instead.</p>';
                    }
                }
            ?>
            <form id="register" action="includes/login.inc.php" method="post">
                <div class="known">
                    <?php
                    echo '<label style>Glad to have you back, ' . $_COOKIE["knownuser"] . '! </label>'
                    ?>
                    <a onclick="location.href = '?notyou=true';">Not you?</a><br>
                    <br>
                </div>
                <button id="registerb" name="loggedin" type="button" onmouseup="toggleLogin()">Login</button>
            </form>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>