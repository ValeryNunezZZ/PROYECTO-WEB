<?php
    include "conexion.php";
    /// Los datos se pasan con el name

    $boleta = $_POST["boleta"];
    $nombre = $_POST["nombre"];
    $fechaNac = $_POST["fecha"];
    $genero = $_POST["genero"];
    $curp = $_POST["curp"];
    $entidad = $_POST["entidad"];
    $telefono = $_POST["telefono"];
    $escuelaProcedencia = $_POST["EscuelaProcedencia"];
    $procedencia = $_POST['EscuelaProcedencia']; // Politecnico, UNAM o Otro
    
    session_start();

    $_SESSION["Politecnico"] = "";
    $_SESSION["UNAM"] = "";
    $_SESSION["NombreEscuela"] = "";
    
    if ($procedencia == "Politecnico" && isset($_POST['Politecnico'])) {
        $escuela = $_POST['Politecnico'];
        $_SESSION["Politecnico"] = $escuela;
    } elseif ($procedencia == "UNAM" && isset($_POST['UNAM'])) {
        $escuela = $_POST['UNAM'];
        $_SESSION["UNAM"] = $escuela;
    } elseif ($procedencia == "Otro" && isset($_POST['NombreEscuela'])) {
        $escuela = $_POST['NombreEscuela'];
        $_SESSION["NombreEscuela"] = $escuela;
    }

    $promedio = $_POST["promedio"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["password"];

    
    
    $_SESSION["boleta"] = $boleta;
    $_SESSION["nombre"] = $nombre;
    $_SESSION["fecha"] = $fechaNac;
    $_SESSION["genero"] = $genero;
    $_SESSION["curp"] = $curp;
    $_SESSION["entidad"] = $entidad;
    $_SESSION["telefono"] = $telefono;
    $_SESSION["escuela"] = $escuela;
    $_SESSION["promedio"] = $promedio;
    $_SESSION["correo"] = $correo;
    $_SESSION["password"] = $contrasena;
    $_SESSION["EscuelaProcedencia"] = $escuelaProcedencia;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos del Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Resultado del registro</h2>
        <h3>Datos recibidos:</h3>
        <ul class="list-group">
            <li class="list-group-item"><strong>Boleta:</strong> <?php echo htmlspecialchars($boleta); ?></li>
            <li class="list-group-item"><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></li>
            <li class="list-group-item"><strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($fechaNac); ?></li>
            <li class="list-group-item"><strong>Género:</strong> <?php echo htmlspecialchars($genero); ?></li>
            <li class="list-group-item"><strong>CURP:</strong> <?php echo htmlspecialchars($curp); ?></li>
            <li class="list-group-item"><strong>Entidad Federativa:</strong> <?php echo htmlspecialchars($entidad); ?></li>
            <li class="list-group-item"><strong>Teléfono:</strong> <?php echo htmlspecialchars($telefono); ?></li>
            <li class="list-group-item"><strong>Escuela de procedencia:</strong> <?php echo htmlspecialchars($escuela); ?></li>
            <li class="list-group-item"><strong>Promedio:</strong> <?php echo htmlspecialchars($promedio); ?></li>
            <li class="list-group-item"><strong>Correo Institucional:</strong> <?php echo htmlspecialchars($correo); ?></li>
        </ul>
        <a href="confirmar.php" class="btn btn-primary mt-3">Confirmar Registro</a>
        <a href="../registro.html" class="btn btn-primary mt-3">Modificar Registro</a>
    </div>
</body>
</html>