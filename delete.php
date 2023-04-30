<?php
    include_once 'header.php';
?>
    <div id="Delete" class="wrapper">
        <h1>Delete</h1>
            <?php
            if(isset($_SESSION["userperm"])){
                if($_SESSION["userperm"] === "admin" OR $_SESSION["userperm"] === "manager") {
                    if ($_GET["type"] === "user") {
                        echo '<form class="delete" action="includes/deluser.inc.php" method="post">';
                        $id = $_GET["id"];
                        $perm = $_GET["perm"];
                        $name = $_GET["name"];
                        $usrname = $_GET["usrname"];
                        $email = $_GET["email"];
                        $phone = $_GET["phone"];
                        echo '<label>ID (unchangeable)</label><br>';
                        echo '<input required type="text" name="id" value="' . $id . '" readonly><br>';
                        echo '<label>User Permissions</label><br>';
                        echo '<input required type="text" name="perm" value="' . $perm . '" disabled><br>';
                        echo '<label>Full Name</label><br>';
                        echo '<input required type="text" name="name" value="' . $name . '" disabled><br>';
                        echo '<label>Username</label><br>';
                        echo '<input required type="text" name="usrname" value="' . $usrname . '" disabled><br>';
                        echo '<label>Email</label><br>';
                        echo '<input required type="email" name="email" value="' . $email . '" disabled><br>';
                        echo '<label>Phone</label><br>';
                        echo '<input required type="tel" name="phone" pattern="[0-9]{11}" value="' . $phone . '" disabled><br>';
                        echo '<h3>Are you sure u want to delete the user:</h2><br>';
                        echo '<h2>' . $perm . ', ' . $usrname . ', ' . $email . ', ' . $name . '?</h2><br>';
                    } else if ($_GET["type"] === "req") {
                        echo '<form class="delete" action="includes/delreq.inc.php" method="post">';
                        $id = $_GET["id"];
                        $date = $_GET["date"];
                        $duration = $_GET["duration"];
                        $status = $_GET["status"];
                        echo '<label>ID (unchangeable)</label><br>';
                        echo '<input required type="text" name="id" value="' . $id . '" readonly><br>';
                        echo '<label>User Permissions</label><br>';
                        echo '<input required type="text" name="date" value="' . $date . '" disabled><br>';
                        echo '<label>Full Name</label><br>';
                        echo '<input required type="text" name="duration" value="' . $duration . '" disabled><br>';
                        echo '<label>Username</label><br>';
                        echo '<input required type="text" name="status" value="' . $status . '" disabled><br>';
                        echo '<label>Email</label><br>';
                        echo '<input required type="email" name="email" value="" disabled><br>';
                        echo '<label>Phone</label><br>';
                        echo '<input required type="tel" name="phone" pattern="[0-9]{11}" value="" disabled><br>';
                        echo '<h3>Are you sure u want to delete the request:</h2><br>';
                        echo '<h2>' . $date . ', ' . $duration . ', ' . $status . '?</h2><br>';
                    }
                }
            }
            ?>
            <button type="submit" name="deletes">DELETE</button>
            <button style="margin-top: 15px;" onclick="location.href = 'dashboard.php';">CANCEL</button>
        </form>
    </div>
<?php
    include_once 'footer.php';
?>