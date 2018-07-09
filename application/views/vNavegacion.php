<style>
    .overlay .dropdown {
        cursor:pointer;
        font-size: 15.5px !important;
        color: #FAFAFA;
    }
    .overlay .dropdown-item {
        padding: 0.25rem 1rem !important;
        font-size: 14.5px !important;
        color: #A6A6A6;
    }
    .overlay .dropdown-menu {
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
        background-color: transparent !important;
        color: #00ccff !important;
    }

    .overlay .closebtn {
        cursor:pointer;
        position: absolute;
        top: 0px;
        right: 20px;
        color: #fff !important;
        font-size: 30px !important;
    }

    li a{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    li a:hover {
        -webkit-transform: scale(1.15);
        transform: scale(1.15);
        margin-left: 25px !important;
    }
    .neon{
        color: #fff !important;
    }

    .overlay a.neon:hover{
        background-color: transparent !important;
        color: #fff !important;
        -webkit-animation: neon 1.5s ease-in-out infinite alternate;
        -moz-animation: neon 1.5s ease-in-out infinite alternate;
        animation: neon 1.5s ease-in-out infinite alternate;
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
                    <span class="fa fa-user"></span>        <?php echo $this->session->userdata('USERNAME') ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="onCambiarContrasena();">Cambiar Contraseña</a>
                    <a class="dropdown-item" href="#">Reportar un problema</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item neon" href="<?php print base_url('Login/onSalir'); ?>">Salir</a>
                </div>
            </li>
            <div class="dropdown-divider"></div>
            <br>
            <li class="nav-item dropdown " >
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-shopping-cart"></span>       Compras
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php print base_url('Compras.rb') ?>"><span class="fa fa-cart-plus"></span>       Compras</a></li>
                    <div class="dropdown-divider" ></div>
                    <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#mdlExplosionInsumos"><span class="fa fa-expand-arrows-alt"></span>      Reporte Explosión</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown " >
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-calendar-alt"></span>        Ped y Prog
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php print base_url('Pedidos.rb') ?>"><span class="fa fa-calendar-plus"></span>        Pedidos</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Programacion.rb') ?>"><span class="fa fa-calendar-check"></span>        Programación</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('CerrarProg.rb') ?>"><span class="fa fa-calendar-times"></span>        CerrarProg</a></li>
                    <div class="dropdown-divider" ></div>
                    <li><a class="dropdown-item" href="<?php print base_url('ReportesPedProg.rb') ?>"><span class="fa fa-calendar"></span>        Reportes</a></li>
                </ul>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-edit"></span>        Diseño y Desarrollo
                </a>
                <ul class="dropdown-menu">
<!--                    <li><a class="dropdown-item" href="<?php print base_url('MaterialesXCombinacion.rb') ?>">Materiales por Combinación</a></li>-->
                    <li><a class="dropdown-item" href="<?php print base_url('FraccionesXEstilo.rb') ?>"><span class="fa fa-hands-helping"></span>        Mano de Obra</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('FichaTecnica.rb') ?>"><span class="fa fa-id-card"></span>        Ficha Técnica</a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="<?php print base_url('ReportesDisDes.rb') ?>"><span class="fa fa-file"></span>        Reportes</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-copy"></span>        Catálogos
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php print base_url('Clientes.rb') ?>"><span class="fa fa-users"></span>        Clientes</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Proveedores.rb') ?>"><span class="fa fa-truck"></span>        Proveedores</a></li>
                    <li><a class="dropdown-item" href="#"><span class="fa fa-box"></span>        Almacenes</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Maquilas.rb') ?>"><span class="fa fa-industry"></span>         Maquilas</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Vendedores.rb') ?>"><span class="fa fa-blind"></span>         Vendedores</a></li>
                    <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=BANCOS') ?>"><span class="fa fa-piggy-bank"></span>         Bancos</a></li>
                    <li class="nav-item dropdown dropdown-submenu">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-puzzle-piece"></span>         Materiales
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php print base_url('Materiales.rb') ?>"><span class="fa fa-puzzle-piece"></span>           Materiales</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Rangos.rb') ?>"><span class="fa fa-ellipsis-h"></span>         Rangos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown dropdown-submenu">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-chart-line"></span>         Producción
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php print base_url('Lineas.rb') ?>"><span class="fa fa-lines"></span>         Lineas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Estilos.rb') ?>">Estilos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Combinaciones.rb') ?>">Combinaciones</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Series.rb') ?>">Series</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="<?php print base_url('ListaDePrecios.rb') ?>">Listas de precios</a></li>
                            <div class="dropdown-divider" ></div>
                            <li><a class="dropdown-item" href="<?php print base_url('Departamentos.rb') ?>">Departamentos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Maquinaria.rb') ?>">Maquinaria</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Fracciones.rb') ?>">Mano de Obra</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Puestos.rb') ?>">Puestos de Trabajo</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="<?php print base_url('Piezas.rb') ?>">Piezas</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=DEP-PROD') ?>">Deptos. Prod.</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=DETALLES_PROD') ?>">Detalles Prod.</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=TEMPORADAS') ?>">Temporadas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=HORMAS') ?>">Hormas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=TIPOS ESTILO') ?>">Tipos de Estilo</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=PLANTILLAS') ?>">Plantillas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=GENEROS') ?>">Generos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=DEFECTOS') ?>">Defectos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=FAMILIAS') ?>">Familias</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=FAMILIAS PROG') ?>">Familias Prog.</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-cogs"></span>         Configuración
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                    <li class="nav-item dropdown dropdown-submenu">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-user-circle"></span>         Usuarios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php print base_url('Usuarios.rb') ?>">Usuarios</a></li>
                            <div class="dropdown-divider" ></div>
                            <li><a class="dropdown-item" href="<?php print base_url('Permisos.rb') ?>">Permisos</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Modulos.rb') ?>">Módulos</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown dropdown-submenu">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-cog"></span>         Generales
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=UNIDADES') ?>">Unidades</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=MONEDAS') ?>">Monedas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=METODOS PAGO') ?>">Métodos de Pago</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=CONDICIONES DE PAGO') ?>">Cond. de Pago</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=TRANSPORTES') ?>">Transportes</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=RUTAS') ?>">Rutas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Generales.rb/?modulo=ZONAS') ?>">Zonas</a></li>
                            <li><a class="dropdown-item" href="<?php print base_url('Semanas.rb') ?>">Semanas</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="container-fluid bg-primary">
    <div class="row">
        <div class="col-2 ">
            <button class="btn btn-primary btn-sm mt-1 mb-1" onclick="openNav()">
                <i class="fa fa-bars"></i> Menú
            </button>
        </div>
        <div class="col-10 float-right" align="right">
            <a  class="btn btn-primary btn-sm mt-1 mb-1" href="<?php print base_url('Login/onSalir'); ?>" >
                <i class="fa fa-sign-out-alt"></i> Salir</a>

<!--            <span class="text-light">
            <?php echo $this->session->userdata('Nombre') . ' ' . $this->session->userdata('Apellidos'); ?>
<img src="<?php print base_url(); ?>img/logo.png" width="50px" class="mt-1 mb-1">
</span>-->
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
<?php
$this->load->view('vReporteExplosion');
