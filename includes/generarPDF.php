<?php
    require('../fpdf186/fpdf.php');
    include "conexion.php";
    session_start();

    // Conexión
    $conexion = new mysqli($servidor, $usr, $pass, $bd);
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $correo = $_SESSION["correo"];

    // Consulta
    $sql = "SELECT * FROM alumnos WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 0) {
        die("No se encontró ningún alumno con ese correo.");
    }

    $alumno = $resultado->fetch_assoc();

    class PDF extends FPDF {
        function header(){
            $this->Image('../IMG/logoIPN.png', 10, 10, 20);
            $this->Image('../IMG/iconoHamster.png', 85, 10, 40);
            $this->Image('../IMG/EscudoESCOM.png', 160, 10, 40);
            
            $this->Ln(30);
            $this->SetFont('helvetica', 'B', 16);
            $this->Cell(0, 10, utf8_decode('Ficha de Registro - Datos del Alumno'), 0, 1, 'C');
            $this->Ln(5);
        }

        function footer(){
            $this->SetY(-20);
            $this->SetFont('helvetica', 'I', 10);
            $this->Cell(0, 15, utf8_decode('Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
        }
    }

    $pdf = new PDF();
    $pdf->SetMargins(15, 20, 19); // (izquierda, arriba, derecha)
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);

    // Colores
    $bgColor = [240, 240, 240];
    $border = 1;
    $height = 10;
    $width_label = 60;
    $width_value = 120;

    // Estilo tabla
    function printRow($pdf, $label, $value, $fill){
        global $width_label, $width_value, $height, $border;
        $pdf->SetFillColor(240, 240, 240);
        $pdf->Cell($width_label, $height, utf8_decode($label), $border, 0, 'L', $fill);
        $pdf->Cell($width_value, $height, utf8_decode($value), $border, 1, 'L', $fill);
    }

    $fill = false;

    printRow($pdf, 'Boleta:', $alumno['boleta'], $fill = !$fill);
    printRow($pdf, 'Nombre:', $alumno['nombre'], $fill = !$fill);
    printRow($pdf, 'Fecha de Nacimiento:', $alumno['fecha'], $fill = !$fill);
    printRow($pdf, 'Género:', $alumno['genero'], $fill = !$fill);
    printRow($pdf, 'CURP:', $alumno['curp'], $fill = !$fill);
    printRow($pdf, 'Entidad Federativa:', $alumno['entidad'], $fill = !$fill);
    printRow($pdf, 'Teléfono:', $alumno['telefono'], $fill = !$fill);
    printRow($pdf, 'Escuela de Procedencia:', $alumno['escuela'], $fill = !$fill);
    printRow($pdf, 'Promedio:', $alumno['promedio'], $fill = !$fill);
    printRow($pdf, 'Correo:', $alumno['correo'], $fill = !$fill);

    $pdf->Ln(5);
    $pdf->SetFont('helvetica', 'I', 10);
    $pdf->MultiCell(0, 8, utf8_decode("Este documento contiene los datos registrados por el alumno. Verifique que toda la información sea correcta."), 0, 'L');

    $pdf->Output();

    $conexion->close();
    session_destroy();
?>