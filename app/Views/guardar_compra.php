<?php

// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Método no permitido
    die('Error: Solo se permiten solicitudes POST.');
}

// Recibir los datos del cuerpo de la solicitud POST
$data = json_decode(file_get_contents('php://input'), true);

// Verificar que se recibieron los datos correctamente
if (!$data) {
    http_response_code(400); // Solicitud incorrecta
    die('Error: No se recibieron datos válidos.');
}

// Validar y procesar los datos recibidos
$usuarioId = isset($data['usuario_id']) ? intval($data['usuario_id']) : null;
$ventas = isset($data['ventas']) ? $data['ventas'] : null;

// Validar que los datos requeridos estén presentes
if (!$usuarioId || !$ventas) {
    http_response_code(400); // Solicitud incorrecta
    die('Error: Faltan datos requeridos.');
}

// Conexión a la base de datos
$conn = new mysqli('localhost', 'usuario', 'contraseña', 'base_de_datos');

if ($conn->connect_error) {
    http_response_code(500); // Error interno del servidor
    die("Conexión fallida: " . $conn->connect_error);
}

foreach ($ventas as $venta) {
    $productoId = isset($venta['producto_id']) ? intval($venta['producto_id']) : null;
    $cantidad = isset($venta['cantidad']) ? intval($venta['cantidad']) : null;
    $fechaVenta = date('Y-m-d H:i:s'); // Fecha actual del servidor

    // Validar que los datos requeridos estén presentes
    if (!$productoId || !$cantidad) {
        continue; // O manejar el error según sea necesario
    }

    // Preparar y ejecutar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO ventas (usuario_id, producto_id, cantidad, fecha_venta) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('iiis', $usuarioId, $productoId, $cantidad, $fechaVenta);

    if (!$stmt->execute()) {
        http_response_code(500); // Error interno del servidor
        echo 'Error al guardar la compra en el historial.';
        exit;
    }
}

$conn->close();
http_response_code(200); // OK
echo json_encode(['message' => 'Compra guardada exitosamente en el historial.']);
?>
