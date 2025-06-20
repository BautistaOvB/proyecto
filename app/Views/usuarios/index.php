<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/estilolista.css'); ?>">
   
</head>
<body>
    <?php include('app\Views\header.php'); ?> 

    <div class="container mt-4">
        <h2 class="titulo">Lista de usuarios</h2>
        <div class="mb-3">
            <a href="<?php echo base_url('administrador/usuarios/create') ?>" class="btn btn-primary">Agregar Usuario</a>
            <a href="<?php echo base_url('administrador/usuarios/baja') ?>" class="btn btn-secondary">Gestionar Usuarios Dados de Baja</a>
        </div>
        <div class="table-container">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Perfil ID</th>
                        <th>Baja</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id_usuario']; ?></td>
                        <td><?php echo $usuario['nombre']; ?></td>
                        <td><?php echo $usuario['apellido']; ?></td>
                        <td><?php echo $usuario['usuario']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td><?php echo $usuario['perfil_id']; ?></td>
                        <td><?php echo $usuario['baja']; ?></td>
                        <td>
                            <a href="<?php echo base_url('administrador/usuarios/edit/' . $usuario['id_usuario']); ?>" class="btn btn-warning">Editar</a>
                            <a href="<?php echo base_url('administrador/usuarios/delete/' . $usuario['id_usuario']); ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include('app/views/footer.php'); ?> 
</body>
</html>
