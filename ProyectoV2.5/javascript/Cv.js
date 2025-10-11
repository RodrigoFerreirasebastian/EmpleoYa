document.getElementById("formCV").addEventListener("submit", (e) => {
    e.preventDefault();

    const datos = new URLSearchParams(new FormData(e.target));

    fetch("", { // url del php 
        method: "POST",
        body: datos
    })
    .then(res => res.text())
    .then(data => {
        if (data.trim() === "OK") {
        alert("CV creado correctamente.");
        e.target.reset();
        } else {
        alert("Error: " + data);
        }
    })
    .catch(err => alert("Error al conectar: " + err));
    });