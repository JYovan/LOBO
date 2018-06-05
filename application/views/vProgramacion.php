<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Seleccionar pedidos p/ control</legend>
            </div>
        </div>
        <div class="card-block">
            <div class="row" style="padding-left: 15px">
                <div class="col" data-column="12">
                    <strong>Maquila</strong>
                    <input type="text" class="form-control form-control-sm  column_filter" id="col12_filter" autofocus>
                </div>
                <div class="col" data-column="13">
                    <strong>Semana</strong>
                    <input type="text" class="form-control form-control-sm column_filter" id="col13_filter">
                </div>
                <div class="col" data-column="14">
                    <strong>Año</strong>
                    <input type="text" class="form-control form-control-sm column_filter" id="col14_filter">
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary" id="btnAsignar" data-toggle="tooltip" data-placement="top" title="Asignar"><span class="fa fa-check"></span><br></button>
                    <button type="button" class="btn btn-danger" id="btnDeshacer" data-toggle="tooltip" data-placement="top" title="Deshacer"><span class="fa fa-undo"></span><br></button>
                </div>
            </div>
            <br>
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
<div class="dropdown-menu" style="font-size: 12px;" id='menu'>
    <a class="dropdown-item" href="#" onclick="btnAsignar.trigger('click')"><i class="fa fa-check-square"></i> Marcar</a>
    <a class="dropdown-item" href="#" onclick="btnDeshacer.trigger('click')"><i class="fa fa-minus-square"></i> Desmarcar</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#"  onclick="btnDeshacer.trigger('click')"><i class="fa fa-undo"></i> Deshacer</a>
</div>
<script>
    var master_url = base_url + 'index.php/Programacion/';
    var Pedidos;
    var tblPedidos = $('#tblPedidos');
    var btnAsignar = $("#btnAsignar");
    var btnDeshacer = $("#btnDeshacer");
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

        btnDeshacer.click(function () {
                if (Pedidos.rows(({selected: true})).data().count() > 0) {
                    swal({
                        title: "Estas seguro?",
                        text: "Serán desmarcados los '" + Pedidos.rows(({selected: true})).data().count() + "' registros, una vez completada la acción",
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
                if (Pedidos.rows(({selected: true})).data().count() > 0) {
                    swal({
                        title: "Estas seguro?",
                        text: "Serán marcados los '" + Pedidos.rows(({selected: true})).data().count() + "' registros, una vez completada la acción",
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
                var top = e.pageY + 20;
                var left = e.pageX - 180;
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
        console.log('* SELECCIONADOS ', Pedidos.rows(({selected: true})).data().count(), ' *');
        var subcontroles = [];
        $.each(Pedidos.rows(({selected: true})).data(), function (k, v) {
            if (parseInt(v.Marca) !== i) {
                subcontroles.push({
                    ID: v.ID
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

                        var cells = $(v).find("td");
                        var mca = parseInt(cells.eq(12).text());
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
        color: #E74C3C!important;
        font-weight: bold;
    }
</style>