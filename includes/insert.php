<?php

    include "conexion.php";

    $boleta = $_POST["boleta"];
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $genero = $_POST["genero"];
    $curp = $_POST["curp"];
    $entidad = $_POST["entidad"];
    $telefono = $_POST["telefono"];
    $EscuelaProcedencia = $_POST["EscuelaProcedencia"];
    $Politecnico = $_POST["Politecnico"] ?? null;
    $UNAM = $_POST["UNAM"] ?? null;
    $NombreEscuela = $_POST["NombreEscuela"] ?? null;
    $promedio = $_POST["promedio"];
    $correo = $_POST["correo"];
    $password = $_POST["password"]; // Seguridad

    $sql = "INSERT INTO alumnos (
        boleta, nombre, fecha, genero, curp, entidad, telefono, 
        EscuelaProcedencia, Politecnico, UNAM, NombreEscuela, 
        promedio, correo, password
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssssssssdss", $boleta, $nombre, $fecha, $genero, $curp, $entidad, $telefono, $EscuelaProcedencia, $Politecnico, $UNAM, $NombreEscuela, $promedio, $correo, $password);

    if ($stmt->execute()) {
        echo "Alumno registrado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();

?>
