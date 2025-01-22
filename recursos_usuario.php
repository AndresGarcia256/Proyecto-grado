<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="shortcut icon" href="img/flor_azul.png">
    <link rel="stylesheet" href="css/estilos_cursos.css">
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

    <main>
    <aside class="barraLateral"><br>
            <h3>Categorías</h3>
            <ul>
                <li><a href="#codigo">Código</a></li>
                <li><a href="#documentos">Documentos</a></li>
                <li><a href="#video">Videos</a></li>
                <li><a href="#tutorial">Tutoriales</a></li>
        </aside>
        <div class="cursosProgramacion"><br><br><br><br><br>
        <h2 class="tituloPrg" id="programacion">Tus recursos</h2> 
            <?php
            include 'php/conexion.php'; 
            $sql = "SELECT * FROM recurso"; 
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($recurso = mysqli_fetch_assoc($result)) {
                    echo '<div class="curso">';
                    echo '<h3>' . htmlspecialchars($recurso['nombre']) . '</h3>'; 
                    echo '<a href=""><button>Descargar</button></a>';
                    echo '</div>';

                    //echo '<img src="img/' . htmlspecialchars($curso['archivo']) . '" alt="' . htmlspecialchars($curso['nombre']) . '">'; 
                    //echo '<a href="pago.php"><button>Añadir al carrito</button></a>';
                    //echo '</div>';
                }
            } else {
                echo '<p>No hay cursos disponibles.</p>';
            }
            mysqli_close($conn);
            ?>
        </div>
    </main>

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