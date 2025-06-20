<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="assets/css/miestiloSesion.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h2>Inicio de Sesión</h2>
            </div>
            <form method="post" action="<?php echo base_url('/enviarLogin'); ?>">
                <?php if (!empty(session()->getFlashdata('msg'))): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Ingrese su email" required>
                    </div>
                    <div class="form-group">
                        <label for="pass" class="form-label">Contraseña</label>
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="password" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>
            <div class="card-body">
                <div class="forgot-password">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="register">
                    <a class="primary" href="<?php echo base_url('register'); ?>">Registrarse</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
