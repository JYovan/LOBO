<div class="card-body" id="pnlTablero">
    <div class="row">
        <div class="col-sm-6 float-left">
            <legend class="float-left">Rangos</legend>
        </div>
        <div class="col-sm-6 float-right" align="right">
            <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
            <button type="button" class="btn btn-primary" id="btnEliminar"><span class="fa fa-trash"></span><br></button>
        </div>
    </div>
    <div class="row">
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
<!--GUARDAR-->
<div class="card border-0  d-none" id="pnlDatos">
    <div class="card-body text-dark">
        <div class="row">
            <div class="col-md-3 float-left">
                <legend class="float-left">Rangos por Estilo</legend>
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
            <div class="col-sm-3">
                <br>
                <button  class="btn btn-primary btn-sm" id="btnAgregarDetalle" data-toggle="tooltip" data-placement="top" title="Agregar" >
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>

        <div id="pnlControlesDetalle">

            <div class="row mt-4 pb-5">
                <div class="table-responsive col-12" style="overflow: auto; height: 500px;">
                    <table class="table table-sm" id="tblRegistrosDetalle">
                        <thead>
                            <tr>
                                <th class="text-info">Talla</th>
                                <th>Suela</th>
                                <th>Entresuela</th>
                                <th>Planta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 10%; font-weight: bold; " >22</td>
                                <td style="width: 30%">
                                    <select class="form-control form-control-sm" name="Suela" required>
                                        <option value=""></option>
                                    </select>
                                </td>
                                <td style="width: 30%">
                                    <select class="form-control form-control-sm" name="Entresuela" required>
                                        <option value=""></option>
                                    </select>
                                </td>
                                <td style="width: 30%">
                                    <select class="form-control form-control-sm" name="Planta" required>
                                        <option value=""></option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Rangos/';
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
    var tblRegistrosX = $("#tblRegistros"), Registros;

    $(document).ready(function () {
        btnAgregarDetalle.click(function () {
            var Estilo = pnlDatos.find("[name='Estilo']");
            /*VALIDAR QUE EXISTA*/
            if (nuevo) {
                HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
                $.ajax({
                    url: master_url + 'getEncabezadoSerieXEstilo',
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        Estilo: Estilo.val()
                    }
                }).done(function (data, x, jq) {
                    var frm = new FormData();
                    frm.append('Estilo', Estilo.val());

                    $.when(
                            $.each(data[0], function (k, v) {
                                if (parseInt(v) > 0) {
                                    frm.append('Talla', v);
                                    $.ajax({
                                        url: master_url + 'onAgregar',
                                        type: "POST",
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        data: frm
                                    }).done(function (data, x, jq) {
                                    }).fail(function (x, y, z) {
                                        console.log(x, y, z);
                                    });
                                }
                            })
                            ).then(function () {
                        HoldOn.close();
                        Estilo[0].selectize.disable();
                        temp = Estilo.val();
                        nuevo = false;
                    });
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                    HoldOn.close();
                });

            } else {
                swal('ATENCIÓN', 'YA HAS AGREGADO LAS TALLAS DE ESTE ESTILO', 'warning');
            }
        });
        pnlDatos.find("[name='Estilo']").change(function () {
            if (nuevo) {
                temp = $(this).val();
                onComprobarExisteEstilo($(this).val());
            }
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
        getPlantas();
        getSuelas();
        getEntresuelas();
        handleEnter();
    });

    function onComprobarExisteEstilo(Estilo) {
        $.getJSON(master_url + 'onComprobarExisteEstilo', {Estilo: Estilo}).done(function (data, x, jq) {
            if (parseInt(data[0].EXISTE) > 0) {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL ESTILO YA HA SIDO CAPTURADO', 'danger');
                pnlDatos.find("[name='Estilo']")[0].selectize.clear();
                pnlDatos.find("[name='Estilo']")[0].selectize.focus();
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getEstilos() {
        $.getJSON(master_url + 'getEstilos').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Estilo']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getSuelas() {
        $.getJSON(master_url + 'getMaterialesByFamilia', {Familia: '3'}).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlControlesDetalle.find("[name='Suela']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getEntresuelas() {
        $.getJSON(master_url + 'getMaterialesByFamilia', {Familia: '52'}).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlControlesDetalle.find("[name='Entresuela']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getPlantas() {
        $.getJSON(master_url + 'getMaterialesByFamilia', {Familia: '50'}).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlControlesDetalle.find("[name='Planta']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getRecords() {
        HoldOn.open({theme: 'sk-cube', message: 'CARGANDO...'});
        if ($.fn.DataTable.isDataTable('#tblRegistros')) {
            tblRegistrosX.DataTable().destroy();
            Registros = tblRegistrosX.DataTable({
                "dom": 'Bfrtip',
                buttons: buttons,
                "ajax": {
                    "url": master_url + 'getRecords',
                    "dataType": "json",
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
                ],
                initComplete: function (x, y) {
                    HoldOn.close();
                }
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

                        $.each(data[0], function (k, v) {
                            pnlDatos.find("[name='" + k + "']").val(v);
                            if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                            }
                        });
                        pnlControlesDetalle.find("[name='Departamento']")[0].selectize.focus();
                        getFotoXEstilo(temp);
                        getFraccionesEstiloXEstiloDetalle(temp);
                        pnlTablero.addClass("d-none");
                        pnlDetalle.removeClass('d-none');
                        pnlControlesDetalle.removeClass('d-none');
                        pnlDatos.removeClass('d-none');
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                        HoldOn.close();
                    });
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                }
            });
        }

    }

</script>
