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
            <div class="col-sm-3 d-none" id="cTipo">
                <label for="Tipo">Tipo*</label>
                <select class="form-control form-control-sm " id="Tipo" name="Tipo">
                    <option></option>
                    <option value="1">1 SUELA</option>
                    <option value="2">2 ENTRESUELA</option>
                    <option value="3">3 PLANTA</option>
                </select>
            </div>
        </div>
        <div id="pnlControlesDetalle">
            <div class="row mt-4 pb-5">
                <div class="table-responsive col-12" style="overflow: auto; height: 500px;">
                    <table class="table table-sm table-hover" id="tblRegistrosDetalle">
                        <thead>
                            <tr>
                                <th class="text-info d-none">ID</th><!--0-->
                                <th class="text-info">Talla</th><!--1-->
                                <th>Material</th><!--2-->
<!--                                <th>Entresuela</th>3
                                <th>Planta</th>4-->
                                <th class="d-none">vSuela</th><!--3-->
                                <th class="d-none">vEntreSuela</th><!--4-->
                                <th class="d-none">vPlanta</th><!--5-->
                            </tr>
                        </thead>
                        <tbody></tbody>
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
    var nuevo = true, estatus = false;
    var tblRegistrosX = $("#tblRegistros"), Registros;
    var tblRegistrosDetalle = pnlControlesDetalle.find("#tblRegistrosDetalle tbody");

    $(document).ready(function () {
        // Instance the tour
        var tour = new Tour({
            name: "tour",
            steps: [
                {
                    smartPlacement: true,
                    backdropContainer: 'body',
                    backdropPadding: 5,
                    placement: "auto",
                    element: "#Estilo",
                    title: "Estilo",
                    content: "Esta lista desplegable se escoge el estilo"
                },
                {
                    smartPlacement: true,
                    backdropContainer: 'body',
                    backdropPadding: 5,
                    placement: "auto",
                    element: "#btnDeshacer",
                    title: "Deshacer",
                    content: "Con este boton reviertes los controles generados."
                },
                {
                    smartPlacement: true,
                    backdropContainer: 'body',
                    backdropPadding: 5,
                    placement: "auto",
                    element: "#btnReload",
                    title: "Refrescar",
                    content: "Permite actualizar los registros sin necesidad de actualizar completamente la página, con un performance excepcional."
                },
                {
                    smartPlacement: true,
                    backdropContainer: 'body',
                    backdropPadding: 5,
                    placement: "auto",
                    element: "#btnHistorialDeControles",
                    title: "Historial",
                    content: "Muestra el historial de controles revertidos con información detallada."
                }
            ],
            container: "body",
            smartPlacement: true,
            keyboard: true,
            storage: window.localStorage,
            debug: false,
            backdrop: true,
            backdropContainer: 'body',
            backdropPadding: 0,
            redirect: true,
            orphan: false,
            duration: false,
            delay: false,
            basePath: "",
            afterGetState: function (key, value) {},
            afterSetState: function (key, value) {},
            afterRemoveState: function (key, value) {},
            onStart: function (tour) {},
            onEnd: function (tour) {
                swal({
                    title: "Recorrido finalizado",
                    text: "En este momento ya es posible conocer a detalle que hace este módulo dentro del sistema.",
                    icon: "success",
                    buttons: {
                        resumetour: {
                            text: "Reiniciar recorrido",
                            value: "resumetour"
                        },
                        endtour: {
                            text: "Finalizar",
                            value: "endtour"
                        }
                    }
                }).then((value) => {
                    switch (value) {
                        case "resumetour":
                            tour.init();
                            tour.restart();
                            break;
                        case "endtour":
                            swal.close();
                            break;
                    }
                });
            },
            onShow: function (tour) {},
            onShown: function (tour) {},
            onHide: function (tour) {},
            onHidden: function (tour) {},
            onNext: function (tour) {},
            onPrev: function (tour) {},
            onPause: function (tour, duration) {},
            onResume: function (tour, duration) {
                console.log('RESUMIDO');
            },
            onRedirectError: function (tour) {}
        });
// Initialize the tour
        tour.init();
// Start the tour
        tour.start();
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
                        pnlDatos.find("#cTipo").removeClass('d-none');
                        temp = Estilo.val();
                        nuevo = false;
                        estatus = true;
                    });
                    swal('INFO', 'SE HAN AÑADIDO UN NUEVO REGISTRO', 'success');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                    HoldOn.close();
                }).always(function () {
                    Registros.ajax.reload();
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
        pnlDatos.find("[name='Tipo']").change(function () {
            HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
            switch ($(this).val()) {
                case '1':
                    onObtenerRangosSuelasByID(temp);
                    break;
                case '2':
                    onObtenerRangosEntresuelaByID(temp);
                    break;
                case '3':
                    onObtenerRangosPlantasByID(temp);
                    break;
                default:
                    break;
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
                            Registros.ajax.reload();
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
            pnlDatos.find("#cTipo").addClass('d-none');
            Estilo[0].selectize.enable();
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            tblRegistrosDetalle.html('');
            $(':input:text:enabled:visible:first').focus();
            tblRegistrosDetalle.html('');
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
                tblRegistrosDetalle.html('');
                tblRegistrosX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Registros.row(this).data();
                temp = parseInt(dtm.ID);
                pnlDatos.removeClass("d-none");
                pnlTablero.addClass("d-none");
                pnlDatos.find("#cTipo").removeClass('d-none');
                $.each(pnlDatos.find("select"), function (k, v) {
                    pnlDatos.find("select")[k].selectize.clear(true);
                });
                //Obtener encabezado
                $.getJSON(master_url + 'getRecordsByID', {ID: temp}).done(function (data, x, jq) {
                    var dtm = data[0];
                    pnlDatos.find("input").val("");
                    Estilo[0].selectize.setValue(dtm.Estilo);
                    Estilo[0].selectize.disable();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                });

            });
        }
    }
    function onModificarRango(e) {
        $.post(master_url + 'onModificar', e).done(function (data, x, jq) {
        }).fail(function (x, y, z) {
            swal('ERROR', 'NO SE MODIFICÓ EL RANGO', 'error');
        }).always(function () {
        });
    }
    function onObtenerRangosPlantasByID(IDX) {
        $.getJSON(master_url + 'getRecordsByID', {ID: IDX}).done(function (data, x, jq) {
            var dtm = data[0];
            pnlDatos.find("input").val("");
            Estilo[0].selectize.setValue(dtm.Estilo);
            Estilo[0].selectize.disable();
            //ASIGNAR
            var rows = '';
            $.each(data.slice(0, data.length), function (k, v) {
                rows += '<tr>';
                rows += '<td class="d-none" style="width: 10%;">' + v.ID + '</td>';
                rows += '<td class="text-info " style="width: 10%;">' + v.Talla + '</td>';
                rows += '<td style="width: 30%">';
                rows += '<select class="form-control form-control-sm " name="Planta" >';
                rows += '</select>';
                rows += '</td>';
                rows += '<td class="Suela d-none">';
                rows += '</td>';
                rows += '<td class="EntreSuela d-none">';
                rows += '</td>';
                rows += '<td class="Planta d-none">' + v.Plantilla;
                rows += '</td>';
                rows += '</tr>';
            });
            tblRegistrosDetalle.html(rows);
            tblRegistrosDetalle.find("select").selectize({
                hideSelected: true,
                openOnFocus: false
            });
            var plantas = [];
            $.getJSON(master_url + 'getMaterialesByFamilia', {Familia: '50'}).done(function (s, x, jq) {
                $.each(s, function (k, v) {
                    plantas.push({text: v.Descripcion, value: v.ID});
                });
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                //console.log("ENTRESUELAS\n", suelas);
                $.each(tblRegistrosDetalle.find("tr"), function (k, r) {
                    //ENTRESUELAS(VALORES Y EVENTOS)
                    var row = $(r).find("td");
                    var planta = row.eq(2).find("select");
                    $.each(plantas, function (kk, vv) {
                        planta[0].selectize.addOption(vv);
                    });
                    planta.change(function () {
                        var row = $(this).parents('tr').find('td');
                        onModificarRango({ID: row.eq(0).text(), TIPO: 'PLANTA', VALOR: $(this)[0].selectize.getValue()});

                    });
                    planta[0].selectize.setValue(row.eq(5).text());
                    //FIN SUELAS(VALORES Y EVENTOS)
                });
            });
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function onObtenerRangosEntresuelaByID(IDX) {
        $.getJSON(master_url + 'getRecordsByID', {ID: IDX}).done(function (data, x, jq) {
            var dtm = data[0];
            pnlDatos.find("input").val("");
            Estilo[0].selectize.setValue(dtm.Estilo);
            Estilo[0].selectize.disable();
            //ASIGNAR
            var rows = '';
            $.each(data.slice(0, data.length), function (k, v) {
                rows += '<tr>';
                rows += '<td class="d-none" style="width: 10%;">' + v.ID + '</td>';
                rows += '<td class="text-info " style="width: 10%;">' + v.Talla + '</td>';
                rows += '<td style="width: 30%">';
                rows += '<select class="form-control form-control-sm " name="Entresuela" >';
                rows += '</select>';
                rows += '</td>';
                rows += '<td class="Suela d-none">';
                rows += '</td>';
                rows += '<td class="EntreSuela d-none">' + v.Entresuela;
                rows += '</td>';
                rows += '<td class="Planta d-none">';
                rows += '</td>';
                rows += '</tr>';
            });
            tblRegistrosDetalle.html(rows);
            tblRegistrosDetalle.find("select").selectize({
                hideSelected: true,
                openOnFocus: false
            });
            var entresuelas = [];
            $.getJSON(master_url + 'getMaterialesByFamilia', {Familia: '52'}).done(function (s, x, jq) {
                $.each(s, function (k, v) {
                    entresuelas.push({text: v.Descripcion, value: v.ID});
                });
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                //console.log("ENTRESUELAS\n", suelas);
                $.each(tblRegistrosDetalle.find("tr"), function (k, r) {
                    //ENTRESUELAS(VALORES Y EVENTOS)
                    var row = $(r).find("td");
                    var entresuela = row.eq(2).find("select");
                    $.each(entresuelas, function (kk, vv) {
                        entresuela[0].selectize.addOption(vv);
                    });
                    entresuela.change(function () {

                        var row = $(this).parents('tr').find('td');
                        onModificarRango({ID: row.eq(0).text(), TIPO: 'ENTRESUELA', VALOR: $(this)[0].selectize.getValue()});

                    });
                    entresuela[0].selectize.setValue(row.eq(4).text());
                    //FIN SUELAS(VALORES Y EVENTOS)
                });
            });
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
    function onObtenerRangosSuelasByID(IDX) {
        $.getJSON(master_url + 'getRecordsByID', {ID: IDX}).done(function (data, x, jq) {
            pnlDatos.find("input").val("");
            //ASIGNAR
            var rows = '';
            $.each(data.slice(0, data.length), function (k, v) {
                rows += '<tr>';
                rows += '<td class="d-none" style="width: 10%;">' + v.ID + '</td>';
                rows += '<td class="text-info " style="width: 10%;">' + v.Talla + '</td>';
                rows += '<td style="width: 30%">';
                rows += '<select class="form-control form-control-sm " name="Suela" >';
                rows += '</select>';
                rows += '</td>';
                rows += '<td class="Suela d-none">' + v.Suela;
                rows += '</td>';
                rows += '<td class="EntreSuela d-none">';
                rows += '</td>';
                rows += '<td class="Planta d-none">';
                rows += '</td>';
                rows += '</tr>';
            });
            tblRegistrosDetalle.html(rows);
            tblRegistrosDetalle.find("select").selectize({
                hideSelected: true,
                openOnFocus: false
            });
            var suelas = [];
            $.getJSON(master_url + 'getMaterialesByFamilia', {Familia: '3'}).done(function (s, x, jq) {
                $.each(s, function (k, v) {
                    suelas.push({text: v.Descripcion, value: v.ID});
                });
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                //console.log("SUELAS\n", suelas);
                $.each(tblRegistrosDetalle.find("tr"), function (k, r) {
                    //SUELAS(VALORES Y EVENTOS)
                    var row = $(r).find("td");
                    var suela = row.eq(2).find("select");
                    $.each(suelas, function (kk, vv) {
                        suela[0].selectize.addOption(vv);
                    });
                    suela.change(function () {
                        var row = $(this).parents('tr').find('td');
                        onModificarRango({ID: row.eq(0).text(), TIPO: 'SUELA', VALOR: $(this)[0].selectize.getValue()});

                    });
                    suela[0].selectize.setValue(row.eq(3).text());
                    //FIN SUELAS(VALORES Y EVENTOS)
                });
            });
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
</script>
