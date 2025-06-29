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

document.getElementById("registro").addEventListener("submit", (e)=>{

  //e.preventDefault();

  const boleta = document.getElementById("boleta").value.trim();
  const nombre = document.getElementById("nombre").value.trim();
  const fecha = document.getElementById("fecha").value.trim();
  const genero = document.querySelector('input[name="genero"]:checked')?.value;
  const curp = document.getElementById("curp").value.trim();
  const entidad = document.getElementById("entidad").value;
  const telefono = document.getElementById("telefono").value.trim();
  const escuelaProcedencia = document.getElementById("EscuelaProcedencia").value;
  const politecnico = document.getElementById("Politecnico")?.value || "";
  const unam = document.getElementById("UNAM")?.value || "";
  const nombreEscuela = document.getElementById("NombreEscuela")?.value.trim() || "";
  const promedio = document.getElementById("promedio").value.trim();
  const correo = document.getElementById("correo").value.trim();
  const password = document.getElementById("password").value.trim();

  const datos = {
    boleta,
    nombre,
    fecha,
    genero,
    curp,
    entidad,
    telefono,
    escuelaProcedencia,
    politecnico,
    unam,
    nombreEscuela,
    promedio,
    correo,
    password
  };
  ///LOS GUARDAMOS POR SI SE REQUIERE REGRESAR AL FORMULARIO
  localStorage.setItem("datosRegistro", JSON.stringify(datos));

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
    e.preventDefault();
    return;
  }
  if (!nombreval.test(nombre)) {
    alert("Nombre inválido. Solo letras y espacios.");
    e.preventDefault();
    return;
  }
  if (!curpval.test(curp)) {
    alert("CURP inválido. Debe contener 18 caracteres.");
    e.preventDefault();
    return;
  }
  if (fechaNacimiento > hoy || fechaNacimiento.getFullYear() < 1900){
    alert("Fecha invalida. Debe ser del 1900 al año 2025");
    e.preventDefault();
    return;
  }
  if (!telefonoval.test(telefono)) {
    alert("Teléfono inválido. Deben ser 10 dígitos.");
    e.preventDefault();
    return;
  }
  if (isNaN(promedio) || promedio < 6 || promedio > 10) {
    alert("Promedio invalido. Debe estar entre 6 y 10");
    e.preventDefault();
    return;
  }
  if (!correoval.test(correo)) {
    alert("Correo inválido. Debe ser institucional @alumno.ipn.mx");
    e.preventDefault();
    return;
  }
  if (!passwordval.test(password)) {
    alert("Contraseña inválida. Debe tener mínimo 6 caracteres, una mayúscula, un dígito y un carácter especial.");
    e.preventDefault();
    return;
  }

  const nombreAlumno = nombre;
  let resumen = `Hola ${nombreAlumno}, verifica que los datos que ingresaste sean correctos:\n\n`;
  resumen += `No. de boleta: ${boleta}\nFecha de nacimiento: ${document.getElementById("fecha").value}\n`;
  const generoSeleccionado = document.querySelector('input[name="genero"]:checked');
  resumen += `Género: ${generoSeleccionado ? generoSeleccionado.value : 'No seleccionado'}\nEntidad de procedencia: ${document.getElementById("entidad").value}\n`;

  if (escuelaProcedencia === "Politecnico") {
    resumen += `Escuela de Procedencia: Politécnico - ${document.getElementById("Politecnico").value}\n`;
  } else if (escuelaProcedencia === "UNAM") {
    resumen += `Escuela de Procedencia: UNAM - ${document.getElementById("UNAM").value}\n`;
  } else if (escuelaProcedencia === "Otro") {
    resumen += `Escuela de Procedencia: ${document.getElementById("NombreEscuela").value}\n`;
  } else {
    resumen += `Escuela de Procedencia: No Puesta\n`;
  }

  resumen += `CURP: ${curp}\nTeléfono: ${telefono}\nCorreo: ${correo}`;

  alert(resumen);

});

window.addEventListener("DOMContentLoaded", () => {
  // Obtener los datos guardados en localStorage
  const datos = JSON.parse(localStorage.getItem("datosRegistro"));

  // Asignar valores directamente
  document.getElementById("boleta").value = datos.boleta;
  document.getElementById("nombre").value = datos.nombre;
  document.getElementById("curp").value = datos.curp;
  document.getElementById("fecha").value = datos.fecha;
  document.getElementById("telefono").value = datos.telefono;
  document.getElementById("promedio").value = datos.promedio;
  document.getElementById("correo").value = datos.correo;
  document.getElementById("password").value = datos.password;
  document.getElementById("entidad").value = datos.entidad;
  document.getElementById("EscuelaProcedencia").value = datos.escuelaProcedencia;

  document.querySelector(`input[name="genero"][value="${datos.genero}"]`).checked = true;

  const divNombreEscuela = document.getElementById("NombreEscuelaDiv");
  const divNombrePolitecnico = document.getElementById("NombreEscuelaid");
  const divNombreUNAM = document.getElementById("NombreEscuelaUNAM");

  const inputNombreEscuela = document.getElementById("NombreEscuela");
  const selectPolitecnico = document.getElementById("Politecnico");
  const inputUNAM = document.getElementById("UNAM");

  divNombreEscuela.style.display = "none";
  divNombrePolitecnico.style.display = "none";
  divNombreUNAM.style.display = "none";

  // Dependiendo del tipo de escuela, asignar el nombre ESTO ESTA MAL
  if (datos.escuelaProcedencia === "Politecnico") {
    divNombrePolitecnico.style.display = "block";
    selectPolitecnico.required = true;
    document.getElementById("Politecnico").value = datos.politecnico;
  } else if (datos.escuelaProcedencia === "UNAM") {
    divNombreUNAM.style.display = "block";
    inputUNAM.required = true;
    document.getElementById("UNAM").value = datos.unam;
  } else {
    divNombreEscuela.style.display = "block";
    inputNombreEscuela.required = true;
    document.getElementById("NombreEscuela").value = datos.nombreEscuela;
  }
});
