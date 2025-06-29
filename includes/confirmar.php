<?php
    include "conexion.php";
    session_start();

    $boleta = $_SESSION["boleta"];
    $nombre = $_SESSION["nombre"];
    $fechaNac = $_SESSION["fecha"];
    $genero = $_SESSION["genero"];
    $curp = $_SESSION["curp"];
    $entidad = $_SESSION["entidad"];
    $telefono = $_SESSION["telefono"];
    $escuela = $_SESSION["escuela"];
    $promedio = $_SESSION["promedio"];
    $correo = $_SESSION["correo"];
    $contrasena = $_SESSION["password"];

    /// se hace el insert del usuario
    $nuevoRegistro = 
    "INSERT INTO `alumnos`
    (`boleta`, `nombre`, `fecha`, `genero`, `curp`, `entidad`,
    `telefono`, `EscuelaProcedencia`, `promedio`, `correo`, `password`)
    VALUES ('$boleta', '$nombre', '$fechaNac', '$genero', '$curp', '$entidad',
    '$telefono', '$escuela', '$promedio', '$correo', '$contrasena');
    ";


    $resultado = mysqli_query($conexion, $nuevoRegistro);
    if($resNuevo = mysqli_affected_rows($conexion) > 0){
        echo "<h1>El registro se realizó de forma exitosa.</h1>";
        echo "<p>Generando el PDF, por favor espere...</p>";
        echo "<script>
            setTimeout(function() {
                window.open('generarPDF.php', '_blank');
                window.location.href = '../index.php';
            }, 2000); // 2000 ms = 2 segundos
        </script>";
    }
?>