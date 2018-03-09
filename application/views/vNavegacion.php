


<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="<?php print base_url(); ?>">
        <img src="<?php print base_url(); ?>img/LS.png" width="30px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fichas Técnicas <span class="sr-only">(current)</span></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Fichas Técnicas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Materiales por Combinación</a>
                    <a class="dropdown-item" href="#">Fracciones por Estilo</a>
                    <a class="dropdown-item" href="#">Partes y Materiales</a>
                </div>
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
                    <a class="dropdown-item" href="#">Maquilas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Lineas</a>
                    <a class="dropdown-item" href="#">Estilos</a>
                    <a class="dropdown-item" href="#">Combinaciones</a>
                    <a class="dropdown-item" href="#">Series</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Mano de Obra (Fracciones)</a>
                    <a class="dropdown-item" href="#">Materiales</a>
                </div>

            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configuración
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <!--<li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>-->
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Generales</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Unidades</a></li>
                            <li><a class="dropdown-item" href="#">Monedas</a></li>
                            <li><a class="dropdown-item" href="#">Métodos de Pago</a></li>
                            <li><a class="dropdown-item" href="#">Condiciones de Pago</a></li>
                            <li><a class="dropdown-item" href="#">Bancos</a></li>
                            <li><a class="dropdown-item" href="#">Familias</a></li>
                            <li><a class="dropdown-item" href="#">Departamentos</a></li>
                            <li><a class="dropdown-item" href="#">Trasnportes</a></li>
                            <li><a class="dropdown-item" href="#">Rutas</a></li>
                            <div class="dropdown-divider" href="#"></div>
                            <li><a class="dropdown-item" href="#">Piezas</a></li>
                            <li><a class="dropdown-item" href="#">Temporadas</a></li>
                            <li><a class="dropdown-item" href="#">Hormas</a></li>
                            <li><a class="dropdown-item" href="#">Tipos de Estilo</a></li>
                            <!--<li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu 1</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Subsubmenu1</a></li>
                                    <li><a class="dropdown-item" href="#">Subsubmenu1</a></li>
                                </ul>
                            </li>-->
                        </ul>
                    </li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Usuarios</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php print base_url('CtrlUsuarios') ?>">Usuarios</a></li>
                            <div class="dropdown-divider" ></div>
                            <li><a class="dropdown-item" href="#">Permisos</a></li>
                            <li><a class="dropdown-item" href="#">Módulo</a></li>
                       
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
                    <a class="dropdown-item" href="<?php print base_url('CtrlLogin/onSalir'); ?>">Salir</a>
                </div>

            </li>
        </ul>


    </div>
</nav>