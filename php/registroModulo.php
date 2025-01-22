<?php
session_start();
include 'conexion.php';

// Verificar si el usuario es administrador
if (!isset($_SESSION['ID_usuario']) || $_SESSION['tipo_usuario'] != 'admin') {
    die("Acceso denegado. Solo los administradores pueden agregar módulos.");
}

$ID_admin = $_SESSION['ID_usuario'];
$ID_curso = $_POST['id_curso']; 
$nombreModulo = $_POST['nombreModulo'];
$descripcionModulo = $_POST['descripcionModulo'];
$archivoModulo = $_FILES['archivoModulo']['tmp_name'];

$contenidoArchivo = file_get_contents($archivoModulo);

$sql = "INSERT INTO modulo (nombre, descripción, archivo, ID_curso) 
        VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssi", $nombreModulo, $descripcionModulo, $contenidoArchivo, $ID_curso);

if (mysqli_stmt_execute($stmt)) {
    echo "Módulo agregado correctamente al curso.";
    header("Location: ../cursos_admin.php?mensaje=modulo_registrado");
    exit();
} else {
    echo "Error al agregar el módulo: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
