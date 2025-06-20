<?php
// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el cuerpo de la solicitud como JSON
    $data = json_decode(file_get_contents('php://input'), true);

    // Validar que se recibieron datos válidos
    if (isset($data['items']) && is_array($data['items'])) {
        // Conectar a la base de datos (debes ajustar los parámetros según tu configuración)
        $dbHost = 'localhost'; // Host de la base de datos
        $dbUser = 'usuario';   // Usuario de la base de datos
        $dbPass = 'contraseña'; // Contraseña de la base de datos
        $dbName = 'nombre_bd';  // Nombre de la base de datos

        // Crear conexión
        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Iterar sobre los elementos a actualizar
        foreach ($data['items'] as $item) {
            $idProducto = $item['id'];
            $cantidad = $item['cantidad'];

            // Consultar el stock actual del producto
            $sqlSelect = "SELECT stock FROM productos WHERE id = ?";
            $stmt = $conn->prepare($sqlSelect);
            $stmt->bind_param("i", $idProducto);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $stockActual = $row['stock'];

                // Verificar si hay suficiente stock para la compra
                if ($cantidad > $stockActual) {
                    echo json_encode(array("success" => false, "message" => "No hay suficiente stock disponible para el producto con ID $idProducto"));
                    exit;
                }

                // Calcular nuevo stock
                $nuevoStock = $stockActual - $cantidad;

                // Actualizar el stock en la base de datos
                $sqlUpdate = "UPDATE productos SET stock = ? WHERE id = ?";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("ii", $nuevoStock, $idProducto);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    // Éxito al actualizar el stock
                    echo json_encode(array("success" => true, "message" => "Stock actualizado correctamente para el producto con ID $idProducto"));
                } else {
                    echo json_encode(array("success" => false, "message" => "Error al actualizar el stock para el producto con ID $idProducto"));
                }
            } else {
                echo json_encode(array("success" => false, "message" => "Producto con ID $idProducto no encontrado"));
            }
        }

        // Cerrar conexión
        $conn->close();
    } else {
        echo json_encode(array("success" => false, "message" => "Datos incorrectos enviados desde el cliente"));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Método de solicitud no permitido"));
}
?>
