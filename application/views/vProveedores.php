<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Proveedores</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div id="Proveedores" class="table-responsive">
                <table id="tblProveedores" class="table table-bordered table-striped table-hover display row-border hover order-column" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CLAVE</th> 
                            <th>PROVEEDOR</th> 
                            <th>RFC</th> 
                            <th>ESTATUS</th>  
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>CLAVE</th>
                            <th>PROVEEDOR</th>
                            <th>RFC</th>
                            <th>ESTATUS</th>
                        </tr>
                    </tfoot>
                </table>
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
                        <legend class="float-left">Gestión de Proveedores</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-default" id="btnCancelar">SALIR</button>
                        <button type="button" class="btn btn-primary" id="btnGuardar">GUARDAR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID" required >
                    </div>
                    <div class="col-sm">
                        <label for="Clave">Clave*</label>
                        <input type="text" class=" form-control form-control-sm " maxlength="50" id="Clave" name="Clave" required >
                    </div>
                    <div class="col-sm">
                        <label for="RazonSocial">Razon Social*</label>
                        <input type="text" class=" form-control form-control-sm" maxlength="500" id="RazonSocial" name="RazonSocial" required >
                    </div>
                    <div class="col-sm">
                        <label for="RFC">RFC*</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="15" id="RFC" name="RFC" required >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Direccion">Dirección*</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="150"  id="Direccion" name="Direccion" required >
                    </div>
                    <div class="col-sm">
                        <label for="NoExt">Num. Ext*</label>
                        <input type="text" class="form-control form-control-sm" maxlength="10"  id="NoExt" name="NoExt"  required>
                    </div>
                    <div class="col-sm">
                        <label for="NoInt">Num. Int.</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="10"  id="NoInt" name="NoInt"  >
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm">
                        <label for="Colonia">Colonia</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Colonia" name="Colonia"  >
                    </div>
                    <div class="col-sm">
                        <label for="Ciudad">Ciudad</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Ciudad" name="Ciudad"  >
                    </div>
                    <div class="col-sm">
                        <label for="Estado">Estado</label>
                        <select class="form-control form-control-sm required"  id="Estado" name="Estado" required="">
                            <option value=""></option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                            <option value="Colima">Colima</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Distrito Federal">Distrito Federal</option>
                            <option value="Durango">Durango</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="México">México</option>
                            <option value="Michoacán">Michoacán</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz">Veracruz</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Pais">País</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Colonia" name="Colonia"  >
                    </div>
                    <div class="col-sm">
                        <label for="CP">Código Postal</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="8"  id="CP" name="CP"  >
                    </div>
                    <div class="col-sm">
                        <label for="Telefono">Teléfono</label>
                        <input type="tel" class="form-control form-control-sm" placeholder="4771408263" maxlength="15"  id="Telefono" name="Telefono"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Correo">Correo</label>
                        <input type="email" class="form-control form-control-sm"  maxlength="60"  id="Correo" name="Correo"  >
                    </div>
                    <div class="col-sm">
                        <label for="LimiteCredito">Límite de Crédito</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="15"  id="LimiteCredito" name="LimiteCredito"  >
                    </div>
                    <div class="col-sm">
                        <label for="PlazoPagos">Plazo Pagos</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="15"  id="PlazoPagos" name="PlazoPagos"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="RegimenFiscal">Regimen Fiscal*</label>
                        <select class="form-control form-control-sm "  name="RegimenFiscal" required="">
                            <option value=""></option>
                        </select>
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
                <!-- FOTO -->
                <div for="" align="center">
                    <br>
                    <h3>Puede subir un archivo PDF, imagen (JPG,GIF,PNG) etc.</h3>
                </div>
                <div class="col-md-12" align="center">
                    <input type="file" id="Foto" name="Foto" class="d-none">
                    <button type="button" class="btn btn-default" id="btnArchivo" name="btnArchivo">
                        <span class="fa fa-upload fa-1x"></span> SELECCIONA EL ARCHIVO
                    </button>
                    <br><hr>
                    <div id="VistaPrevia" class="col-md-12" align="center"></div>
                </div>
                <!-- FIN FOTO -->
            </form>
        </div>
    </div>
</div>
<!--SCRIPTS-->
<script>
    var master_url = base_url + 'index.php/Proveedores/';
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = pnlTablero.find("#btnNuevo");
    var pnlDatos = $("#pnlDatos");
    var btnGuardar = $("#btnGuardar");
    var Proveedores, tblProveedores = $('#tblProveedores');
    
    // IIFE - Immediately Invoked Function Expression
    (function (yc) {
        // The global jQuery object is passed as a parameter
        yc(window.jQuery, window, document);
    }(function ($, window, document) {
        // The $ is now locally scoped 
        // Listen for the jQuery ready event on the document
        $(function () {
            // The DOM is ready!
            getRecords();
            btnNuevo.click(function () {
                nuevo = true;
                pnlDatos.removeClass("d-none");
                pnlTablero.addClass("d-none");
                pnlDatos.find("#Clave").focus();
            });

            btnGuardar.click(function () {
                console.log(nuevo);
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
                            pnlDatos.find('#ID').val(data);
                            nuevo = false;
                            getRecords();
                        }).fail(function (x, y, z) { 
                            console.log(x.responseText);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                } else {
                    onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
                }
            });

        });

        function getRecords() {
            HoldOn.open({
                theme: 'sk-cube',
                message: 'CARGANDO...'
            });
            $.fn.dataTable.ext.errMode = 'throw';
            if ($.fn.DataTable.isDataTable('#tblProveedores')) {
                tblProveedores.DataTable().destroy();
                $.getJSON(master_url + 'getRecords').done(function (data) {
                    console.log(data);
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    console.log('getrecords');
                });
                Proveedores = tblProveedores.DataTable({
                    "dom": 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            text: ' <i class="fa fa-file-excel"></i>',
                            titleAttr: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }
                        ,
                        {
                            extend: 'colvis',
                            text: '<i class="fa fa-columns"></i>',
                            titleAttr: 'Seleccionar Columnas',
                            exportOptions: {
                                modifier: {
                                    page: 'current'
                                },
                                columns: ':visible'
                            }
                        }
                    ],
                    "ajax": {
                        "url": master_url + 'getRecords',
                        "dataSrc": ""
                    },
                    "columns": [
                        {"data": "ID"},
                        {"data": "CLAVE"},
                        {"data": "PROVEEDOR"},
                        {"data": "RFC"},
                        {"data": "ESTATUS"}
                    ],
                    language: lang,
                    "autoWidth": true,
                    "colReorder": true,
                    "displayLength": 20,
                    "bLengthChange": false,
                    "deferRender": true,
                    "scrollCollapse": false,
                    "bSort": true,
                    "aaSorting": [
                        [0, 'desc']/*ID*/
                    ]
                });

                tblProveedores.find('tbody').on('click', 'tr', function () {
                    tblProveedores.find("tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = Proveedores.row(this).data();
                    temp = parseInt(dtm.ID);
                });

                tblProveedores.find('tbody').on('dblclick', 'tr', function () {
                    nuevo = false;
                    tblProveedores.find("tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = Proveedores.row(this).data();
                    temp = parseInt(dtm.ID);
                    pnlDatos.removeClass("d-none");
                    pnlTablero.addClass("d-none");
                    HoldOn.open({
                        theme: 'sk-bounce',
                        message: 'CARGANDO...'
                    });
                    $.getJSON(master_url + 'getProveedorByID', {ID: temp}).done(function (data, x, jq) {
                        var l = data[0];
                        pnlDatos.find("#ID").val(l.IDE);
                        pnlDatos.find("#Descripcion").val(l["DESCRIPCIÓN"]);
                        pnlDatos.find("#Estatus")[0].selectize.setValue(l.ESTATUS);
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                });
            }
            HoldOn.close();
        }
    }));
</script>
<style>
    .swal-icon img {
        width: 480px; 
        height: 480px;
    }
</style>
