<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Fracciones X Estilo</legend>
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
<!--Confirmacion Eliminar Concepto-->
<div class="modal" id="mdlConfirmarEliminarRenglon" tabindex="-1" role="dialog">
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
                <button type="button" class="btn btn-raised btn-primary" id="btnEliminarRenglon">ACEPTAR</button>
            </div>
        </div>
    </div>
</div>
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
<!--Nuevo Renglon-->
<div class="modal" id="mdlNuevoRenglon" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seleccionar Fracción(es)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset>
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkMultiple" name="chkMultiple" >
                            <label class="custom-control-label" for="chkMultiple"> Varios</label>
                        </div>
                    </div>
                </fieldset>
                <div class="col-md-12" id="Fracciones">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-primary" data-dismiss="modal">TERMINAR</button>
            </div>
        </div>
    </div>
</div>


<!--GUARDAR-->
<div class="card border-0  d-none" id="pnlNuevo">
    <div class="card-body text-dark"> 
        <form id="frmNuevo">
            <div class="row">
                <div class="col-md-3 float-left">
                    <legend class="float-left">Fracciones por Estilo</legend>
                </div>
                <div class="col-md-6 float-right">
                </div>
                <div class="col-md-3 float-right" align="right">
                    <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                    <button type="button" class="btn btn-dark" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
                </div>
            </div>
            <br>
            <div class="card border-dark">
                <div class="card-header text-center">
                    <strong>DATOS</strong>
                </div>
                <div class="card-body row">
                    <div class="col-sm">
                        <label for="Estilo">Estilo*</label>
                        <select class="form-control form-control-lg" id="EstiloN" name="Estilo" required>  
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-lg"  name="Estatus" required> 
                            <option value=""></option>  
                            <option>ACTIVO</option>
                            <option>INACTIVO</option> 
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div> 
</div> 
<!--EDITAR-->
<div class="card border-0  d-none" id="pnlEditar">
    <div class="card-body text-dark"> 
        <form id="frmEditar">
            <div class="row">
                <div class="col-md-3 float-left">
                    <legend class="float-left">Fracciones por Estilo</legend>
                </div>
                <div class="col-md-6 float-right">

                </div>
                <div class="col-md-3 float-right" align="right">
                    <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                    <button type="button" class="btn btn-dark" id="btnModificar"><span class="fa fa-check"></span><br>GUARDAR</button>
                </div>
            </div>
            <br>
            <div class="d-none">
                <input type="text" class="form-control" id="ID" name="ID" required >
            </div>
            <div class="card border-dark">
                <div class="card-header text-center">
                    <strong>DATOS</strong>
                </div>
                <div class="card-body row">
                    <div class="col-sm">
                        <label for="Estilo">Estilo*</label>
                        <select class="form-control form-control-lg" id="Estilo" name="Estilo" required>  
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-lg" id="Estatus" name="Estatus" required> 
                            <option value=""></option>  
                            <option>ACTIVO</option>
                            <option>INACTIVO</option> 
                        </select>
                    </div>
                </div>  
            </div>
        </form>
    </div> 
</div> 
<div class="card border-0  d-none" id="pnlDetalle">
    <div class="card-body text-dark">
        <div class="card border-dark">
            <div class="card-header text-center">
                <strong>DETALLE</strong>
            </div>
            <div class="card-body row"> 
                <div class="col-sm">
                </div>
                <div class="col-sm text-center">
                    <legend class="card-title text-success" id="ImporteTotal"></legend>
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-default float-right" id="btnNuevoRenglon"><span class="fa fa-plus fa-1x" ></span><br>AGREGAR</button>
                </div>
            </div> 
            <div class=" row"> 
                <div id="RegistrosDetalle"  class="col-12 w-100">
                </div>
            </div>
        </div><!--FIN CARD-->
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/FraccionesXEstilo/';

    var pnlNuevo = $("#pnlNuevo");
    var pnlTablero = $("#pnlTablero");
    var pnlDetalle = $("#pnlDetalle");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlNuevo.find("#btnGuardar");
    var btnCancelar = pnlNuevo.find("#btnCancelar");
    var pnlEditar = $("#pnlEditar");
    var btnModificar = pnlEditar.find("#btnModificar");
    var btnCancelarModificar = pnlEditar.find("#btnCancelar");
    var btnRefrescar = $("#btnRefrescar");
    var btnEliminar = $("#btnEliminar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");

    var mdlConfirmarEliminarRenglon = $("#mdlConfirmarEliminarRenglon");
    var btnEliminarRenglon = $("#btnEliminarRenglon");

    var tempDetalle = 0;

    var btnNuevoRenglon = $('#btnNuevoRenglon');
    var mdlNuevoRenglon = $('#mdlNuevoRenglon');
    var IdMovimiento = 0;

    $(document).ready(function () {
        btnNuevoRenglon.click(function () {
            temp = 0;
            HoldOn.open({
                theme: "sk-bounce",
                message: "CARGANDO DATOS..."
            });
            $.ajax({
                url: master_url + 'getFracciones',
                type: "POST",
                dataType: "JSON"
            }).done(function (data, x, jq) {
                console.log(data);
                if (data.length > 0) {
                    mdlNuevoRenglon.modal('show');
                    $("#Fracciones").html(getTable('tblSeleccionarFracciones', data));
                    $('#tblSeleccionarFracciones tfoot th').each(function () {
                        var title = $(this).text();
                        $(this).html('');
                    });
                    var tblSelected = $('#tblSeleccionarFracciones').DataTable(tableOptionsMiniTables);
                    $('#tblSeleccionarFracciones tbody').on('click', 'tr', function () {
                        $("#tblSeleccionarFracciones").find("tr").removeClass("success");
                        $("#tblSeleccionarFracciones").find("tr").removeClass("warning");
                        var id = this.id;
                        var index = $.inArray(id, selected);
                        if (index === -1) {
                            selected.push(id);
                        } else {
                            selected.splice(index, 1);
                        }
                        $(this).addClass('success');
                        var dtm = tblSelected.row(this).data();
                        temp = parseInt(dtm[0]);
                        $.ajax({
                            url: master_url + 'getFraccionByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {
                            console.log(data);
                            /**AQUI  VALIDA QUE EL CONCEPTO NO HAYA SIDO AGREGADO CON ANTERIORIDAD**/
                            var has_id = true;
                            if (pnlDetalle.find("#tblRegistrosDetalle tbody tr").length > 0) {
                                $.each(pnlDetalle.find("#tblRegistrosDetalle tbody tr"), function () {
                                    var row_status = $(this).find("td").eq(1).text();
                                    if (parseInt(row_status) === parseInt(temp)) {
                                        has_id = false;
                                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'ESTA FRACCIÓN YA HA SIDO AGREGADO', 'danger');
                                        return false;
                                    }
                                });
                            }
                            if (has_id) {

                                if (data[0] !== undefined && data.length > 0) {
                                    var dtm = data[0];
                                    var frm = new FormData();
                                    frm.append('Fraccion', dtm.ID);
                                    frm.append('FraccionXEstilo', IdMovimiento);
                                    $.ajax({
                                        url: master_url + 'onAgregarDetalle',
                                        type: "POST",
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        data: frm
                                    }).done(function (data, x, jq) {
                                        mdlNuevoRenglon.modal('hide');
                                        HoldOn.close();
                                        getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
                                    }).fail(function (x, y, z) {
                                        console.log(x, y, z);
                                    }).always(function () {
                                        HoldOn.close();
                                    });
                                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AGREGADO LA FRACCIÓN', 'success');
                                } else {
                                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'LA FRACCIÓN NO SE AGREGO, INTENTE DE NUEVO', 'danger');
                                }
                                if (!mdlNuevoRenglon.find("#chkMultiple").is(":checked")) {
                                    mdlNuevoRenglon.modal('hide');
                                }
                            }
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    });
                } else {
                    mdlSeleccionarEntregasEditar.modal('hide');
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTEN TRABAJOS CONCLUIDAS O ENTREGADOS', 'danger');
                    HoldOn.close();
                }
                // Apply the search
                tblSelected.columns().every(function () {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
            }).fail(function (x, y, z) {
                console.log(x, y, z);
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTEN PREFACTURAS CONCLUIDAS O AUTORIZADAS', 'danger');
            }).always(function () {
                HoldOn.close();
            });




        });
        btnModificar.click(function () {
            $.validator.setDefaults({
                ignore: []
            });
            $('#frmEditar').validate({
                errorClass: 'myErrorClass',
                errorPlacement: function (error, element) {
                    var elem = $(element);
                    error.insertAfter(element);
                },
                rules: {
                    Estilo: 'required',
                    Estatus: 'required'
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
            if ($('#frmEditar').valid()) {
                var frm = new FormData(pnlEditar.find("#frmEditar")[0]);
                $.ajax({
                    url: master_url + 'onModificar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                    btnRefrescar.trigger('click');
                    pnlEditar.addClass('d-none');
                    pnlTablero.removeClass('d-none');
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
                    Estatus: 'required'
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
            if ($('#frmNuevo').valid()) {
                var frm = new FormData(pnlNuevo.find("#frmNuevo")[0]);

                $.ajax({
                    url: master_url + 'onAgregar',
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: frm
                }).done(function (data, x, jq) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                    getRecords();
                    //pnlTablero.removeClass("d-none");
                    pnlNuevo.addClass('d-none');
                    console.log(data, x, jq);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
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
                    console.log(data);
                    mdlConfirmar.modal('hide');
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'REIGISTRO ELIMINADO', 'danger');
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
        btnEliminarRenglon.click(function () {
            if (tempDetalle !== 0 && tempDetalle !== undefined && tempDetalle > 0) {
                HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
                $.ajax({
                    url: master_url + 'onEliminarRenglonDetalle',
                    type: "POST",
                    data: {
                        ID: tempDetalle
                    }
                }).done(function (data, x, jq) {
                    mdlConfirmarEliminarRenglon.modal('hide');
                    getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });
        btnRefrescar.click(function () {
            getRecords();
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlNuevo.removeClass('d-none');
            pnlNuevo.find("input").val("");
            pnlNuevo.find("select").val("").trigger('change');
            $('#EstiloN').select2('open').select2('close');
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlNuevo.addClass('d-none');
        });
        btnCancelarModificar.click(function () {
            pnlEditar.addClass("d-none");
            pnlDetalle.addClass('d-none');
            pnlTablero.removeClass("d-none");
        });
        getRecords();
        getEstilos();
        handleEnter();
    });

    function getEstilos() {
        $.getJSON(master_url + 'getEstilos').done(function (data, x, jq) {
            console.log(data);

            var options = '<option></option>';
            $.each(data, function (k, v) {
                options += '<option value="' + v.ID + '">' + v.Descripcion + '</option>';
            });
            pnlNuevo.find("#EstiloN").html(options);
            pnlEditar.find("#Estilo").html(options);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onModificarPrecioFraccionXEstilo(value, IDX) {
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
        $.ajax({
            url: master_url + 'onModificarDetalle',
            type: "POST",
            data: {
                ID: IDX,
                Precio: value === '' || value === null ? 0 : value
            }
        }).done(function (data, x, jq) {
            getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onModificarCantidadFraccionXEstilo(value, IDX) {
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
        $.ajax({
            url: master_url + 'onModificarDetalle',
            type: "POST",
            data: {
                ID: IDX,
                Cantidad: value === '' || value === null ? 0 : value
            }
        }).done(function (data, x, jq) {
            getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });

    }

    function onModificarOrdenFraccionXEstilo(value, IDX) {
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
        $.ajax({
            url: master_url + 'onModificarDetalle',
            type: "POST",
            data: {
                ID: IDX,
                Orden: value === '' || value === null ? 0 : value
            }
        }).done(function (data, x, jq) {
            getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onEliminarRenglonDetalle(IDX) {
        tempDetalle = IDX;
        mdlConfirmarEliminarRenglon.modal('show');
    }

    function getFraccionesXEstiloDetallebyFraccionesXEstilo(IDX) {
        var total = 0;
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
        $.ajax({
            url: master_url + 'getFraccionesXEstiloDetallebyFraccionesXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                ID: IDX
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                pnlDetalle.find("#RegistrosDetalle").html(getTable('tblRegistrosDetalle', data));
                $('#tblRegistrosDetalle tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = pnlDetalle.find('#tblRegistrosDetalle thead th');
                var tfoot = pnlDetalle.find('#tblRegistrosDetalle tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(1).addClass("d-none");
                tfoot.eq(1).addClass("d-none");
                thead.eq(6).addClass("d-none");
                tfoot.eq(6).addClass("d-none");
                $.each(pnlDetalle.find('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                    td.eq(6).addClass("d-none");
                    total += parseFloat(td.eq(6).text());

                });

                pnlDetalle.find('#ImporteTotal').html('Total: $' + $.number(total, 2, '.', ', '));


                var tblRegistrosDetalle = pnlDetalle.find("#tblRegistrosDetalle").DataTable(tableOptionsMiniTables);
                pnlDetalle.find('#tblRegistrosDetalle tbody').on('click', 'tr', function () {
                    var dtm = tblSelected.row(this).data();
                    tempDetalle = parseInt(dtm[0]);
                });
            } else {
                pnlDetalle.find("#RegistrosDetalle").html("");
            }
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {

        });
    }

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
            console.log(data);
            if (data.length > 0) {


                $("#tblRegistros").html(getTable('tblFraccionesXEstilo', data));

                $('#tblFraccionesXEstilo tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblFraccionesXEstilo thead th');
                var tfoot = $('#tblFraccionesXEstilo tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblFraccionesXEstilo tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblFraccionesXEstilo').DataTable(tableOptions);
                $('#tblFraccionesXEstilo_filter input[type=search]').focus();

                $('#tblFraccionesXEstilo tbody').on('click', 'tr', function () {

                    $("#tblFraccionesXEstilo tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                    IdMovimiento = parseInt(dtm[0]);
                });

                $('#tblFraccionesXEstilo tbody').on('dblclick', 'tr', function () {
                    $("#tblFraccionesXEstilo tbody tr").removeClass("success");
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
                            url: master_url + 'getFraccionXEstiloByID',
                            type: "POST",
                            dataType: "JSON",
                            data: {
                                ID: temp
                            }
                        }).done(function (data, x, jq) {

                            pnlEditar.find("input").val("");
                            pnlEditar.find("select").val("").trigger('change');
                            $.each(data[0], function (k, v) {
                                pnlEditar.find("#" + k).val(v);
                                pnlEditar.find("[name='" + k + "']").val(v).trigger('change');
                            });

                            getFraccionesXEstiloDetallebyFraccionesXEstilo(temp);
                            pnlTablero.addClass("d-none");
                            pnlDetalle.removeClass('d-none');
                            pnlEditar.removeClass('d-none');
                            $('#Estilo').select2('open').select2('close');
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


            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function validate(event, val) {
        if (((event.which !== 46 || (event.which === 46 && val === '')) || val.indexOf('.') !== -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    }
</script>
