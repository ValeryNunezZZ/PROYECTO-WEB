<?php

    include "conexion.php";

    $sql = "SELECT * FROM alumnos";
    $resultado = $conexion->query($sql);

    // Inicio del contenedor de la tabla
    echo '<div class="card mb-5">
        <div class="card-header bg-primary text-white">
            Alumnos Registrados
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Boleta</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Escuela</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>';

    // Verifica si hay registros
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            // Decide qué escuela mostrar
            $escuela = $fila["Politecnico"] ?? $fila["UNAM"] ?? $fila["NombreEscuela"] ?? $fila["EscuelaProcedencia"];

            echo "<tr
                data-boleta='{$fila['boleta']}'
                data-nombre='{$fila['nombre']}'
                data-fecha='{$fila['fecha']}'
                data-genero='{$fila['genero']}'
                data-curp='{$fila['curp']}'
                data-entidad='{$fila['entidad']}'
                data-telefono='{$fila['telefono']}'
                data-escuela='{$fila['EscuelaProcedencia']}'
                data-politecnico='{$fila['Politecnico']}'
                data-unam='{$fila['UNAM']}'
                data-nombreescuela='{$fila['NombreEscuela']}'
                data-promedio='{$fila['promedio']}'
                data-correo='{$fila['correo']}'
                data-password='{$fila['password']}'
            >";

            echo "<td>{$fila['boleta']}</td>";
            echo "<td>{$fila['nombre']}</td>";
            echo "<td>{$fila['correo']}</td>";
            echo "<td>{$escuela}</td>";
            echo "<td>
                    <div class='d-flex gap-2'>
                        <button class='btn btn-sm btn-warning' onclick='editarAlumno(this)'>Editar</button>
                        <button class='btn btn-sm btn-danger' onclick='eliminarAlumno(\"{$fila['boleta']}\")'>Eliminar</button>
                        <button class='btn btn-sm btn-info text-white' onclick='verAlumno(this)'>Ver</button>
                    </div>
                </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5' class='text-center'>No hay alumnos registrados.</td></tr>";
    }

    // Cierre de tabla y card
    echo '</tbody>
            </table>
        </div>
    </div>';

    $conexion->close();

?>
