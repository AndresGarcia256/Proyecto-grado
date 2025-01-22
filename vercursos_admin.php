<?php
include 'php/conexion.php';
session_start();

if (!isset($_SESSION['ID_usuario']) || $_SESSION['tipo_usuario'] != 'admin') {
    die("Acceso denegado. Solo los administradores pueden ver esta página.");
}

// Obtener los cursos y sus módulos
$sqlCursos = "SELECT * FROM curso";
$resultCursos = mysqli_query($conn, $sqlCursos);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización cursos</title>
    <link rel="shortcut icon" href="img/flor_azul.png">
    <link rel="stylesheet" href="css/estilos_admin_cursos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
</head>
<body>

<div class="encabezado">
        <div class="logoAzul">
            <a href="cursos_admin.php"><img src="img/azul_logo_loto.png" alt="Logo de loto"></a>
        </div>

        <nav class="recursosCursos">
            <a href="cursos_admin.php">Mis cursos</a>
            <a href="recursos_admin.php">Mis recursos</a>
            <a href="usuarios_admin.php">Usuarios</a>
        </nav>


        <nav class="registroInicio">
            <a href="perfil_admin.php" class="regis_boton">Mi perfil</a>
            <a href="index.php" class="inic_boton">Salir</a>
        </nav>
    </div>

<main class="admin-panel">
    <h2>Lista de Cursos</h2>

    <?php if (mysqli_num_rows($resultCursos) > 0): ?>
        <ul>
            <?php while ($curso = mysqli_fetch_assoc($resultCursos)): ?>
                <li>
                    <h3><?php echo $curso['nombre']; ?></h3>
                    <p>Descripción: <?php echo $curso['descripción']; ?></p>
                    <p>Precio: $<?php echo $curso['precio']; ?></p>

                    <h4>Módulos:</h4>
                    <?php
                    $idCurso = $curso['ID_curso'];
                    $sqlModulos = "SELECT * FROM modulo WHERE ID_curso = $idCurso";
                    $resultModulos = mysqli_query($conn, $sqlModulos);
                    ?>
                    <ul>
                        <?php if (mysqli_num_rows($resultModulos) > 0): ?>
                            <?php while ($modulo = mysqli_fetch_assoc($resultModulos)): ?>
                                <li>
                                    <strong><?php echo $modulo['nombre']; ?></strong><br>
                                    Descripción: <?php echo $modulo['descripción']; ?><br>
                                    <a href="<?php echo $modulo['archivo']; ?>" target="_blank">Ver Archivo (Video)</a>
                                </li>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <li>No hay módulos para este curso.</li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No hay cursos disponibles.</p>
    <?php endif; ?>

</main>

</body>
</html>
