<?php
include 'php/conexion.php';

$actualizacionExitosa = false;
$eliminacionExitosa = false;

if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Obtener datos del usuario
    $sql = "SELECT * FROM usuario WHERE ID_usuario = '$idUsuario'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Actualizar usuario
    $nombre = $_POST['nombreUsuario'];
    $email = $_POST['correoUsuario'];
    $password = password_hash($_POST['contraseñaUsuario'], PASSWORD_DEFAULT);

    $sql = "UPDATE usuario SET nombre='$nombre', correo='$email', contraseña='$password' WHERE ID_usuario='$idUsuario'";
    
    if (mysqli_query($conn, $sql)) {
        $actualizacionExitosa = true;
        header("Location: editarUsuarios.php?id=$idUsuario&actualizacion=exito");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_GET['actualizacion']) && $_GET['actualizacion'] === 'exito') {
    $actualizacionExitosa = true;
}

if (isset($_GET['eliminado']) && $_GET['eliminado'] === 'exito') {
    $eliminacionExitosa = true;
}

$sql = "SELECT * FROM usuario";
$result = mysqli_query($conn, $sql);
$usuarios = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración usuarios</title>
    <link rel="shortcut icon" href="img/flor_azul.png">
    <link rel="stylesheet" href="css/estilos_admin_cursos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mostrarAlertaActualizacion() {
            Swal.fire({
                title: "Usuario actualizado exitosamente",
                text: "El usuario ha sido actualizado en la base de datos.",
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

        function validarFormulario() {
        const nombre = document.getElementById('nombreUsuario').value.trim();
        const correo = document.getElementById('correoUsuario').value.trim();
        const contraseña = document.getElementById('contraseñaUsuario').value.trim();

        if (nombre === '' || correo === '' || contraseña === '') {
            Swal.fire({
                title: 'Campos vacíos',
                text: 'Por favor, complete todos los campos.',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            });
            return false; // Evita que se envíe el formulario
        }

        return true; // Permite que se envíe el formulario
    }
    </script>

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
        <h2><br>Administración de usuarios</h2>

    <section class="admin-actions">
    <div class="form-container">

    <h3>Editar usuario: <?php echo htmlspecialchars($usuario['nombre']); ?></h3>
    <form action="" method="post" onsubmit="return validarFormulario()">
        <label for="nombreUsuario">Nombre:</label>
        <input type="text" id="nombreUsuario" name="nombreUsuario" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>

        <label for="correoUsuario">Correo:</label>
        <input type="email" id="correoUsuario" name="correoUsuario" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required>

        <label for="contraseñaUsuario">Contraseña:</label>
        <input type="password" id="contraseñaUsuario" name="contraseñaUsuario" required>

        <button type="submit">Actualizar usuario</button>
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

    <?php if ($actualizacionExitosa): ?>
            <script>
                mostrarAlertaActualizacion();
            </script>
        <?php endif; ?>

        <?php if ($eliminacionExitosa): ?>
            <script>
                mostrarAlertaEliminacion();
            </script>
        <?php endif; ?>
</body>
</html>
