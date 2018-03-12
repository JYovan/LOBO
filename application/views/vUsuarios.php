
<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Usuarios</legend>
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
                        <legend class="float-left">Nuevo Usuario</legend>
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
                        <label for="Estatus">Usuario*</label>  
                        <input type="text" class="form-control" id="Usuario" name="Usuario" required >
                    </div>
                     <div class="col-sm">
                        <label for="Estatus">Contraseña*</label>  
                        <input type="password" class="form-control" id="Contrasena" name="Contrasena" required >
                    </div>
                </div>
                <div class="row"> 


                     <div class="col-sm">
                        <label for="Tipo">Tipo</label>
                        <select class="form-control form-control-lg" name="Tipo">
                            <option value=""></option>  
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            <option value="COMPRAS">COMPRAS</option>
                            <option value="VENTAS">VENTAS</option>
                            <option value="PRODUCCION">PRODUCCION</option>
                            <option value="ALMACEN">ALMACEN</option> 
                            <option value="CAPTURA">CONTABILIDAD</option>
                        </select>
                    </div>
                     <div class="col-sm">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-lg"  name="Estatus"> 
                            <option value=""></option>  
                            <option>ACTIVO</option>
                            <option>INACTIVO</option> 
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col"> 
                        <label for="Estatus">Correo*</label> 
                        <input type="email" id="Correo" name="Correo" class="form-control" placeholder="lobo@lobo.com.mx" required>
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
                            <legend class="float-left">Editar Usuario</legend>
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
                            <label for="Estatus">Usuario*</label>  
                            <input type="text" class="form-control" id="Usuario" name="Usuario" required >
                        </div>
                         <div class="col-sm">
                            <label for="Estatus">Contraseña*</label>  
                            <input type="password" class="form-control" id="Contrasena" name="Contrasena" required >
                        </div>
                    </div>
                    <div class="row"> 


                         <div class="col-sm">
                            <label for="Tipo">Tipo</label>
                            <select class="form-control form-control-lg" id="Tipo" name="Tipo">
                                <option value=""></option>  
                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                <option value="COMPRAS">COMPRAS</option>
                                <option value="VENTAS">VENTAS</option>
                                <option value="PRODUCCION">PRODUCCION</option>
                                <option value="ALMACEN">ALMACEN</option> 
                                <option value="CAPTURA">CONTABILIDAD</option>
                            </select>
                        </div>
                         <div class="col-sm">
                            <label for="Estatus">Estatus*</label>
                            <select class="form-control form-control-lg" id="Estatus"  name="Estatus"> 
                                <option value=""></option>  
                                <option>ACTIVO</option>
                                <option>INACTIVO</option> 
                            </select>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm">
                            <label for="Estatus">Correo*</label> 
                            <input type="email" id="Correo" name="Correo" class="form-control" placeholder="lobo@lobo.com.mx" required>
                        </div>  
                    </div>   
                </form>
            </div> 
        </div> 
    </div> 
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Usuarios/';
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
                    console.log(data);
                    mdlConfirmar.modal('hide');
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
                errorClass: 'myErrorClass',
                errorPlacement: function (error, element) {
                    var elem = $(element);
                    error.insertAfter(element);
                },
                rules: {
                    Usuario: 'required',
                    Contrasena: 'required',
                    Estatus: 'required',
                    Tipo: 'required'
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
                errorClass: 'myErrorClass',
                errorPlacement: function (error, element) {
                    var elem = $(element);
                    error.insertAfter(element);
                },
                rules: {
                    Usuario: 'required',
                    Contrasena: 'required',
                    Estatus: 'required',
                    Tipo: 'required'
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
            pnlNuevo.find("select").val("").trigger('change');
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
//            $('#tblUsuarios tfoot th').each(function () {
//                var title = $(this).text();
//                $(this).html('<div  style="overflow-x:auto; "><div class="form-group "><input type="text" placeholder="Buscar por ' + title + '" class="form-control" style="width: 100%;"/></div></div>');
//            });
            $('#tblUsuarios tfoot th').each(function () {
                $(this).html('');
            });
            var tblSelected = $('#tblUsuarios').DataTable(tableOptions);
            $('#tblUsuarios_filter input[type=search]').focus();

            $('#tblUsuarios tbody').on('click', 'tr', function () {

                $("#tblUsuarios tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = tblSelected.row(this).data();
                temp = parseInt(dtm[0]);
            });

            $('#tblUsuarios tbody').on('dblclick', 'tr', function () {
                $("#tblCatalogos tbody tr").removeClass("success");
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
                        url: master_url + 'getUsuarioByID',
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
