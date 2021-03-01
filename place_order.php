<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require("mysqli_oop_connect.php");
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstName']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastName']));

    
}
?>