<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/edit.css'); ?>">
    <title>Editar Usuario</title>
</head>
<body>
<h2 class="titulo">Editar Usuario</h2>
<div class="container">
    <form action="<?php echo base_url('administrador/usuarios/update/' . $usuario['id_usuario']); ?>" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>" required>
        </div>
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario['usuario']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="pass">Contraseña (déjelo en blanco si no desea cambiarla):</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <div class="form-group">
            <label for="perfil_id">Perfil ID:</label>
            <input type="number" class="form-control" id="perfil_id" name="perfil_id" value="<?php echo $usuario['perfil_id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="baja">Baja:</label>
            <select class="form-control" id="baja" name="baja">
                <option value="NO" <?php echo $usuario['baja'] == 'NO' ? 'selected' : ''; ?>>NO</option>
                <option value="SI" <?php echo $usuario['baja'] == 'SI' ? 'selected' : ''; ?>>SI</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
</body>
</html>
