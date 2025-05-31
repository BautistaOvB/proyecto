<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href= "<?php echo base_url("assets/css/estilo.css"); ?>">
    <link rel="stylesheet" href="assets/css/contacto.css">
</head>
<body>
    <header class="conta">
        <h1>Inicia sesion</h1>
    </header>

    <main class="content"> <!-- fix img--> 
    <section class="formulario">
<!-- fix method -->
        <form action="<?= base_url('LoginController'); ?>" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required autocomplete="email"><br>                <label for=" password"> password:</label><br>
            <textarea id="password" name="password" required></textarea><br>
            
            <button type="submit">Iniciar Sesion</button>
            </form>
        </section>
        </main>
    
</body>
</html>