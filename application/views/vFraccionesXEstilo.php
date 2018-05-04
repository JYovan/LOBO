<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Fracciones Por Estilo</legend>
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
<!--Confirmacion Eliminar Concepto-->
<div class="modal" id="mdlConfirmarEliminarRenglon" tabindex="-1" role="dialog">
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
                <button type="button" class="btn btn-raised btn-primary" id="btnEliminarRenglon">ACEPTAR</button>
            </div>
        </div>
    </div>
</div>
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
<div class="card border-0  d-none" id="pnlDatos">
    <div class="card-body text-dark">
        <form id="frmNuevo">
            <div class="row">
                <div class="col-md-3 float-left">
                    <legend class="float-left">Fracciones por Estilo</legend>
                </div>
                <div class="col-md-6 float-right">
                </div>
                <div class="col-md-3 float-right" align="right">
                    <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                    <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
                </div>
            </div>
            <br>
            <div class=" row">
                <div class="d-none">
                    <input type="text" class="" id="ID" name="ID"  >
                </div>
                <div class="col-sm-3">
                    <label for="Estilo">Estilo*</label>
                    <select class="form-control form-control-sm required " id="Estilo" name="Estilo" required>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="Estatus">Estatus*</label>
                    <select class="form-control form-control-sm required"  name="Estatus" required>
                        <option value=""></option>
                        <option>ACTIVO</option>
                        <option>INACTIVO</option>
                    </select>
                </div>
            </div>
        </form>
        <!--AGREGAR DETALLE-->
        <div class="d-none" id="pnlControlesDetalle">

            <div class=" row">
                <div class="col-sm-3">
                    <label for="Departamento">Departamento</label>
                    <select class="form-control form-control-sm " id="Departamento" name="Departamento">
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="Fraccion">Fraccion</label>
                    <select class="form-control form-control-sm " id="Fraccion" name="Fraccion">
                    </select>
                </div>
                <div class="col-sm-1">
                    <label for="Precio">Precio</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="9" name="Precio" >
                </div>
                <div class="col-sm-1">
                    <label for="Cantidad">Cantidad</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="5" name="Cantidad" >
                </div>
                <div class="col-12 col-md-1 col-sm-1">
                    <br>
                    <button  class="btn btn-primary btn-sm" id="btnAgregarDetalle" data-toggle="tooltip" data-placement="top" title="Agregar" >
                        <i class="fa fa-plus"></i>
                    </button>
                </div>

            </div>

        </div>
    </div>
</div>
<!--DETALLE-->
<div class="d-none card-body" id="pnlDetalle">
    <!--DETALLE-->
    <div class="row">
        <div class=" col-md-9 ">
            <div class="row">
                <div class="table-responsive" id="RegistrosDetalle">

                </div>
            </div>
            <div class="" align="center" style="background-color: #fff ">
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-2 text-dark">
                    </div>
                    <div class="col-sm-2 text-info">
                    </div>
                    <div class="col-sm-2 text-danger">
                    </div>
                    <div class="col-sm-2 text-success">
                        Total: <br>
                        <div id="ImporteTotal" ><strong>$0.0</strong></div>
                    </div>
                    <div class="col-sm-2 text-success">
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <label for="">Foto del Artículo</label>
            <div id="VistaPrevia" >
                <img src="<?php echo base_url(); ?>img/camera.png" class="img-thumbnail img-fluid"/>
            </div>

        </div>

    </div>
    <!--FIN DETALLE-->
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/FraccionesXEstilo/';

    var pnlDatos = $("#pnlDatos");
    var pnlControlesDetalle = $('#pnlControlesDetalle');
    var pnlTablero = $("#pnlTablero");
    var pnlDetalle = $("#pnlDetalle");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnModificar = pnlDatos.find("#btnModificar");
    var btnEliminar = $("#btnEliminar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");
    var Estilo = pnlDatos.find("#Estilo");
    var mdlConfirmarEliminarRenglon = $("#mdlConfirmarEliminarRenglon");
    var btnEliminarRenglon = $("#btnEliminarRenglon");
    var tempDetalle = 0;
    var btnAgregarDetalle = $("#btnAgregarDetalle");

    var IdMovimiento = 0;
    var nuevo = true;

    var guardar;

    var tblInicial = {
        "dom": 'frt',
        "autoWidth": false,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollCollapse": true,
        "bSort": true,
        "aaSorting": [
            [0, 'desc']/*ID*/
        ]
    };

    $(document).ready(function () {
        btnAgregarDetalle.click(function () {
            btnGuardar.trigger('click');
        });

        pnlDatos.find("[name='Estilo']").change(function () {
            getFotoXEstilo($(this).val());
        });
        //Evento en el control de cantidad
        pnlControlesDetalle.find("[name='Cantidad']").blur(function () {
            if ($(this).val() !== '') {
                btnAgregarDetalle.trigger('click');
            } else {
                swal('INFO', 'DEBES DE CAPTURAR UNA CANTIDAD', 'info');
            }
        });
        //Evento en el control de precio
        pnlControlesDetalle.find("[name='Precio']").blur(function () {
            if ($(this).val() !== '') {
                //btnAgregarDetalle.trigger('click');
            } else {
                swal('INFO', 'DEBES DE CAPTURAR UN PRECIO', 'info');
            }
        });

        pnlControlesDetalle.find("[name='Departamento']").change(function () {
            pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.clear(true);
            pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.clearOptions();
            getFraccionesXDepto($(this).val());
        });

        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    $.ajax({
                        url: master_url + 'onModificar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        onAgregarFila(IdMovimiento);
                        limpiarCampos();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    var valEstilo = Estilo[0].selectize.getValue();
                    $.getJSON(master_url + 'onComprobarExisteEstilo', {Estilo: valEstilo}).done(function (data, x, jq) {
                        if (parseInt(data[0].EXISTE) > 0) {
                            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL ESTILO YA EXISTE', 'danger');
                            pnlDatos.find("[name='Estilo']")[0].selectize.refreshOptions();
                        } else {
                            $.ajax({
                                url: master_url + 'onAgregar',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: frm
                            }).done(function (data, x, jq) {
                                onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                                pnlDatos.find('#ID').val(data);
                                nuevo = false;
                                getRecords();
                                Estilo[0].selectize.disable();
                                pnlDetalle.removeClass('d-none');
                                IdMovimiento = data;

                                //Agregar renglon Detalle
                                onAgregarFila(IdMovimiento);

                                getFraccionesXEstiloDetallebyFraccionesXEstilo(data);
                                nuevo = false;
                                //Limpiar los campos del detalle
                                limpiarCampos();

                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                            });
                        }
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });

                }


            }
        });
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
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'REIGISTRO ELIMINADO', 'danger');
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
        btnEliminarRenglon.click(function () {
            if (tempDetalle !== 0 && tempDetalle !== undefined && tempDetalle > 0) {
                HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
                $.ajax({
                    url: master_url + 'onEliminarRenglonDetalle',
                    type: "POST",
                    data: {
                        ID: tempDetalle
                    }
                }).done(function (data, x, jq) {
                    mdlConfirmarEliminarRenglon.modal('hide');
                    getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find("input").val("");
            pnlControlesDetalle.find("input").val("");
            pnlControlesDetalle.removeClass('d-none');
            pnlDetalle.removeClass('d-none');
            Estilo[0].selectize.enable();
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            pnlDetalle.addClass('d-none');
            nuevo = true;
        });
        getRecords();
        getEstilos();
        getDepartamentos();
        handleEnter();
    });



    /*AGREGAR DETALLE NORMAL*/
    function onAgregarFila(MovID) {
        var Fraccion = pnlControlesDetalle.find("[name='Fraccion']");
        var Precio = pnlControlesDetalle.find("[name='Precio']");
        var Cantidad = pnlControlesDetalle.find("[name='Cantidad']");
        /*COMPROBAR SI YA SE AGREGÓ*/
        var fraccion_existe = false;
        /*VALIDAR QUE ESTEN TODOS LOS CAMPOS LLENOS PARA AGREGARLO*/
        if (Fraccion.val() !== "" && Precio.val() !== "" && Cantidad.val() !== "") {
            if (pnlDetalle.find("#tblRegistrosDetalle tbody tr").length > 0) {
                $.each(pnlDetalle.find("#tblRegistrosDetalle tbody tr"), function () {
                    var fraccion = $(this).find("td").eq(1).text();
                    if (parseFloat(fraccion) === parseFloat(Fraccion.val())) {
                        fraccion_existe = true;
                        return false;
                    }
                });
            }
            /*VALIDAR QUE EXISTA*/
            if (!fraccion_existe) {
                var frm = new FormData();
                frm.append('FraccionXEstilo', IdMovimiento);
                frm.append('Fraccion', Fraccion.val());
                frm.append('Precio', Precio.val());
                frm.append('Cantidad', Cantidad.val());

                $.ajax({
                    url: master_url + 'onAgregarDetalle',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
                    HoldOn.close();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                swal('INFO', 'YA HAS AGREGADO ESTA FRACCION', 'warning');
            }
        }
    }

    function limpiarCampos() {
        pnlControlesDetalle.find("[name='Departamento']")[0].selectize.focus();
        pnlControlesDetalle.find("[name='Precio']").val('');
        pnlControlesDetalle.find("[name='Cantidad']").val('');
        pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.clear(true);
        pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.clearOptions();
    }

    function getEstilos() {
        $.getJSON(master_url + 'getEstilos').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Estilo']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getDepartamentos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getDepartamentos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlControlesDetalle.find("[name='Departamento']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getFraccionesXDepto(Depto) {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getFraccionesXDepto',
            type: "POST",
            dataType: "JSON",
            data: {
                DepartamentoCat: Depto
            }
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onModificarPrecioFraccionXEstilo(value, IDX) {
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
        $.ajax({
            url: master_url + 'onModificarDetalle',
            type: "POST",
            data: {
                ID: IDX,
                Precio: value === '' || value === null ? 0 : value
            }
        }).done(function (data, x, jq) {
            getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onModificarCantidadFraccionXEstilo(value, IDX) {
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
        $.ajax({
            url: master_url + 'onModificarDetalle',
            type: "POST",
            data: {
                ID: IDX,
                Cantidad: value === '' || value === null ? 0 : value
            }
        }).done(function (data, x, jq) {
            getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });

    }

    function onModificarOrdenFraccionXEstilo(value, IDX) {
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
        $.ajax({
            url: master_url + 'onModificarDetalle',
            type: "POST",
            data: {
                ID: IDX,
                Orden: value === '' || value === null ? 0 : value
            }
        }).done(function (data, x, jq) {
            getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onEliminarRenglonDetalle(IDX) {
        tempDetalle = IDX;
        mdlConfirmarEliminarRenglon.modal('show');
    }

    function getFraccionesXEstiloDetallebyFraccionesXEstilo(IDX) {
        var total = 0;
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
        $.ajax({
            url: master_url + 'getFraccionesXEstiloDetallebyFraccionesXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                ID: IDX
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                pnlDetalle.find("#RegistrosDetalle").html(getTable('tblRegistrosDetalle', data));
                $('#tblRegistrosDetalle tfoot th').each(function () {
                    $(this).addClass("d-none");
                });
                var thead = pnlDetalle.find('#tblRegistrosDetalle thead th');
                var tfoot = pnlDetalle.find('#tblRegistrosDetalle tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(1).addClass("d-none");
                tfoot.eq(1).addClass("d-none");
                thead.eq(5).addClass("d-none");
                tfoot.eq(5).addClass("d-none");
                $.each(pnlDetalle.find('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                    td.eq(5).addClass("d-none");
                    total += getNumberFloat(td.eq(5).text());
                });

                pnlDetalle.find('#ImporteTotal').html('Total: $' + $.number(total, 2, '.', ', '));
                var tblSelected = pnlDetalle.find("#tblRegistrosDetalle").DataTable(tblInicial);
                pnlDetalle.find('#tblRegistrosDetalle tbody').on('click', 'tr', function () {
                    $("#tblRegistrosDetalle tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    tempDetalle = parseInt(dtm[0]);
                });


            } else {
                pnlDetalle.find("#RegistrosDetalle").html("");
            }
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {

        });
    }

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
                $("#tblRegistros").html(getTable('tblFraccionesXEstilo', data));
                $('#tblFraccionesXEstilo tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblFraccionesXEstilo thead th');
                var tfoot = $('#tblFraccionesXEstilo tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblFraccionesXEstilo tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblFraccionesXEstilo').DataTable(tableOptions);
                $('#tblFraccionesXEstilo_filter input[type=search]').focus();

                $('#tblFraccionesXEstilo tbody').on('click', 'tr', function () {

                    $("#tblFraccionesXEstilo tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                    IdMovimiento = parseInt(dtm[0]);
                });

                $('#tblFraccionesXEstilo tbody').on('dblclick', 'tr', function () {
                    $("#tblFraccionesXEstilo tbody tr").removeClass("success");
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
                            url: master_url + 'getFraccionXEstiloByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {

                            pnlDatos.find("input").val("");
                            $.each(pnlDatos.find("select"), function (k, v) {
                                pnlDatos.find("select")[k].selectize.clear(true);
                            });
                            Estilo[0].selectize.disable();
                            pnlControlesDetalle.find("[name='Departamento']")[0].selectize.focus();
                            $.each(data[0], function (k, v) {
                                pnlDatos.find("[name='" + k + "']").val(v);
                                if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                    pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                                }
                            });
                            getFraccionesXEstiloDetallebyFraccionesXEstilo(temp);
                            pnlTablero.addClass("d-none");
                            pnlDetalle.removeClass('d-none');
                            pnlControlesDetalle.removeClass('d-none');
                            pnlDatos.removeClass('d-none');
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

                $("#tblRegistros").html('');
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getFotoXEstilo(Estilo) {
        $.ajax({
            url: master_url + 'getEstiloByID',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                var dtm = data[0];
                if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                    var ext = getExt(dtm.Foto);
                    if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                        pnlDetalle.find("#VistaPrevia").html('<img src="' + base_url + dtm.Foto + '" class="img-thumbnail img-fluid" width="400px" />');
                    }
                    if (ext !== "gif" && ext !== "jpg" && ext !== "jpeg" && ext !== "png" && ext !== "PDF" && ext !== "Pdf" && ext !== "pdf") {
                        pnlDetalle.find("#VistaPrevia").html('<img src="' + base_url + 'img/camera.png" class="img-thumbnail img-fluid"/>');
                    }
                } else {
                    pnlDetalle.find("#VistaPrevia").html('<img src="' + base_url + 'img/camera.png" class="img-thumbnail img-fluid"/>');
                }
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

    function validate(event, val) {
        if (((event.which !== 46 || (event.which === 46 && val === '')) || val.indexOf('.') !== -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    }
</script>
