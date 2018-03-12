
<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Lineas</legend>
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
                        <label for="Clave">Clave*</label>  
                        <input type="number" class="form-control" id="Clave" name="Clave" required >
                    </div>
                    <div class="col-sm">
                        <label for="Descripcion">Descripción*</label>  
                        <input type="text" class="form-control" id="Descripcion" name="Descripcion" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Ano">Año</label>  
                        <input type="number" class="form-control" id="Ano" name="Ano"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="TemporadaCat">Temporada*</label>
                        <select class="form-control form-control-lg"  name="TemporadaCat" required=""> 
                            <option value=""></option>  
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="TipoEstiloCat">Tipo Estilo*</label>
                        <select class="form-control form-control-lg"  name="TipoEstiloCat" required=""> 
                            <option value=""></option>  
                        </select>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-lg"  name="Estatus" required=""> 
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
                            <legend class="float-left">Editar </legend>
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
                            <label for="Clave">Clave*</label>  
                            <input type="number" class="form-control" id="Clave" name="Clave" required >
                        </div>
                        <div class="col-sm">
                            <label for="Descripcion">Descripción*</label>  
                            <input type="text" class="form-control" id="Descripcion" name="Descripcion" required >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="Ano">Año</label>  
                            <input type="number" class="form-control" id="Ano" name="Ano"  >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="TemporadaCat">Temporada*</label>
                            <select class="form-control form-control-lg"  name="TemporadaCat"> 
                                <option value=""></option>  
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="TipoEstiloCat">Tipo Estilo*</label>
                            <select class="form-control form-control-lg"  name="TipoEstiloCat"> 
                                <option value=""></option>  
                            </select>
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
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Lineas/';
    var pnlNuevo = $("#pnlNuevo");
    var pnlTablero = $("#pnlTablero");
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
                    Clave: 'required',
                    Descripcion: 'required'
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
                    Clave: 'required',
                    Nombre: 'required'
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
                    pnlTablero.removeClass("d-none");
                    pnlNuevo.addClass('d-none');
                    console.log(data, x, jq);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
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
            pnlTablero.removeClass("d-none");
        });

        getRecords();
        getTemporadas();
        getTiposEstilo();
        handleEnter();
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
            console.log(data);
            $("#tblRegistros").html(getTable('tblLineas', data));

            $('#tblLineas tfoot th').each(function () {
                $(this).html('');
            });
            var thead = $('#tblLineas thead th');
            var tfoot = $('#tblLineas tfoot th');
            thead.eq(0).addClass("d-none");
            tfoot.eq(0).addClass("d-none");
            $.each($.find('#tblLineas tbody tr'), function (k, v) {
                var td = $(v).find("td");
                td.eq(0).addClass("d-none");
            });

            
            var tblSelected = $('#tblLineas').DataTable(tableOptions);
            $('#tblLineas_filter input[type=search]').focus();

            $('#tblLineas tbody').on('click', 'tr', function () {

                $("#tblLineas tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = tblSelected.row(this).data();
                temp = parseInt(dtm[0]);
            });

            $('#tblLineas tbody').on('dblclick', 'tr', function () {
                $("#tblLineas tbody tr").removeClass("success");
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
                        url: master_url + 'getLineaByID',
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
                            //pnlEditar.find("#" + k).val(v).trigger('change');
                            pnlEditar.find("[name='"+k+"']").val(v).trigger('change');
                        });
                        pnlTablero.addClass("d-none");
                        pnlEditar.removeClass('d-none');
                        $(':input:text:enabled:visible:first').focus();
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
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getTemporadas() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getTemporadas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            var options = '<option></option>';
            $.each(data, function (k, v) {
                options += '<option value="' + v.ID + '">' + v.SValue + '</option>';
            });
            pnlNuevo.find("[name='TemporadaCat']").html(options);
            pnlEditar.find("[name='TemporadaCat']").html(options);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getTiposEstilo() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getTiposEstilo',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            var options = '<option></option>';
            $.each(data, function (k, v) {
                options += '<option value="' + v.ID + '">' + v.SValue + '</option>';
            });
            pnlNuevo.find("[name='TipoEstiloCat']").html(options);
            pnlEditar.find("[name='TipoEstiloCat']").html(options);
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

</script>