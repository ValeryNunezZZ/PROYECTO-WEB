<?php
    $servidor = "localhost:3307";
    $usr = "root";
    $pass = "";
    $bd = "registro_alumnos";

    $conexion = new mysqli($servidor, $usr, $pass, $bd);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
?>
