
<div class="card " id="pnlTablero">
    <div class="card-body">
        <h5 class="card-title">Gestión de Usuarios</h5>
        <div align="right">
            <button type="button" class="btn btn-dark" id="btnNuevo"><span class="fa fa-plus"></span><br>AGREGAR</button>
            <button type="button" class="btn btn-dark" id="btnRefrescar"><span class="fa fa-refresh"></span><br>REFRESCAR</button>
            <button type="button" class="btn btn-dark" id="btnEliminar"><span class="fa fa-trash"></span><br>ELIMINAR</button>
        </div>

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
<!--GUARDAR-->

<div id="" class="container-fluid">
    <div class="card border-dark  d-none" id="pnlNuevo">
        <div class="card-body text-dark"> 
            <form id="frmNuevo">
                <div class="row">
                    <legend class="display-4" align="center">Nuevo Usuario</legend>
                    <div class="col">
                        <h4 class="card-title">Usuario*</h4>  
                        <input type="text" class="form-control" id="Usuario" name="Usuario" required >
                    </div>
                    <div class="col">
                        <h4 class="card-title">CONTRASEÑA*</h4>  
                        <input type="password" class="form-control" id="Contrasena" name="Contrasena" required >
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-6">
                        <label for="Tipo">TIPO</label><BR>
                        <select class="form-control form-control-lg" id="Tipo" name="Tipo">
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            <option value="COMPRAS">COMPRAS</option>
                            <option value="VENTAS">VENTAS</option>
                            <option value="PRODUCCION">PRODUCCION</option>
                            <option value="ALMACEN">ALMACEN</option> 
                            <option value="CAPTURA">CONTABILIDAD</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="Estatus">ESTATUS*</label>
                        <select class="form-control-lg" id="Estatus" name="Estatus"> 
                            <option>ACTIVO</option>
                            <option>INACTIVO</option> 
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col"> 
                        <h4 class="card-title">Correo*</h4>
                        <input type="email" id="Correo" name="Correo" class="form-control" placeholder="lobo@lobo.com.mx" required>
                    </div>  
                </div> 
                <div class="col-12" align="right">  
                    <br>
                    <button type="button" class="btn btn-dark" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
                </div>    
            </form>
        </div> 
    </div> 
</div>


<!--GUARDAR-->


<div id="" class="container-fluid">
    <div class="card border-dark  d-none" id="pnlEditar">
        <div class="card-body text-dark"> 
            <form id="frmNuevo">
                <div class="row">
                    <legend class="display-4" align="center">Editar Usuario</legend>

                    <div class="col d-none">
                        <input type="text" id="ID" name="ID" class="form-control" >
                    </div>
                    <div class="col">
                        <h4 class="card-title">Usuario*</h4>  
                        <input type="text" class="form-control" id="Usuario" name="Usuario" required >
                    </div>
                    <div class="col">
                        <h4 class="card-title">CONTRASEÑA*</h4>  
                        <input type="password" class="form-control" id="Contrasena" name="Contrasena" required >
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-6">
                        <label for="Tipo">TIPO</label><BR>
                        <select class="form-control form-control-lg" id="Tipo" name="Tipo">
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            <option value="COMPRAS">COMPRAS</option>
                            <option value="VENTAS">VENTAS</option>
                            <option value="PRODUCCION">PRODUCCION</option>
                            <option value="ALMACEN">ALMACEN</option> 
                            <option value="CAPTURA">CONTABILIDAD</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="Estatus">ESTATUS*</label>
                        <select class="form-control-lg" id="Estatus" name="Estatus"> 
                            <option>ACTIVO</option>
                            <option>INACTIVO</option> 
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col"> 
                        <h4 class="card-title">Correo*</h4>
                        <input type="email" id="Correo" name="Correo" class="form-control" placeholder="lobo@lobo.com.mx" required>
                    </div>  
                </div> 
                <div class="col-12" align="right">  
                    <br>
                    <button type="button" class="btn btn-dark" id="btnGuardar"><span class="fa fa-check"></span><br>GUARDAR</button>
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
                    mdlConfirmar.modal('d-none');
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'USUARIO ELIMINADO', 'danger');
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
        btnRefrescar.click(function () {
            getRecords();
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlNuevo.removeClass('d-none');
            pnlNuevo.find("input").val("");
            pnlNuevo.find("select").select2("val", "");
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlNuevo.addClass('d-none');
            btnRefrescar.trigger('click');
        });
        btnCancelarModificar.click(function () {
            pnlEditar.addClass("d-none");
            pnlTablero.removeClass("d-none");
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
                        pnlEditar.find("#Estatus").val("");
                        pnlEditar.find("#Estatus").val("");
                        pnlEditar.find("#" + k).select2("val", v);
                        pnlTablero.addClass("d-none");
                        pnlEditar.removeClass('d-none');
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
