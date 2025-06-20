<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/miestiloProductos.css">
    <link rel="stylesheet" href="assets/css/miestiloContacto.css">
    <script src="assets/js/app.js" async></script>
    <title>Tatu</title>
    <script src="assets/js/script.js"></script>
    
</head>
<body>

<?php include('header.php'); ?>
<script>
function actualizarTotalCarrito() {
            var carritoContenedor = document.querySelector('.carrito-items');
            var carritoItems = carritoContenedor.getElementsByClassName('carrito-item');
            var total = 0;

            for (var i = 0; i < carritoItems.length; i++) {
                var item = carritoItems[i];
                var precioElemento = item.querySelector('.carrito-item-precio');
                var cantidadElemento = item.querySelector('.carrito-item-cantidad');

                var precioTexto = precioElemento.innerText.replace('$', '').replace(/\./g, '').replace(',', '.');
                var precio = parseFloat(precioTexto);
                var cantidad = parseInt(cantidadElemento.value);

                total += precio * cantidad /2;
            }

            var formatter = new Intl.NumberFormat('es-ES', {
                style: 'currency',
                currency: 'ARS',
                minimumFractionDigits: 3,
                maximumFractionDigits: 3,
            });

            document.querySelector('.carrito-precio-total').innerText = formatter.format(total);
            document.getElementById('subtotalInput').value = total.toFixed(3); // Actualizar el valor del subtotalInput
            return total;
        }

        function TotalCarrito() {
    var carritoContenedor = document.querySelector('.carrito-items');
    var carritoItems = carritoContenedor.getElementsByClassName('carrito-item');
    var total = 0;

    for (var i = 0; i < carritoItems.length; i++) {
        var item = carritoItems[i];
        var precioElemento = item.querySelector('.carrito-item-precio');
        var cantidadElemento = item.querySelector('.carrito-item-cantidad');

        var precioTexto = precioElemento.innerText.replace('$', '').replace(/\./g, '').replace(',', '.');
        var precio = parseFloat(precioTexto);
        var cantidad = parseInt(cantidadElemento.value);
        

        total += (precio * cantidad / 2);
    }

    return total;
}


function pagarClicked() {
    var perfilId = <?php echo isset($_SESSION['perfil_id']) ? $_SESSION['perfil_id'] : 'null'; ?>;
    
    if (perfilId !== 2) {
        alert("Necesita registrarse para poder comprar!");
        return;
    }

    alert("Gracias por la compra");
}

</script>


<div class="imagen-principal">
    <img src="assets/img/aaaaaaaa.jpg" alt="Imagen Principal">
</div>
<div class="titulo-contactos">
    <h2>Venta de productos</h2>
</div>
<section class="contenedor">
    <div class="contenedor-items">
    <?php foreach ($productos as $producto): ?>
    <?php if ($producto['eliminado'] == "NO") { ?>
        <div class="item">
            <span class="titulo-item"><?php echo $producto['nombre_prod']; ?></span>
            <img src="<?php echo base_url('assets/img/img producto/' . $producto['imagen']) ?>" alt="" class="img-item">
            <span class="precio-item">$<?php echo number_format($producto['precio'], 2); ?></span>
            <span class="stock-item" style="display:none;"><?php echo $producto['stock']; ?></span>
            <span class="stock-min-item" style="display:none;"><?php echo $producto['stock_min']; ?></span>
            <button class="boton-item" data-id="<?php echo $producto['id']; ?>">Agregar al Carrito</button>
            
        </div>
    <?php } ?>
<?php endforeach; ?>
    </div>

    <div class="carrito" id="carrito">
        <div class="header-carrito">
            <h2>Tu Carrito</h2>
        </div>

        <div class="carrito-items"></div>
        <div class="carrito-total">
            <div class="fila">
                <strong>Tu Total</strong>
                <span class="carrito-precio-total">$0,00</span>
            </div>
            <form action="<?= base_url('cliente/ventas-ad'); ?>" method="post">
    <!-- Otros campos del formulario -->
    
    <input type="hidden" name="subtotal" id="subtotalInput" value="">
    <button type="submit" class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i></button>
</form>

            
          </div>
    </div>
</section>

<div class="titulo">
    <h2>Preguntas frecuentes</h2>
</div>
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Necesito asesoramiento para realizar una compra
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>Si necesitas asesoramiento no dudes en avisarnos</strong> No dudes en seleccionar contactos, y mandar un email para ser rápidamente contestado!
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Cómo realizo una compra
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>Para realizar una compra</strong> Debes seleccionar el producto que quieras, y se agregará automáticamente al carrito!
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Quiero consultar stock
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>Para consultar stock es muy fácil</strostrong> Debes mandar un correo al sitio de contacto para confirmar si hay stock!
                
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
</body>
<script>
    function actualizarYEnviarFormulario() {
        
            // Actualizar el subtotal antes de enviar el formulario
            var subtotal = TotalCarrito();
            document.getElementById('subtotalInput').value = subtotal * 1000;

            // Ahora enviar el formulario
            document.getElementById('form-carrito').submit();
        }
        var botonesAgregarAlCarrito = document.getElementsByClassName('boton-item');
        for (var i = 0; i < botonesAgregarAlCarrito.length; i++) {
            botonesAgregarAlCarrito[i].addEventListener('click', function() {
                // Aquí puedes agregar lógica para agregar el producto al carrito
                // Por simplicidad, se omite la lógica detallada de agregar al carrito
            });
        }

    
</script>
</html>
