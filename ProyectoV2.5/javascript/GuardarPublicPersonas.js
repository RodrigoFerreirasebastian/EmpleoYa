document.getElementById("formOfertapersonas").addEventListener("submit", function(e) {
e.preventDefault();

const formData = new FormData(this);

  fetch("", { //cambialo cuando tengas el php es la ruta del php
    body: formData
})
.then(res => res.json())
.then(data => {
    if (data.success) {
    alert("Oferta publicada correctamente");
    document.getElementById("formOfertapersonas").reset();
    } else {
    alert("Error: " + data.message);
    }
})
.catch(err => {
    console.error("Error:", err);
    alert("Error al conectar con el servidor");
});
});
