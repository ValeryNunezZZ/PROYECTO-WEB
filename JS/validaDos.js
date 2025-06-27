document.addEventListener("DOMContentLoaded", () => {
  const formulario = document.getElementById("formulario");

  formulario.addEventListener("submit", function (e) {
    const correo = document.getElementById("correo").value.trim();
    const password = document.getElementById("contrasena").value.trim();

    const correoval = /^[a-zA-Z0-9._%+-]+@alumno\.ipn\.mx$/;
    const passwordval = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/;

    if (!correoval.test(correo)) {
      e.preventDefault(); // ✅ Solo evita el envío si es inválido
      alert("Correo inválido. Debe ser institucional.");
      return;
    }

    if (!passwordval.test(password)) {
      e.preventDefault(); // ✅ Solo evita el envío si es inválido
      alert("Contraseña inválida. Debe tener al menos una mayúscula, un número y un símbolo.");
      return;
    }

    // ✅ Si pasa las validaciones, no se hace preventDefault, y el formulario se envía normalmente
  });
});
