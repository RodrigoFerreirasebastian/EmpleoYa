

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publicar Oferta Busqueda Personal</title>
  <link rel="stylesheet" href="../css/style3.css">

  <?php include "librerias.php" ?>
</head>
<body>
  <?php include "cabezal.php" ?>  

  <h1>Publicar Nueva Oferta Busqueda Personas</h1>


  <form method="POST" action="/proyectov2.5/Paginasphp/aplicacion/presentacion/GuardarOfertaPer.php">
    <label>Nombre Persona:</label>
    <input type="text" name="nombre" required><br>

    <label>Título:</label>
    <input type="text" name="titulo" required><br>

    <label>Salario:</label>
    <input type="number" name="salario" step="0.01"><br>

    <label>Tipo de trabajo:</label>
    <input type="text" name="tipo_trabajo" required><br>

    <label>Email de contacto:</label>
    <input type="email" name="email_contacto" required><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion" rows="4" cols="50" required></textarea><br>

    <button type="submit">Guardar Oferta</button>
  </form>
</body>
</html>
