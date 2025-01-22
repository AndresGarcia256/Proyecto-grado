<?php
include 'php/conexion.php';


if (isset($_GET['id'])) {
    $id_recurso = $_GET['id']; 
    $sql = "SELECT * FROM recurso WHERE ID_recurso = $id_recurso"; 
    $result = mysqli_query($conn, $sql);
    $recurso = mysqli_fetch_assoc($result);
    
} else {
    echo "ID de recurso no especificado.";
}

mysqli_close($conn);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración recursos</title>
    <link rel="shortcut icon" href="img/flor_azul.png">
    <link rel="stylesheet" href="css/estilos_admin_recursos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
</head>
<body>

    <div class="encabezado">
        <div class="logoAzul">
            <a href="recursos_admin.php"><img src="img/azul_logo_loto.png" alt="Logo de loto"></a>
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
        <h2><br>Administración de recursos</h2>

        <section class="admin-actions">
            <div class="form-container">
                <h3>Editar recurso: <?php echo $recurso['nombre']; ?></h3>
                <form action="php/editarRecursos.php?id=<?php echo $recurso['ID_recurso']; ?>" method="post">
                <label for="course-name">Nombre del curso:</label>
                <input type="text" name="nombreRecurso" value="<?php echo $recurso['nombre']; ?>" required>

                <label for="resource-type">Tipo de recurso:</label>
                <select id="resource-type" name="tipoRecurso" required>
                    <option value="documento" <?php echo ($recurso['tipo_recurso'] == 'documento') ? 'selected' : ''; ?>>Documento</option>
                    <option value="código" <?php echo ($recurso['tipo_recurso'] == 'código') ? 'selected' : ''; ?>>Código</option>
                    <option value="video" <?php echo ($recurso['tipo_recurso'] == 'video') ? 'selected' : ''; ?>>Video</option>
                </select>

                <label for="course-desc">Descripción:</label>
                <input type="text" name="descripcionRecurso" value="<?php echo $recurso['descripción']; ?>" required>

                <button type="submit">Actualizar recurso</button>
            </form>

            </div>
              
            <div class="edit-resource">
                <h3>Editar cursos existentes</h3>
                <ul>
                    <?php include 'php/mostrarRecursos.php'; ?>
                </ul>
            </div>

        </section>
    </main>

</body>
</html>