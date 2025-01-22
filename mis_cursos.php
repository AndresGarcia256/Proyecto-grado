<?php
session_start();
include 'php/conexion.php';

if (!isset($_SESSION["id_estudiante"])) {
    echo "Error: ID de estudiante no definido.";
    exit;
}

$id_estudiante = $_SESSION["id_estudiante"];

$sql = "SELECT  c.ID_curso,c.nombre, c.archivo
        FROM progreso p
        JOIN curso c ON p.ID_curso = c.ID_curso
        WHERE p.ID_estudiante = ? AND p.porcentaje_completado = 100";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_estudiante);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos terminados</title>
    <link rel="shortcut icon" href="img/flor_azul.png">
    <link rel="stylesheet" href="css/estilos_user.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="encabezado" >
        <div class="logoAzul">
            <a href="cursos_usuario.php"><img src="img/azul_logo_loto.png" alt="Logo de loto"></a>
        </div>

        <nav class="recursosCursos">
            <a href="cursos_usuario.php">Catálogo</a>
            <a href="mis_cursos_proceso.php">Mis cursos</a>
            <a href="recursos_usuario.php">Recursos</a>
        </nav>

        <div id="barraBusqueda">
            <input type="text" id="imputSearch" placeholder="¿Qué deseas buscar?">
        </div>

        <nav class="registroInicio">
            <a href="perfil.php" class="regis_boton">Mi perfil</a>
            <a href="index.php" class="inic_boton">Salir</a>
            
        </nav>
    </div>
<br><br><br><br><br><br>
    <div class="miscursos">
        <h2>Cursos terminados</h2>
        <div class="botones">
            <a href="mis_cursos_proceso.php" class="btnEnProceso">Cursos en proceso</a>
            <a href="mis_cursos.php" class="btnTerminados">Cursos terminados</a>
        </div>
    </div>
    <div class="cursosProgramacion">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="curso">
            <h3><?php echo htmlspecialchars($row['nombre']); ?></h3>
            <img src="uploads/<?php echo htmlspecialchars($row['archivo']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>">
            <a href="certificado.php?id_curso=<?php echo urlencode($row['nombre']); ?>"><button>Descargar certificado</button></a>
        </div>
    <?php } ?>
</div>
<?php
$stmt->close();
$conn->close();
?>
</body>
<footer>
    <img src="img/blanco_logo_loto.png" class="logo_blanco">
    <div class="agrup">
        <div class="lotof">
            <strong><p>Loto</p></strong><br>
            <p>Nosotros</p>
            <p>Contáctanos</p>
        </div>
        <div class="recursosf">
            <strong><p></a>Recursos</p></strong><br>
            <p>Artículos y publicaciones</p>
            <p>Proyectos destacados</p>
            <p>Bases de datos</p>
            <p>Descargables</p>
        </div>
        <div class="avisosf">
            <strong><p>Avisos legales</p></strong><br>
            <p>Política de privacidad</p>
            <p>Política de cookies</p>
            <p>Términos y condiciones</p>
        </div>
        <div class="imagen_flor">
            <img src="img/flor_blanco.png" class="flor_blanca">
        </div>
    </div>
    <strong><p class="cond">© 2024 Loto - Todos los derechos reservados.</p></strong><br>
</footer>
</html>