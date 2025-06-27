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

    const escuela = document.getElementById("EscuelaProcedencia").value;

    const divNombreEscuela = document.getElementById("NombreEscuelaDiv");
    const divNombrePolitecnico = document.getElementById("NombreEscuelaid");
    const divNombreUNAM = document.getElementById("NombreEscuelaUNAM");

    const inputNombreEscuela = document.getElementById("NombreEscuela");
    const selectPolitecnico = document.getElementById("Politecnico");
    const inputUNAM = document.getElementById("UNAM");


    divNombreEscuela.style.display = "none";
    divNombrePolitecnico.style.display = "none";
    divNombreUNAM.style.display = "none";
    inputNombreEscuela.required = false;
    selectPolitecnico.required = false;
    inputUNAM.required = false;

    if (escuela === "Otro") {
        divNombreEscuela.style.display = "block";
        inputNombreEscuela.required = true;
    } else if (escuela === "Politecnico") {
        divNombrePolitecnico.style.display = "block";
        selectPolitecnico.required = true;
    } else if (escuela === "UNAM") {
        divNombreUNAM.style.display = "block";
        inputUNAM.required = true;
    }
}

toggleNombreEscuela();



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

            const boleta = document.getElementById("boleta").value.trim();
            const nombre = document.getElementById("nombre").value.trim();
            const curp = document.getElementById("curp").value.trim();
            const fecha = document.getElementById("fecha").value.trim();
            const telefono = document.getElementById("telefono").value.trim();
            const promedio = parseFloat(document.getElementById("promedio").value.trim());
            const correo = document.getElementById("correo").value.trim();
            const password = document.getElementById("password").value.trim();
        
            const boletaval = /^((PE|PP)\d{8}|\d{10})$/;
            const nombreval = /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]+$/;
            const curpval = /^[A-Z]{4}\d{6}[A-Z]{6}[A-Z0-9]{1}[0-9]{1}$/i;
            const telefonoval = /^\d{10}$/;
            const correoval = /^[a-zA-Z0-9._%+-]+@alumno\.ipn\.mx$/;
            const passwordval = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/;
            const fechaNacimiento = new Date(fecha);
            const hoy = new Date();
        
            if (!boletaval.test(boleta)) {
                alert("Número de boleta inválido. Ejemplo: PE12345678 o 2024630065");
                return;
            }
            if (!nombreval.test(nombre)) {
                alert("Nombre inválido. Solo letras y espacios.");
                return;
            }
            if (!curpval.test(curp)) {
                alert("CURP inválido. Debe contener 18 caracteres.");
                return;
            }
            if (fechaNacimiento > hoy || fechaNacimiento.getFullYear() < 1900){
                alert("Fecha invalida. Debe ser del 1900 al año 2025");
                return;
            }
            if (!telefonoval.test(telefono)) {
                alert("Teléfono inválido. Deben ser 10 dígitos.");
                return;
            }
            if (isNaN(promedio) || promedio < 6 || promedio > 10) {
            alert("Promedio invalido. Debe estar entre 6 y 10");
            e.preventDefault();
            return;
            }
            if (!correoval.test(correo)) {
                alert("Correo inválido. Debe ser institucional @alumno.ipn.mx");
                return;
            }
            if (!passwordval.test(password)) {
                alert("Contraseña inválida. Debe tener mínimo 6 caracteres, una mayúscula, un dígito y un carácter especial.");
                return;
            }
    
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
