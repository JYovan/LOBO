<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Controles</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="top" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div id="Pedidos" class="table-responsive">
                <table id="tblPedidos" class="table table-sm display hover" style="width:100%">
                    <thead>
                        <tr><tr>
                            <th>ID</th>
                            <th>IdEstilo</th>
                            <th>IdColor</th>
                            <th>Estilo</th>
                            <th>Semana</th>
                            <th>Maq</th>
                            <th>	Pares	</th>
                            <th>	Precio	</th>
                            <th>	Importe	</th>
                            <th>	Desc	</th>
                            <th>	Entrega	</th> 
                        </tr>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
    // IIFE - Immediately Invoked Function Expression
    (function (yc) {
        // The global jQuery object is passed as a parameter
        yc(window.jQuery, window, document);
    }(function ($, window, document) {
        // The $ is now locally scoped
        // Listen for the jQuery ready event on the document
        $(function () {
            getRecords();
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
        });
    }));
    function getRecords() {
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblPedidos')) {
            tblPedidos.DataTable().destroy();
            $.getJSON(master_url + 'getRecords').done(function (data) {
                console.log(data)
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {

            });
            Pedidos = tblPedidos.DataTable({
                "dom": 'Bfrti',
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
                    {"data": "Estilo"},
                    {"data": "Semana"},
                    {"data": "Maq"},
                    {"data": "Pares"},
                    {"data": "Precio"},
                    {"data": "Importe"},
                    {"data": "Desc"},
                    {"data": "Entrega"}
                ],
                language: lang,
                select: true,
                "autoWidth": true,
                "colReorder": true,
                "displayLength": 9999999999,
                "scrollY": 460,
                "scrollX": true,
                "bLengthChange": false,
                "deferRender": true,
                "scrollCollapse": false,
                "bSort": true,
                "aaSorting": [
                    [0, 'desc']/*ID*/
                ], "createdRow": function (row, data, dataIndex, cells) {
                    $.each($(row).find("td"), function (k, v) {
                        if (parseInt(k) === 0) {
                            $(v).attr('title', data.Estilo);
                        }
                    });
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
                HoldOn.open({
                    theme: 'sk-bounce',
                    message: 'CARGANDO...'
                });
                $.getJSON(master_url + 'getListaByID', {ID: temp}).done(function (data, x, jq) {
                    var l = data[0];
                    pnlDatos.find("#ID").val(l.IDE);
                    pnlDatos.find("#Descripcion").val(l["DESCRIPCIÓN"]);
                    pnlDatos.find("#Estatus")[0].selectize.setValue(l.ESTATUS);
                    /*OBTENER DETALLE*/
                    $.getJSON(master_url + 'getListaDetalleByID', {ID: temp}).done(function (dtm, x, jq) {
                        tblLista.clear().draw();
                        $.each(dtm, function (k, v) {
                            tblLista.row.add([v.ID, v.ID_ESTILO, v.ESTILO,
                                "$" + $.number(v.PRECIO, 2, '.', ','),
                                '<span class="fa fa-trash" onclick="onRemover(this)"></span>',
                                v.ID/*orden descendente*/
                            ]).draw(false);
                        });
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
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
</style>