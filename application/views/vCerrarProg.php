<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 text-center text-danger font-italic">
                <legend class="float-left">Seleccionar control</legend>
            </div>
        </div>
        <div class="row" style="padding-left: 15px">
            <div class="col-12 col-sm-6 col-lg-3" data-column="12">
                <strong>Maquila</strong>
                <input type="text" class="form-control form-control-sm  column_filter" id="col12_filter" autofocus>
            </div>
            <div class="col-12 col-sm-6 col-lg-3" data-column="13">
                <strong>Semana</strong>
                <input type="text" class="form-control form-control-sm column_filter" id="col13_filter">
            </div>
            <div class="col-12 col-sm-6 col-lg-3" data-column="14">
                <strong>Año</strong>
                <input type="text" class="form-control form-control-sm column_filter" id="col14_filter">
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mt-3">
                <button type="button" class="btn btn-primary" id="btnAsignar" data-toggle="tooltip" data-placement="top" title="Asignar"><span class="fa fa-check"></span><br></button>
                <button type="button" class="btn btn-danger" id="btnDeshacer" data-toggle="tooltip" data-placement="top" title="Deshacer"><span class="fa fa-undo"></span><br></button>
                <button type="button" class="btn btn-info" id="btnReload" data-toggle="tooltip" data-placement="top" title="Refrescar"><span class="fa fa-exchange-alt"></span><br></button>
                <button type="button" class="btn btn-warning" id="btnHistorialDeControles" data-toggle="tooltip" data-placement="top" title="Historial"><span class="fa fa-history"></span><br></button>
            </div>
        </div>
        <br>
        <div id="CerrarProg" class="table-responsive">
            <table id="tblCerrarProg" class="table table-sm display hover" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>IdEstilo</th>
                        <th>IdColor</th>
                        <th>Pedido</th>
                        <th>Cliente</th>

                        <th>Estilo</th>
                        <th>Color</th>
                        <th>Serie</th>
                        <th>Fecha</th>
                        <th>Fe - Pe</th>

                        <th>Fe - En</th>
                        <th>Pars</th>
                        <th>Maq</th>
                        <th>Sem</th>
                        <th>Año</th>

                        <th>Control</th>
                        <th>SerieID</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
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

                        <th style="text-align:right">Pares</th>
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
    </div>
</div>

<div id="mdlHistorial" class="modal modal-fullscreen">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Historial de controles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="Historial" class="table-responsive">
                    <table id="tblHistorial" class="table table-sm display hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th><!--0-->
                                <th>IdEstilo</th>
                                <th>IdColor</th>
                                <th>Pedido</th>
                                <th>Cliente</th><!--5-->

                                <th>Estilo</th><!--6-->
                                <th>Color</th>
                                <th>Serie</th>
                                <th>Fecha</th>
                                <th>Fe - Pe</th><!--10-->

                                <th>Fe - En</th><!--11-->
                                <th>Pars</th>
                                <th>Maq</th>
                                <th>Sem</th>
                                <th>Año</th><!--15-->

                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>

<script>
    var master_url = base_url + 'index.php/CerrarProg/';
    var CerrarProg, Historial;
    var tblCerrarProg = $('#tblCerrarProg');
    var btnAsignar = $("#btnAsignar");
    var btnDeshacer = $("#btnDeshacer");
    var btnReload = $("#btnReload");
    var btnHistorialDeControles = $("#btnHistorialDeControles");
    var mdlHistorial = $("#mdlHistorial");
    var tblHistorial = mdlHistorial.find('#tblHistorial');

    // IIFE - Immediately Invoked Function Expression
    (function (yc) {
        // The global jQuery object is passed as a parameter
        yc(window.jQuery, window, document);
    }(function ($, window, document) {
        // The $ is now locally scoped
        // Listen for the jQuery ready event on the document
        $(function () {
            getRecords();

            $(".btn").click(function () {
                onBeep(1);
            });

            btnHistorialDeControles.click(function () {
                mdlHistorial.modal('show');
            });

            mdlHistorial.on('shown.bs.modal', function () {
                getHistorialDeControles();
            });

            btnReload.click(function () {
                CerrarProg.ajax.reload();
            });

            btnDeshacer.click(function () {
                if (tblCerrarProg.find("tbody tr.HasMca.selected").length > 0) {
                    onBeep(1);
                    swal({
                        title: "Estas seguro?",
                        text: "Serán desmarcados los '" + tblCerrarProg.find("tbody tr.HasMca.selected").length + "' registros, una vez completada la acción",
                        icon: "warning",
                        buttons: true
                    }).then((willDelete) => {
                        if (willDelete) {
                            onMarcarDesMarcar(2);
                        }
                    });
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'NO HA SELECCIONADO NINGÚN REGISTRO', 'warning');
                }
            });

            btnAsignar.click(function () {
                if (tblCerrarProg.find("tbody tr.selected:not(.HasMca)").length > 0) {
                    onBeep(1);
                    swal({
                        title: "Estas seguro?",
                        text: "Serán marcados los '" + tblCerrarProg.find("tbody tr.selected:not(.HasMca)").length + "' registros, una vez completada la acción",
                        icon: "warning",
                        buttons: true
                    }).then((willDelete) => {
                        if (willDelete) {
                            onMarcarDesMarcar(1);
                        }
                    });
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'NO HA SELECCIONADO NINGÚN REGISTRO', 'warning');
                }
            });
            $('input.column_filter').on('keyup click', function () {
                var i = $(this).parents('div').attr('data-column');
                tblCerrarProg.DataTable().column(i).search($('#col' + i + '_filter').val()).draw();
            });
        });
    }));

    function getRecords() {
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblCerrarProg')) {
            tblCerrarProg.DataTable().destroy();
            CerrarProg = tblCerrarProg.DataTable({
                dom: 'Brt',
                buttons: [
                    {
                        text: "Todos",
                        className: 'btn btn-info btn-sm',
                        titleAttr: 'Todos',
                        action: function (dt) {
                            CerrarProg.rows({page: 'current'}).select();
                        }
                    },
                    {
                        extend: 'selectNone',
                        className: 'btn btn-info btn-sm',
                        text: 'Ninguno',
                        titleAttr: 'Deseleccionar Todos'
                    }
                ],
                "ajax": {
                    "url": master_url + 'getRecords',
                    "dataSrc": ""
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
                        "targets": [2],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [16],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [17],
                        "visible": false,
                        "searchable": false
                    }],
                "columns": [
                    {"data": "ID"}, /*0*/
                    {"data": "IdEstilo"}, /*1*/
                    {"data": "IdColor"}, /*2*/
                    {"data": "Pedido"}, /*3*/
                    {"data": "Cliente"}, /*4*/
                    {"data": "Estilo"}, /*5*/
                    {"data": "Color"}, /*6*/
                    {"data": "Serie"}, /*7*/
                    {"data": "Fecha Captura"}, /*8*/
                    {"data": "Fecha Pedido"}, /*9*/
                    {"data": "Fecha Entrega"}, /*10*/
                    {"data": "Pares"}, /*11*/
                    {"data": "Maq"}, /*12*/
                    {"data": "Semana"}, /*13*/
                    {"data": "Anio"}, /*14*/
                    {"data": "Control"}, /*15*/
                    {"data": "SerieID"}/*16*/,
                    {"data": "ID_PEDIDO"}/*17*/
                ],
                language: lang,
                select: true,
                keys: true,
                "autoWidth": true,
                "colReorder": true,
                "displayLength": 9999999999,
                "scrollY": 380,
                "scrollX": true,
                "bLengthChange": false,
                "deferRender": true,
                "scrollCollapse": false,
                "bSort": true,
                "aaSorting": [
                    [0, 'desc']/*ID*/
                ],
                "createdRow": function (row, data, dataIndex, cells) {
                    $.each($(row).find("td"), function (k, v) {
                        switch (parseInt(k)) {
                            case 1:
                                $(v).attr('title', data["Cliente Razon"]);
                                break;
                            case 2:
                                $(v).attr('title', data["Descripcion Estilo"]);
                                break;
                            case 3:
                                $(v).attr('title', data["Descripcion Color"]);
                                break;
                        }
                    });
                    $.each($(row), function (k, v) {
                        if (data["Marca"] > 0 && data["Control"] !== '') {
                            $(v).addClass('HasMca');
                        }
                    });
                },
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api();//Get access to Datatable API
                    // Update footer
                    $(api.column(11).footer()).html(api.column(11, {page: 'current'}).data().reduce(function (a, b) {
                        return parseFloat(a) + parseFloat(b);
                    }, 0));
                }
            });
        }
        var tcv = '';
        CerrarProg.on('key', function (e, datatable, key, cell, originalEvent) {
            var t = $('#tblCerrarProg > tbody');
            var a = t.find("#EditingField");
            if (key === 13) {
                tcv = cell.data();
                if (a.val() !== 'undefined' && a.val() !== undefined) {
                    var b = CerrarProg.cell(a.parent()).index();
                    var c = a.val();
                    var d = a.parent();
                    d.html(c);
                    CerrarProg.cell(d, b).data(c).draw();
                }
                var td = $(this).find("td.focus");
                var g = '<input id="EditingField" type="text" class="form-control form-control-sm">';
                console.log(e, key, cell.data(), td.text());
                var g = '<input id="EditingField" type="text" class="form-control form-control-sm" value="' + cell.data() + '" autofocus>';
                td.html(g);
                td.find("#EditingField").focus();
                td.find("#EditingField").select();
            }
        }).on('key-blur', function (e, datatable, cell) {
            var t = $('#tblCerrarProg > tbody');
            var a = t.find("#EditingField");
            if (a.val() !== 'undefined' && a.val() !== undefined) {
                var b = CerrarProg.cell(a.parent()).index();
                var c = a.val() !== '' ? a.val() : tcv;
                var d = a.parent();
                d.html(c);
                CerrarProg.cell(d, b).data(c).draw();
            }
        });
        HoldOn.close();
    }

    function onMarcarDesMarcar(i) {
        HoldOn.open({
            theme: 'sk-bounce',
            message: 'ESPERE...'
        });
        var subcontroles = [];
        $.each((i <= 1) ? tblCerrarProg.find("tbody tr.selected:not(.HasMca)") : tblCerrarProg.find("tbody tr.selected.HasMca"), function (k, v) {
            var r = CerrarProg.row($(this)).data();
            subcontroles.push({
                ID: r.ID, 
                Estilo: r.IdEstilo, 
                Color: r.IdColor, 
                Serie: r.SerieID,
                Cliente: r.Cliente, 
                Pares: r.Pares, 
                Pedido: r.ID_PEDIDO, 
                PedidoDetalle: r.ID,
                Maquila: r.Maq, 
                Semana: r.Semana, 
                Control: r.Control,
                DescripcionEstilo: r["Descripcion Estilo"],
                ColorDescripcion: r["Descripcion Color"],
                PedidoID: r.Pedido,
                FechaPedido: r["Fecha Pedido"],
                FechaEntregaRecepcion : r["Fecha Entrega"],
                FechaCaptura:r["Fecha Captura"],
                ClaveCliente: r.Cliente,
                ClienteRazon:r["Cliente Razon"],
                Precio:r.Precio,
                Importe: r.Importe,
                Descuento: r.Desc,
                FechaEntrega: r.Entrega,
                Ano:r.Anio,
                Marca: r.Marca
            });
            console.log("\n * ROW * \n", r, "\n * FIN ROW* \n");
        });
        var f = new FormData();
        f.append('Marca', i);
        f.append('SubControles', JSON.stringify(subcontroles));
        $.ajax({
            url: master_url + 'onGenerarControles',
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: f
        }).done(function (data, x, jq) {
            console.log(data)
            swal('INFO', 'SE HAN ' + (i > 0 ? 'MARCADO' : 'DESMARCADO') + ' LOS REGISTROS', 'success');
            CerrarProg.ajax.reload();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        HoldOn.close();
        });
    }

    function getHistorialDeControles() {
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblHistorial')) {
            if (Historial !== undefined) {
                Historial.clear().draw();
                Historial.ajax.reload();
            } else {
                tblHistorial.DataTable().destroy();
                Historial = tblHistorial.DataTable({
                    dom: 'Brt',
                    buttons: [
                        {
                            text: "Todos",
                            className: 'btn btn-info btn-sm',
                            titleAttr: 'Todos',
                            action: function (dt) {
                                Historial.rows({page: 'current'}).select();
                            }
                        },
                        {
                            extend: 'selectNone',
                            className: 'btn btn-info btn-sm',
                            text: 'Ninguno',
                            titleAttr: 'Deseleccionar Todos'
                        }
                    ],
                    "ajax": {
                        "url": master_url + 'getHistorialDeControles',
                        "dataSrc": ""
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
                            "targets": [2],
                            "visible": false,
                            "searchable": false
                        }],
                    "columns": [
                        {"data": "ID"}, /*0*/
                        {"data": "IdEstilo"}, /*1*/
                        {"data": "IdColor"}, /*2*/
                        {"data": "Pedido"}, /*3*/
                        {"data": "Cliente"}, /*4*/
                        {"data": "Estilo"}, /*5*/
                        {"data": "Color"}, /*6*/
                        {"data": "Serie"}, /*7*/
                        {"data": "Fecha Captura"}, /*8*/
                        {"data": "Fecha Pedido"}, /*9*/
                        {"data": "Fecha Entrega"}, /*10*/
                        {"data": "Pares"}, /*11*/
                        {"data": "Maquila"}, /*12*/
                        {"data": "Semana"}, /*13*/
                        {"data": "Anio"}, /*14*/
                        {"data": "Control"} /*15*/
                    ],
                    language: lang,
                    select: true,
                    keys: true,
                    "autoWidth": true,
                    "colReorder": true,
                    "displayLength": 9999999999,
                    "scrollY": 380,
                    "scrollX": true,
                    "bLengthChange": false,
                    "deferRender": true,
                    "scrollCollapse": false,
                    "bSort": true,
                    "aaSorting": [
                        [0, 'desc']/*ID*/
                    ],
                    "createdRow": function (row, data, dataIndex, cells) {
                        $.each($(row).find("td"), function (k, v) {
                            switch (parseInt(k)) {
                                case 1:
                                    $(v).attr('title', data["Cliente Razon"]);
                                    break;
                                case 2:
                                    $(v).attr('title', data["Descripcion Estilo"]);
                                    break;
                                case 3:
                                    $(v).attr('title', data["Descripcion Color"]);
                                    break;
                            }
                        });
                        $.each($(row), function (k, v) {
                            if (data["Marca"] > 0 && data["Control"] !== '') {
                                $(v).addClass('HasMca');
                            }
                        });
                    },
                    "footerCallback": function (row, data, start, end, display) {
                        var api = this.api();//Get access to Datatable API
                        // Update footer
                        $(api.column(11).footer()).html(api.column(11, {page: 'current'}).data().reduce(function (a, b) {
                            return parseFloat(a) + parseFloat(b);
                        }, 0));
                    }
                });
            }
        }
    }
</script>
<style>
    tr:hover td{
        background-color: #1b4f72;
        color: #fff;
    }
    td{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    td:hover {
        position: relative; 
        background-color: #99cc00 !important;
        font-weight: bold;
        font-size: 12px;
        color:  #fff;
    }

    td[title]:hover:after { 
        text-align: center;
        content: attr(title);
        padding: 3px 5px 0px 5px;
        position: absolute;
        left: 0;
        top: 100%;
        white-space: nowrap;
        z-index: 1;
        background: #0099cc;
        color: #fff; 
    }
    .btn-primary{ 
        /* padding: 30px 40px 30px 40px;
         border-radius: 100px;*/
        border-color:#232d38;
        border-bottom-width: 10px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,.2), 0 6px 20px 0 rgba(0,0,0,0.19)!important;
    }
    .btn-primary:active{
        background-color: #2384c6;
        border-top-width: 0px;
        border-bottom-width: 0px;
        margin: 10px 0px 0px 0px !important;  
    }
    .btn-danger{ 
        /* padding: 30px 40px 30px 40px;
         border-radius: 100px;*/
        border-color: #c51f0f;
        border-bottom-width: 10px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,.2), 0 6px 20px 0 rgba(0,0,0,0.19)!important;
    }
    .btn-danger:active{
        background-color: #2384c6;
        border-top-width: 0px;
        border-bottom-width: 0px;
        margin: 10px 0px 0px 0px !important;  
    }
    .btn-info{ 
        /* padding: 30px 40px 30px 40px;
         border-radius: 100px;*/
        border-color: #2384c6;
        border-bottom-width: 10px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,.2), 0 6px 20px 0 rgba(0,0,0,0.19)!important;
    }
    .btn-info:active{
        background-color: #2384c6;
        border-top-width: 0px;
        border-bottom-width: 0px;
        margin: 10px 0px 0px 0px !important;  
    }
    .btn-warning{ 
        /* padding: 30px 40px 30px 40px;
         border-radius: 100px;*/
        border-color: #d08f29;
        border-bottom-width: 10px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,.2), 0 6px 20px 0 rgba(0,0,0,0.19)!important;
    }
    .btn-warning:active{
        background-color: #F39C12;
        border-top-width: 0px;
        border-bottom-width: 0px;
        margin-top: 10px;  
    }
</style>