<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Series</legend>
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
                    <div class="col-md-2 float-left">
                        <legend class="float-left">Nuevo</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                        <button type="button" class="btn btn-dark" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Descripcion">Descripción*</label>  
                        <input type="text" class="form-control" id="Descripcion" name="Descripcion" required >
                    </div>
                    <div class="col-sm">
                        <label for="PuntoInicial">Punto Inicial*</label>  
                        <input type="number" class="form-control" id="PuntoInicial" name="PuntoInicial" required >
                    </div>
                    <div class="col-sm">
                        <label for="PuntoFinal">Punto Final*</label>  
                        <input type="number" class="form-control" id="PuntoFinal" name="PuntoFinal" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-lg"  name="Estatus"> 
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
<!--EDITAR-->
<div id="" class="container-fluid">
    <div class="card border-0  d-none" id="pnlEditar">
        <div class="card-body text-dark"> 
            <div class="card-body text-dark"> 
                <form id="frmEditar">
                    <div class="row">
                        <div class="col-md-2 float-left">
                            <legend class="float-left">Editar</legend>
                        </div>
                        <div class="col-md-7 float-right">

                        </div>
                        <div class="col-md-3 float-right" align="right">
                            <button type="button" class="btn btn-default" id="btnCancelar"><span class="fa fa-undo"></span><br>CANCELAR</button>
                            <button type="button" class="btn btn-dark" id="btnModificar"><span class="fa fa-check"></span><br>GUARDAR</button>
                        </div>
                    </div>
                    <div class="d-none">
                        <input type="text" class="form-control" id="ID" name="ID" required >
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="Descripcion">Descripción*</label>  
                            <input type="text" class="form-control" id="Descripcion" name="Descripcion" required >
                        </div>
                        <div class="col-sm">
                            <label for="PuntoInicial">Punto Inicial*</label>  
                            <input type="number" class="form-control" id="PuntoInicial" name="PuntoInicial" required >
                        </div>
                        <div class="col-sm">
                            <label for="PuntoFinal">Punto Final*</label>  
                            <input type="number" class="form-control" id="PuntoFinal" name="PuntoFinal" required >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="Estatus">Estatus*</label>
                            <select class="form-control form-control-lg" id="Estatus" name="Estatus"> 
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
</div>

<!--DETALLE-->
<div class="card border-0  d-none" id="pnlDetalle">
    <div class="card-body text-dark"> 
        <div class="card-body"> 
            <div class="col-md-12">
                <legend class="float-left">Desglose Corrida</legend>
            </div>
        </div> 
        <div class="card-body">
            <div id="RegistrosDetalle"></div>
        </div>
    </div> 
</div> 

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Series/';
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
    var tempDetalle = 0;
    $(document).ready(function () {
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
                    Descripcion: 'required',
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
                    pnlDetalle.addClass('d-none');
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
                    Descripcion: 'required',
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

            var incremento = parseFloat(pnlNuevo.find('#PuntoInicial').val());
            if (parseFloat(pnlNuevo.find('#PuntoFinal').val()) > parseFloat(pnlNuevo.find('#PuntoInicial').val())) {


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

                        //Crear las tallas
                        while (incremento <= parseFloat(pnlNuevo.find('#PuntoFinal').val())) {
                            $.ajax({
                                url: master_url + 'onAgregarDetalle',
                                type: "POST",
                                dataType: "JSON",
                                data: {
                                    Serie_ID: data,
                                    Talla: incremento
                                }
                            }).done(function (data, x, jq) {

                                console.log(data);
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                            });
                            incremento = incremento + 0.5;
                        }
                        //Abrir la edición
                        pnlNuevo.addClass('d-none');
                        despuesDeGuardar(data);
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                }
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'EL PUNTO INICIAL NO DEBE SER MAYOR AL PUNTO FINAL', 'danger');
            }


        }
        );
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
        btnRefrescar.click(function () {
            getRecords();
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlNuevo.removeClass('d-none');
            pnlNuevo.find("input").val("");
            pnlNuevo.find("select").val("").trigger('change');
            $(':input:text:enabled:visible:first').focus();
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
        handleEnter();
    });
    function getSeriesDetallebySerieID(IDX) {
        HoldOn.open({theme: "sk-bounce", message: "CARGANDO DATOS..."});
        $.ajax({
            url: master_url + 'getSeriesDetallebySerieID',
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
                $.each(pnlDetalle.find('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                });
                var tblRegistrosDetalleDT = pnlDetalle.find("#tblRegistrosDetalle").DataTable(tableOptionsDetalle);

                pnlDetalle.find('#tblRegistrosDetalle tbody').on('click', 'tr', function () {
                    var row = $(this).find("td");
                    $.each(pnlDetalle.find('#tblRegistrosDetalle tbody tr'), function (k, v) {
                        var cell = $(this).find("td").eq(3);
                        if (cell.find("#Cantidad").val() === '') {
                            cell.html(0);
                        } else {
                            cell.html(cell.find("#Cantidad").val());
                        }
                    });
                    row.eq(3).html('<input type="number" id="Cantidad" onkeydown="onColocarCantidad(event)"  value="' + row.eq(3).text() + '" placeholder="0">');

                });

//                pnlDetalle.find('#tblRegistrosDetalle tbody').on('click', 'tr', function () {
//                    var dtm = tblSelected.row(this).data();
//                    tempDetalle = parseInt(dtm[0]);
//                });
            } else {
                pnlDetalle.find("#RegistrosDetalle").html("");
            }
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {

        });
    }

    function onColocarCantidad(event) {
        var x = event.which || event.keyCode;
        if (x === 13) {
            $.each(pnlDetalle.find('#tblRegistrosDetalle tbody tr'), function (k, v) {
                var cell = $(this).find("td").eq(3);
                if (cell.find("#Cantidad").val() === '') {
                    cell.html(0);
                } else {
                    cell.html(cell.find("#Cantidad").val());
                }
            });
        }
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
                $("#tblRegistros").html(getTable('tblSeries', data));
                $('#tblSeries tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblSeries thead th');
                var tfoot = $('#tblSeries tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblSeries tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblSeries').DataTable(tableOptions);
                $('#tblSeries_filter input[type=search]').focus();
                $('#tblSeries tbody').on('click', 'tr', function () {

                    $("#tblSeries tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });
                $('#tblSeries tbody').on('dblclick', 'tr', function () {
                    $("#tblSeries tbody tr").removeClass("success");
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
                            url: master_url + 'getSerieByID',
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
                                pnlEditar.find("#" + k).val(v).trigger('change');
                            });
                            pnlTablero.addClass("d-none");
                            pnlEditar.removeClass('d-none');
                            pnlDetalle.removeClass('d-none');
                            $(':input:text:enabled:visible:first').focus();
                            getSeriesDetallebySerieID(temp);
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

    function despuesDeGuardar(IDX) {
        temp = IDX;
        HoldOn.open({
            theme: "sk-bounce",
            message: "CARGANDO DATOS..."
        });
        $.ajax({
            url: master_url + 'getSerieByID',
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
                pnlEditar.find("#" + k).val(v).trigger('change');
            });
            pnlTablero.addClass("d-none");
            pnlEditar.removeClass('d-none');
            pnlDetalle.removeClass('d-none');
            $(':input:text:enabled:visible:first').focus();
            getSeriesDetallebySerieID(temp);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }


</script>