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
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Rehashea

    $sql = "UPDATE alumnos SET 
        nombre=?, fecha=?, genero=?, curp=?, entidad=?, telefono=?, 
        EscuelaProcedencia=?, Politecnico=?, UNAM=?, NombreEscuela=?, 
        promedio=?, correo=?, password=? 
        WHERE boleta=?";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssssssdsss", $nombre, $fecha, $genero, $curp, $entidad, $telefono,
        $EscuelaProcedencia, $Politecnico, $UNAM, $NombreEscuela, $promedio, $correo, $password, $boleta);

    if ($stmt->execute()) {
        echo "Alumno actualizado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();

?>
