


<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="<?php print base_url(); ?>">
        <img src="<?php print base_url(); ?>img/LS.png" width="30px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse cursor-hand" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Diseño y Desarrollo
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php print base_url('MaterialesXCombinacion') ?>">Materiales por Combinación</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('FraccionesXEstilo') ?>">Fracciones por Estilo</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('PiezasYMateriales') ?>">Piezas y Materiales</a></li>
                    <div class="dropdown-divider" ></div>

                    <li class="nav-item dropdown dropdown-submenu">
                        <a class="nav-link dropdown-toggle text-dark" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Reportes
                        </a>
                        <ul class="dropdown-menu dropdown-submenu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Generales</a>
                                <ul class="dropdown-menu ">
                                    <li><a class="dropdown-item" href="#">Ficha Técnica</a></li>
                                    <div class="dropdown-divider" ></div>
                                    <li><a class="dropdown-item" href="#">Materiales</a></li>
                                    <li><a class="dropdown-item" href="#">Fracciones</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="#">Pedidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Producción</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Catálogos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Clientes</a>
                    <a class="dropdown-item" href="#">Proveedores</a>
                    <a class="dropdown-item" href="#">Almacenes</a>
                    <a class="dropdown-item" href="<?php print base_url('Maquilas') ?>">Maquilas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('Lineas') ?>">Lineas</a>
                    <a class="dropdown-item" href="<?php print base_url('Estilos') ?>">Estilos</a>
                    <a class="dropdown-item" href="<?php print base_url('Combinaciones') ?>">Combinaciones</a>
                    <a class="dropdown-item" href="<?php print base_url('Series') ?>">Series</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('Fracciones') ?>">Mano de Obra (Fracciones)</a>
                    <a class="dropdown-item" href="<?php print base_url('Materiales') ?>">Materiales</a>
                </div>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configuración
                </a>
                <ul class="dropdown-menu dropdown-submenu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php print base_url('Usuarios') ?>">Usuarios</a></li>
                            <div class="dropdown-divider" ></div>
                            <li><a class="dropdown-item" href="<?php print base_url('Permisos') ?>">Permisos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Modulos') ?>">Módulos</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark "  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Generales
                        </a>
                        <ul class="dropdown-menu dropdown-submenu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=UNIDADES') ?>">Unidades</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=MONEDAS') ?>">Monedas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=METODOS PAGO') ?>">Métodos de Pago</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=CONDICIONES PAGO') ?>">Condiciones de Pago</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=BANCOS') ?>">Bancos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=FAMILIAS') ?>">Familias</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=DEPARTAMENTOS') ?>">Departamentos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TRASPORTES') ?>">Trasnportes</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=RUTAS') ?>">Rutas</a></li>
                            <div class="dropdown-divider" href="#"></div>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=PIEZAS') ?>">Piezas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TEMPORADAS') ?>">Temporadas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=HORMAS') ?>">Hormas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TIPOS ESTILO') ?>">Tipos de Estilo</a></li>
                        </ul>
                    </li>

                </ul>
            </li>


        </ul>


        <ul class="navbar-nav navbar-right">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bienvenido : <?php echo $this->session->userdata('USERNAME') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" onclick="onCambiarContrasena();">Cambiar Contraseña</a>
                    <a class="dropdown-item" >Reportar un problema</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('Login/onSalir'); ?>">Salir</a>
                </div>

            </li>
        </ul>





    </div>
</nav>