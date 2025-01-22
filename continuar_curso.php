<?php
include 'php/conexion.php'; 

$id_curso = isset($_GET['id_curso']) ? $_GET['id_curso'] : null;


$sql = "SELECT * FROM curso WHERE ID_curso = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_curso);
$stmt->execute();
$result = $stmt->get_result();

$curso = $result->fetch_assoc(); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curso['nombre']; ?></title>
    <link rel="shortcut icon" href="img/flor_azul.png">
    <link rel="stylesheet" href="css/estilos_detalle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="encabezado" >

        <div class="logoAzul">
            <a href="mis_cursos.php"><img src="img/azul_logo_loto.png" alt="Logo de loto"></a>
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

   <br>
    <div class="curso-detalle">
    <h1><?php echo htmlspecialchars($curso['nombre']); ?></h1>
        <div class="detalle-d">
            <img src="img/<?php echo htmlspecialchars($curso['archivo']); ?>" alt="Curso de <?php echo htmlspecialchars($curso['nombre']); ?>">
            <div class="dos">
            <p><strong>Descripción:</strong> <?php echo nl2br(htmlspecialchars($curso['descripción'])); ?></p>
               
            </div>
        </div>
        <div class="modulos">
            <h2>Módulos</h2>
            <?php
            
            $sql_modulos = "SELECT nombre, descripción, archivo FROM modulo WHERE ID_curso = $id_curso"; 
            $result_modulos = mysqli_query($conn, $sql_modulos);

            if (mysqli_num_rows($result_modulos) > 0) {
                echo '<ul>';
                $modulo_numero = 1;
                while ($modulo = mysqli_fetch_assoc($result_modulos)) {
                    echo '<li>';
                    echo '<strong>Módulo ' . $modulo_numero . ': </strong>'. htmlspecialchars($modulo['nombre']) ;
                    echo '</li>';
                    $modulo_numero++;
                }
                echo '</ul>';
            } else {
                echo 'No hay módulos disponibles para este curso.';
            }
            ?>
            </div>
        </div>
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