<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    include '../conexion.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM alumnos WHERE correo = '$correo' AND tipo = 'alumno'";
        
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();
            if (password_verify($password, $usuario['password'])) {
                $_SESSION['usuario_id'] = $usuario['boleta'];
                $_SESSION['usuario_tipo'] = $usuario['tipo'];
                /* 
                var_dump($_SESSION);
                exit(); */
                header("Location: dashboard.php");
                exit();
            }
        }
        echo "Datos incorrectos.";
    }
?>

<form method="POST">
    <h2>Login Alumno</h2>
    <input type="email" name="correo" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <button type="submit">Iniciar sesión</button>
</form>
