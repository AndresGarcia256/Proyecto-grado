<?php
session_start();
include 'conexion.php';

$userEmail = $_POST["userEmail"];
$userPassword = $_POST["userPassword"];

$sql = "SELECT * FROM usuario WHERE correo='$userEmail'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row["contraseña"]; 
    
    if (password_verify($userPassword, $hashedPassword)) {
        $tipoUsuario = $row["tipo_usuario"];
        
        $_SESSION["tipo_usuario"] = $tipoUsuario;
        $_SESSION["ID_usuario"] = $row["ID_usuario"];

        if ($tipoUsuario == "admin") {
            header("Location: ../cursos_admin.php"); 
        } else {
            $ID_usuario = $row["ID_usuario"];
            $sqlEstudiante = "SELECT ID_estudiante FROM estudiante WHERE ID_estudiante = '$ID_usuario'";
            $resultEstudiante = mysqli_query($conn, $sqlEstudiante);
            
            if (mysqli_num_rows($resultEstudiante) > 0) {
                $rowEstudiante = mysqli_fetch_assoc($resultEstudiante);
                $_SESSION["id_estudiante"] = $rowEstudiante["ID_estudiante"]; // Guardar ID_estudiante en la sesión
            }

            header("Location: ../cursos_usuario.php"); 
        }
        exit();
    } else {
        echo "Credenciales inválidas";
    }
} else {
    echo "Credenciales inválidas";
}

mysqli_close($conn);
?>
