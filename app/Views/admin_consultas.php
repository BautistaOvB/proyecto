<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Consultas</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/estiloconsultas.css'); ?>">
 
</head>
<body>
<?php include('header.php'); ?>
    <div class="container mt-5">
        <h2 class="titulo">Gestión de Consultas</h2>
        
        <form action="<?= base_url('administrador/consultas/filtrar') ?>" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                </div>
                <div class="col-md-4">
                    <input type="text" name="email" class="form-control" placeholder="Correo Electrónico">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>
        
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $consulta) : ?>
                        <tr>
                            <td><?= esc($consulta['id']) ?></td>
                            <td><?= esc($consulta['nombre']) ?></td>
                            <td><?= esc($consulta['email']) ?></td>
                            <td><?= substr(esc($consulta['mensaje']), 0, 50) ?>...</td>
                            <td><?= esc($consulta['fecha']) ?></td>
                            <td>
                                <a href="<?= base_url('administrador/consultas/ver/' . $consulta['id']) ?>" class="btn btn-primary">Ver mensaje</a>
                                <a href="<?= base_url('administrador/consultas/eliminar/' . $consulta['id']) ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
