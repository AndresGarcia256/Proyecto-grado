<?php
include 'php/conexion.php';

if (isset($_GET['id'])) {
    $id_curso = $_GET['id'];

    $sql = "SELECT * FROM curso WHERE ID_curso = $id_curso";
    $result = mysqli_query($conn, $sql);
    $curso = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración cursos</title>
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
        <h2><br>Administración de cursos</h2>

        <section class="admin-actions">
            <div class="form-container">
                <h3>Editar curso: <?php echo $curso['nombre']; ?></h3>
                <form action="php/editarCursos.php?id=<?php echo $curso['ID_curso']; ?>" method="post">
                <label for="course-name">Nombre del curso:</label>
                <input type="text" name="nombreCurso" value="<?php echo $curso['nombre']; ?>" required>

                <label for="course-price">Precio:</label>
                <input type="text" name="precioCurso" value="<?php echo $curso['precio']; ?>" required>

                <label for="course-desc">Descripción:</label>
                <input type="text" name="descripcionCurso" value="<?php echo $curso['descripción']; ?>" required>

                <button type="submit">Actualizar curso</button>
            </form>

            </div>
            <!--  
            <div class="edit-course">
                <h3>Editar cursos existentes</h3>
                <ul>
                    <?php include 'php/mostrarCursos.php'; ?>
                </ul>
            </div>-->

            <div class="form-container">
                <h3>Agregar módulos</h3>
                <form action="php/editarCursos.php?id=<?php echo $curso['ID_curso']; ?>" method="post">
                <label for="mod-name">Nombre del módulo:</label>
                <input type="text" id="mod-name" name="nombreModulo" placeholder="Nombre del módulo" required>

                <label for="mod-desc">Descripción:</label>
                <input type="text" id="mod-dec" name="descripcionModulo" placeholder="Descripción del módulo" required>

                <label for="mod-image">Subir archivo:</label>
                <input type="file" id="mod-image" name="archivoModulo" required>

                <button type="submit">Actualizar curso</button>
            </form>
            </div>
        </section>
    </main>

</body>
</html>