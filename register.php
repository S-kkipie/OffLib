<?php
session_start();
if($_SESSION['loggedin']!=TRUE){
    header("location: index.php");
}
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambia esto con el nombre de tu servidor MySQL
$username = "root"; // Cambia esto con tu nombre de usuario de MySQL
$password = ""; // Cambia esto con tu contraseña de MySQL
$dbname = "offlib"; // Cambia esto con el nombre de tu base de datos

// Crear conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Procesar el formulario de registro si se envió
if (isset($_POST['submit'])) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $telefono = $_POST["telefono"];
    $password_hash=hash('md5',$password);

    // Insertar los datos del registro en la tabla de usuarios
    $sql = "INSERT INTO users1 (nombre, email, password, telefono) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $nombre, $email, $password_hash, $telefono);
    if (mysqli_stmt_execute($stmt)) {
        header("location: index.php");
        mkdir($email,0777,true);
        mkdir($email."/img",0777,true);
    } else {
        echo "Error en el registro: " . mysqli_error($conn);

    }

    // Cerrar la declaración preparada
    mysqli_stmt_close($stmt);
}else{
    header("location: index.php");
}

// Cerrar la conexión
mysqli_close($conn);
?>