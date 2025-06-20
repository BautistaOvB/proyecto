<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <table>
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
                    <td><?php echo $producto['imagen']; ?></td>
                    <td><?php echo $producto['categoria_id']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $producto['precio_venta']; ?></td>
                    <td><?php echo $producto['stock']; ?></td>
                    <td><?php echo $producto['stock_min']; ?></td>
                    <td><?php echo $producto['eliminado']; ?></td>
                    <td>
                        <a href="<?php echo base_url('administrador/productos/editar/' . $producto['id']); ?>">Editar</a>
                        <a href="<?php echo base_url('administrador/productos/eliminar/' . $producto['id']); ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
