<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id_curso = $_GET['id'];

    $sql_modulos = "DELETE FROM modulo WHERE ID_curso = $id_curso";
    if (mysqli_query($conn, $sql_modulos)) {
        
        $sql_curso = "DELETE FROM curso WHERE ID_curso = $id_curso";

        if (mysqli_query($conn, $sql_curso)) {
            header("Location: ../cursos_admin.php?mensaje=curso_eliminado");
        } else {
            echo "Error al eliminar el curso: " . mysqli_error($conn);
        }
    } else {
        echo "Error al eliminar los módulos: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
