<?php
session_start();

require_once __DIR__ . "/aplicacion/servicios/ServicioEmpresas.php";


$servicioEmpresas = new ServicioEmpresas();
$empresas = $servicioEmpresas->obtenerEmpresas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evaluar Empresa o Persona</title>
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
    <h1>Evaluación</h1>
    <?= $mensaje ?>

    <form method="POST">
        <label>Tipo de evaluación:</label>
        <select id="tipoEvaluacion" name="tipoEvaluacion" required>
            <option value="">Seleccionar...</option>
            <option value="empresa">Empresa</option>
            <option value="persona">Persona</option>
        </select><br>

        <div id="empresaCampos" style="display:none;">
            <label>Empresa:</label>
            <select id="select_id_empresa" name="id_empresa">
                <option value="">Seleccione...</option>
                <?php foreach ($empresas as $emp): ?>
                    <option value="<?= $emp['id_empresa'] ?>"><?= $emp['nombre'] ?></option>
                <?php endforeach; ?>
            </select><br>
        </div>

        <div id="personaCampos" style="display:none;">
            <label>Persona:</label>
            <select id="select_id_usuario" name="id_usuario">
                <option value="">Seleccione...</option>
                <?php foreach ($personas as $per): ?>
                    <option value="<?= $per['id'] ?>"><?= $per['nombre'] ?></option>
                <?php endforeach; ?>
            </select><br>
        </div>

        <label>Calificación (1-5):</label>
        <input type="number" name="calificacion" min="1" max="5" required><br>

        <label>Comentario:</label><br>
        <textarea name="comentario"></textarea><br>

        <button type="submit">Guardar</button>
    </form>

<script>
document.getElementById("tipoEvaluacion").addEventListener("change", function() {
    let tipo = this.value;
    document.getElementById("empresaCampos").style.display = tipo === "empresa" ? "block" : "none";
    document.getElementById("personaCampos").style.display = tipo === "persona" ? "block" : "none";
});
</script>

</body>
</html>
