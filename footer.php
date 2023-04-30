    <footer class="footer">
        <p>Designed by Group 8 Web Programming</p>
    </footer>
</body>
<script src="js/app.js"></script>
<?php
if(isset($_SESSION["userid"]))
{
    if(isset($_GET["view"])){
        echo '<script> setMenu("m' . $_GET["view"] . '"); </script>'; 
    } else {
        if($_SESSION["userperm"] === "user") {echo '<script> setMenu("mbooking"); </script>';}
        if($_SESSION["userperm"] === "manager") {echo '<script> setMenu("mrequests"); </script>';}
        if($_SESSION["userperm"] === "admin") {echo '<script> setMenu("musers"); </script>';}
    }
}
?>
</html>