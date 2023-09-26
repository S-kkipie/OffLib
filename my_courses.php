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
$carpeta = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Offlib</title>
    <meta charset="utf-8">
    <meta name="cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="my_courses.css">
</head>

<body>
    <section>
        <div class="sidebar close">
            <div class="bar-start">
                <a class="logo" href="#"><span>OL</span></a>
                <div class="personal">
                    <span>ROL:</span>
                    <span>
                        <?php
                        echo $_SESSION['rol'];
                        ?>
                    </span>
                </div>
            </div>
            <i class='bx bx-chevron-right arrow'></i>
            <div class="bar-menu">
                <div class="bar-links">
                    <ul>
                        <li>
                            <a href="my.php">
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
                            <a href="my_courses.php">
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
                        <?php
                        if ($row['rol'] == "Superadmin" || $row['rol'] == "Admin") echo   "<li>
                                    <a href='user_control.php'>
                                        <i class='bx bx-medal'></i>
                                        <span>Control de usuarios</span>
                                    </a>
                                </li>"
                        ?>

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
        <div class="nav">
            <h2>BIENVENIDO AL SEMESTRE 2023B</h2>
            <div class="personal-info">
                <?php
                echo "<img class='foto-perfil'  src='" . $carpeta . "\img\perfil.jpg" . "' alt='No hay foto de perfil'>";
                ?>
                <h1 class="name"> <?php echo $row['nombre'] ?></h1>
            </div>
        </div>
        <div class="edit-buttons">
            <button class="add-course">Agragar curso <i class='bx bx-book-add'></i></button>
        </div>
        <div class="all-courses">
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
            <div class="course">
                <a href="#">Curso de Programación Web</a>
                <p><strong>Profesor:</strong> John Doe</p>
                <p><strong>Duración:</strong> 10 semanas</p>
                <p><strong>Descripción:</strong> Este curso te enseñará los fundamentos de la programación web,
                    incluyendo HTML, CSS y JavaScript.</p>
            </div>
        </div>
    </main>
    <script src="my_courses.js"></script>
</body>

</html>