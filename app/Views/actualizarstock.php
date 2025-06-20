<?php
// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el cuerpo de la solicitud como JSON
    $data = json_decode(file_get_contents('php://input'), true);

    // Validar que se recibieron datos válidos
    if (isset($data['items']) && is_array($data['items'])) {
        // Conectar a la base de datos (debes ajustar los parámetros según tu configuración)
        $dbHost = '127.0.0.1'; // Host de la base de datos
        $dbUser = 'root';   // Usuario de la base de datos
        $dbPass = 'Granate_999'; // Contraseña de la base de datos
        $dbName = 'tatu';  // Nombre de la base de datos

        // Crear conexión
        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Iterar sobre los elementos a actualizar
        foreach ($data['items'] as $item) {
            $tipo_envio_id = $item['tipo_envio_id'];
            $salidas_diarias = $item['salidas_diarias'];

            $sqlSelect = "SELECT salidas_diarias FROM tipos_envios WHERE tipo_envio_id = ?";
            $stmt = $conn->prepare($sqlSelect);
            $stmt->bind_param("i", $tipo_envio_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $salidasDisp = $row['salidas_diarias'];

                // Verificar
                if ($salidas_diarias > $salidasDisp) {
                    echo json_encode(array("success" => false, "message" => "No hay salaidas disponibles para el envio con ID $tipo_envio_id"));
                    exit;
                }

                // Calcular cantidad de salidas disponible
                $nuevasSalidas = $salidasDisp - $salidas_diarias;

                // Actualizar salidas en la base de datos
                $sqlUpdate = "UPDATE tipos_envios SET salidas_diarias = ? WHERE tipo_envio_id = ?";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("ii", $nuevasSalidas, $tipo_envio_id);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    // Éxito al actualizar el stock
                    echo json_encode(array("success" => true, "message" => "salidas actualizadas correctamente para el envio con ID $tipo_envio_id"));
                } else {
                    echo json_encode(array("success" => false, "message" => "Error al actualizar salidas para el envio con ID $tipo_envio_id"));
                }
            } else {
                echo json_encode(array("success" => false, "message" => "envio con ID $tipo_envio_id no encontrado"));
            }
        }

        // Cerrar conexión
        $conn->close();
    } else {
        echo json_encode(array("success" => false, "message" => "Datos incorrectos"));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Método de solicitud no permitido"));
}
?>
