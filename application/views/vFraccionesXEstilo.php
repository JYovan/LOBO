<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Fracciones Por Estilo</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnEliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="Registros">
                <table id="tblRegistros" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Estilo</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--MODALES-->
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
                </div>
            </div>
            <div class=" row">
                <div class="col-sm-3">
                    <label for="Estilo">Estilo*</label>
                    <select class="form-control form-control-sm required " id="Estilo" name="Estilo" required>
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
                    <label for="Tiempo">Tiempo</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="5" name="Tiempo" >
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
                    <table id="tblRegistrosDetalle" class="table table-sm display " style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>FraccionID</th>
                                <th>Fraccion</th>
                                <th>Total</th>
                                <th>TiempoSF</th>
                                <th>Departamento</th>
                                <th>Precio</th>
                                <th>Tiempo</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th style="text-align:right">Totales:</th>
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
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var Estilo = pnlDatos.find("#Estilo");
    var tempDetalle = 0;
    var btnAgregarDetalle = $("#btnAgregarDetalle");
    var IdMovimiento = 0;
    var nuevo = true;

    $(document).ready(function () {
        btnAgregarDetalle.click(function () {
            isValid('pnlDatos');
            if (valido) {
                onAgregarFila();
            }
        });
        pnlControlesDetalle.find("[name='Tiempo']").blur(function () {
            if ($(this).val() !== '') {
                btnAgregarDetalle.trigger('click');
            }
        });
        pnlDatos.find("[name='Estilo']").change(function () {
            if (nuevo) {
                temp = $(this).val();
                onComprobarExisteEstilo($(this).val());
            }
        });
        pnlControlesDetalle.find("[name='Departamento']").change(function () {
            pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.clear(true);
            pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.clearOptions();
            getFraccionesXDepto($(this).val());
        });
        btnEliminar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
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
                            url: master_url + 'onEliminar',
                            type: "POST",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'REIGISTRO ELIMINADO', 'danger');
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
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find("input").val("");
            pnlControlesDetalle.find("input").val("");
            pnlControlesDetalle.removeClass('d-none');
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
            if ($.fn.DataTable.isDataTable('#tblRegistrosDetalle')) {
                RegistrosDetalle.clear().draw();
            }
            nuevo = true;
        });
        getRecords();
        getEstilos();
        getDepartamentos();
        handleEnter();
    });

    /*AGREGAR DETALLE NORMAL*/
    function onAgregarFila() {
        var Fraccion = pnlControlesDetalle.find("[name='Fraccion']");
        var Precio = pnlControlesDetalle.find("[name='Precio']");
        var Tiempo = pnlControlesDetalle.find("[name='Tiempo']");
        var Estilo = pnlDatos.find("[name='Estilo']");
        /*COMPROBAR SI YA SE AGREGÓ*/
        var fraccion_existe = false;
        /*VALIDAR QUE ESTEN TODOS LOS CAMPOS LLENOS PARA AGREGARLO*/
        if (Fraccion.val() !== "" && Precio.val() !== "" && Tiempo.val() !== "") {
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
                frm.append('Estilo', Estilo.val());
                frm.append('Fraccion', Fraccion.val());
                frm.append('Precio', Precio.val());
                frm.append('Tiempo', Tiempo.val());
                $.ajax({
                    url: master_url + 'onAgregar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    if (nuevo) {
                        Estilo[0].selectize.disable();
                        pnlDetalle.removeClass('d-none');
                        temp = Estilo.val();
                        nuevo = false;
                        getRecords();
                    }
                    getFraccionesEstiloXEstiloDetalle(temp);
                    limpiarCampos();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                swal({
                    title: 'INFO',
                    text: "YA HAS AGREGADO ESTA FRACCION",
                    icon: "warning",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                }).then((action) => {
                    if (action) {
                        pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.clear(true);
                        pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.clearOptions();
                        pnlControlesDetalle.find("[name='Departamento']")[0].selectize.clear(true);
                        pnlControlesDetalle.find("[name='Departamento']")[0].selectize.focus();

                    }
                });
            }
        } else {
            swal('INFO', 'DEBES COMPLETAR TODOS LOS CAMPOS', 'warning');
        }
    }

    function onComprobarExisteEstilo(Estilo) {
        $.getJSON(master_url + 'onComprobarExisteEstilo', {Estilo: Estilo}).done(function (data, x, jq) {
            if (parseInt(data[0].EXISTE) > 0) {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL ESTILO YA HA SIDO CAPTURADO', 'danger');
                pnlDatos.find("[name='Estilo']")[0].selectize.clear();
                pnlDatos.find("[name='Estilo']")[0].selectize.focus();
            } else {
                getFotoXEstilo(Estilo);
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

    function limpiarCampos() {
        pnlControlesDetalle.find("[name='Departamento']")[0].selectize.clear(true);
        pnlControlesDetalle.find("[name='Departamento']")[0].selectize.focus();
        pnlControlesDetalle.find("[name='Precio']").val('');
        pnlControlesDetalle.find("[name='Tiempo']").val('');
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
        });
    }

    function onModificarPrecioFraccionXEstilo(value, IDX) {
        $.ajax({
            url: master_url + 'onModificarDetalle',
            type: "POST",
            data: {
                ID: IDX,
                Precio: value === '' || value === null ? 0 : value
            }
        }).done(function (data, x, jq) {
            getFraccionesEstiloXEstiloDetalle(temp);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

    function onModificarTiempoFraccionXEstilo(value, IDX) {
        $.ajax({
            url: master_url + 'onModificarDetalle',
            type: "POST",
            data: {
                ID: IDX,
                Tiempo: value === '' || value === null ? 0 : value
            }
        }).done(function (data, x, jq) {
            getFraccionesEstiloXEstiloDetalle(temp);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }

    function onEliminarRenglonDetalle(IDX) {
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
                    url: master_url + 'onEliminarRenglonDetalle',
                    type: "POST",
                    data: {
                        ID: IDX
                    }
                }).done(function (data, x, jq) {
                    getFraccionesEstiloXEstiloDetalle(temp);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
    }

    var tblRegistrosDetalle = $('#tblRegistrosDetalle');
    var RegistrosDetalle;
    function getFraccionesEstiloXEstiloDetalle(IDX) {
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblRegistrosDetalle')) {
            tblRegistrosDetalle.DataTable().destroy();
            RegistrosDetalle = tblRegistrosDetalle.DataTable({
                "ajax": {
                    "url": master_url + 'getFraccionesEstiloXEstiloDetalle',
                    "dataSrc": "",
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
                        "targets": [3],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [4],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [5],
                        "visible": false,
                        "searchable": false
                    }
                ],
                "columns": [
                    {"data": "ID"},
                    {"data": "FraccionID"},
                    {"data": "Fraccion"},
                    {"data": "Total"},
                    {"data": "TiempoSF"},
                    {"data": "Departamento"},
                    {"data": "Precio"},
                    {"data": "Tiempo"},
                    {"data": "Eliminar"}
                ],
                rowGroup: {
                    dataSrc: 'Departamento'
                },
                "aaSorting": [
                    [5, 'asc'], [2, 'asc']/*ID*/
                ],
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api();
                    $(api.column(6).footer()).html(api.column(3, {page: 'current'}).data().reduce(function (a, b) {
                        return (a) + (b);
                    }, 0));
                    $(api.column(7).footer()).html(api.column(4, {page: 'current'}).data().reduce(function (a, b) {
                        return (a) + (b);
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
                "scrollCollapse": true,
                "bSort": true,
                initComplete: function (x, y) {
                    HoldOn.close();
                }

            });

            tblRegistrosDetalle.find('tbody').on('click', 'tr', function () {
                tblRegistrosDetalle.find("tbody tr").removeClass("success");
                $(this).addClass("success");
            });
        }

    }


    var tblRegistrosX = $("#tblRegistros"), Registros;

    function getRecords() {
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        if ($.fn.DataTable.isDataTable('#tblRegistros')) {
            tblRegistrosX.DataTable().destroy();
            Registros = tblRegistrosX.DataTable({
                "dom": 'Bfrtip',
                buttons: buttons,
                "ajax": {
                    "url": master_url + 'getRecords',
                    "dataType": "jsonp",
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "ID"},
                    {"data": "Estilo"}
                ],
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }],
                language: lang,
                "autoWidth": true,
                "colReorder": true,
                "displayLength": 20,
                "bLengthChange": false,
                "deferRender": true,
                "scrollCollapse": false,
                keys: true,
                "bSort": true,
                "aaSorting": [
                    [0, 'desc']/*ID*/
                ]
            });

            $('#tblRegistros_filter input[type=search]').focus();

            tblRegistrosX.find('tbody').on('click', 'tr', function () {
                tblRegistrosX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Registros.row(this).data();
                temp = parseInt(dtm.ID);
            });

            tblRegistrosX.find('tbody').on('dblclick', 'tr', function () {
                nuevo = false;
                tblRegistrosX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Registros.row(this).data();
                temp = parseInt(dtm.ID);
                pnlDatos.removeClass("d-none");
                pnlTablero.addClass("d-none");
                if (temp !== 0 && temp !== undefined && temp > 0) {
                    nuevo = false;
                    HoldOn.open({
                        theme: "sk-bounce",
                        message: "CARGANDO DATOS..."
                    });
                    $.ajax({
                        url: master_url + 'getFraccionEstiloByIDEstilo',
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
                        pnlDatos.find("[name='Estilo']")[0].selectize.setValue(data[0].Estilo);
                        getFotoXEstilo(data[0].Estilo);
                        getFraccionesEstiloXEstiloDetalle(temp);
                        pnlTablero.addClass("d-none");
                        pnlDetalle.removeClass('d-none');
                        pnlControlesDetalle.removeClass('d-none');
                        pnlDatos.removeClass('d-none');
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                }
            });
        }
        HoldOn.close();
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
