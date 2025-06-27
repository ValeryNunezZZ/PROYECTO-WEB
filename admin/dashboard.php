<?php
    include '../includes/auth.php';
    verificarSesion('admin');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador - Gestión de Alumnos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script defer src="../JS/funciones.js"></script>

    <style>
        .hidden { display: none; }
        .ocultar {
            display: none !important;
        }
    </style>

</head>

<body class="bg-light">
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
            <div class="container-fluid">
                <span class="navbar-brand fw-bold text-primary">Panel del Administrador</span>

                <div class="d-flex">
                    <a href="../logout.php" class="btn btn-outline-danger">Cerrar sesión</a>
                </div>
            </div>
        </nav>
    </header>


    <div class="container py-5">
    <h2 class="text-center mb-4">Panel del Administrador</h2>

    <div id="tabla-alumnos"></div>


    <!-- Formulario de Registro de Alumno -->
    <div class="card">
        <div class="card-header bg-success text-white">
        Registrar Nuevo Alumno
        </div>
        <div class="card-body">
        <form id="registro">
            <h5 class="mb-3">Datos Personales</h5>
            <div class="row mb-3">
            <div class="col-md-4">
                <label for="boleta" class="form-label">Número de Boleta</label>
                <input type="text" id="boleta" name="boleta" class="form-control" required />
            </div>
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required />
            </div>
            <div class="col-md-4">
                <label for="fecha" class="form-label">Fecha de Nacimiento</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required />
            </div>
            </div>

            <div class="row mb-3">
            <div class="col-md-4">
                <label for="genero" class="form-label">Género</label>
                <select id="genero" name="genero" class="form-select" required>
                <option value="">Selecciona</option>
                <option>Mujer</option>
                <option>Hombre</option>
                <option>Otro</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="curp" class="form-label">CURP</label>
                <input type="text" id="curp" name="curp" maxlength="18" class="form-control" required />
            </div>
            <div class="col-md-4">
                <label for="entidad" class="form-label">Entidad Federativa</label>
                <select id="entidad" name="entidad" class="form-select" required>
                <option value="">Selecciona</option>
                <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="CDMX">CDMX</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Estado de México">Estado de México</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Michoacan">Michoacan</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo Leon">Nuevo Leon</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Queretaro">Queretaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosi">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatan">Yucatan</option>
                    <option value="Zacatecas">Zacatecas</option>
                </select>
            </div>
            </div>

            <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="number" id="telefono" name="telefono" class="form-control" required />
            </div>

            <h5 class="mt-4">Datos de Procedencia</h5>
            <div class="mb-3">
            <label for="EscuelaProcedencia" class="form-label">Escuela de Procedencia</label>
            <select id="EscuelaProcedencia" name="EscuelaProcedencia" class="form-select" onchange="toggleNombreEscuela()" required>
                <option value="">Selecciona</option>
                <option value="Politecnico">Politécnico</option>
                <option value="UNAM">UNAM</option>
                <option value="Otro">Otro</option>
            </select>
            </div>

            <div class="mb-3 hidden" id="NombreEscuelaid">
            <label for="Politecnico" class="form-label">Nombre de la Escuela del Politécnico</label>
            <select id="Politecnico" name="Politecnico" class="form-select">
                <option value="CECyT 1">CECyT 1</option>
                <option value="CECyT 2">CECyT 2</option>
                <option value="CECyT 3">CECyT 3</option>
                <option value="CECyT 4">CECyT 4</option>
                <option value="CECyT 5">CECyT 5</option>
                <option value="CECyT 6">CECyT 6</option>
                <option value="CECyT 7">CECyT 7</option>
                <option value="CECyT 8">CECyT 8</option>
                <option value="CECyT 9">CECyT 9</option>
                <option value="CECyT 10">CECyT 10</option>
                <option value="CECyT 11">CECyT 11</option>
                <option value="CECyT 12">CECyT 12</option>
                <option value="CECyT 13">CECyT 13</option>
                <option value="CECyT 14">CECyT 14</option>
                <option value="CECyT 15">CECyT 15</option>
                <option value="CECyT 16">CECyT 15</option>
                <option value="CECyT 17">CECyT 15</option>
                <option value="CECyT 18">CECyT 15</option>
                <option value="CECyT 19">CECyT 19</option>
                <option value="CET 1">CET 1</option>
            </select>
            </div>

            <div class="mb-3 hidden" id="NombreEscuelaUNAM">
            <label for="UNAM" class="form-label">Nombre de la Escuela de la UNAM</label>
            <select id="UNAM" name="UNAM" class="form-select">
                    <option value="CCH VALLEJO">CCH VALLEJO</option>
                    <option value="CCH SUR">CCH SUR</option>
                    <option value="CCH AZCAPOTZALCO">CCH AZCAPOTZALCO</option>
                    <option value="CCH ORIENTE">CCH ORIENTE</option>
                    <option value="prepa 9">Prepa 9</option>
            </select>
            </div>

            <div class="mb-3 hidden" id="NombreEscuelaDiv">
            <label for="NombreEscuela" class="form-label">Nombre de la Escuela</label>
            <input type="text" id="NombreEscuela" name="NombreEscuela" class="form-control" />
            </div>

            <div class="mb-3">
            <label for="promedio" class="form-label">Promedio</label>
            <input type="number" step="0.1" min="6" max="10" id="promedio" name="promedio" class="form-control" required />
            </div>

            <h5 class="mt-4">Datos de Cuenta</h5>
            <div class="mb-3">
            <label for="correo" class="form-label">Correo Institucional</label>
            <input type="email" id="correo" name="correo" class="form-control" required />
            </div>
            <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" required>
<input type="checkbox" onclick="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Mostrar contraseña

            </div>

            <div class="d-flex justify-content-end gap-2">

            <button type="submit" id="botonRegistrarDos" name="accion" class="btn btn-primary" value="registrar">Registrar</button>
            <button type="submit" name="accion" id="botonEditarDos" class="btn btn-warning ocultar" value="actualizar">Editar</button>

            <button type="reset" class="btn btn-secondary">Limpiar</button>
            </div>
        </form>
        </div>
    </div>
    </div>

</body>
</html>


