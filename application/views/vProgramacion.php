<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Seleccionar pedidos p/ control</legend>
            </div>
        </div>
        <div class="card-block">
            <div class="row" style="padding-left: 15px">
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3" data-column="12">
                    <strong>Maquila</strong>
                    <input type="text" class="form-control form-control-sm  column_filter" id="col12_filter" autofocus>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3" data-column="13">
                    <strong>Semana</strong>
                    <input type="text" class="form-control form-control-sm column_filter" id="col13_filter">
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3" data-column="14">
                    <strong>Año</strong>
                    <input type="text" class="form-control form-control-sm column_filter" id="col14_filter">
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                    <button type="button" class="btn btn-primary m-2" id="btnAsignar" data-toggle="tooltip" data-placement="top" title="Asignar"><span class="fa fa-check"></span><br>Asignar</button>
                    <button type="button" class="btn btn-danger m-2" id="btnDeshacer" data-toggle="tooltip" data-placement="top" title="Deshacer"><span class="fa fa-undo"></span><br>Deshacer</button>
                </div>
            </div>
            <div class="w-100 m-2"></div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-2"  align="right">
                <button type="button" id="btnGestionarSemanaMaquila" name="btnGestionarSemanaMaquila" class="btn btn-warning"  data-toggle="tooltip" data-placement="top" title="Cambiar">
                    <span class="fa fa-bolt fa-lg"></span>
                </button>
            </div>
            <div id="Pedidos" class="table-responsive">
                <table id="tblPedidos" class="table table-sm display hover" style="width:100%">
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
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="dropdown-menu animated flipInX" style="font-size: 12px;" id='menu'>
    <a class="dropdown-item" href="#" onclick="btnAsignar.trigger('click')"><i class="fa fa-check-square"></i> Marcar</a>
    <a class="dropdown-item" href="#" onclick="btnGestionarSemanaMaquila.trigger('click')"><i class="fa fa-bolt"></i> Modificar</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#"  onclick="btnDeshacer.trigger('click')"><i class="fa fa-undo"></i> Deshacer</a>
</div>

<!--MODAL MODIFICAR CONTROL-->

<div id="mdlGestionDeControles" class="modal">
    <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Modificar maquila y semana</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <h4>Semana</h4>
                        <input class="form-control numbersOnly" id="SemanaMSD" maxlength="4" type="text" placeholder="Numero de semana 1-52">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <h4>Maquila</h4>
                        <input class="form-control numbersOnly" id="MaquilaMSD" type="text" maxlength="4" placeholder="Número de maquila" autofocus>
                    </div>
                    <div align="center" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-2">
                        <h4 class="text-danger">* 0 registros seleccionados*</h4>
                    </div>
                    <div class="col-12 text-center">
                        <h3><span class="badge badge-pill badge-warning m-2">ESTILO - COLOR - SEMANA - MAQUILA</span></h3>
                    </div>
                    <div id="Afectados" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 row animated flipInX">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnAceptarMSD"><span class="fa fa-check fa-lg"></span>Aceptar</button>
            </div>
        </div>
    </div>
</div>
<script>
    var master_url = base_url + 'index.php/Programacion/';
    var Pedidos;
    var tblPedidos = $('#tblPedidos');
    var btnAsignar = $("#btnAsignar");
    var btnDeshacer = $("#btnDeshacer");
    var mdlGestionDeControles = $("#mdlGestionDeControles");
    var btnGestionarSemanaMaquila = $("#btnGestionarSemanaMaquila");
    var btnAceptarMSD = mdlGestionDeControles.find("#btnAceptarMSD");

    // IIFE - Immediately Invoked Function Expression
    (function (yc) {
        // The global jQuery object is passed as a parameter
        yc(window.jQuery, window, document);
    }(function ($, window, document) {
        // The $ is now locally scoped
        // Listen for the jQuery ready event on the document
        $(function () {
            getRecords();
            handleEnter();

            btnAceptarMSD.click(function () {
                var ctrls = [];
                $.each(tblPedidos.find("tbody tr:not(.Serie).selected"), function (k, v) {
                    var r = Pedidos.row($(this)).data();
                    ctrls.push({ID: r.ID, SEMANA: r.Semana, MAQUILA: r.Maq});
                });
                if (ctrls.length > 0) {
                    console.log("\n Controles\n", ctrls, "\n");
                    var semana = mdlGestionDeControles.find("#SemanaMSD").val();
                    var maquila = mdlGestionDeControles.find("#MaquilaMSD").val();
                    if (semana !== '' || maquila !== '') {
                        swal({
                            title: "¿Estas seguro?",
                            text: "Serán afectados los '" + ctrls.length + "' registros y controles correspondientes, una vez completada la acción",
                            icon: "warning",
                            buttons: true
                        }).then((willDelete) => {
                            if (willDelete) {
                                //MODIFICAR MAQUILA,SEMANA, DESCUENTO
                                var params = {
                                    rows: JSON.stringify(ctrls),
                                    SEMANA: semana,
                                    MAQUILA: maquila
                                };
                                console.log("\n", params, "\n");
                                $.post(master_url + 'onModificarMSD', params).done(function (data, x, jq) {
                                    console.log("\n", "DATA \n");
                                    console.log(data);
                                    console.log("\n");
                                    mdlGestionDeControles.modal('hide');
                                    Pedidos.ajax.reload();
                                    swal('ATENCIÓN', 'SE HAN MODIFICADO ' + ctrls.length + ' REGISTROS !', 'success');
                                    onBeep(1);
                                }).fail(function (x, y, z) {
                                    console.log(x, y, z);
                                }).always(function () {

                                });
                            }
                        });
                    } else {
                        onBeep(2);
                        swal('ATENCIÓN', 'NO HA ESPECIFICADO LA SEMANA O MAQUILA', 'warning');
                    }
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'NO HA SELECCIONADO NINGÚN REGISTRO', 'warning');
                }
            });
            btnGestionarSemanaMaquila.click(function () {
                var rows = tblPedidos.find("tbody tr.selected");
                var n = rows.length;
                if (n > 0) {
                    var span = '';
                    $.each(rows, function (k, v) {
                        var tds = $(v).find("td");
                        if (!tds.eq(0).hasClass('Serie') && tds.eq(0).text() !== '') {
                            console.log("\n * TD * \n", tds, "\n * FIN TD * \n");
                            span += '<h3><span class="badge badge-pill badge-primary m-2">' + tds.eq(2).text() + ' - ' + tds.eq(3).text() + ' - ' + tds.eq(10).text() + ' - ' + tds.eq(9).text() + '</span></h3>';
                        }
                    });
                    onBeep(3);
                    mdlGestionDeControles.find("#SemanaMSD").val('');
                    mdlGestionDeControles.find("#MaquilaMSD").val('');
                    mdlGestionDeControles.find("#Afectados").html(span);
                    mdlGestionDeControles.find("div>h4.text-danger").text('*' + mdlGestionDeControles.find("#Afectados span.badge-primary").length + ' registros seleccionados*');
                    mdlGestionDeControles.modal('show');
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'NO HA SELECCIONADO NINGÚN REGISTRO', 'warning');
                }
            });
            btnDeshacer.click(function () {
                if (tblPedidos.find("tbody tr.HasMca.selected").length > 0) {
                    swal({
                        title: "Estas seguro?",
                        text: "Serán desmarcados los '" + tblPedidos.find("tbody tr.HasMca.selected").length + "' registros, una vez completada la acción",
                        icon: "warning",
                        buttons: true
                    }).then((willDelete) => {
                        if (willDelete) {
                            onMarcarDesMarcar(0);
                        }
                    });
                } else {
                    swal('ATENCIÓN', 'NO HA SELECCIONADO NINGÚN REGISTRO', 'warning');
                }
            });

            btnAsignar.click(function () {
                if (tblPedidos.find("tbody tr:not(.HasMca).selected").length > 0) {
                    swal({
                        title: "Estas seguro?",
                        text: "Serán marcados los '" + tblPedidos.find("tbody tr:not(.HasMca).selected").length + "' registros, una vez completada la acción",
                        icon: "warning",
                        buttons: true
                    }).then((willDelete) => {
                        if (willDelete) {
                            onMarcarDesMarcar(1);
                        }
                    });
                } else {
                    swal('ATENCIÓN', 'NO HA SELECCIONADO NINGÚN REGISTRO', 'warning');
                }
            });
            $('#Pedidos').on("contextmenu", function (e) {
                e.preventDefault();
                var top = e.pageY + 5;
                var left = e.pageX - 160;
                $("#menu").css({
                    display: "block",
                    top: top,
                    left: left
                });
                return false; //blocks default Webbrowser right click menu
            });
            $(document).click(function () {
                $("#menu").hide();
            });

            $('input.column_filter').on('keyup click', function () {
                var i = $(this).parents('div').attr('data-column');
                tblPedidos.DataTable().column(i).search($('#col' + i + '_filter').val()).draw();
            });
        });
    }));

    function onMarcarDesMarcar(i) {
        var subcontroles = [];
        $.each((i <= 0) ? tblPedidos.find("tbody tr.HasMca.selected") : tblPedidos.find("tbody tr:not(.HasMca).selected"), function (k, v) {
            var r = Pedidos.row($(this)).data();
            if (parseInt(v.Marca) !== i) {
                subcontroles.push({
                    ID: r.ID
                });
            }
        });
        var f = new FormData();
        f.append('Marca', i);
        f.append('SubControles', JSON.stringify(subcontroles));
        $.ajax({
            url: master_url + 'onMarcarDesMarcar',
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: f
        }).done(function (data, x, jq) {
            console.log("\n", data, "\n");
            swal('INFO', 'SE HAN ' + (i > 0 ? 'MARCADO' : 'DESMARCADO') + ' LOS REGISTROS', 'success');
            Pedidos.ajax.reload();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }


    function getRecords() {
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblPedidos')) {
            tblPedidos.DataTable().destroy();
            Pedidos = tblPedidos.DataTable({
                dom: 'Brt',
                buttons: [
                    {
                        text: "Todos",
                        className: 'btn btn-info btn-sm',
                        titleAttr: 'Todos',
                        action: function (dt) {
                            Pedidos.rows({page: 'current'}).select();
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
                    }],
                "columns": [
                    {"data": "ID"},
                    {"data": "IdEstilo"},
                    {"data": "IdColor"},
                    {"data": "Pedido"},
                    {"data": "Cliente"},
                    {"data": "Estilo"},
                    {"data": "Color"},
                    {"data": "Serie"},
                    {"data": "Fecha Captura"},
                    {"data": "Fecha Pedido"},
                    {"data": "Fecha Entrega"},
                    {"data": "Pares"},
                    {"data": "Maq"},
                    {"data": "Semana"},
                    {"data": "Anio"}
                ],
                language: lang,
                select: true,
                "autoWidth": true,
                "colReorder": true,
                "displayLength": 9999999999,
                "scrollY": 430,
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
                        if (data["Marca"] > 0) {
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
        HoldOn.close();
    }

</script>
<style>
    td.highlight {
        background-color: whitesmoke !important;
    }
    tr.hover{
        background-color: whitesmoke !important;
    }
    tr.HasMca td{
        color: #E74C3C !important;
        font-weight: bold;
    }
    tr.HasMca.selected td{
        background-color: #ffff00 !important;
        color: #000 !important;
        font-weight: bold;
    }
    div.dropdown-menu{
        border: 1px solid #acb2b7;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19)!important;
    } 
    tr:hover td{
        background-color: #ffffcc !important;
        color: #000 !important;
        font-weight: bold;
    }
    table tbody tr td:hover{
        background-color: #333 !important;
        color: #fff !important;
        font-weight: bold;
    }

    .btn-warning{ 
        -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
        -webkit-animation-duration: 1s; /* Safari 4.0 - 8.0 */
        animation-name: example;
        animation-duration: 4s;
       /* padding: 30px 40px 30px 40px;
        border-radius: 100px;*/
        border-color: #d08f29;
        border-bottom-width: 10px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,.2), 0 6px 20px 0 rgba(0,0,0,0.19)!important;
        animation-iteration-count: infinite; 
    }
    .btn-warning:active{
        background-color: #F39C12;
        border-top-width: 0px;
        border-bottom-width: 0px;
        margin-top: 10px;  
    }
    @keyframes example {
        from {background-color: #ffcc00;}
        to {background-color: #F39C12;}
    }
</style>