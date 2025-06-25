<?php
    include '../includes/conexion.php';
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

<!doctype html>
<html lang="en">
    <head>
        <link rel="icon" sizes="57x57" href="../IMG/iconoHamster.png" type="image/png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Alumno</title>
        <link rel="stylesheet" href="../CSS/estiloDos.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </head>
    
    <body class="position-relative">

        <header class="headerLogin">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                
                <div class="container-fluid">
            
                    <div class="navbar-brand imgEscudoIPN">
                        <a target="_blank" href="https://www.ipn.mx/"><img src="../IMG/logotipo_ipn.webp"></a>
                    </div>
                
                    <!-- Botón del menú hamburguesa -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                
                    <!-- Menú colapsable -->
                    <div class="collapse navbar-collapse" id="navbarContenido">
    
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a target="_blank" class="nav-link active" href="./index.html">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a target="_blank" class="nav-link" href="./registro.html">Registro</a>
                            </li>
                            <li class="nav-item">
                                <a target="_blank" class="nav-link" href="./loginAdmin.html">Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./loginAlumno.html">Cuenta</a>
                            </li>
                        </ul>
    
                    </div>
                </div>
            </nav>
    
        </header>

    <!-- Contenedor centrado -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-form col-11 col-sm-8 col-md-5 col-lg-4">
            <h4 class="mb-4 text-center">Iniciar Sesión Admin.</h4>

            <form id="formulario" novalidate method="POST">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" name="correo" class="form-control" id="correo" placeholder="nombre@correo.com">
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="contrasena" placeholder="••••••••">
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>

        <!-- Fondo con imagen -->
        <div class="bg-image">
            <div class="bg-image-black">
                
            </div>
        </div>

        <!--position-absolute bottom-0 end-0-->
        <div class="imgEscudo">
            <a class="nav-link active etiquetaAEscudo" href="https://www.escom.ipn.mx/" target="_blank">
                <img src="../IMG/EscudoESCOM.png" alt="Escudo de ESCOM" title="Escudo de ESCOM">
            </a>
        </div>

    </main>

    <footer class="bg-dark text-white pt-4 pb-2 mt-5">
        <div class="container">
        <div class="row">
            <!-- Logo y descripción -->
            <div class="col-md-4 mb-3">
            <div class="navbar-brand imgEscudoIPN escudoFooter">
                <a href="https://www.ipn.mx/"><img src="../IMG/logotipo_ipn.webp"></a>
            </div>
            <p class="mt-2 nombreEscuela">
                Instituto Politécnico Nacional<br>
                “La Técnica al Servicio de la Patria”
            </p>
            </div>
    
    
            <!-- Contacto -->
            <div class="col-md-4 mb-3 datosContacto">
            <h5>Contacto</h5>
            <p class="mb-1">Av. Juan de Dios Bátiz, CDMX</p>
            <p class="mb-1">Tel: +52 (55) 5729 6000</p>
            <p>Email: contacto@ipn.mx</p>
            </div>
        </div>
    
        <div class="text-center mt-3 border-top pt-3">
            <small>&copy; 2025 Instituto Politécnico Nacional. Todos los derechos reservados.</small>
        </div>
        </div>
    </footer>

    <script src="../JS/validaDos.js"></script>

    </body>


</html>
