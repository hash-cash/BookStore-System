<?php
function getRequests(){
    require 'dbh.inc.php';

    if (isset($_GET["searchreq"])) {
        if ($_GET["searchreq"] === "") {
            goto b;
        } else {
            $search = $_GET["searchreq"];
            $sql = "SELECT requests.*, users.user_uname, users.user_email FROM users INNER JOIN requests ON requests.user_id=users.user_id WHERE requests.request_date LIKE '%$search%' OR requests.request_duration LIKE '%$search%' OR requests.request_status LIKE '%$search%' OR users.user_uname LIKE '%al$search%' OR users.user_email LIKE '%$search%' ORDER BY FIELD(request_status, 'Pending') DESC, request_date DESC ;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['request_date'] . '</td>';
                    echo '<td>' . $row['user_uname'] . '</td>';
                    echo '<td>' . $row['user_email'] . '</td>';
                    echo '<td>' . $row['request_duration'] . '</td>';
                    echo '<td>' . $row['request_status'] . '</td>';
                    if($_SESSION["userperm"] === "admin"){
                        echo '<td><a href="update.php?id=' . $row["request_id"] . '&duration=' . $row['request_duration'] . '&date=' . $row['request_date'] . '&status=' . $row['request_status'] . '&type=req">Edit</a><a href="delete.php?id=' . $row["request_id"] . '&duration=' . $row['request_duration'] . '&date=' . $row['request_date'] . '&status=' . $row['request_status'] . '&type=req">Delete</a></td>';
                    } else {
                        if($row['request_status'] === "Pending") {
                            $display = ' ';
                            $note = '';
                        } else {
                            $display = ' style="display: none;"';
                            $note = '<a class="responded">Responded</a>';
                        }
                        echo '<td><a' . $display . 'href="includes/process.inc.php?id=' . $row["request_id"] . '&type=acc">Accept</a><a' . $display . 'href="includes/process.inc.php?id=' . $row["request_id"] . '&type=rej">Reject</a>' . $note . '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>
                <td colspan="6"><h4>No records found.</h4></td>
                </tr>
                ';
            }
        }
    } else {
        b:
        $sql = "SELECT requests.*, users.user_uname, users.user_email FROM users INNER JOIN requests ON requests.user_id=users.user_id ORDER BY FIELD(request_status, 'Pending') DESC, request_date DESC ;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['request_date'] . '</td>';
                echo '<td>' . $row['user_uname'] . '</td>';
                echo '<td>' . $row['user_email'] . '</td>';
                echo '<td>' . $row['request_duration'] . '</td>';
                echo '<td>' . $row['request_status'] . '</td>';
                if($_SESSION["userperm"] === "admin"){
                    echo '<td><a href="update.php?id=' . $row["request_id"] . '&duration=' . $row['request_duration'] . '&date=' . $row['request_date'] . '&status=' . $row['request_status'] . '&type=req">Edit</a><a href="delete.php?id=' . $row["request_id"] . '&duration=' . $row['request_duration'] . '&date=' . $row['request_date'] . '&status=' . $row['request_status'] . '&type=req">Delete</a></td>';
                } else {
                    if($row['request_status'] === "Pending") {
                        $display = ' ';
                        $note = '';
                    } else {
                        $display = ' style="display: none;"';
                        $note = '<a class="responded">Responded</a>';
                    }
                    echo '<td><a' . $display . 'href="includes/process.inc.php?id=' . $row["request_id"] . '&type=acc">Accept</a><a' . $display . 'href="includes/process.inc.php?id=' . $row["request_id"] . '&type=rej">Reject</a>' . $note . '</td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr>
            <td colspan="6"><h4>No records found.</h4></td>
            </tr>
            ';
        }
    }
}

function getRequest($value){
    require 'dbh.inc.php';

    $sql = "SELECT * FROM requests WHERE user_id = $value ORDER BY request_date DESC;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['request_date'] . '</td>';
            echo '<td>' . $row['request_duration'] . '</td>';
            echo '<td>' . $row['request_status'] . '</td>';
            echo '</tr>';
        }
    }
}