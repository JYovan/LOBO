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
                    <h5>ORDEN COMPRA</h5>
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
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label for="Tp">Tp*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="1" id="Tp" name="Tp" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label for="Folio">Folio*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" id="Folio" name="Folio" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
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
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label for="Fecha">Fecha*</label>
                                <input type="text" class="form-control form-control-sm notEnter" name="Fecha" id="Fecha" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label for="Maq">Maq*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="2" id="Maq" name="Maq" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label for="Ano">Año*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="2" id="Ano" name="Ano" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label for="Sem">Sem*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly " maxlength="2" id="Sem" name="Sem" required="">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
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
                            <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                <label for="Precio">Precio</label>
                                <input type="text" class="form-control form-control-sm numbersOnly" maxlength="10" name="Precio" >
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                <label for="Cantidad">Cantidad</label>
                                <input type="text" class="form-control form-control-sm numbersOnly" maxlength="10" name="Cantidad" >
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                <label for="ConsignarA">Consignar a:</label>
                                <input type="text" class="form-control form-control-sm " name="ConsignarA" maxlength="59">
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
                                <label for="FechaEntrega">Fec Entrega*</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-sm required notEnter" id="FechaEntrega" name="FechaEntrega" >
                                    <div class="input-group-prepend">
                                        <span onclick="onGuardarObservaciones()" class="input-group-text text-dark" data-toggle="tooltip" data-placement="top" title="Observaciones"><i class="fa fa-comment-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-2 col-md-1 col-lg-1 col-xl-1">
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
                    <table id="tblComprasDetalle" class="table table-sm hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>IdMat</th>
                                <th>Clave</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>FechaEntrega</th>
                                <th>Consignar a:</th>
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
                                <td></td>
                                <td></td>
                                <th>Total:</th>
                                <th>$0.0</th>
                                <td></td>
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

        pnlDatosDetalle.find("#btnAgregarDetalle").click(function () {
            var ID = pnlDatos.find("#ID").val();
            if (ID !== '' && parseInt(ID) > 0) {

                /*COMPROBAR SI YA SE AGREGÓ*/
                var existe = false;
                if (pnlDetalle.find("#tblComprasDetalle tbody tr").length > 0) {
                    console.log(ComprasDetalle.rows());
                    ComprasDetalle.rows().every(function (rowIdx, tableLoop, rowLoop) {
                        var data = this.data();
                        if (parseInt(data.IdMat) === parseInt(pnlDatosDetalle.find("[name='Material']").val())) {
                            existe = true;
                            return false;
                        }
                    });
                }

                if (!existe) {
                    var detalle = {
                        IDC: ID,
                        Articulo: pnlDatosDetalle.find("[name='Material']").val(),
                        ArticuloT: pnlDatosDetalle.find("[name='Material']").text(),
                        Precio: pnlDatosDetalle.find("[name='Precio']").val(),
                        Cantidad: pnlDatosDetalle.find("[name='Cantidad']").val(),
                        ConsignarA: pnlDatosDetalle.find("[name='ConsignarA']").val(),
                        FechaEntrega: pnlDatosDetalle.find("[name='FechaEntrega']").val(),
                        Observaciones: (observaciones !== '') ? observaciones : 'SO'
                    };
                    $.post(master_url + 'onAgregarDetalle', detalle).done(function (data) {
                        ComprasDetalle.ajax.reload();
                        swal({
                            title: "EXITO",
                            text: "SE HA AGREGADO UN NUEVO REGISTRO",
                            icon: "success",
                            timer: 900
                        }).then((willDelete) => {
                            pnlDatosDetalle.find("input").val('');
                            pnlDatosDetalle.find("[name='Material']")[0].selectize.clear(true);
                            pnlDatosDetalle.find("[name='Material']")[0].selectize.focus();
                            observaciones = '';
                        });
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    swal({
                        title: "ERROR",
                        text: "YA SE HA AGREGADO ESTE ARTÍCULO",
                        icon: "error",
                        closeOnClickOutside: false,
                        closeOnEsc: false
                    }).then((willDelete) => {
                        pnlDatosDetalle.find("[name='Material']")[0].selectize.clear(true);
                        pnlDatosDetalle.find("[name='Material']")[0].selectize.focus();
                        observaciones = '';
                    });

                }
            } else {
                onBeep(2);
                swal('INFO', 'DEBES GUARDAR EL MOVIMIENTO', 'warning');
            }
        });
        //Mascaras fechas
        pnlDatos.find("#Fecha").inputmask({alias: "date"});
        pnlDatos.find("#FechaEntrega").inputmask({alias: "date"});
        pnlDatos.find("[name='Grupo']").change(function () {
            pnlDatosDetalle.find("[name='Material']")[0].selectize.clear(true);
            pnlDatosDetalle.find("[name='Material']")[0].selectize.clearOptions();
            getMaterialesRequeridos($(this).val());
        });
        pnlDatos.find("[name='Material']").change(function () {
            getPrecioListaMaterial($(this).val());
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
            getUID();
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
    var observaciones = '', valor_inicial_precio = '', valor_inicial_cantidad = '';
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
                    },
                    {
                        "targets": [1],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [6],
                        "render": function (data, type, row) {
                            return '$' + $.number(parseFloat(data), 2, '.', ',');
                        }
                    }
                ],
                "columns": [
                    {"data": "ID"}, /*0*/
                    {"data": "IdMat"}, //1,0
                    {"data": "Material"}, //2,1
                    {"data": "Descripcion"}, //3,2
                    {"data": "Cantidad"}, //4,3
                    {"data": "Unidad"}, //5,4
                    {"data": "Precio"}, //6,5
                    {"data": "Subtotal"}, //7,6
                    {"data": "FechaEntrega"}, //8,7
                    {"data": "Consignar"}, //9,8
                    {"data": "Eliminar"} //10,9
                ],
                "createdRow": function (row, data, index) {
                    var event;
                    if (isMobile) {
                        $(this).find("td:eq(3)").touch();
                        $(this).find("td:eq(5)").touch();
                        event = 'tap';
                    } else {
                        event = 'dblclick';
                    }
                    //PRECIO EVT
                    $(row).find("td:eq(5)").on(event, function () {
                        var input = '<input type="text" class="form-control form-control-sm numbersOnly" maxlength="10" name="Precio" autofocus>';
                        var exist = $(this).find("#Precio").val();
                        var celda = $(this);
                        if (exist === undefined && celda.text() !== '') {
                            console.log('CELDA TEXT ', celda.text());
                            var vActual = celda.text();
                            celda.html(input);
                            var input_precio = celda.find("[name='Precio']");
                            input_precio.val(getNumberFloat(vActual));
                            var padre = celda.parent();
                            input_precio.focus().select();
                            input_precio.focusout(function () {
                                var input = $(this);
                                var v = ($(this).val());
                                if (v !== '' && $.isNumeric(v)) {
                                    var precio_format = '$' + $.number(v, 2, '.', ',');
                                    celda.html(precio_format);
                                    ComprasDetalle.cell(padre, 6).data(v).draw();
                                    var row = ComprasDetalle.row(padre).data();
                                    var precio = v;
                                    var cantidad = parseFloat(($(row.Cantidad).text() !== '') ? $(row.Cantidad).text() : row.Cantidad);
                                    var importe_total = cantidad * precio;
                                    ComprasDetalle.cell(padre, 7).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                                    //SHORT POST
                                    onEditarDetalleCompra({PARENT: IDX, ID: row.ID, CELDA: 'PRECIO', VALOR: precio, SUBTOTAL: importe_total});
                                } else {
                                    input.val('');
                                    swal({
                                        title: 'ATENCIÓN',
                                        text: "NO ES UN PRECIO VÁLIDO",
                                        icon: "warning",
                                        closeOnEsc: false,
                                        closeOnClickOutside: false
                                    }).then((action) => {
                                        input.focus().select();
                                    });
                                }
                            });
                            input_precio.change(function () {
                                var input = $(this);
                                var v = (input.val());
                                if (v !== '' && $.isNumeric(v)) {
                                    var precio_format = '$' + $.number(v, 2, '.', ',');
                                    celda.html(precio_format);
                                    ComprasDetalle.cell(padre, 6).data(v).draw();
                                    var row = ComprasDetalle.row(padre).data();
                                    var precio = v;
                                    var cantidad = parseFloat(($(row.Cantidad).text() !== '') ? $(row.Cantidad).text() : row.Cantidad);
                                    var importe_total = cantidad * precio;
                                    ComprasDetalle.cell(padre, 7).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                                    console.log('* ROW *');
                                    //SHORT POST
                                    onEditarDetalleCompra({PARENT: IDX, ID: row.ID, CELDA: 'PRECIO', VALOR: precio, SUBTOTAL: importe_total});
                                } else {
                                    input.val('');
                                    swal({
                                        title: 'ATENCIÓN',
                                        text: "NO ES UN PRECIO VÁLIDO",
                                        icon: "warning",
                                        closeOnEsc: false,
                                        closeOnClickOutside: false
                                    }).then((action) => {
                                        input.focus().select();
                                    });
                                }
                            });
                            input_precio.keyup(function (e) {
                                if (e.keyCode === 13) {
                                    var input = $(this);
                                    var v = (input.val());
                                    if (v !== '' && $.isNumeric(v)) {
                                        var precio_format = '$' + $.number(v, 2, '.', ',');
                                        celda.html(precio_format);
                                        ComprasDetalle.cell(padre, 6).data(v).draw();
                                        var row = ComprasDetalle.row(padre).data();
                                        var precio = v;
                                        var cantidad = parseFloat(($(row.Cantidad).text() !== '') ? $(row.Cantidad).text() : row.Cantidad);
                                        var importe_total = cantidad * precio;
                                        ComprasDetalle.cell(padre, 7).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                                        console.log('* ROW *');
                                        //SHORT POST
                                        onEditarDetalleCompra({PARENT: IDX, ID: row.ID, CELDA: 'PRECIO', VALOR: precio, SUBTOTAL: importe_total});
                                    } else {
                                        input.val('');
                                        swal({
                                            title: 'ATENCIÓN',
                                            text: "NO ES UN PRECIO VÁLIDO",
                                            icon: "warning",
                                            closeOnEsc: false,
                                            closeOnClickOutside: false
                                        }).then((action) => {
                                            input.focus().select();
                                        });
                                    }
                                }
                            });
                        }
                    });
                    //CANTIDAD EVT
                    $(row).find("td:eq(2)").on(event, function () {
                        var input = '<input type="text" class="form-control form-control-sm" maxlength="10" name="Cantidad" autofocus>';
                        var exist = $(this).find("#Cantidad").val();
                        console.log("\n Exist ", exist);
                        var celda = $(this);
                        if (exist === undefined && celda.text() !== '') {
                            var vActual = celda.text();
                            celda.html(input);
                            var input_cantidad = celda.find("[name='Cantidad']");
                            input_cantidad.val(getNumberFloat(vActual));
                            var padre = celda.parent();
                            input_cantidad.focus().select();
                            input_cantidad.focusout(function () {
                                var input = $(this);
                                if ($.isNumeric(input.val())) {
                                    var v = parseFloat(input.val());
                                    if (v > 0) {
                                        var v = (input.val());
                                        celda.html(v);
                                        ComprasDetalle.cell(padre, 4).data(v).draw();
                                        var row = ComprasDetalle.row(padre).data();
                                        var precio = row.Precio;
                                        var cantidad = parseFloat(($(row.Cantidad).text() !== '') ? $(row.Cantidad).text() : row.Cantidad);
                                        var importe_total = cantidad * precio;
                                        ComprasDetalle.cell(padre, 7).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                                        console.log('* ROW *');
                                        console.log(row);
                                        //SHORT POST
                                        onEditarDetalleCompra({PARENT: IDX, ID: row.ID, CELDA: 'PRECIO', VALOR: precio, SUBTOTAL: importe_total});
                                    }
                                } else {
                                    input.val('');
                                    swal({
                                        title: 'ATENCIÓN',
                                        text: "NO ES UNA CANTIDAD VÁLIDA",
                                        icon: "warning",
                                        closeOnEsc: false,
                                        closeOnClickOutside: false
                                    }).then((action) => {
                                        input.focus().select();
                                    });
                                }
                            });
                            input_cantidad.change(function () {
                                var input = $(this);
                                if ($.isNumeric(input.val())) {
                                    var v = parseFloat(input.val());
                                    if ((v > 0)) {
                                        celda.html(v);
                                        ComprasDetalle.cell(padre, 4).data(v).draw();
                                        var row = ComprasDetalle.row(padre).data();
                                        var precio = row.Precio;
                                        var cantidad = parseFloat(($(row.Cantidad).text() !== '') ? $(row.Cantidad).text() : row.Cantidad);
                                        var importe_total = cantidad * precio;
                                        ComprasDetalle.cell(padre, 7).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                                        console.log('* ROW *');
                                        console.log(row);
                                        //SHORT POST
                                        onEditarDetalleCompra({PARENT: IDX, ID: row.ID, CELDA: 'CANTIDAD', VALOR: cantidad, SUBTOTAL: importe_total});
                                    } else {
                                    }
                                } else {
                                    input.val('');
                                    swal({
                                        title: 'ATENCIÓN',
                                        text: "NO ES UNA CANTIDAD VÁLIDA",
                                        icon: "warning",
                                        closeOnEsc: false,
                                        closeOnClickOutside: false
                                    }).then((action) => {
                                        input.focus().select();
                                    });
                                }
                            });
                            input_cantidad.keyup(function (e) {
                                if (e.keyCode === 13) {
                                    var input = $(this);
                                    if ($.isNumeric(input.val())) {
                                        var v = parseFloat(input.val());
                                        if ((v > 0)) {
                                            celda.html(v);
                                            ComprasDetalle.cell(padre, 4).data(v).draw();
                                            var row = ComprasDetalle.row(padre).data();
                                            var precio = row.Precio;
                                            var cantidad = parseFloat(($(row.Cantidad).text() !== '') ? $(row.Cantidad).text() : row.Cantidad);
                                            var importe_total = cantidad * precio;
                                            ComprasDetalle.cell(padre, 7).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                                            console.log('* ROW *');
                                            console.log(row);
                                            //SHORT POST
                                            onEditarDetalleCompra({PARENT: IDX, ID: row.ID, CELDA: 'CANTIDAD', VALOR: cantidad, SUBTOTAL: importe_total});
                                        } else {
                                        }
                                    } else {
                                        input.val('');
                                        swal({
                                            title: 'ATENCIÓN',
                                            text: "NO ES UNA CANTIDAD VÁLIDA",
                                            icon: "warning",
                                            closeOnEsc: false,
                                            closeOnClickOutside: false
                                        }).then((action) => {
                                            input.focus().select();
                                        });
                                    }
                                }
                            });
                        }
                    });
                },
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api();//Get access to Datatable API
                    // Update footer
                    var total = api.column(7).data().reduce(function (a, b) {
                        var ax = 0, bx = 0;
                        ax = $.isNumeric((a)) ? parseFloat(a) : 0;
                        bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                        return  (ax + bx);
                    }, 0);
                    $(api.column(7).footer()).html(api.column(7, {page: 'current'}).data().reduce(function (a, b) {
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
                select: true,
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
    function onGuardarObservaciones() {
        swal({
            text: 'Observaciones',
            content: "input",
            button: {
                text: "Aceptar",
                closeModal: true
            }
        }).then((Observaciones) => {
            observaciones = Observaciones.toUpperCase();
            pnlDatosDetalle.find("#btnAgregarDetalle").focus();
        });
    }
    function getUID() {
        $.getJSON(master_url + 'getUID').done(function (data, x, jq) {
            if (data.length > 0) {
                var ultimo = parseInt(data[0].UID) + 1;
                pnlDatos.find("#Folio").val(ultimo);
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getPrecioListaMaterial(Material) {
        $.getJSON(master_url + 'getPrecioListaMaterial', {Material: Material}).done(function (data, x, jq) {
            if (data.length > 0) {
                var precio = parseFloat(data[0].Precio);
                pnlDatosDetalle.find("[name='Precio']").val(precio);
                pnlDatosDetalle.find("[name='Precio']").select();
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function onEditarDetalleCompra(x) {
        $.post(master_url + 'onModificarDetalle', x).done(function (data) {
            Compras.ajax.reload();
        }).fail(function (x, y, z) {
            console.log(x, x.responseText);
        });
    }
</script>
<style>
    /*https://codepen.io/sdthornton/pen/wBZdXq*/
    /*https://codepen.io/sevilayha/pen/IdGKH*/
    .btn{
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }
    .btn:hover {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }
    .card {
        background-color: transparent !important;
    }
    .card-header{
        cursor: pointer;
        color: #fff !important;
        background-color: transparent !important;
    }
    div.table-responsive tbody tr:hover td{
        color: #000 !important;
        font-weight: bold !important;
        background-color: #fff !important;
        box-shadow: inset 0 -1px 0 #0099cc;
    }
    div.table-responsive tbody tr:hover td:hover{
        box-shadow: inset 0 -2px 0 #0099cc;
    }
    tbody tr.selected td{
        color: #fff !important;
        background-color: #0099cc !important;
    }
    div.table-responsive tbody tr:not(.Serie) > td:not(.HasStock){
        -webkit-transition: all 0.25s ease-in-out;
        transition: all 0.25s ease-in-out;
    }
    div.table-responsive tbody tr:not(.Serie):hover > td:not(.HasStock){
        color: #000 !important;
        font-weight: bold !important;
        box-shadow: inset 0 -2px 0 #666666;
    }
    div.table-responsive tbody tr:not(.Serie):hover > td:not(.HasStock):hover{
        color: #000 !important;
        background-color: #fff !important;
        font-weight: bold !important;
        box-shadow: inset 0 -3px 0 #669900 !important;
    }
</style>