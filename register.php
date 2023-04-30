<?php
    include_once 'header.php';
?>
    <div class="wrapper">
        <h1>Register</h1>
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
            <form id="register" action="includes/register.inc.php" method="post">
                <label>Full Name</label><br>
                <input required type="text" name="name" placeholder="John Smith"><br>
                <label>Email</label><br>
                <input required type="email" name="email" placeholder="john@email.com"><br>
                <label>Username</label><br>
                <input required type="text" name="uname" placeholder="JohnSm7"><br>
                <label>Phone Number</label><br>
                <input required type="tel" name="phone" pattern="[0-9]{11}" placeholder="011 123456789"><br>
                <Label>Password</Label><br>
                <input required id="pass" type="password" name="pass" placeholder="MyPassword123!" onkeyup="checkPass()"><br>
                <Label>Confirm Password</Label><label class="passerror hide">Passwords do not match!</label><br>
                <input required id="pass2" type="password" name="pass2" placeholder="Repeat Password" onkeyup="checkPass()"><br>
                <button id="registerb" name="registered" type="submit" class="disabled">Register</button>
            </form>
            <div class="blogin">
                <p>Already have an account? <a onclick="toggleLogin()">Login</a></p>
            </div>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>