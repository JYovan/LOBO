<style>
    .dropdown {
        cursor:pointer;
        font-size: 16px !important;
        color: #FAFAFA;
    }
    .dropdown-item {
        padding: 0.25rem 2.2rem !important;
        font-size: 14.5px !important;
        color: #A6A6A6;
    }
    .dropdown-menu {
        background-color: transparent !important;
        border: 0px !important;
        border-radius: 0px !important;
    }
    .overlay {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        background-color: rgba(13, 25, 41, 0.95);
        overflow-x: hidden;
        transition: 0.1s;
    }
    .overlay-content {
        position: relative;
        top: 5%;
        width: 100%;
        margin-top: 5px;
    }
    .overlay a:hover,
    .overlay a:focus {
        color: #F39C12 !important;
    }

    .overlay .closebtn {
        cursor:pointer;
        position: absolute;
        top: 0px;
        right: 20px;
        color: #fff !important;
        font-size: 30px !important;
    }
</style>

<div id="myNav" class="overlay">
    <a class="closebtn " onclick="closeNav()">&times;</a>
    <div class="overlay-content navbar ">
        <ul class=" navbar-nav mr-auto">
            <img src="<?php print base_url(); ?>img/logo_mediano.png" width="160">
            <br>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $this->session->userdata('USERNAME') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="onCambiarContrasena();">Cambiar Contraseña</a>
                    <a class="dropdown-item" href="#">Reportar un problema</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php print base_url('Login/onSalir'); ?>">Salir</a>
                </div>
            </li>
            <div class="dropdown-divider"></div>
            <br>
            <li class="nav-item dropdown " >
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ped y Prog
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php print base_url('Pedidos') ?>">Pedidos</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Programacion') ?>">Programación</a></li>
                    <div class="dropdown-divider" ></div>
                    <li><a class="dropdown-item" href="<?php print base_url('ReportesPedProg') ?>">Reportes</a></li>
                </ul>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Diseño y Desarrollo
                </a>
                <ul class="dropdown-menu">
<!--                    <li><a class="dropdown-item" href="<?php print base_url('MaterialesXCombinacion') ?>">Materiales por Combinación</a></li>-->
                    <li><a class="dropdown-item" href="<?php print base_url('FraccionesXEstilo') ?>">Fracciones por Estilo</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('PiezasYMateriales') ?>">Piezas y Materiales</a></li>
                    <div class="dropdown-divider" ></div>
                    <li><a class="dropdown-item" href="<?php print base_url('ReportesDisDes') ?>">Reportes</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Catálogos
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php print base_url('Clientes') ?>">Clientes</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Proveedores') ?>">Proveedores</a></li>
                    <li><a class="dropdown-item" href="#">Almacenes</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Maquilas') ?>">Maquilas</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Vendedores') ?>">Vendedores</a></li>
                    <div class="dropdown-divider" ></div>
                    <li><a class="dropdown-item" href="<?php print base_url('Lineas') ?>">Lineas</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Estilos') ?>">Estilos</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Combinaciones') ?>">Combinaciones</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Series') ?>">Series</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="<?php print base_url('Fracciones') ?>">Mano de Obra (Fracciones)</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Materiales') ?>">Materiales</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Piezas') ?>">Piezas</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('ListaDePrecios') ?>">Listas de precios</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configuración
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                    <li class="nav-item dropdown dropdown-submenu">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuarios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php print base_url('Usuarios') ?>">Usuarios</a></li>
                            <div class="dropdown-divider" ></div>
                            <li><a class="dropdown-item" href="<?php print base_url('Permisos') ?>">Permisos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Modulos') ?>">Módulos</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown dropdown-submenu">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Generales
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=UNIDADES') ?>">Unidades</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=MONEDAS') ?>">Monedas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=METODOS PAGO') ?>">Métodos de Pago</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=CONDICIONES DE PAGO') ?>">Cond. de Pago</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=BANCOS') ?>">Bancos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=DEPARTAMENTOS') ?>">Departamentos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TRASPORTES') ?>">Transportes</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=RUTAS') ?>">Rutas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=ZONAS') ?>">Zonas</a></li>
<!--                            <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=AGENTES') ?>">Agentes</a></li>-->
                            <div class="dropdown-divider" href="#"></div>

                            <li class="nav-item dropdown dropdown-submenu">
                                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Producción
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=DEP-PROD') ?>">Deptos. Prod.</a></li>
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=DETALLES_PROD') ?>">Detalles Prod.</a></li>
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=PIEZAS') ?>">Piezas</a></li>
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TEMPORADAS') ?>">Temporadas</a></li>
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=HORMAS') ?>">Hormas</a></li>
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=TIPOS ESTILO') ?>">Tipos de Estilo</a></li>
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=PLANTILLAS') ?>">Plantillas</a></li>
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=GENEROS') ?>">Generos</a></li>
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=DEFECTOS') ?>">Defectos</a></li>
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=FAMILIAS') ?>">Familias</a></li>
                                    <li><a class="dropdown-item" href="<?php print base_url('Generales/?modulo=FAMILIAS PROG') ?>">Familias Prog.</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="container-fluid bg-primary">
    <div class="row">
        <div class="col-4 ">
            <button class="btn btn-primary btn-sm" onclick="openNav()">
                <i class="fa fa-bars"></i> Menú Principal
            </button>
        </div>
        <div class="col-4 text-center">

        </div>
        <div class="col-4">
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#myNav > li:not(ul)').click(function (event) {
            event.stopPropagation();
        });
    });
</script>