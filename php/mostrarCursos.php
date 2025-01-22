<?php
include 'conexion.php';

$sql = "SELECT * FROM curso";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row["nombre"] . " - <a href='editar_cursos_admin.php?id=" . $row["ID_curso"] . "'>Editar</a> | 
        <a href='php/eliminarCursos.php?id=" . $row["ID_curso"] . "'>Eliminar</a></li>";
    }
} else {
    echo "No hay cursos.";
}

mysqli_close($conn);
?>
