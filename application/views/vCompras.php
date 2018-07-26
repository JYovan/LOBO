<!--MODAL FICHA TÉCNICA-->
<div class="card border-0 animated fadeIn" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Ordenes de Compra</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnEliminar" data-toggle="tooltip" data-placement="top" title="Eliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div id="Compras" class="table-responsive">
                <table id="tblCompras" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Folio</th>
                            <th>Maquila</th>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Grupo</th>
                            <th>Importe</th>
                            <th>Sem</th>
                            <th>Año</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div class="d-none" id="pnlDatos">
    <div class="card border-0">
        <div class="card-body text-dark customBackground" >
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 float-left">
                    <h5>COMPRA</h5>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 float-right" align="right">
                    <button type="button" onclick="" class="btn btn-info btn-sm btn-md my-1" id="btnImprimirPedido"><span class="fa fa-print"></span> IMPRIMIR</button>
                    <button type="button" class="btn btn-danger btn-sm btn-md my-1" id="btnCancelar"><span class="fa fa-window-close"></span> SALIR</button>
                    <button type="button" class="btn btn-primary btn-sm my-1" id="btnGuardar"><span class="fa fa-save"></span> GUARDAR</button>
                </div>
            </div>
            <div class="card border-0">
                <div id="Encabezado">
                    <form id="frmNuevo">
                        <div class="row">
                            <div class="d-none">
                                <input type="text" class="" id="ID" name="ID"  >
                            </div>
                            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                <label for="Tp">Tp*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="1" id="Tp" name="Tp" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <label for="Folio">Folio*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" id="Folio" name="Folio" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
                                <label for="Proveedor">Proveedor* (F9) Actualizar</label>
                                <div class="input-group mb-3">
                                    <select class="form-control form-control-sm required" id="Proveedor" name="Proveedor" >
                                        <option value=""></option>
                                    </select>
                                    <div class="input-group-prepend">
                                        <a href="<?php print base_url('Proveedores') ?>" target="_blank" class="input-group-text text-dark" data-toggle="tooltip" data-placement="top" title="Ver Proveedores"><i class="fa fa-users"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <label for="Fecha">Fecha*</label>
                                <input type="text" class="form-control form-control-sm notEnter" name="Fecha" id="Fecha" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                <label for="Maq">Maq*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="2" id="Maq" name="Maq" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                <label for="Ano">Año*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="2" id="Ano" name="Ano" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                <label for="Sem">Sem*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="2" id="Sem" name="Sem" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <label for="Grupo">Grupo</label>
                                <select class="form-control form-control-sm required" id="Grupo" name="Grupo">
                                    <option value=""></option>
                                    <option value="1">PIEL Y FORRO</option>
                                    <option value="2">SUELA</option>
                                    <option value="3">INDIRECTOS</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card border-0">
                <!--GENERAL DETALLE-->
                <div class="d-none" id="pnlDatosDetalle">
                    <!--CONTROLES DETALLE-->
                    <div id="ControlesDetalle">
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                <label for="Material">Material*</label>
                                <select class="form-control form-control-sm " id="Material"  name="Material" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-1">
                                <label for="Precio">Precio</label>
                                <input type="text" class="form-control form-control-sm numbersOnly" maxlength="10" name="Precio" >
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-1">
                                <label for="Cantidad">Cantidad</label>
                                <input type="text" class="form-control form-control-sm numbersOnly" maxlength="10" name="Cantidad" >
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                <label for="ConsignarA">Consignar a:</label>
                                <input type="text" class="form-control form-control-sm " name="ConsignarA" >
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
                                <label for="FechaEntrega">Fec Entrega*</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-sm required notEnter" id="FechaEntrega" name="FechaEntrega" >
                                    <div class="input-group-prepend">
                                        <span onclick="onGuardarObservaciones()" class="input-group-text text-dark" data-toggle="tooltip" data-placement="top" title="Observaciones"><i class="fa fa-comment-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-1 col-sm-1">
                                <br>
                                <button  class="btn btn-primary btn-sm" id="btnAgregarDetalle" data-toggle="tooltip" data-placement="top" title="Agregar" >
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <!--REGISTROS DETALLE-->
            <div class="" id="pnlDetalle">
                <div class="table-responsive row">
                    <table id="tblComprasDetalle" class="table table-sm  display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Clave</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>FechaEntrega</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th>Total:</th>
                                <th>$0.0</th>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!--FIN DETALLE-->
            </div>
        </div>
    </div>
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Compras/';
    var pnlDatos = $("#pnlDatos");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlDetalle = $("#pnlDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var tblCompras = $('#tblCompras');
    var Compras;
    var nuevo = true;
    var idMov = 0;
    /*DATATABLE GLOBAL*/
    var tblInicial = {
        "dom": 'frt',
        "autoWidth": true,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollX": true,
        "scrollCollapse": true,
        "bSort": true,
        "aaSorting": [
            [0, 'desc']/*ID*/
        ],
        language: {
            search: "Buscar:"
        }
    };
    var tblComprasDetalle = $("#tblComprasDetalle"), ComprasDetalle;

    $(document).ready(function () {
        //Mascaras fechas
        pnlDatos.find("#Fecha").inputmask({alias: "date"});
        pnlDatos.find("#FechaEntrega").inputmask({alias: "date"});
        pnlDatos.find("[name='Grupo']").change(function () {
            pnlDatosDetalle.find("[name='Material']")[0].selectize.clear(true);
            pnlDatosDetalle.find("[name='Material']")[0].selectize.clearOptions();
            getMaterialesRequeridos($(this).val());
        });
        //Evento botones
        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var f = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    idMov = pnlDatos.find("#ID").val();
                    $.ajax({
                        url: master_url + 'onModificar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: f
                    }).done(function (data, x, jq) {
                        Compras.ajax.reload();
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
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
                        Compras.ajax.reload();
                        nuevo = false;
                        pnlDatos.find('#ID').val(data);
                        idMov = data;
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                }
            } else {
                onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
            }
        });
        btnNuevo.click(function () {
            temp = 0;
            $("#tblComprasDetalle").parent().removeClass("d-none");
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatosDetalle.removeClass('d-none');
            pnlDatos.find("input").val("");
            $('#Encabezado').removeClass('disabledForms');
            $('#ControlesDetalle').removeClass('disabledForms');
            btnGuardar.removeClass('d-none');
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
            if ($.fn.DataTable.isDataTable('#tblComprasDetalle')) {
                ComprasDetalle.clear().draw();
            }
            pnlDatos.find("[name='Folio']").prop('disabled', false);
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            pnlDatosDetalle.addClass('d-none');
            nuevo = true;
        });
        btnEliminar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
                swal({
                    title: "Confirmar",
                    text: "Deseas eliminar el registro?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.post(master_url + 'onEliminar', {ID: temp}).done(function (data, x, jq) {
                            getRecords();
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });
        getRecords();
        getProveedores();
        handleEnter();
    });
    var observaciones = '';
    function getDetalleByID(IDX) {
        if ($.fn.DataTable.isDataTable('#tblComprasDetalle')) {
            tblComprasDetalle.DataTable().destroy();
            ComprasDetalle = tblComprasDetalle.DataTable({
                "ajax": {
                    "url": master_url + 'getDetalleCompraByID',
                    "dataSrc": "",
                    "type": 'POST',
                    "data": {
                        "ID": IDX
                    }
                },
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }
                ],
                "columns": [
                    {"data": "ID"}, /*0*/
                    {"data": "Material"}, /*1*/
                    {"data": "Descripcion"}, /*2*/
                    {"data": "Cantidad"}, /*3*/
                    {"data": "Precio"}, /*4*/
                    {"data": "Subtotal"}, /*5*/
                    {"data": "FechaEntrega"}, /*6*/
                    {"data": "Eliminar"} /*7*/
                ],
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api();//Get access to Datatable API
                    // Update footer
                    var total = api.column(5).data().reduce(function (a, b) {
                        var ax = 0, bx = 0;
                        ax = $.isNumeric((a)) ? parseFloat(a) : 0;
                        bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                        return  (ax + bx);
                    }, 0);
                    $(api.column(5).footer()).html(api.column(5, {page: 'current'}).data().reduce(function (a, b) {
                        return '$' + $.number(parseFloat(total), 2, '.', ',');
                    }, 0));
                },
                "dom": 'frt',
                "autoWidth": true,
                language: lang,
                "displayLength": 500,
                "colReorder": true,
                "bLengthChange": false,
                "deferRender": true,
                "scrollY": 295,
                scrollX: true,
                "scrollCollapse": true,
                "bSort": true,
                "keys": true,
                order: [[0, 'asc']],
                "initComplete": function (x, y) {
                    HoldOn.close();
                }
            });
        }
    }
    function getRecords() {
        temp = 0;
        HoldOn.open({theme: 'sk-cube', message: 'CARGANDO...'});
        $.fn.dataTable.ext.errMode = 'throw';

        if ($.fn.DataTable.isDataTable('#tblCompras')) {
            tblCompras.DataTable().destroy();
            Compras = tblCompras.DataTable({
                "dom": 'Bfrtip',
                buttons: buttons,
                "ajax": {
                    "url": master_url + 'getRecords',
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "ID"},
                    {"data": "Folio"},
                    {"data": "Maquila"},
                    {"data": "Fecha"},
                    {"data": "Proveedor"},
                    {"data": "Grupo"},
                    {"data": "Importe"},
                    {"data": "Semana"},
                    {"data": "Ano"},
                    {"data": "Usuario"}
                ],
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }
                ],
                language: lang,
                select: true,
                "autoWidth": true,
                "colReorder": true,
                "displayLength": 20,
                "bLengthChange": false,
                "deferRender": true,
                "scrollCollapse": false,
                "bSort": true,
                "aaSorting": [
                    [0, 'desc']/*ID*/
                ]
            });
            $('#tblCompras_filter input[type=search]').focus();
            tblCompras.find('tbody').on('click', 'tr', function () {
                tblCompras.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Compras.row(this).data();
                temp = parseInt(dtm.ID);
            });
            tblCompras.find('tbody').on('dblclick', 'tr', function () {
                nuevo = false;
                tblCompras.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Compras.row(this).data();
                temp = parseInt(dtm.ID);
                if (temp !== 0 && temp !== undefined && temp > 0) {
                    nuevo = false;
                    $.getJSON(master_url + 'getCompraByID', {ID: temp}).done(function (data, x, jq) {
                        pnlDatos.find("input").val("");
                        $.each(pnlDatos.find("select"), function (k, v) {
                            pnlDatos.find("select")[k].selectize.clear(true);
                        });
                        $.each(data[0], function (k, v) {
                            pnlDatos.find("[name='" + k + "']").val(v);
                            if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                            }
                        });
                        //Cargar Detalle
                        getDetalleByID(temp);
                        /*MOSTRAR PANEL PRINCIPAL*/
                        pnlTablero.addClass("d-none");
                        pnlDatos.removeClass('d-none');
                        pnlDatosDetalle.removeClass("d-none");
                        pnlDatosDetalle.find("[name='Material']")[0].selectize.focus();
                        pnlDatos.find("[name='Folio']").prop('disabled', 'disabled');
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                }
                console.log('editando...');
            });
        }
        HoldOn.close();
    }
    function getProveedores() {
        $.getJSON(master_url + 'getProveedores').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Proveedor']")[0].selectize.addOption({text: v.Nombre, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getMaterialesRequeridos(Familia) {
        if (Familia !== '' && Familia !== undefined && Familia !== null) {
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            $.getJSON(master_url + 'getMaterialesRequeridos', {Familia: Familia}).done(function (data, x, jq) {
                $.each(data, function (k, v) {
                    pnlDatosDetalle.find("#Material")[0].selectize.addOption({text: v.Material, value: v.ID});
                });
                pnlDatosDetalle.find("#Material")[0].selectize.focus();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        }
    }
    function onEliminarCompraDetalleByID(IDX) {
        swal({
            buttons: ["Cancelar", "Aceptar"],
            title: 'Estas Seguro?',
            text: "Esta acción no se puede revertir",
            icon: "warning",
            closeOnEsc: false,
            closeOnClickOutside: false
        }).then((action) => {
            if (action) {
                $.ajax({
                    url: master_url + 'onEliminarCompraDetalleByID',
                    type: "POST",
                    data: {
                        ID: IDX
                    }
                }).done(function (data, x, jq) {
                    ComprasDetalle.ajax.reload();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
    }

</script>
<style>
    .card {
        background-color: transparent !important;
    }
    .card-header{
        cursor: pointer;
        color: #fff !important;
        background-color: transparent !important;
    }
</style>