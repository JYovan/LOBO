<div class="card border-0" id="pnlTablero">
    <div class="card-body ">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Pedidos</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnEliminar" data-toggle="tooltip" data-placement="top" title="Eliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div class="d-none" id="pnlDatos">
    <div class="card border-0">
        <div class="card-body text-dark customBackground" >
            <div class="row">
                <div class="col-md-6 float-left">
                    <h5>PEDIDO</h5>
                </div>
                <div class="col-md-6 float-right" align="right">
                    <button type="button" onclick="" class="btn btn-info btn-sm" id="btnImprimirPedido"><span class="fa fa-barcode"></span> IMPRIMIR</button>
                    <button type="button" class="btn btn-danger btn-sm" id="btnCancelar"><span class="fa fa-window-close"></span> SALIR</button>
                    <button type="button" class="btn btn-primary btn-sm" id="btnGuardar"><span class="fa fa-save"></span> GUARDAR</button>
                </div>
            </div>
            <hr>
            <div id="Encabezado">
                <form id="frmNuevo">
                    <div class="row">
                        <div class="d-none">
                            <input type="text" class="" id="ID" name="ID"  >
                        </div>
                        <div class="col-12 col-md-1">
                            <label for="Folio">No.*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" id="Folio" name="Folio" disabled="">
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="Cliente">Cliente* (F9) Actualizar</label>
                            <div class="input-group mb-3">
                                <select class="form-control form-control-sm required" id="Cliente" name="Cliente">
                                    <option value=""></option>
                                </select>
                                <div class="input-group-prepend">
                                    <a href="<?php print base_url('Clientes') ?>" target="_blank" class="input-group-text text-dark" data-toggle="tooltip" data-placement="top" title="Ver Clientes"><i class="fa fa-users"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-12">
                            <label for="Agente                                                                                                              ">Agente</label>
                            <select class="form-control form-control-sm" id="Agente" name="Agente">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="FechaMov">Fec Pedido*</label>
                            <input type="text" class="form-control form-control-sm required  notEnter" name="FechaPedido" id="FechaPedido" >

                        </div>
                        <div class="col-sm-2 col-12">
                            <label for="FechaMov">Fec Recep*</label>
                            <input type="text" class="form-control form-control-sm required notEnter" id="FechaRec" name="FechaRec" >
                        </div>
                        <div class="col-sm-2 col-12">
                            <label for="RecibioX">Recibido*</label>
                            <select class="form-control form-control-sm " id="RecibioX" name="RecibioX" required="">
                                <option value=""></option>
                                <option value="1">1 AGENTE</option>
                                <option value="2">2 FAX</option>
                                <option value="3">3 TEL</option>
                                <option value="4">4 PER</option>
                                <option value="5">5 INT</option>
                            </select>
                        </div>

                    </div>
                </form>
            </div>
            <!--GENERAL DETALLE-->
            <div class=" d-none" id="pnlDatosDetalle">
                <!--CONTROLES DETALLE-->
                <div id="ControlesDetalle">
                    <div class="row">
                        <div class="col-sm-1">
                            <label for="Clave">% Desc.</label>
                            <input type="text" class="form-control form-control-sm numbersOnly " maxlength="4" id="Desc" name="Desc"  >
                        </div>
                        <div class="col-sm-2">
                            <label for="Estilo">Estilo*</label>
                            <select class="form-control form-control-sm "  name="Estilo" required="">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="Combinacion">Color*</label>
                            <select class="form-control form-control-sm "  name="Combinacion" required="">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-sm-2 col-12">
                            <label for="FechaMov">Fec Entrega*</label>
                            <input type="text" class="form-control form-control-sm required notEnter" id="FechaEntrega" name="FechaEntrega" >
                        </div>

                        <div class="col-sm-1">
                            <label for="Maquila">Maq</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" maxlength="2" name="Maquila" >
                        </div>
                        <div class="col-sm-1">
                            <label for="Semana">Sem</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" maxlength="2" name="Semana" >
                        </div>
                        <div class="col-sm-1">
                            <label for="Recio">Recio</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" name="Recio" >
                        </div>
                        <div class="col-sm-1">
                            <label for="PMaq">P. Maq</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" name="PMaq" >
                        </div>
                        <div class="col-sm-1">
                            <label for="Precio">Precio</label>
                            <input type="text" class="form-control form-control-sm numbersOnly" maxlength="9" name="Precio" >
                        </div>


                    </div>
                    <!--TALLAS-->
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="Mayoreo">Tallas</label>
                            <table id="tblTallas" class="table Tallas" style="overflow-x:auto; white-space: nowrap;">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T1"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T2"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T3"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T4"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T5"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T6"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T7"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T8"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T9"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T10"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T11"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T12"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T13"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T14"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T15"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T16"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T17"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T18"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T19"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T20"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T21"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" disabled="" name="T22"></td>
                                        <td>Pares</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex1"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex2"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex3"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex4"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex5"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex6"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex7"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex8"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex9"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex10"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex11"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex12"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex13"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex14"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex15"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex16"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex17"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex18"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex19"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex20"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex21"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="Ex22"></td>
                                        <td><input type="text" style="width: 55px;" maxlength="4" class="numbersOnly" disabled=""  name="TPares"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <br>
                <!--REGISTROS DETALLE-->
                <div class="" id="pnlDetalle">
                    <div class="row">
                        <div class=" col-md-12 ">
                            <div class="row">
                                <div class="table-responsive" id="RegistrosDetalle">

                                </div>
                            </div>
                            <div class="" align="center" style="background-color: #fff ">
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-2 text-dark">
                                    </div>

                                    <div class="col-sm-2 text-warning">

                                    </div>
                                    <div class="col-sm-2 text-danger">

                                    </div>
                                    <div class="col-sm-2 text-info">
                                        Pares<br>
                                        <div id="Pares"><strong>0</strong></div>
                                    </div>
                                    <div class="col-sm-2 text-success">
                                        Importe<br>
                                        <div id="Importe"><strong>0</strong></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!--FIN DETALLE-->
                </div>

            </div>
        </div>
    </div>
</div>
<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Pedidos/';
    var pnlDatos = $("#pnlDatos");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var nuevo = true;
    /*DATATABLE GLOBAL*/
    var tblInicial = {
        "dom": 'frt',
        "autoWidth": true,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollCollapse": true,
        "bSort": true,
        "aaSorting": [
            [0, 'desc']/*ID*/
        ],
        language: {
            search: "Buscar:"
        }
    };

    $(document).ready(function () {

        //Mascaras fechas
        pnlDatos.find("#FechaPedido").inputmask({alias: "date"});
        pnlDatos.find("#FechaRec").inputmask({alias: "date"});
        pnlDatos.find("#FechaEntrega").inputmask({alias: "date"});

        //Evento que controla la insercion de filas a la tabla cuando se termina de capturar los pares
        $.each(pnlDatosDetalle.find("#tblTallas > tbody > tr").find("input.numbersOnly"), function () {
            $(this).keyup(function (e) {
                if (e.keyCode === 13) {
                    var Estilo = pnlDatosDetalle.find("[name='Estilo']");
                    var Combinacion = pnlDatosDetalle.find("[name='Combinacion']");
                    var talla = pnlDatosDetalle.find("#tblTallas > tbody > tr").find("input").eq($(this).parent().index()).val();
                    if (talla <= 0 && Estilo.val() !== '' && Combinacion.val() !== '') {
                        onAgregarFila();
                        $("[name='Estilo']")[0].selectize.focus();
                        $("[name='Estilo']")[0].selectize.clear(true);
                        $("[name='Combinacion']")[0].selectize.clear(true);
                        $("[name='Combinacion']")[0].selectize.clearOptions();
                    }
                }
                onAutoSumarPares();
            });
        });

        //Evento en el select de estilo para traer las tallas y los colores
        pnlDatosDetalle.find("[name='Estilo']").change(function () {
            $("[name='Combinacion']")[0].selectize.clear(true);
            $("[name='Combinacion']")[0].selectize.clearOptions();
            getCombinacionesXEstilo($(this).val());
            getSerieXEstilo($(this).val());
        });

        pnlDatosDetalle.find("[name='Combinacion']").change(function () {
            onComprobarEstiloCombinacion(pnlDatosDetalle.find("[name='Estilo']").val(), pnlDatosDetalle.find("[name='Combinacion']").val());
        });
        //Evento botones
        btnGuardar.click(function () {
            swal({
                buttons: ["Cancelar", "Aceptar"],
                title: 'Estas Seguro?',
                text: "Al guardar el movimiento ya no podrás realizar cambios",
                icon: "info"
            }).then((result) => {
                if (result) {
                    isValid('pnlDatos');
                    if (valido) {
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "GUARDANDO DATOS..."
                        });
                        var f = new FormData(pnlDatos.find("#frmNuevo")[0]);
                        if (!nuevo) {
                            $.ajax({
                                url: master_url + 'onModificar',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: f
                            }).done(function (data, x, jq) {
                                $('#Encabezado').addClass('disabledForms');
                                $('#ControlesDetalle').addClass('disabledForms');
                                btnGuardar.addClass('d-none');
                                swal('INFO', 'EXISTENCIAS ACTUALIZADAS', 'success');

                                onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA MODIFICADO EL REGISTRO', 'success');
                                getRecords();
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                            });
                        } else {
                            /*AGREGAR DETALLE*/
                            var detalle = [];
                            //Destruye la instancia de datatable
                            tblDetalleCompra.destroy();
                            //Iteramos en la tabla natural
                            pnlDatosDetalle.find("#tblDetalle > tbody > tr").each(function (k, v) {
                                var row = $(this).find("td");
                                //Se declara y llena el objeto obteniendo su valor por el indice y se elimina cualquier espacio
                                var material = {
                                    Estilo: row.eq(0).text().replace(/\s+/g, ''),
                                    Color: row.eq(1).text().replace(/\s+/g, ''),
                                    Precio: row.eq(6).text().replace(/\s+/g, '').replace(/,/g, "").replace("$", ""),
                                    Talla: row.eq(4).text().replace(/\s+/g, ''),
                                    Cantidad: (row.eq(5).text().replace(/\s+/g, '') !== '') ? row.eq(5).text().replace(/\s+/g, '') : 0,
                                    Subtotal: (row.eq(7).text().replace(/\s+/g, '') !== '') ? getNumberFloat(row.eq(7).text()) : 0,
                                    EsCoTa: row.eq(10).text().replace(/\s+/g, '')
                                };
                                //Se mete el objeto al arreglo
                                detalle.push(material);
                            });
                            //Convertimos a cadena el objeto en formato json
                            f.append('Detalle', JSON.stringify(detalle));
                            f.append('Existencias', JSON.stringify(existencias));
                            $.ajax({
                                url: master_url + 'onAgregar',
                                type: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: f
                            }).done(function (data, x, jq) {
                                nuevo = false;
                                pnlDatos.find('#ID').val(data);
                                $('#Encabezado').addClass('disabledForms');
                                $('#ControlesDetalle').addClass('disabledForms');
                                btnGuardar.addClass('d-none');
                                onNotify('<span class="fa fa-check fa-lg"></span>', 'SE HA AÑADIDO UN NUEVO REGISTRO', 'success');
                                getRecords();
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {
                                HoldOn.close();
                            });
                        }
                    } else {
                        onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
                    }
                }
            });
        });
        btnNuevo.click(function () {
            pnlTablero.addClass("d-none");
            pnlDatos.removeClass('d-none');
            pnlDatosDetalle.removeClass('d-none');
            pnlDatos.find("input").val("");
            $('#Encabezado').removeClass('disabledForms');
            $('#ControlesDetalle').removeClass('disabledForms');
            btnGuardar.removeClass('d-none');
            $.each(pnlDatos.find("select"), function (k, v) {
                pnlDatos.find("select")[k].selectize.clear(true);
            });
            $(':input:text:enabled:visible:first').focus();
            nuevo = true;
        });
        btnCancelar.click(function () {
            pnlTablero.removeClass("d-none");
            pnlDatos.addClass('d-none');
            pnlDatosDetalle.addClass('d-none');
            nuevo = true;
        });
        btnEliminar.click(function () {
            if (temp !== 0 && temp !== undefined && temp > 0) {
                swal({
                    title: "Confirmar",
                    text: "Deseas eliminar el registro?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
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
                            if (data === '1') {
                                swal("Hecho", "El registro se ha eliminado!", 'success')
                                getRecords();
                            } else {
                                swal("Error al borrar registro!", "El movimiento ya afectó el inventario", "info");
                            }
                        }).fail(function (x, y, z) {
                            console.log(x, y, z);
                        }).always(function () {
                            HoldOn.close();
                        });
                    }
                });
            } else {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
            }
        });
        getRecords();
        getEstilos();
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
            if (data.length > 0) {
                $("#tblRegistros").html(getTable('tblPedidos', data));
                $('#tblPedidos tfoot th').each(function () {
                    $(this).html('');
                });
                var thead = $('#tblPedidos thead th');
                var tfoot = $('#tblPedidos tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                $.each($.find('#tblPedidos tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                });
                var tblSelected = $('#tblPedidos').DataTable(tableOptions);
                $('#tblPedidos_filter input[type=search]').focus();
                $('#tblPedidos tbody').on('click', 'tr', function () {

                    $("#tblPedidos tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var dtm = tblSelected.row(this).data();
                    temp = parseInt(dtm[0]);
                });
                $('#tblPedidos tbody').on('dblclick', 'tr', function () {
                    $("#tblPedidos tbody tr").removeClass("success");
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
                        nuevo = false;
                        HoldOn.open({
                            theme: "sk-bounce",
                            message: "CARGANDO DATOS..."
                        });
                        $.ajax({
                            url: master_url + 'getPedidoByID',
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
                            //Cargar Detalle

                            /*FIN DETALLE*/

                            //Validar que este afectado
                            if (data[0].Estatus === 'AFECTADO') {
                                $('#Encabezado').addClass('disabledForms');
                                $('#ControlesDetalle').addClass('disabledForms');
                                btnGuardar.addClass('d-none');
                            } else {
                                $('#Encabezado').addClass('disabledForms');
                                $('#ControlesDetalle').addClass('disabledForms');
                                btnGuardar.removeClass('d-none');

                            }
                            /*MOSTRAR PANEL PRINCIPAL*/
                            pnlTablero.addClass("d-none");
                            pnlDatos.removeClass('d-none');
                            pnlDatosDetalle.removeClass("d-none");

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
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getSerieXEstilo(Estilo) {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getSerieXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {


            if (data.length > 0) {
                var c = 0;
                //var dEstilo = data[0];
                //pnlControlesDetalle.find("[name='Precio']").val(dEstilo.PrecioLista);
                $.each(data[0], function (k, v) {

                    var Cant = k.replace('T', 'Ex');
                    if (parseInt(v) <= 0) {
                        pnlDatosDetalle.find("[name='" + k + "']").val('');
                        pnlDatosDetalle.find("[name='" + k + "']").prop("disabled", 'disabled');

                    } else if (parseInt(v) > 0) {
                        pnlDatosDetalle.find("[name='" + k + "']").val(v);
                    }


                });
            } else {
                pnlDatosDetalle.find('#tblTallas').find("input").val("");
                pnlDatosDetalle.find("[name='Precio']").val("");
            }

        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getCombinacionesXEstilo(Estilo) {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getCombinacionesXEstilo',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatosDetalle.find("[name='Combinacion']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
            pnlDatosDetalle.find("[name='Combinacion']")[0].selectize.open();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getEstilos() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getEstilos',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatosDetalle.find("[name='Estilo']")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }
    /*AUTOSUMAR PARES*/
    function onAutoSumarPares() {
        var rows = pnlDatosDetalle.find("#tblTallas > tbody > tr");
        var pares = 0;
        $.each(rows.find("input.numbersOnly:enabled"), function () {
            if (rows.find("input").eq($(this).parent().index()).val() > 0) {
                var par = parseInt($(this).val());
                if (par > 0) {
                    pares += par;
                }
            } else {
                $(this).val('');
            }
        });
        pnlDatosDetalle.find("input[name='TPares']").val(pares);
    }
    /*FIN AUTOSUMAR PARES*/
    /*AGREGAR ESTILO-COLOR*/
    var n = 1;
    function onAgregarFila() {
        n = (n > 0) ? n : 1;
        var rows = pnlDatosDetalle.find("#tblTallas > tbody > tr");
        var Estilo = pnlDatosDetalle.find("[name='Estilo']");
        var Combinacion = pnlDatosDetalle.find("[name='Combinacion']");
        var Costo = pnlDatosDetalle.find("[name='Precio']");

        if (Costo.val() !== '' && parseFloat(Costo.val()) > 0) {
            /*COMPROBAR ESTILO Y COMBINACION*/
            var estilo_combinacion_existen = false;
            $.each(tblDetalleCompra.rows().data(), function () {
                var xEstilo = $(this)[1];
                var xCombinacion = $(this)[2];
                if (xEstilo === Estilo.val() && xCombinacion === Combinacion.val()) {
                    estilo_combinacion_existen = true;
                    return false;
                }
            });
            /*FIN COMPROBAR ESTILO Y COMBINACION*/
            /*VALIDAR ESTILO Y COMBINACION*/
            if (!estilo_combinacion_existen) {
                if (Estilo.val() !== ''
                        && Combinacion.val() !== ''
                        && Estilo.find("option:selected").text() !== ''
                        && Combinacion.find("option:selected").text() !== '') {
                    $.each(rows.find("input.numbersOnly:enabled"), function () {
                        var talla = rows.find("input").eq($(this).parent().index()).val();
                        if (talla > 0 && Estilo.val() !== ''
                                && Combinacion.val() !== ''
                                && Estilo.find("option:selected").text() !== ''
                                && Combinacion.find("option:selected").text() !== '') {
                            var par = parseInt($(this).val());
                            if (par > 0) {
                                var cbTalla = talla;
                                if (cbTalla.length <= 2) {
                                    cbTalla = padLeft(talla, 4);
                                }

                                var EsCoTa;
                                EsCoTa = padLeft(Estilo.val(), 5) + '' + padLeft(Combinacion.val(), 2) + '' + cbTalla;
                                tblDetalleCompra.row.add([
                                    Estilo.val(),
                                    Combinacion.val(),
                                    Estilo.find("option:selected").text(),
                                    Combinacion.find("option:selected").text(),
                                    talla,
                                    $(this).val(),
                                    "$" + $.number(Costo.val(), 2, '.', ','),
                                    "$" + $.number((par * Costo.val()), 2, '.', ','),
                                    0,
                                    n,
                                    EsCoTa
                                ]).draw(false);
                                $(this).val('');
                                n += 1;
                            }
                        }
                    });
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'REGISTROS AGREGADOS', 'success');
                    onCalcularMontos();
                } else {
                    swal('ATENCIÓN', 'YA SE HA AGREGADO ESTA COMBINACIÓN', 'warning');
                    onBeep(2);
                }
            } else {
                swal('ATENCIÓN', 'YA SE HA AGREGADO ESTA COMBINACIÓN', 'warning');
                onBeep(2);
            }
            /*VALIDAR ESTILO Y COMBINACION*/
        } else {
            onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN COSTO', 'danger');
            pnlDatos.find("input[name='PrecioMov']").focus();
        }

    }

    function onCalcularMontos() {
        var pares = 0;
        var total = 0.0;
        $.each(tblDetalleCompra.rows().data(), function () {
            pares += parseInt($(this)[5]);
            total += getNumberFloat($(this)[7]);
        });
        if (pnlDatosDetalle.find("#tblDetalle > tbody > tr").length > 1) {
            pnlDatosDetalle.find("#Pares").find("strong").text(pares);
            pnlDatosDetalle.find("#SubTotal").find("strong").text('$' + $.number(total, 2, '.', ','));
        }
        if (parseInt(pnlDatos.find("input[name='TipoDoc']").val()) === 1) {
            pnlDatosDetalle.find("#IVA").find("strong").text('$' + $.number(total * 0.16, 2, '.', ','));
            pnlDatosDetalle.find("#Total").find("strong").text('$' + $.number(total * 1.16, 2, '.', ','));
        } else {
            pnlDatosDetalle.find("#IVA").find("strong").text('$' + $.number(0, 2, '.', ','));
            pnlDatosDetalle.find("#Total").find("strong").text('$' + $.number(total, 2, '.', ','));
        }
    }

</script>