<div class="card-body" id="pnlTablero">
    <div class="row">
        <div class="col-sm-6 float-left">
            <legend class="float-left">Fracciones Por Estilo</legend>
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
                <div class="col-sm-3">
                    <label for="Fecha">Fecha*</label>
                    <input type="text" class="form-control form-control-sm notEnter date" id="Fecha" name="Fecha" required>
                </div>
                <div class="col-sm-2">
                    <label for="TiempoEstandarE">Tiempo Estandar (Min)*</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="5" name="TiempoEstandarE" required>
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
                    <label for="Fraccion">Fracción</label>
                    <select class="form-control form-control-sm required" id="Fraccion" name="Fraccion">
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="Puesto">Puesto</label>
                    <select class="form-control form-control-sm required" id="Puesto" name="Puesto">
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="Maquinaria">Maquinaria</label>
                    <select class="form-control form-control-sm required" id="Maquinaria" name="Maquinaria">
                    </select>
                </div>
            </div>
            <div class=" row">
                <div class="col-sm-2">
                    <label for="TiempoEstandarD">T. Estandar (Min X Fracción)*</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" required="" maxlength="5" name="TiempoEstandarD" >
                </div>
                <div class="col-sm-2">
                    <label for="Eficiencia">Eficiencia %</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" required="" maxlength="9" name="Eficiencia" >
                </div>

                <div class="col-sm-2">
                    <label for="SueldoBase">Sueldo Base</label>
                    <input type="text" class="form-control form-control-sm numbersOnly" required="" maxlength="9" name="SueldoBase" >
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
<div class="card-body d-none" id="pnlDetalle">
    <div class="row">
        <div class="col-9">
            <div class="table-responsive row" id="RegistrosDetalle">
                <table id="tblRegistrosDetalle" class="table table-sm display " style="width: 100% !important">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FraccionID</th>
                            <th>Departamento</th>
                            <th>Fracción</th>
                            <th>Maquina</th>
                            <th>Puesto</th>
                            <th>T. Estandar</th>
                            <th>Efic. %</th>
                            <th>T. Real</th>
                            <th>Costo M.O.</th>
                            <th>Costo VTAS</th>
                            <th>Sueldo Base</th>
                            <th>Eliminar</th>
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
                            <th style="text-align:right">Totales:</th>
                            <th>0.0</th>
                            <th></th>
                            <th></th>
                            <th>0.0</th>
                            <th>0.0</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-3">
            <label for="">Foto del Artículo</label>
            <div id="VistaPrevia" >
                <img src="<?php echo base_url(); ?>img/camera.png" class="img-thumbnail img-fluid"/>
            </div>
        </div>
    </div>
</div>
<!--FIN DETALLE-->

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
    var tblRegistrosDetalle = $('#tblRegistrosDetalle'), RegistrosDetalle;
    var tblRegistrosX = $("#tblRegistros"), Registros;

    $(document).ready(function () {
        tblRegistrosDetalle.on('draw.dt', function () {
            $.each(tblRegistrosDetalle.find('tbody tr'), function () {
                var TiempoEstandarE = pnlDatos.find("[name='TiempoEstandarE']");
                //EDITAR TIEMPO ESTANDAR
                $(this).find("td:eq(3)").on('dblclick', function () {
                    var input = '<input id="dbEditor" type="text" class="form-control form-control-sm">';
                    var exist = $(this).find("#dbEditor").val();
                    if (exist === undefined) {
                        var celda = $(this);
                        var padre = celda.parent();
                        var vActual = celda.text();
                        celda.html(input);
                        celda.find('#dbEditor').val(vActual);
                        celda.find("#dbEditor").focus();
                        celda.find("#dbEditor").focusout(function () {
                            var v = parseFloat($(this).val());
                            celda.html(v);
                            RegistrosDetalle.cell(padre, 6).data(parseFloat(v)).draw();
                            var row = RegistrosDetalle.row(padre).data();
                            /*Calculos*/
                            var TiempoReal = v / (getNumberFloat(row.Eficiencia) / 100);
                            var CostoFMO = (getNumberFloat(row.SueldoBase) / (TiempoEstandarE.val() * 5)) * v;
                            var CostoFV = (getNumberFloat(row.SueldoBase) / (TiempoEstandarE.val() * 5)) * TiempoReal;
                            var params = {
                                ID: row.ID,
                                TiempoEstandarD: v,
                                TiempoReal: parseFloat(TiempoReal.toFixed(2)),
                                CostoFraccionManoObra: parseFloat(CostoFMO.toFixed(2)),
                                CostoFraccionVentas: parseFloat(CostoFV.toFixed(2))
                            };
                            if (v > 0) {
                                onEditarFraccionesEstiloDetalle(params);
                            }
                        });
                    }
                });
                //EDITAR EFICIENCIA
                $(this).find("td:eq(4)").on('dblclick', function () {
                    var input = '<input id="dbEditor" type="text" class="form-control form-control-sm">';
                    var exist = $(this).find("#dbEditor").val();
                    if (exist === undefined) {
                        var celda = $(this);
                        var padre = celda.parent();
                        var vActual = celda.text();
                        celda.html(input);
                        celda.find('#dbEditor').val(vActual);
                        celda.find("#dbEditor").focus();
                        celda.find("#dbEditor").focusout(function () {
                            var v = getNumberFloat($(this).val());
                            var efic_format = v + '%';
                            celda.html(efic_format);
                            RegistrosDetalle.cell(padre, 7).data(efic_format).draw();
                            var row = RegistrosDetalle.row(padre).data();
                            /*Calculos*/
                            var TiempoReal = (row.TiempoEstandar / (v / 100));
                            var CostoFMO = (getNumberFloat(row.SueldoBase) / (TiempoEstandarE.val() * 5)) * (row.TiempoEstandar);
                            var CostoFV = (getNumberFloat(row.SueldoBase) / (TiempoEstandarE.val() * 5)) * TiempoReal;
                            var params = {
                                ID: row.ID,
                                Eficiencia: v,
                                TiempoReal: parseFloat(TiempoReal.toFixed(2)),
                                CostoFraccionManoObra: parseFloat(CostoFMO.toFixed(2)),
                                CostoFraccionVentas: parseFloat(CostoFV.toFixed(2))
                            };
                            if (v > 0) {
                                onEditarFraccionesEstiloDetalle(params);
                            }
                        });
                    }
                });
                //EDITAR SUELDO BASE

                $(this).find("td:eq(8)").on('dblclick', function () {
                    var input = '<input id="dbEditor" type="text" class="form-control form-control-sm">';
                    var exist = $(this).find("#dbEditor").val();
                    if (exist === undefined) {
                        var celda = $(this);
                        var vActual = celda.text();
                        celda.html(input);
                        celda.find('#dbEditor').val(vActual);
                        var padre = celda.parent();
                        celda.find("#dbEditor").focus();
                        celda.find("#dbEditor").focusout(function () {
                            var v = getNumberFloat($(this).val());
                            var sueldo_format = '$' + $.number(v, 2, '.', ',');
                            celda.html(sueldo_format);
                            RegistrosDetalle.cell(padre, 11).data(sueldo_format).draw();
                            var row = RegistrosDetalle.row(padre).data();
                            /*Calculos*/
                            var TiempoReal = (row.TiempoEstandar / (getNumberFloat(row.Eficiencia) / 100));
                            var CostoFMO = (v / (TiempoEstandarE.val() * 5)) * (row.TiempoEstandar);
                            var CostoFV = (v / (TiempoEstandarE.val() * 5)) * TiempoReal;
                            var params = {
                                ID: row.ID,
                                SueldoBase: v,
                                TiempoReal: parseFloat(TiempoReal.toFixed(2)),
                                CostoFraccionManoObra: parseFloat(CostoFMO.toFixed(2)),
                                CostoFraccionVentas: parseFloat(CostoFV.toFixed(2))
                            };
                            if (v > 0) {
                                onEditarFraccionesEstiloDetalle(params);
                            }
                        });
                    }
                });
            });
        });
        btnAgregarDetalle.click(function () {
            isValid('pnlDatos');
            if (valido) {
                onAgregarFila();
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
        getPuestos();
        getMaquinaria();
        handleEnter();
    });
    function onEditarFraccionesEstiloDetalle(params) {
        $.post(master_url + 'onEditarFraccionesEstiloDetalle', params).done(function (data, x, jq) {
            RegistrosDetalle.ajax.reload();
        }).fail(function (x, y, z) {
            console.log('ERROR', x, y, z);
        });
    }
    function onAgregarFila() {
        var Estilo = pnlDatos.find("[name='Estilo']");
        var TiempoEstandarE = pnlDatos.find("[name='TiempoEstandarE']");
        var Fecha = pnlDatos.find("[name='Fecha']");
        var Fraccion = pnlControlesDetalle.find("[name='Fraccion']");
        var Puesto = pnlDatos.find("[name='Puesto']");
        var Maquinaria = pnlDatos.find("[name='Maquinaria']");
        var TiempoEstandarD = pnlControlesDetalle.find("[name='TiempoEstandarD']");
        var Eficiencia = pnlControlesDetalle.find("[name='Eficiencia']");
        var SueldoBase = pnlControlesDetalle.find("[name='SueldoBase']");

        /*COMPROBAR SI YA SE AGREGÓ*/
        var fraccion_existe = false;
        if (pnlDetalle.find("#tblRegistrosDetalle tbody tr").length > 0) {
            if (!nuevo) {
                RegistrosDetalle.rows().eq(0).each(function (index) {
                    var row = RegistrosDetalle.row(index);
                    var data = row.data();
                    if (data.FraccionID === parseInt(Fraccion.val())) {
                        fraccion_existe = true;
                        return false;
                    }
                });
            }

        }
        /*VALIDAR QUE EXISTA*/
        if (!fraccion_existe) {
            var frm = new FormData();

            frm.append('Estilo', Estilo.val());
            frm.append('TiempoEstandarE', TiempoEstandarE.val());
            frm.append('Fecha', Fecha.val());
            /*Detalle */
            frm.append('Fraccion', Fraccion.val());
            frm.append('Puesto', Puesto.val());
            frm.append('Maquinaria', Maquinaria.val());
            /*Detalle 2*/
            frm.append('TiempoEstandarD', TiempoEstandarD.val());
            frm.append('Eficiencia', Eficiencia.val());
            frm.append('SueldoBase', SueldoBase.val());
            /*Detalle 2 Calculos*/
            var TiempoReal = TiempoEstandarD.val() / (Eficiencia.val() / 100);
            var CostoFMO = (SueldoBase.val() / (TiempoEstandarE.val() * 5)) * TiempoEstandarD.val();
            var CostoFV = (SueldoBase.val() / (TiempoEstandarE.val() * 5)) * TiempoReal;

            frm.append('TiempoReal', $.number(TiempoReal, 2, '.', ','));
            frm.append('CostoFraccionManoObra', $.number(CostoFMO, 2, '.', ','));
            frm.append('CostoFraccionVentas', $.number(CostoFV, 2, '.', ','));


            $.ajax({
                url: master_url + 'onAgregar',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: frm
            }).done(function (data, x, jq) {
                if (nuevo) {
                    getFraccionesEstiloXEstiloDetalle(temp);
                    Estilo[0].selectize.disable();
                    pnlDetalle.removeClass('d-none');
                    temp = Estilo.val();
                    nuevo = false;
                    getRecords();
                }
                RegistrosDetalle.ajax.reload();
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
        pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.clear(true);
        pnlControlesDetalle.find("[name='Fraccion']")[0].selectize.clearOptions();
        pnlControlesDetalle.find("[name='Puesto']")[0].selectize.clear(true);
        pnlControlesDetalle.find("[name='Maquinaria']")[0].selectize.clear(true);
        pnlControlesDetalle.find("[name='Eficiencia']").val('');
        pnlControlesDetalle.find("[name='TiempoEstandarD']").val('');
        pnlControlesDetalle.find("[name='SueldoBase']").val('');
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
    function getDepartamentos() {
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
        });
    }
    function getPuestos() {
        $.ajax({
            url: master_url + 'getPuestos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlControlesDetalle.find("[name='Puesto']")[0].selectize.addOption({text: v.Nombre, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });
    }
    function getMaquinaria() {
        $.ajax({
            url: master_url + 'getMaquinaria',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlControlesDetalle.find("[name='Maquinaria']")[0].selectize.addOption({text: v.Nombre, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
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
                    RegistrosDetalle.ajax.reload();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
    }
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
                        "targets": [2],
                        "visible": false,
                        "searchable": false
                    }
                ],
                "columns": [
                    {"data": "ID"},
                    {"data": "FraccionID"},
                    {"data": "Departamento"},
                    {"data": "Fraccion"},
                    {"data": "Maquina"},
                    {"data": "Puesto"},
                    {"data": "TiempoEstandar"},
                    {"data": "Eficiencia"},
                    {"data": "TiempoReal"},
                    {"data": "CostoMO"},
                    {"data": "CostoVTAS"},
                    {"data": "SueldoBase"},
                    {"data": "Eliminar"}
                ],
                rowGroup: {
                    endRender: function (rows, group) {
                        var te = $.number(rows.data().pluck('TiempoEstandar').reduce(function (a, b) {
                            return a + (b);
                        }, 0), 2, '.', ',');
                        var cmo = $.number(rows.data().pluck('CostoMO').reduce(function (a, b) {
                            return a + getNumberFloat(b);
                        }, 0), 2, '.', ',');
                        var cv = $.number(rows.data().pluck('CostoVTAS').reduce(function (a, b) {
                            return a + getNumberFloat(b);
                        }, 0), 2, '.', ',');
                        return $('<tr class="bckGroupSum">')
                                .append('<td colspan="3" align="right">Sub Totales:&nbsp;&nbsp;</td>')
                                .append('<td>' + te + '</td> <td colspan="2"></td>  <td>$' + cmo + '</td>  <td>$' + cv + '</td>  <td colspan="2"></td></tr>');
                    },
                    dataSrc: "Departamento"
                },
                "aaSorting": [
                    [2, 'asc'], [0, 'desc']/*ID*/
                ],
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api();

                    /*TOTAL TIEMPO ESTANDAR*/
                    var TotalTiempoEstandar = api.column(6).data().reduce(function (a, b) {
                        return (a) + (b);
                    }, 0);
                    $(api.column(6).footer()).html(api.column(6, {page: 'current'}).data().reduce(function (a, b) {
                        return $.number(TotalTiempoEstandar, 2, '.', ', ');
                    }, 0));

                    /*TOTAL COSTO FRACCION MANO OBRA*/
                    var TotalCostoMO = api.column(9).data().reduce(function (a, b) {
                        var ax = 0, bx = 0;
                        ax = $.isNumeric((a)) ? parseFloat(a) : 0;
                        bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                        return  (ax + bx);
                    }, 0);

                    $(api.column(9).footer()).html(api.column(9, {page: 'current'}).data().reduce(function (a, b) {
                        return '$' + $.number(TotalCostoMO, 2, '.', ', ');
                    }, 0));
                    /*TOTAL COSTO FRACCION VENTAS*/
                    var TotalCostoVTAS = api.column(10).data().reduce(function (a, b) {
                        var ax = 0, bx = 0;
                        ax = $.isNumeric((a)) ? parseFloat(a) : 0;
                        bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                        return  (ax + bx);
                    }, 0);

                    $(api.column(10).footer()).html(api.column(10, {page: 'current'}).data().reduce(function (a, b) {
                        return '$' + $.number(TotalCostoVTAS, 2, '.', ', ');
                    }, 0));
                },

                "dom": 'frt',
                "autoWidth": false,
                language: lang,
                "displayLength": 500,
                "colReorder": true,
                "bLengthChange": false,
                "deferRender": true,
                "scrollY": 295,
                "scrollX": true,
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
    function getRecords() {
        HoldOn.open({theme: 'sk-cube', message: 'CARGANDO...'});
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
<style>
    .bckGroupSum td{
        background-color: white !important;
        font-size: 0.8375rem;
    }
</style>