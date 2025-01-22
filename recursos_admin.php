<!DOCTYPE html>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const mensaje = urlParams.get('mensaje');

        if (mensaje === 'recurso_registrado') {
            Swal.fire({
                title: 'Reurso registrado correctamente',
                text: 'El recurso ha sido añadido a la base de datos.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        } else if (mensaje === 'recurso_actualizado') {
            Swal.fire({
                title: 'Recurso actualizado correctamente',
                text: 'El recurso ha sido actualizado en la base de datos.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        } else if (mensaje === 'recurso_eliminado') {
            Swal.fire({
            title: "¿Está seguro que desea eliminarlo?",
            text: "Esta acción no se puede revertir",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Eliminar recurso"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                title: "Recurso eliminado",
                text: "El recurso ha sido eliminado exitosamente.",
                icon: "success"
            });
                window.location.href = "php/eliminarRecursos.php?id=" + id + "&mensaje=recurso_eliminado";
            }
        });
        }
    });

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
        <h2><br>Administración de recursos</h2>

        <section class="admin-actions">
            <div class="form-container">
                <h3>Subir nuevo recurso</h3>
                <form action="php/subirRecursos.php" method="post" enctype="multipart/form-data">
                    <label for="resource-name">Nombre del recurso:</label>
                    <input type="text" id="resource-name" name="nombreRecurso" placeholder="Nombre del recurso" required>

                    <label for="resource-type">Tipo de recurso:</label>
                    <select id="resource-type" name="tipoRecurso" required>
                        <option value="documento">Documento</option>
                        <option value="video">Código</option>
                        <option value="archivo">Video</option>
                    </select>

                    <label for="course-desc">Descripción:</label>
                    <input type="text" id="course-price" name="descripcionRecurso" placeholder="Descripción del recurso" required>

                    <label for="resource-file">Subir archivo:</label>
                    <input type="file" id="resource-file" name="archivoRecurso" required>

                    <button type="submit">Subir recurso</button>
                </form>
            </div>

            <div class="edit-resource">
                <h3>Editar recursos existentes</h3>
                <ul>
                    <?php include 'php/mostrarRecursos.php'; ?>
                </ul>
            </div>
        </section>
    </main>

</body>
</html>
