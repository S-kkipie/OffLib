<?php
session_start();
if ($_SESSION['loggedin'] != TRUE) {
    header("location: index.php");
}
foreach ($_POST as $nombreCampo => $valorCampo) {
    // $nombreCampo es el nombre del campo en el formulario
    // $valorCampo es el valor del campo enviado a través del formulario
    echo "Nombre del campo: " . $nombreCampo . "<br>";
    echo "Valor del campo: " . $valorCampo . "<br>";
    echo "<br>";
}
$conn = mysqli_connect("localhost", "root", "", "offlib");
$query = "SELECT * FROM users1";
$result = $conn->query($query);
$row = $result->fetch_assoc();
if (isset($_POST['submit'])) {
    $telefono = $_POST["telefono"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $rol = $_POST["rol"];
    $password = $_POST['password'];
    $password_hash = $password;
    if ($row['password'] != $password) {
        $password_hash = hash('md5', $password);
    }
    if (!isset($_POST['newUser'])) {
        $id = $_POST["id"];
        $sql = "UPDATE users1 SET telefono='$telefono', password = '$password_hash', nombre='$nombre', email='$email', rol='$rol' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            echo "Los datos se actualizaron correctamente";
        } else {
            echo "Error al actualizar datos: " . mysqli_error($conn);
        }
    } else {
        if (isset($telefono, $nombre, $email, $rol)) {
            $sql = "INSERT INTO users1 (nombre, email, password, telefono) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssss", $nombre, $email, $password_hash, $telefono);
            if (mysqli_stmt_execute($stmt)) {
                mkdir($email, 0777, true);
                mkdir($email . "/img", 0777, true);
            } else {
                echo "Error en el registro: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn);
} else {
    header("location: user_control.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="user_control.php"><button>Salir</button></a>
</body>

</html>