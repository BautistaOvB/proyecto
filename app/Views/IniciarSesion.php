<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\miestiloSesion.css">
    <title>Tatu - Inicio de Sesión</title>
</head>
<body>
    <div class="container">
        <div class="card" style="width: 50%;">
            <div class="card-header text-center">
                <h2>Iniciar sesión</h2>
            </div>
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg')?>
                </div>
            <?php endif;?>     
            <div class="card-body">
                <form method="post" action="<?php echo base_url('/enviarlogin') ?>">
                    <div class="col-12 mb-2">
                        <label for="email" class="form-label">Correo</label>
                        <input id="email" name="email" type="text" class="form-control" placeholder="correo" required>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="contraseña" required>
                    </div>
                    <input type="submit" value="Ingresar" class="btn btn-success">
                    <button id="openModalBtn" class="btn btn-danger">Cancelar</button>
                    <br>
                    <span>¿Aún no se registró? <a href="<?php echo base_url('/registro'); ?>" class="enlace-registro">Registrarse aquí</a></span>
                    <br>
                    <span><a href="#" class="enlace-olvido">¿Olvidaste tu contraseña?</a></span>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
