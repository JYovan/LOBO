<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Listas de precios</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div id="Listas" class="table-responsive">
                <table id="tblListas" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Estilos</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
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
                    <div class="col-md-2 float-left">
                        <legend class="float-left">Lista de precios</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="d-none">
                        <input type="text" class="form-control" id="ID" name="ID">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-lg-6">
                        <label for="Descripcion">Descripción*</label>
                        <input type="text" id="Descripcion" name="Descripcion" class="form-control form-control-sm" placeholder="NOMBRE DE LA LISTA..." required="">
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-lg-5">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-sm required" id="Estatus"  name="Estatus">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-lg-5">
                        <label for="">*Estilo</label>
                        <select class="form-control form-control-sm" id="Estilo" name="Estilo"></select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-5 col-lg-5 col-lg-5">
                        <label for="">*Precio</label>
                        <input type="text" id="Precio" name="Precio" class="form-control form-control-sm" placeholder="0.0">
                    </div>
                    <div class="col-12 col-sm-1 col-md-1 col-lg-1 col-lg-1"><br>
                        <button type="button" class="btn btn-primary btn-sm" id="btnAgregar"><span class="fa fa-plus"></span><br></button>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>

                    <div id="Lista" class="table-responsive">
                        <table id="tblLista" class="table table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID_ESTILO</th>
                                    <th>Estilo</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                    <th>Orden</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Confirmacion-->
<div class="modal fade" id="mdlConfirmar" tabindex="-1" role="dialog">
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
<script>
    var master_url = base_url + 'index.php/ListaDePrecios/';
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = pnlTablero.find("#btnNuevo");
    var pnlDatos = $("#pnlDatos");
    var Estilo = pnlDatos.find("#Estilo");
    var btnAgregar = pnlDatos.find("#btnAgregar");
    var Precio = pnlDatos.find("#Precio");
    var orden = 0;
    var tblLista;
    var tblListas = $('#tblListas');
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");
    var ListasDePrecios;
    var btnEliminar = mdlConfirmar.find("#btnEliminar");
    var nuevo = false;
    var lang = {
        processing: "Proceso en curso...",
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ Elementos",
        info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
        infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
        infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
        infoPostFix: "",
        loadingRecords: "Procesando los datos...",
        zeroRecords: "No se encontro nada.",
        emptyTable: "No existen datos en la tabla.",
        paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "&Uacute;ltimo"
        },
        aria: {
            sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
            sortDescending: ": Habilitado para ordenar la columna en orden descendente"
        },
        buttons: {
            copyTitle: 'Registros copiados a portapapeles',
            copyKeys: 'Copiado con teclas clave.',
            copySuccess: {
                _: ' %d Registros copiados',
                1: ' 1 Registro copiado'
            }
        }
    };
    // IIFE - Immediately Invoked Function Expression
    (function (yourcode) {
        // The global jQuery object is passed as a parameter
        yourcode(window.jQuery, window, document);
    }(function ($, window, document) {
        // The $ is now locally scoped
        // Listen for the jQuery ready event on the document
        $(function () {
            // The DOM is ready!
            getRecords();
            getEstilos();
            handleEnter();

            /*RECONFIGURAR LA TABLA*/
            if ($.fn.DataTable.isDataTable('#tblLista')) {
                pnlDatos.find('#tblLista').DataTable().destroy();
            }
            tblLista = pnlDatos.find("#tblLista").DataTable({
                "dom": 'frt',
                "autoWidth": false,
                "colReorder": true,
                "displayLength": 500,
                "bLengthChange": false,
                "deferRender": true,
                "scrollY": 350,
                "scrollCollapse": false,
                keys: true,
                "bSort": true,
                "aaSorting": [
                    [3, 'desc']/*ID*/
                ],
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
                        "targets": [5],
                        "visible": false,
                        "searchable": false
                    }],
                language: lang
            });

            btnNuevo.click(function () {
                nuevo = true;
                pnlDatos.removeClass("d-none");
                pnlTablero.addClass("d-none");
                pnlDatos.find("#Descripcion").focus();
            });

            btnAgregar.click(function () {
                var existe = false;
                /*VALIDAR LA EXISTENCIA DEL ESTILO DENTRO DE LA TABLA*/
                $.each(tblLista.rows().data(), function () {
                    var Estilo_ID = parseInt($(this)[1]);
                    if (Estilo_ID === parseInt(Estilo.val())) {
                        existe = true;
                        return false;
                    }
                });
                /**/
                if (!existe) {
                    if (Estilo.val() !== '' && Precio.val() !== '') {
                        if (parseFloat(Precio.val()) >= 0) {
                            tblLista.row.add([0,
                                Estilo.val(), Estilo.text(),
                                "$" + $.number(Precio.val(), 2, '.', ','),
                                '<span class="fa fa-trash" onclick="onRemover(this)"></span>',
                                orden/*orden descendente*/
                            ]).draw(false);
                            agregados.push({
                                Estilo: Estilo.val(),
                                Precio: Precio.val()
                            });
                            pnlDatos.find("[name='Precio']").val('');
                            pnlDatos.find("[name='Estilo']")[0].selectize.clear(true);
                            pnlDatos.find("[name='Estilo']")[0].selectize.focus();
                        } else {
                            onBeep(2);
                            swal('ATENCIÓN', 'DEBE DE ESPECIFICAR UN PRECIO MAYOR O IGUAL A ZERO (0)', 'warning');
                        }
                    } else {
                        onBeep(2);
                        swal('ATENCIÓN', 'DEBE DE ESPECIFICAR UN ESTILO Y UN PRECIO', 'warning');
                    }
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'EL ESTILO YA FUE AGREGADO', 'warning');
                }
            });

            btnGuardar.click(function () {
                if (pnlDatos.find("#Descripcion").val() !== '') {
                    if (tblLista.rows().data().count() > 0) {
                        var lista = [];
                        $.each(tblLista.rows().data(), function () {
                            lista.push({
                                ID: parseInt($(this)[0]),
                                Estilo: parseInt($(this)[1]),
                                Precio: getNumberFloat($(this)[3])
                            });
                        });
                        var f = new FormData();
                        f.append('Descripcion', pnlDatos.find("#Descripcion").val());
                        f.append('Estatus', pnlDatos.find("#Estatus").val());
                        f.append('Lista', JSON.stringify(lista));
                        if (nuevo) {
                            $.ajax({
                                url: master_url + 'onAgregar',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: f
                            }).done(function (data, x, jq) {
                                console.log(data);
                                swal('ÉXITO', 'SE HA REGISTRADO UNA NUEVA LISTA DE PRECIOS', 'success');
                                getRecords();
                                btnCancelar.trigger('click');
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                                nuevo = false;
                            });
                        } else {
                            f.append('ID', pnlDatos.find("#ID").val());
                            f.append('Descripcion', pnlDatos.find("#Descripcion").val());
                            f.append('Estatus', pnlDatos.find("#Estatus").val());
                            f.append('Agregados', JSON.stringify(agregados));
                            f.append('Removidos', JSON.stringify(removidos));
                            console.log('* AGREGADOS *');
                            console.log(agregados);
                            console.log('* REMOVIDOS *');
                            console.log(removidos);
                            console.log('* FIN AGREGADOS REMOVIDOS *');
                            $.ajax({
                                url: master_url + 'onModificar',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: f
                            }).done(function (data, x, jq) {
                                console.log(data);
                                tblLista.clear().draw();
                                swal('ÉXITO', 'SE HA MODIFICADO UNA LISTA DE PRECIOS', 'success');
                                getRecords();
                                btnCancelar.trigger('click');
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                                nuevo = false;
                            });
                        }
                    } else {
                        onBeep(2);
                        swal('ATENCIÓN', 'NO HA AGREGADO PRECIOS', 'warning');
                    }
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'NO HA DEFINIDO UNA DESCRIPCIÓN A LA LISTA', 'warning');
                }
            });

            btnCancelar.click(function () {
                nuevo = false;
                tblLista.clear().draw();
                pnlDatos.addClass("d-none");
                pnlTablero.removeClass("d-none");
                pnlDatos.find("#Descripcion").val('');
                pnlDatos.find("#Estatus")[0].selectize.clear(true);
                removidos = [];
                agregados = [];
            });

            btnConfirmarEliminar.click(function () {
                if (temp !== 0 && temp !== undefined && temp > 0) {
                    mdlConfirmar.modal('show');
                } else {
                    onBeep(2);
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
                        swal('ATENCIÓN', 'MATERIAL POR COMBINACIÓN ELIMINADO', 'warning');
                        getRecords();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                        temp = 0;
                    });
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                }
            });
        });

        function getRecords() {
            HoldOn.open({
                theme: 'sk-cube',
                message: 'CARGANDO...'
            });
            $.fn.dataTable.ext.errMode = 'throw';

            if ($.fn.DataTable.isDataTable('#tblListas')) {
                tblListas.DataTable().destroy();
                $.getJSON(master_url + 'getRecords').done(function (data) {
                    console.log(data)
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {

                });
                ListasDePrecios = tblListas.DataTable({
                    "dom": 'Bfrtip',
                    buttons: buttons,
                    "ajax": {
                        "url": master_url + 'getRecords',
                        "dataType": "jsonp",
                        "dataSrc": ""
                    },
                    "columns": [
                        {"data": "ID"},
                        {"data": "DESCRIPCIÓN"},
                        {"data": "PRODUCTOS EN LA LISTA"},
                        {"data": "ESTATUS"}
                    ],
                    language: lang,
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

                tblListas.find('tbody').on('click', 'tr', function () {
                    tblListas.find("tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = ListasDePrecios.row(this).data();
                    temp = parseInt(dtm.ID);
                });

                tblListas.find('tbody').on('dblclick', 'tr', function () {
                    nuevo = false;
                    tblListas.find("tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = ListasDePrecios.row(this).data();
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

        function getEstilos() {
            $.getJSON(master_url + 'getEstilos').done(function (data, x, jq) {
                $.each(data, function (k, v) {
                    pnlDatos.find("#Estilo")[0].selectize.addOption({text: v.Estilo, value: v.ID});
                });
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        }
    }));

    var removidos = [];
    var agregados = [];
    function onRemover(e) {
        var row = tblLista.row($(e).parents('tr')).data();
        removidos.push({
            ID: parseInt(row[0])
        });
        tblLista.row($(e).parents('tr')).remove().draw();
    }
</script>