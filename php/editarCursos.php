<?php
session_start();
include 'conexion.php';

if (isset($_GET['id'])) {
    $id_curso = $_GET['id'];
    $_SESSION['ID_curso'] = $id_curso;
    $sql = "SELECT * FROM curso WHERE ID_curso = $id_curso";
    $result = mysqli_query($conn, $sql);
    $curso = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreCurso = $_POST['nombreCurso'];
        $precioCurso = $_POST['precioCurso'];
        $descripcionCurso = $_POST['descripcionCurso'];

        $sql_update = "UPDATE curso SET nombre='$nombreCurso', descripción='$descripcionCurso', precio='$precioCurso' WHERE ID_curso = $id_curso";

        if (mysqli_query($conn, $sql_update)) {
            header("Location: ../cursos_admin.php?mensaje=curso_actualizado"); 
        } else {
            echo "Error al actualizar el curso: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
