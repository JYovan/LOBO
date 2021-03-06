<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm float-left">
                <legend class="float-left">Gestión de Estilos</legend>
            </div>
            <div class="col-sm float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div id="Registros" class="table-responsive">
                <table id="tblRegistros" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Estilo</th>
                            <th>Linea</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Estilo</th>
                            <th>Linea</th>
                        </tr>
                    </tfoot>
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
                        <legend class="float-left">Estilos</legend>
                    </div>
                    <div class="col-md-7 float-right">
                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-danger btn-sm" id="btnCancelar">SALIR</button>
                        <button type="button" class="btn btn-primary btn-sm" id="btnGuardar">GUARDAR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-none">
                            <input type="text" class="" id="ID" name="ID"  >
                        </div>
                        <div class="row">
                            <div class="col-md has-success">
                                <label for="Clave">Estilo*</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" id="Clave" name="Clave" required="">
                            </div>
                            <div class="col-md">
                                <label for="Descripción">Nombre*</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" id="Descripcion" name="Descripcion" required="">
                            </div>
                            <div class="col-md">
                                <label for="Linea">Linea*</label>
                                <select class="form-control form-control-sm required"   name="Linea" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="Horma">Horma*</label>
                                <select class="form-control form-control-sm required"   name="Horma" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="Genero">Género</label>
                                <select class="form-control form-control-sm"   name="Genero">
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="col-md">
                                <label for="Serie">Serie*</label>
                                <select class="form-control form-control-sm required"  name="Serie" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="Plantilla">Plantilla</label>
                                <select class="form-control form-control-sm"  name="Plantilla">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="GdoDificultad">Dificultad</label>
                                <select class="form-control form-control-sm"   name="GdoDificultad">
                                    <option value=""></option>
                                    <option value="1">1 NORMAL</option>
                                    <option value="2">2 DIFÍCIL</option>
                                    <option value="3">3 EXTREMO</option>
                                </select>
                            </div>

                            <div class="col-md">
                                <label for="FamiliaProg">Fam. Prog*</label>
                                <select class="form-control form-control-sm required"   name="FamiliaProg" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="ConsumoPiel">C. Piel</label>
                                <input type="text" maxlength="3" class="form-control form-control-sm numbersOnly" placeholder=""  name="ConsumoPiel">
                            </div>
                            <div class="col-md">
                                <label for="ConsumoForro">C. Forro</label>
                                <input type="text" maxlength="3" class="form-control form-control-sm numbersOnly" placeholder=""  name="ConsumoForro">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="Liberado">Liberado</label>
                                <select class="form-control form-control-sm"   name="Liberado">
                                    <option value=""></option>
                                    <option value="1">1 PARA DISEÑO</option>
                                    <option value="2">2 PARA PRODUCCIÓN</option>
                                    <option value="3">3 INACTIVO</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="Herramental">Herramental</label>
                                <select class="form-control form-control-sm"   name="Herramental">
                                    <option value=""></option>
                                    <option value="1">1 PATRÓN BASE</option>
                                    <option value="2">2 CARTÓN Y TESEO</option>
                                    <option value="3">3 TESEO</option>
                                    <option value="4">4 SUAJE</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="Maquila">Maquila</label>
                                <select class="form-control form-control-sm"  name="Maquila">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="Desperdicio">Desperdicio</label>
                                <input type="text" maxlength="3" class="form-control form-control-sm numbersOnly"  id="Desperdicio" name="Desperdicio">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="Ano">Año*</label>
                                <input type="text" class="form-control form-control-sm numbersOnly" placeholder="" id="Ano" name="Ano" maxlength="4" required="">
                            </div>
                            <div class="col-md">
                                <label for="Temporada">Temporada*</label>
                                <select class="form-control form-control-sm required"   name="Temporada" required="">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="PuntoCentra">Punto Central</label>
                                <input type="text" class="form-control form-control-sm"  id="PuntoCentral" name="PuntoCentral">
                            </div>
                            <div class="col-md">
                                <label for="Tipo">Tipo*</label>
                                <select class="form-control form-control-sm required"   name="Tipo" required="">
                                    <option value=""></option>
                                    <option value="0">0 PRODUCCIÓN</option>
                                    <option value="1">1 PROTOTIPO</option>
                                    <option value="2">2 MUESTRA</option>
                                    <option value="3">3 EXTENCIÓN</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="Notas">Observaciones</label>
                                <input type="text" class="form-control form-control-sm" placeholder="" id="Notas" name="Notas">
                            </div>
                        </div>


                        <div class="card-header" id="headingOne" align="center">
                            <h5 class="mb-0">
                                <a class="btn btn-info btn-sm" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span>Datos etiqueta trasabalidad</span>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="row">
                                <div class="col-md">
                                    <label for="GdoDificultad">Tam. Etiqueta</label>
                                    <select class="form-control form-control-sm"   name="TamEtiTras">
                                        <option value=""></option>
                                        <option value="0">0 - SIN ETIQUETA</option>
                                        <option value="1">1 - 3X3.5</option>
                                        <option value="2">2 - 1.5X3</option>
                                    </select>
                                </div>
                                <div class="col-md">
                                    <label for="PielEtiTras">Piel</label>
                                    <input type="text" class="form-control form-control-sm" name="PielEtiTras">
                                </div>
                                <div class="col-md">
                                    <label for="ForroEtiTras">Forro</label>
                                    <input type="text" class="form-control form-control-sm"  name="ForroEtiTras">
                                </div>
                                <div class="col-md">
                                    <label for="SuelaEtiTras">Suela</label>
                                    <input type="text" class="form-control form-control-sm"   name="SuelaEtiTras">
                                </div>
                                <div class="col-md">
                                    <label for="TipoConstruccionEtiTras">Tipo Construcción</label>
                                    <select class="form-control form-control-sm"   name="TipoConstruccionEtiTras">
                                        <option value=""></option>
                                        <option value="1">1 OPANCA</option>
                                        <option value="2">2 PEGADO</option>
                                        <option value="3">3 OPANCA Y PEGADO</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md">
                                <label for="Estatus">Estatus*</label>
                                <select class="form-control form-control-sm required"   name="Estatus" required="">
                                    <option value=""></option>
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="file" id="Foto" name="Foto" class="d-none">
                        <button type="button" class="btn btn-default" id="btnArchivo" name="btnArchivo">
                            <span class="fa fa-upload fa-1x"></span> SELECCIONA EL ARCHIVO
                        </button>
                        <br><hr>
                        <div id="VistaPrevia" class="col-md-12" align="center"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Estilos/';
    var pnlDatos = $("#pnlDatos");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnModificar = pnlDatos.find("#btnGuardar");
    var btnEliminar = $("#btnEliminar");
    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
    var mdlConfirmar = $("#mdlConfirmar");
    var Archivo = $("#Foto");
    var btnArchivo = $("#btnArchivo");
    var VistaPrevia = $("#VistaPrevia");
    var nuevo = true;

    $(document).ready(function () {

        btnArchivo.on("click", function () {
            $('#Foto').attr("type", "file");
            $('#Foto').val('');
            Archivo.change(function () {
                HoldOn.open({theme: "sk-bounce", message: "POR FAVOR ESPERE..."});
                var imageType = /image.*/;
                if (Archivo[0].files[0] !== undefined && Archivo[0].files[0].type.match(imageType)) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var preview = '<button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br><img src="' + reader.result + '" class="img-responsive" width="300px"><div class="caption"><p>' + Archivo[0].files[0].name + '</p></div>';
                        VistaPrevia.html(preview);
                    };
                    reader.readAsDataURL(Archivo[0].files[0]);
                } else {
                    if (Archivo[0].files[0] !== undefined && Archivo[0].files[0].type.match('application/pdf')) {

                        var readerpdf = new FileReader();
                        readerpdf.onload = function (e) {
                            VistaPrevia.html('<div><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br> <embed src="' + readerpdf.result + '" type="application/pdf" width="90%" height="800px"' +
                                    ' pluginspage="http://www.adobe.com/products/acrobat/readstep2.html"></div>');
                        };
                        readerpdf.readAsDataURL(Archivo[0].files[0]);
                    } else {
                        VistaPrevia.html('EL ARCHIVO SE SUBIRÁ, PERO NO ES POSIBLE RECONOCER SI ES UN PDF O UNA IMAGEN');
                    }
                }
                HoldOn.close();
            });
            Archivo.trigger('click');
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
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'REGISTRO ELIMINADO', 'danger');
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
                        pnlDatos.find('#ID').val(data);
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
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatos.find("input").val("");
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            nuevo = true;
            $(':input:text:enabled:visible:first').focus();
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            nuevo = true;
        });
        /*CALLS*/
        handleEnter();
        getRecords();
        getPlantillas();
        getGeneros();
        getFamiliasProg();
        getHormas();
        getTemporadas();
        getMaquilas();
        getLineas();
        getSeries();
    });
    var tblRegistrosX = $("#tblRegistros"), Registros;
    function getRecords() {
        $.fn.dataTable.ext.errMode = 'throw';
        if ($.fn.DataTable.isDataTable('#tblRegistros')) {
            tblRegistrosX.DataTable().destroy();
            Registros = tblRegistrosX.DataTable({
                "dom": 'Bfrtip',
                buttons: buttons,
                "ajax": {
                    "url": master_url + 'getRecords',
                    "dataType": "jsonp",
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "ID"},
                    {"data": "Estilo"},
                    {"data": "Linea"}
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


            $('#tblRegistros_filter input[type=search]').focus();

            $('#tblRegistros tfoot th').each(function () {
                console.log($(this));
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar por ' + title + '" class="form-control form-control-sm" style="width: 100%;"/>');
            });

            Registros.columns().every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });

            tblRegistrosX.find('tbody').on('click', 'tr', function () {
                tblRegistrosX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Registros.row(this).data();
                temp = parseInt(dtm.ID);
            });

            tblRegistrosX.find('tbody').on('dblclick', 'tr', function () {
                tblRegistrosX.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var id = this.id;
                var index = $.inArray(id, selected);
                if (index === -1) {
                    selected.push(id);
                } else {
                    selected.splice(index, 1);
                }
                var dtm = Registros.row(this).data();
                if (temp !== 0 && temp !== undefined && temp > 0) {
                    nuevo = false;
                    HoldOn.open({
                        theme: "sk-bounce",
                        message: "CARGANDO DATOS..."
                    });
                    $.ajax({
                        url: master_url + 'getEstiloByID',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            ID: temp
                        }
                    }).done(function (data, x, jq) {
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
                            if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                                var ext = getExt(dtm.Foto);
                                if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                                    pnlDatos.find("#VistaPrevia").html('<div class="col-md-4"><button type="button" class="btn btn-default" id="btnQuitarVP" name="btnQuitarVP" onclick="onRemovePreview(this)"><span class="fa fa-times fa-2x danger-icon"></span></button><br></div><img id="trtImagen" src="' + base_url + dtm.Foto + '" class ="img-responsive" width="300px"  onclick="printImg(\' ' + base_url + dtm.Foto + ' \')"  />');
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
                            pnlTablero.addClass("d-none");
                            pnlDatos.removeClass('d-none');
                            $(':input:text:enabled:visible:first').focus();
                        }
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
    function getFamiliasProg() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getFamiliasProg',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='FamiliaProg']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getGeneros() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getGeneros',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Genero']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getPlantillas() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getPlantillas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Plantilla']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getHormas() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getHormas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Horma']")[0].selectize.addOption({text: v.SValue, value: v.ID});
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
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Temporada']")[0].selectize.addOption({text: v.SValue, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getLineas() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getLineas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Linea']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getMaquilas() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getMaquilas',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Maquila']")[0].selectize.addOption({text: v.Nombre, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    function getSeries() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getSeries',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Serie']")[0].selectize.addOption({text: v.Clave, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function onRemovePreview(e) {
        $(e).parent().parent("#VistaPrevia").html("");
        $('#Foto').trigger('blur');
        $('#Foto').on('blur', function (e) {
            $('#Foto').val('');
        });
    }

    function printImg(url) {
        var win = window.open('');
        win.document.write('<img src="' + url + '" onload="window.print();window.close()" />');
        win.focus();
    }
</script>
