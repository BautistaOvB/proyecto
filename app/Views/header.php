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
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('terminos'); ?>">Terminos y Condiciones</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
