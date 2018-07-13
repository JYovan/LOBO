<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Cabeceras</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnEliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div id="Materiales" class="table-responsive">
                <table id="tblMateriales" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Familia</th>
                            <th>Material</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Familia</th>
                            <th>Material</th>
                            <th>Descripción</th>
                        </tr>
                    </tfoot>
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
                        <legend class="float-left">Material</legend>
                    </div>
                    <div class="col-md-7 float-right">
                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
                        <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID" readonly="">
                        <input type="text" class="" id="IdMagnus" name="IdMagnus" readonly="">
                    </div>
                    <div class="col-sm-3">
                        <label for="Material">Material*</label>
                        <input type="text" maxlength="15"  class="form-control form-control-sm numbersOnly" id="Material" name="Material" required >
                    </div>
                    <div class="col-sm-6">
                        <label for="Descripcion">Descripción*</label>
                        <input type="text" class="form-control form-control-sm" id="Descripcion" name="Descripcion" required >
                    </div>
                    <div class="col-sm-3">
                        <label for="Tipo">Tipo*</label>
                        <select class="form-control form-control-sm required"  name="Tipo" required="">
                            <option value=""></option>
                            <option value="DIR">DIRECTO</option>
                            <option value="IND">INDIRECTO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="UnidadCompra">Unidad de Compra*</label>
                        <select class="form-control form-control-sm required"  name="UnidadCompra" required="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="UnidadConsumo">Unidad de Consumo*</label>
                        <select class="form-control form-control-sm required"  name="UnidadConsumo" required="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="Familia">Familia*</label>
                        <select class="form-control form-control-sm required"  name="Familia" required="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="Departamento">Departamento*</label>
                        <select class="form-control form-control-sm required"  name="Departamento" required="">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-3">
                        <label for="Minimo">Mínimo</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" id="Minimo" name="Minimo"  >
                    </div>
                    <div class="col-sm-3">
                        <label for="Maximo">Máximo</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" id="Maximo" name="Maximo"  >
                    </div>
                    <div class="col-sm-3">
                        <label for="PrecioLista">Precio Lista</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" id="PrecioLista" name="PrecioLista"  >
                    </div>
                    <div class="col-sm-3">
                        <label for="PrecioTope">Precio Máximo</label>
                        <input type="text" class="form-control form-control-sm numbersOnly" id="PrecioTope" name="PrecioTope"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="FechaUltimoInventario">Fecha Último Inventario</label>
                        <input type="text" id="FechaUltimoInventario" name="FechaUltimoInventario" class="form-control form-control-sm notEnter" placeholder="XX/XX/XXXX">
                    </div>
                    <div class="col-sm-3">
                        <label for="Existencia">Existencia</label>
                        <input type="number" class="form-control form-control-sm" id="Existencia" name="Existencia"  >
                    </div>
                    <div class="col-sm-6">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-sm required"  name="Estatus" required="">
                            <option value=""></option>
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--AGREGAR HIJOS CABECERA-->
<div class="card border-0 d-none" id="pnlDetalle">
    <div class="card-body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-6 col-md-6" align="left">
                    <legend>Materiales que componen el cabecero</legend>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-3">
                    <label for="Descripcion">Descripción</label>
                    <input type="text" maxlength="500" class="form-control form-control-sm" id="DescComponente" name="DescComponente"  >
                </div>
                <div class="col-sm-2">
                    <label for="Talla">Talla</label>
                    <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly" id="Talla" name="Talla"  >
                </div>
                <div class="col-2 col-md-2" align="left">
                    <br>
                    <button type="button" class="btn btn-primary btn-sm" id="btnAgregarDetalle"><span class="fa fa-plus "></span></button>
                </div>
            </div>
            <div id="RegistrosDetalle" class="row table-responsive">
                <table id="tblRegistrosDetalle" class="table table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Clave</th>
                            <th>Material</th>
                            <th>Talla</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Cabeceras/';
    var pnlDatos = $("#pnlDatos");
    var pnlDetalle = $("#pnlDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var btnAgregarDetalle = $('#btnAgregarDetalle');
    var nuevo = true;
    var tblRegistrosDetalle = $('#tblRegistrosDetalle'), RegistrosDetalle;
    var tblMaterialesX = $("#tblMateriales"), Materiales;

    $(document).ready(function () {
        $('#tblRegistrosDetalle').on('draw.dt', function () {
            $.each(tblRegistrosDetalle.find('tbody tr'), function () {
                /*Edicion Material*/
                $(this).find("td:eq(1)").on('dblclick', function () {
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
                            var v = $(this).val().toUpperCase();
                            celda.html(v);
                            RegistrosDetalle.cell(padre, 2).data(v).draw();
                        });
                        celda.find("#dbEditor").change(function () {
                            var v = $(this).val().toUpperCase();
                            celda.html(v);
                            RegistrosDetalle.cell(padre, 2).data(v).draw();
                            var row = RegistrosDetalle.row(padre).data();
                            var params = {
                                ID: row.ID,
                                CELDA: 'Descripcion',
                                VALOR: v
                            };
                            if (v !== '') {
                                onModificarComponente(params);
                            }
                        });
                    }
                });
                /*Edicion Talla*/
                $(this).find("td:eq(2)").on('dblclick', function () {
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
                            var v = $(this).val().toUpperCase();
                            celda.html(v);
                            RegistrosDetalle.cell(padre, 3).data(v).draw();
                        });
                        celda.find("#dbEditor").change(function () {
                            var v = $(this).val().toUpperCase();
                            celda.html(v);
                            RegistrosDetalle.cell(padre, 3).data(v).draw();
                            var row = RegistrosDetalle.row(padre).data();
                            var params = {
                                ID: row.ID,
                                CELDA: 'Talla',
                                VALOR: v
                            };
                            if (v !== '') {
                                onModificarComponente(params);
                            }
                        });
                    }
                });
            });
        });

        btnAgregarDetalle.click(function () {
            isValid('pnlDatos');
            if (valido) {
                if (!nuevo) {
                    onAgregarFila();
                } else {
                    swal('ATENCIÓN', 'DEBES GUARDAR EL CABECERO', 'info');
                }
            }
        });
        pnlDatos.find("#FechaUltimoInventario").inputmask({alias: "date"});
        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    $.ajax({
                        url: master_url + 'onModificar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                        getRecords();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    $.ajax({
                        url: master_url + 'onAgregar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                        console.log('* JSON *');
                        console.log(data);
                        console.log('* JSON *');
                        var dt = JSON.parse(data);
                        pnlDatos.find('#ID').val(dt.ID);
                        pnlDatos.find('#IdMagnus').val(dt.IDM);
                        nuevo = false;
                        getRecords();
                        pnlDetalle.removeClass('d-none');
                        pnlDetalle.find('#MatComponente').focus();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }

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
                            Materiales.ajax.reload();
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
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
            nuevo = true;
            if ($.fn.DataTable.isDataTable('#tblRegistrosDetalle')) {
                RegistrosDetalle.clear().draw();
            }
        });
        getRecords();
        getDepartamentos();
        getFamilias();
        getUnidades();
        handleEnter();
    });

    function onModificarComponente(params) {
        $.post(master_url + 'onModificarComponente', params).done(function (data, x, jq) {
        }).fail(function (x, y, z) {
            console.log('ERROR', x, y, z);
        }).always(function () {
        });
    }
    function onAgregarFila() {
        $.ajax({
            url: master_url + 'getUltimaClave',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            var Cabecera = pnlDatos.find("[name='ID']");
            var DescComponente = pnlDetalle.find("[name='DescComponente']");
            var Talla = pnlDetalle.find("[name='Talla']");
            var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
            frm.append('Cabecera', Cabecera.val());
            frm.append('Material', parseInt(data[0].CLAVEMAT));
            frm.append('Descripcion', DescComponente.val());
            frm.append('Talla', Talla.val());

            $.ajax({
                url: master_url + 'onAgregarComponente',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: frm
            }).done(function (data, x, jq) {
                console.log(data);
                onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                //var dt = JSON.parse(data);
                //pnlDatos.find('#ID').val(dt.ID);
                //pnlDatos.find('#IdMagnus').val(dt.IDM);
                getRecords();
                limpiarCampos();
                RegistrosDetalle.ajax.reload();
                pnlDetalle.find('#DescComponente').focus();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });

        }).fail(function (x, y, z) {
            console.log(x, y, z);
        });



    }
    function getComponentesRangosDetalle(IDX) {
        tblRegistrosDetalle.DataTable().destroy();
        RegistrosDetalle = tblRegistrosDetalle.DataTable({
            "ajax": {
                "url": master_url + 'getComponentesRangosDetalle',
                "dataSrc": "",
                "type": 'POST',
                "data": {
                    "Cabecera": IDX
                }
            },
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }
            ],
            "columns": [
                {"data": "ID"},
                {"data": "Clave"},
                {"data": "Material"},
                {"data": "Talla"},
                {"data": "Eliminar"}
            ],
            "aaSorting": [
                [1, 'asc']
            ],

            "dom": 'frt',
            "autoWidth": false,
            language: lang,
            "displayLength": 10,
            "colReorder": true,
            "bLengthChange": false,
            "deferRender": true,
            "scrollY": 295,
            "scrollX": true,
            "scrollCollapse": true,
            "bSort": true,
            initComplete: function (x, y) {
                HoldOn.close();
                pnlDetalle.find('#DescComponente').focus();
            }

        });

        tblRegistrosDetalle.find('tbody').on('click', 'tr', function () {
            tblRegistrosDetalle.find("tbody tr").removeClass("success");
            $(this).addClass("success");
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
                });
            }
        });
    }
    function limpiarCampos() {
        pnlDetalle.find("[name='DescComponente']").val('');
        pnlDetalle.find("[name='Talla']").val('');
    }
    function getRecords() {
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblMateriales')) {
            tblMaterialesX.DataTable().destroy();
            Materiales = tblMaterialesX.DataTable({
                "dom": 'Bfrtip',
                buttons: buttons,
                "ajax": {
                    "url": master_url + 'getRecords',
                    "dataType": "jsonp",
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "ID"},
                    {"data": "Familia"},
                    {"data": "Material"},
                    {"data": "Descripcion"}
                ],
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }
//                    ,
//                    {
//                        "targets": [1],
//                        "visible": false,
//                        "searchable": false
//                    }
                ],
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
                    [1, 'asc'], [2, 'asc']
                ],
                rowGroup: {
                    dataSrc: "Familia"
                },
                initComplete: function (x, y) {
                    HoldOn.close();
                }
            });

            $('#tblMateriales_filter input[type=search]').focus();

            $('#tblMateriales tfoot th').each(function () {
                console.log($(this));
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar por ' + title + '" class="form-control form-control-sm" style="width: 100%;"/>');
            });

            Materiales.columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });

            tblMaterialesX.find('tbody').on('click', 'tr', function () {
                tblMaterialesX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Materiales.row(this).data();
                temp = parseInt(dtm.ID);
            });

            tblMaterialesX.find('tbody').on('dblclick', 'tr', function () {
                nuevo = false;
                tblMaterialesX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Materiales.row(this).data();
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
                        url: master_url + 'getMaterialByID',
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
                        $.each(data[0], function (k, v) {
                            pnlDatos.find("[name='" + k + "']").val(v);
                            if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                            }
                        });
                        pnlTablero.addClass("d-none");
                        pnlDatos.removeClass('d-none');
                        pnlDetalle.removeClass('d-none');
                        getComponentesRangosDetalle(temp);

                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                }
            });
        }

    }
    function getDepartamentos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getDepartamentos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Departamento']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getFamilias() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getFamilias',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Familia']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getUnidades() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getUnidades',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='UnidadConsumo']")[0].selectize.addOption({text: v.SValue, value: v.ID});
                pnlDatos.find("[name='UnidadCompra']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

</script>

