<?php
    session_start();

    function verificarSesion($tipo) {
        if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== $tipo) {
            header("Location: ../index.php");
            exit();
        }
    }
?>