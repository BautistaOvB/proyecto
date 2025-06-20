<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tatu - Contacto</title>
    <link rel="stylesheet" href= "<?php echo base_url("assets/css/estilo.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/contacto.css'); ?>">
</head>
<body>
    
    <div class="imagen-principal">
        <img src="<?= base_url('assets/img/no-dudes-en-llamarnos.jpg'); ?>" alt="Imagen Principal">
    </div>

    <main>

        <section class="titulo-contactos">
            <h1>Formas de Contactarnos</h1>
        </section>

        <section class="redes-sociales">
            <a href="https://www.instagram.com/"    >
                <img src="<?= base_url('assets/img/instagram.png'); ?>" alt="Instagram">
            </a>
            <a href="https://www.facebook.com/"    >
                <img src="<?= base_url('assets/img/facebook.png'); ?>" alt="Facebook">
            </a>
            <a href="https://outlook.live.com/"    >
                <img src="<?= base_url('assets/img/gmail.png'); ?>" alt="Correo Electrónico">
            </a>
        </section>

        <section class="formulario">
            <div class="consulta">
                <h2>Formulario de Consulta</h2>
                <p>Horario de Atención: Lunes a Viernes de 8 a 13 hs. y de 14 a 18 hs.</p>
            </div>
<!-- fix method -->
            <form action="<?= base_url('consultas/guardar'); ?>" method="POST">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" required autocomplete="name"><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required autocomplete="email"><br>

                <label for="mensaje">Mensaje:</label><br>
                <textarea id="mensaje" name="mensaje" required></textarea><br>

                <button type="submit">Enviar</button>
            </form>
        </section>

        <section class="detalles-contacto">
            <div class="detalle">
                <h2>Teléfono</h2>
                <p><a href="tel:+379413290">+379413290</a></p>
            </div>
            <div class="detalle">
                <h2>Correo Electrónico</h2>
                <p><a href="mailto:tatu@hotmail.com">tatu@hotmail.com</a></p>
            </div>
            <div class="detalle">
                <h2>Sitio Web</h2>
                <p><a href="http://www.tatu.com"    >www.tatu.com</a></p>
            </div>
        </section>

        <section class="ubicacion">
            <h2>Ubicación</h2>
            <p>Dirección de la empresa</p>
            <div class="mapa-container">
                <a href="https://www.google.com/maps/dir//-29.1567854,-59.2604516">
                    <img src="<?= base_url('assets/img/mapa.png'); ?>" alt="Mapa de ubicación" class="mapa-img">
                </a>
            </div>
        </section>

    </main>
 
</body>

</html>
