
<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Catálogos del sistema</legend>
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
                    <div class="d-none">
                        <input type="text" class="form-control" id="FieldId" name="FieldId" >
                    </div>

                    <div class="col-sm">
                        <label for="IValue">Clave/Orden*</label>  
                        <input type="number" class="form-control" id="IValue" name="IValue" required >
                    </div>
                    <div class="col-sm">
                        <label for="SValue">Nombre Corto*</label>  
                        <input type="text" class="form-control" id="SValue" name="SValue" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Valor_Text">Descripción</label>  
                        <input type="text" class="form-control" id="Valor_Text" name="Valor_Text"  >
                    </div>
                    <div class="col-sm">
                        <label for="Valor_Num">Valor</label>  
                        <input type="number" class="form-control" id="SValue" name="SValue" >
                    </div>


                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Special">Extra</label>  
                        <input type="text" class="form-control" id="Special" name="Special"  >
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
                        <div class="d-none">
                            <input type="text" class="form-control" id="FieldId" name="FieldId" >
                        </div>

                        <div class="col-sm">
                            <label for="IValue">Clave/Orden*</label>  
                            <input type="number" class="form-control" id="IValue" name="IValue" required >
                        </div>
                        <div class="col-sm">
                            <label for="SValue">Nombre Corto*</label>  
                            <input type="text" class="form-control" id="SValue" name="SValue" required >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="Valor_Text">Descripción</label>  
                            <input type="text" class="form-control" id="Valor_Text" name="Valor_Text"  >
                        </div>
                        <div class="col-sm">
                            <label for="Valor_Num">Valor</label>  
                            <input type="number" class="form-control" id="Valor_Num" name="Valor_Num" >
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="Special">Extra</label>  
                            <input type="text" class="form-control" id="Special" name="Special"  >
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

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Generales/';
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

        getRecords();
        handleEnter();
    });

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);

        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));

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
            dataType: "JSON",
            data: {
                fieldId: getParameterByName('modulo')
            }
        }).done(function (data, x, jq) {
            console.log(data);
            $("#tblRegistros").html(getTable('tblCatalogos', data));

            $('#tblCatalogos tfoot th').each(function () {
                $(this).html('');
            });
            var tblSelected = $('#tblCatalogos').DataTable(tableOptions);
            $('#tblCatalogos_filter input[type=search]').focus();

            $('#tblCatalogos tbody').on('click', 'tr', function () {

                $("#tblCatalogos tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = tblSelected.row(this).data();
                temp = parseInt(dtm[0]);
            });

            $('#tblCatalogos tbody').on('dblclick', 'tr', function () {
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
                        url: master_url + 'getCatalogoByID',
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