<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Fracciones Por Estilo</legend>
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
                    <button type="button" class="btn btn-default" id="btnCancelar">CANCELAR</button>
                    <button type="button" class="btn btn-primary" id="btnGuardar">GUARDAR</button>
                </div>
            </div>
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
                        <select class="form-control form-control-sm required " id="Estilo" name="Estilo" required>  
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-sm required"  name="Estatus" required> 
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

    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    var pnlDetalle = $("#pnlDetalle");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnModificar = pnlDatos.find("#btnModificar");
    var btnEliminar = $("#btnEliminar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");
    var Estilo = pnlDatos.find("#Estilo");
    var mdlConfirmarEliminarRenglon = $("#mdlConfirmarEliminarRenglon");
    var btnEliminarRenglon = $("#btnEliminarRenglon");
    var tempDetalle = 0;
    var btnNuevoRenglon = $('#btnNuevoRenglon');
    var mdlNuevoRenglon = $('#mdlNuevoRenglon');
    var IdMovimiento = 0;
    var guardar;

    $(document).ready(function () {
        btnNuevoRenglon.click(function () {
            temp = 0;
            HoldOn.open({
                theme: "sk-bounce",
                message: "CARGANDO DATOS..."
            });
            $.ajax({
                url: master_url + 'getFraccionesSeleccionar',
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

                    var thead = $('#tblSeleccionarFracciones thead th');
                    var tfoot = $('#tblSeleccionarFracciones tfoot th');
                    thead.eq(0).addClass("d-none");
                    tfoot.eq(0).addClass("d-none");
                    $.each($('#tblSeleccionarFracciones tbody tr'), function (k, v) {
                        var td = $(v).find("td");
                        td.eq(0).addClass("d-none");

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

                                        if (!mdlNuevoRenglon.find("#chkMultiple").is(":checked")) {
                                            mdlNuevoRenglon.modal('hide');
                                        }

                                        getFraccionesXEstiloDetallebyFraccionesXEstilo(IdMovimiento);
                                        HoldOn.close();

                                    }).fail(function (x, y, z) {
                                        console.log(x, y, z);
                                    }).always(function () {
                                        HoldOn.close();
                                    });
                                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AGREGADO LA FRACCIÓN', 'success');
                                } else {
                                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'LA FRACCIÓN NO SE AGREGO, INTENTE DE NUEVO', 'danger');
                                }

                            }
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    });
                } else {
                    mdlNuevoRenglon.modal('hide');
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTEN REGISTROS', 'danger');
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
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'ERROR AL CONSULTAR DATOS', 'danger');
            }).always(function () {
                HoldOn.close();
            });
        });

        /*COMPRUEBA SI EL ESTILO Y LA COMBINACION YA HAN SIDO REGISTRADOS*/


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
                    var valEstilo = Estilo[0].selectize.getValue();
                    $.getJSON(master_url + 'onComprobarExisteEstilo', {Estilo: valEstilo}).done(function (data, x, jq) {
                        if (parseInt(data[0].EXISTE) > 0) {
                            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL ESTILO YA EXISTE', 'danger');
                            pnlDatos.find("[name='Estilo']")[0].selectize.refreshOptions();
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
nuevo=false;
                                getRecords();
                                Estilo[0].selectize.disable();
                                pnlDetalle.removeClass('d-none');
                                IdMovimiento = data;
                                getFraccionesXEstiloDetallebyFraccionesXEstilo(data);
                                nuevo=false;
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                            });
                        }
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });

                }


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
                    mdlConfirmar.modal('hide');
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'REIGISTRO ELIMINADO', 'danger');
                    pnlDatos.addClass("d-none");
                    pnlTablero.removeClass("d-none");
                    getRecords();
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
        });
        getRecords();
        getEstilos();
        handleEnter();
    });

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
                var tblSelected = pnlDetalle.find("#tblRegistrosDetalle").DataTable(tableOptionsMiniTables);
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
                        nuevo = false;
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
                            getFraccionesXEstiloDetallebyFraccionesXEstilo(temp);
                            pnlTablero.addClass("d-none");
                            pnlDetalle.removeClass('d-none');
                            pnlDatos.removeClass('d-none');
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
