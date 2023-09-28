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
    <link rel="stylesheet" href="user_control.css">
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
        <div class="botones">
            <button class="add-users">Añadir usuario</button>
            <a class="boton-salida" href="my.php"><button>Salir</button></a>

        </div>
    </div>

    <script>
    const addUser = document.querySelector(".add-users")
    const editButtons = document.querySelectorAll('button.edit');
    const tabla = document.querySelector(".tablaxd");
    const filas = tabla.getElementsByTagName("tr");
    let id, nombre, email, telefono, rol, password;
    const inputNames = ["id", "nombre", "email", "telefono", "rol", "password"];
    addUser.addEventListener("click", () => {
        const buttonEdit = document.createElement("button");
        const iconButtonEdit = document.createElement("i");
        iconButtonEdit.className = "bx bxs-edit-alt";
        buttonEdit.className = "edit";
        buttonEdit.type = "button";
        buttonEdit.appendChild(iconButtonEdit);
        const buttonDelete = document.createElement("button");
        const iconButtonDelete = document.createElement("i");
        iconButtonDelete.className = "bx bxs-trash";
        buttonDelete.className = "delete";
        buttonDelete.type = "button";
        buttonDelete.appendChild(iconButtonDelete);
        const buttonSave = document.createElement("button");
        const iconButtonSave = document.createElement("i");
        iconButtonSave.className = "bx bxs-save";
        buttonSave.className = "save";
        buttonSave.type = "submit";
        buttonSave.appendChild(iconButtonSave);

        const newUser_Fila = document.createElement("tr");
        let tdArray = [];
        let celda, inputInfo;
        for (let i = 0; i < 9; i++) {
            celda = document.createElement("td");
            inputInfo = document.createElement("input");
            if (0 < i && i < 6) {
                inputInfo.name = inputNames[i];
                inputInfo.type = "text";
                celda.appendChild(inputInfo);
            }
            if (i == 7) {
                celda.appendChild(buttonEdit);
                celda.appendChild(buttonDelete);
                celda.appendChild(buttonSave);
            }
            if (i == 8) {
                celda.hidden = "hidden";
                inputInfo.name = "newUser";
                inputInfo.type = "hidden";
                inputInfo.value = "true";
                celda.appendChild(inputInfo);
            }
            newUser_Fila.appendChild(celda);

        }
        tabla.appendChild(newUser_Fila);
    })


    //empiezo por 1 ya que 0 es la fila de los titulos de cada columna
    for (let i = 1; i < filas.length; i++) {
        const celdas = filas[i].querySelectorAll("td");
        const inputArray = [];
        for (let j = 0; j < celdas.length - 2; j++) {
            const input = document.createElement('input');
            input.name = inputNames[j];
            input.type = 'text';
            input.value = celdas[j].textContent;
            if (j != 0) {
                input.type = 'text';
            } else {
                input.type = 'hidden';
            }
            inputArray.push(input);
        }
        editButtons[i - 1].addEventListener('click', () => {
            for (let j = 0; j < celdas.length - 2; j++) {
                if (j != 0) {
                    celdas[j].textContent = "";
                }
                celdas[j].appendChild(inputArray[j]);

            }
        });
    }
    </script>
</body>

</html>