<?php
    include_once 'header.php';
?>
    <div class="wrapper">
        <h1>Update</h1>
        <?php
            
            
            if(isset($_SESSION["userperm"])){
                if($_SESSION["userperm"] === "admin") {
                    if ($_GET["type"] === "user") {
                        echo '<form class="rform" action="includes/update.inc.php" method="post">';
                        $id = $_GET["id"];
                        $perm = $_GET["perm"];
                        $name = $_GET["name"];
                        $usrname = $_GET["usrname"];
                        $email = $_GET["email"];
                        $phone = $_GET["phone"];
                        echo '<label>ID (unchangeable)</label><br>';
                        echo '<input required type="text" name="id" value="' . $id . '" readonly><br>';
                        echo '<label>User Permissions</label><br>';
                        echo '<input required type="text" name="perm" value="' . $perm . '"><br>';
                        echo '<label>Full Name</label><br>';
                        echo '<input required type="text" name="name" value="' . $name . '"><br>';
                        echo '<label>Username</label><br>';
                        echo '<input required type="text" name="usrname" value="' . $usrname . '"><br>';
                        echo '<label>Email</label><br>';
                        echo '<input required type="email" name="email" value="' . $email . '"><br>';
                        echo '<label>Phone</label><br>';
                        echo '<input required type="tel" name="phone" pattern="[0-9]{11}" value="' . $phone . '"><br>';
                        echo '<button type="submit" name="updates">UPDATE</button>';
                    }  else if ($_GET["type"] === "req") {
                        echo '<form class="rform" action="includes/updatereq.inc.php" method="post">';
                        $id = $_GET["id"];
                        $duration = $_GET["duration"];
                        $date = $_GET["date"];
                        $status = $_GET["status"];
                        echo '<label>ID (unchangeable)</label><br>';
                        echo '<input required type="text" name="id" value="' . $id . '" readonly><br>';
                        echo '<label>Date</label><br>';
                        echo '<input required type="text" name="date" value="' . $date . '"><br>';
                        echo '<label>Duration</label><br>';
                        echo '<input required type="text" name="duration" value="' . $duration . '"><br>';
                        echo '<label>Status</label><br>';
                        echo '<input required type="text" name="status" value="' . $status . '"><br>';
                        echo '<button type="submit" name="updatereq">UPDATE</button>';
                    }
            }   }
            ?>
            <button style="margin-top: 15px;" onclick="location.href = 'dashboard.php';">CANCEL</button>
        </form>
    </div>
<?php
    include_once 'footer.php';
?>