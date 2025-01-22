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
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const mensaje = urlParams.get('mensaje');

        if (mensaje === 'curso_registrado') {
            Swal.fire({
                title: 'Curso registrado correctamente',
                text: 'El curso ha sido añadido a la base de datos.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        } else if (mensaje === 'curso_actualizado') {
            Swal.fire({
                title: 'Curso actualizado correctamente',
                text: 'El curso ha sido actualizado en la base de datos.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        } else if (mensaje === 'modulo_registrado') {
            Swal.fire({
                title: 'Módulo actualizado correctamente',
                text: 'El módulo ha sido actualizado en la base de datos.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        } else if (mensaje === 'curso_eliminado') {
            Swal.fire({
            title: "¿Está seguro que desea eliminarlo?",
            text: "Esta acción no se puede revertir",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Eliminar curso"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                title: "Curso eliminado",
                text: "El curso ha sido eliminado exitosamente.",
                icon: "success"
            });
                window.location.href = "php/eliminarCursos.php?id=" + id + "&mensaje=curso_eliminado";
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
        <h2><br>Administración de cursos</h2>

        <section class="admin-actions">
            <div class="form-container">
                <h3>Subir nuevo curso</h3>
                <form action="php/subirCursos.php" method="post" enctype="multipart/form-data">
                    <label for="course-name">Nombre del curso:</label>
                    <input type="text" id="course-name" placeholder="Nombre del curso" name="nombreCurso" required>

                    <label for="course-price">Precio:</label>
                    <input type="text" id="course-price" placeholder="Precio del curso" name="precioCurso" required>

                    <label for="course-desc">Descripción:</label>
                    <input type="text" id="course-price" placeholder="Descripción del curso" name="descripcionCurso" required>

                    <label for="course-image">Subir archivo:</label>
                    <input type="file" id="course-image" name="archivoCurso" required>

                    <button type="submit">Subir curso</button>
                </form>
            </div>

            <div class="edit-course">
                <h3>Editar cursos existentes</h3>
                <ul>
                    <?php include 'php/mostrarCursos.php'; ?>
                </ul>
                
            </div>
        </section>
    </main>

</body>
</html>