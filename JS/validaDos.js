document.addEventListener("DOMContentLoaded", () => {
  const formulario = document.getElementById("formulario");

  formulario.addEventListener("submit", function (e) {
    e.preventDefault(); 

    const correo = document.getElementById("correo").value.trim();
    const password = document.getElementById("contrasena").value.trim();

    const correoval = /^[a-zA-Z0-9._%+-]+@alumno\.ipn\.mx$/;
    const passwordval = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/;

    if (!correoval.test(correo)) {
      alert("Correo o Contraseña invalidos");
      return;
    }

    if (!passwordval.test(password)) {
      alert("Correo o Contraseña invalidos");
      return;
    }

   // alert("Formulario válido");
  });
});
