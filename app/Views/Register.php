<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Tatu</title>
    <link rel="stylesheet" href= "<?php echo base_url("assets/css/estilo.css"); ?>">
    <link rel="stylesheet" href="assets/css/contacto.css">
</head>
<body>
    <header class="conta">
        <h1>Registrese para iniciar sesion</h1>
    </header>

    <main class="content"> <!-- fix img--> 
<section class="formulario">
            <div class="registro">
                <h2>Registro</h2>
            </div>
<!-- fix method -->
            <form action="<?= base_url('...'); ?>" method="POST">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" required autocomplete="name"><br>
                
                <label for="Apellido">Apellido:</label><br>
                <input type="text" id="Apellido" name="Apellido" required autocomplete="Apellido"><br>

                <label for="Usuario">Nombre de usuario:</label><br>
                <input type="text" id="Apellido" name="Apellido" required autocomplete="Apellido"><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required autocomplete="email"><br>

                <label for="password">password:</label><br>
                <input type="password" id="password" name="password" required autocomplete="password"><br>


                <button type="submit">Registrarse</button>
            </form>
        </section>
        </main>

    </body>

    </html>