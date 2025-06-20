<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Tatu'; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/miestiloheader.css'); ?>">
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</head>
<body>
    <header>
        <div class="top-banner">
            <marquee behavior="scroll" direction="left" class="top-text">
                Envíos a todo el país al menor precio — Cada vez somos más, ¡gracias por ser parte!
            </marquee>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="<?= base_url('index'); ?>">
                    <img src="<?= base_url('assets/img/MulitaLogo.png'); ?>" alt="Tatu Logo" class="logo me-2">
                    <span class="brand-text">Tatu</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('index'); ?>">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('comercializacion'); ?>">Comercialización</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('quienesSomos'); ?>">Quiénes somos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('contactos'); ?>">Contactos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('productos'); ?>">Productos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('terminos'); ?>">Terminos y Condiciones</a></li>
                        <?php if (session()->get('is_logged')) : ?>
                            <?php if (session()->get('perfil_id') == 1) : ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Administrador <img src="<?php echo base_url('assets/img/addmin.png'); ?>"
                                                        alt="Administrador" width="32" height="32" class="rounded-circle">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                        <li><a class="dropdown-item" href="<?php echo base_url('administrador/productos/admin'); ?>">CRUD Prod</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url('administrador/usuarios'); ?>">CRUD User</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url('administrador/contacto/formulario'); ?>">CRUD Cons</a></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url('administrador/ventas-admin'); ?>">VENTAS</a></li> <!-- Historial de ventas para administradores -->
                                        <li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('compras-usuario'); ?>">Historial de Compras</a> <!-- Historial de compras para usuarios -->
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Usuario <img src="<?php echo base_url('assets/img/usser.png'); ?>"
                                                        alt="Usuario" width="32" height="32" class="rounded-circle">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    
                                        <li><a class="dropdown-item" href="#">Mi cuenta</a></li>
                                        <li><a class="dropdown-item" href="#">Cambiar contraseña</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('login'); ?>">Acceder</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
