<?php $titulo = 'Usuarios Dados de Baja'; $custom_css = 'usuarios.css'; ?>
<?php echo view('header', compact('titulo', 'custom_css')); ?>

<h2 class="titulo">Usuarios Dados de Baja</h2>
<a href="<?php echo base_url('administrador/usuarios') ?>" class="btn btn-primary">Volver a Usuarios Activos</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Perfil ID</th>
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
            <td>
                <a href="<?php echo base_url('administrador/usuarios/alta/' . $usuario['id_usuario']); ?>" class="btn btn-success">Dar de Alta</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo view('footer'); ?>
