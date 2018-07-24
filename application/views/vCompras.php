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
            <div id="Pedidos" class="table-responsive">
                <table id="tblPedidos" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Orden de Compra</th>
                            <th>Estatus</th>
                            <th>Proveedor</th>
                            <th>Fecha</th>
                            <th>Tipo</th>
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
                <div class="">
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
                                        <select class="form-control form-control-sm required" id="Proveedor" name="Proveedor">
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
            </div>
            <div class="card border-0">
                <div class="">
                    <!--GENERAL DETALLE-->
                    <div class="d-none" id="pnlDatosDetalle">
                        <!--CONTROLES DETALLE-->
                        <div id="ControlesDetalle">
                            <div class="row">

                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
                                    <label for="Material">Material*</label>
                                    <select class="form-control form-control-sm "  name="Material" required="">
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
            </div>
            <!--REGISTROS DETALLE-->
            <div class="" id="pnlDetalle">
                <div class="row">
                    <div class=" col-md-12 ">
                        <div align="center"><div class="loader animated fadeIn"></div></div>
                        <div align="center"><strong class="text-danger">*Todas las modificaciones son en tiempo real*</strong></div>
                        <div class="table-responsive animated fadeIn">
                            <table id="tblPedidosDetalle" class="table table-sm  display table-condensed" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr style="overflow-x:scroll; width: 100%">
                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <br>
                        <div class="d-none" align="center" style="background-color: #fff ">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-2 text-dark">
                                </div>

                                <div class="col-sm-2 text-warning">

                                </div>
                                <div class="col-sm-2 text-danger">

                                </div>
                                <div class="col-sm-2 text-info">
                                    <strong>Pares</strong>
                                    <br>
                                    <div id="Pares"><strong>0</strong></div>
                                </div>
                                <div class="col-sm-2 text-success">
                                    <strong>Importe</strong>
                                    <br>
                                    <div id="Importe"><strong>0</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    var btnImprimirPedido = pnlDatos.find("#btnImprimirPedido");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlDetalle = $("#pnlDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var tblPedidos = $('#tblPedidos');
    var Pedidos;
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

    $(document).ready(function () {

        //Mascaras fechas
        pnlDatos.find("#Fecha").inputmask({alias: "date"});
        pnlDatos.find("#FechaEntrega").inputmask({alias: "date"});

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
                        onAgregarFila();
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
                        nuevo = false;
                        pnlDatos.find('#ID').val(data);
                        idMov = data;
                        onAgregarFila();
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
            $("#tblPedidosDetalle").parent().removeClass("d-none");
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
            if ($.fn.DataTable.isDataTable('#tblPedidosDetalle')) {
                PedidosDetalle.clear().draw();
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
        //getEstilos();
        handleEnter();
    });
    var cellEstilo = 0;
    var cellColor = 0;
    var tblDetalleCaptura;
    var nEstilo;
    var observaciones = '';


    var tblPedidosDetalle = $("#tblPedidosDetalle"), PedidosDetalle;
    function getDetalleByID(IDX) {
        console.log('ID', IDX);
        var rows;
        var pares = 0.0;
        //            tblPedidosDetalle.find("thead > th").css("height", "0px");
        if ($.fn.DataTable.isDataTable('#tblPedidosDetalle')) {
            tblPedidosDetalle.DataTable().destroy();
        }
        PedidosDetalle = tblPedidosDetalle.DataTable({
            "dom": 'trHF',
            "autoWidth": false,
            "colReorder": true,
            "displayLength": 500,
            "bLengthChange": false,
            "deferRender": true,
            "scrollY": 285,
            "scrollX": true,
            "scrollCollapse": false,
            keys: true,
            select: true,
            "bSort": false,
            language: lang,
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [1],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [2],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [35],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [36],
                    "visible": false,
                    "searchable": false
                }],
            "createdRow": function (row, data, index) {
                $.each($(row).find("td"), function (k, v) {
                    var c = $(v);
                    var index = parseInt(k);
                    switch (index) {
                        case 0:
                            /*ESTILO*/
                            c.not(".Serie").attr('title', data[35]);
                            c.addClass('Estilo');
                            break;
                        case 1:
                            /*COLOR*/
                            c.not(".Serie").attr('title', data[36]);
                            c.addClass('Color');
                            break;
                        case 2:
                            /*SEMANA*/
                            c.addClass('Semana');
                            break;
                        case 3:
                            /*MAQUILA*/
                            c.addClass('Maquila');
                            break;
                        case 26:
                            /*PARES*/
                            c.addClass('Pares');
                            break;
                        case 27:
                            /*PRECIO*/
                            c.addClass('Precio');
                            break;
                        case 28:
                            /*IMPORTE*/
                            c.addClass('Importe');
                            break;
                        case 29:
                            /*DESCUENTO*/
                            c.addClass('Descuento');
                            break;
                        case 30:
                            /*FECHA ENTREGA*/
                            c.addClass('Entrega');
                            break;
                    }
                    if (data[0] === "" && data[1] === "") {
                        c.addClass('Serie');
                    }
                    if ($.isNumeric(c.text())) {
                        if (data[0] === "" && parseFloat($(v).text()) <= 0) {
                            c.addClass('Serie').text("");
                        } else if (index > 3 && index < 25 && parseFloat(c.text()) > 0) {
                            c.addClass('HasStock');
                            c.addClass('Cantidades');
                        } else if (data[0] !== "" && index > 3 && index < 26 && parseFloat(c.text()) === 0) {
                            c.addClass('NoHasStock').text("0");
                            c.addClass('Cantidades');
                        }
                    }
                });
                /*ANCHO*/
                var celda = $(row).find("td");
                celda.eq(0).css("width", "50px");
                celda.eq(1).css("width", "50px");
                celda.eq(2).css("width", "35px");
                celda.eq(3).css("width", "35px");
                $(row).find("td:gt(25)").css("font-weight", "bolder");
                $(row).find("td:gt(25)").addClass("zoom");
            },
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api();//Get access to Datatable API
                // Update footer
                var pares = api.column(29).data().reduce(function (a, b) {
                    var ax = 0, bx = 0;
                    ax = $.isNumeric(a) ? parseFloat(a) : 0;
                    bx = $.isNumeric(b) ? parseFloat(b) : 0;
                    return  (ax + bx);
                }, 0);
                var importe = api.column(31).data().reduce(function (a, b) {
                    var ax = 0, bx = 0;
                    ax = $.isNumeric((a)) ? parseFloat(a) : 0;
                    bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                    return  (ax + bx);
                }, 0);
                var descuento = api.column(32).data().reduce(function (a, b) {
                    var ax = 0, bx = 0;
                    ax = $.isNumeric((a)) ? parseFloat(a) : 0;
                    bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                    return  (ax + bx);
                }, 0);
                $(api.column(29).footer()).html(api.column(34, {page: 'current'}).data().reduce(function (a, b) {
                    var container = '<div class="container">';
                    container += '<div class="row">';
                    container += '<div class="col-sm zoomx"><span class="text-info zoomx">Pares</span><br>' + pares;
                    container += '</div>';
                    container += '</div>';//ROW
                    container += '</div>';//CONTAINER
                    return container;
                }, 0));
                $(api.column(31).footer()).html(api.column(34, {page: 'current'}).data().reduce(function (a, b) {
                    var container = '<div class="container">';
                    container += '<div class="row">';
                    container += '<div class="col-sm zoomx"><span class="text-success zoomx">Importe</span><br>$' + $.number(parseFloat(importe), 2, '.', ',');
                    container += '</div>';
                    container += '</div>';//ROW
                    container += '</div>';//CONTAINER
                    return container;
                }, 0));
                $(api.column(32).footer()).html(api.column(34, {page: 'current'}).data().reduce(function (a, b) {
                    var container = '<div class="container">';
                    container += '<div class="row">';
                    container += '<div class="col-sm zoomx"><span class="text-danger">Descuento</span><br>$' + $.number(parseFloat(descuento), 2, '.', ',');
                    container += '</div>';
                    container += '</div>';//ROW
                    container += '</div>';//CONTAINER
                    return container;
                }, 0));
                $(api.column(33).footer()).html(api.column(34, {page: 'current'}).data().reduce(function (a, b) {
                    var container = '<div class="container">';
                    container += '<div class="row">';
                    container += '<div class="col-sm zoomx"><span class="text-warning">Total</span><br>$' + $.number(parseFloat(importe) - parseFloat(descuento), 2, '.', ',');
                    container += '</div>';
                    container += '</div>';//ROW
                    container += '</div>';//CONTAINER
                    return container;
                }, 0));
            }
        });

        PedidosDetalle.clear().draw();
        pnlDetalle.find("div.loader").removeClass("d-none");
        $("#tblPedidosDetalle").parent().addClass("d-none");
        $.getJSON(master_url + 'getDetalleByID', {ID: IDX}).done(function (detalle) {
            $.getJSON(master_url + 'getSerieXDetalleByID', {ID: IDX}).done(function (series) {
                /*SERIE*/
                $.each(series, function (k, s) {
                    var b = '<strong>', bc = '</strong>', bs = '<strong class="Serie">';
                    PedidosDetalle.row.add(['', '', '', b + 'Estilo' + bc, b + 'Color' + bc, b + 'Sem' + bc, b + 'Maq' + bc,
                        s.T1, s.T2, s.T3, s.T4, s.T5, s.T6, s.T7, s.T8, s.T9, s.T10, s.T11, s.T12, s.T13, s.T14, s.T15, s.T16, s.T17, s.T18, s.T19, s.T20, s.T21, s.T22, b + 'Pares' + bc, b + 'Precio' + bc, b + 'Importe' + bc, b + 'Desc' + bc, b + 'Entrega' + bc, '-', '', ''
                    ]).draw(false);
                    //DETALLE X SERIE
                    $.each(detalle, function (k, d) {
                        if (parseInt(s.ID) === parseInt(d.Serie)) {
                            PedidosDetalle.row.add([
                                d.ID, d.IdEstilo, d.IdColor, d.Estilo, d.Color, d.Sem, d.Maq, d.C1, d.C2, d.C3, d.C4, d.C5, d.C6, d.C7, d.C8, d.C9, d.C10, d.C11, d.C12, d.C13, d.C14, d.C15, d.C16, d.C17, d.C18, d.C19, d.C20, d.C21, d.C22, d.Pares, d.Precio, d.Importe, d.Desc, d.Entrega, d["-"], d.ColorD, d.EstiloD
                            ]).draw(false);
                        }
                    });
                    //FIN DETALLE X SERIE
                });
                $.each($('#tblPedidosDetalle > tbody tr'), function (k, v) {
                    //EN EL INDICE 2 (VISIBLE) SE ENCUENTRA LA MAQUILA
                    $(this).find("td:not(.Serie):eq(2)").on('dblclick', function () {
                        var cell = $(this);
                        var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="4" value="' + cell.text() + '" autofocus>';
                        cell.html(g).find("#Editor").focus().select();
                        cell.find("#Editor").focusout(function (e) {
                            var v = $(this).val();
                            cell.html(v);
                        });
                        cell.find("#Editor").keyup(function (e) {
                            console.log(e.keyCode);
                            if (e.keyCode === 13) {
                                var tr = $(this).parent().parent();
                                var td = $(this).parent();
                                var indice = td.index() + 3;//SE SUMAN 3 POR EL NUMERO DE CELDAS OCULTAS, YA QUE EN ESTE MOMENTO DE LA APP SU INDICE VISIBLE ES 2 Y EL INDICE CON LOS CAMPOS OCULTOS ES 5
                                var v = $(this).val();
                                cell.html(v);
                                PedidosDetalle.cell(td, indice).data(v).draw();
                                var row = PedidosDetalle.row(tr).data();
                                console.log("VALOR: ", v, ",INDICE: ", indice, ", ", row);
                                $.post(master_url + 'onModificarPedidoDetalle', {ID: row[0], CELDA: 'SEMANA', SEMANA: row[5], MAQUILA: row[6]}).done(function (data, x, jq) {
                                    console.log("\n", data, " \n");
                                    onNotify('<span class="fa fa-check"></span>', 'SE HA MODIFICADO LA SEMANA', 'success');
                                }).fail(function (x, y, z) {
                                    console.log('ERROR', x, y, z);
                                }).always(function () {
                                    console.log('DATOS ACTUALIZADOS');
                                });
                            }
                        });
                    });
                    //EN EL INDICE 3 (VISIBLE) SE ENCUENTRA LA SEMANA
                    $(this).find("td:not(.Serie):eq(3)").on('dblclick', function () {
                        var cell = $(this);
                        var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="4" value="' + cell.text() + '" autofocus>';
                        cell.html(g).find("#Editor").focus().select();
                        cell.find("#Editor").focusout(function (e) {
                            var v = $(this).val();
                            cell.html(v);
                        });
                        cell.find("#Editor").keyup(function (e) {
                            console.log(e.keyCode);
                            if (e.keyCode === 13) {
                                var tr = $(this).parent().parent();
                                var td = $(this).parent();
                                var indice = td.index() + 3;//SE SUMAN 4 POR EL NUMERO DE CELDAS OCULTAS, YA QUE EN ESTE MOMENTO DE LA APP SU INDICE VISIBLE ES 3 Y EL INDICE CON LOS CAMPOS OCULTOS ES 6
                                var v = $(this).val();
                                cell.html(v);
                                PedidosDetalle.cell(td, indice).data(v).draw();
                                var row = PedidosDetalle.row(tr).data();
                                console.log('ROW MAQ ', row[6], row[5], "\n", row);
                                $.post(master_url + 'onModificarPedidoDetalle', {ID: row[0], CELDA: 'MAQUILA', MAQUILA: row[6], SEMANA: row[5]}).done(function (data, x, jq) {
                                    console.log("\n", data, " \n");
                                    onNotify('<span class="fa fa-check"></span>', 'SE HA MODIFICADO LA MAQUILA', 'success');
                                }).fail(function (x, y, z) {
                                    console.log('ERROR', x, y, z);
                                }).always(function () {
                                    console.log('DATOS ACTUALIZADOS');
                                });
                            }
                        });
                    });


                });
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
                onCalcularMontos();
                pnlDetalle.find("div.loader").addClass("d-none");
                $("#tblPedidosDetalle").parent().removeClass("d-none");
                PedidosDetalle.columns.adjust().draw();
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });

        PedidosDetalle.on('key', function (e, datatable, key, cell, originalEvent) {
            var t = $('#tblPedidosDetalle > tbody');
            var a = t.find("#Editor");
            if (key === 13) {
                var b = PedidosDetalle.cell(a.parent()).index();
                if (a.val() !== 'undefined' && a.val() !== undefined) {
                    var c = a.val();
                    var d = a.parent();
                    d.html(c);
                    PedidosDetalle.cell(d, b).data(c).draw();
                }
                var td = $(this).find("td.focus:not(.Estilo):not(.Color):not(.Serie):not(.Pares):not(.Importe)");
                td.removeClass("HasStock");
                if (td.hasClass("Entrega")) {
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="10" value="' + cell.data() + '" autofocus>';
                    td.html(g).find("#Editor").focus().select();
                    td.find("#Editor").inputmask({alias: "date"});
                    td.find("#Editor").change(function () {
                    });
                } else if (td.hasClass("Descuento")) {
                    desc = cell.data();
                    var tr = PedidosDetalle.row(td.parent()).data();
                    var importe = getNumberFloat(tr[31]);
                    var porcentaje = (getNumberFloat(cell.data()) / importe) * 100;
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="2" value="' + porcentaje + '"  autofocus>';
                    td.html(g).find("#Editor").focus().select();
                } else if (td.find(":not(.Semana):not(.Maquila)")) {
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="4" value="' + cell.data() + '" autofocus>';
                    td.html(g).find("#Editor").focus().select();

                }
            }
        }).on('key-blur', function (e, datatable, cell) {
            var t = $('#tblPedidosDetalle > tbody');
            var a = t.find("#Editor");
            if (a.val() !== 'undefined' && a.val() !== undefined) {
                var b = PedidosDetalle.cell(a.parent()).index();
                var c = a.val() !== '' && a.val() > 0 ? a.val() : '0';
                var d = a.parent();
                var row = PedidosDetalle.row($(d).parent()).data();// SOLO OBTENDRA EL ID
                var params;
                if (d.hasClass('Cantidades')) {
                    d.html(c);
                    PedidosDetalle.cell(d, b).data(c).draw();
                    //SHORT POST
                    params = {
                        ID: row[0],
                        CELDA: 'CANTIDAD',
                        VALOR: c,
                        INDICE: b.column,
                        COLUMN: b.columnVisible
                    };
                } else if (d.hasClass('Entrega')) {
                    d.html(a.val());
                    PedidosDetalle.cell(d, b).data(a.val()).draw();
                    //SHORT POST
                    params = {
                        ID: row[0],
                        CELDA: 'ENTREGA',
                        VALOR: a.val()
                    };
                } else if (d.hasClass('Precio')) {
                    var precio = getNumberFloat(a.val());
                    var precio_format = '$' + $.number(precio, 2, '.', ',');
                    d.html(precio_format);
                    PedidosDetalle.cell($(d).parent(), 30).data(precio_format).draw();
                    var tr = PedidosDetalle.row($(d).parent()).data();
                    var pares_totales = parseFloat(tr[29]);
                    var importe_total = pares_totales * precio;
                    PedidosDetalle.cell($(d).parent(), 31).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                    //SHORT POST
                    params = {
                        ID: row[0],
                        CELDA: 'PRECIO',
                        VALOR: precio
                    };
                } else if (d.hasClass('Descuento')) {
                    var descuento = (getNumberFloat(a.val()) / 100) * getNumberFloat(row[31]);
                    var descuento_format = '$' + $.number(descuento, 2, '.', ',');
                    d.html(descuento_format);
                    PedidosDetalle.cell($(d).parent(), 32).data(descuento_format).draw();
                    //SHORT POST
                    params = {
                        ID: row[0],
                        CELDA: 'DESCUENTO',
                        VALOR: ((a.val() === '') ? 0 : getNumberFloat(a.val()))
                    };
                }
                $.post(master_url + 'onModificarPedidoDetalle', params).done(function (data, x, jq) {
                    console.log("\n", data, " \n");
                }).fail(function (x, y, z) {
                    console.log('ERROR', x, y, z);
                }).always(function () {
                    console.log('DATOS ACTUALIZADOS');
                });

                if ($.isNumeric(c) && parseFloat(c) > 0) {
                    /*CANTIDADES EN SERIES*/
                    if ($.isNumeric(c) && parseFloat(c) > 0 && d.hasClass('Cantidades')) {
                        var tr = PedidosDetalle.row($(d).parent()).data();
                        var pares_totales = 0;
                        var precio = getNumberFloat(tr[30]);
                        for (var i = 7, max = 29; i < max; i++) {
                            pares_totales += $.isNumeric(tr[i]) ? parseFloat(tr[i]) : 0;
                        }
                        PedidosDetalle.cell($(d).parent(), 29).data(pares_totales).draw();
                        var importe_total = pares_totales * precio;
                        PedidosDetalle.cell($(d).parent(), 31).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                        d.removeClass("NoHasStock");
                        d.addClass("HasStock");
                    } else if (d.hasClass('Cantidades')) {
                        var tr = PedidosDetalle.row($(d).parent()).data();
                        var pares_totales = 0;
                        var precio = getNumberFloat(tr[30]);
                        for (var i = 7, max = 29; i < max; i++) {
                            pares_totales += $.isNumeric(tr[i]) ? parseFloat(tr[i]) : 0;
                        }
                        PedidosDetalle.cell($(d).parent(), 29).data(pares_totales).draw();
                        var importe_total = pares_totales * precio;
                        PedidosDetalle.cell($(d).parent(), 31).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                        d.removeClass("HasStock");
                        d.addClass("NoHasStock");
                    }
                    /*PARES*/
                    /*PRECIO*/
                    /*DESCUENTO*/
                } else {
                    console.log('CANTIDAD EN ZERO ');
                    var tr = PedidosDetalle.row($(d).parent()).data();
                    var pares_totales = 0;
                    var precio = getNumberFloat(tr[30]);
                    for (var i = 7, max = 29; i < max; i++) {
                        pares_totales += $.isNumeric(tr[i]) ? parseFloat(tr[i]) : 0;
                    }
                    PedidosDetalle.cell($(d).parent(), 29).data(pares_totales).draw();
                    var importe_total = pares_totales * precio;
                    PedidosDetalle.cell($(d).parent(), 31).data('$' + $.number(importe_total, 2, '.', ',')).draw();

                }
            }
        });
    }

    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';

        if ($.fn.DataTable.isDataTable('#tblPedidos')) {
            tblPedidos.DataTable().destroy();
            Pedidos = tblPedidos.DataTable({
                "dom": 'Bfrtip',
                buttons: buttons,
                "ajax": {
                    "url": master_url + 'getRecords',
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "ID"}, {"data": "Pedido"}, {"data": "Estatus"}, {"data": "Cliente"},
                    {"data": "Fecha Pedido"}, {"data": "Usuario"}
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
            tblPedidos.find('tbody').on('click', 'tr', function () {
                tblPedidos.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Pedidos.row(this).data();
                temp = parseInt(dtm.ID);
            });
            tblPedidos.find('tbody').on('dblclick', 'tr', function () {
                nuevo = false;
                tblPedidos.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Pedidos.row(this).data();
                temp = parseInt(dtm.ID);
                if (temp !== 0 && temp !== undefined && temp > 0) {
                    nuevo = false;
                    $.getJSON(master_url + 'getPedidoByID', {ID: temp}).done(function (data, x, jq) {
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
                        pnlDatosDetalle.find("[name='Estilo']")[0].selectize.focus();
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

            console.log(data);
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
                    pnlControlesDetalle.find("#Material")[0].selectize.addOption({text: v.Material, value: v.ID});
                });
                pnlControlesDetalle.find("#Material")[0].selectize.focus();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        }
    }


    /*FIN AUTOSUMAR PARES*/
    /*AGREGAR ESTILO-COLOR*/
    function onAgregarFila() {
        var rows = pnlDatosDetalle.find("#tblTallas > tbody > tr");
        var Estilo = pnlDatosDetalle.find("[name='Estilo']");
        var Combinacion = pnlDatosDetalle.find("[name='Combinacion']");
        var Precio = pnlDatosDetalle.find("[name='Precio']");
        var FechaEntrega = pnlDatosDetalle.find("[name='FechaEntrega']");
        var Maquila = pnlDatosDetalle.find("[name='Maquila']");
        var Semana = pnlDatosDetalle.find("[name='Semana']");
        var Recio = pnlDatosDetalle.find("[name='Recio']");
        //var Observaciones = pnlDatosDetalle.find("[name='Observaciones']");
        var Desc = pnlDatosDetalle.find("[name='Desc']");
        $.getJSON(master_url + 'onComprobarEstiloXCombinacion', {ID: idMov, E: Estilo.val(), C: Combinacion.val()}).done(function (data, x, jq) {
            if (parseInt(data[0].EXISTE) > 0) {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'YA SE HA AGREGADO EL ESTILO DE ESTE COLOR', 'danger');
            } else {
                if (Precio.val() !== '' && parseFloat(Precio.val()) > 0) {
                    var frm = new FormData();
                    var detalle = [];
                    var limit = 36;
                    var x36 = pnlDetalle.find("#x36")[0].checked;
                    $.each(rows.find("input.numbersOnly:enabled"), function () {
                        var a = $(this);
                        var talla = rows.find("input").eq(a.parent().index()).val();
                        if (talla > 0) {
                            var cant = parseInt(a.val());
                            if (cant > 0) {
                                if (x36) {
                                    var divisible = (a.val() / limit);//SIRVE PARA SABER SI TIENE MÁS DE DOS PARTES LA CANTIDAD INGRESADA QUE SUPEREN 1
                                    if (divisible > 0) {
                                        var acumulador = 36;
                                        for (var i = 0; i < divisible; i++) {
                                            if (acumulador < a.val()) {
                                                var registros = {
                                                    Pedido: idMov,
                                                    Estilo: Estilo.val(),
                                                    Combinacion: Combinacion.val(),
                                                    Posicion: a.attr("name"),
                                                    Cantidad: limit,
                                                    FechaEntrega: FechaEntrega.val(),
                                                    Maq: Maquila.val(),
                                                    Sem: Semana.val(),
                                                    Recio: Recio.val(),
                                                    Precio: Precio.val(),
                                                    Desc_Por: Desc.val(),
                                                    Observaciones: observaciones,
                                                    Proceso: 1
                                                };
                                            } else {
                                                var registros = {
                                                    Pedido: idMov,
                                                    Estilo: Estilo.val(),
                                                    Combinacion: Combinacion.val(),
                                                    Posicion: a.attr("name"),
                                                    Cantidad: (limit - acumulador) < 0 ? (a.val() - (acumulador - limit)) : (a.val() <= limit) ? parseInt(a.val()) : limit,
                                                    FechaEntrega: FechaEntrega.val(),
                                                    Maq: Maquila.val(),
                                                    Sem: Semana.val(),
                                                    Recio: Recio.val(),
                                                    Precio: Precio.val(),
                                                    Desc_Por: Desc.val(),
                                                    Observaciones: observaciones,
                                                    Proceso: 2
                                                };
                                            }
                                            detalle.push(registros);
                                            acumulador += 36;
                                        }
                                    } else {
                                        var registros = {
                                            Pedido: idMov,
                                            Estilo: Estilo.val(),
                                            Combinacion: Combinacion.val(),
                                            Posicion: a.attr("name"),
                                            Cantidad: a.val(),
                                            FechaEntrega: FechaEntrega.val(),
                                            Maq: Maquila.val(),
                                            Sem: Semana.val(),
                                            Recio: Recio.val(),
                                            Precio: Precio.val(),
                                            Desc_Por: Desc.val(),
                                            Observaciones: observaciones,
                                            Proceso: 3
                                        };
                                        detalle.push(registros);
                                    }
                                } else {
                                    var registros = {
                                        Pedido: idMov,
                                        Estilo: Estilo.val(),
                                        Combinacion: Combinacion.val(),
                                        Posicion: a.attr("name"),
                                        Cantidad: a.val(),
                                        FechaEntrega: FechaEntrega.val(),
                                        Maq: Maquila.val(),
                                        Sem: Semana.val(),
                                        Recio: Recio.val(),
                                        Precio: Precio.val(),
                                        Desc_Por: Desc.val(),
                                        Observaciones: observaciones,
                                        Proceso: 2
                                    };
                                    detalle.push(registros);
                                }
                            }
                        }
                    });
                    frm.append('Detalle', JSON.stringify(detalle));
                    console.log("\n * DETALLE *\n", detalle, "\n", x36, "\n");
                    $.ajax({
                        url: master_url + ((x36) ? 'onAgregarDetalle36' : 'onAgregarDetalle'),
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        console.log("\n", "* DETALLE *", "\n");
                        console.log(data);
                        console.log("\n", "* FIN DETALLE *", "\n");
                        getDetalleByID(idMov);
                        $("[name='Estilo']")[0].selectize.focus();
                        $("[name='Estilo']")[0].selectize.clear(true);
                        $("[name='Combinacion']")[0].selectize.clear(true);
                        $("[name='Combinacion']")[0].selectize.clearOptions();
                        observaciones = "";
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                } else {
                    onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN COSTO', 'danger');
                    pnlDatos.find("input[name='Precio']").focus();
                }
            }
        });
    }

    function onModificarImportes(ID, Importe, Pares, Desc) {
        $.post(master_url + 'onModificarImportes', {ID: ID, Importe: Importe, Pares: Pares, Descuento: Desc}).done(function (data, x, jq) {
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    var ImporteT;
    var ParesT;
    var DescT;
    function onCalcularMontos() {
        var pares = 0;
        var total = 0.0;
        var desc = 0.0;
        $.each(PedidosDetalle.rows().data(), function () {
            pares += ($.isNumeric($(this)[28]) ? parseFloat($(this)[28]) : 0);
            total += ($.isNumeric(getNumberFloat($(this)[30])) ? getNumberFloat($(this)[30]) : 0);
            desc += ($.isNumeric(getNumberFloat($(this)[31])) ? getNumberFloat($(this)[31]) : 0);
        });
        ImporteT = total;
        ParesT = pares;
        DescT = desc;
        onModificarImportes(idMov, ImporteT, ParesT, DescT);
        if (PedidosDetalle.data().count() > 1) {
            pnlDetalle.find("#Pares").find("strong").text(pares);
            pnlDetalle.find("#Importe").find("strong").text('$' + $.number(total - desc, 2, '.', ','));
        }
    }

    function onEliminarDetalle(IDX) {
        if (IDX !== 0 && IDX !== undefined && IDX > 0) {
            swal({
                title: "Confirmar",
                text: "Deseas eliminar el registro?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: master_url + 'onEliminarDetalle',
                        type: "POST",
                        data: {
                            ID: IDX
                        }
                    }).done(function (data, x, jq) {
                        getDetalleByID(idMov);
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                }
            });
        } else {
            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
        }
    }

    var desc = 0;
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