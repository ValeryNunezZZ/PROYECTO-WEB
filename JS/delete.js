function eliminarAlumno(boleta) {
    if (!confirm("¿Seguro que quieres eliminar al alumno con boleta " + boleta + "?")) {
        return; // Sale si cancela
    }

    // Llamada AJAX con fetch
    fetch('delete.php', {
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
    fetch("read.php")
        .then(response => response.text())
        .then(html => {
            document.getElementById("tabla-alumnos").innerHTML = html;
        });
}

// Carga inicial de la tabla cuando carga la página
document.addEventListener("DOMContentLoaded", cargarTablaAlumnos);
