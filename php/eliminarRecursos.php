<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id_recurso = $_GET['id'];
    $sql_recurso = "DELETE FROM recurso WHERE ID_recurso = $id_recurso";

        
        if (mysqli_query($conn, $sql_recurso)) {
            header("Location: ../recursos_admin.php?mensaje=recurso_eliminado");
        } else {
            echo "Error al eliminar el recurso: " . mysqli_error($conn);
        }


    mysqli_close($conn);
}
?>
