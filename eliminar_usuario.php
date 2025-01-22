<?php
include 'php/conexion.php';

if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    $sql_estudiante = "DELETE FROM estudiante WHERE ID_estudiante = '$idUsuario'";
    mysqli_query($conn, $sql_estudiante);
    $sql = "DELETE FROM usuario WHERE ID_usuario = '$idUsuario'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: usuarios_admin.php?eliminado=exito");
        exit;
    } else {
        echo "Error al eliminar: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
