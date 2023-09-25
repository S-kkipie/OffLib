<?php
$archivo = $_FILES['archivo'];
$nombre = $archivo['name'];
$tipo = $archivo['type'];
if (!is_dir('images')) {
    mkdir("images", 0777);
}
echo "</hr>";
var_dump($_FILES);
move_uploaded_file($archivo['tmp_name'], 'images/' . $nombre);
echo "imagen suida correctamente";
header('Refresh: 20 ; URL=my.php');