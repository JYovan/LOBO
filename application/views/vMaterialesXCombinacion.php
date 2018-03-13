
<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Materiales Por Combinación</legend>
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
<div id="" class="container-fluid">
    <div class="card border-0  d-none" id="pnlNuevo">
        <div class="card-body text-dark">
            <form id="frmNuevo"> 
                <div class="row">
                    <div class="col-md-4 float-left">
                        <legend class="float-left">Nuevo Material Por Combinación</legend>
                    </div>
                    <div  class="col-md-5 text-center"> 
                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                        <button type="button" class="btn btn-dark" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
                    </div>
                </div>
                <div class="row">
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
                    <div class="w-100"></div>
                    <br>
                    <div class="col w-100">
                        <div class="card border-success">
                            <div class="card-header text-center">
                                <strong>DETALLE</strong>
                            </div>
                            <div class="card-body row"> 
                                <div id="SuperTotal" class="col-12 text-center">
                                    <h1 class="text-success"><strong>$ 0.0</strong></h1>
                                </div>
                                <div class="col-6">
                                    <label for="Consumo">Consumo*</label>
                                    <input type="number" id="Consumo" name="Consumo" class="form-control" min="0">
                                </div>
                                <div class="col-6">
                                    <label for="Tipo">Tipo*</label>
                                    <select class="form-control form-control-lg" id="Tipo"  name="Tipo">  
                                        <option value="DIR">DIR</option>
                                        <option value="IND">IND</option>
                                    </select>
                                </div> 
                                <div class="w-100"></div> 
                                <br>
                                <div id="Materiales" class="col-5 fixed">
                                </div>
                                <div class="col-1"><br>
                                    <button type="button" class="btn btn-dark" id="btnAgregarMaterial"><span class="fa fa-arrow-right"></span></button>
                                    <div class="w-100"></div>
                                    <br>
                                    <button type="button" class="btn btn-dark" id="btnRefrescarMateriales" onclick="getMaterialesRequeridos()"><span class="fa fa-refresh"></span></button>
                                    <div class="w-100"></div>
                                    <br>
                                    <button type="button" class="btn btn-dark" id="btnEliminarMaterial"><span class="fa fa-minus"></span></button>
                                </div> 
                                <div id="MaterialesRequeridos" class="col-6">
                                    <table id="tblMaterialesRequeridos" name="tblMaterialesRequeridos" class="table table-hover">
                                        <thead>
                                            <tr>
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
</div>

<!--EDITAR--> 
<div id="" class="container-fluid">
    <div class="card border-0  d-none" id="pnlEditar">
        <div class="card-body text-dark">
            <form id="frmEditar"> 
                <div class="row">
                    <div class="col-md-4 float-left">
                        <legend class="float-left">Editar Material Por Combinación</legend>
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
                    <div class="col-sm">
                        <label for="Estilo">Estilo*</label>
                        <select class="form-control form-control-lg" id="EstiloE"  name="EstiloE">  
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="Combinacion">Combinación*</label>
                        <select class="form-control form-control-lg" id="CombinacionE"  name="CombinacionE">  
                        </select>
                    </div>
                    <div class="w-100"></div>
                    <br>
                    <div class="col w-100">
                        <div class="card border-success">
                            <div class="card-header text-center">
                                <strong>DETALLE</strong>
                            </div>
                            <div class="card-body row"> 
                                <div id="SuperTotalE" class="col-12 text-center">
                                    <h1 class="text-success"><strong>$ 0.0</strong></h1>
                                </div>
                                <div class="col-6">
                                    <label for="Consumo">Consumo*</label>
                                    <input type="number" id="ConsumoE" name="ConsumoE" class="form-control" min="0">
                                </div>
                                <div class="col-6">
                                    <label for="Tipo">Tipo*</label>
                                    <select class="form-control form-control-lg" id="TipoE"  name="TipoE">  
                                        <option value="DIR">DIR</option>
                                        <option value="IND">IND</option>
                                    </select>
                                </div> 
                                <div class="w-100"></div> 
                                <br>
                                <div id="MaterialesE" class="col-5">
                                </div>
                                <div class="col-1"><br>
                                    <button type="button" class="btn btn-dark" id="btnAgregarMaterialE"><span class="fa fa-arrow-right"></span></button>
                                    <div class="w-100"></div>
                                    <br>
                                    <button type="button" class="btn btn-dark" id="btnRefrescarMaterialesE" onclick="getMaterialesRequeridosE()"><span class="fa fa-refresh"></span></button>
                                    <div class="w-100"></div>
                                    <br>
                                    <button type="button" class="btn btn-dark" id="btnEliminarMaterialE"><span class="fa fa-minus"></span></button>
                                </div> 
                                <div id="MaterialesRequeridosE" class="col-6">
                                    <table id="tblMaterialesRequeridosE" name="tblMaterialesRequeridosE" class="table table-hover">
                                        <thead>
                                            <tr>
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
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/MaterialesXCombinacion/';
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
    $(document).ready(function () {
        handleEnter();
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
                    pnlEditar.addClass("d-none");
                    pnlTablero.removeClass("d-none");
                    btnRefrescar.trigger('click');
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });
        btnModificar.click(function () {
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
                pnlEditar.find('#tblMaterialesRequeridosE > tbody  > tr').each(function (k, v) {
                    var row = $(this).find("td");
                    var material = {
                        Material: row.eq(0).text().replace(/\s+/g, ''),
                        Precio: row.eq(3).text().replace(/\s+/g, ''),
                        Consumo: row.eq(4).text().replace(/\s+/g, ''),
                        Tipo: (row.eq(5).text().replace(/\s+/g, '') === 'DIR') ? 1 : 2
                    };
                    detalle.push(material);
                });
                f.append('Materiales', JSON.stringify(detalle));
                $.ajax({
                    url: master_url + 'onModificar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: f
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL MATERIAL POR COMBINACIÓN', 'success');
                    getRecords();
                    pnlTablero.removeClass("d-none");
                    pnlEditar.addClass('d-none');
                    onEffect(1);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });

        btnGuardar.click(function () {
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
                pnlNuevo.find('#tblMaterialesRequeridos > tbody  > tr').each(function (k, v) {
                    var row = $(this).find("td");
                    var material = {
                        Material: row.eq(0).text().replace(/\s+/g, ''),
                        Precio: row.eq(3).text().replace(/\s+/g, ''),
                        Consumo: row.eq(4).text().replace(/\s+/g, ''),
                        Tipo: (row.eq(5).text().replace(/\s+/g, '') === 'DIR') ? 1 : 2
                    };
                    detalle.push(material);
                });
                f.append('Materiales', JSON.stringify(detalle));
                $.ajax({
                    url: master_url + 'onAgregar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: f
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO MATERIAL POR COMBINACIÓN', 'success');
                    getRecords();
                    pnlTablero.removeClass("d-none");
                    pnlNuevo.addClass('d-none');
                    console.log(data, x, jq);
                    onEffect(1);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
        btnRefrescar.click(function () {
            getRecords();
            getMaterialesRequeridos();
            getEstilos();
            getCombinaciones();
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlNuevo.removeClass('d-none');
            pnlNuevo.find("input").val("");
            pnlNuevo.find("select").val("").trigger('change');
            $('#Estilo').select2('open').select2('close');
            getMaterialesRequeridos();
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlNuevo.addClass('d-none');
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
                            var sub = parseFloat($(this).find("td").eq(6).text());
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
                        super_total = 0.0;
                        $.each(pnlEditar.find("#tblMaterialesRequeridosE tbody tr"), function (k, v) {
                            var sub = parseFloat($(this).find("td").eq(6).text());
                            super_total += sub;
                        });
                        pnlEditar.find("#SuperTotalE").html('<h2 class="text-success"><strong> $' + $.number(super_total, 3, '.', ',') + '</strong></h2>');
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
            var Tipo = pnlNuevo.find("#Tipo option:selected").text().replace(/\s+/g, '');
            var sub_row = pnlNuevo.find("#tblMateriales tbody tr.selected_row td");
            var id_selected = sub_row.eq(0).text().replace(/\s+/g, '');
            if (id_selected !== '') {
                if (parseFloat(Consumo) > 0 && Tipo !== '' && id_selected !== '') {
                    console.log(pnlNuevo.find("#tblMateriales tbody tr.selected_row td"));
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
                        var Precio = parseFloat(sub_row.eq(4).text());
                        tblMaterialesRequeridos.row.add([
                            sub_row.eq(0).text(),
                            sub_row.eq(1).text(),
                            sub_row.eq(3).text(),
                            '<strong><span class="text-primary">' + Precio + '</span></strong>',
                            '<strong><span class="text-danger">' + Consumo + '</span></strong>',
                            '<strong><span class="text-info">' + Tipo + '</span></strong>',
                            '<strong><span class="text-success">' + (Consumo * Precio) + '</span></strong>'
                        ]).draw(false);
                        onEffect(1);/*OK*/
                        /*REINICIAR VALORES EN ZERO*/
                        pnlNuevo.find("#Consumo").val('');
                        pnlNuevo.find("#Tipo").val("").trigger('change');
                        pnlNuevo.find("#tblMaterialesRequeridos tbody tr").removeClass("selected_row");
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'MATERIAL AGREGADO', 'success');
                        /*CALCULAR SUPER TOTAL*/
                        super_total = 0.0;
                        $.each(pnlNuevo.find("#tblMaterialesRequeridos tbody tr"), function (k, v) {
                            var sub = parseFloat($(this).find("td").eq(6).text());
                            super_total += sub;
                        });
                        pnlNuevo.find("#SuperTotal").html('<h2 class="text-success"><strong> $' + $.number(super_total, 3, '.', ',') + '</strong></h2>');
                        /*FIN CALCULAR SUPER TOTAL*/

                    } else {
                        onEffect(2);/*ERROR*/
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'ESTE MATERIAL YA FUE AGREGADO', 'danger');
                    }
                } else {
                    onEffect(2);/*ERROR*/
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ESTABLECER UN CONSUMO Y UN TIPO', 'danger');
                }
            } else {
                onEffect(2);/*ERROR*/
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE SELECCIONAR UN MATERIAL', 'danger');
            }
        });

        pnlEditar.find("#btnAgregarMaterialE").on('click', function () {
            var Consumo = pnlEditar.find("#ConsumoE").val();
            var Tipo = pnlEditar.find("#TipoE option:selected").text().replace(/\s+/g, '');
            var sub_row = pnlEditar.find("#tblMaterialesE tbody tr.selected_row td");
            var id_selected = sub_row.eq(0).text().replace(/\s+/g, '');
            if (id_selected !== '') {
                if (parseFloat(Consumo) > 0 && Tipo !== '' && id_selected !== '') {
                    console.log(pnlEditar.find("#tblMaterialesE tbody tr.selected_row td"));
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
                        var Precio = parseFloat(sub_row.eq(4).text());
                        tblMaterialesRequeridosE.row.add([
                            sub_row.eq(0).text(),
                            sub_row.eq(1).text(),
                            sub_row.eq(3).text(),
                            '<strong><span class="text-primary">' + Precio + '</span></strong>',
                            '<strong><span class="text-danger">' + Consumo + '</span></strong>',
                            '<strong><span class="text-info">' + Tipo + '</span></strong>',
                            '<strong><span class="text-success">' + (Consumo * Precio) + '</span></strong>'
                        ]).draw(false);
                        onEffect(1);/*OK*/
                        /*REINICIAR VALORES EN ZERO*/
                        pnlEditar.find("#ConsumoE").val('');
                        pnlEditar.find("#TipoE").val("").trigger('change');
                        pnlEditar.find("#tblMaterialesRequeridosE tbody tr").removeClass("selected_row");
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'MATERIAL AGREGADO', 'success');
                        /*CALCULAR SUPER TOTAL*/
                        super_total = 0.0;
                        $.each(pnlEditar.find("#tblMaterialesRequeridosE tbody tr"), function (k, v) {
                            var sub = parseFloat($(this).find("td").eq(6).text());
                            super_total += sub;
                        });
                        pnlEditar.find("#SuperTotalE").html('<h2 class="text-success"><strong> $' + $.number(super_total, 3, '.', ',') + '</strong></h2>');
                        /*FIN CALCULAR SUPER TOTAL*/

                    } else {
                        onEffect(2);/*ERROR*/
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'ESTE MATERIAL YA FUE AGREGADO', 'danger');
                    }
                } else {
                    onEffect(2);/*ERROR*/
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ESTABLECER UN CONSUMO Y UN TIPO', 'danger');
                }
            } else {
                onEffect(2);/*ERROR*/
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE SELECCIONAR UN MATERIAL', 'danger');
            }
        });

        /*CALLS*/
        btnRefrescar.trigger('click');
        tblMaterialesRequeridos = pnlNuevo.find("#tblMaterialesRequeridos").DataTable(tableOptionsMiniTables);
        tblMaterialesRequeridosE = pnlEditar.find("#tblMaterialesRequeridosE").DataTable(tableOptionsMiniTables);

        pnlNuevo.find('#tblMaterialesRequeridos tbody').on('click', 'tr', function () {
            pnlNuevo.find("#tblMaterialesRequeridos tbody tr").removeClass("success");
            pnlNuevo.find("#tblMaterialesRequeridos tbody tr").removeClass("row_for_delete");
            $(this).addClass("success");
            $(this).addClass("row_for_delete");
        });
    });
    var tblMaterialesRequeridos, tblMaterialesRequeridosE;
    var super_total = 0.0;
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
                $("#tblRegistros").html(getTable('tblMaterialesXCombinacion', data));

                $('#tblMaterialesXCombinacion tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblMaterialesXCombinacion thead th');
                var tfoot = $('#tblMaterialesXCombinacion tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblMaterialesXCombinacion tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });

                var tblSelected = $('#tblMaterialesXCombinacion').DataTable(tableOptions);
                $('#tblMaterialesXCombinacion_filter input[type=search]').focus();

                $('#tblMaterialesXCombinacion tbody').on('click', 'tr', function () {

                    $("#tblMaterialesXCombinacion tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });

                $('#tblMaterialesXCombinacion tbody').on('dblclick', 'tr', function () {
                    $("#tblMaterialesXCombinacion tbody tr").removeClass("success");
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
                            url: master_url + 'getMaterialesXCombinacionByID',
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
                                pnlEditar.find("#EstiloE").val(dtm.ESTILO).trigger('change');
                                pnlEditar.find("#CombinacionE").val(dtm.COMBINACION).trigger('change');
                                pnlTablero.addClass("d-none");
                                pnlEditar.removeClass('d-none');

                                $('#EstiloE').select2('open').select2('close');
                                getMaterialesRequeridosE();
                                /*OBTENER LOS MATERIALES AGREGADOS*/
                                getMaterialesXCombinacionDetalleByID(dtm.ID);
                                /*FIN OBTENER MATERIALES AGREGADOS*/
                                onEffect(1);
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

    function getMaterialesRequeridos() {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getMaterialesRequeridos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $("#Materiales").html(getTable('tblMateriales', data));

                $('#tblMateriales tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblMateriales thead th');
                var tfoot = $('#tblMateriales tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblMateriales tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });

                var tblSelected = $('#tblMateriales').DataTable(tableOptionsMiniTables);

                $('#tblMateriales tbody').on('click', 'tr', function () {

                    $("#tblMateriales tbody tr").removeClass("success");
                    $("#tblMateriales tbody tr").removeClass("selected_row");
                    $(this).addClass("success selected_row");
                    var dtm = tblSelected.row(this).data();

                    temp = parseInt(dtm[0]);
                });
                

                $('#tblMateriales_filter input[type=search]').focus();

                $('#tblMateriales tbody').on('click', 'tr', function () {

                    $("#tblMateriales tbody tr").removeClass("success");
                    $("#tblMateriales tbody tr").removeClass("selected_row");
                    $(this).addClass("success selected_row");
                    var dtm = tblSelected.row(this).data();

                    temp = parseInt(dtm[0]);
                });

                $('#tblMateriales tbody').on('dblclick', 'tr', function () {
                    $("#tblMateriales tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    if (index === -1) {
                        selected.push(id);
                    } else {
                        selected.splice(index, 1);
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

    function getMaterialesRequeridosE() {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getMaterialesRequeridos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                $("#MaterialesE").html(getTable('tblMaterialesE', data));

                $('#tblMaterialesE tfoot th').each(function () {
                    $(this).html('');
                });

                var thead = $('#tblMaterialesE thead th');
                var tfoot = $('#tblMaterialesE tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblMaterialesE tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });

                var tblSelected = $('#tblMaterialesE').DataTable(tableOptionsMiniTables);
                $('#tblMaterialesE_filter input[type=search]').focus();

                $('#tblMaterialesE tbody').on('click', 'tr', function () {

                    $("#tblMaterialesE tbody tr").removeClass("success");
                    $("#tblMaterialesE tbody tr").removeClass("selected_row");
                    $(this).addClass("success selected_row");
                    var dtm = tblSelected.row(this).data();

                    temp = parseInt(dtm[0]);
                });

                $('#tblMaterialesE tbody').on('dblclick', 'tr', function () {
                    $("#tblMaterialesE tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var id = this.id;
                    var index = $.inArray(id, selected);
                    if (index === -1) {
                        selected.push(id);
                    } else {
                        selected.splice(index, 1);
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


    function getMaterialesXCombinacionDetalleByID(IDX) {
        temp = 0;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getMaterialesXCombinacionDetalleByID',
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
                $.each($.find('#tblMaterialesRequeridosE tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });


                tblMaterialesRequeridosE = $('#tblMaterialesRequeridosE').DataTable(tableOptionsMiniTables);
                $('#tblMaterialesRequeridosE_filter input[type=search]').focus();

                $('#tblMaterialesRequeridosE tbody').on('click', 'tr', function () {
                    pnlEditar.find("#tblMaterialesRequeridosE tbody tr").removeClass("success");
                    $(this).addClass("success");
                    $(this).addClass("row_for_delete");
                });


                $('#tblMaterialesRequeridosE tbody').on('dblclick', 'tr', function () {
                    pnlEditar.find("#tblMaterialesRequeridosE tbody tr").removeClass("success");
                    $(this).addClass("success");
                    console.log($(this));
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
            /*CALCULAR SUPER TOTAL*/
            super_total = 0.0;
            $.each(pnlEditar.find("#tblMaterialesRequeridosE tbody tr"), function (k, v) {
                console.log($(this).find("td"));
                var sub = parseFloat($(this).find("td").eq(6).text());
                super_total += sub;
            });
            pnlEditar.find("#SuperTotalE").html('<h2 class="text-success"><strong> $' + $.number(super_total, 3, '.', ',') + '</strong></h2>');
            /*FIN CALCULAR SUPER TOTAL*/
        });
    }
    function getEstilos() {
        $.getJSON(master_url + 'getEstilos').done(function (data, x, jq) {

            var options = '<option></option>';
            $.each(data, function (k, v) {
                options += '<option value="' + v.ID + '">' + v.ESTILO + '</option>';
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
                options += '<option value="' + v.ID + '">' + v.COMBINACION + '</option>';
            });
            pnlNuevo.find("#Combinacion").html(options);
            pnlEditar.find("#CombinacionE").html(options);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
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