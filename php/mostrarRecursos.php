<?php
include 'conexion.php';

$sql = "SELECT * FROM recurso";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row["nombre"] . " - <a href='editar_recursos.php?id=" . $row["ID_recurso"] . "'>Editar</a> | 
        <a href='php/eliminarRecursos.php?id=" . $row["ID_recurso"] . "'>Eliminar</a></li>";
    }
} else {
    echo "No hay recursos.";
}

mysqli_close($conn);
?>
