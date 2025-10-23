<?php
include "../conexion/conexion.php"; 

$mensaje = ''; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    $tipo         = $conn->real_escape_string($_POST["tipoEvaluacion"] ?? null);
    $id_empresa   = $conn->real_escape_string($_POST["id_empresa"] ?? null);
    $id_usuario   = $conn->real_escape_string($_POST["id_usuario"] ?? null);
    $calificacion = $conn->real_escape_string($_POST["calificacion"] ?? null);
    $comentario   = $conn->real_escape_string($_POST["comentario"] ?? ''); 

    
    if (empty($tipo) || empty($calificacion)) {
        $mensaje = '<p style="color:red;">Error: El tipo de evaluación y la calificación son obligatorios.</p>';
    } else {
        $sql = ""; 
        $success = false;
        
        if ($tipo === "empresa" && !empty($id_empresa)) {
            $sql = "INSERT INTO evaluacion_empresa (id_empresa, calificacion, comentario)
                    VALUES ('$id_empresa', '$calificacion', '$comentario')";
            $success = true;
        } elseif ($tipo === "persona" && !empty($id_usuario)) {
            $sql = "INSERT INTO evaluacione_persona (id_usuario, calificacion, comentario)
                    VALUES ('$id_usuario', '$calificacion', '$comentario')";
            $success = true;
        } else {
            $mensaje = '<p style="color:red;">Error: ID de empresa o usuario no proporcionado para el tipo seleccionado.</p>';
        }

        
        if ($success && $conn->query($sql) === TRUE) {
            $mensaje = '<p style="color:green;">Evaluación guardada correctamente.</p>';
        } elseif ($success) {
            $mensaje = '<p style="color:red;">Error al guardar en la base de datos: ' . $conn->error . '</p>';
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación de Empresa o Persona</title>
    <link rel="stylesheet" href="../css/style3.css">
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const tipoSelect = document.getElementById("tipoEvaluacion");
        const empresaCampos = document.getElementById("empresaCampos");
        const personaCampos = document.getElementById("personaCampos");

        tipoSelect.addEventListener("change", () => {
            if (tipoSelect.value === "empresa") {
                empresaCampos.style.display = "block";
                personaCampos.style.display = "none";
                document.getElementById("id_usuario").value = "";
            } else if (tipoSelect.value === "persona") {
                personaCampos.style.display = "block";
                empresaCampos.style.display = "none";
                document.getElementById("id_empresa").value = "";
            } else {
                empresaCampos.style.display = "none";
                personaCampos.style.display = "none";
                document.getElementById("id_empresa").value = "";
                document.getElementById("id_usuario").value = "";
            }
        });
        
        tipoSelect.dispatchEvent(new Event('change'));
    });
    </script>
</head>
<body>
    <h1>Evaluar Empresa o Persona</h1>
    <?php echo $mensaje; ?>

    <form id="formEvaluacion" method="POST" action=""> 
        <label>Tipo de evaluación:</label>
        <select id="tipoEvaluacion" name="tipoEvaluacion" required>
            <option value="">Seleccionar...</option>
            <option value="empresa">Empresa</option>
            <option value="persona">Persona</option>
        </select><br>

        <div id="empresaCampos" style="display:none;">
            <label>ID Empresa:</label>
            <input type="number" name="id_empresa" id="id_empresa"><br>
        </div>

        <div id="personaCampos" style="display:none;">
            <label>ID Usuario:</label>
            <input type="number" name="id_usuario" id="id_usuario"><br>
        </div>

        <label>Calificación (1-5):</label>
        <input type="number" name="calificacion" min="1" max="5" id="calificacion" required><br>

        <label>Comentario:</label><br>
        <textarea name="comentario" rows="4" cols="50"></textarea><br>

        <button type="submit" id="btnEnviar">Guardar Evaluación</button>
    </form>
</body>
</html>