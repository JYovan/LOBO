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
<div class="card border-0  d-none" id="pnlNuevo">
    <div class="card-body text-dark">
        <form id="frmNuevo"> 
            <div class="row">
                <div class="col-md-4 float-left">
                    <legend class="float-left">Piezas Y Materiales</legend>
                </div>
                <div  class="col-md-5 text-center"> 
                </div>
                <div class="col-md-3 float-right" align="right">
                    <button type="button" class="btn btn-default" id="btnCancelar">CANCELAR</button>
                    <button type="button" class="btn btn-primary" id="btnGuardar">GUARDAR</button>
                </div>
            </div>
            <div class="row">
                <div class="col w-100">
                    <br>
                    <div class="card border-dark">
                        <div class="card-header text-center">
                            <strong>DATOS</strong>
                        </div>
                        <div class="card-body row">
                            <div class="d-none">
                                <input type="text" class="" id="ID" name="ID"  >
                            </div>
                            <div class="col-sm">
                                <label for="Estilo">Estilo*</label>
                                <select class="form-control form-control-sm" id="Estilo"  name="Estilo">  
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="Combinacion">Combinación*</label>
                                <select class="form-control form-control-sm" id="Combinacion"  name="Combinacion">  
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100"></div>
                <br>
                <div class="col w-100">
                    <div class="card border-dark">
                        <div class="card-header text-center">
                            <strong>DETALLE</strong>
                        </div>
                        <div class="card-body row"> 
                            <div id="SuperTotal" class="col-12 text-center">
                                <h2 class="text-success"><strong>$ 0.0</strong></h2>
                            </div>
                            <div class="col-sm">
                                <label for="Pieza">Pieza*</label>
                                <select class="form-control form-control-sm" id="Pieza"  name="Pieza">  
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="Material">Material*</label>
                                <div id="MaterialNuevo">
                                    <select class="form-control form-control-sm " id="Material"  name="Material">  
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm">
                                <label for="Consumo">Consumo*</label>
                                <input type="number" onKeyDown="if (event.keyCode === 13)
                                            triggerNuevoAgregar();" id="Consumo" name="Consumo" class="form-control form-control-sm" min="0">
                            </div>
                            <div class="col-sm" >
                                <br>
                                <button type="button" class="btn btn-secondary" id="btnAgregarMaterial"><span class="fa fa-plus "></span></button> 
                                <button type="button" class="btn btn-secondary" id="btnEliminarMaterial"><span class="fa fa-trash "></span></button>
                            </div> 
                            <div class="w-100"></div> 
                            <br>
                            <div id="MaterialesRequeridos" class="table-responsive">
                                <table id="tblMaterialesRequeridos" name="tblMaterialesRequeridos" class="table dt-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">Pieza ID</th>
                                            <th scope="col">Pieza</th>
                                            <th scope="col">ID</th> 
                                            <th scope="col">Material</th>
                                            <th scope="col">U.M</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Consumo</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Importe</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--FIN CARD-->
                </div>
            </div><!--FIN ROW-->
        </form>
    </div> 
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/PiezasYMateriales/';
    var pnlNuevo = $("#pnlNuevo");
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
    var tblInicial = {
        "autoWidth": true,
        "colReorder": true,
        "displayLength": 20,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 350,
        "scrollCollapse": false,
        "bSort": true,
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
            }],
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

    function triggerNuevoAgregar() {
        pnlNuevo.find("#btnAgregarMaterial").trigger('click');
        $("#Pieza")[0].selectize.focus();
        $("#Pieza")[0].selectize.clear(true);
    }

    $(document).ready(function () {
        handleEnter();
        var busqueda;
        pnlNuevo.find('#Material')[0].selectize.on('type', function () {
            busqueda = this.lastQuery;
        });

        pnlNuevo.find('#MaterialNuevo').on('keydown', function (e) {
            if (e.which === 32) {
                e.preventDefault();
                getMaterialesRequeridos(busqueda.toUpperCase());
            }
        });

        Estilo.change(function () {
//            onComprobarEstiloXCombinacion(0, Estilo, Combinacion);
        });

        Combinacion.change(function () {
//            onComprobarEstiloXCombinacion(0, Estilo, Combinacion);
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
                        if (pnlNuevo.find('#tblMaterialesRequeridos > tbody  > tr td.dataTables_empty').length <= 0) {
                            var f = new FormData();
                            f.append('Estilo', pnlNuevo.find("#Estilo").val());
                            f.append('Combinacion', pnlNuevo.find("#Combinacion").val());
                            f.append('Estatus', pnlNuevo.find("#Estatus option:selected").text());
                            var detalle = [];
                            tblMaterialesRequeridos.destroy();
                            pnlNuevo.find('#tblMaterialesRequeridos > tbody  > tr').each(function (k, v) {
                                var row = $(this).find("td");
                                var material = {
                                    Pieza: row.eq(0).text().replace(/\s+/g, ''),
                                    Material: row.eq(2).text().replace(/\s+/g, ''),
                                    Precio: row.eq(5).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""),
                                    Consumo: row.eq(6).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""),
                                    Tipo: (row.eq(7).text().replace(/\s+/g, '') === 'DIR') ? 1 : 2
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
                                    /*OBTENER LOS MATERIALES AGREGADOS*/
//                                    getPiezasYMaterialesDetalleByID(pnlNuevo.find("#ID").val());
//                                    tblMaterialesRequeridos.destroy();
//                                    tblMaterialesRequeridos = pnlNuevo.find('#tblMaterialesRequeridos').DataTable(tableOptionsDetalleInfinito);
//                                    tblMaterialesRequeridos.draw();
//                                    pnlNuevo.find('#tblMaterialesRequeridos_filter').find('input[type=search]').val('');
//                                    $('#tblMaterialesRequeridos_filter input[type=search]').focus();
                                    /*FIN OBTENER MATERIALES AGREGADOS*/
                                }).fail(function (x, y, z) {
                                    console.log(x, y, z);
                                }).always(function () {
                                    HoldOn.close();
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
            pnlNuevo.find("input").val("");
            $.each(pnlNuevo.find("select"), function (k, v) {
                pnlNuevo.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                tblMaterialesRequeridos.row($(this)).remove().draw();
            });
            EsNuevo = true;

            tblMaterialesRequeridos = pnlNuevo.find("#tblMaterialesRequeridos").DataTable(tblInicial);
        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlNuevo.addClass('d-none');
        });


        pnlNuevo.find("#btnEliminarMaterial").on('click', function () {
            console.log(EsNuevo);
            var seleccionado = false;
            $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                if ($(this).hasClass("success")) {
                    seleccionado = true;
                    return false;
                }
            });
            if (seleccionado) {
                $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                    if ($(this).hasClass("success")) {
                        tblMaterialesRequeridos.row($(this)).remove().draw();/*SI NO SE ESPECIFICA THIS, Y SE FILTRA Y LA QUIERES ELIMINAR QUE SELECCIONASTE DESPUÉS DE FILTRAR TE REMUEVE EL PRIMERO SIN IMPORTAR LA SELECCION*/
                        if (EsNuevo) {
                            /*CALCULAR SUPER TOTAL*/
                            super_total = 0.0;
                            $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                                var sub = parseFloat($(this).find("td").eq(8).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
                                super_total += sub;
                            });
                            pnlNuevo.find("#SuperTotal").html('<h2 class="text-success"><strong> $' + $.number(super_total, 3, '.', ',') + '</strong></h2>');
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
            var Pieza = pnlNuevo.find("#Pieza").val();
            var PiezaT = pnlNuevo.find("#Pieza option:selected").text();
            var Consumo = pnlNuevo.find("#Consumo").val();
            var id_selected = pnlNuevo.find("#Pieza").val();

            if (id_selected !== '') {
                if (parseFloat(Consumo) > 0 && id_selected !== '') {
                    /*COMPROBAR SI YA FUE AGREGADO*/
                    var agregado = false;
                    $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                        var id_row = $(this).find("td").eq(0).text();
                        console.log(id_row + '===' + id_selected);
                        if (id_row === id_selected) {
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
                        $.getJSON(master_url + 'getUnidadPrecioTipoXMaterialID', {ID: pnlNuevo.find("#Material").val()}).done(function (data, x, jq) {
                            var dtm = data[0];
                            if (data !== null && data.length > 0) {
                                tblMaterialesRequeridos.row.add([
                                    Pieza, /*1*/
                                    PiezaT, /*2*/
                                    pnlNuevo.find("#Material").val(), /*3*/
                                    pnlNuevo.find("#Material option:selected").text(), /*4*/
                                    '<strong><span class="text-warning">' + dtm.UNIDAD + '</span></strong>', /*5*/
                                    '<strong><span class="text-primary">$' + $.number(dtm.PRECIO, 3, '.', ',') + '</span></strong>', /*5*/
                                    '<strong><span class="text-danger">' + Consumo + '</span></strong>', /*6*/
                                    '<strong><span class="text-info">' + dtm.TIPO + '</span></strong>', /*7*/
                                    '<strong><span class="text-success">$' + $.number((Consumo * parseFloat(dtm.PRECIO)), 3, '.', ',') + '</span></strong>'/*8*/
                                ]).draw(false);

                                /*OK*/
                                /*REINICIAR VALORES EN ZERO*/
                                pnlNuevo.find("#Consumo").val('');
                                onNotify('<span class="fa fa-check fa-lg"></span>', 'MATERIAL AGREGADO', 'success');
                                /*CALCULAR SUPER TOTAL*/
                                super_total = 0.0;
                                $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                                    var sub = parseFloat($(this).find("td").eq(8).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
                                    super_total += sub;
                                });
                                var tt = 0.0;
                                $.each(tblMaterialesRequeridos.rows().data(), function () { 
                                    tt += getNumberFloat($($(this)[8]).find("span.text-success").text());
                                });
                                pnlNuevo.find("#SuperTotal").html('<h2 class="text-success"><strong> $' + $.number(tt, 3, '.', ',') + '</strong></h2>');
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
        getCombinaciones();
        getPiezas();
//        tblMaterialesRequeridos = pnlNuevo.find("#tblMaterialesRequeridos").DataTable(tableOptionsDetalleInfinito);

        pnlNuevo.find('#tblMaterialesRequeridos tbody').on('click', 'tr', function () {
            pnlNuevo.find("#tblMaterialesRequeridos tbody tr").removeClass("success");
            pnlNuevo.find("#tblMaterialesRequeridos tbody tr").removeClass("row_for_delete");
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
                                console.log(data);
                                var dtm = data[0];
                                pnlNuevo.find("input").val("");
                                pnlNuevo.find("select").val("").trigger('change');
                                pnlNuevo.find("#ID").val(dtm.ID);
                                pnlNuevo.find("#Estilo").val(dtm.Estilo).trigger('change');
                                pnlNuevo.find("#Combinacion").val(dtm.Combinacion).trigger('change');
                                pnlTablero.addClass("d-none");
                                pnlNuevo.removeClass('d-none');
                                $.each(pnlNuevo.find("select"), function (k, v) {
                                    pnlNuevo.find("select")[k].selectize.clear(true);
                                });
                                $.each(data[0], function (k, v) {
                                    pnlNuevo.find("[name='" + k + "']").val(v);
                                    if (pnlNuevo.find("[name='" + k + "']").is('select')) {
                                        pnlNuevo.find("[name='" + k + "']")[0].selectize.setValue(v);
                                    }
                                });
                                /*OBTENER LOS MATERIALES AGREGADOS*/
                                getPiezasYMaterialesDetalleByID(dtm.ID);
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
                // Apply the search
                tblSelected.columns().every(function () {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
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

    function getMaterialesRequeridos(Descripcion) {

        if (Descripcion !== '' && Descripcion !== undefined && Descripcion !== null) {
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            $.ajax({
                url: master_url + 'getMaterialesRequeridos',
                type: "POST",
                dataType: "JSON",
                data: {
                    Descripcion: Descripcion
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
            pnlNuevo.find("#tblMaterialesRequeridos > tbody").html("");
            tblMaterialesRequeridos = pnlNuevo.find("#tblMaterialesRequeridos").DataTable(tblInicial);
        } else {
            tblMaterialesRequeridos = pnlNuevo.find("#tblMaterialesRequeridos").DataTable(tblInicial);
        }

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
                    v.Tipo,
                    v.Importe]).draw(false);
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

        pnlNuevo.find('#tblMaterialesRequeridos tbody').on('dblclick', 'tr', function () {
            pnlNuevo.find("#tblMaterialesRequeridos tbody tr").removeClass("success");
            $(this).addClass("success");
            /*EDITOR DE CONSUMO*/
            Consumo_temporal = 0;
            var cells = $(this).find("td");
            $.each(pnlNuevo.find('#tblMaterialesRequeridos > tbody > tr'), function () {
                var cell = $(this).find("td").eq(4);
                var rcantidad = cell.text() !== '' ? cell.text() : cell.find("#CeldaConsumo").val();
                cell.html('<strong><span class="text-danger">' + rcantidad + '</span></strong>');
            });
            var cells = $(this).find("td");
            var cell = cells.eq(4);
            cell.html('<input type="text" class="form-control form-control-sm numbersOnly" style="width: 45px;" maxlength="3" id="CeldaConsumo" value="' + cell.text() + '">');
            cell.find("#CeldaConsumo").focusout(function () {
                cell.html($(this).val());
                var precio = parseFloat(getNumber(cells.eq(3).text()));
                cells.eq(6).html('<strong><span class="text-success">$' + $.number((parseFloat($(this).val()) * precio), 2, '.', ',') + '</span></strong>');
                onCalcularSuperTotalAlEditar();
            });

//            var Consumo = (cells.eq(4).text().replace(/\s+/g, '') !== '' && parseFloat(cells.eq(4).text().replace(/\s+/g, '')) > 0) ? parseFloat(cells.eq(4).text().replace(/\s+/g, '')) : '1';
//            cells.eq(4).html('<input type="number" id="CeldaConsumo" name="CeldaConsumo" class="form-control form-control-sm">');

            Consumo_temporal = getNumberFloat(cells.eq(4).find("#CeldaConsumo").val());
//            cells.eq(4).find("#CeldaConsumo").val(Consumo);
//
//            cells.eq(4).find("#CeldaConsumo").focus();
            cells.eq(4).find("#CeldaConsumo").keyup(function (e) {
                var code = e.which; // recommended to use e.which, it's normalized across browsers
                if (code === 13) {
                    if (cells.eq(4).find("#CeldaConsumo").val() !== '' && parseFloat(cells.eq(4).find("#CeldaConsumo").val()) > 0) {
                        var Precio = getNumberFloat(cells.eq(3).text());
                        var Consumo = getNumberFloat(cells.eq(4).find("#CeldaConsumo").val());
                        cells.eq(6).html('<strong><span class="text-success">$' + $.number(Precio * Consumo, 2, '.', ',') + '</span></strong>');
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
                cells.eq(6).html('<strong><span class="text-success">$' + $.number(Precio * Consumo, 2, '.', ',') + '</span></strong>');

                /*CALCULAR SUPER TOTAL*/
                onCalcularSuperTotalAlEditar();
                /*FIN CALCULAR SUPER TOTAL*/
            });
            cell.find("#CeldaConsumo").focus();
//            cells.eq(4).find("#CeldaConsumo").focusout(function () {
//                if (cells.eq(4).find("#CeldaConsumo").val() !== '' && parseFloat(cells.eq(4).find("#CeldaConsumo").val()) > 0) {
//                    onRemoverEditoresInactivos();
//                } else {
//                    cells.eq(4).html('<strong><span class="text-danger">' + Consumo_temporal + '</span></strong>');
//                }
//                onCalcularSuperTotalAlEditar();
//            });

            /*FIN EDITOR DE CONSUMO*/
        });
        // Apply the search
        tblMaterialesRequeridos.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
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

    function getCombinaciones() {
        $.getJSON(master_url + 'getCombinaciones').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlNuevo.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
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

    /*COMPRUEBA SI EL ESTILO Y LA COMBINACION YA HAN SIDO REGISTRADOS*/
    var guardar = false;
    function onComprobarEstiloXCombinacion(ID, Estilo, Combinacion) {

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
        $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
            sub = getNumberFloat($(this).find("td").eq(6).text());
            super_total += sub;
        });
        pnlNuevo.find("#SuperTotal").html('<h2 class="text-success"><strong> $' + $.number(super_total, 3, '.', ',') + '</strong></h2>');
        /*FIN CALCULAR SUPER TOTAL*/
    }

</script>