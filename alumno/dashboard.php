<?php
    include '../includes/auth.php';
    
    verificarSesion('alumno');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bienvenida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h1 class="mb-4">
                ¡Bienvenido Alumno! <br />
                <small class="text-muted">Número de boleta: <?php echo ($_SESSION['usuario_id']); ?></small>
            </h1>

            <div class="d-flex gap-3">
                <a href="../includes/generarPDF.php" target="_blank" class="btn btn-primary">
                    Generar PDF
                </a>

                <a href="../logout.php" class="btn btn-danger">
                    Cerrar Sesión
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opcional si no usas componentes JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>