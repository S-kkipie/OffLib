<?php
session_start();
if ($_SESSION['rol'] != "Superadmin") {
    header('location: index.php');
}
$email = $_SESSION['email'];
$conn = mysqli_connect("localhost", "root", "", "offlib");
$query = "SELECT * FROM users1";
$result = $conn->query($query);
// Recorrer los resultados y procesar los datos
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de usuarios</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');

    :root {
        --text-color: #ffeba7;
        --background-color: #1f2029;
        --borderxd: solid white 2px;
        --color-contraste: #64CCC5;
        --link-color: #007bff;
    }

    body {
        font-family: 'Poppins', sans-serif;
        font-weight: 300;
        line-height: 1.7;
        color: var(--text-color);
        background-color: var(--background-color);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        margin: 0;
    }

    body {
        height: 100vh;
        width: 100vw;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-flow: nowrap column;
    }

    .tablaxd {
        border: 2px solid black;
        border-collapse: collapse;
        width: 100%;
    }

    .tablaxd td {
        height: 30px;
        padding: 7px;
        border: solid black 1px;
    }

    .tablaxd button {
        all: unset;
        margin: 5px;
        cursor: pointer;
        border: 1px solid black;
        border-radius: 2px;
        width: 30px;
        height: 30px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .content {
        border: solid 2px black;
        border-radius: 6px;
        padding: 15px 40px;
        width: 90%;
    }

    h2 {
        margin: 40px 0;
    }

    .boton-salida button {
        width: 80px;
        height: 35px;
        border-radius: 6px;
        font-weight: 200;
        margin: 30px 0;
        background-color: white;
        cursor: pointer;
    }

    input {
        font-family: inherit;
        font-weight: inherit;
        font-size: inherit;
        color: inherit;
        outline: none;
        border: none;
        border-bottom: var(--text-color) solid 2px;
        background-color: transparent;
        width: auto;
    }
    </style>
</head>

<body>
    <div class="content">
        <h2>CONTROL DE USUARIOS</h2>
        <form action="control_submit.php" method="post">
            <input type="hidden" name="submit" value="true">
            <?php
            echo "<table class='tablaxd'>";
            echo "<tr><td>ID</td><td>NOMBRE</td><td>EMAIL</td><td>TELEFONO</td><td>ROL</td><td>CONTRASEÑA</td><td>CREATED AT</td><td>OPCIONES</td>";
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr id='$i' class='fila'>";
                echo "<td class='id'>"  . $row['id']  . "</td>";
                echo "<td class='nombre'>"  . $row['nombre']  . "</td>";
                echo "<td class='email'>"  . $row['email']  . "</td>";
                echo "<td class='telefono'>"  . $row['telefono']  . "</td>";
                echo "<td class='rol'>"  . $row['rol']  . "</td>";
                echo "<td class='password'>"  . $row['password']  . "</td>";
                echo "<td class='created_at'>"  . $row['created_at']  . "</td>";
                echo "<td><button type='button' class='edit'><i class='bx bxs-edit-alt'></i></button><button type='button' class='delete'><i class='bx bxs-trash'></i></button><button type='submit' class='save'><i class='bx bxs-save bx-flip-horizontal'></i></button></td>";
                echo "</tr>";

                $i++;
                // Otros campos que desees mostrar
            }
            echo "</table>";
            ?>
        </form>

        <a class="boton-salida" href="my.php"><button>Salir</button></a>
    </div>

    <script>
    const editButtons = document.querySelectorAll('button.edit');
    const tabla = document.querySelector(".tablaxd");
    const filas = tabla.getElementsByTagName("tr");
    let id, nombre, email, telefono, rol, password;
    for (let i = 1; i < filas.length; i++) {
        const celdas = filas[i].querySelectorAll("td");
        const inputNames = ["nombre", "email", "telefono", "rol", "password"];
        const inputArray = [];
        for (let j = 1; j < celdas.length - 2; j++) {
            const input = document.createElement('input');
            input.name = inputNames[j - 1];
            input.type = 'text';
            input.value = celdas[j].textContent;
            inputArray.push(input);
        }
        editButtons[i - 1].addEventListener('click', () => {
            for (let j = 1; j < celdas.length - 2; j++) {
                celdas[j].textContent = "";
                celdas[j].appendChild(inputArray[j - 1]);

            }
        });

    }
    </script>
</body>

</html>