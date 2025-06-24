<?php

    include "conexion.php";

    $boleta = $_POST["boleta"];

    $sql = "DELETE FROM alumnos WHERE boleta = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $boleta);

    if ($stmt->execute()) {
        echo "Alumno eliminado correctamente.";
    } else {
        echo "Error al eliminar: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
    
?>
