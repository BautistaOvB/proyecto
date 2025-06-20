<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/create.css'); ?>">
</head>
<h2 class="titulo">Agregar Usuarios</h2>
<div class="container">
    <form action="<?php echo base_url('administrador/usuarios/store') ?>" method="post">
    <form action="<?php echo base_url('administrador/usuarios/store') ?>" method="post">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" class="form-control" id="apellido" name="apellido">
    </div>
    <div class="form-group">
        <label for="usuario">Usuario:</label>
        <input type="text" class="form-control" id="usuario" name="usuario">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="pass">Contraseña:</label>
        <input type="password" class="form-control" id="pass" name="pass">
    </div>
    <div class="form-group">
        <label for="perfil_id">Perfil ID:</label>
        <input type="number" class="form-control" id="perfil_id" name="perfil_id">
    </div>
    <div class="form-group">
        <label for="baja">Baja:</label>
        <select class="form-control" id="baja" name="baja">
            <option value="NO">NO</option>
            <option value="SI">SI</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 
    
    
    </form>
</div>



</body>
</html>