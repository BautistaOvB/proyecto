<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Mensaje</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<?php include('header.php'); ?>
<body>
    <div class="container mt-5">
        <h2>Detalle de la consulta</h2>
        <p><strong>Nombre:</strong> <?= esc($consulta['nombre']) ?></p>
        <p><strong>Email:</strong> <?= esc($consulta['email']) ?></p>
        <p><strong>Mensaje:</strong> <?= esc($consulta['mensaje']) ?></p>
        <p><strong>Fecha:</strong> <?= esc($consulta['fecha']) ?></p>
        <a href="<?= base_url('administrador/contacto/formulario') ?>" class="btn btn-primary">Volver a la gestión de consultas</a>
    </div>
</body>
<?php include('footer.php'); ?>
</html>
