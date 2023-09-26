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
if (isset($_POST['email'])) {
    $conn = mysqli_connect("localhost", "root", "", "offlib");
    $id = $_POST["id"];
    $telefono = $_POST["telefono"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $rol = $_POST["rol"];

    // Consulta SQL para actualizar los datos de la fila con el ID específico
    $sql = "UPDATE users1 SET telefono='$telefono', nombre='$nombre', email='$email', rol='$rol' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Los datos se actualizaron correctamente";
    } else {
        echo "Error al actualizar datos: " . mysqli_error($conn);
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