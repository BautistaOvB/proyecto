<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/create.css'); ?>">
</head>
<body>

<h2 class="titulo">Editar producto</h2>
<div class="container">

<?php helper('form'); echo form_open('administrador/productos/actualizar');?>

<input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

<label for="nombre">Nombre:</label>
<input type="text" name="nombre" value="<?php echo $producto['nombre_prod']; ?>" required><br>

<label for="imagen">Imagen:</label>
<input type="file" name="imagen" value="<?php echo $producto['imagen']; ?>" required><br>

<label for="categoria_id">Categoría ID:</label>
<input type="number" name="categoria_id" value="<?php echo $producto['categoria_id']; ?>" required><br>

<label for="precio">Precio:</label>
<input type="number" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required><br>

<label for="precio_venta">Precio de Venta:</label>
<input type="number" name="precio_venta" step="0.01" value="<?php echo $producto['precio_venta']; ?>" required><br>

<label for="stock">Stock:</label>
<input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required><br>

<label for="stock_min">Stock Mínimo:</label>
<input type="number" name="stock_min" value="<?php echo $producto['stock_min']; ?>" required><br>

<label for="eliminado">Eliminado:</label>
<input type="text" name="eliminado" value="<?php echo $producto['eliminado']; ?>" required><br>
    
<button type="submit">Actualizar Producto</button>

<?php echo form_close(); ?>
</div>
</body>
</html>
