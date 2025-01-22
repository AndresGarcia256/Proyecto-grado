<?php
session_start();
include 'conexion.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$id_estudiante = $_SESSION['ID_estudiante'];
$id_curso = $data['ID_curso'];
$precio = $data['precio_total'];
$metodo_pago = $data['metodo_pago'];

$pago_exitoso = true;

if ($pago_exitoso) {
    $sql_pago = "INSERT INTO pago (ID_estudiante, ID_curso, total, metodo_pago) VALUES (?, ?, ?, ?)";
    $stmt_pago = $conn->prepare($sql_pago);
    $stmt_pago->bind_param("iids", $id_estudiante, $id_curso, $precio, $metodo_pago);
    $stmt_pago->execute();

    // 2. Insertar en cursos_en_proceso
    $sql_curso_proceso = "INSERT INTO inscripción_curso (ID_estudiante, ID_curso) VALUES (?, ?)";
    $stmt_curso_proceso = $conn->prepare($sql_curso_proceso);
    $stmt_curso_proceso->bind_param("ii", $id_estudiante, $id_curso);
    $stmt_curso_proceso->execute();

    // Respuesta exitosa
    echo json_encode(['success' => true]);
} else {
    // Respuesta de error
    echo json_encode(['success' => false, 'message' => 'Error en el proceso de pago. Por favor, inténtalo de nuevo.']);
}
?>
