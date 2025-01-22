<?php
session_start();
include 'conexion.php';

if (isset($_GET['id'])) {
    $id_recurso = $_GET['id'];
    $_SESSION['ID_recurso'] = $id_recurso;
    $sql = "SELECT * FROM recurso WHERE ID_recurso = $id_recurso";
    $result = mysqli_query($conn, $sql);
    $recurso = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreRecurso = $_POST['nombreRecurso'];
        $tipoRecurso = $_POST['tipoRecurso'];
        $descripcionRecurso = $_POST['descripcionRecurso'];

        $sql_update = "UPDATE recurso SET nombre='$nombreRecurso', tipo_recurso='$tipoRecurso', descripción='$descripcionRecurso' WHERE ID_recurso = $id_recurso";

        if (mysqli_query($conn, $sql_update)) {
            header("Location: ../recursos_admin.php?mensaje=recurso_actualizado"); 
        } else {
            echo "Error al actualizar el recurso: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
