<?php
    $session=session();
    $nombre= $session->get('nombre');
    $perfil= $session->get('perfil_id');
    ?>

<!---Barra de Navegacion-->
<nav class= "navbar Sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class= "container-fluid">
        <a class="navbar-brand" href="<?= base_url('/Home') ?>"> </a>
        <button class= "navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if($perfil==1): ?>
            <div class="btn btn-info active btnUser btn-sm">
                <a href="">Usuario: <?php echo session('nombre'); ?></a>
            </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('prueba'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('users-list');?>">Crud Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('ProductoController');?>">Crud Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url8('ventas');?>" tabindex="-1" aria-disbled="true">Muestra Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('listar-consultas');?>" tabindex="-1" aria-disabled="true">Consultas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('logout');?>" tabindex="-1" aria-disabled="true">Cerrar Sesión</a>
                    </li>
            </ul>
        </div>
        <?php elseif($perfil==2): ?>
            <div class="btn btn-info active btnUser btn-sm">
                <a href="">Cliente: <?php echo session('nombre'); ?></a>
            </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('prueba'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('consultas'); ?>">Consultas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('logout');?>" tabindex="-1" aria-disabled="true">Cerrar Sesión</a>
                </li>
            </ul>  
        </div>
    </nav>