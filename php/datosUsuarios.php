<?php

include "conexion.php";

$userName = $_POST["userName"];
$userEmail = $_POST["userEmail"];
$userPassword = $_POST["userPassword"];
$tipo_usuario = "estudiante";

$hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (nombre, correo, contraseña, tipo_usuario)
VALUES ('$userName', '$userEmail','$hashedPassword', '$tipo_usuario')";

if (mysqli_query($conn, $sql)) {
  $id_usuario = mysqli_insert_id($conexion);
  $sql_estudiante = "INSERT INTO estudiantes (ID_estudiante, fecha_registro) VALUES ('$id_usuario', NOW())";
  mysqli_query($conexion, $sql_estudiante);
  echo "New user created successfully";
  header("Location:../cursos_usuario.php");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>