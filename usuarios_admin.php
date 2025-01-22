<?php
include 'php/conexion.php';

$registroExitoso = false;
$eliminacionExitosa = false;

// Verifica si se ha registrado un usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $nombre = $_POST['nombreUsuario'];
    $email = $_POST['correoUsuario'];
    $pass = $_POST['passwordUsuario'];

    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nombre, correo, contraseña) VALUES ('$nombre', '$email', '$hashedPassword')";
    if (mysqli_query($conn, $sql)) {
        $id_usuario = mysqli_insert_id($conn);
        $sql_estudiante = "INSERT INTO estudiante (ID_estudiante, fecha_registro) VALUES ('$id_usuario', NOW())";
        mysqli_query($conn, $sql_estudiante);  

        $registroExitoso = true; // Se establece que se registró exitosamente
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Verifica si se ha eliminado un usuario
if (isset($_GET['eliminado']) && $_GET['eliminado'] === 'exito') {
    $eliminacionExitosa = true;
}

// Código para obtener usuarios...
$sql = "SELECT * FROM usuario";
$result = mysqli_query($conn, $sql);
$usuarios = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mostrarAlertaRegistro() {
            Swal.fire({
                title: "Usuario registrado exitosamente",
                text: "El usuario ha sido añadido a la base de datos.",
                icon: "success"
            });
        }

        function confirmarEliminacion(id) {
            Swal.fire({
                title: "¿Está seguro que desea eliminarlo?",
                text: "Esta acción no se puede revertir",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Eliminar usuario"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirigir a la eliminación del usuario
                    window.location.href = "eliminar_usuario.php?id=" + id;
                }
            });
        }

        function mostrarAlertaEliminacion() {
            Swal.fire({
                title: "Usuario eliminado",
                text: "El usuario ha sido eliminado exitosamente.",
                icon: "success"
            });
        }
    </script>
</head>
<body>
    <div class="encabezado">
        <div class="logoAzul">
            <a href="usuarios_admin.php"><img src="img/azul_logo_loto.png" alt="Logo de loto"></a>
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
        <h2><br>Administración de usuarios</h2>

        <section class="admin-actions">
            <div class="form-container">
                <h3>Registrar nuevo usuario</h3>
                <form action="" method="post">
                    <label for="nombreUsuario">Nombre:</label>
                    <input type="text" id="nombreUsuario" name="nombreUsuario" required>

                    <label for="correoUsuario">Correo:</label>
                    <input type="email" id="correoUsuario" name="correoUsuario" required>

                    <label for="contraseñaUsuario">Contraseña:</label>
                    <input type="password" id="contraseñaUsuario" name="passwordUsuario" required>

                    <button type="submit" name="register">Registrar usuario</button>
                </form>
            </div>
            
            <div class="edit-course">
                <h3>Usuarios registrados</h3>
                <ul>
                    <?php foreach ($usuarios as $usuario): ?>
                        <li>
                            <?php echo htmlspecialchars($usuario['nombre']); ?> - 
                            <a href="editarUsuarios.php?id=<?php echo $usuario['ID_usuario']; ?>">Editar</a> | 
                            <a href="#" onclick="confirmarEliminacion(<?php echo $usuario['ID_usuario']; ?>)">Eliminar</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </main>

    <?php if ($registroExitoso): ?>
        <script>
            mostrarAlertaRegistro();
        </script>
    <?php endif; ?>

    <?php if ($eliminacionExitosa): ?>
        <script>
            mostrarAlertaEliminacion();
        </script>
    <?php endif; ?>

</body>
</html>
