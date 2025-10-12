document.addEventListener("DOMContentLoaded", function() {
  fetch("./php/mostrarOfertasPER.php") //cambialo cuando tengas el php es la ruta del php
    .then(res => res.json())
    .then(contratar_personal => {
    const tbody = document.querySelector("#tablaOfertaspersonas tbody");
      tbody.innerHTML = ""; // borra los nombres de las tablas anteriores

    contratar_personal.forEach(o => {
        const fila = document.createElement("tr");
        fila.innerHTML = `
        <td>${contratar_personal.titulo}</td>
        <td>${contratar_personal.tipo_trabajo}</td>
        <td>${contratar_personal.salario ? "$" + contratar_personal.salario : "No especificado"}</td>
        <td>${contratar_personal.email_contacto}</td>
        <td>${contratar_personal.descripcion}</td>
        <td><button class="btn-aplicar">Aplicar</button></td>
        `;
        tbody.appendChild(fila);
    });
    })
    .catch(err => {
    console.error("Error al cargar ofertas de personas:", err);
    }); 
});
