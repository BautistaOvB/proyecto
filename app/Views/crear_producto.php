<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/create.css'); ?>">
    
</head>
<body>

<h2 class="titulo">Crear producto</h2>

<div class="container"> <?php helper('form'); echo form_open('administrador/productos/guardar'); ?>


<label for="nombre">Nombre:</label>
<input type="text" name="nombre" required><br>

<label for="imagen">Imagen:</label>
<input type="file" name="imagen" required><br>

<label for="categoria_id">Categoría ID:</label>
<input type="number" name="categoria_id" required><br>

<label for="precio">Precio:</label>
<input type="number" name="precio" step="0.01" required><br>

<label for="precio_venta">Precio de Venta:</label>
<input type="number" name="precio_venta" step="0.01" required><br>

<label for="stock">Stock:</label>
<input type="number" name="stock" required><br>

<label for="stock_min">Stock Mínimo:</label>
<input type="number" name="stock_min" required><br>

<br>

<button type="submit">Crear Producto</button>

<?php echo form_close(); ?>
</div>


</body>
</html>
