<?php
header("Content-Type: application/json; charset=utf-8");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conexion = mysqli_connect("localhost", "root", "568888939rfgs", "empleaya");

if ($conexion) {
    echo "Conexión exitosa a la base de datos<br>";
} else {
    echo "Error de conexión: " . mysqli_connect_error();
}

$ruta = "C:\\Users\\ampp2\\Desktop\\proyecto\\EmpleoYa\\BaseDatosExp\\Basedatos\\";

$archivos = [
    "empleaya_contratar_personal.sql",
    "empleaya_cv.sql",
    "empleaya_empresa.sql",
    "empleaya_evaluacion_empresa.sql",
    "empleaya_oferta.sql",
    "empleaya_postulacion.sql",
    "empleaya_usuario.sql"
];

foreach ($archivos as $archivo) {
    $rutaArchivo = $ruta . $archivo;

    if (!file_exists($rutaArchivo)) {
        echo "No se encontró el archivo: $archivo<br>";
        continue;
    }

    $sql = file_get_contents($rutaArchivo);

    echo "<b>Importando:</b> $archivo ... ";

    if (mysqli_multi_query($conexion, $sql)) {
        do {
            if ($resultado = mysqli_store_result($conexion)) {
                mysqli_free_result($resultado);
            }
        } while (mysqli_more_results($conexion) && mysqli_next_result($conexion));
        echo "Importado correctamente<br>";
    } else {
        echo "Error al importar $archivo: " . mysqli_error($conexion) . "<br>";
    }
}

$conexion->set_charset("utf8mb4");
$action = $_GET['action'] ?? '';
if ($action === '') {
    echo json_encode(["ok" => false, "msg" => "No se especificó ninguna acción"]);
    exit;
}

if ($action === 'login') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        echo json_encode(["ok" => false, "msg" => "Faltan credenciales"]);
        exit;
    }

    $stmt = $conexion->prepare("SELECT id_usuario, nombre, apellido, email, password_hash FROM usuario WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        echo json_encode(["ok" => false, "msg" => "Email o contraseña incorrectos"]);
        exit;
    }

    unset($user['password_hash']);
    echo json_encode(["ok" => true, "user" => $user]);
    exit;
}

if ($action === 'guardar_cv') {
    $id_usuario  = $_POST['id_usuario'] ?? null;
    $titulo      = $_POST['titulo'] ?? '';
    $resumen     = $_POST['resumen'] ?? '';
    $experiencia = $_POST['experiencia'] ?? '';
    $educacion   = $_POST['educacion'] ?? '';
    $habilidades = $_POST['habilidades'] ?? '';

    if (!$id_usuario || !$titulo) {
        echo json_encode(["ok" => false, "msg" => "Faltan datos obligatorios"]);
        exit;
    }

    $sql = "INSERT INTO cv (id_usuario, titulo, resumen, experiencia, educacion, habilidades)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("isssss", $id_usuario, $titulo, $resumen, $experiencia, $educacion, $habilidades);
    $stmt->execute();

    echo json_encode(["ok" => true, "msg" => "CV guardado", "id_cv" => $stmt->insert_id]);
    exit;
}

if ($action === 'publicar_empresa') {
    $id_empresa    = $_POST['id_empresa'] ?? null;
    $titulo        = $_POST['titulo'] ?? '';
    $salario       = $_POST['salario'] ?? null;
    $tipo_trabajo  = $_POST['tipo_trabajo'] ?? '';
    $email_contacto= $_POST['email_contacto'] ?? '';
    $descripcion   = $_POST['descripcion'] ?? '';

    if (!$id_empresa || !$titulo) {
        echo json_encode(["ok" => false, "msg" => "Datos incompletos"]);
        exit;
    }

    $sql = "INSERT INTO oferta (id_empresa, titulo, salario, tipo_trabajo, email_contacto, descripcion)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("isdsss", $id_empresa, $titulo, $salario, $tipo_trabajo, $email_contacto, $descripcion);
    $stmt->execute();

    echo json_encode(["ok" => true, "msg" => "Oferta publicada", "id_oferta" => $stmt->insert_id]);
    exit;
}

if ($action === 'publicar_persona') {
    $id_empresa     = $_POST['id_empresa'] ?? null;
    $titulo         = $_POST['titulo'] ?? '';
    $salario        = $_POST['salario'] ?? null;
    $tipo_trabajo   = $_POST['tipo_trabajo'] ?? '';
    $email_contacto = $_POST['email_contacto'] ?? '';
    $tel_contacto   = $_POST['tel_contacto'] ?? '';
    $descripcion    = $_POST['descripcion'] ?? '';

    if (!$id_empresa || !$titulo) {
        echo json_encode(["ok" => false, "msg" => "Faltan datos"]);
        exit;
    }

    $sql = "INSERT INTO contratar_personal (id_empresa, titulo, salario, tipo_trabajo, email_contacto, tel_contacto, descripcion)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("isdssss", $id_empresa, $titulo, $salario, $tipo_trabajo, $email_contacto, $tel_contacto, $descripcion);
    $stmt->execute();

    echo json_encode(["ok" => true, "msg" => "Publicación creada", "id_contrato" => $stmt->insert_id]);
    exit;
}

if ($action === 'buscar_ofertas') {
    $q = $_GET['q'] ?? '';
    $tipo = $_GET['tipo'] ?? '';
    $loc = $_GET['loc'] ?? '';

    $sql = "SELECT c.id_contrato, c.titulo, c.salario, c.tipo_trabajo, c.email_contacto, c.tel_contacto, c.descripcion,
                   e.id_empresa, e.nombre AS empresa, e.localidad
            FROM contratar_personal c
            LEFT JOIN empresa e ON c.id_empresa = e.id_empresa
            WHERE 1=1";

    $params = []; $types = "";

    if ($q) { $sql .= " AND (c.titulo LIKE CONCAT('%',?,'%') OR c.descripcion LIKE CONCAT('%',?,'%'))"; $params[]=$q; $params[]=$q; $types.="ss"; }
    if ($tipo) { $sql .= " AND c.tipo_trabajo = ?"; $params[]=$tipo; $types.="s"; }
    if ($loc) { $sql .= " AND e.localidad = ?"; $params[]=$loc; $types.="s"; }

    $sql .= " ORDER BY c.id_contrato DESC LIMIT 50";

    $stmt = $conexion->prepare($sql);
    if ($params) { $stmt->bind_param($types, ...$params); }
    $stmt->execute();
    $res = $stmt->get_result();

    echo json_encode(["ok" => true, "data" => $res->fetch_all(MYSQLI_ASSOC)]);
    exit;
}

if ($action === 'buscar_candidatos') {
    $q = $_GET['q'] ?? '';

    $sql = "SELECT cv.id_cv, cv.titulo, cv.resumen, cv.experiencia, cv.educacion, cv.habilidades, cv.fecha_creacion,
                   u.id_usuario, u.nombre, u.apellido, u.email, u.telefono, u.localidad
            FROM cv
            LEFT JOIN usuario u ON u.id_usuario = cv.id_usuario
            WHERE 1=1";

    $params = []; $types = "";
    if ($q) {
        $sql .= " AND (cv.titulo LIKE CONCAT('%',?,'%') OR cv.habilidades LIKE CONCAT('%',?,'%') OR cv.resumen LIKE CONCAT('%',?,'%'))";
        $params = [$q, $q, $q];
        $types = "sss";
    }

    $sql .= " ORDER BY cv.id_cv DESC LIMIT 50";
    $stmt = $conexion->prepare($sql);
    if ($params) { $stmt->bind_param($types, ...$params); }
    $stmt->execute();
    $res = $stmt->get_result();

    echo json_encode(["ok" => true, "data" => $res->fetch_all(MYSQLI_ASSOC)]);
    exit;
}

if ($action === 'evaluar_empresa') {
    $id_empresa  = $_POST['id_empresa'] ?? null;
    $id_usuario  = $_POST['id_usuario'] ?? null;
    $comentario  = $_POST['comentario'] ?? '';
    $calificacion= (int)($_POST['calificacion'] ?? 0);

    if (!$id_empresa || !$id_usuario || $calificacion < 1 || $calificacion > 5) {
        echo json_encode(["ok" => false, "msg" => "Datos inválidos"]);
        exit;
    }

    $sql = "INSERT INTO evaluacion_empresa (id_empresa, id_usuario, comentario, calificacion)
            VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iisi", $id_empresa, $id_usuario, $comentario, $calificacion);
    $stmt->execute();

    echo json_encode(["ok" => true, "msg" => "Evaluación guardada", "id_evaluacion" => $stmt->insert_id]);
    exit;
}

echo json_encode(["ok" => false, "msg" => "Acción no válida o no implementada"]);
?>
