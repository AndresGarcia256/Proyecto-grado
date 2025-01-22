<?php

include "conexion.php";

$userName = $_POST["userName"];
$userEmail = $_POST["userEmail"];
$userPassword = $_POST["userPassword"];
$tipo_usuario = "estudiante"; 

if (empty($userName) || empty($userEmail) || empty($userPassword)) {
    echo "Todos los campos son obligatorios.";
    exit();
}

// Verifica si el correo ya está registrado
$sql_check = "SELECT * FROM usuario WHERE correo='$userEmail'";
$result = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result) > 0) {
    echo "El correo ya está registrado. Intenta con otro.";
    exit();
}

// Encripta la contraseña
$hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

// Asegúrate de que el valor de tipo_usuario es 'estudiante'
if ($tipo_usuario === "estudiante") {
    $sql = "INSERT INTO usuario (nombre, correo, contraseña, tipo_usuario) 
    VALUES ('$userName', '$userEmail', '$hashedPassword', '$tipo_usuario')";

    if (mysqli_query($conn, $sql)) {
        $id_usuario = mysqli_insert_id($conn);
        $sql_estudiante = "INSERT INTO estudiante (ID_estudiante, fecha_registro) VALUES ('$id_usuario', NOW())";
        mysqli_query($conn, $sql_estudiante);   
        header("Location: ../cursos_usuario.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: Tipo de usuario no válido.";
}

mysqli_close($conn);
?>
