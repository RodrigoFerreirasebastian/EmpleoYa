document.addEventListener("DOMContentLoaded", function() {
  fetch("") //cambialo cuando tengas el php es la ruta del php
    .then(res => res.json())
    .then(ofertas => {
      const tbody = document.querySelector("#tablaOfertasempresas tbody");
      tbody.innerHTML = ""; // borra los nombres de las tablas anteriores

      ofertas.forEach(o => {
        const fila = document.createElement("tr");
        fila.innerHTML = `
          <td>${o.titulo}</td>
          <td>${o.tipo_trabajo}</td>
          <td>${o.salario ? "$" + o.salario : "No especificado"}</td>
          <td>${o.email_contacto}</td>
          <td>${o.descripcion}</td>
          <td><button class="btn-aplicar">Aplicar</button></td>
        `;
        tbody.appendChild(fila);
      });
    })
    .catch(err => {
      console.error("Error al cargar ofertas de empresas:", err);
    });
});
