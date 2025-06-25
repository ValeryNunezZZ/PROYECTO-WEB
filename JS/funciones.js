$(document).ready(function () {
    $.ajax({
        url: "../includes/read.php",
        method: "GET",
        success: function (data) {
            $("#tabla-alumnos").html(data);
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar alumnos:", error);
        }
    });
});

function toggleNombreEscuela() {
    const escuela = document.getElementById('EscuelaProcedencia').value;
    document.getElementById('NombreEscuelaid').classList.add('hidden');
    document.getElementById('NombreEscuelaUNAM').classList.add('hidden');
    document.getElementById('NombreEscuelaDiv').classList.add('hidden');

    if (escuela === 'Politecnico') {
    document.getElementById('NombreEscuelaid').classList.remove('hidden');
    } else if (escuela === 'UNAM') {
    document.getElementById('NombreEscuelaUNAM').classList.remove('hidden');
    } else if (escuela === 'Otro') {
    document.getElementById('NombreEscuelaDiv').classList.remove('hidden');
    }
}


let edicionActivada = false;

function alternarBotones() {
    const botonRegistrar = document.getElementById("botonRegistrarDos");
    const botonEditar = document.getElementById("botonEditarDos");

    botonRegistrar.classList.toggle("ocultar");
    botonEditar.classList.toggle("ocultar");
}


function editarAlumno(btn) {

    const fila = btn.closest("tr");

    // Llenar el formulario con los datos del alumno
    document.getElementById("boleta").value = fila.dataset.boleta;
    document.getElementById("nombre").value = fila.dataset.nombre;
    document.getElementById("fecha").value = fila.dataset.fecha;
    document.getElementById("genero").value = fila.dataset.genero;
    document.getElementById("curp").value = fila.dataset.curp;
    document.getElementById("entidad").value = fila.dataset.entidad;
    document.getElementById("telefono").value = fila.dataset.telefono;
    document.getElementById("EscuelaProcedencia").value = fila.dataset.escuela;
    document.getElementById("Politecnico").value = fila.dataset.politecnico;
    document.getElementById("UNAM").value = fila.dataset.unam;
    document.getElementById("NombreEscuela").value = fila.dataset.nombreescuela;
    document.getElementById("promedio").value = fila.dataset.promedio;
    document.getElementById("correo").value = fila.dataset.correo;
    document.getElementById("password").value = fila.dataset.password;

    // Opcional: hacer scroll hasta el formulario
    //document.getElementById("form-registro").scrollIntoView({ behavior: "smooth" });

    alternarBotones();

    if(edicionActivada){
        edicionActivada = false;

        const formulario = document.getElementById("registro");
        formulario.reset();
    }else{
        edicionActivada = true;
    }
    
}



document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registro").addEventListener("submit", function (e) {
        e.preventDefault();

        const botonPresionado = e.submitter.value; // 'registrar' o 'actualizar'

        if (botonPresionado === "registrar") {
            
            const form = e.target;
            const formData = new FormData(form);
    
            fetch("../includes/insert.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data); // Mostrar mensaje del servidor
                form.reset(); // Limpiar formulario si quieres
                cargarTablaAlumnos(); // Opcional: recargar tabla
            })
            .catch(error => {
                console.error("Error al registrar:", error);
                alert("Hubo un error al registrar el alumno.");
            });

        } else if (botonPresionado === "actualizar") {
            
            const form = e.target;
            const formData = new FormData(form);
    
            fetch("../includes/update.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data); // Mostrar mensaje del servidor
                form.reset(); // Limpiar formulario si quieres
                cargarTablaAlumnos(); // Opcional: recargar tabla
            })
            .catch(error => {
                console.error("Error al actualizar:", error);
                alert("Hubo un error al actualizar el alumno.");
            });

        }
    });
});





function eliminarAlumno(boleta) {
    if (!confirm("¿Seguro que quieres eliminar al alumno con boleta " + boleta + "?")) {
        return; // Sale si cancela
    }

    // Llamada AJAX con fetch
    fetch('../includes/delete.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'boleta=' + encodeURIComponent(boleta)
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Mensaje del servidor
        // Recargar tabla después de eliminar:
        cargarTablaAlumnos();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al eliminar alumno.');
    });
}

// Función para cargar tabla (puedes llamarla al inicio y después de eliminar)
function cargarTablaAlumnos() {
    fetch("../includes/read.php")
        .then(response => response.text())
        .then(html => {
            document.getElementById("tabla-alumnos").innerHTML = html;
        });
}



// Carga inicial de la tabla cuando carga la página
document.addEventListener("DOMContentLoaded", cargarTablaAlumnos);
