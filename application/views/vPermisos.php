<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Permisos</legend>
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
                        <legend class="float-left">Nuevo Permiso</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                        <button type="button" class="btn btn-dark" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
                    </div>
                </div>  
                <div class="row">  
                    <div class="col-sm">
                        <label for="IdModulo">MODULO*</label>
                        <select class="form-control form-control-lg" id="IdModulo" name="IdModulo">
                            <option value=""></option>   
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="IdUsuario">USUARIO*</label>
                        <select class="form-control form-control-lg" id="IdUsuario"  name="IdUsuario"> 
                            <option value=""></option>   
                        </select>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body"> 
                        <div class="row">
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Ver" name="Ver" checked="">
                                    <label class="custom-control-label" for="Ver">VER</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Crear" name="Crear" checked="">
                                    <label class="custom-control-label" for="Crear">CREAR</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Modificar" name="Modificar" checked="">
                                    <label class="custom-control-label" for="Modificar">MODIFICAR</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Eliminar" name="Eliminar" checked="">
                                    <label class="custom-control-label" for="Eliminar">ELIMINAR</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Consultar" name="Consultar" checked="">
                                    <label class="custom-control-label" for="Consultar">CONSULTAR</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Reportes" name="Reportes" checked="">
                                    <label class="custom-control-label" for="Reportes">REPORTES</label>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Buscar" name="Buscar" checked="">
                                    <label class="custom-control-label" for="Buscar">BUSCAR</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--FIN CARD-->

                <div class="row">  
                    <div class="col-sm">
                        <label for="Estatus">ESTATUS*</label>
                        <select class="form-control form-control-lg" id="Estatus"  name="Estatus"> 
                            <option value="ACTIVO">ACTIVO</option>   
                            <option value="INACTIVO">INACTIVO</option>   
                        </select>
                    </div> 
                </div>
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
                        <legend class="float-left">Editar Permiso</legend>
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
                <div class="row">  
                    <div class="col-sm">
                        <label for="IdModulo">MODULO*</label>
                        <select class="form-control form-control-lg" id="IdModuloE" name="IdModuloE">
                            <option value=""></option>   
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="IdUsuario">USUARIO*</label>
                        <select class="form-control form-control-lg" id="IdUsuarioE"  name="IdUsuarioE"> 
                            <option value=""></option>   
                        </select>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body"> 
                        <div class="row">
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="VerE" name="VerE" checked="">
                                    <label class="custom-control-label" for="VerE">VER</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="CrearE" name="CrearE" checked="">
                                    <label class="custom-control-label" for="CrearE">CREAR</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ModificarE" name="ModificarE" checked="">
                                    <label class="custom-control-label" for="ModificarE">MODIFICAR</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="EliminarE" name="EliminarE" checked="">
                                    <label class="custom-control-label" for="EliminarE">ELIMINAR</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ConsultarE" name="ConsultarE" checked="">
                                    <label class="custom-control-label" for="ConsultarE">CONSULTAR</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ReportesE" name="ReportesE" checked="">
                                    <label class="custom-control-label" for="ReportesE">REPORTES</label>
                                </div>
                            </div> 
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="BuscarE" name="BuscarE" checked="">
                                    <label class="custom-control-label" for="BuscarE">BUSCAR</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--FIN CARD-->

                <div class="row">  
                    <div class="col-sm">
                        <label for="Estatus">ESTATUS*</label>
                        <select class="form-control form-control-lg" id="EstatusE" name="EstatusE"> 
                            <option value="ACTIVO">ACTIVO</option>   
                            <option value="INACTIVO">INACTIVO</option>   
                        </select>
                    </div> 
                </div>
            </form>
        </div> 
    </div> 
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Permisos/';
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
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'PERMISO ELIMINADO', 'danger');
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
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HAN MODIFICADO LOS PERMISOS', 'success');
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
                f.append('IdUsuario', pnlNuevo.find("#IdUsuario").val());
                f.append('UsuarioT', pnlNuevo.find("#IdUsuario option:selected").text());
                f.append('IdModulo', pnlNuevo.find("#IdModulo").val());
                f.append('ModuloT', pnlNuevo.find("#IdModulo option:selected").text());
                f.append('Ver', pnlNuevo.find("#Ver")[0].checked ? 1 : 0);
                f.append('Crear', pnlNuevo.find("#Crear")[0].checked ? 1 : 0);
                f.append('Modificar', pnlNuevo.find("#Modificar")[0].checked ? 1 : 0);
                f.append('Eliminar', pnlNuevo.find("#Eliminar")[0].checked ? 1 : 0);
                f.append('Consultar', pnlNuevo.find("#Consultar")[0].checked ? 1 : 0);
                f.append('Reportes', pnlNuevo.find("#Reportes")[0].checked ? 1 : 0);
                f.append('Buscar', pnlNuevo.find("#Buscar")[0].checked ? 1 : 0);
                f.append('Estatus', pnlNuevo.find("#Estatus option:selected").text());
                $.ajax({
                    url: master_url + 'onAgregar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: f
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO PERMISO', 'success');
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
            getModulos();
            getUsuarios();
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlNuevo.removeClass('d-none');
            pnlNuevo.find("input").val("");
            pnlNuevo.find("select").select2("val", "");
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
                $("#tblRegistros").html(getTable('tblUsuarios', data));

                $('#tblUsuarios tfoot th').each(function () {
                    $(this).html('');
                });
                var tblSelected = $('#tblUsuarios').DataTable(tableOptions);
                $('#tblUsuarios_filter input[type=search]').focus();

                $('#tblUsuarios tbody').on('click', 'tr', function () {

                    $("#tblUsuarios tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });

                $('#tblUsuarios tbody').on('dblclick', 'tr', function () {
                    $("#tblTramiteDeFacturas tbody tr").removeClass("success");
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
                            url: master_url + 'getPermisoByID',
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
                                pnlEditar.find("#IdModuloE").val(dtm.IdModulo).trigger('change'); 
                                pnlEditar.find("#IdUsuarioE").val(dtm.IdUsuario).trigger('change'); 
                                pnlEditar.find("#EstatusE").val(dtm.Estatus).trigger('change'); 
                                pnlEditar.find("#VerE")[0].checked = parseInt(dtm.Ver);
                                pnlEditar.find("#CrearE")[0].checked = parseInt(dtm.Crear);
                                pnlEditar.find("#ModificarE")[0].checked = parseInt(dtm.Modificar);
                                pnlEditar.find("#EliminarE")[0].checked = parseInt(dtm.Eliminar);
                                pnlEditar.find("#ConsultarE")[0].checked = parseInt(dtm.Consultar);
                                pnlEditar.find("#ReportesE")[0].checked = parseInt(dtm.Reportes);
                                pnlEditar.find("#BuscarE")[0].checked = parseInt(dtm.Buscar);
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
</script>
