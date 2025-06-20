<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Eliminados</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/usuarios.css'); ?>">
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</head>
<body>
    <div class="container">
        <h2 class="titulo">Lista de productos eliminados</h2>
        <br>
        <br>
        <a href="<?php echo base_url('administrador/productos/admin'); ?>" class="btn btn-secondary">Volver a Productos</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Categoria ID</th>
                    <th>Precio</th>
                    <th>Precio Venta</th>
                    <th>Stock</th>
                    <th>Stock Min</th>
                    <th>Eliminado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?php echo $producto['id']; ?></td>
                        <td><?php echo $producto['nombre_prod']; ?></td>
                        <td><img src="<?php echo base_url('assets/img/img producto/' . $producto['imagen']); ?>" alt="Imagen del producto"></td>
                        <td><?php echo $producto['categoria_id']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['precio_venta']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td><?php echo $producto['stock_min']; ?></td>
                        <td><?php echo $producto['eliminado']; ?></td>
                        <td>
                            <a href="<?php echo base_url('administrador/productos/restaurar/' . $producto['id']); ?>" class="btn btn-success">Restaurar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
