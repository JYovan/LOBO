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
                            <label for="Folio">Folio*</label>
                            <input type="text" class="form-control form-control-sm numbersOnly " maxlength="10" id="Folio" name="Folio" required="">
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
                            <select class="form-control form-control-sm required" id="Agente" name="Agente">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="FechaMov">Fec Pedido*</label>
                            <input type="text" class="form-control form-control-sm notEnter" name="FechaPedido" id="FechaPedido" required="">

                        </div>
                        <div class="col-sm-2 col-12">
                            <label for="FechaMov">Fec Recep*</label>
                            <input type="text" class="form-control form-control-sm notEnter" id="FechaRec" name="FechaRec" required="">
                        </div>
                        <div class="col-sm-2 col-12">
                            <label for="RecibioX">Recibido*</label>
                            <select class="form-control form-control-sm required" id="RecibidoX" name="RecibidoX">
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
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-sm required notEnter" id="FechaEntrega" name="FechaEntrega" >
                                <div class="input-group-prepend">
                                    <span onclick="onGuardarObservaciones()" class="input-group-text text-dark" data-toggle="tooltip" data-placement="top" title="Observaciones"><i class="fa fa-comment-alt"></i></span>
                                </div>
                            </div>
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
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C1"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C2"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C3"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C4"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C5"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C6"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C7"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C8"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C9"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C10"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C11"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C12"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C13"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C14"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C15"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C16"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C17"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C18"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C19"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C20"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C21"></td>
                                        <td><input type="text" style="width: 35px;" class="numbersOnly" maxlength="3"  name="C22"></td>
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
    var idMov = 0;
    /*DATATABLE GLOBAL*/
    var tblInicial = {
        "dom": 'frt',
        "autoWidth": false,
        "displayLength": 500,
        "colReorder": true,
        "bLengthChange": false,
        "deferRender": true,
        "scrollY": 220,
        "scrollX": true,
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
                        btnGuardar.trigger('click');
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
        //Evento botones
        btnGuardar.click(function () {
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
                        onAgregarFila();
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
                        data: f
                    }).done(function (data, x, jq) {
                        nuevo = false;
                        pnlDatos.find('#ID').val(data);
                        idMov = data;
                        onAgregarFila();
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
                            getRecords();
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
        getClientes();
        getEstilos();
        getAgentes();
        handleEnter();
    });
    var cellEstilo = 0;
    var tblDetalleCaptura;
    var observaciones = '';

    function onGuardarObservaciones() {
        swal({
            text: 'Observaciones',
            content: "input",
            button: {
                text: "Aceptar",
                closeModal: true
            }
        }).then((Observaciones) => {
            observaciones = Observaciones.toUpperCase();
            pnlDatosDetalle.find("[name='Precio']").focus();
        });
    }

    function getDetalleByID(IDX) {
        $.ajax({
            url: master_url + 'getDetalleByID',
            type: "POST",
            dataType: "JSON",
            data: {
                ID: IDX
            }
        }).done(function (data, x, jq) {
            if (data.length > 0) {
                pnlDatosDetalle.find("#RegistrosDetalle").html(getTable('tblRegistrosDetalle', data));
                $('#tblRegistrosDetalle tfoot th').each(function () {
                    $(this).addClass("d-none");
                });
//                $('#tblRegistrosDetalle thead th').each(function () {
//                    $(this).addClass("d-none");
//                });
                var thead = $('#tblRegistrosDetalle thead th');
                var tfoot = $('#tblRegistrosDetalle tfoot th');
                thead.eq(0).addClass("d-none");
                tfoot.eq(0).addClass("d-none");
                thead.eq(1).addClass("d-none");
                tfoot.eq(1).addClass("d-none");
                thead.eq(2).addClass("d-none");
                tfoot.eq(2).addClass("d-none");
                $.each($('#tblRegistrosDetalle tbody tr'), function (k, v) {
                    var td = $(v).find("td");
                    td.eq(0).addClass("d-none");
                    td.eq(1).addClass("d-none");
                    td.eq(2).addClass("d-none");
                });
                $.each($('#tblRegistrosDetalle tbody tr td:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3)):not(:nth-child(4)):not(:nth-child(5)):not(:nth-child(6)):not(:nth-child(29)):not(:nth-child(30)):not(:nth-child(31)):not(:nth-child(32)):not(:nth-child(33))'), function (k, v) {
                    if (parseFloat($(this).text()) === 0) {
                        $(this).text('-');
                    } else if (parseFloat($(this).text()) > 0) {
                        $(this).addClass('exists');
                    }
                });
                $.each($('#tblRegistrosDetalle tbody tr td:nth-child(32)'), function (k, v) {
                    $(this).addClass('red');
                });
                tblDetalleCaptura = pnlDatosDetalle.find("#tblRegistrosDetalle").DataTable(tblInicial);
                //Sombreado de la fila
                pnlDatosDetalle.find('#tblRegistrosDetalle tbody').on('click', 'tr', function () {
                    //Recrea los encabezados, desocultando solo los necesarios
                    $('#tblRegistrosDetalle thead th:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3))').each(function () {
                        $(this).removeClass("d-none");
                    });
                    var thead = $('#tblRegistrosDetalle thead th');
                    thead.eq(3).text('');
                    thead.eq(4).text('');
                    thead.eq(5).text('Serie');
                    thead.eq(28).text('');
                    thead.eq(29).text('');
                    thead.eq(30).text('');
                    thead.eq(31).text('');
                    thead.eq(32).text('');
                    $("#tblRegistrosDetalle tbody tr").removeClass("success");
                    $(this).addClass("success");
                    var cells = $(this).find("td");
                    cellEstilo = cells.eq(1).text();
                    $.ajax({
                        url: master_url + 'getEncabezadoSerieXEstilo',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            Estilo: cellEstilo
                        }
                    }).done(function (data, x, jq) {
                        var cont = 6;
                        $.each(data[0], function (k, v) {
                            if (parseInt(v) <= 0) {
                                thead.eq(cont).text('');
                            } else {
                                thead.eq(cont).text(v);
                            }
                            cont++;
                        });
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                        HoldOn.close();
                    });
                });
                $("[name='Estilo']").focus();
                onCalcularMontos();
            } else {
                pnlDatosDetalle.find("#RegistrosDetalle").html("");
            }
            HoldOn.close();
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {

        });
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
                    idMov = parseInt(dtm[0]);
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
                            getDetalleByID(temp);
                            /*MOSTRAR PANEL PRINCIPAL*/
                            pnlTablero.addClass("d-none");
                            pnlDatos.removeClass('d-none');
                            pnlDatosDetalle.removeClass("d-none");
                            pnlDatosDetalle.find("[name='Estilo']")[0].selectize.focus();
                            pnlDatos.find("[name='Folio']").prop('disabled', 'disabled');
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
                var dtm = data[0];
                if (dtm.Foto !== null && dtm.Foto !== undefined && dtm.Foto !== '') {
                    var ext = getExt(dtm.Foto);
                    if (ext === "gif" || ext === "jpg" || ext === "png" || ext === "jpeg") {
                        $.notify({
                            // options
                            icon: base_url + dtm.Foto
                        }, {
                            // settings
                            placement: {
                                from: "bottom",
                                align: "left"
                            },
                            animate: {
                                enter: 'animated fadeInLeft',
                                exit: 'animated fadeOutDown'
                            },
                            icon_type: 'img',
                            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                    '<img  data-notify="icon" class="col-12 img-circle pull-left">' +
                                    '</div>'
                        });
                    }
                    if (ext !== "gif" && ext !== "jpg" && ext !== "jpeg" && ext !== "png" && ext !== "PDF" && ext !== "Pdf" && ext !== "pdf") {
                        $.notify({
                            // options
                            icon: base_url + dtm.Foto
                        }, {
                            // settings
                            placement: {
                                from: "bottom",
                                align: "left"
                            },
                            animate: {
                                enter: 'animated fadeInLeft',
                                exit: 'animated fadeOutDown'
                            },
                            icon_type: 'img',
                            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                    '<img  data-notify="icon" class="col-12 img-circle pull-left">' +
                                    '</div>'
                        });
                    }
                } else {
                    $.notify({
                        // options
                        icon: base_url + dtm.Foto
                    }, {
                        // settings
                        placement: {
                            from: "bottom",
                            align: "left"
                        },
                        animate: {
                            enter: 'animated fadeInLeft',
                            exit: 'animated fadeOutDown'
                        },
                        icon_type: 'img',
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                '<img  data-notify="icon" class="col-12 img-circle pull-left">' +
                                '</div>'
                    });
                }
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

    function getClientes() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getClientes',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Cliente']")[0].selectize.addOption({text: v.Nombre, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getAgentes() {
        HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getAgentes',
            type: "POST",
            dataType: "JSON"
        }).done(function (data, x, jq) {
            console.log(data);
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Agente']")[0].selectize.addOption({text: v.SValue, value: v.ID});
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
    function onAgregarFila() {
        var rows = pnlDatosDetalle.find("#tblTallas > tbody > tr");
        var Estilo = pnlDatosDetalle.find("[name='Estilo']");
        var Combinacion = pnlDatosDetalle.find("[name='Combinacion']");
        var Precio = pnlDatosDetalle.find("[name='Precio']");
        var FechaEntrega = pnlDatosDetalle.find("[name='FechaEntrega']");
        var Maquila = pnlDatosDetalle.find("[name='Maquila']");
        var Semana = pnlDatosDetalle.find("[name='Semana']");
        var Recio = pnlDatosDetalle.find("[name='Recio']");
        //var Observaciones = pnlDatosDetalle.find("[name='Observaciones']");
        var Desc = pnlDatosDetalle.find("[name='Desc']");
        $.getJSON(master_url + 'onComprobarEstiloXCombinacion', {ID: idMov, E: Estilo.val(), C: Combinacion.val()}).done(function (data, x, jq) {
            if (parseInt(data[0].EXISTE) > 0) {
                onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'YA SE HA AGREGADO EL ESTILO DE ESTE COLOR', 'danger');
            } else {
                if (Precio.val() !== '' && parseFloat(Precio.val()) > 0) {
                    var frm = new FormData();
                    $.each(rows.find("input.numbersOnly:enabled"), function () {
                        var talla = rows.find("input").eq($(this).parent().index()).val();
                        if (talla > 0) {
                            var cant = parseInt($(this).val());
                            if (cant > 0) {
                                var detalle = [];
                                var registros = {
                                    Pedido: idMov,
                                    Estilo: Estilo.val(),
                                    Combinacion: Combinacion.val(),
                                    Posicion: $(this).attr("name"),
                                    Cantidad: $(this).val(),
                                    FechaEntrega: FechaEntrega.val(),
                                    Maq: Maquila.val(),
                                    Sem: Semana.val(),
                                    Recio: Recio.val(),
                                    Precio: Precio.val(),
                                    Desc_Por: Desc.val(),
                                    Observaciones: observaciones
                                };
                                detalle.push(registros);
                                frm.append('Detalle', JSON.stringify(detalle));
                                $.ajax({
                                    url: master_url + 'onAgregarDetalle',
                                    type: "POST",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: frm
                                }).done(function (data, x, jq) {
                                    getDetalleByID(idMov);
                                    $("[name='Estilo']")[0].selectize.focus();
                                    $("[name='Estilo']")[0].selectize.clear(true);
                                    $("[name='Combinacion']")[0].selectize.clear(true);
                                    $("[name='Combinacion']")[0].selectize.clearOptions();
                                    HoldOn.close();
                                    observaciones = "";
                                }).fail(function (x, y, z) {
                                    console.log(x, y, z);
                                }).always(function () {
                                    HoldOn.close();
                                });
                            }
                        }
                    });
                } else {
                    onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN COSTO', 'danger');
                    pnlDatos.find("input[name='Precio']").focus();
                }

            }
        });
    }

    function onCalcularMontos() {
        var pares = 0;
        var total = 0.0;
        var desc = 0.0;
        $.each(tblDetalleCaptura.rows().data(), function () {
            pares += parseInt($(this)[28]);
            total += getNumberFloat($(this)[30]);
            desc += getNumberFloat($(this)[31]);
        });
        if (pnlDatosDetalle.find("#tblRegistrosDetalle > tbody > tr").length > 1) {
            pnlDatosDetalle.find("#Pares").find("strong").text(pares);
            pnlDatosDetalle.find("#Importe").find("strong").text('$' + $.number(total - desc, 2, '.', ','));
        }
    }

    function onEliminarDetalle(IDX) {
        if (IDX !== 0 && IDX !== undefined && IDX > 0) {
            swal({
                title: "Confirmar",
                text: "Deseas eliminar el registro?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: master_url + 'onEliminarDetalle',
                        type: "POST",
                        data: {
                            ID: IDX
                        }
                    }).done(function (data, x, jq) {
                        getDetalleByID(idMov);
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                }
            });
        } else {
            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'DEBE DE ELEGIR UN REGISTRO', 'danger');
        }
    }

</script>
<style>
    .swal-icon img {
        width: 220px;
    }
</style>