<?php
function getUsers($value){
    require 'dbh.inc.php';

    if (isset($_GET["search"])) {
        if ($_GET["search"] === "") {
                goto a;
        }
        else {
            $search = $_GET["search"];
            $sql = "SELECT * FROM users WHERE user_perm = '$value' AND (user_uname LIKE '%$search%' OR user_name LIKE '%$search%' OR user_email LIKE '%$search%' OR user_phone LIKE '%$search%') ORDER BY user_name ASC;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['user_name'] . '</td>';
                    echo '<td>' . $row['user_uname'] . '</td>';
                    echo '<td>' . $row['user_email'] . '</td>';
                    echo '<td>' . $row['user_phone'] . '</td>';
                    echo '<td><a href="update.php?id=' . $row["user_id"] . '&perm=' . $row["user_perm"] . '&name=' . $row['user_name'] . '&usrname=' . $row['user_uname'] . '&email=' . $row['user_email'] . '&phone=' . $row['user_phone'] . '&type=user">Edit</a><a href="delete.php?id=' . $row["user_id"] . '&perm=' . $row["user_perm"] . '&name=' . $row['user_name'] . '&usrname=' . $row['user_uname'] . '&email=' . $row['user_email'] . '&phone=' . $row['user_phone'] . '&type=user">Delete</a></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>
                <td colspan="5"><h4>No records found.</h4></td>
                </tr>
                ';
            }
        }
    }
    else {
        a:
        $sql = "SELECT * FROM users WHERE user_perm = '$value' ORDER BY user_name ASC;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['user_name'] . '</td>';
                echo '<td>' . $row['user_uname'] . '</td>';
                echo '<td>' . $row['user_email'] . '</td>';
                echo '<td>' . $row['user_phone'] . '</td>';
                echo '<td><a href="update.php?id=' . $row["user_id"] . '&perm=' . $row["user_perm"] . '&name=' . $row['user_name'] . '&usrname=' . $row['user_uname'] . '&email=' . $row['user_email'] . '&phone=' . $row['user_phone'] . '&type=user">Edit</a><a href="delete.php?id=' . $row["user_id"] . '&perm=' . $row["user_perm"] . '&name=' . $row['user_name'] . '&usrname=' . $row['user_uname'] . '&email=' . $row['user_email'] . '&phone=' . $row['user_phone'] . '&type=user">Delete</a></td>';
                echo '</tr>';
            }
        }
        else {
            echo '<tr>
            <td colspan="5"><h4>No records found.</h4></td>
            </tr>
            ';
        }
    }
}