<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Fichas Técnicas</legend>
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
                            <th>EstiloId</th>
                            <th>ColorId</th>
                            <th>Estilo</th>
                            <th>Color</th>
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
                    <legend class="float-left">Ficha Técnica</legend>
                </div>
                <div class="col-md-6 float-right">
                </div>
                <div class="col-md-3 float-right" align="right">
                    <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                </div>
            </div>
            <div class=" row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="Estilo">Estilo*</label>
                    <select class="form-control form-control-sm required " id="Estilo" name="Estilo" required>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <label for="Combinacion">Combinación*</label>
                    <select class="form-control form-control-sm required " id="Combinacion" name="Combinacion" required>
                    </select>
                </div>
            </div>
        </form>
        <!--AGREGAR DETALLE-->
        <div class="d-none" id="pnlControlesDetalle">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="Pieza">Pieza</label>
                    <select class="form-control form-control-sm" id="Pieza"  name="Pieza">
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="Familia">Grupo</label>
                    <select class="form-control form-control-sm " id="Familia"  name="Familia">
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="Material">Material</label>
                    <select class="form-control form-control-sm " id="Material"  name="Material">
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="TipoPiel">T. Piel</label>
                    <select class="form-control form-control-sm NotOpenDropDown" id="TipoPiel"  name="TipoPiel">
                        <option></option>
                        <option value="1RA">1RA</option>
                        <option value="2DA">2DA</option>
                        <option value="3RA">3RA</option>
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="Consumo">PzXPar</label>
                    <input type="text" id="PzXPar" name="PzXPar" class="form-control form-control-sm numbersOnly" maxlength="4">
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                    <label for="Consumo">Consumo</label>
                    <input type="text"  id="Consumo" name="Consumo" class="form-control form-control-sm numbersOnly" maxlength="7">
                </div>
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
                                <th>Pieza_ID</th>
                                <th>Pieza</th>
                                <th>Material_ID</th>

                                <th>Material</th>
                                <th>Unidad</th>
                                <th>Precio</th>

                                <th>Consumo</th>
                                <th>Piel</th>
                                <th>PzaXPar</th>

                                <th>Importe</th>
                                <th>ID</th>
                                <th>Eliminar</th>
                                <th>DeptoCat</th>
                                <th>DEP</th>
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
                                <th style="text-align:right">Total:</th>
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
    var master_url = base_url + 'index.php/FichaTecnica/';
    var pnlDatos = $("#pnlDatos");
    var pnlControlesDetalle = $('#pnlControlesDetalle');
    var pnlTablero = $("#pnlTablero");
    var pnlDetalle = $("#pnlDetalle");
    var btnNuevo = $("#btnNuevo");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var Estilo = pnlDatos.find("#Estilo");
    var Combinacion = pnlDatos.find("#Combinacion");
    var IdMovimiento = 0;
    var nuevo = true;
    $(document).ready(function () {
        pnlControlesDetalle.find("[name='Consumo']").keydown(function (e) {
            if (e.keyCode === 13) {
                if ($(this).val() !== '') {
                    isValid('pnlDatos');
                    if (valido) {
                        onAgregarFila();
                    }
                } else {
                    swal('ATENCIÓN', 'Debes capturar todos los campos', 'warning');
                }
            }
        });
        pnlDatos.find("[name='Estilo']").change(function () {
            if (nuevo) {
                pnlDatos.find("[name='Combinacion']")[0].selectize.clear(true);
                pnlDatos.find("[name='Combinacion']")[0].selectize.clearOptions();
                temp = $(this).val();
                getCombinacionesXEstilo($(this).val());
                getFotoXEstilo($(this).val());
            }
        });
        pnlDatos.find("[name='Combinacion']").change(function () {
            if (nuevo) {
                onComprobarExisteEstiloCombinacion(pnlDatos.find("[name='Estilo']").val(), $(this).val());
            }
        });
        pnlDatos.find("[name='Familia']").change(function () {
            pnlControlesDetalle.find("[name='Material']")[0].selectize.clear(true);
            pnlControlesDetalle.find("[name='Material']")[0].selectize.clearOptions();
            getMaterialesRequeridos($(this).val());
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
                        $.post(master_url + 'onEliminar', {ID: temp}).done(function (data, x, jq) {
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
            pnlDetalle.find("#tblRegistrosDetalle tbody").html('');
            Estilo[0].selectize.enable();
            Combinacion[0].selectize.enable();
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
        getPiezas();
        getFamilias();
        handleEnter();
    });
    function getMaterialesRequeridos(Familia) {
        if (Familia !== '' && Familia !== undefined && Familia !== null) {
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            $.getJSON(master_url + 'getMaterialesRequeridos', {Familia: Familia}).done(function (data, x, jq) {
                $.each(data, function (k, v) {
                    pnlControlesDetalle.find("#Material")[0].selectize.addOption({text: v.Material, value: v.ID});
                });
                pnlControlesDetalle.find("#Material")[0].selectize.focus();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        }
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

    function onAgregarFila() {
        var Pieza = pnlControlesDetalle.find("[name='Pieza']");
        var Material = pnlControlesDetalle.find("[name='Material']");
        var TipoPiel = pnlControlesDetalle.find("[name='TipoPiel']");
        var PzXPar = pnlControlesDetalle.find("[name='PzXPar']");
        var Consumo = pnlControlesDetalle.find("[name='Consumo']");
        var Estilo = pnlDatos.find("[name='Estilo']");
        var Color = pnlDatos.find("[name='Combinacion']");
        /*COMPROBAR SI YA SE AGREGÓ*/
        var registro_existe = false;
        /*VALIDAR QUE ESTEN TODOS LOS CAMPOS LLENOS PARA AGREGARLO*/
        if (Estilo.val() !== ""
                && Color.val() !== ""
                && Pieza.val() !== ""
                && Material.val() !== ""
                && Consumo.val() !== "") {
            console.log(pnlDetalle.find("#tblRegistrosDetalle tbody tr").length);
            if (pnlDetalle.find("#tblRegistrosDetalle tbody tr").length > 0) {
                RegistrosDetalle.rows().eq(0).each(function (index) {
                    var row = RegistrosDetalle.row(index);
                    var data = row.data();
                    if (parseFloat(data.Pieza_ID) === parseFloat(Pieza.val())) {
                        registro_existe = true;
                        return false;
                    }
                });
            }

            /*VALIDAR QUE EXISTA*/
            if (!registro_existe) {
                var frm = new FormData();
                frm.append('Estilo', Estilo.val());
                frm.append('Combinacion', Color.val());
                frm.append('Pieza', Pieza.val());
                frm.append('Material', Material.val());
                frm.append('TipoPiel', TipoPiel.val());
                frm.append('PzXPar', PzXPar.val());
                frm.append('Consumo', Consumo.val());
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
                        Color[0].selectize.disable();
                        pnlDetalle.removeClass('d-none');
                        nuevo = false;
                        Registros.ajax.reload();
                        getFichaTecnicaDetalleByID(Estilo.val(), Color.val());
                    } else {
                        RegistrosDetalle.ajax.reload();
                    }
                    limpiarCampos();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                swal({
                    title: 'INFO',
                    text: "YA HAS AGREGADO ESTA PIEZA",
                    icon: "warning",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                }).then((action) => {
                    if (action) {
                        limpiarCampos();
                    }
                });
            }
        } else {
            swal('INFO', 'DEBES COMPLETAR TODOS LOS CAMPOS', 'warning');
        }
    }

    function onComprobarExisteEstiloCombinacion(Estilo, Color) {
        $.getJSON(master_url + 'onComprobarExisteEstiloCombinacion', {Estilo: Estilo, Combinacion: Color}).done(function (data, x, jq) {
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
        pnlControlesDetalle.find("[name='Material']")[0].selectize.clear(true);
        pnlControlesDetalle.find("[name='Pieza']")[0].selectize.focus();
        pnlControlesDetalle.find("[name='Pieza']")[0].selectize.clear(true);
        pnlControlesDetalle.find("[name='Precio']").val('');
        pnlControlesDetalle.find("[name='Consumo']").val('');
        pnlControlesDetalle.find("[name='PzXPar']").val('');
        pnlControlesDetalle.find("[name='TipoPiel']")[0].selectize.clear(true);
        pnlControlesDetalle.find("[name='Familia']")[0].selectize.clear(true);
    }

    function getPiezas() {
        $.getJSON(master_url + 'getPiezas').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Pieza']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getFamilias() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.getJSON(master_url + 'getFamilias').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Familia']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getCombinacionesXEstilo(Estilo) {
        $.getJSON(master_url + 'getCombinacionesXEstilo', {Estilo: Estilo}).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
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

    var tblRegistrosDetalle = pnlDetalle.find('#tblRegistrosDetalle');
    var RegistrosDetalle;
    function getFichaTecnicaDetalleByID(Estilo, Combinacion) {
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblRegistrosDetalle')) {
            tblRegistrosDetalle.DataTable().destroy();
            RegistrosDetalle = tblRegistrosDetalle.DataTable({
                "ajax": {
                    "url": master_url + 'getFichaTecnicaDetalleByID',
                    "dataSrc": "",
                    "data": {
                        "Estilo": Estilo,
                        "Combinacion": Combinacion
                    }
                },
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [2],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [10],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [12],
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [13],
                        "visible": false,
                        "searchable": false
                    }
                ],
                "columns": [
                    {"data": "Pieza_ID"}, /*0*/
                    {"data": "Pieza"}, /*1*/
                    {"data": "Material_ID"}, /*2*/
                    {"data": "Material"}, /*3*/
                    {"data": "Unidad"}, /*4*/
                    {"data": "Precio"}, /*5*/
                    {"data": "Consumo"}, /*6*/
                    {"data": "TipoPiel"}, /*7*/
                    {"data": "PzXPar"}, /*8*/
                    {"data": "Importe"}, /*9*/
                    {"data": "ID"},
                    {"data": "Eliminar"},
                    {"data": "DeptoCat"}, /*12*/
                    {"data": "DEPTO"}/*13*/
                ],
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api();//Get access to Datatable API
                    // Update footer
                    var total = api.column(9).data().reduce(function (a, b) {
                        var ax = 0, bx = 0;
                        ax = $.isNumeric(a) ? parseFloat(a) : 0;
                        bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                        return  (ax + bx);
                    }, 0);
                    $(api.column(9).footer()).html(api.column(9, {page: 'current'}).data().reduce(function (a, b) {
                        return '$' + $.number(parseFloat(total), 2, '.', ',');
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
                "keys": true,
                order: [[13, 'asc']],
                rowGroup: {
                    endRender: function (rows, group) {
                        var stc = $.number(rows.data().pluck('Consumo').reduce(function (a, b) {
                            return a + parseFloat(b);
                        }, 0), 4, '.', ',');
                        var stt = $.number(rows.data().pluck('Importe').reduce(function (a, b) {
                            return a + getNumberFloat(b);
                        }, 0), 4, '.', ',');
                        return $('<tr>').append('<td colspan="4">' + group + '</td>').append('<td>' + stc + '</td><td colspan="2"></td><td>$' + stt + '</td><td></td></tr>');
                    },
                    dataSrc: "DeptoCat"
                },
                "createdRow": function (row, data, index) {
                    $.each($(row).find("td"), function (k, v) {
                        var c = $(v);
                        var index = parseInt(k);
                        switch (index) {
                            case 0:
                                /*PIEZA*/
                                c.addClass('Pieza');
                                break;
                            case 1:
                                /*MATERIAL*/
                                c.addClass('Material');
                                break;
                            case 2:
                                /*UNIDAD*/
                                c.addClass('Unidad bold-text');
                                break;
                            case 3:
                                /*PRECIO*/
                                c.addClass('Precio bold-text');
                                break;
                            case 4:
                                /*PARES*/
                                c.addClass('Consumo text-danger bold-text');
                                break;
                            case 5:
                                /*CONSUMO*/
                                c.addClass('Piel');
                                break;
                            case 6:
                                /*PZAXPAR*/
                                c.addClass('PzaXPar');
                                break;
                            case 7:
                                /*IMPORTE*/
                                c.addClass('Importe bold-text text-success');
                                break;
                            case 9:
                                /*ELIMINAR*/
                                c.addClass('Eliminar bold-text text-danger');
                                break;
                        }
                    });
                },
                "initComplete": function (x, y) {
                    HoldOn.close();
                }
            });

        }
        RegistrosDetalle.on('key', function (e, datatable, key, cell, originalEvent) {
            var cell_td = $(this).find("td.focus:not(.Pieza):not(.Material):not(.Unidad):not(.Editar)");
            if (key === 13) {
                if (cell_td.hasClass("Precio")) {
                    var txt = getNumberFloat(cell.data());
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="10" value="' + txt + '" autofocus>';
                    cell_td.html(g);
                    cell_td.find("#Editor").focus().select();
                } else if (cell_td.hasClass("Consumo")) {
                    var txt = (cell.data());
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="10" value="' + txt + '" autofocus>';
                    cell_td.html(g);
                    cell_td.find("#Editor").focus().select();
                } else if (cell_td.hasClass("PzaXPar")) {
                    var txt = (cell.data());
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="10" value="' + txt + '" autofocus>';
                    cell_td.html(g);
                    cell_td.find("#Editor").focus().select();
                }
            }
        }).on('key-blur', function (e, datatable, cell) {
            var t = $('#tblRegistrosDetalle > tbody');
            var a = t.find("#Editor");
            if (a.val() !== 'undefined' && a.val() !== undefined) {
                var b = RegistrosDetalle.cell(a.parent()).index();
                var d = a.parent();
                var row = RegistrosDetalle.row(a.parent().parent()).data();// SOLO OBTENDRA EL ID
                var params;
                if (d.hasClass('Precio')) {
                    var precio = getNumberFloat(a.val());
                    var precio_format = '$' + $.number(precio, 2, '.', ',');
                    d.html(precio_format);
                    //DRAW NEW DATA
                    RegistrosDetalle.cell($(d).parent(), 5).data(precio_format).draw();
                    var tr = RegistrosDetalle.row($(d).parent()).data();
                    var cantidad = parseFloat(tr.Consumo);
                    var importe_total = cantidad * precio;
                    //DRAW NEW DATA
                    RegistrosDetalle.cell($(d).parent(), 9).data('$' + $.number(importe_total, 3, '.', ',')).draw();
                    //SHORT POST
                    params = {ID: row.ID, CELDA: 'PRECIO', VALOR: precio};
                } else if (d.hasClass('Consumo')) {
                    d.html(a.val());
                    RegistrosDetalle.cell(d, b).data(a.val()).draw();

                    //DRAW NEW DATA
                    var tr = RegistrosDetalle.row($(d).parent()).data();
                    var precio = getNumberFloat(tr.Precio);
                    var cantidad = parseFloat(tr.Consumo);
                    var importe_total = cantidad * precio;
                    //DRAW NEW DATA
                    RegistrosDetalle.cell($(d).parent(), 9).data('$' + $.number(importe_total, 3, '.', ',')).draw();

                    //SHORT POST
                    params = {
                        ID: row.ID,
                        CELDA: 'CONSUMO',
                        VALOR: a.val()
                    };
                } else if (d.hasClass('PzaXPar')) {
                    d.html(a.val().toUpperCase());
                    //SHORT POST
                    params = {
                        ID: row.ID,
                        CELDA: 'PZAXPAR',
                        VALOR: a.val()
                    };
                    //DRAW NEW DATA
                    RegistrosDetalle.cell(d, b).data(a.val()).draw();
                }
                $.post(master_url + 'onEditarFichaTecnicaDetalle', params).done(function (data, x, jq) {
                    $.notify({
                        // options
                        message: 'LOS DATOS HAN SIDO ACTUALIZADOS'
                    }, {
                        // settings
                        type: 'success',
                        delay: 500,
                        animate: {
                            enter: 'animated flipInX',
                            exit: 'animated flipOutX'
                        },
                        placement: {
                            from: "top",
                            align: "right"
                        }
                    });
                }).fail(function (x, y, z) {
                    console.log('ERROR', x, y, z);
                }).always(function () {
                    console.log('DATOS ACTUALIZADOS');
                });

            }
        });

        tblRegistrosDetalle.find('tbody').on('click', 'tr', function () {
            tblRegistrosDetalle.find("tbody tr").removeClass("success");
            $(this).addClass("success");
        });

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
                    "dataType": "json",
                    "type": 'POST',
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "EstiloId"},
                    {"data": "ColorId"},
                    {"data": "Estilo"},
                    {"data": "Color"}
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
                "initComplete": function (x, y) {
                    HoldOn.close();
                }
            });
            $('#tblRegistros_filter input[type=search]').focus();
            var EstiloId, ColorId;
            tblRegistrosX.find('tbody').on('click', 'tr', function () {
                tblRegistrosX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Registros.row(this).data();
                EstiloId = parseInt(dtm.EstiloId);
                ColorId = parseInt(dtm.ColorId);
            });
            tblRegistrosX.find('tbody').on('dblclick', 'tr', function () {
                nuevo = false;
                tblRegistrosX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Registros.row(this).data();
                HoldOn.open({
                    theme: "sk-bounce",
                    message: "CARGANDO DATOS..."
                });
                $.getJSON(master_url + 'getFichaTecnicaByEstiloByCombinacion', {Estilo: EstiloId, Combinacion: ColorId}).done(function (data, x, jq) {
                    pnlDatos.find("input").val("");
                    $.each(pnlDatos.find("select"), function (k, v) {
                        pnlDatos.find("select")[k].selectize.clear(true);
                    });
                    Estilo[0].selectize.disable();
                    Combinacion[0].selectize.disable();

                    $.getJSON(master_url + 'getCombinacionesXEstilo', {Estilo: EstiloId}).done(function (data, x, jq) {
                        $.each(data, function (k, v) {
                            pnlDatos.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
                        });
                        pnlDatos.find("[name='Combinacion']")[0].selectize.setValue(ColorId);
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                    pnlControlesDetalle.find("[name='Pieza']")[0].selectize.focus();
                    pnlDatos.find("[name='Estilo']")[0].selectize.setValue(data[0].Estilo);
                    getFotoXEstilo(EstiloId);
                    getFichaTecnicaDetalleByID(EstiloId, ColorId);
                    pnlTablero.addClass("d-none");
                    pnlDetalle.removeClass('d-none');
                    pnlControlesDetalle.removeClass('d-none');
                    pnlDatos.removeClass('d-none');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                });

            });
        }
    }

    function getFotoXEstilo(Estilo) {
        $.getJSON(master_url + 'getEstiloByID', {Estilo: Estilo}).done(function (data, x, jq) {
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
    function onEliminarMaterialID(IDX) {
        swal({
            title: "¿Deseas eliminar el registro? ", text: "*El registro se eliminará de forma permanente*", icon: "warning", buttons: ["Cancelar", "Aceptar"]
        }).then((willDelete) => {
            if (willDelete) {
                $.post(master_url + 'onEliminarMaterialID', {ID: IDX}).done(function () {
                    $.notify({
                        // options
                        message: 'SE HA ELIMINADO EL REGISTRO'
                    }, {
                        // settings
                        type: 'success',
                        delay: 500,
                        animate: {
                            enter: 'animated flipInX',
                            exit: 'animated flipOutX'
                        },
                        placement: {
                            from: "top",
                            align: "right"
                        }
                    });
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    RegistrosDetalle.ajax.reload();
                });
            }
        });
    }
</script>
<style>
    .bold-text{
        font-weight: bold;
    }

    /*    .overlay{
            background-color: #000 !important;
        }
        .overlay a:hover, .overlay a:focus {
            background-color: transparent !important;
            color: #ffcc00 !important;
        }
        .bg-primary {
            background-color: #000000 !important;
        }*/
</style>