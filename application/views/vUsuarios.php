
<div class="card " id="pnlTablero">
    <div class="card-body">
        <h5 class="card-title">Gestión de Usuario</h5>


        <div class="card-block">
            <div id="tblRegistros"></div>
        </div>
    </div>
</div>




<!--Confirmacion-->
<div id="mdlConfirmar" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirmar</h4>
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
<!--MODALES-->
<div class="col-md-12">
    <!--GUARDAR-->
    <div id="pnlNuevo" class="panel panel-default hide animated slideInRight">
        <div class="Custompanel-heading" >
            <div class="Custompanel-heading clearfix">
                <div class="panel-title pull-left cursor-hand" >
                    <button type="button" class="btn btn-default " id="btnCancelar" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Regresar">
                        <span class="fa fa-arrow-left CustomColorIcon" ></span>
                    </button>
                    Nuevo Usuario
                </div>
                <div class="input-group pull-right">
                    <button type="button" class="btn btn-raised btn-primary" id="btnGuardar">GUARDAR</button>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form id="frmNuevo">
                <fieldset>
                    <div class="col-6 col-md-3">
                        <div class="form-group label-static">
                            <label for="Usuario" class="control-label">Usuario*</label>    
                            <input type="text" class="form-control" id="Usuario" name="Usuario" required >
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group label-static">
                            <label for="Contrasena" class="control-label">Contraseña*</label>    
                            <input type="password" class="form-control" id="Contrasena" name="Contrasena" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group label-static">
                            <label for="" class="control-label">Tipo Acceso*</label>
                            <select id="Tipo" name="Tipo" class="form-control" >
                                <option value=""></option>  
                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                <option value="ADMINISTRADOR">COMPRAS</option>
                                <option value="ADMINISTRADOR">VENTAS</option>
                                <option value="ADMINISTRADOR">PRODUCCION</option>
                                <option value="ADMINISTRADOR">ALMACEN</option> 
                                <option value="CAPTURA">CONTABILIDAD</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3 col-md-3">
                        <div class="form-group label-static">
                            <label for="" class="control-label">Estatus*</label>
                            <select id="Estatus" name="Estatus" class="form-control" >
                                <option value=""></option> 
                                <option value="ACTIVO">ACTIVO</option> 
                                <option value="INACTIVO">INACTIVO</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-static">
                            <label for="Nombre" class="control-label">Nombre*</label>
                            <input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-static">
                            <label for="Apellidos" class="control-label">Apellidos*</label>
                            <input type="text" id="Apellidos" name="Apellidos" class="form-control" placeholder="" required>
                        </div>
                    </div>
                </fieldset>
                <div class="col-md-12">
                    <br>
                    <h6>Los campos con * son obligatorios</h6>    
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12">
    <!--GUARDAR-->
    <div id="pnlEditar" class="panel panel-default hide animated slideInRight">
        <div class="Custompanel-heading " >
            <div class="Custompanel-heading clearfix">
                <div class="panel-title pull-left cursor-hand" >
                    <button type="button" class="btn btn-default " id="btnCancelar" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Regresar">
                        <span class="fa fa-arrow-left CustomColorIcon" ></span>
                    </button>
                    Editar Usuario
                </div>
                <div class="input-group pull-right">
                    <button type="button" class="btn btn-default CustomColorEliminarRegistro" id="btnConfirmarEliminar" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Eliminar"><span class="fa fa-trash fa-1x"></span><br></button>
                    <button type="button" class="btn btn-raised btn-primary" id="btnModificar">GUARDAR</button>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <form id="frmEditar">
                <fieldset>
                    <div class="col-md-12 hide">
                        <input type="text" id="ID" name="ID" class="form-control" >
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group label-static">
                            <label for="Usuario" class="control-label">Usuario*</label>    
                            <input type="text" class="form-control" id="Usuario" name="Usuario" required >
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group label-static">
                            <label for="Contrasena" class="control-label">Contraseña*</label>    
                            <input type="password" class="form-control" id="Contrasena" name="Contrasena" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group label-static">
                            <label for="" class="control-label">Tipo Acceso*</label>
                            <select id="Tipo" name="Tipo" class="form-control" >
                                <option value=""></option> 
                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                <option value="ADMINISTRADOR">COMPRAS</option>
                                <option value="ADMINISTRADOR">VENTAS</option>
                                <option value="ADMINISTRADOR">PRODUCCION</option>
                                <option value="ADMINISTRADOR">ALMACEN</option> 
                                <option value="CAPTURA">CONTABILIDAD</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3 col-md-3">
                        <div class="form-group label-static">
                            <label for="" class="control-label">Estatus*</label>
                            <select id="Estatus" name="Estatus" class="form-control" >
                                <option value=""></option> 
                                <option value="ACTIVO">ACTIVO</option> 
                                <option value="INACTIVO">INACTIVO</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-static">
                            <label for="Nombre" class="control-label">Nombre*</label>
                            <input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-static">
                            <label for="Apellidos" class="control-label">Apellidos*</label>
                            <input type="text" id="Apellidos" name="Apellidos" class="form-control" placeholder="" required>
                        </div>
                    </div>
                </fieldset>
                <div class="col-md-12">
                    <br>
                    <h6>Los campos con * son obligatorios</h6>    
                </div>
            </form>
        </div>
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/CtrlUsuarios/';
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
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'USUARIO ELIMINADO', 'danger');
                    pnlEditar.addClass("hide");
                    pnlTablero.removeClass("hide");
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
            $('#frmEditar').validate({
                errorElement: 'span',
                errorClass: 'help-block',
                rules: {
                    Usuario: 'required',
                    Contrasena: 'required',
                    Nombre: 'required',
                    Apellidos: 'required',
                    Estatus: 'required',
                    Tipo: 'required'
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).closest('.form-group').removeClass('has-error');
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
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO UN USUARIO', 'success');
                    btnRefrescar.trigger('click');
                    pnlEditar.addClass('hide');
                    pnlTablero.removeClass('hide');
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
                errorElement: 'span',
                errorClass: 'help-block',
                rules: {
                    Usuario: 'required',
                    Contrasena: 'required',
                    Nombre: 'required',
                    Apellidos: 'required',
                    Estatus: 'required',
                    Tipo: 'required'
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).closest('.form-group').removeClass('has-error');
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
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO USUARIO', 'success');
                    getRecords();
                    pnlTablero.removeClass("hide");
                    pnlNuevo.addClass('hide');
                    console.log(data, x, jq);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });
        btnRefrescar.click(function () {
            getRecords();
            getEmpresas();
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("hide");
            pnlNuevo.removeClass('hide');
            pnlNuevo.find("input").val("");
            pnlNuevo.find("select").select2("val", "");
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("hide");
            pnlNuevo.addClass('hide');
            btnRefrescar.trigger('click');
        });
        btnCancelarModificar.click(function () {
            pnlEditar.addClass("hide");
            pnlTablero.removeClass("hide");
            btnRefrescar.trigger('click');
        });
        /*CALLS*/
        getRecords();
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
            $("#tblRegistros").html(getTable('tblUsuarios', data));
            $('#tblUsuarios tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<div class="col-md-12" style="overflow-x:auto; "><div class="form-group Customform-group"><input type="text" placeholder="Buscar por ' + title + '" class="form-control" style="width: 100%;"/></div></div>');
            });
            var tblSelected = $('#tblUsuarios').DataTable(tableOptions);
            $('#tblUsuarios tbody').on('click', 'tr', function () {
                $("#tblUsuarios").find("tr").removeClass("success");
                $("#tblUsuarios").find("tr").removeClass("warning");
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
                if (temp !== 0 && temp !== undefined && temp > 0) {
                    HoldOn.open({
                        theme: "sk-bounce",
                        message: "CARGANDO DATOS..."
                    });
                    $.ajax({
                        url: master_url + 'getUsuarioByID',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            ID: temp
                        }
                    }).done(function (data, x, jq) {

                        pnlEditar.find("input").val("");
                        pnlEditar.find("select").select2("val", "");
                        $.each(data[0], function (k, v) {
                            pnlEditar.find("#" + k).val(v);
                            pnlEditar.find("#" + k).select2("val", v);
                        });
                        pnlTablero.addClass("hide");
                        pnlEditar.removeClass('hide');
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
</script>
