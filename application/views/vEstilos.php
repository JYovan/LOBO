<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Estilos</legend>
        <div align="right">
            <button type="button" class="btn btn-dark" id="btnNuevo"><span class="fa fa-plus"></span><br>AGREGAR</button>
            <button type="button" class="btn btn-dark" id="btnRefrescar"><span class="fa fa-refresh"></span><br>REFRESCAR</button>
            <button type="button" class="btn btn-dark" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br>ELIMINAR</button>
        </div>

        <div class="card-block">
            <div id="tblRegistros"></div>
        </div>
    </div>
</div>

<!--MODALES--> 
<!--Confirmacion-->
<div class="modal" id="mdlConfirmar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseas eliminar el registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-raised btn-primary" id="btnEliminar">ACEPTAR</button>
            </div>
        </div>
    </div>
</div>

<!--GUARDAR-->
<div id="" class="container-fluid">
    <div class="card border-0  d-none" id="pnlNuevo">
        <div class="card-body text-dark"> 
            <form id="frmNuevo"> 
                <div class="row">
                    <div class="col-md-2 float-left">
                        <legend class="float-left">Nuevo Estilo</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                        <button type="button" class="btn btn-dark" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
                    </div>
                </div> 


                <div class="row"><!--START ROW-->
                    <div class="col-md has-success">
                        <label for="Clave">CLAVE*</label>
                        <input type="text" class="form-control" placeholder="001..." id="Clave" name="Clave">
                    </div>
                    <div class="col-md">
                        <label for="Descripcion">DESCRIPCIÓN*</label>
                        <textarea id="Descripcion" name="Descripcion" rows="4" cols="20" class="form-control form-control-lg">
                        </textarea> 
                    </div>
                    <div class="col-md">
                        <label for="Ano">AÑO*</label>
                        <input type="text" class="form-control" placeholder="001..." id="Ano" name="Ano">
                    </div>
                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Linea">LINEA*</label>
                        <select class="form-control form-control-lg" id="Linea"  name="Linea">  
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Serie">SERIE*</label>
                        <select class="form-control form-control-lg" id="Serie"  name="Serie">  
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Horma">HORMA*</label>
                        <select class="form-control form-control-lg" id="Horma"  name="Horma">  
                        </select>
                    </div>

                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Familia">FAMILIA*</label>
                        <select class="form-control form-control-lg" id="Familia"  name="Familia">  
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Desperdicio">DESPERDICIO*</label>
                        <input type="text" class="form-control" placeholder="0.0001" id="Desperdicio" name="Desperdicio">
                    </div>
                    <div class="col-md">
                        <label for="Desperdicio">PUNTO CENTRAL*</label>
                        <input type="text" class="form-control" placeholder="0.0001" id="PuntoCentral" name="PuntoCentral">
                    </div>

                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Genero">GENERO*</label>
                        <select class="form-control form-control-lg" id="Genero"  name="Genero"> 
                            <option value="MASCULINO">MASCULINO</option>   
                            <option value="FEMENINO">FEMENINO</option>   
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Herramental">HERRAMIENTA*</label>
                        <input type="text" class="form-control" placeholder="" id="Herramental" name="Herramental">
                    </div>
                    <div class="col-md">
                        <label for="Herramental">TIPO DE CONSTRUCCIÓN*</label>
                        <input type="text" class="form-control" placeholder="" id="TipoDeConstruccion" name="TipoDeConstruccion">
                    </div>
                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Maquila">MAQUILA*</label>
                        <select class="form-control form-control-lg" id="Maquila"  name="Maquila">  
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Temporada">TEMPORADA*</label>
                        <select class="form-control form-control-lg" id="Temporada"  name="Temporada">  
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Tipo">TIPO DE ESTILO*</label>
                        <select class="form-control form-control-lg" id="Tipo"  name="Tipo">  
                        </select>
                    </div>
                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Notas">NOTAS*</label>
                        <input type="text" class="form-control" placeholder="" id="Notas" name="Notas">
                    </div>
                    <div class="col-md">
                        <label for="Estatus">MAQUILA O PLANTILLA*</label>
                        <select class="form-control form-control-lg" id="MaquilaPlantilla"  name="MaquilaPlantilla"> 
                            <option value="MAQUILA">MAQUILA</option>  
                            <option value="PLANTILLA">PLANTILLA</option>
                            <option value="MAQUILAS EXTERNAS">MAQUILAS EXTERNAS</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Estatus">ESTATUS*</label>
                        <select class="form-control form-control-lg" id="Estatus"  name="Estatus"> 
                            <option value="ACTIVO">ACTIVO</option>   
                            <option value="INACTIVO">INACTIVO</option>   
                        </select>
                    </div>
                    <div class="col-md">
                        <BR>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Liberado" name="Liberado" checked="">
                            <label class="custom-control-label" for="Liberado">LIBERADO</label>
                        </div>
                    </div>  
                    <div class="w-100"></div> <!--SALTO--> 

                    <!-- FOTO -->
                    <div id="FotoSeleccionada" class="col-sm text-center cursor-hand d-none"></div>
                    <div class="w-100"></div> <!--SALTO--> 
                    <div id="EscogerFoto" class="col-sm text-center cursor-hand">
                        <img class="align-self-center mr-3  cursor-hand" src="<?php print base_url('img/camera.png'); ?>" alt="ESTILO" onclick="">
                        <h1>SELECCIONE UNA IMAGEN</h1>
                    </div> 
                    <div class="col d-none">
                        <input type="file" id="Foto" name="Foto" class="d-none"> 
                    </div> 
                    <!-- FIN FOTO -->
                </div><!--FIN ROW-->
            </form>
        </div> 
    </div> 
</div>

<!--EDITAR--> 
<div id="" class="container-fluid">
    <div class="card border-0  d-none" id="pnlEditar">
        <div class="card-body text-dark"> 
            <form id="frmEditar"> 
                <div class="row">
                    <div class="col-md-2 float-left">
                        <legend class="float-left">Editar Estilo</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                        <button type="button" class="btn btn-dark" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
                    </div>
                </div>  
                <div class="d-none">
                    <input type="text" class="form-control" id="ID" name="ID" required >
                </div> 
                <div class="row"><!--START ROW-->
                    <div class="col-md has-success">
                        <label for="Clave">CLAVE*</label>
                        <input type="text" class="form-control" placeholder="001..." id="ClaveE" name="ClaveE">
                    </div>
                    <div class="col-md">
                        <label for="Descripcion">DESCRIPCIÓN*</label>
                        <textarea id="DescripcionE" name="DescripcionE" rows="4" cols="20" class="form-control form-control-lg">
                        </textarea> 
                    </div>
                    <div class="col-md">
                        <label for="Ano">AÑO*</label>
                        <input type="text" class="form-control" placeholder="001..." id="AnoE" name="AnoE">
                    </div>
                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Linea">LINEA*</label>
                        <select class="form-control form-control-lg" id="LineaE"  name="LineaE">  
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Serie">SERIE*</label>
                        <select class="form-control form-control-lg" id="SerieE"  name="SerieE">  
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Horma">HORMA*</label>
                        <select class="form-control form-control-lg" id="HormaE"  name="HormaE">  
                        </select>
                    </div>

                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Familia">FAMILIA*</label>
                        <select class="form-control form-control-lg" id="FamiliaE"  name="FamiliaE">  
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Desperdicio">DESPERDICIO*</label>
                        <input type="text" class="form-control" placeholder="0.0001" id="DesperdicioE" name="DesperdicioE">
                    </div>
                    <div class="col-md">
                        <label for="Desperdicio">PUNTO CENTRAL*</label>
                        <input type="text" class="form-control" placeholder="0.0001" id="PuntoCentralE" name="PuntoCentralE">
                    </div>

                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Genero">GENERO*</label>
                        <select class="form-control form-control-lg" id="GeneroE"  name="GeneroE"> 
                            <option value="MASCULINO">MASCULINO</option>   
                            <option value="FEMENINO">FEMENINO</option>   
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Herramental">HERRAMIENTA*</label>
                        <input type="text" class="form-control" placeholder="" id="HerramentalE" name="HerramentalE">
                    </div>
                    <div class="col-md">
                        <label for="Herramental">TIPO DE CONSTRUCCIÓN*</label>
                        <input type="text" class="form-control" placeholder="" id="TipoDeConstruccionE" name="TipoDeConstruccionE">
                    </div>
                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Maquila">MAQUILA*</label>
                        <select class="form-control form-control-lg" id="MaquilaE"  name="MaquilaE">  
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Temporada">TEMPORADA*</label>
                        <select class="form-control form-control-lg" id="TemporadaE"  name="TemporadaE">  
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Tipo">TIPO DE ESTILO*</label>
                        <select class="form-control form-control-lg" id="TipoE"  name="TipoE">  
                        </select>
                    </div>
                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Notas">NOTAS*</label>
                        <input type="text" class="form-control" placeholder="" id="NotasE" name="NotasE">
                    </div>
                    <div class="col-md">
                        <label for="Estatus">MAQUILA O PLANTILLA*</label>
                        <select class="form-control form-control-lg" id="MaquilaPlantillaE"  name="MaquilaPlantillaE"> 
                            <option value="MAQUILA">MAQUILA</option>  
                            <option value="PLANTILLA">PLANTILLA</option>
                            <option value="MAQUILAS EXTERNAS">MAQUILAS EXTERNAS</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Estatus">ESTATUS*</label>
                        <select class="form-control form-control-lg" id="EstatusE"  name="EstatusE"> 
                            <option value="ACTIVO">ACTIVO</option>   
                            <option value="INACTIVO">INACTIVO</option>   
                        </select>
                    </div>
                    <div class="col-md">
                        <BR>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="LiberadoE" name="LiberadoE" checked="">
                            <label class="custom-control-label" for="Liberado">LIBERADO</label>
                        </div>
                    </div> 

                    <div class="w-100"></div> <!--SALTO-->
                    <!-- FOTO -->
                    <div id="FotoSeleccionadaE" class="col-sm text-center cursor-hand d-none"></div>
                    <div class="w-100"></div> <!--SALTO--> 
                    <div id="EscogerFotoE" class="col-sm text-center cursor-hand">
                        <img class="align-self-center mr-3  cursor-hand" src="<?php print base_url('img/camera.png'); ?>" alt="ESTILO" onclick="">
                        <h1>SELECCIONE UNA IMAGEN</h1>
                    </div> 
                    <div class="col d-none">
                        <input type="file" id="FotoE" name="FotoE" class="d-none"> 
                    </div> 
                    <!-- FIN FOTO -->
                </div><!--FIN ROW-->
            </form>
        </div> 
    </div> 
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Estilos/';
    var pnlNuevo = $("#pnlNuevo");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlNuevo.find("#btnGuardar");
    var btnCancelar = pnlNuevo.find("#btnCancelar");
    var pnlEditar = $("#pnlEditar");
    var btnModificar = pnlEditar.find("#btnGuardar");
    var btnCancelarModificar = pnlEditar.find("#btnCancelar");
    var btnRefrescar = $("#btnRefrescar");
    var btnEliminar = $("#btnEliminar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");
    $(document).ready(function () {
        handleEnter();
        //Evento clic del boton confirmar borrar
        btnConfirmarEliminar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
                //Muestra el modal
                mdlConfirmar.modal('show');
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });
        btnEliminar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
                HoldOn.open({
                    theme: "sk-bounce",
                    message: "CARGANDO DATOS..."
                });
                $.ajax({
                    url: master_url + 'onEliminar',
                    type: "POST",
                    data: {
                        ID: temp
                    }
                }).done(function (data, x, jq) {

                    mdlConfirmar.modal('hide');
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'ESTILO ELIMINADO', 'danger');
                    pnlEditar.addClass("d-none");
                    pnlTablero.removeClass("d-none");
                    btnRefrescar.trigger('click');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });
        btnModificar.click(function () {
            $.validator.setDefaults({
                ignore: []
            });
            pnlEditar.find('#frmEditar').validate({
                errorClass: 'myErrorClass',
                errorPlacement: function (error, element) {
                    var elem = $(element);
                    error.insertAfter(element);
                },
                rules: {
                    IdModulo: 'required',
                    IdUsuario: 'required'
                },
                // The select element, which would otherwise get the class, is hidden from
                // view.
                highlight: function (element, errorClass, validClass) {
                    var elem = $(element);
                    if (elem.hasClass("select2-offscreen")) {
                        $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
                    } else {
                        elem.addClass(errorClass);
                    }
                },

                //When removing make the same adjustments as when adding
                unhighlight: function (element, errorClass, validClass) {
                    var elem = $(element);
                    if (elem.hasClass("select2-offscreen")) {
                        $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
                    } else {
                        elem.removeClass(errorClass);
                    }
                }
            });
            //Regresa si es valido para los select2
            $('select').on('change', function () {
                $(this).valid();
            });
            //Si es verdadero que hacer

            if (pnlEditar.find('#frmEditar').valid()) {
                var f = new FormData();
                f.append('ID', pnlEditar.find("#ID").val());
                f.append('IdUsuario', pnlEditar.find("#IdUsuarioE").val());
                f.append('UsuarioT', pnlEditar.find("#IdUsuarioE option:selected").text());
                f.append('IdModulo', pnlEditar.find("#IdModuloE").val());
                f.append('ModuloT', pnlEditar.find("#IdModuloE option:selected").text());
                f.append('Ver', pnlEditar.find("#VerE")[0].checked ? 1 : 0);
                f.append('Crear', pnlEditar.find("#CrearE")[0].checked ? 1 : 0);
                f.append('Modificar', pnlEditar.find("#ModificarE")[0].checked ? 1 : 0);
                f.append('Eliminar', pnlEditar.find("#EliminarE")[0].checked ? 1 : 0);
                f.append('Consultar', pnlEditar.find("#ConsultarE")[0].checked ? 1 : 0);
                f.append('Reportes', pnlEditar.find("#ReportesE")[0].checked ? 1 : 0);
                f.append('Buscar', pnlEditar.find("#BuscarE")[0].checked ? 1 : 0);
                f.append('Estatus', pnlEditar.find("#EstatusE option:selected").text());
                $.ajax({
                    url: master_url + 'onModificar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: f
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HAN MODIFICADO LOS ESTILOS', 'success');
                    getRecords();
                    pnlTablero.removeClass("d-none");
                    pnlEditar.addClass('d-none');
                    console.log(data, x, jq);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
        btnGuardar.click(function () {
            $.validator.setDefaults({
                ignore: []
            });
            $('#frmNuevo').validate({
                errorClass: 'myErrorClass',
                errorPlacement: function (error, element) {
                    var elem = $(element);
                    error.insertAfter(element);
                },
                rules: {
                    IdModulo: 'required',
                    IdUsuario: 'required'
                },
                // The select element, which would otherwise get the class, is hidden from
                // view.
                highlight: function (element, errorClass, validClass) {
                    var elem = $(element);
                    if (elem.hasClass("select2-offscreen")) {
                        $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
                    } else {
                        elem.addClass(errorClass);
                    }
                },

                //When removing make the same adjustments as when adding
                unhighlight: function (element, errorClass, validClass) {
                    var elem = $(element);
                    if (elem.hasClass("select2-offscreen")) {
                        $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
                    } else {
                        elem.removeClass(errorClass);
                    }
                }
            });
            //Regresa si es valido para los select2
            $('select').on('change', function () {
                $(this).valid();
            });
            //Regresa verdadero si ya se cumplieron las reglas, si no regresa falso
            //Si es verdadero que hacer
            if (pnlNuevo.find('#frmNuevo').valid()) {
                var f = new FormData();
                f.append('Clave', pnlNuevo.find("#Clave").val());
                f.append('Linea', pnlNuevo.find("#Linea").val());
                f.append('Descripcion', pnlNuevo.find("#Descripcion").val());
                f.append('Familia', pnlNuevo.find("#Familia").val());
                f.append('Serie', pnlNuevo.find("#Serie").val());
                f.append('Horma', pnlNuevo.find("#Horma").val());
                f.append('Genero', pnlNuevo.find("#Genero option:selected").text());
                f.append('Desperdicio', pnlNuevo.find("#Desperdicio").val());
                f.append('Herramental', pnlNuevo.find("#Herramental").val());
                f.append('Maquila', pnlNuevo.find("#Maquila").val());
                f.append('Notas', pnlNuevo.find("#Notas").val());
                f.append('Ano', pnlNuevo.find("#Ano").val());
                f.append('Temporada', pnlNuevo.find("#Temporada").val());
                f.append('PuntoCentral', pnlNuevo.find("#PuntoCentral").val());
                f.append('Tipo', pnlNuevo.find("#Tipo").val());
                f.append('MaquilaPlantilla', pnlNuevo.find("#MaquilaPlantilla option:selected").text());
                f.append('TipoDeConstruccion', pnlNuevo.find("#TipoDeConstruccion").val());
                f.append('Linea', pnlNuevo.find("#Linea").val());
                f.append('Liberado', pnlNuevo.find("#Liberado")[0].checked ? 1 : 0);
                f.append('Estatus', pnlNuevo.find("#Estatus option:selected").text());
                $.ajax({
                    url: master_url + 'onAgregar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: f
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO ESTILO', 'success');
                    getRecords();
                    pnlTablero.removeClass("d-none");
                    pnlNuevo.addClass('d-none');
                    console.log(data, x, jq);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
        btnRefrescar.click(function () {
            getRecords();
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlNuevo.removeClass('d-none');
            pnlNuevo.find("input").val("");
            pnlNuevo.find("select").select2("val", "");
            pnlNuevo.find("#Clave").focus();
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlNuevo.addClass('d-none');
            btnRefrescar.trigger('click');
        });
        btnCancelarModificar.click(function () {
            pnlEditar.addClass("d-none");
            pnlTablero.removeClass("d-none");
            btnRefrescar.trigger('click');
        });

        /*ESCOGER FOTO NUEVO*/
        pnlNuevo.find("#EscogerFoto").click(function () {
            pnlNuevo.find("#FotoSeleccionada").removeClass("d-none");
            var Archivo = pnlNuevo.find("#Foto");/*BOTON FILE*/
            var VistaPreviaX = pnlNuevo.find("#FotoSeleccionada");/*UBICACION*/
            Archivo.change(function () {
                HoldOn.open({
                    theme: 'sk-cube',
                    message: 'ESPERE...'
                });
                var imageType = /image.*/;
                if (Archivo[0].files[0] !== undefined && Archivo[0].files[0].type.match(imageType)) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = '<img src="' + reader.result + '" class="img-responsive" >';
                        VistaPreviaX.html(preview);
                    };
                    reader.readAsDataURL(Archivo[0].files[0]);
                } else {
                    if (Archivo[0].files[0] !== undefined && Archivo[0].files[0].type.match('application/pdf')) {
                        var readerpdf = new FileReader();
                        readerpdf.onload = function (e) {
                            VistaPreviaX.html('<hr> <embed src="' + readerpdf.result + '" type="application/pdf" width="100%" height="600px"' +
                                    ' pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">');
                        };
                        readerpdf.readAsDataURL(Archivo[0].files[0]);
                    } else {
                        VistaPreviaX.html('EL ARCHIVO SE SUBIRÁ, PERO NO ES POSIBLE RECONOCER SI ES UN PDF O UNA IMAGEN');
                    }
                }
                HoldOn.close();
            });
            Archivo.trigger('click');
        });
        /*FIN ESCOGER FOTO NUEVO*/

        /*ESCOGER FOTO EDITAR*/
        pnlEditar.find("#EscogerFotoE").click(function () {
            pnlEditar.find("#FotoSeleccionadaE").removeClass("d-none");
            var Archivo = pnlEditar.find("#FotoE");/*BOTON FILE*/
            var VistaPreviaX = pnlEditar.find("#FotoSeleccionadaE");/*UBICACION*/
            Archivo.change(function () {
                HoldOn.open({
                    theme: 'sk-cube',
                    message: 'ESPERE...'
                });
                var imageType = /image.*/;
                if (Archivo[0].files[0] !== undefined && Archivo[0].files[0].type.match(imageType)) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = '<img src="' + reader.result + '" class="img-responsive" >';
                        VistaPreviaX.html(preview);
                    };
                    reader.readAsDataURL(Archivo[0].files[0]);
                } else {
                    if (Archivo[0].files[0] !== undefined && Archivo[0].files[0].type.match('application/pdf')) {
                        var readerpdf = new FileReader();
                        readerpdf.onload = function (e) {
                            VistaPreviaX.html('<hr> <embed src="' + readerpdf.result + '" type="application/pdf" width="100%" height="600px"' +
                                    ' pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">');
                        };
                        readerpdf.readAsDataURL(Archivo[0].files[0]);
                    } else {
                        VistaPreviaX.html('EL ARCHIVO SE SUBIRÁ, PERO NO ES POSIBLE RECONOCER SI ES UN PDF O UNA IMAGEN');
                    }
                }
                HoldOn.close();
            });
            Archivo.trigger('click');
        });
        /*FIN ESCOGER FOTO EDITAR*/

        /*CALLS*/
        btnRefrescar.trigger('click');
    });
    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getRecords',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $("#tblRegistros").html(getTable('tblEstilos', data));

                $('#tblEstilos tfoot th').each(function () {
                    $(this).html('');
                });
                var tblSelected = $('#tblEstilos').DataTable(tableOptions);
                $('#tblEstilos_filter input[type=search]').focus();

                $('#tblEstilos tbody').on('click', 'tr', function () {

                    $("#tblEstilos tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });

                $('#tblEstilos tbody').on('dblclick', 'tr', function () {
                    $("#tblEstilos tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    if (index === -1) {
                        selected.push(id);
                    } else {
                        selected.splice(index, 1);
                    }
                    var dtm = tblSelected.row(this).data();
                    if (temp !== 0 && temp !== undefined && temp > 0) {
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.ajax({
                            url: master_url + 'getEstiloByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            if (data.length > 0) {
                                var dtm = data[0];
                                pnlEditar.find("input").val("");
                                pnlEditar.find("select").select2("val", "");
                                pnlEditar.find("#ID").val(dtm.ID);
                                pnlEditar.find("#ClaveE").val(dtm.Clave);
                                pnlEditar.find("#DescripcionE").val(dtm.Descripcion);
                                pnlEditar.find("#AnoE").val(dtm.Ano);
                                pnlTablero.addClass("d-none");
                                pnlEditar.removeClass('d-none');
                            }
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                    }
                });
                // Apply the search
                tblSelected.columns().every(function () {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO SE ENCONTRARON REGISTROS', 'danger');
            }

        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getModulos() {
        $.getJSON(master_url + 'getModulos').done(function (data, x, jq) {
            console.log('MODULOS');


            var options = '<option></option>';
            $.each(data, function (k, v) {
                options += '<option value="' + v.ID + '">' + v.MODULO + '</option>';
            });
            $("#pnlNuevo").find("#IdModulo").html(options);
            $("#pnlEditar").find("#IdModuloE").html(options);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getUsuarios() {
        $.getJSON(master_url + 'getUsuarios').done(function (data, x, jq) {

            var options = '<option></option>';
            $.each(data, function (k, v) {
                options += '<option value="' + v.ID + '">' + v.USUARIO + '</option>';
            });
            $("#pnlNuevo").find("#IdUsuario").html(options);
            $("#pnlEditar").find("#IdUsuarioE").html(options);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onSeleccionarImagen(type, e) {
        switch (type) {
            case 'nuevo':
                pnlNuevo.find("#Foto").trigger('click');
                break;
            case 'editar':
                pnlEditar.find("#Foto").trigger('click');
                break;
        }

    }
</script>
