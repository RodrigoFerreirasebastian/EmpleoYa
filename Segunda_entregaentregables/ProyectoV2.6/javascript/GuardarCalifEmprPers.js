const tipoSelect = document.getElementById("tipoEvaluacion");
    const empresaCampos = document.getElementById("empresaCampos");
    const personaCampos = document.getElementById("personaCampos");

    tipoSelect.addEventListener("change", () => {
      if (tipoSelect.value === "empresa") {
        empresaCampos.style.display = "block";
        personaCampos.style.display = "none";
      } else if (tipoSelect.value === "persona") {
        personaCampos.style.display = "block";
        empresaCampos.style.display = "none";
      } else {
        empresaCampos.style.display = "none";
        personaCampos.style.display = "none";
      }
    });

    document.getElementById("formEvaluacion").addEventListener("submit", (e) => {
      e.preventDefault();

      const tipo = tipoSelect.value;
      const id_empresa = e.target.id_empresa.value || null;
      const id_usuario = e.target.id_usuario.value || null;
      const calificacion = e.target.calificacion.value;
      const comentario = e.target.comentario.value;

      // 🔹 Enviar datos al PHP
      fetch("./php/api.php", { // URL del script PHP
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
          id_empresa: id_empresa,
          id_usuario: id_usuario,
          comentario: comentario,
          calificacion: calificacion,
          tipo: tipo
        })
      })
      .then(res => res.text())
      .then(data => {
        if (data.trim() === "OK") {
          alert("Evaluación guardada correctamente en la base de datos.");
          e.target.reset();
        } else {
          alert("Error: " + data);
        }
      })
      .catch(err => alert("Error al enviar: " + err));
    });