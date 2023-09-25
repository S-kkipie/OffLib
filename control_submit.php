<?php
session_start();
if ($_SESSION['loggedin'] != TRUE) {
    header("location: index.php");
}
if (isset($_POST['email'])) {
    $conn = mysqli_connect("localhost", "root", "", "offlib");
    $sql = "";
    foreach ($_POST as $key => $value) {
        echo $key . " es a   " . $value . "<br>";
    }
} else {
    header("location: user_control.php");
}
