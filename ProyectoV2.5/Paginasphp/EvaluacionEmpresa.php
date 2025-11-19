<?php
session_start();
require_once __DIR__ . "/aplicacion/servicios/ServicioEmpresas.php";
require_once __DIR__ . "/aplicacion/servicios/ServicioPersonas.php";

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    
    $tipoEvaluacion = $_POST['tipoEvaluacion'] ?? '';
    $calificacion = (int)($_POST['calificacion'] ?? 0);
    $comentario = $_POST['comentario'] ?? '';

    $guardadoExitoso = false;
    
    try {
        if ($tipoEvaluacion === "empresa") {
            $id_entidad = (int)($_POST['id_empresa'] ?? null);
            
            $servicio = new ServicioEmpresas();
            $guardadoExitoso = $servicio->guardarEvaluacionEmpresa($id_entidad, $calificacion, $comentario);
            
        } elseif ($tipoEvaluacion === "persona") {
            $id_entidad = (int)($_POST['id_contrato'] ?? null);
            
            $servicio = new ServicioPersonas();
            $guardadoExitoso = $servicio->guardarEvaluacionPersona($id_entidad, $calificacion, $comentario);
        }

        
        if ($guardadoExitoso) {
            
            echo "La evaluación se ha guardado correctamente.";
            
            
            header("Location: ../index.php"); 
            #exit(); 
        } else {
            
            echo "Error: No se pudo completar el guardado. Verifique los datos.</p>";
        }

    } catch (Exception $e) {
        
        echo "<p style='color: red;'> Error en el sistema: " . $e->getMessage() . "</p>";
    }
}

$servicioEmpresas = new ServicioEmpresas();
$empresas = $servicioEmpresas->obtenerEmpresas();


$servicioPersonas = new ServicioPersonas(); 
$personas = $servicioPersonas->obtenerPersonas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "librerias.php"; ?>
    <meta charset="UTF-8">
    <title>Evaluar Empresa o Persona</title> 
    <link rel="stylesheet" href="../css/style3.css">
</head>
<body>
    <?php include "cabezal.php"; ?>
    <h1>Evaluación</h1>
    <div style="margin-bottom: 15px;"><?= $mensaje ?></div> 

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
            <select id="select_id_contrato" name="id_contrato">
            <option value="">Seleccione...</option>
                <?php foreach ($personas as $per): ?>
                    <option value="<?= $per['id_contrato'] ?>"><?= $per['nombre'] ?></option>
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