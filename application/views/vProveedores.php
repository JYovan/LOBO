<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8 float-left">
                <legend class="float-left">Gestión de Proveedores</legend>
            </div>
            <div class="col-sm-4 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div id="Proveedores" class="table-responsive table-sm">
                <table id="tblProveedores" class="table table-bordered table-striped table-hover display row-border hover order-column" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Clave</th>
                            <th>Proveedor</th>
                            <th>RFC</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
                        <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
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
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Pais" name="Pais"  >
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
                    <button type="button" class="btn btn-default" id="btnFoto" name="btnFoto">
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
    var btnCancelar = $("#btnCancelar");
    var Proveedores, tblProveedores = $('#tblProveedores');
    var Foto = pnlDatos.find("#Foto");
    var btnFoto = pnlDatos.find("#btnFoto");
    var VistaPrevia = pnlDatos.find("#VistaPrevia");

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
            getRegimenesFiscales();

            Foto.change(function () {
                $('#Foto').attr("type", "file");
                $('#Foto').val('N');
                HoldOn.open({theme: "sk-bounce", message: "POR FAVOR ESPERE..."});
                var imageType = /image.*/;
                if (Foto[0].files[0] !== undefined && Foto[0].files[0].type.match(imageType)) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = '<button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br><img src="' + reader.result + '" class="img-responsive" width="400px"><div class="caption"><p>' + Foto[0].files[0].name + '</p></div>';
                        VistaPrevia.html(preview);
                    };
                    reader.readAsDataURL(Foto[0].files[0]);
                } else {
                    if (Foto[0].files[0] !== undefined && Foto[0].files[0].type.match('application/pdf')) {
                        var readerpdf = new FileReader();
                        readerpdf.onload = function (e) {
                            VistaPrevia.html('<div><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br> <embed src="' + readerpdf.result + '" type="application/pdf" width="90%" height="800px"' +
                                    ' pluginspage="http://www.adobe.com/products/acrobat/readstep2.html"></div>');
                        };
                        readerpdf.readAsDataURL(Foto[0].files[0]);
                    } else {
                        VistaPrevia.html('EL ARCHIVO SE SUBIRÁ, PERO NO ES POSIBLE RECONOCER SI ES UN PDF O UNA IMAGEN');
                    }
                }
                HoldOn.close();
            });

            btnFoto.on("click", function () {
                Foto.trigger('click');
            });

            btnCancelar.click(function () {
                pnlTablero.removeClass("d-none");
                pnlDatos.addClass('d-none');
                nuevo = true;
                onBeep(3);
            });

            btnNuevo.click(function () {
                nuevo = true;
                pnlDatos.removeClass("d-none");
                pnlTablero.addClass("d-none");
                pnlDatos.find("#Clave").focus();
                pnlDatos.find("input,textarea").val('');
                $.each(pnlDatos.find("select"), function () {
                    $(this)[0].selectize.clear(true);
                });
                pnlDatos.find("#VistaPrevia").html('');
                onBeep(1);
            });

            btnGuardar.click(function () {
                console.log(nuevo);
                isValid('pnlDatos');
                if (valido) {
                    var frm = new FormData(pnlDatos.find("#frmNuevo")[0]);
                    if (!nuevo) {
                        $.getJSON(master_url + 'onComprobarProveedorXRFC', {ID: pnlDatos.find("#ID").val(), RFC: pnlDatos.find("#RFC").val().replace(/\s+/g, '')}).done(function (data, x, jq) {
                            var dtm = data[0];
                            if (parseFloat(dtm.EXISTE) <= 0) {
                                $.ajax({
                                    url: master_url + 'onModificar',
                                    type: "POST",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: frm
                                }).done(function (data, x, jq) {
                                    onBeep(4);
                                    swal('ÉXITO', 'SE HAN MODIFICADO LOS DATOS DEL PROVEEDOR', 'success');
                                    getRecords();
                                }).fail(function (x, y, z) {
                                    console.log(x, y, z);
                                }).always(function () {
                                    HoldOn.close();
                                });
                            } else {
                                swal('ATENCIÓN', 'YA EXISTE UN PROVEEDOR CON ESTE RFC', 'warning');
                                onBeep(2);
                            }
                        }).fail(function (x, y, z) {
                            console.log(x.responseText);
                        }).always(function () {
                            HoldOn.close();
                        });
                    } else {
                        $.getJSON(master_url + 'onComprobarProveedorXRFC', {ID: 0, RFC: pnlDatos.find("#RFC").val().replace(/\s+/g, '')}).done(function (data, x, jq) {
                            var dtm = data[0];
                            if (parseFloat(dtm.EXISTE) <= 0) {
                                if (data[0])
                                    $.ajax({
                                        url: master_url + 'onAgregar',
                                        type: "POST",
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        data: frm
                                    }).done(function (data, x, jq) {
                                        onBeep(4);
                                        swal('ÉXITO', 'SE HA AGREGADO UN NUEVO PROVEEDOR', 'success');
                                        pnlDatos.find('#ID').val(data);
                                        nuevo = false;
                                        getRecords();
                                        btnCancelar.trigger('click');
                                    }).fail(function (x, y, z) {
                                        console.log(x.responseText);
                                    }).always(function () {
                                        HoldOn.close();
                                    });
                            } else {
                                swal('ATENCIÓN', 'YA EXISTE UN PROVEEDOR CON ESTE RFC', 'warning');
                                onBeep(2);
                            }
                        }).fail(function (x, y, z) {
                            console.log(x.responseText);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                } else {
                    onBeep(2);
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
                Proveedores = tblProveedores.DataTable({
                    "dom": 'Bfrtip',
                    buttons: buttons,
                    "ajax": {
                        "url": master_url + 'getRecords',
                        "dataType": "jsonp",
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
                    keys: true,
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
                    onBeep(1);
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
                        console.log(data.length);
                        if (data.length > 0) {
                            var dtm = data[0];
                            pnlDatos.find("input").val("");
                            $.each(pnlDatos.find("select"), function (k, v) {
                                pnlDatos.find("select")[k].selectize.clear(true);
                            });
                            $.each(data[0], function (k, v) {
                                if (k !== 'Foto') {
                                    pnlDatos.find("[name='" + k + "']").val(v);
                                    if (pnlDatos.find("[name='" + k + "']").is('select')) {
                                        pnlDatos.find("[name='" + k + "']")[0].selectize.setValue(v);
                                    }
                                }
                            });
                            /*COLOCAR FOTO*/
                            if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                                var ext = getExt(dtm.Foto);
                                if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                                    pnlDatos.find("#VistaPrevia").html('<div class="col-md-8"></div><div class="col-md-4"><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br></div><img id="trtImagen" src="' + base_url + dtm.Foto + '" class ="img-responsive" width="400px"  onclick="printImg(\' ' + base_url + dtm.Foto + ' \')"  />');
                                }
                                if (ext === "PDF" || ext === "Pdf" || ext === "pdf") {
                                    pnlDatos.find("#VistaPrevia").html('<div class="col-md-8"></div> <div class="col-md-4"><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br></div><embed src="' + base_url + dtm.Foto + '" type="application/pdf" width="90%" height="800px" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">');
                                }
                                if (ext !== "gif" && ext !== "jpg" && ext !== "jpeg" && ext !== "png" && ext !== "PDF" && ext !== "Pdf" && ext !== "pdf") {
                                    pnlDatos.find("#VistaPrevia").html('<h1>NO EXISTE ARCHIVO ADJUNTO</h1>');
                                }
                            } else {
                                pnlDatos.find("#VistaPrevia").html('<h3>NO EXISTE ARCHIVO ADJUNTO</h3>');
                            }
                            /*FIN COLOCAR FOTO*/
                            pnlTablero.addClass("d-none");
                            pnlDatos.removeClass('d-none');
                            $(':input:text:enabled:visible:first').focus();
                        } else {
                            swal('ATENCIÓN', 'EL REGISTRO SOLICITADO NO ESTA DISPONIBLE', 'warning');
                            onBeep(2);
                        }
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                });
            }
            HoldOn.close();
        }

        function getRegimenesFiscales() {
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            $.getJSON(master_url + 'getRegimenesFiscales').done(function (data, x, jq) {
                $.each(data, function (k, v) {
                    pnlDatos.find("[name='RegimenFiscal']")[0].selectize.addOption({text: v.SValue, value: v.ID});
                });
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        }
    }));
    function onRemovePreview(e) {
        $(e).parent().parent("#VistaPrevia").html("");
        pnlDatos.find('#Foto').attr("type", "text");
        pnlDatos.find('#Foto').val('N');
    }
</script>
<style>
    .swal-icon img {
        width: 480px;
        height: 480px;
    }
</style>
