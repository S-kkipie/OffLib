<?php
session_start();
if ($_SESSION['loggedin'] != TRUE) {
    header("location: index.php");
}
if (isset($_POST['email'])) {
    foreach ($_POST as $clave => $valor) {
        echo "$clave: $valor<br>";
    }
} else {
    header("location: user_control.php");
}
