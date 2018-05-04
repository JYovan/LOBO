<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Piezas Y Materiales</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--MODALES-->
<!--Confirmacion-->
<div class="modal" id="mdlConfirmar" tabindex="-1" role="dialog">
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

<!--GUARDAR-->
<div class="card-body text-dark d-none" id="pnlNuevo">

    <form id="frmNuevo">
        <div class="row">
            <div class="col-md-4 float-left">
                <legend class="float-left">Piezas Y Materiales</legend>
            </div>
            <div  class="col-md-5 text-center">
            </div>
            <div class="col-md-3 float-right" align="right">
                <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <br>
            <div class="d-none">
                <input type="text" class="" id="ID" name="ID"  >
            </div>
            <div class="col-sm-3">
                <label for="Estilo">Estilo*</label>
                <select class="form-control form-control-sm" id="Estilo"  name="Estilo">
                </select>
            </div>
            <div class="col-sm-3">
                <label for="Combinacion">Combinación*</label>
                <select class="form-control form-control-sm" id="Combinacion"  name="Combinacion">
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label for="Pieza">Pieza</label>
                <select class="form-control form-control-sm" id="Pieza"  name="Pieza">
                </select>
            </div>
            <div class="col-sm-3">
                <label for="Familia">Grupo</label>
                <select class="form-control form-control-sm " id="Familia"  name="Familia">
                </select>
            </div>
            <div class="col-sm-3">
                <label for="Material">Material</label>
                <select class="form-control form-control-sm " id="Material"  name="Material">
                </select>
            </div>

            <div class="col-sm-1">
                <label for="Consumo">Consumo</label>
                <input type="number" onKeyDown="if (event.keyCode === 13)
                            triggerNuevoAgregar();" id="Consumo" name="Consumo" class="form-control form-control-sm" min="0">
            </div>
            <div class="col-sm" >
                <br>
                <button type="button" class="btn btn-primary btn-sm" id="btnAgregarMaterial" data-toggle="tooltip" data-placement="top" title="Agregar">
                    <i class="fa fa-plus"></i>
                </button>
                <button type="button"  class="btn btn-danger btn-sm" id="btnEliminarMaterial" data-toggle="tooltip" data-placement="top" title="Eliminar Registro">
                    <i class="fa fa-trash "></i>
                </button>
            </div>
        </div>
    </form>
</div><!--FIN CARD BODY-->
<div class="card-body text-dark d-none" id="pnlDetalle">
    <div class="row">
        <br>
        <div id="MaterialesRequeridos" class="table-responsive">
            <table id="tblMaterialesRequeridos" name="tblMaterialesRequeridos" class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Pieza ID</th>
                        <th scope="col">Pieza</th>
                        <th scope="col">ID</th>
                        <th scope="col">Material</th>
                        <th scope="col">U.M</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Consumo</th>
                        <th scope="col">Importe</th>
                        <th scope="col" class="d-none">Orden</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12" align="center" style="background-color: #fff ">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-2 text-dark">
            </div>
            <div class="col-sm-2 text-info">
            </div>
            <div class="col-sm-2 text-danger">
            </div>
            <div class="col-sm-2 text-success">
                Total: <br>
                <div id="SuperTotal"><strong>$0.0</strong></div>
            </div>
            <div class="col-sm-2 text-success">
            </div>
        </div>
    </div>
</div>






<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/PiezasYMateriales/';
    var pnlNuevo = $("#pnlNuevo");
    var pnlDetalle = $("#pnlDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlNuevo.find("#btnGuardar");
    var btnCancelar = pnlNuevo.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");
    var tblMaterialesRequeridos, tblMaterialesRequeridos;
    var super_total = 0.0;
    var Estilo = pnlNuevo.find("#Estilo");
    var Combinacion = pnlNuevo.find("#Combinacion");
    var EsNuevo = true;
    var n = 1;
    var tblInicial = {
        "dom": 'frt',
        "autoWidth": false,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollCollapse": true,
        "bSort": true,
        "aaSorting": [
            [8, 'desc']/*ORDER*/
        ],
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
                "targets": [8],
                "visible": false,
                "searchable": false
            },
        ],
        language: {
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
        }
    };


    $(document).ready(function () {
        handleEnter();

        Estilo.change(function () {
            pnlNuevo.find("[name='Combinacion']")[0].selectize.clear(true);
            pnlNuevo.find("[name='Combinacion']")[0].selectize.clearOptions();
            getCombinacionesXEstilo($(this).val());
        });

        pnlNuevo.find("[name='Familia']").change(function () {
            pnlNuevo.find("[name='Material']")[0].selectize.clear(true);
            pnlNuevo.find("[name='Material']")[0].selectize.clearOptions();
            getMaterialesRequeridos($(this).val());
        });

        //Evento clic del boton confirmar borrar
        btnConfirmarEliminar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
                //Muestra el modal
                mdlConfirmar.modal('show');
            } else {
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
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'MATERIAL POR COMBINACIÓN ELIMINADO', 'danger');
                    location.reload();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });

        /*GUARDAR*/
        btnGuardar.click(function () {
            HoldOn.open({
                theme: 'sk-bounce',
                message: 'GUARDANDO...'
            });
            if (Estilo.val() !== '' && Combinacion.val() !== '') {
                console.log("\nESPERE... " + Estilo.val() + " " + Combinacion.val());
                $.getJSON(master_url + 'onComprobarEstiloXCombinacion', {ID: pnlNuevo.find("#ID").val(), E: Estilo.val(), C: Combinacion.val()}).done(function (data, x, jq) {
                    if (parseInt(data[0].EXISTE) > 0) {
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL ESTILO Y LA COMBINACIÓN YA EXISTEN', 'danger');
                        if (ID === 0) {
                            Estilo.val("").trigger('change');
                            Combinacion.val("").trigger('change');
                        }
                    } else {
                        if (pnlDetalle.find('#tblMaterialesRequeridos > tbody  > tr td.dataTables_empty').length <= 0) {
                            var f = new FormData();
                            f.append('Estilo', pnlNuevo.find("#Estilo").val());
                            f.append('Combinacion', pnlNuevo.find("#Combinacion").val());
                            var detalle = [];
                            tblMaterialesRequeridos.destroy();
                            pnlDetalle.find('#tblMaterialesRequeridos > tbody  > tr').each(function (k, v) {
                                var row = $(this).find("td");
                                var material = {
                                    Pieza: row.eq(0).text().replace(/\s+/g, ''),
                                    Material: row.eq(2).text().replace(/\s+/g, ''),
                                    Precio: row.eq(5).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""),
                                    Consumo: row.eq(6).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", "")
                                };
                                detalle.push(material);
                            });
                            f.append('Materiales', JSON.stringify(detalle));
                            console.log('* * * * DETALLE * * *');
                            console.log(detalle);
                            console.log('* * * * FIN DETALLE * * *');
                            if (EsNuevo) {
                                $.ajax({
                                    url: master_url + 'onAgregar',
                                    type: "POST",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: f
                                }).done(function (data, x, jq) {
                                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                                    pnlDatos.find('#ID').val(data);
                                    EsNuevo = false;
                                    getRecords();
                                    pnlNuevo.find("#tblMaterialesRequeridos > tbody").html("");
                                }).fail(function (x, y, z) {
                                    console.log(x, y, z);
                                }).always(function () {
                                    HoldOn.close();
                                    tblMaterialesRequeridos = pnlDetalle.find("#tblMaterialesRequeridos").DataTable(tblInicial);
                                });
                            } else {
                                f.append('ID', pnlNuevo.find("#ID").val());
                                $.ajax({
                                    url: master_url + 'onModificar',
                                    type: "POST",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: f
                                }).done(function (data, x, jq) {
                                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO UN REGISTRO', 'success');
                                    getRecords();
                                    EsNuevo = false;
                                    pnlNuevo.find("#tblMaterialesRequeridos > tbody").html("");
                                    /*FIN OBTENER MATERIALES AGREGADOS*/
                                }).fail(function (x, y, z) {
                                    console.log(x, y, z);
                                }).always(function () {
                                    HoldOn.close();
                                    tblMaterialesRequeridos = pnlDetalle.find("#tblMaterialesRequeridos").DataTable(tblInicial);
                                });
                            }
                        } else {
                            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE AGREGAR MATERIALES A CONSUMIR', 'danger');
                        }
                    }
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });

        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlNuevo.removeClass('d-none');
            pnlDetalle.removeClass('d-none');
            pnlNuevo.find("input").val("");
            $.each(pnlNuevo.find("select"), function (k, v) {
                pnlNuevo.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            $.each(pnlDetalle.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                tblMaterialesRequeridos.row($(this)).remove().draw();
            });
            EsNuevo = true;

            tblMaterialesRequeridos = pnlDetalle.find("#tblMaterialesRequeridos").DataTable(tblInicial);
        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlNuevo.addClass('d-none');
            pnlDetalle.addClass('d-none');
        });

        pnlNuevo.find("#btnEliminarMaterial").on('click', function () {

            var seleccionado = false;
            $.each(pnlDetalle.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                if ($(this).hasClass("success")) {
                    seleccionado = true;
                    return false;
                }
            });
            if (seleccionado) {
                $.each(pnlDetalle.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                    if ($(this).hasClass("success")) {
                        tblMaterialesRequeridos.row($(this)).remove().draw();/*SI NO SE ESPECIFICA THIS, Y SE FILTRA Y LA QUIERES ELIMINAR QUE SELECCIONASTE DESPUÉS DE FILTRAR TE REMUEVE EL PRIMERO SIN IMPORTAR LA SELECCION*/
                        if (EsNuevo) {
                            /*CALCULAR SUPER TOTAL*/
                            super_total = 0.0;
                            $.each(pnlDetalle.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                                var sub = parseFloat($(this).find("td").eq(7).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
                                super_total += sub;
                            });
                            pnlDetalle.find("#SuperTotal").html('<strong> $' + $.number(super_total, 3, '.', ',') + '</strong>');
                            /*FIN CALCULAR SUPER TOTAL*/
                        } else {
                            onCalcularSuperTotalAlEditar();
                        }
                    }

                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE SELECCIONAR UN REGISTRO', 'danger');
            }
        });

        pnlNuevo.find("#btnAgregarMaterial").on('click', function () {
            n = (n > 0) ? n : 1;
            var Pieza = pnlNuevo.find("#Pieza").val();
            var PiezaT = pnlNuevo.find("#Pieza option:selected").text();
            var Consumo = pnlNuevo.find("#Consumo").val();
            var id_selected = pnlNuevo.find("#Pieza").val();
            var Material = pnlNuevo.find("#Material")[0].selectize.getValue();
            var MaterialT = pnlNuevo.find("#Material option:selected").text();

            if (id_selected !== '') {
                if (parseFloat(Consumo) > 0 && id_selected !== '') {
                    /*COMPROBAR SI YA FUE AGREGADO*/
                    var agregado = false;
                    $.each(pnlDetalle.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                        var id_row = tblMaterialesRequeridos.row($(this)).data();
                        if (parseInt(id_row[0]) === parseInt(id_selected)) {
                            agregado = true;
                            return false;
                        } else {
                            agregado = false;
                        }
                    });
                    /*AGREGAR SI NO ESTA AGREGADO*/
                    if (!agregado) {

                        /*Estilo	Combinación	Material	Pieza	U.M	Precio	Consumo	Tipo	Importe
                         * */
                        $.getJSON(master_url + 'getUnidadPrecioTipoXMaterialID', {ID: Material}).done(function (data, x, jq) {
                            var dtm = data[0];
                            if (data !== null && data.length > 0) {

                                tblMaterialesRequeridos.row.add([
                                    Pieza, /*1*/
                                    PiezaT, /*2*/
                                    Material, /*3*/
                                    MaterialT, /*4*/
                                    '<strong><span class="text-warning">' + dtm.UNIDAD + '</span></strong>', /*5*/
                                    '<strong><span class="text-primary">$' + $.number(dtm.PRECIO, 3, '.', ',') + '</span></strong>', /*6*/
                                    '<strong><span class="text-danger">' + Consumo + '</span></strong>', /*7*/
                                    '<strong><span class="text-success">$' + $.number((Consumo * parseFloat(dtm.PRECIO)), 3, '.', ',') + '</span></strong>'/*8*/,
                                    n
                                ]).draw(false);

                                n += 1;
                                /*OK*/
                                /*REINICIAR VALORES EN ZERO*/
                                pnlNuevo.find("#Consumo").val('');
                                onNotify('<span class="fa fa-check fa-lg"></span>', 'MATERIAL AGREGADO', 'success');
                                /*CALCULAR SUPER TOTAL*/
                                super_total = 0.0;
                                $.each(pnlDetalle.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                                    var sub = parseFloat($(this).find("td").eq(7).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
                                    super_total += sub;
                                });
                                var tt = 0.0;
                                $.each(tblMaterialesRequeridos.rows().data(), function () {
                                    tt += getNumberFloat($($(this)[7]).find("span.text-success").text());
                                });
                                pnlDetalle.find("#SuperTotal").html('<strong> $' + $.number(tt, 3, '.', ',') + '</strong>');
                                /*FIN CALCULAR SUPER TOTAL*/
                            }
                        }).fail(function (x, y, z) {
                            console.log(x);
                            console.log(y);
                            console.log(z);
                            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE SELECCIONAR UN MATERIAL', 'danger');
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        /*ERROR*/
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'ESTA PIEZA YA FUE AGREGADA', 'danger');
                    }
                } else {/*ERROR*/
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ESTABLECER UN CONSUMO', 'danger');
                }
            } else {/*ERROR*/
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE SELECCIONAR UN MATERIAL', 'danger');
            }
        });

        /*CALLS*/
        getRecords();
        getEstilos();
        getPiezas();
        getFamilias();

        pnlDetalle.find('#tblMaterialesRequeridos tbody').on('click', 'tr', function () {
            pnlDetalle.find("#tblMaterialesRequeridos tbody tr").removeClass("success");
            pnlDetalle.find("#tblMaterialesRequeridos tbody tr").removeClass("row_for_delete");
            $(this).addClass("success");
            $(this).addClass("row_for_delete");
        });
    }
    );

    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getRecords',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $("#tblRegistros").html(getTable('tblPiezasYMateriales', data));

                $('#tblPiezasYMateriales tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblPiezasYMateriales thead th');
                var tfoot = $('#tblPiezasYMateriales tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblPiezasYMateriales tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });

                var tblSelected = $('#tblPiezasYMateriales').DataTable(tableOptions);
                $('#tblPiezasYMateriales_filter input[type=search]').focus();

                $('#tblPiezasYMateriales tbody').on('click', 'tr', function () {

                    $("#tblPiezasYMateriales tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });

                $('#tblPiezasYMateriales tbody').on('dblclick', 'tr', function () {
                    $("#tblPiezasYMateriales tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    if (index === -1) {
                        selected.push(id);
                    } else {
                        selected.splice(index, 1);
                    }
                    var dtm = tblSelected.row(this).data();
                    if (temp !== 0 && temp !== undefined && temp > 0) {
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.ajax({
                            url: master_url + 'getPiezasYMaterialesByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            if (data.length > 0) {
                                var dtm = data[0];
                                pnlNuevo.find("input").val("");
                                pnlTablero.addClass("d-none");
                                pnlNuevo.removeClass('d-none');
                                pnlDetalle.removeClass('d-none');
                                $.each(pnlNuevo.find("select"), function (k, v) {
                                    pnlNuevo.find("select")[k].selectize.clear(true);
                                });

                                pnlNuevo.find("[name='Estilo']")[0].selectize.setValue(dtm.Estilo);
                                $.getJSON(master_url + 'getCombinacionesXEstilo', {Estilo: dtm.Estilo}).done(function (data, x, jq) {
                                    $.each(data, function (k, v) {
                                        pnlNuevo.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
                                    });
                                    pnlNuevo.find("[name='Combinacion']")[0].selectize.setValue(dtm.Combinacion);
                                    pnlNuevo.find("[name='Combinacion']")[0].selectize.close();
                                }).fail(function (x, y, z) {
                                    console.log(x, y, z);
                                }).always(function () {
                                    HoldOn.close();
                                });

                                pnlNuevo.find("[name='ID']").val(dtm.ID);


                                /*OBTENER LOS MATERIALES AGREGADOS*/
                                getPiezasYMaterialesDetalleByID(dtm.ID);
                                pnlNuevo.find("[name='Pieza']")[0].selectize.focus();
                                /*FIN OBTENER MATERIALES AGREGADOS*/
                                EsNuevo = false;
                            }
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
                    }
                });

            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO SE ENCONTRARON REGISTROS', 'danger');
            }

        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getMaterialesRequeridos(Familia) {
        if (Familia !== '' && Familia !== undefined && Familia !== null) {
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            $.ajax({
                url: master_url + 'getMaterialesRequeridos',
                type: "POST",
                dataType: "JSON",
                data: {
                    Familia: Familia
                }
            }).done(function (data, x, jq) {
                $.each(data, function (k, v) {
                    pnlNuevo.find("#Material")[0].selectize.addOption({text: v.Material, value: v.ID});
                });
                pnlNuevo.find("#Material")[0].selectize.focus();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });

        }
    }

    var Consumo_temporal = 0;

    function getPiezasYMaterialesDetalleByID(IDX) {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        if ($.fn.DataTable.isDataTable('#tblMaterialesRequeridos')) {
            tblMaterialesRequeridos.destroy();
            pnlDetalle.find("#tblMaterialesRequeridos > tbody").html("");
            tblMaterialesRequeridos = pnlDetalle.find("#tblMaterialesRequeridos").DataTable(tblInicial);
        } else {
            tblMaterialesRequeridos = pnlDetalle.find("#tblMaterialesRequeridos").DataTable(tblInicial);
        }

        n = 1;
        /*DETALLE*/
        $.getJSON(master_url + 'getPiezasYMaterialesDetalleByID', {ID: IDX}).done(function (data, x, jq) {

            console.log('* * * MAT AGREGADOS * * *');
            console.log(data);
            $.each(data, function (k, v) {
                tblMaterialesRequeridos.row.add([
                    v.PIEZA_ID,
                    v.Pieza,
                    v.ID,
                    v.Material,
                    v["U.M"], v.Precio,
                    v.Consumo,
                    v.Importe,
                    n
                ]).draw(false);
                n += 1;
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
            onCalcularSuperTotalAlEditar();
        });
        /*FIN DETALLE*/

        pnlNuevo.find('#tblMaterialesRequeridos_filter').find('input[type=search]').val('');
        pnlNuevo.find('#tblMaterialesRequeridos_filter input[type=search]').focus();

        pnlNuevo.find('#tblMaterialesRequeridos > tbody').on('click', 'tr', function () {
            pnlNuevo.find("#tblMaterialesRequeridos > tbody > tr").removeClass("success");
            $(this).addClass("success");
            $(this).addClass("row_for_delete");
            /*REMOVER EDITORES EN OTRAS CELDAS*/
            onRemoverEditoresInactivos();
            /*FIN REMOVER EDITORES EN OTRAS CELDAS*/
        });

        pnlDetalle.find('#tblMaterialesRequeridos tbody').on('dblclick', 'tr', function () {
            pnlDetalle.find("#tblMaterialesRequeridos tbody tr").removeClass("success");
            $(this).addClass("success");

            /*EDITOR DE CONSUMO*/
            Consumo_temporal = 0;
            var cells = $(this).find("td");
            $.each(pnlDetalle.find('#tblMaterialesRequeridos > tbody > tr'), function () {
                var cell = $(this).find("td").eq(4);

                var rcantidad = cell.text() !== '' ? cell.text() : cell.find("#CeldaConsumo").val();
                cell.html('<strong><span class="text-danger">' + rcantidad + '</span></strong>');
            });
            var cells = $(this).find("td");
            var cell = cells.eq(4);
            cell.html('<input type="text" class="form-control form-control-sm numbersOnly" maxlength="3" id="CeldaConsumo" value="' + cell.text() + '">');


            Consumo_temporal = getNumberFloat(cells.eq(4).find("#CeldaConsumo").val());

            cells.eq(4).find("#CeldaConsumo").keyup(function (e) {
                var code = e.which; // recommended to use e.which, it's normalized across browsers
                if (code === 13) {

                    if (cells.eq(4).find("#CeldaConsumo").val() !== '' && parseFloat(cells.eq(4).find("#CeldaConsumo").val()) > 0) {
                        var Precio = getNumberFloat(cells.eq(3).text());
                        var Consumo = getNumberFloat(cells.eq(4).find("#CeldaConsumo").val());
                        cells.eq(5).html('<strong><span class="text-success">$' + $.number(Precio * Consumo, 2, '.', ',') + '</span></strong>');
                        onRemoverEditoresInactivos();
                    } else {
                        cells.eq(4).html('<strong><span class="text-danger">' + Consumo_temporal + '</span></strong>');
                    }
                }
                onCalcularSuperTotalAlEditar();
            });
            cells.find("#CeldaConsumo").change(function () {
                var Precio = getNumberFloat(cells.eq(3).text());
                var Consumo = getNumberFloat(cells.eq(4).find("#CeldaConsumo").val());
                cells.eq(5).html('<strong><span class="text-success">$' + $.number(Precio * Consumo, 2, '.', ',') + '</span></strong>');

                /*CALCULAR SUPER TOTAL*/
                onCalcularSuperTotalAlEditar();
                /*FIN CALCULAR SUPER TOTAL*/
            });
            cell.find("#CeldaConsumo").focus();

            /*FIN EDITOR DE CONSUMO*/
        });

    }

    function getEstilos() {
        $.getJSON(master_url + 'getEstilos').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlNuevo.find("[name='Estilo']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
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
                pnlNuevo.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            pnlNuevo.find("[name='Combinacion']")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getPiezas() {
        $.getJSON(master_url + 'getPiezas').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlNuevo.find("[name='Pieza']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
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
                pnlNuevo.find("[name='Familia']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onRemoverEditoresInactivos() {
        /*REMOVER EDITORES EN OTRAS CELDAS*/
        $.each($.find('#tblMaterialesRequeridos tbody tr'), function (k, v) {
            var subcells = $(this).find("td");
            var SubConsumo = (subcells.eq(4).text().replace(/\s+/g, '') !== '' &&
                    parseFloat(subcells.eq(4).text().replace(/\s+/g, '')) > 0) ? subcells.eq(4).text() : subcells.eq(4).find("#CeldaConsumo").val();
            subcells.eq(4).html('<strong><span class="text-danger">' + SubConsumo + '</span></strong>');
        });
        /*FIN REMOVER EDITORES EN OTRAS CELDAS*/
    }

    function onCalcularSuperTotalAlEditar() {
        /*CALCULAR SUPER TOTAL*/
        super_total = 0.0;
        $.each(pnlDetalle.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
            sub = getNumberFloat($(this).find("td").eq(5).text());
            super_total += sub;
        });
        pnlDetalle.find("#SuperTotal").html('<strong> $' + $.number(super_total, 3, '.', ',') + '</strong>');
        /*FIN CALCULAR SUPER TOTAL*/
    }

    function triggerNuevoAgregar() {
        pnlNuevo.find("#btnAgregarMaterial").trigger('click');
        $("#Pieza")[0].selectize.focus();
        $("#Pieza")[0].selectize.clear(true);
        $("[name='Familia']")[0].selectize.clear(true);
        $("[name='Material']")[0].selectize.clear(true);
        $("[name='Material']")[0].selectize.clearOptions();

    }

</script>