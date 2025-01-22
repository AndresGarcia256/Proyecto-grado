<?php
session_start();
include 'conexion.php';

    if (!isset($_SESSION['ID_usuario']) || $_SESSION['tipo_usuario'] != 'admin') {
        die("Acceso denegado. Solo los administradores pueden subir cursos.");
    }

    $ID_admin = $_SESSION['ID_usuario'];

    $nombreCurso = $_POST['nombreCurso'];
    $precioCurso = $_POST['precioCurso'];
    $descripcionCurso = $_POST['descripcionCurso'];
    
    $archivoCurso = $_FILES['archivoCurso']['name'];
    $archivoTmp = $_FILES['archivoCurso']['tmp_name'];
    $rutaArchivo = '../img/' . $archivoCurso;

    move_uploaded_file($archivoTmp, $rutaArchivo);

    date_default_timezone_set('America/Bogota');
    $fecha_creacion = date('Y-m-d H:i:s');
   

    $sql = "INSERT INTO curso (nombre, descripción, precio, archivo, fecha_creación, ID_admin) 
            VALUES ('$nombreCurso', '$descripcionCurso', '$precioCurso', '$rutaArchivo', '$fecha_creacion', '$ID_admin')";

    if (mysqli_query($conn, $sql)) {
        echo "Curso subido correctamente.";
        header("Location: ../cursos_admin.php?mensaje=curso_registrado"); 
    } else {
        echo "Error al subir el curso: " . mysqli_error($conn);
    }

    mysqli_close($conn);

?>
