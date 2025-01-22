<?php

include "conexion.php";

$userName = $_POST["userName"];
$userEmail = $_POST["userEmail"];
$userPassword = $_POST["userPassword"];
$tipo_usuario = $_POST["tipo_usuario"];


if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>




