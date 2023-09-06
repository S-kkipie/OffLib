<?php
session_start();
if ($_SESSION['loggedin'] != TRUE) {
    header('location: index.php');
}
//cofiguraioc
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "offlib";
try {
    // Conexión a la base de datos utilizando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // ID del usuario que deseas obtener
    $usuario_id = $_SESSION['user_id']; // Cambia este valor al ID del usuario que deseas obtener

    // Consulta SQL para obtener los datos del usuario específico
    $sql = "SELECT * FROM users1 WHERE id = :usuario_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario_id', $usuario_id);
    $stmt->execute();

    // Verificar si se encontraron resultados
    if ($stmt->rowCount() > 0) {
        // Obtener el resultado
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Imprimir los datos
        // echo "ID: " . $row['id'] . "<br>";
        //echo "Nombre: " . $row['nombre'] . "<br>";
        //echo "Email: " . $row['email'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
if (isset($_FILES['perfil']) and $_FILES['perfil']['error'] == 0) {
    unlink($_SESSION['email'] . "\img\perfil.jpg");
    $nombre_perfil = $_FILES["perfil"]["name"];
    $ruta_archivo = $_FILES["perfil"]["tmp_name"];
    $destino = $_SESSION['email'] . "/img/perfil.jpg";
    move_uploaded_file($ruta_archivo, $destino);
    echo "<script> alert('El archivo {$nombre_perfil} fue cargado exitosamente.')</script>";
    if (!file_exists($_SESSION['email'] . "\img\perfil.jpg")) {
        echo "Hubo un problema al cargar el archivo";
    }
}
if (isset($_FILES['perfil2']) and $_FILES['perfil2']['error'] == 0) {
    unlink($_SESSION['email'] . "\img\perfil2.jpg");
    $nombre_perfil2 = $_FILES["perfil2"]["name"];
    $ruta_archivo2 = $_FILES["perfil2"]["tmp_name"];
    $destino2 = $_SESSION['email'] . "/img/perfil2.jpg";
    move_uploaded_file($ruta_archivo2, $destino2);
    echo "<script> alert('El archivo {$nombre_perfil2} fue cargado exitosamente.')</script>";
    if (!file_exists($_SESSION['email'] . "\img\perfil2.jpg")) {
        echo "Hubo un problema al cargar el archivo";
    }
}
$carpeta = $_SESSION['email'];
?>
<!Doctype html>
<html lang="en">

<head>
    <title>Offlib</title>
    <meta charset="utf-8">
    <meta name="cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styles2.css">
</head>

<body>
    <section>
        <div class="sidebar close">
            <div class="bar-start">
                <a class="logo" href="#"><span>OL</span></a>
                <div class="personal">
                    <span class="name">ROL:</span>
                    <div class="rol">Student</div>
                </div>
            </div>
            <i class='bx bx-chevron-right arrow'></i>
            <div class="bar-menu">
                <div class="bar-links">
                    <ul>
                        <li>
                            <a href="#">
                                <i class='bx bxs-user'></i>
                                <span>Mi perfil</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bx bx-home'></i>
                                <span>Principal</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bx bxs-graduation'></i>

                                <span>Mis Cursos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bx bx-folder-open'></i>
                                <span>Mis Archivos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bx bx-medal'></i>
                                <span>Area personal</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bx bx-medal'></i>
                                <span>Area personal</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bar-end">
                    <li class="logout">
                        <a href="logout.php">
                            <i class='bx bxs-log-out'></i>
                            <span>Cerrar sesion</span>
                        </a>
                    </li>
                </div>
            </div>


        </div>


    </section>
    <main class="close">
        <div class="Select">
            <form action="my.php" method="post" enctype="multipart/form-data">

                <div class="file-select" id="file1">
                    <input value="xdsadasdd" id="select-portada" aria-label="Archivo" type="file" id="file1" name="portada" />
                    <label for="select-portada">xd</label>
                </div>
                <div class="file-select" id="file2">
                    <input id="select-perfil" aria-label="Archivo" type="file" id="file2" name="perfil" />
                    <label for="select-perfil">xd</label>
                </div>
                <input type="submit" value="Enviar">
            </form>
        </div>
        <div class="fotos">

            <?php
            if (file_exists($_SESSION['email'] . "/img/perfil.jpg")) {
                echo "<img class='foto-portada'  src='" . $carpeta . "\img\perfil.jpg" . "' alt='No hay foto de portada'>";
            } ?>
            <button class="button-portada"><i class='bx bx-image-add'></i></button>

            <div class="contenedor-foto-perfil">
                <?php
                if (file_exists($_SESSION['email'] . "/img/perfil2.jpg")) {
                    echo "<img class='foto-perfil'  src='" . $carpeta . "\img\perfil2.jpg" . "' alt='No hay foto de perfil'>";
                } ?>
                <h1 class="name"> <?php echo $row['nombre'] ?></h1>
            </div>

        </div>
        <div class="all-courses">
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <h1>Curso de Programación Web</h1>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
        </div>
    </main>
    <footer>
    </footer>
    <script src="my.js"></script>
</body>

</html>