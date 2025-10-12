document.getElementById("formOfertaEmpresas").addEventListener("submit", function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch("./php/guardarofertaEMP.php", { //cambialo cuando tengas el php es la ruta del php
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert("Oferta publicada correctamente");
      document.getElementById("formOfertaEmpresas").reset();
    } else {
      alert("Error: " + data.message);
    }
  })
  .catch(err => {
    console.error("Error:", err);
    alert("Error al conectar con el servidor");
  });
});
