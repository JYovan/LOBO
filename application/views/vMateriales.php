<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Materiales</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">           
            <div id="Materiales" class="table-responsive">
                <table id="tblMateriales" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
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
    <div class="card border-0  d-none" id="pnlDatos">
        <div class="card-body text-dark"> 
            <form id="frmNuevo">
                <div class="row">
                    <div class="col-md-2 float-left">
                        <legend class="float-left">Materiales</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID" readonly="">
                        <input type="text" class="" id="IdMagnus" name="IdMagnus" readonly="">
                    </div>
                    <div class="col-sm">
                        <label for="Material">Material*</label>  
                        <input type="text" maxlength="15" class="form-control form-control-sm" id="Material" name="Material" required >
                    </div>
                    <div class="col-sm">
                        <label for="Descripcion">Descripción*</label>  
                        <input type="text" class="form-control form-control-sm" id="Descripcion" name="Descripcion" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="UnidadCompra">Unidad de Compra*</label>
                        <select class="form-control form-control-sm required"  name="UnidadCompra" required=""> 
                            <option value=""></option>  
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="UnidadConsumo">Unidad de Consumo*</label>
                        <select class="form-control form-control-sm required"  name="UnidadConsumo" required=""> 
                            <option value=""></option>  
                        </select>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm">
                        <label for="Familia">Familia*</label>
                        <select class="form-control form-control-sm required"  name="Familia" required=""> 
                            <option value=""></option>  
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="Departamento">Departamento*</label>
                        <select class="form-control form-control-sm required"  name="Departamento" required=""> 
                            <option value=""></option>  
                        </select>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm">
                        <label for="Tipo">Tipo*</label>
                        <select class="form-control form-control-sm required"  name="Tipo" required=""> 
                            <option value=""></option>  
                            <option value="DIR">DIRECTO</option>  
                            <option value="IND">INDIRECTO</option>  
                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm">
                        <label for="Minimo">Mínimo</label>  
                        <input type="number" class="form-control form-control-sm" id="Minimo" name="Minimo"  >
                    </div>
                    <div class="col-sm">
                        <label for="Maximo">Máximo</label>  
                        <input type="number" class="form-control form-control-sm" id="Maximo" name="Maximo"  >
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm">
                        <label for="PrecioLista">Precio Lista</label>  
                        <input type="number" class="form-control form-control-sm" id="PrecioLista" name="PrecioLista"  >
                    </div>
                    <div class="col-sm">
                        <label for="PrecioTope">Precio Máximo</label>  
                        <input type="number" class="form-control form-control-sm" id="PrecioTope" name="PrecioTope"  >
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm">
                        <label for="FechaUltimoInventario">Fecha Último Inventario</label>  
                        <input type="text" id="FechaUltimoInventario" name="FechaUltimoInventario" class="form-control form-control-sm" placeholder="XX/XX/XXXX" data-provide="datepicker" data-date-format="dd/mm/yyyy" readonly="">
                    </div>
                    <div class="col-sm">
                        <label for="Existencia">Existencia</label>  
                        <input type="number" class="form-control form-control-sm" id="Existencia" name="Existencia"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-sm required"  name="Estatus" required=""> 
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

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Materiales/';
    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");
    var nuevo = true;

    $(document).ready(function () {
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
                    $.ajax({
                        url: master_url + 'onAgregar',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                        console.log('* JSON *');
                        console.log(data);
                        console.log('* JSON *');
                        var dt = JSON.parse(data);
                        pnlDatos.find('#ID').val(dt.ID);
                        pnlDatos.find('#IdMagnus').val(dt.IDM);
                        nuevo = false;
                        getRecords();
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                }

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
            nuevo = true;
        });

        getRecords();
        getDepartamentos();
        getFamilias();
        getUnidades();
        handleEnter();
    });
    var tblMaterialesX = $("#tblMateriales"), Materiales;
    function getRecords() {
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblMateriales')) {
            tblMaterialesX.DataTable().destroy();
            Materiales = tblMaterialesX.DataTable({
                "dom": 'Bfrtip',
                buttons: buttons,
                "ajax": {
                    "url": master_url + 'getRecords',
                    "dataType": "jsonp",
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "ID"},
                    {"data": "Material"},
                    {"data": "Descripcion"}
                ],
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }],
                language: lang,
                "autoWidth": true,
                "colReorder": true,
                "displayLength": 20,
                "bLengthChange": false,
                "deferRender": true,
                "scrollCollapse": false,
                keys: true,
                "bSort": true,
                "aaSorting": [
                    [0, 'desc']/*ID*/
                ]
            });

            tblMaterialesX.find('tbody').on('click', 'tr', function () {
                tblMaterialesX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Materiales.row(this).data();
                temp = parseInt(dtm.ID);
            });

            tblMaterialesX.find('tbody').on('dblclick', 'tr', function () {
                nuevo = false;
                tblMaterialesX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Materiales.row(this).data();
                temp = parseInt(dtm.ID);
                pnlDatos.removeClass("d-none");
                pnlTablero.addClass("d-none");
                if (temp !== 0 && temp !== undefined && temp > 0) {
                    nuevo = false;
                    HoldOn.open({
                        theme: "sk-bounce",
                        message: "CARGANDO DATOS..."
                    });
                    $.ajax({
                        url: master_url + 'getMaterialByID',
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
                        $.each(data[0], function (k, v) {
                            pnlDatos.find("[name='" + k + "']").val(v);
                            if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                            }
                        });
                        pnlTablero.addClass("d-none");
                        pnlDatos.removeClass('d-none');
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
        }
        HoldOn.close();
    }

    function getDepartamentos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getDepartamentos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Departamento']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getFamilias() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getFamilias',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Familia']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getUnidades() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getUnidades',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='UnidadConsumo']")[0].selectize.addOption({text: v.SValue, value: v.ID});
                pnlDatos.find("[name='UnidadCompra']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

</script>