<?php

session_start();
if ($_SESSION['loggedin'] != TRUE) {
    header("location: index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = hash('md5', $password);
    $connection = mysqli_connect("localhost", "root", "", "offlib");

    $query = "SELECT id FROM users1 WHERE email='$username' AND password='$password_hash'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = $_POST['email'];

        header('Location: my.php');
        exit();
    } else {
        $_SESSION['err'] = "El nombre de usuario o la contraseña son incorrectos.";
    }
} else {
    header("location: index.php");
}
