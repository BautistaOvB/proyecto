<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos</title>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/usuarios.css'); ?>">
</head>
<body>
    
    <?php include('header.php'); ?> <!-- Incluye el encabezado -->
    <div class="container">
        <h2 class="titulo">Lista de productos</h2>
        <a href="<?php echo base_url('administrador/productos/crear'); ?>" class="btn btn-primary">Agregar Producto</a>
        <a href="<?php echo base_url('administrador/productos/eliminados'); ?>" class="btn btn-secondary">Ver Productos Eliminados</a>
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
                            <a href="<?php echo base_url('administrador/productos/editar/' . $producto['id']); ?>" class="btn btn-warning">Editar</a>
                            <a href="<?php echo base_url('administrador/productos/eliminar/' . $producto['id']); ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include('footer.php'); ?> <!-- Incluye el pie de página -->
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
