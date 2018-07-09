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
                    <table class="table table-sm table-hover" id="tblRegistrosDetalle">
                        <thead>
                            <tr>
                                <th class="text-info d-none">ID</th><!--0-->
                                <th class="text-info">Talla</th><!--1-->
                                <th>Suela</th><!--2-->
                                <th>Entresuela</th><!--3-->
                                <th>Planta</th><!--4-->
                                <th class="d-none">vSuela</th><!--5-->
                                <th class="d-none">vEntreSuela</th><!--6-->
                                <th class="d-none">vPlanta</th><!--7-->
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
                        onObtenerRangosByID(Estilo.val());
                        nuevo = false;
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
            Estilo[0].selectize.enable();
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
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
            estatus = false;
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
                    //OBTENER
                    onObtenerRangosByID(temp);
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                }
            });
        }
    }
    function onModificarRango(e) {
        $.post(master_url + 'onModificar', e).done(function (data, x, jq) {
            console.log('OK MODIFICADO', e, " *,* ", data);
            onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HAN GUARDADO LOS CAMBIOS', 'success');
        }).fail(function (x, y, z) {
            console.log(x.responsText);
        }).always(function () {

        });
    }
    function onObtenerRangosByID(IDX) {
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
                rows += '<select class="form-control form-control-sm" name="Suela" >';
                rows += '</select>';
                rows += '</td>';
                rows += '<td style="width: 30%">';
                rows += '<select class="form-control form-control-sm" name="Entresuela" >';
                rows += '</select>';
                rows += '</td>';
                rows += '<td style="width: 30%">';
                rows += '<select class="form-control form-control-sm" name="Planta" >';
                rows += '</select>';
                rows += '</td>';
                rows += '<td class="Suela d-none">' + v.Suela;
                rows += '</td>';
                rows += '<td class="EntreSuela d-none">' + v.Entresuela;
                rows += '</td>';
                rows += '<td class="Planta d-none">' + v.Plantilla;
                rows += '</td>';
                rows += '</tr>';
            });
            tblRegistrosDetalle.html(rows);
            tblRegistrosDetalle.find("select").selectize();
//pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
            var suelas = [], entresuelas = [], plantas = [];
            $.getJSON(master_url + 'getMaterialesByFamilia', {Familia: '3'}).done(function (s, x, jq) {
                $.each(s, function (k, v) {
                    suelas.push({text: v.Descripcion, value: v.ID});
                });
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                //console.log("SUELAS\n", suelas);
                $.getJSON(master_url + 'getMaterialesByFamilia', {Familia: '52'}).done(function (es, x, jq) {
                    $.each(es, function (k, v) {
                        entresuelas.push({text: v.Descripcion, value: v.ID});
                    });
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    //console.log("ENTRESUELAS\n", entresuelas);
                    $.getJSON(master_url + 'getMaterialesByFamilia', {Familia: '50'}).done(function (pl, x, jq) {
                        $.each(pl, function (k, v) {
                            plantas.push({text: v.Descripcion, value: v.ID});
                        });
                        //console.log('SUELAS: ', suelas)
                        $.each(tblRegistrosDetalle.find("tr"), function (k, r) {
                            //SUELAS(VALORES Y EVENTOS)
                            var row = $(r).find("td");
                            var suela = row.eq(2).find("select");
                            $.each(suelas, function (kk, vv) {
                                suela[0].selectize.addOption(vv);
                            });
                            suela.change(function () {
                                if (estatus) {
                                    var row = $(this).parents('tr').find('td');
                                    onModificarRango({ID: row.eq(0).text(), TIPO: 'SUELA', VALOR: $(this)[0].selectize.getValue()});
                                }
                            });
                            suela[0].selectize.setValue(row.eq(5).text());
                            //FIN SUELAS(VALORES Y EVENTOS)

                            //ENTRESUELAS(VALORES Y EVENTOS)
                            var entresuela = row.eq(3).find("select");
                            $.each(entresuelas, function (kk, vv) {
                                entresuela[0].selectize.addOption(vv);
                            });
                            entresuela.change(function () {
                                if (estatus) {
                                    var row = $(this).parents('tr').find('td');
                                    onModificarRango({ID: row.eq(0).text(), TIPO: 'ENTRESUELA', VALOR: $(this)[0].selectize.getValue()});
                                }
                            });
                            entresuela[0].selectize.setValue(row.eq(6).text());
                            //FIN ENTRESUELAS(VALORES Y EVENTOS)

                            //PLANTAS(VALORES Y EVENTOS)
                            var planta = row.eq(4).find("select");
                            $.each(plantas, function (kk, vv) {
                                planta[0].selectize.addOption(vv);
                            });
                            planta.change(function () {
                                if (estatus) {
                                    var row = $(this).parents('tr').find('td');
                                    onModificarRango({ID: row.eq(0).text(), TIPO: 'PLANTA', VALOR: $(this)[0].selectize.getValue()});
                                }
                            });
                            planta[0].selectize.setValue(row.eq(7).text());
                            //FIN PLANTAS(VALORES Y EVENTOS)
                        });
                        pnlDatos.find("#Estilo")[0].selectize.focus();
                        pnlTablero.addClass("d-none");
                        pnlDetalle.removeClass('d-none');
                        pnlControlesDetalle.removeClass('d-none');
                        pnlDatos.removeClass('d-none');
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                        estatus = true;
                    });
                });
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
        });
    }
</script>
