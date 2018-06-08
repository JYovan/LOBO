<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Permisos</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
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
    <div class="card border-0  d-none" id="pnlDatos">
        <div class="card-body text-dark">
            <form id="frmNuevo">
                <div class="row">
                    <div class="col-md-12 float-left">
                        <legend class="float-left">Permisos</legend>
                    </div>
                </div>
                <div class="row">
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID" >
                    </div>
                    <div class="col-sm">
                        <label for="IdModulo">MODULO*</label>
                        <select class="form-control form-control-sm required" id="IdModulo" name="IdModulo">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="IdUsuario">USUARIO*</label>
                        <select class="form-control form-control-sm required" id="IdUsuario"  name="IdUsuario">
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
                        <select class="form-control form-control-sm required" id="Estatus"  name="Estatus">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 float-right" align="right">
                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
                        <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Permisos/';
    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");
    var nuevo = true;
    $(document).ready(function () {
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
                    pnlDatos.addClass("d-none");
                    pnlTablero.removeClass("d-none");
                    getRecords();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });
        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var f = new FormData();
                f.append('ID', pnlDatos.find("#ID").val());
                f.append('IdUsuario', pnlDatos.find("#IdUsuario").val());
                f.append('UsuarioT', pnlDatos.find("#IdUsuario option:selected").text());
                f.append('IdModulo', pnlDatos.find("#IdModulo").val());
                f.append('ModuloT', pnlDatos.find("#IdModulo option:selected").text());
                f.append('Ver', pnlDatos.find("#Ver")[0].checked ? 1 : 0);
                f.append('Crear', pnlDatos.find("#Crear")[0].checked ? 1 : 0);
                f.append('Modificar', pnlDatos.find("#Modificar")[0].checked ? 1 : 0);
                f.append('Eliminar', pnlDatos.find("#Eliminar")[0].checked ? 1 : 0);
                f.append('Consultar', pnlDatos.find("#Consultar")[0].checked ? 1 : 0);
                f.append('Reportes', pnlDatos.find("#Reportes")[0].checked ? 1 : 0);
                f.append('Buscar', pnlDatos.find("#Buscar")[0].checked ? 1 : 0);
                f.append('Estatus', pnlDatos.find("#Estatus option:selected").text());

                if (!nuevo) {
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
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    $.ajax({
                        url: master_url + 'onAgregar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: f
                    }).done(function (data, x, jq) {
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                        pnlDatos.find('#ID').val(data);
                        getRecords();
                        nuevo = false;
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
            }
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            nuevo = true;
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            nuevo = true;
        });
        /*CALLS*/
        handleEnter();
        getRecords();
        getModulos();
        getUsuarios();
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
                        nuevo = false;
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
                                pnlDatos.find("input").val("");
                                $.each(pnlDatos.find("select"), function (k, v) {
                                    pnlDatos.find("select")[k].selectize.clear(true);
                                });
                                $.each(data[0], function (k, v) {
                                    pnlDatos.find("[name='" + k + "']").val(v);
                                    if (pnlDatos.find("[name='" + k + "']").is(':checkbox')) {
                                        pnlDatos.find("[name='" + k + "']")[0].checked = parseInt(v);
                                    }
                                    if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                        pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                                    }
                                });
                                pnlTablero.addClass("d-none");
                                pnlDatos.removeClass('d-none');
                                $(':input:text:enabled:visible:first').focus();
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
            $.each(data, function (k, v) {
                pnlDatos.find("[name='IdModulo']")[0].selectize.addOption({text: v.MODULO, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getUsuarios() {
        $.getJSON(master_url + 'getUsuarios').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='IdUsuario']")[0].selectize.addOption({text: v.USUARIO, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
</script>
