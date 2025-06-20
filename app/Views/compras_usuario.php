<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras de Usuario</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/estiloCompras.css'); ?>">
    <?php include('header.php'); ?>
</head>
<body>
    <div class="container">
        <h1>Compras de Usuario</h1>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID Compra</th>
                        <th>ID Usuario</th>
                        <th>Fecha de Compra</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compras as $compra): ?>
                    <tr>
                        <td><?php echo $compra['id']; ?></td>
                        <td><?php echo $compra['id_usuario']; ?></td>
                        <td><?php echo $compra['fecha_venta']; ?></td>
                        <td><?php echo $compra['subtotal']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
