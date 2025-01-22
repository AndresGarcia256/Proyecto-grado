<?php
session_start();
include 'conexion.php';

    if (!isset($_SESSION['ID_usuario']) || $_SESSION['tipo_usuario'] != 'admin') {
        die("Acceso denegado. Solo los administradores pueden subir cursos.");
    }

    $ID_admin = $_SESSION['ID_usuario'];

    $nombreRecurso = $_POST['nombreRecurso'];
    $descripcionRecurso = $_POST['descripcionRecurso'];
    $tipoRecurso = $_POST['tipoRecurso'];
    $archivoRecurso = $_FILES['archivoRecurso']['name'];
    $archivoTmp = $_FILES['archivoRecurso']['tmp_name'];
    $rutaArchivo = '../rec/' . $archivoRecurso;

    move_uploaded_file($archivoTmp, $rutaArchivo);

    date_default_timezone_set('America/Bogota');
    $fecha_creacion = date('Y-m-d H:i:s');
   

    $sql = "INSERT INTO recurso (nombre, tipo_recurso, descripción, archivo, ID_admin) 
            VALUES ('$nombreRecurso', '$tipoRecurso', '$descripcionRecurso', '$rutaArchivo', '$ID_admin')";

    if (mysqli_query($conn, $sql)) {
        echo "Recurso subido correctamente.";
        header("Location: ../recursos_admin.php?mensaje=recurso_registrado"); 
    } else {
        echo "Error al subir el recurso: " . mysqli_error($conn);
    }

    mysqli_close($conn);

?>
