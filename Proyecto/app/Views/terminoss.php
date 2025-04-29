<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones | Tatu</title>
    <link rel="stylesheet" href= "<?php echo base_url("assets/css/estilo.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/terminoss.css"); ?>">
</head>                 
<body>


<main class="terminos-container">
  <p>Bienvenido a Tatu. Estos Términos y Condiciones ("Términos") rigen el uso de nuestro sitio web y los servicios contratados a través de él.</p>
  <p>Al utilizar nuestro servicio, aceptas cumplir estos Términos. Por favor, léelos detenidamente.</p>

  <section class="terminos-accordion">
    <div class="terminos-accordion-item">
      <div class="terminos-accordion-header">1. Uso del Servicio</div>
      <div class="terminos-accordion-content">
        El usuario se compromete a utilizar el servicio conforme a las leyes vigentes. Es responsable de la seguridad de su cuenta y de toda actividad realizada bajo su nombre.
      </div>
    </div>

    <div class="terminos-accordion-item">
      <div class="terminos-accordion-header">2. Servicios y Precios</div>
      <div class="terminos-accordion-content">
        Nos reservamos el derecho de modificar precios o condiciones sin previo aviso, según disponibilidad o variaciones del mercado.
      </div>
    </div>
  </section>
</main>


<script>
  document.querySelectorAll('.terminos-accordion-header').forEach(header => {
    header.addEventListener('click', () => {
      const item = header.parentElement;
      item.classList.toggle('active');
      const content = header.nextElementSibling;
      if (item.classList.contains('active')) {
        content.style.display = 'block';
      } else {
        content.style.display = 'none';
      }
    });
  });
</script>

</body>
</html>
