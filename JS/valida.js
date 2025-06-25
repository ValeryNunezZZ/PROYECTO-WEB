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

  e.preventDefault();

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

  
const nombreAlumno = nombre;
let resumen = `Hola ${nombreAlumno}, verifica que los datos que ingresaste sean correctos:\n\n`;
resumen += `No. de boleta: ${boleta}\nFecha de nacimiento: ${document.getElementById("fecha").value}\n`;
const generoSeleccionado = document.querySelector('input[name="genero"]:checked');
resumen += `Género: ${generoSeleccionado ? generoSeleccionado.value : 'No seleccionado'}\nEntidad de procedencia: ${document.getElementById("entidad").value}\n`;

const escuelaProcedencia = document.getElementById("EscuelaProcedencia").value;

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

