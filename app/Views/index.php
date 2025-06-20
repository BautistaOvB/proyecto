
<main>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/img/mealpro-uFIfEb-fPA4-unsplash.jpg'); ?>" class="d-block w-100" alt="Conductor">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tus cargas en buenas manos</h5>
                    <p>Trabajo eficiente y al mejor costo de la región</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/CargaCajas.jpg'); ?>" class="d-block w-100" alt="Hombre cargando cajas">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Te lo llevamos a destino</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/Caja-fragil.jpg'); ?>" class="d-block w-100" alt="Caja frágil">
                <div class="carousel-caption d-none d-md-block">
                    <h5>No importa su delicadeza</h5>
                    <p>Nosotros lo cuidamos</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <section class="productos-section py-5">
        <div class="container text-center">
            <h2 class="mb-4">Nuestros Servicios</h2>
            <p>Consulte por stock - Envíos a todo el país</p>

            <div class="row mt-4">
                <div class="col-md-4 mb-4">
                    <div class="producto-card p-3 shadow-sm">
                        <img src="<?= base_url('assets/img/BolSize.jpg'); ?>" alt="Envíos Ligeros" class="img-fluid mb-3">
                        <h5>Envíos Ligeros</h5>
                        <p>Cajas u objetos que no superen los 10 kg en conjunto.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="producto-card p-3 shadow-sm">
                        <img src="<?= base_url('assets/img/CajasSize.jpg'); ?>" alt="Envíos Medianos" class="img-fluid mb-3">
                        <h5>Envíos Medianos</h5>
                        <p>Cajas u objetos que no superen los 100 kg en conjunto.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="producto-card p-3 shadow-sm">
                        <img src="<?= base_url('assets/img/CajoneraSize.jpg'); ?>" alt="Carga Especial" class="img-fluid mb-3">
                        <h5>Carga Especial</h5>
                        <p>Objetos delicados o de gran tamaño, cuidados personalizados.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
 