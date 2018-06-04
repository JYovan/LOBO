<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Asigna control a pedidos</legend>
            </div>
            <!--            <div class="col-sm-6 float-right" align="right">
                            <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="top" title="Agregar"><span class="fa fa-plus"></span><br></button>
                            <button type="button" class="btn btn-primary" id="btnAsignar" data-toggle="tooltip" data-placement="top" title="Imprimir"><span class="fa fa-print"></span><br></button>
                        </div>-->
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
                    <button type="button" class="btn btn-info" id="btnSeleccionar" data-toggle="tooltip" data-placement="top" title="Seleccionar Todos"><span class="fa fa-list"></span><br></button>
                    <button type="button" class="btn btn-primary" id="btnAsignar" data-toggle="tooltip" data-placement="top" title="Asignar"><span class="fa fa-check"></span><br></button>
                </div>
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
                            <th>MC</th>
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
    <a class="dropdown-item" href="#"><i class="fa fa-plus"></i> Action</a>
    <a class="dropdown-item" href="#"><i class="fa fa-bars"></i> Another action</a>
    <a class="dropdown-item" href="#"><i class="fa fa-search"></i> Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Separated link</a>
</div>
<script>
    var master_url = base_url + 'index.php/Programacion/';
    var Pedidos;
    var tblPedidos = $('#tblPedidos');
    var btnAsignar = $("#btnAsignar");
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
            btnAsignar.click(function () {
                console.log('* SELECCIONADOS ', Pedidos.rows(({selected: true})).data().count(), ' *');
                var subcontroles = [];
                $.each(Pedidos.rows(({selected: true})).data(), function (k, v) {
                    if (parseInt(v.Marca) < 1) {
                        subcontroles.push({
                            ID: v.ID
                        });
                    }
                });
                var f = new FormData();
                f.append('SubControles', JSON.stringify(subcontroles));
                $.ajax({
                    url: master_url + 'onMarcar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: f
                }).done(function (data, x, jq) {
                    console.log("\n", data, "\n");
                    swal('INFO', 'SE HAN MARCADO LOS REGISTROS', 'success');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                });
            });
            $('#btnNuevo').on("contextmenu", function (e) {
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
                filterColumn($(this).parents('div').attr('data-column'));
            });
        });
    }));

    function filterColumn(i) {
        tblPedidos.DataTable().column(i).search(
                $('#col' + i + '_filter').val()
                ).draw();
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
                "dom": 'rti',
                buttons: buttons,
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
                    {"data": "Anio"},
                    {"data": "Marca"}
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
                        if (mca > 0) {
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
            tblPedidos.find('tbody').on('click', 'tr', function () {
                tblPedidos.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Pedidos.row(this).data();
                temp = parseInt(dtm.ID);
                console.log('tr');
            });

            tblPedidos.find('tbody').on('dblclick', 'tr', function () {
                nuevo = false;
                tblPedidos.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Pedidos.row(this).data();
                temp = parseInt(dtm.ID);
                pnlDatos.removeClass("d-none");
                pnlTablero.addClass("d-none");
                console.log('editando...');
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
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        background-color: #669900 !important;
        color: #fff !important;
    }
</style>