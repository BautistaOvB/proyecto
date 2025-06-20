<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas del Administrador</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/miestiloVentas.css'); ?>">
    
    
</head>
<body>
    <?php include('header.php'); ?>

    <div class="container">
        <h1>Ventas del Administrador</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>ID Usuario</th>
                    <th>Fecha de Venta</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody id="tabla-ventas">
                <!-- Aquí se cargarán las ventas dinámicamente -->
                <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td><?= $venta['id']; ?></td>
                        <td><?= $venta['id_cliente']; ?></td>
                        <td><?= $venta['fecha_venta']; ?></td>
                        <td><?= $venta['subtotal']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include('footer.php'); ?>

    <script>
        // Función para cargar las ventas desde el servidor
        function cargarVentas() {
            $.ajax({
                url: '<?= base_url('ventas_admin/cargarVentas'); ?>', // Ruta al método que devuelve las ventas
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#tabla-ventas').empty(); // Limpiar la tabla actual de ventas

                    // Recorrer las ventas y añadirlas a la tabla
                    if (response.ventas_admin.length > 0) {
                        $.each(response.ventas_admin, function(index, venta) {
                            var html = `<tr>
                                <td>${venta.id}</td>
                                <td>${venta.id_usuario}</td>
                                <td>${venta.fecha_venta}</td>
                                <td>${venta.subtotal}</td>
                            </tr>`;
                            $('#tabla-ventas').append(html);
                        });
                    } else {
                        $('#tabla-ventas').append('<tr><td colspan="4">No hay ventas disponibles</td></tr>');
                    }
                },
                error: function() {
                    console.log('Error al cargar las ventas.');
                }
            });
        }

        // Cargar las ventas al cargar la página
        $(document).ready(function() {
            cargarVentas();

            // Cargar las ventas cada 10 segundos (puedes ajustar el intervalo según tus necesidades)
            setInterval(cargarVentas, 10000); // Intervalo de 10 segundos
        });
    </script>
</body>
</html>
