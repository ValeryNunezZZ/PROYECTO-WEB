<?php
    include '../conexion.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM administracion WHERE correo = '$correo' AND tipo = 'admin'";

        $resultado = $conexion->query($sql);



        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();
            if ($password == $usuario['contrasena']){
                $_SESSION['usuario_id'] = $usuario['correo'];
                $_SESSION['usuario_tipo'] = $usuario['tipo'];
                
                header("Location: dashboard.php");
                exit();
            }
        }
        echo "Datos incorrectos.";
    }
?>

<form method="POST">
    <h2>Login Administrador</h2>
    <input type="email" name="correo" placeholder="Correo" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <button type="submit">Iniciar sesión</button>
</form>
