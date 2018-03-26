
<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Piezas Y Materiales</legend>
        <div align="right">
            <button type="button" class="btn btn-dark" id="btnNuevo"><span class="fa fa-plus"></span><br>AGREGAR</button>
            <button type="button" class="btn btn-dark" id="btnRefrescar"><span class="fa fa-refresh"></span><br>REFRESCAR</button>
            <button type="button" class="btn btn-dark" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br>ELIMINAR</button>
        </div>

        <div class="card-block">
            <div id="tblRegistros"></div>
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
                    <legend class="float-left">Nuevo Piezas Y Materiales</legend>
                </div>
                <div  class="col-md-5 text-center"> 
                </div>
                <div class="col-md-3 float-right" align="right">
                    <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                    <button type="button" class="btn btn-dark" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
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

                            <div class="col-sm">
                                <label for="Estilo">Estilo*</label>
                                <select class="form-control form-control-lg" id="Estilo"  name="Estilo">  
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="Combinacion">Combinación*</label>
                                <select class="form-control form-control-lg" id="Combinacion"  name="Combinacion">  
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
                                <select class="form-control form-control-lg" id="Pieza"  name="Pieza">  
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="Material">Material*</label>
                                <div id="MaterialNuevo">
                                    <select class="form-control form-control-lg test" id="Material"  name="Material">  
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm">
                                <label for="Consumo">Consumo*</label>
                                <input type="number" onKeyDown="if (event.keyCode === 13)
                                            triggerNuevoAgregar();" id="Consumo" name="Consumo" class="form-control" min="0">
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
                                            <th class="d-none" scope="col">Pieza ID</th>
                                            <th scope="col">Pieza</th>
                                            <th class="d-none" scope="col">ID</th> 
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

<!--EDITAR--> 
<div class="card border-0  d-none" id="pnlEditar">
    <div class="card-body text-dark">
        <form id="frmEditar"> 
            <div class="row">
                <div class="col-md-4 float-left">
                    <legend class="float-left">Editar Piezas Y Materiales</legend>
                </div>
                <div class="col-md-5 float-right">

                </div>
                <div class="col-md-3 float-right" align="right">
                    <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                    <button type="button" class="btn btn-dark" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
                </div>
            </div>  
            <div class="d-none">
                <input type="text" class="form-control" id="ID" name="ID" required >
            </div>
            <div class="row">
                <div class="col w-100">
                    <br>
                    <div class="card border-dark">
                        <div class="card-header text-center">
                            <strong>DATOS</strong>
                        </div>
                        <div class="card-body row">

                            <div class="col-sm">
                                <label for="EstiloE">Estilo*</label>
                                <select class="form-control form-control-lg" id="EstiloE"  name="EstiloE">  
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="CombinacionE">Combinación*</label>
                                <select class="form-control form-control-lg" id="CombinacionE"  name="CombinacionE">  
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
                            <div id="SuperTotalE" class="col-12 text-center">
                                <h2 class="text-success"><strong>$ 0.0</strong></h2>
                            </div>
                            <div class="col-sm">
                                <label for="PiezaE">Pieza*</label>
                                <select class="form-control form-control-lg" id="PiezaE"  name="PiezaE">  
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="MaterialE">Material*</label>
                                <select class="form-control form-control-lg" id="MaterialE"  name="MaterialE">  
                                </select>
                            </div>

                            <div class="col-sm">
                                <label for="ConsumoE">Consumo*</label>
                                <input type="number" onKeyDown="if (event.keyCode === 13)
                                            triggerEditarAgregar();" id="ConsumoE" name="ConsumoE" class="form-control" >
                            </div>
                            <div class="col-sm">
                                <br> 
                                <button type="button" class="btn btn-secondary" id="btnAgregarMaterialE"><span class="fa fa-plus "></span></button>
                                <button type="button" class="btn btn-secondary" id="btnEliminarMaterialE"><span class="fa fa-trash "></span></button>
                            </div> 
                            <div class="w-100"></div> 
                            <br>
                            <div id="MaterialesRequeridosE" class="col-12 w-100">
                                <table id="tblMaterialesRequeridosE" name="tblMaterialesRequeridosE" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="d-none" scope="col">Pieza ID</th>
                                            <th scope="col">Pieza</th>
                                            <th class="d-none" scope="col">ID</th> 
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
    var pnlEditar = $("#pnlEditar");
    var btnModificar = pnlEditar.find("#btnGuardar");
    var btnCancelarModificar = pnlEditar.find("#btnCancelar");
    var btnRefrescar = $("#btnRefrescar");
    var btnEliminar = $("#btnEliminar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");

    var tblMaterialesRequeridos, tblMaterialesRequeridosE;
    var super_total = 0.0;

    var Estilo = pnlNuevo.find("#Estilo");
    var Combinacion = pnlNuevo.find("#Combinacion");

    var EstiloE = pnlEditar.find("#EstiloE");
    var CombinacionE = pnlEditar.find("#CombinacionE");
    var EsNuevo = true;

    var AgregarRenglonN = pnlNuevo.find("#btnAgregarMaterial");
    var AgregarRenglonE = pnlEditar.find("#btnAgregarMaterialE");

    function triggerNuevoAgregar() {
        AgregarRenglonN.trigger("click");
        $('#Pieza').select2('open');
    }
    function triggerEditarAgregar() {
        AgregarRenglonE.trigger("click");
        $('#PiezaE').select2('open');
    }

    $(document).ready(function () {
        handleEnter();




        $(document).on('keyup', '.select2-search__field', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                getMaterialesRequeridos($(this).val().toUpperCase());
            }
        });

        Estilo.change(function () {
            onComprobarEstiloXCombinacion(0, Estilo, Combinacion);
        });

        Combinacion.change(function () {
            onComprobarEstiloXCombinacion(0, Estilo, Combinacion);
        });

        EstiloE.change(function () {
            onComprobarEstiloXCombinacion(pnlEditar.find("#ID").val(), EstiloE, CombinacionE);
        });

        CombinacionE.change(function () {
            onComprobarEstiloXCombinacion(pnlEditar.find("#ID").val(), EstiloE, CombinacionE);
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

        /*MODIFICAR*/
        btnModificar.click(function () {
            onComprobarEstiloXCombinacion(pnlEditar.find("#ID").val(), EstiloE, CombinacionE);
            if (guardar) {
                $.validator.setDefaults({
                    ignore: []
                });
                pnlEditar.find('#frmEditar').validate({
                    errorClass: 'myErrorClass',
                    errorPlacement: function (error, element) {
                        var elem = $(element);
                        error.insertAfter(element);
                    },
                    rules: {
                        EstiloE: 'required',
                        CombinacionE: 'required'
                    },
                    // The select element, which would otherwise get the class, is hidden from
                    // view.
                    highlight: function (element, errorClass, validClass) {
                        var elem = $(element);
                        if (elem.hasClass("select2-offscreen")) {
                            $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
                        } else {
                            elem.addClass(errorClass);
                        }
                    },

                    //When removing make the same adjustments as when adding
                    unhighlight: function (element, errorClass, validClass) {
                        var elem = $(element);
                        if (elem.hasClass("select2-offscreen")) {
                            $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
                        } else {
                            elem.removeClass(errorClass);
                        }
                    }
                });
                //Regresa si es valido para los select2
                $('select').on('change', function () {
                    $(this).valid();
                });
                //Si es verdadero que hacer

                if (pnlEditar.find('#frmEditar').valid()) {
                    var f = new FormData();
                    f.append('ID', pnlEditar.find("#ID").val());
                    f.append('Estilo', pnlEditar.find("#EstiloE").val());
                    f.append('Combinacion', pnlEditar.find("#CombinacionE").val());
//                f.append('Estatus', pnlEditar.find("#EstatusE option:selected").text());

                    var detalle = [];
                    tblMaterialesRequeridosE.destroy();
                    pnlEditar.find('#tblMaterialesRequeridosE > tbody  > tr').each(function (k, v) {
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
                    console.log('* * * * DETALLE * * *');
                    console.log(detalle);
                    console.log('* * * * FIN DETALLE * * *');
                    f.append('Materiales', JSON.stringify(detalle));
                    $.ajax({
                        url: master_url + 'onModificar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: f
                    }).done(function (data, x, jq) {
                        console.log(data);
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'LOS CAMBIOS SE HAN GUARDADO', 'success');
                        getRecords();
//                        pnlTablero.removeClass("d-none");
//                        pnlEditar.addClass('d-none');
                        onEffect(1);

                        /*OBTENER LOS MATERIALES AGREGADOS*/
                        getPiezasYMaterialesDetalleByID(pnlEditar.find("#ID").val());

                        tblMaterialesRequeridosE.state.clear();
                        tblMaterialesRequeridosE.destroy();
                        tblMaterialesRequeridosE = $('#tblMaterialesRequeridosE').DataTable(tableOptionsDetalleInfinito);
                        tblMaterialesRequeridosE.draw();
                        pnlEditar.find('#tblMaterialesRequeridosE_filter').find('input[type=search]').val('');
                        $('#tblMaterialesRequeridosE_filter input[type=search]').focus();

                        /*FIN OBTENER MATERIALES AGREGADOS*/
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }
            }
        });

        /*GUARDAR*/
        btnGuardar.click(function () {
            onComprobarEstiloXCombinacion(pnlEditar.find("#ID").val(), EstiloE, CombinacionE);
            if (guardar) {
                if (pnlNuevo.find('#tblMaterialesRequeridos > tbody  > tr td.dataTables_empty').length <= 0) {
                    $.validator.setDefaults({
                        ignore: []
                    });
                    $('#frmNuevo').validate({
                        errorClass: 'myErrorClass',
                        errorPlacement: function (error, element) {
                            var elem = $(element);
                            error.insertAfter(element);
                        },
                        rules: {
                            Estilo: 'required',
                            Combinacion: 'required'
                        },
                        // The select element, which would otherwise get the class, is hidden from
                        // view.
                        highlight: function (element, errorClass, validClass) {
                            var elem = $(element);
                            if (elem.hasClass("select2-offscreen")) {
                                $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
                            } else {
                                elem.addClass(errorClass);
                            }
                        },

                        //When removing make the same adjustments as when adding
                        unhighlight: function (element, errorClass, validClass) {
                            var elem = $(element);
                            if (elem.hasClass("select2-offscreen")) {
                                $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
                            } else {
                                elem.removeClass(errorClass);
                            }
                        }
                    });
                    //Regresa si es valido para los select2
                    $('select').on('change', function () {
                        $(this).valid();
                    });
                    //Regresa verdadero si ya se cumplieron las reglas, si no regresa falso
                    //Si es verdadero que hacer
                    if (pnlNuevo.find('#frmNuevo').valid()) {
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

                        $.ajax({
                            url: master_url + 'onAgregar',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: f
                        }).done(function (data, x, jq) {
                            onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AGREGADO UN REGISTRO', 'success');
                            getRecords();
                            pnlTablero.removeClass("d-none");
                            pnlNuevo.addClass('d-none');
                            onEffect(1);
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE AGREGAR MATERIALES A CONSUMIR', 'danger');
                    onEffect(2);
                }
            }
        });

        btnRefrescar.click(function () {
            getRecords();
            getEstilos();
            getCombinaciones();
            getPiezas();
        });

        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlNuevo.removeClass('d-none');
            pnlNuevo.find("input").val("");
            pnlNuevo.find("select").val("").trigger('change');
            $('#Estilo').select2('open').select2('close');
            $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                tblMaterialesRequeridos.row($(this)).remove().draw();
            });
            onEffect(1);
            EsNuevo = true;
        });

        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlNuevo.addClass('d-none');
            onEffect(3);
        });

        btnCancelarModificar.click(function () {
            pnlEditar.addClass("d-none");
            pnlTablero.removeClass("d-none");
        });

        pnlNuevo.find("#btnEliminarMaterial").on('click', function () {
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
                        /*CALCULAR SUPER TOTAL*/
                        super_total = 0.0;
                        $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                            var sub = parseFloat($(this).find("td").eq(8).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
                            super_total += sub;
                        });
                        pnlNuevo.find("#SuperTotal").html('<h2 class="text-success"><strong> $' + $.number(super_total, 3, '.', ',') + '</strong></h2>');
                        /*FIN CALCULAR SUPER TOTAL*/
                        onEffect(1);
                    }
                });
            } else {
                onEffect(2);
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE SELECCIONAR UN REGISTRO', 'danger');
            }
        });

        pnlEditar.find("#btnEliminarMaterialE").on('click', function () {
            var seleccionado = false;
            $.each(pnlEditar.find("#tblMaterialesRequeridosE tbody tr"), function (k, v) {
                if ($(this).hasClass("success")) {
                    seleccionado = true;
                    return false;
                }
            });
            if (seleccionado) {
                $.each(pnlEditar.find("#tblMaterialesRequeridosE tbody tr"), function (k, v) {
                    if ($(this).hasClass("success")) {
                        tblMaterialesRequeridosE.row($(this)).remove().draw();

                        /*CALCULAR SUPER TOTAL*/
                        onCalcularSuperTotalAlEditar();
                        /*FIN CALCULAR SUPER TOTAL*/
                        onEffect(1);
                    }
                });
            } else {
                onEffect(2);
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE SELECCIONAR UN REGISTRO', 'danger');
            }
        });

        pnlNuevo.find("#btnAgregarMaterial").on('click', function () {
            var Consumo = pnlNuevo.find("#Consumo").val();
            var id_selected = pnlNuevo.find("#Pieza").val().replace(/\s+/g, '');
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
                            console.log('**** DTM ****');
                            console.log(dtm);
                            console.log('**** FIN DTM ****');
                            if (data !== null && data.length > 0) {
                                tblMaterialesRequeridos.row.add([
                                    pnlNuevo.find("#Pieza").val(), /*1*/
                                    pnlNuevo.find("#Pieza option:selected").text(), /*2*/
                                    pnlNuevo.find("#Material").val(), /*3*/
                                    pnlNuevo.find("#Material option:selected").text(), /*4*/
                                    '<strong><span class="text-warning">' + dtm.UNIDAD + '</span></strong>', /*5*/
                                    '<strong><span class="text-primary">$' + $.number(dtm.PRECIO, 3, '.', ',') + '</span></strong>', /*5*/
                                    '<strong><span class="text-danger">' + Consumo + '</span></strong>', /*6*/
                                    '<strong><span class="text-info">' + dtm.TIPO + '</span></strong>', /*7*/
                                    '<strong><span class="text-success">$' + $.number((Consumo * parseFloat(dtm.PRECIO)), 3, '.', ',') + '</span></strong>'/*8*/
                                ]).draw(false);

                                onEffect(1);/*OK*/
                                /*REINICIAR VALORES EN ZERO*/
                                pnlNuevo.find("#Consumo").val('');
                                onNotify('<span class="fa fa-check fa-lg"></span>', 'MATERIAL AGREGADO', 'success');
                                /*CALCULAR SUPER TOTAL*/
                                super_total = 0.0;
                                $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                                    var sub = parseFloat($(this).find("td").eq(8).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
                                    $(this).find("td").eq(0).addClass("d-none");
                                    $(this).find("td").eq(2).addClass("d-none");
                                    super_total += sub;
                                });
                                pnlNuevo.find("#SuperTotal").html('<h2 class="text-success"><strong> $' + $.number(super_total, 3, '.', ',') + '</strong></h2>');
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
                        onEffect(2);/*ERROR*/
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'ESTA PIEZA YA FUE AGREGADA', 'danger');
                    }
                } else {
                    onEffect(2);/*ERROR*/
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ESTABLECER UN CONSUMO', 'danger');
                }
            } else {
                onEffect(2);/*ERROR*/
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE SELECCIONAR UN MATERIAL', 'danger');
            }
        });

        pnlEditar.find("#btnAgregarMaterialE").on('click', function () {
            var Consumo = pnlEditar.find("#ConsumoE").val();
            var id_selected = pnlEditar.find("#PiezaE").val().replace(/\s+/g, '');
            if (id_selected !== '') {
                if (parseFloat(Consumo) > 0 && id_selected !== '') {
                    /*COMPROBAR SI YA FUE AGREGADO*/
                    var agregado = false;
                    $.each(pnlEditar.find("#tblMaterialesRequeridosE tbody tr"), function (k, v) {
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
                        $.getJSON(master_url + 'getUnidadPrecioTipoXMaterialID', {ID: pnlEditar.find("#MaterialE").val()}).done(function (data, x, jq) {
                            var dtm = data[0];
                            console.log('**** DTM ****');
                            console.log(dtm);
                            console.log('**** FIN DTM ****');
                            if (data !== null && data.length > 0) {
                                tblMaterialesRequeridosE.row.add([
                                    pnlEditar.find("#PiezaE").val(), /*1*/
                                    pnlEditar.find("#PiezaE option:selected").text(), /*2*/
                                    pnlEditar.find("#MaterialE").val(), /*3*/
                                    pnlEditar.find("#MaterialE option:selected").text(), /*4*/
                                    '<strong><span class="text-warning">' + dtm.UNIDAD + '</span></strong>', /*5*/
                                    '<strong><span class="text-primary">$' + $.number(dtm.PRECIO, 3, '.', ',') + '</span></strong>', /*5*/
                                    '<strong><span class="text-danger">' + Consumo + '</span></strong>', /*6*/
                                    '<strong><span class="text-info">' + dtm.TIPO + '</span></strong>', /*7*/
                                    '<strong><span class="text-success">$' + $.number((Consumo * parseFloat(dtm.PRECIO)), 3, '.', ',') + '</span></strong>'/*8*/
                                ]).draw(false);
                                onEffect(1);/*OK*/
                                /*REINICIAR VALORES EN ZERO*/
                                pnlEditar.find("#ConsumoE").val('');
                                pnlEditar.find("#tblMaterialesRequeridosE tbody tr").removeClass("selected_row");
                                onNotify('<span class="fa fa-check fa-lg"></span>', 'MATERIAL AGREGADO', 'success');
                                /*CALCULAR SUPER TOTAL*/
                                super_total = 0.0;
                                $.each(pnlEditar.find("#tblMaterialesRequeridosE tbody tr"), function (k, v) {
                                    var sub = parseFloat($(this).find("td").eq(8).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
                                    $(this).find("td").eq(0).addClass("d-none");
                                    $(this).find("td").eq(2).addClass("d-none");
                                    super_total += sub;
                                });
                                pnlEditar.find("#SuperTotalE").html('<h2 class="text-success"><strong> $' + $.number(super_total, 3, '.', ',') + '</strong></h2>');
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
                        onEffect(2);/*ERROR*/
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'ESTA PIEZA YA FUE AGREGADA', 'danger');
                    }
                } else {
                    onEffect(2);/*ERROR*/
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ESTABLECER UN CONSUMO', 'danger');
                }
            } else {
                onEffect(2);/*ERROR*/
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE SELECCIONAR UN MATERIAL', 'danger');
            }
        });

        /*CALLS*/
        btnRefrescar.trigger('click');
        tblMaterialesRequeridos = pnlNuevo.find("#tblMaterialesRequeridos").DataTable(tableOptionsDetalleInfinito);
        tblMaterialesRequeridosE = pnlEditar.find("#tblMaterialesRequeridosE").DataTable(tableOptionsDetalleInfinito);

        pnlNuevo.find('#tblMaterialesRequeridos tbody').on('click', 'tr', function () {
            pnlNuevo.find("#tblMaterialesRequeridos tbody tr").removeClass("success");
            pnlNuevo.find("#tblMaterialesRequeridos tbody tr").removeClass("row_for_delete");
            $(this).addClass("success");
            $(this).addClass("row_for_delete");
        });
    });

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
                                pnlEditar.find("input").val("");
                                pnlEditar.find("select").val("").trigger('change');
                                pnlEditar.find("#ID").val(dtm.ID);
                                pnlEditar.find("#EstiloE").val(dtm.Estilo).trigger('change');
                                pnlEditar.find("#CombinacionE").val(dtm.Combinacion).trigger('change');
                                pnlTablero.addClass("d-none");
                                pnlEditar.removeClass('d-none');

                                $('#EstiloE').select2('open').select2('close');
                                /*OBTENER LOS MATERIALES AGREGADOS*/
                                getPiezasYMaterialesDetalleByID(dtm.ID);
                                /*FIN OBTENER MATERIALES AGREGADOS*/
                                onEffect(1);
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
                var options = '<option></option>';
                $.each(data, function (k, v) {
                    options += '<option value="' + v.ID + '">' + v.Material + '</option>';
                });

                if (EsNuevo) {
                    pnlNuevo.find("#Material").select2("destroy");
                    pnlNuevo.find("#Material").select2({
                        placeholder: "SELECCIONE UNA OPCIÓN",
                        allowClear: true
                    });
                    pnlNuevo.find("#Material").html(options);
                    pnlNuevo.find("#Material").select2('open');


                } else {
                    pnlEditar.find("#MaterialE").select2("destroy");
                    pnlEditar.find("#MaterialE").select2({
                        placeholder: "SELECCIONE UNA OPCIÓN",
                        allowClear: true
                    });
                    pnlEditar.find("#MaterialE").html(options);
                    pnlEditar.find("#MaterialE").select2('open');

                }



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
        $.ajax({
            url: master_url + 'getPiezasYMaterialesDetalleByID',
            type: "POST",
            dataType: "JSON",
            data: {
                ID: IDX
            }
        }).done(function (data, x, jq) {
            console.log('* * * MAT AGREGADOS * * *');
            console.log(data);
            if (data.length > 0) {
                $("#MaterialesRequeridosE").html(getTable('tblMaterialesRequeridosE', data));

                $('#tblMaterialesRequeridosE tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblMaterialesRequeridosE thead th');
                var tfoot = $('#tblMaterialesRequeridosE tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(2).addClass("d-none");
                tfoot.eq(2).addClass("d-none");
                $.each($.find('#tblMaterialesRequeridosE tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(2).addClass("d-none");
                });

                tblMaterialesRequeridosE.state.clear();
                tblMaterialesRequeridosE.destroy();
                tblMaterialesRequeridosE = $('#tblMaterialesRequeridosE').DataTable(tableOptionsDetalleInfinito);
                tblMaterialesRequeridosE.draw();
                pnlEditar.find('#tblMaterialesRequeridosE_filter').find('input[type=search]').val('');
                $('#tblMaterialesRequeridosE_filter input[type=search]').focus();

                $('#tblMaterialesRequeridosE tbody').on('click', 'tr', function () {
                    pnlEditar.find("#tblMaterialesRequeridosE tbody tr").removeClass("success");
                    $(this).addClass("success");
                    $(this).addClass("row_for_delete");

                    /*REMOVER EDITORES EN OTRAS CELDAS*/
                    onRemoverEditoresInactivos();
                    /*FIN REMOVER EDITORES EN OTRAS CELDAS*/
                });


                $('#tblMaterialesRequeridosE tbody').on('dblclick', 'tr', function () {
                    pnlEditar.find("#tblMaterialesRequeridosE tbody tr").removeClass("success");
                    $(this).addClass("success");
                    /*EDITOR DE CONSUMO*/
                    Consumo_temporal = 0;
                    var cells = $(this).find("td");
                    var Consumo = (cells.eq(6).text().replace(/\s+/g, '') !== '' && parseFloat(cells.eq(6).text().replace(/\s+/g, '')) > 0) ? parseFloat(cells.eq(6).text().replace(/\s+/g, '')) : '1';
                    cells.eq(6).html('<input type="number" id="CeldaConsumo" name="CeldaConsumo" class="form-control">');
                    Consumo_temporal = Consumo;
                    cells.eq(6).find("#CeldaConsumo").val(Consumo);
                    onEffect(1);
                    cells.eq(6).find("#CeldaConsumo").focus();
                    cells.eq(6).find("#CeldaConsumo").keyup(function (e) {
                        var code = e.which; // recommended to use e.which, it's normalized across browsers
                        if (code === 13) {
                            if (cells.eq(6).find("#CeldaConsumo").val() !== '' && parseFloat(cells.eq(6).find("#CeldaConsumo").val()) > 0) {
                                var Precio = getNumberFloat(cells.eq(5).text());
                                var Consumo = getNumberFloat(cells.eq(6).find("#CeldaConsumo").val());
                                cells.eq(8).html('<strong><span class="text-success">$' + $.number(Precio * Consumo, 2, '.', ',') + '</span></strong>');
                                onRemoverEditoresInactivos();
                            } else {
                                onEffect(2);
                                cells.eq(6).html('<strong><span class="text-danger">' + Consumo_temporal + '</span></strong>');
                            }
                        }
                    });
                    cells.eq(6).find("#CeldaConsumo").change(function () {
                        var Precio = getNumberFloat(cells.eq(5).text());
                        var Consumo = getNumberFloat(cells.eq(6).find("#CeldaConsumo").val());
                        cells.eq(8).html('<strong><span class="text-success">$' + $.number(Precio * Consumo, 2, '.', ',') + '</span></strong>');

                        /*CALCULAR SUPER TOTAL*/
                        onCalcularSuperTotalAlEditar();
                        /*FIN CALCULAR SUPER TOTAL*/
                    });
                    cells.eq(6).find("#CeldaConsumo").focusout(function () {
                        if (cells.eq(6).find("#CeldaConsumo").val() !== '' && parseFloat(cells.eq(6).find("#CeldaConsumo").val()) > 0) {
                            onRemoverEditoresInactivos();
                        } else {
                            onEffect(2);
                            cells.eq(6).html('<strong><span class="text-danger">' + Consumo_temporal + '</span></strong>');
                        }
                    });

                    /*FIN EDITOR DE CONSUMO*/
                });
                // Apply the search
                tblMaterialesRequeridosE.columns().every(function () {
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
            onCalcularSuperTotalAlEditar();
        });
    }

    function getEstilos() {
        $.getJSON(master_url + 'getEstilos').done(function (data, x, jq) {

            var options = '<option></option>';
            $.each(data, function (k, v) {
                options += '<option value="' + v.ID + '">' + v.Descripcion + '</option>';
            });
            pnlNuevo.find("#Estilo").html(options);
            pnlEditar.find("#EstiloE").html(options);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getCombinaciones() {
        $.getJSON(master_url + 'getCombinaciones').done(function (data, x, jq) {

            var options = '<option></option>';
            $.each(data, function (k, v) {
                options += '<option value="' + v.ID + '">' + v.Descripcion + '</option>';
            });
            pnlNuevo.find("#Combinacion").html(options);
            pnlEditar.find("#CombinacionE").html(options);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getPiezas() {
        $.getJSON(master_url + 'getPiezas').done(function (data, x, jq) {

            var options = '<option></option>';
            $.each(data, function (k, v) {
                options += '<option value="' + v.ID + '">' + v.Descripcion + '</option>';
            });
            pnlNuevo.find("#Pieza").html(options);
            pnlEditar.find("#PiezaE").html(options);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    /*COMPRUEBA SI EL ESTILO Y LA COMBINACION YA HAN SIDO REGISTRADOS*/
    var guardar = false;
    function onComprobarEstiloXCombinacion(ID, Estilo, Combinacion) {
        if (Estilo.val() !== '' && Combinacion.val() !== '') {
            $.getJSON(master_url + 'onComprobarEstiloXCombinacion', {ID: ID, E: Estilo.val(), C: Combinacion.val()}).done(function (data, x, jq) {
                if (parseInt(data[0].EXISTE) > 0) {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL ESTILO Y LA COMBINACIÓN YA EXISTEN', 'danger');
                    if (ID === 0) {
                        Estilo.val("").trigger('change');
                        Combinacion.val("").trigger('change');
                    }
                    onEffect(2);
                    guardar = false;
                } else {
                    onEffect(4);
                    guardar = true;
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();

            });
        }
    }
    function onRemoverEditoresInactivos() {
        /*REMOVER EDITORES EN OTRAS CELDAS*/
        $.each($.find('#tblMaterialesRequeridosE tbody tr'), function (k, v) {
            var subcells = $(this).find("td");
            var SubConsumo = (subcells.eq(6).text().replace(/\s+/g, '') !== '' &&
                    parseFloat(subcells.eq(6).text().replace(/\s+/g, '')) > 0) ? subcells.eq(6).text() : subcells.eq(6).find("#CeldaConsumo").val();
            subcells.eq(6).html('<strong><span class="text-danger">' + SubConsumo + '</span></strong>');
        });
        /*FIN REMOVER EDITORES EN OTRAS CELDAS*/
    }

    function onCalcularSuperTotalAlEditar() {
        /*CALCULAR SUPER TOTAL*/
        super_total = 0.0;
        $.each(pnlEditar.find("#tblMaterialesRequeridosE tbody tr"), function (k, v) {

            var sub = parseFloat($(this).find("td").eq(8).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
            super_total += sub;
        });
        pnlEditar.find("#SuperTotalE").html('<h2 class="text-success"><strong> $' + $.number(super_total, 3, '.', ',') + '</strong></h2>');
        /*FIN CALCULAR SUPER TOTAL*/
    }

    function onEffect(e) {
        /*
         * 1 - CLIP
         * 2 - ERROR
         * 3 - BAD ERROR
         * 
         */
        var audio = new Audio('<?php print base_url(); ?>media/' + e + '.mp3');
        audio.play();
    }
</script>