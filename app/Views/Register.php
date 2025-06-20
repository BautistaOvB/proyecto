<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="assets\css\registerEstilo.css">
    <link rel="stylesheet" href="assets\css\miEstiloRegister.css">
    <style>
        @media screen and (max-width: 10000px) {
            .container {
                width: 90%;
            }
            .card {
                width: 100%;
            }
            .card-body {
                padding: 20px;
            }
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-2 mb-5 d-flex justify-content-center">
        <div class="card">
            <div class="card-header text-center">
                <h2>Registrarse</h2>
            </div>
            <form method="post" action="<?php echo base_url('/enviar-form') ?>">
                <?php if (!empty(session()->getFlashdata('fail'))): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif; ?>
                <?php if (!empty(session()->getFlashdata('success'))): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese su nombre" required>
                        <?php if (isset($validation) && $validation->getError('nombre')): ?>
                            <div class='alert alert-danger mt-2'><?= $validation->getError('nombre'); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
                        <?php if (isset($validation) && $validation->getError('apellido')): ?>
                            <div class='alert alert-danger mt-2'><?= $validation->getError('apellido'); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                    <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                        <?php if (isset($validation) && $validation->getError('usuario')): ?>
                            <div class='alert alert-danger mt-2'><?= $validation->getError('usuario'); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" placeholder="correo@ejemplo.com" required>
                        <?php if (isset($validation) && $validation->getError('email')): ?>
                            <div class='alert alert-danger mt-2'><?= $validation->getError('email'); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="pass" class="form-label">Contraseña</label>
                        <input name="pass" type="password" class="form-control" placeholder="Contraseña" required>
                        <?php if (isset($validation) && $validation->getError('pass')): ?>
                            <div class='alert alert-danger mt-2'><?= $validation->getError('pass'); ?></div>
                        <?php endif; ?>
                    </div>
                    <br>
                    <input type="submit" value="Guardar" class="btn btn-success">
                    <br>
                    <br>
                    <input type="reset" value="Borrar" class="btn btn-secondary">
                </div>
            </form>
        </div>
    </div>
</body>
</html>