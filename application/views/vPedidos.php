<div class="card border-0 animated fadeIn" id="pnlTablero">
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
            <div id="Pedidos" class="table-responsive">
                <table id="tblPedidos" class="table table-sm display " style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pedido</th>
                            <th>Estatus</th>
                            <th>Cliente</th>
                            <th>Fecha Pedido</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div class="d-none" id="pnlDatos">
    <div class="card border-0">
        <div class="card-body text-dark customBackground" >
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 float-left">
                    <h5>PEDIDO</h5>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 float-right" align="right">
                    <button type="button" onclick="onAbrirModalFichaTecnica()" class="btn btn-warning btn-sm my-1" ><span class="fa fa-list-alt"></span> FICHA TÉCNICA</button>
                    <button type="button" onclick="" class="btn btn-info btn-sm btn-md my-1" id="btnImprimirPedido"><span class="fa fa-print"></span> IMPRIMIR</button>
                    <button type="button" class="btn btn-danger btn-sm btn-md my-1" id="btnCancelar"><span class="fa fa-window-close"></span> SALIR</button>
                    <button type="button" class="btn btn-primary btn-sm my-1" id="btnGuardar"><span class="fa fa-save"></span> GUARDAR</button>
                </div>
            </div>
            <div class="card border-0">
                <div class="">
                    <div id="Encabezado">
                        <form id="frmNuevo">
                            <div class="row">
                                <div class="d-none">
                                    <input type="text" class="" id="ID" name="ID">
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                    <label for="Folio">Folio*</label>
                                    <input type="text" class="form-control form-control-sm numbersOnly " maxlength="9" id="Folio" name="Folio" required="">
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2">
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
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                    <label for="Agente">Agente</label>
                                    <select class="form-control form-control-sm required" id="Agente" name="Agente">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                    <label for="FechaMov">Fec Pedido*</label>
                                    <input type="text" class="form-control form-control-sm notEnter" name="FechaPedido" id="FechaPedido" required="">

                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                    <label for="FechaMov">Fec Recep*</label>
                                    <input type="text" class="form-control form-control-sm notEnter" id="FechaRec" name="FechaRec" required="">
                                </div>
                                <div class="ccol-12 col-sm-12 col-md-4 col-lg-4 col-xl-2">
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
                </div>
            </div>
            <div class="card border-0">
                <div class="">
                    <!--GENERAL DETALLE-->
                    <div class="d-none" id="pnlDatosDetalle">
                        <!--CONTROLES DETALLE-->
                        <div id="ControlesDetalle">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-1">
                                    <label for="Clave">% Desc.</label>
                                    <input type="text" class="form-control form-control-sm numbersOnly " maxlength="4" id="Desc" name="Desc"  >
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
                                    <label for="Estilo">Estilo*</label>
                                    <select class="form-control form-control-sm "  name="Estilo" required="">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
                                    <label for="Combinacion">Color*</label>
                                    <select class="form-control form-control-sm "  name="Combinacion" required="">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
                                    <label for="FechaMov">Fec Entrega*</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-sm required notEnter" id="FechaEntrega" name="FechaEntrega" >
                                        <div class="input-group-prepend">
                                            <span onclick="onGuardarObservaciones()" class="input-group-text text-dark" data-toggle="tooltip" data-placement="top" title="Observaciones"><i class="fa fa-comment-alt"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-1">
                                    <label for="Maquila">Maq</label>
                                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="2" name="Maquila" >
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-1">
                                    <label for="Semana">Sem</label>
                                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="2" name="Semana" >
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-1">
                                    <label for="Recio">Recio</label>
                                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" name="Recio" >
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-1">
                                    <label for="PMaq">P. Maq</label>
                                    <input type="text" class="form-control form-control-sm numbersOnly" maxlength="4" name="PMaq" >
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-1">
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
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T1"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T2"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T3"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T4"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T5"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T6"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T7"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T8"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T9"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T10"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T11"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T12"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T13"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T14"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T15"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T16"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T17"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T18"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T19"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T20"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T21"></td>
                                                <td><input type="text"  class="numbersOnly" disabled="" name="T22"></td>
                                                <td>Pares</td>
                                            </tr>
                                            <tr>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C1"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C2"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C3"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C4"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C5"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C6"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C7"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C8"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C9"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C10"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C11"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C12"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C13"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C14"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C15"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C16"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C17"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C18"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C19"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C20"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C21"></td>
                                                <td><input type="text"  class="numbersOnly" maxlength="3"  name="C22"></td>
                                                <td><input type="text" style="width: 55px;" maxlength="4" class="" disabled=""  name="TPares"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <!--REGISTROS DETALLE-->
            <div class="" id="pnlDetalle">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" align="">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="x36" checked="">
                            <label class="custom-control-label" for="x36">Lotes de 36</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" align="right">
                        <button type="button" id="btnModificarDetalle" name="btnModificarDetalle" class="btn btn-warning"  data-toggle="tooltip" data-placement="top" title="Cambiar">
                            <span class="fa fa-bolt fa-lg"></span>
                        </button>
                    </div>
                    <div class=" col-md-12 ">
                        <div align="center"><div class="loader animated fadeIn"></div></div>
                        <div align="center"><strong class="text-danger">*Todas las modificaciones son en tiempo real*</strong></div>
                        <div class="table-responsive animated fadeIn">
                            <table id="tblPedidosDetalle" class="table table-sm  display table-condensed" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr style="overflow-x:scroll; width: 100%">
                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <br>
                        <div class="d-none" align="center" style="background-color: #fff ">
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
                                    <strong>Pares</strong>
                                    <br>
                                    <div id="Pares"><strong>0</strong></div>
                                </div>
                                <div class="col-sm-2 text-success">
                                    <strong>Importe</strong>
                                    <br>
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

<div class="dropdown-menu" style="font-size: 12px;" id='Menu'>
    <a class="dropdown-item" href="#" onclick="btnModificarDetalle.trigger('click')"><i class="fa fa-bolt fa-lg"></i> Modificar</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#" onclick=""><i class="fa fa-minus-square"></i> Eliminar</a>
</div>

<div id="ModificarMSD" class="modal">
    <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Modificar maquila y semana</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <h4>Semana</h4>
                        <input class="form-control numbersOnly" id="SemanaMSD" maxlength="4" type="text" placeholder="Numero de semana 1-52">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <h4>Maquila</h4>
                        <input class="form-control numbersOnly" id="MaquilaMSD" type="text" maxlength="4" placeholder="Número de maquila" autofocus>
                    </div>
                    <div align="center" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-2">
                        <h4 class="text-danger">* 0 registros seleccionados*</h4>
                    </div>
                    <div class="col-12 text-center">
                        <h3><span class="badge badge-pill badge-warning m-2">ESTILO - COLOR - SEMANA - MAQUILA</span></h3>
                    </div>
                    <div id="Afectados" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 row animated flipInX">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnAceptarMSD"><span class="fa fa-check fa-lg"></span>Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-fullscreen" id="mdlFichaTecnica" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloFichaTecnica">Ficha Técnica Estilo: <strong></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-block">
                            <div class="table-responsive" id="tblRegistrosFichaTecnica"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-primary" data-dismiss="modal">ACEPTAR</button>
            </div>
        </div>
    </div>
</div>

<!--SCRIPT-->

<div id="mdlPedidoReporte" class="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var master_url = base_url + 'index.php/Pedidos/';
    var pnlDatos = $("#pnlDatos");
    var btnImprimirPedido = pnlDatos.find("#btnImprimirPedido");
    var pnlDatosDetalle = $("#pnlDatosDetalle");
    var pnlDetalle = $("#pnlDetalle");
    var pnlTablero = $("#pnlTablero");
    var btnNuevo = $("#btnNuevo");
    var btnGuardar = pnlDatos.find("#btnGuardar");
    var btnCancelar = pnlDatos.find("#btnCancelar");
    var btnEliminar = $("#btnEliminar");
    var tblPedidos = $('#tblPedidos');
    var Pedidos;
    var nuevo = true;
    var idMov = 0;
    /*DATATABLE GLOBAL*/
    var tblInicial = {
        "dom": 'frt',
        "autoWidth": true,
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
    var btnModificarDetalle = pnlDatos.find("#btnModificarDetalle");
    var ModificarMSD = $("#ModificarMSD");
    var btnAceptarMSD = ModificarMSD.find("#btnAceptarMSD");

    var _animate_ = {enter: 'animated fadeInLeft', exit: 'animated fadeOutDown'}, _placement_ = {from: "bottom", align: "left"};
    $(document).ready(function () {
        btnAceptarMSD.click(function () {
            var ctrls = [];
            $.each(tblPedidosDetalle.find("tbody tr:not(.Serie).selected"), function (k, v) {
                var dtm = PedidosDetalle.row($(this)).data();
                if (dtm[0] !== '') {
                    ctrls.push({ID: dtm[0], SEMANA: dtm[5], MAQUILA: dtm[6]});
                }
            });
            if (ctrls.length > 0) {
                var semana = ModificarMSD.find("#SemanaMSD").val();
                var maquila = ModificarMSD.find("#MaquilaMSD").val();
                if (semana !== '' || maquila !== '') {
                    swal({
                        title: "¿Estas seguro?",
                        text: "Serán afectados los '" + ctrls.length + "' registros y controles correspondientes, una vez completada la acción",
                        icon: "warning",
                        buttons: true
                    }).then((willDelete) => {
                        if (willDelete) {
                            //MODIFICAR MAQUILA,SEMANA, DESCUENTO
                            var params = {
                                rows: JSON.stringify(ctrls),
                                SEMANA: semana,
                                MAQUILA: maquila
                            };
                            console.log("\n", params, "\n");
                            $.post(master_url + 'onModificarMSD', params).done(function (data, x, jq) {
                                console.log("\n", "DATA \n");
                                console.log(data);
                                console.log("\n");
                                ModificarMSD.modal('hide');
                                getDetalleByID(pnlDatos.find("#ID").val());
                                swal('ATENCIÓN', 'SE HAN MODIFICADO ' + ctrls.length + ' REGISTROS !', 'success');
                                onBeep(1);
                            }).fail(function (x, y, z) {
                                console.log(x, y, z);
                            }).always(function () {

                            });
                        }
                    });
                } else {
                    onBeep(2);
                    swal('ATENCIÓN', 'NO HA ESPECIFICADO LA SEMANA O MAQUILA', 'warning');
                }
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'NO HA SELECCIONADO NINGÚN REGISTRO', 'warning');
            }
        });

        btnModificarDetalle.click(function () {
            var rows = tblPedidosDetalle.find("tbody tr.selected");
            var n = rows.length;
            if (n > 0) {
                var span = '';
                $.each(rows, function (k, v) {
                    var tds = $(v).find("td:not(.Serie)");
                    if (!tds.eq(0).hasClass('Serie') && tds.eq(0).text() !== '') {
                        console.log("\n", tds);
                        span += '<h3><span class="badge badge-pill badge-primary m-2">' + tds.eq(0).text() + ' - ' + tds.eq(1).text() + ' - ' + tds.eq(2).text() + ' - ' + tds.eq(3).text() + '</span></h3>';
                        console.log(tds.eq(0).text(), tds.eq(1).text(), tds.eq(2).text(), tds.eq(3).text());
                    }
                });
                onBeep(3);
                ModificarMSD.find("#SemanaMSD").val('');
                ModificarMSD.find("#MaquilaMSD").val('');
                ModificarMSD.find("#Afectados").html(span);
                ModificarMSD.find("div>h4.text-danger").text('*' + ModificarMSD.find("#Afectados span.badge-primary").length + ' registros seleccionados*');
                ModificarMSD.modal('show');
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'NO HA SELECCIONADO NINGÚN REGISTRO', 'warning');
            }
        });

        $(document).click(function () {
            $("#Menu").hide();
        });
        $('#tblPedidosDetalle').on("contextmenu", function (e) {
            e.preventDefault();
            var top = e.pageY;
            var left = e.pageX - 155;
            $("#Menu").css({
                display: "block",
                top: top,
                left: left
            });
            return false; //blocks default Webbrowser right click menu
        });

        btnImprimirPedido.click(function () {
            if (temp > 0) {
                HoldOn.open({
                    message: 'Espere...',
                    theme: 'sk-cube'
                });
                $.get(master_url + 'ImprimirPedido', {ID: temp}).done(function (data) {
                    console.log(data);
                    onBeep(1);
//                    window.open(data, '_blank');
                    $.fancybox.open({
                        src: data,
                        type: 'iframe',
                        opts: {
                            afterShow: function (instance, current) {
                                console.info('done!');
                            },
                            iframe: {
                                // Iframe template
                                tpl: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowtransparency="true" src=""></iframe>',
                                preload: true,
                                // Custom CSS styling for iframe wrapping element
                                // You can use this to set custom iframe dimensions
                                css: {
                                    width: "100%",
                                    height: "100%"
                                },
                                // Iframe tag attributes
                                attr: {
                                    scrolling: "auto"
                                }
                            }
                        }
                    });
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            } else {
                onBeep(2);
                swal('ATENCIÓN', 'Para generar un reporte primero debe de guardarlo', 'warning');
            }
        });

        pnlDatos.find("#Cliente").change(function () {
            var cliente = $(this).val();
            if (cliente !== '') {
                $.getJSON(master_url + 'getAgenteXCliente', {Cliente: cliente}).done(function (data) {
                    if (temp <= 0) {
                        pnlDatos.find("#Agente")[0].selectize.focus();
                    }
                }).fail(function (x, y, z) {
                    console.log(x.responseText);
                }).always(function () {
                    HoldOn.close();
                });
            }
        });

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
            cellEstilo = $(this).val();
            nEstilo = pnlDatosDetalle.find("[name='Estilo']").find("option:selected").text();
            getCombinacionesXEstilo($(this).val());
            getSerieXEstilo($(this).val());
            getPrecioListaByEstiloByCliente($(this).val(), pnlDatos.find("#Cliente").val());
        });
        pnlDatosDetalle.find("[name='Combinacion']").change(function () {
            cellColor = $(this).val();
            nEstilo = nEstilo + ' ' + pnlDatosDetalle.find("[name='Combinacion']").find("option:selected").text();
        });
        //Evento que nos trae el No de semana en base a la fecha de entrega
        pnlDatosDetalle.find("[name='FechaEntrega']").change(function () {
            $.getJSON(master_url + 'getSemanaByFecha', {Fecha: $(this).val()}).done(function (data, x, jq) {
                console.log(data);
                if (data.length > 0) {
                    pnlDatosDetalle.find("[name='Semana']").val(data[0].Sem);
                } else {
                    console.log('LA FECHA DE ENTREGA EXCEDE DE LAS SEMANAS CAPTURADAS PARA ESTE AÑO');
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        });

        //Evento botones
        btnGuardar.click(function () {
            isValid('pnlDatos');
            if (valido) {
                var f = new FormData(pnlDatos.find("#frmNuevo")[0]);
                if (!nuevo) {
                    idMov = pnlDatos.find("#ID").val();
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
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
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
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                }
            } else {
                onNotify('<span class="fa fa-times fa-lg"></span>', '* DEBE DE COMPLETAR LOS CAMPOS REQUERIDOS *', 'danger');
            }
        });
        btnNuevo.click(function () {
            temp = 0;
            pnlDetalle.find("div.loader").addClass("d-none");
            $("#tblPedidosDetalle").parent().removeClass("d-none");
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
            if ($.fn.DataTable.isDataTable('#tblPedidosDetalle')) {
                PedidosDetalle.clear().draw();
            }
            pnlDatos.find("[name='Folio']").prop('disabled', false);
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
                        $.post(master_url + 'onEliminar', {ID: temp}).done(function (data, x, jq) {
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
    var cellColor = 0;
    var tblDetalleCaptura;
    var nEstilo;
    var observaciones = '';

    function onAbrirModalFichaTecnica() {
        getPiezasMatFichaTecnicaXEstiloXCombinacion(cellEstilo, cellColor);
    }

    function getPiezasMatFichaTecnicaXEstiloXCombinacion(Estilo, Color) {
        if (Estilo !== 0 && Estilo !== undefined && Estilo > 0 && Color !== 0 && Color !== undefined && Color > 0) {
            HoldOn.open({
                theme: "sk-bounce",
                message: "CARGANDO DATOS..."
            });
            $.ajax({
                url: master_url + 'getPiezasMatFichaTecnicaXEstiloXCombinacion',
                type: "POST",
                dataType: "JSON",
                data: {
                    Estilo: Estilo,
                    Color: Color
                }
            }).done(function (data, x, jq) {
                if (data.length > 0) {
                    $("#tblRegistrosFichaTecnica").html(getTable('tblPiezasMat', data));
                    $('#tblPiezasMat tfoot th').each(function () {
                        $(this).addClass("d-none");
                    });
                    var thead = $('#tblPiezasMat thead th');
                    var tfoot = $('#tblPiezasMat tfoot th');
                    thead.eq(0).addClass("d-none");
                    tfoot.eq(0).addClass("d-none");
                    $.each($('#tblPiezasMat tbody tr'), function (k, v) {
                        var td = $(v).find("td");
                        td.eq(0).addClass("d-none");
                    });
                    var tblSelected = $('#tblPiezasMat').DataTable(tblInicial);

                    $('#mdlFichaTecnica').find('#TituloFichaTecnica').find('strong').text(nEstilo);
                    $('#mdlFichaTecnica').modal('show');

                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTE FICHA TÉCNICA DE ESTE ESTILO', 'danger');
                    $("#tblRegistrosFichaTecnica").html("");
                }
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
            });
        } else {
            onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'SELECCIONA UN ESTILO Y UN COLOR', 'danger');
        }
    }

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
            pnlDatosDetalle.find("[name='Maquila']").focus();
        });
    }
    var tblPedidosDetalle = $("#tblPedidosDetalle"), PedidosDetalle;
    function getDetalleByID(IDX) {
        console.log('ID', IDX);
        var rows;
        var pares = 0.0;
        //            tblPedidosDetalle.find("thead > th").css("height", "0px");
        if ($.fn.DataTable.isDataTable('#tblPedidosDetalle')) {
            tblPedidosDetalle.DataTable().destroy();
        }
        PedidosDetalle = tblPedidosDetalle.DataTable({
            "dom": 'trHF',
            "autoWidth": false,
            "colReorder": true,
            "displayLength": 500,
            "bLengthChange": false,
            "deferRender": true,
            "scrollY": 285,
            "scrollX": true,
            "scrollCollapse": false,
            keys: true,
            select: true,
            "bSort": false,
            language: lang,
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [1],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [2],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [35],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [36],
                    "visible": false,
                    "searchable": false
                }],
            "createdRow": function (row, data, index) {
                $.each($(row).find("td"), function (k, v) {
                    var c = $(v);
                    var index = parseInt(k);
                    switch (index) {
                        case 0:
                            /*ESTILO*/
                            c.not(".Serie").attr('title', data[35]);
                            c.addClass('Estilo');
                            break;
                        case 1:
                            /*COLOR*/
                            c.not(".Serie").attr('title', data[36]);
                            c.addClass('Color');
                            break;
                        case 2:
                            /*SEMANA*/
                            c.addClass('Semana');
                            break;
                        case 3:
                            /*MAQUILA*/
                            c.addClass('Maquila');
                            break;
                        case 26:
                            /*PARES*/
                            c.addClass('Pares');
                            break;
                        case 27:
                            /*PRECIO*/
                            c.addClass('Precio');
                            break;
                        case 28:
                            /*IMPORTE*/
                            c.addClass('Importe');
                            break;
                        case 29:
                            /*DESCUENTO*/
                            c.addClass('Descuento');
                            break;
                        case 30:
                            /*FECHA ENTREGA*/
                            c.addClass('Entrega');
                            break;
                    }
                    if (data[0] === "" && data[1] === "") {
                        c.addClass('Serie');
                    }
                    if ($.isNumeric(c.text())) {
                        if (data[0] === "" && parseFloat($(v).text()) <= 0) {
                            c.addClass('Serie').text("");
                        } else if (index > 3 && index < 25 && parseFloat(c.text()) > 0) {
                            c.addClass('HasStock');
                            c.addClass('Cantidades');
                        } else if (data[0] !== "" && index > 3 && index < 26 && parseFloat(c.text()) === 0) {
                            c.addClass('NoHasStock').text("0");
                            c.addClass('Cantidades');
                        }
                    }
                });
                /*ANCHO*/
                var celda = $(row).find("td");
                celda.eq(0).css("width", "50px");
                celda.eq(1).css("width", "50px");
                celda.eq(2).css("width", "35px");
                celda.eq(3).css("width", "35px");
                $(row).find("td:gt(25)").css("font-weight", "bolder");
                $(row).find("td:gt(25)").addClass("zoom");
            },
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api();//Get access to Datatable API
                // Update footer
                var pares = api.column(29).data().reduce(function (a, b) {
                    var ax = 0, bx = 0;
                    ax = $.isNumeric(a) ? parseFloat(a) : 0;
                    bx = $.isNumeric(b) ? parseFloat(b) : 0;
                    return  (ax + bx);
                }, 0);
                var importe = api.column(31).data().reduce(function (a, b) {
                    var ax = 0, bx = 0;
                    ax = $.isNumeric((a)) ? parseFloat(a) : 0;
                    bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                    return  (ax + bx);
                }, 0);
                var descuento = api.column(32).data().reduce(function (a, b) {
                    var ax = 0, bx = 0;
                    ax = $.isNumeric((a)) ? parseFloat(a) : 0;
                    bx = $.isNumeric(getNumberFloat(b)) ? getNumberFloat(b) : 0;
                    return  (ax + bx);
                }, 0);
                $(api.column(29).footer()).html(api.column(34, {page: 'current'}).data().reduce(function (a, b) {
                    var container = '<div class="container">';
                    container += '<div class="row">';
                    container += '<div class="col-sm zoomx"><span class="text-info zoomx">Pares</span><br>' + pares;
                    container += '</div>';
                    container += '</div>';//ROW
                    container += '</div>';//CONTAINER
                    return container;
                }, 0));
                $(api.column(31).footer()).html(api.column(34, {page: 'current'}).data().reduce(function (a, b) {
                    var container = '<div class="container">';
                    container += '<div class="row">';
                    container += '<div class="col-sm zoomx"><span class="text-success zoomx">Importe</span><br>$' + $.number(parseFloat(importe), 2, '.', ',');
                    container += '</div>';
                    container += '</div>';//ROW
                    container += '</div>';//CONTAINER
                    return container;
                }, 0));
                $(api.column(32).footer()).html(api.column(34, {page: 'current'}).data().reduce(function (a, b) {
                    var container = '<div class="container">';
                    container += '<div class="row">';
                    container += '<div class="col-sm zoomx"><span class="text-danger">Descuento</span><br>$' + $.number(parseFloat(descuento), 2, '.', ',');
                    container += '</div>';
                    container += '</div>';//ROW
                    container += '</div>';//CONTAINER
                    return container;
                }, 0));
                $(api.column(33).footer()).html(api.column(34, {page: 'current'}).data().reduce(function (a, b) {
                    var container = '<div class="container">';
                    container += '<div class="row">';
                    container += '<div class="col-sm zoomx"><span class="text-warning">Total</span><br>$' + $.number(parseFloat(importe) - parseFloat(descuento), 2, '.', ',');
                    container += '</div>';
                    container += '</div>';//ROW
                    container += '</div>';//CONTAINER
                    return container;
                }, 0));
            }
        });

        PedidosDetalle.clear().draw();
        pnlDetalle.find("div.loader").removeClass("d-none");
        $("#tblPedidosDetalle").parent().addClass("d-none");
        $.getJSON(master_url + 'getDetalleByID', {ID: IDX}).done(function (detalle) {
            $.getJSON(master_url + 'getSerieXDetalleByID', {ID: IDX}).done(function (series) {
                /*SERIE*/
                $.each(series, function (k, s) {
                    var b = '<strong>', bc = '</strong>', bs = '<strong class="Serie">';
                    PedidosDetalle.row.add(['', '', '', b + 'Estilo' + bc, b + 'Color' + bc, b + 'Sem' + bc, b + 'Maq' + bc,
                        s.T1, s.T2, s.T3, s.T4, s.T5, s.T6, s.T7, s.T8, s.T9, s.T10, s.T11, s.T12, s.T13, s.T14, s.T15, s.T16, s.T17, s.T18, s.T19, s.T20, s.T21, s.T22, b + 'Pares' + bc, b + 'Precio' + bc, b + 'Importe' + bc, b + 'Desc' + bc, b + 'Entrega' + bc, '-', '', ''
                    ]).draw(false);
                    //DETALLE X SERIE
                    $.each(detalle, function (k, d) {
                        if (parseInt(s.ID) === parseInt(d.Serie)) {
                            PedidosDetalle.row.add([
                                d.ID, d.IdEstilo, d.IdColor, d.Estilo, d.Color, d.Sem, d.Maq, d.C1, d.C2, d.C3, d.C4, d.C5, d.C6, d.C7, d.C8, d.C9, d.C10, d.C11, d.C12, d.C13, d.C14, d.C15, d.C16, d.C17, d.C18, d.C19, d.C20, d.C21, d.C22, d.Pares, d.Precio, d.Importe, d.Desc, d.Entrega, d["-"], d.ColorD, d.EstiloD
                            ]).draw(false);
                        }
                    });
                    //FIN DETALLE X SERIE
                });
                $.each($('#tblPedidosDetalle > tbody tr'), function (k, v) {
                    var event;
                    if (isMobile) {
                        $(this).find("td:eq(0)").touch();
                        event = 'tap';
                    } else {
                        event = 'dblclick';
                    }
                    //EN EL INDICE 2 (VISIBLE) SE ENCUENTRA LA MAQUILA
                    $(this).find("td:not(.Serie):eq(2)").on(event, function () {
                        var cell = $(this);
                        var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="4" value="' + cell.text() + '" autofocus>';
                        cell.html(g).find("#Editor").focus().select();
                        cell.find("#Editor").focusout(function (e) {
                            var v = $(this).val();
                            cell.html(v);
                        });
                        cell.find("#Editor").keyup(function (e) {
                            console.log(e.keyCode);
                            if (e.keyCode === 13) {
                                var tr = $(this).parent().parent();
                                var td = $(this).parent();
                                var indice = td.index() + 3;//SE SUMAN 3 POR EL NUMERO DE CELDAS OCULTAS, YA QUE EN ESTE MOMENTO DE LA APP SU INDICE VISIBLE ES 2 Y EL INDICE CON LOS CAMPOS OCULTOS ES 5
                                var v = $(this).val();
                                cell.html(v);
                                PedidosDetalle.cell(td, indice).data(v).draw();
                                var row = PedidosDetalle.row(tr).data();
                                console.log("VALOR: ", v, ",INDICE: ", indice, ", ", row);
                                $.post(master_url + 'onModificarPedidoDetalle', {ID: row[0], CELDA: 'SEMANA', SEMANA: row[5], MAQUILA: row[6]}).done(function (data, x, jq) {
                                    console.log("\n", data, " \n");
                                    onNotify('<span class="fa fa-check"></span>', 'SE HA MODIFICADO LA SEMANA', 'success');
                                }).fail(function (x, y, z) {
                                    console.log('ERROR', x, y, z);
                                }).always(function () {
                                    console.log('DATOS ACTUALIZADOS');
                                });
                            }
                        });
                    });
                    //EN EL INDICE 3 (VISIBLE) SE ENCUENTRA LA SEMANA
                    $(this).find("td:not(.Serie):eq(3)").on(event, function () {
                        var cell = $(this);
                        var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="4" value="' + cell.text() + '" autofocus>';
                        cell.html(g).find("#Editor").focus().select();
                        cell.find("#Editor").focusout(function (e) {
                            var v = $(this).val();
                            cell.html(v);
                        });
                        cell.find("#Editor").keyup(function (e) {
                            console.log(e.keyCode);
                            if (e.keyCode === 13) {
                                var tr = $(this).parent().parent();
                                var td = $(this).parent();
                                var indice = td.index() + 3;//SE SUMAN 4 POR EL NUMERO DE CELDAS OCULTAS, YA QUE EN ESTE MOMENTO DE LA APP SU INDICE VISIBLE ES 3 Y EL INDICE CON LOS CAMPOS OCULTOS ES 6
                                var v = $(this).val();
                                cell.html(v);
                                PedidosDetalle.cell(td, indice).data(v).draw();
                                var row = PedidosDetalle.row(tr).data();
                                console.log('ROW MAQ ', row[6], row[5], "\n", row);
                                $.post(master_url + 'onModificarPedidoDetalle', {ID: row[0], CELDA: 'MAQUILA', MAQUILA: row[6], SEMANA: row[5]}).done(function (data, x, jq) {
                                    console.log("\n", data, " \n");
                                    onNotify('<span class="fa fa-check"></span>', 'SE HA MODIFICADO LA MAQUILA', 'success');
                                }).fail(function (x, y, z) {
                                    console.log('ERROR', x, y, z);
                                }).always(function () {
                                    console.log('DATOS ACTUALIZADOS');
                                });
                            }
                        });
                    });
                });
            }).fail(function (x, y, z) {
                console.log(x, y, z);
            }).always(function () {
                HoldOn.close();
                onCalcularMontos();
                pnlDetalle.find("div.loader").addClass("d-none");
                $("#tblPedidosDetalle").parent().removeClass("d-none");
                PedidosDetalle.columns.adjust().draw();
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });

        PedidosDetalle.on('key', function (e, datatable, key, cell, originalEvent) {
            var t = $('#tblPedidosDetalle > tbody');
            var a = t.find("#Editor");
            if (key === 13) {
                var b = PedidosDetalle.cell(a.parent()).index();
                if (a.val() !== 'undefined' && a.val() !== undefined) {
                    var c = a.val();
                    var d = a.parent();
                    d.html(c);
                    PedidosDetalle.cell(d, b).data(c).draw();
                }
                var td = $(this).find("td.focus:not(.Estilo):not(.Color):not(.Serie):not(.Pares):not(.Importe)");
                td.removeClass("HasStock");
                if (td.hasClass("Entrega")) {
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="10" value="' + cell.data() + '" autofocus>';
                    td.html(g).find("#Editor").focus().select();
                    td.find("#Editor").inputmask({alias: "date"});
                    td.find("#Editor").change(function () {
                    });
                } else if (td.hasClass("Descuento")) {
                    desc = cell.data();
                    var tr = PedidosDetalle.row(td.parent()).data();
                    var importe = getNumberFloat(tr[31]);
                    var porcentaje = (getNumberFloat(cell.data()) / importe) * 100;
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="2" value="' + porcentaje + '"  autofocus>';
                    td.html(g).find("#Editor").focus().select();
                } else if (td.find(":not(.Semana):not(.Maquila)")) {
                    var g = '<input id="Editor" type="text" class="form-control form-control-sm numbersOnly" maxlength="4" value="' + cell.data() + '" autofocus>';
                    td.html(g).find("#Editor").focus().select();

                }
            }
        }).on('key-blur', function (e, datatable, cell) {
            var t = $('#tblPedidosDetalle > tbody');
            var a = t.find("#Editor");
            if (a.val() !== 'undefined' && a.val() !== undefined) {
                var b = PedidosDetalle.cell(a.parent()).index();
                var c = a.val() !== '' && a.val() > 0 ? a.val() : '0';
                var d = a.parent();
                var row = PedidosDetalle.row($(d).parent()).data();// SOLO OBTENDRA EL ID
                var params;
                if (d.hasClass('Cantidades')) {
                    d.html(c);
                    PedidosDetalle.cell(d, b).data(c).draw();
                    //SHORT POST
                    params = {
                        ID: row[0],
                        CELDA: 'CANTIDAD',
                        VALOR: c,
                        INDICE: b.column,
                        COLUMN: b.columnVisible
                    };
                } else if (d.hasClass('Entrega')) {
                    d.html(a.val());
                    PedidosDetalle.cell(d, b).data(a.val()).draw();
                    //SHORT POST
                    params = {
                        ID: row[0],
                        CELDA: 'ENTREGA',
                        VALOR: a.val()
                    };
                } else if (d.hasClass('Precio')) {
                    var precio = getNumberFloat(a.val());
                    var precio_format = '$' + $.number(precio, 2, '.', ',');
                    d.html(precio_format);
                    PedidosDetalle.cell($(d).parent(), 30).data(precio_format).draw();
                    var tr = PedidosDetalle.row($(d).parent()).data();
                    var pares_totales = parseFloat(tr[29]);
                    var importe_total = pares_totales * precio;
                    PedidosDetalle.cell($(d).parent(), 31).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                    //SHORT POST
                    params = {
                        ID: row[0],
                        CELDA: 'PRECIO',
                        VALOR: precio
                    };
                } else if (d.hasClass('Descuento')) {
                    var descuento = (getNumberFloat(a.val()) / 100) * getNumberFloat(row[31]);
                    var descuento_format = '$' + $.number(descuento, 2, '.', ',');
                    d.html(descuento_format);
                    PedidosDetalle.cell($(d).parent(), 32).data(descuento_format).draw();
                    //SHORT POST
                    params = {
                        ID: row[0],
                        CELDA: 'DESCUENTO',
                        VALOR: ((a.val() === '') ? 0 : getNumberFloat(a.val()))
                    };
                }
                $.post(master_url + 'onModificarPedidoDetalle', params).done(function (data, x, jq) {
                    console.log("\n", data, " \n");
                }).fail(function (x, y, z) {
                    console.log('ERROR', x, y, z);
                }).always(function () {
                    console.log('DATOS ACTUALIZADOS');
                });

                if ($.isNumeric(c) && parseFloat(c) > 0) {
                    /*CANTIDADES EN SERIES*/
                    if ($.isNumeric(c) && parseFloat(c) > 0 && d.hasClass('Cantidades')) {
                        var tr = PedidosDetalle.row($(d).parent()).data();
                        var pares_totales = 0;
                        var precio = getNumberFloat(tr[30]);
                        for (var i = 7, max = 29; i < max; i++) {
                            pares_totales += $.isNumeric(tr[i]) ? parseFloat(tr[i]) : 0;
                        }
                        PedidosDetalle.cell($(d).parent(), 29).data(pares_totales).draw();
                        var importe_total = pares_totales * precio;
                        PedidosDetalle.cell($(d).parent(), 31).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                        d.removeClass("NoHasStock");
                        d.addClass("HasStock");
                    } else if (d.hasClass('Cantidades')) {
                        var tr = PedidosDetalle.row($(d).parent()).data();
                        var pares_totales = 0;
                        var precio = getNumberFloat(tr[30]);
                        for (var i = 7, max = 29; i < max; i++) {
                            pares_totales += $.isNumeric(tr[i]) ? parseFloat(tr[i]) : 0;
                        }
                        PedidosDetalle.cell($(d).parent(), 29).data(pares_totales).draw();
                        var importe_total = pares_totales * precio;
                        PedidosDetalle.cell($(d).parent(), 31).data('$' + $.number(importe_total, 2, '.', ',')).draw();
                        d.removeClass("HasStock");
                        d.addClass("NoHasStock");
                    }
                    /*PARES*/
                    /*PRECIO*/
                    /*DESCUENTO*/
                } else {
                    console.log('CANTIDAD EN ZERO ');
                    var tr = PedidosDetalle.row($(d).parent()).data();
                    var pares_totales = 0;
                    var precio = getNumberFloat(tr[30]);
                    for (var i = 7, max = 29; i < max; i++) {
                        pares_totales += $.isNumeric(tr[i]) ? parseFloat(tr[i]) : 0;
                    }
                    PedidosDetalle.cell($(d).parent(), 29).data(pares_totales).draw();
                    var importe_total = pares_totales * precio;
                    PedidosDetalle.cell($(d).parent(), 31).data('$' + $.number(importe_total, 2, '.', ',')).draw();

                }
            }
        });
    }

    function getRecords() {
        temp = 0;
        HoldOn.open({
            theme: 'sk-cube',
            message: 'CARGANDO...'
        });
        $.fn.dataTable.ext.errMode = 'throw';

        if ($.fn.DataTable.isDataTable('#tblPedidos')) {
            tblPedidos.DataTable().destroy();
            Pedidos = tblPedidos.DataTable({
                "dom": 'Bfrtip',
                buttons: buttons,
                "ajax": {
                    "url": master_url + 'getRecords',
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "ID"}, {"data": "Pedido"}, {"data": "Estatus"}, {"data": "Cliente"},
                    {"data": "Fecha Pedido"}, {"data": "Usuario"}
                ],
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }
                ],
                language: lang,
                select: true,
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

            $('#tblPedidos_filter input[type=search]').focus();

            tblPedidos.find('tbody').on('click', 'tr', function () {
                tblPedidos.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Pedidos.row(this).data();
                temp = parseInt(dtm.ID);
            });
            tblPedidos.find('tbody').on('dblclick', 'tr', function () {
                nuevo = false;
                tblPedidos.find("tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = Pedidos.row(this).data();
                temp = parseInt(dtm.ID);
                if (temp !== 0 && temp !== undefined && temp > 0) {
                    nuevo = false;
                    $.getJSON(master_url + 'getPedidoByID', {ID: temp}).done(function (data, x, jq) {
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
                console.log('editando...');
            });
        }
        HoldOn.close();
    }

    function getSerieXEstilo(Estilo) {
        $.getJSON(master_url + 'getSerieXEstilo', {Estilo: Estilo}).done(function (data, x, jq) {
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
                            placement: _placement_,
                            animate: _animate_,
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
                            placement: _placement_,
                            animate: _animate_,
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
                        placement: _placement_,
                        animate: _animate_,
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
        });
    }

    function getPrecioListaByEstiloByCliente(Estilo, Cliente) {
        $.getJSON(master_url + 'getPrecioListaByEstiloByCliente', {Estilo: Estilo, Cliente: Cliente}).done(function (data, x, jq) {
            if (data.length > 0) {
                pnlDatosDetalle.find("[name='Precio']").val(data[0].Precio);
            } else {
                console.log('NO SE ENCONTRO PRECIO EN EL ESTILO ' + Estilo + ', CLIENTE ' + Cliente);
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getCombinacionesXEstilo(Estilo) {
        $.getJSON(master_url + 'getCombinacionesXEstilo', {Estilo: Estilo}).done(function (data, x, jq) {
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
        $.getJSON(master_url + 'getEstilos').done(function (data, x, jq) {
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
        $.getJSON(master_url + 'getClientes').done(function (data, x, jq) {
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
        $.getJSON(master_url + 'getAgentes').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                pnlDatos.find("[name='Agente']")[0].selectize.addOption({text: v.Nombre, value: v.IdVendedor});
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
                    var detalle = [];
                    var limit = 36;
                    var x36 = pnlDetalle.find("#x36")[0].checked;
                    $.each(rows.find("input.numbersOnly:enabled"), function () {
                        var a = $(this);
                        var talla = rows.find("input").eq(a.parent().index()).val();
                        if (talla > 0) {
                            var cant = parseInt(a.val());
                            if (cant > 0) {
                                if (x36) {
                                    var divisible = (a.val() / limit);//SIRVE PARA SABER SI TIENE MÁS DE DOS PARTES LA CANTIDAD INGRESADA QUE SUPEREN 1
                                    if (divisible > 0) {
                                        var acumulador = 36;
                                        for (var i = 0; i < divisible; i++) {
                                            if (acumulador < a.val()) {
                                                var registros = {
                                                    Pedido: idMov,
                                                    Estilo: Estilo.val(),
                                                    Combinacion: Combinacion.val(),
                                                    Posicion: a.attr("name"),
                                                    Cantidad: limit,
                                                    FechaEntrega: FechaEntrega.val(),
                                                    Maq: Maquila.val(),
                                                    Sem: Semana.val(),
                                                    Recio: Recio.val(),
                                                    Precio: Precio.val(),
                                                    Desc_Por: Desc.val(),
                                                    Observaciones: observaciones,
                                                    Proceso: 1
                                                };
                                            } else {
                                                var registros = {
                                                    Pedido: idMov,
                                                    Estilo: Estilo.val(),
                                                    Combinacion: Combinacion.val(),
                                                    Posicion: a.attr("name"),
                                                    Cantidad: (limit - acumulador) < 0 ? (a.val() - (acumulador - limit)) : (a.val() <= limit) ? parseInt(a.val()) : limit,
                                                    FechaEntrega: FechaEntrega.val(),
                                                    Maq: Maquila.val(),
                                                    Sem: Semana.val(),
                                                    Recio: Recio.val(),
                                                    Precio: Precio.val(),
                                                    Desc_Por: Desc.val(),
                                                    Observaciones: observaciones,
                                                    Proceso: 2
                                                };
                                            }
                                            detalle.push(registros);
                                            acumulador += 36;
                                        }
                                    } else {
                                        var registros = {
                                            Pedido: idMov,
                                            Estilo: Estilo.val(),
                                            Combinacion: Combinacion.val(),
                                            Posicion: a.attr("name"),
                                            Cantidad: a.val(),
                                            FechaEntrega: FechaEntrega.val(),
                                            Maq: Maquila.val(),
                                            Sem: Semana.val(),
                                            Recio: Recio.val(),
                                            Precio: Precio.val(),
                                            Desc_Por: Desc.val(),
                                            Observaciones: observaciones,
                                            Proceso: 3
                                        };
                                        detalle.push(registros);
                                    }
                                } else {
                                    var registros = {
                                        Pedido: idMov,
                                        Estilo: Estilo.val(),
                                        Combinacion: Combinacion.val(),
                                        Posicion: a.attr("name"),
                                        Cantidad: a.val(),
                                        FechaEntrega: FechaEntrega.val(),
                                        Maq: Maquila.val(),
                                        Sem: Semana.val(),
                                        Recio: Recio.val(),
                                        Precio: Precio.val(),
                                        Desc_Por: Desc.val(),
                                        Observaciones: observaciones,
                                        Proceso: 2
                                    };
                                    detalle.push(registros);
                                }
                            }
                        }
                    });
                    frm.append('Detalle', JSON.stringify(detalle));
                    console.log("\n * DETALLE *\n", detalle, "\n", x36, "\n");
                    $.ajax({
                        url: master_url + ((x36) ? 'onAgregarDetalle36' : 'onAgregarDetalle'),
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: frm
                    }).done(function (data, x, jq) {
                        console.log("\n", "* DETALLE *", "\n");
                        console.log(data);
                        console.log("\n", "* FIN DETALLE *", "\n");
                        getDetalleByID(idMov);
                        $("[name='Estilo']")[0].selectize.focus();
                        $("[name='Estilo']")[0].selectize.clear(true);
                        $("[name='Combinacion']")[0].selectize.clear(true);
                        $("[name='Combinacion']")[0].selectize.clearOptions();
                        observaciones = "";
                    }).fail(function (x, y, z) {
                        console.log(x, y, z);
                    }).always(function () {
                    });
                } else {
                    onNotify('<span class="fa fa-times fa-lg"></span>', 'DEBE DE ESTABLECER UN COSTO', 'danger');
                    pnlDatos.find("input[name='Precio']").focus();
                }
            }
        });
    }

    function onModificarImportes(ID, Importe, Pares, Desc) {
        $.post(master_url + 'onModificarImportes', {ID: ID, Importe: Importe, Pares: Pares, Descuento: Desc}).done(function (data, x, jq) {
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    var ImporteT;
    var ParesT;
    var DescT;
    function onCalcularMontos() {
        var pares = 0;
        var total = 0.0;
        var desc = 0.0;
        $.each(PedidosDetalle.rows().data(), function () {
            pares += ($.isNumeric($(this)[28]) ? parseFloat($(this)[28]) : 0);
            total += ($.isNumeric(getNumberFloat($(this)[30])) ? getNumberFloat($(this)[30]) : 0);
            desc += ($.isNumeric(getNumberFloat($(this)[31])) ? getNumberFloat($(this)[31]) : 0);
        });
        ImporteT = total;
        ParesT = pares;
        DescT = desc;
        onModificarImportes(idMov, ImporteT, ParesT, DescT);
        if (PedidosDetalle.data().count() > 1) {
            pnlDetalle.find("#Pares").find("strong").text(pares);
            pnlDetalle.find("#Importe").find("strong").text('$' + $.number(total - desc, 2, '.', ','));
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

    var desc = 0;
</script>
<style>
    .swal-icon img {
        width: 220px;
    }
    .Stock{
        font-weight: bold;
        color: #78a864;
    }
    .NoStock {
        font-weight: bold;
        color: #ff0000;
    }
    .HasStock{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        background-color: #669900 !important;
        color: #fff !important;
    }
    .HasStock:hover{
        background-color: #ffff00 !important;
        color: #000 !important;
        font-weight: bold;
        -webkit-transform: scale(1.75);
        transform: scale(1.75);
    }
    .HasStockActive{
        background-color: #cc0033 !important;
        color: #fff !important;
    }
    .Serie{
        font-weight: bold;
        background-color: #333333 !important;
        color: #fff;
    }
    .Serie:hover{
        background-color: #ffff00 !important;
        color: #000;
    }
    .SerieActive{
        background-color: #ffff00 !important;
        color: #000;
    }
    .NoHasStock{
        background-color: #fff !important;
        color: #000 !important;
    }
    .card {
        background-color: transparent !important;
    }
    .card-header{
        cursor: pointer;
        color: #fff !important;
        background-color: transparent !important;
    }
    .zoom{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    .zoom:hover{
        font-weight: bold;
        background-color: #3498DB !important;
        color: #fff;
        -webkit-transform: scale(1.75);
        transform: scale(1.75);
    }
    .zoomx{
        -webkit-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }
    .zoomx:hover{
        z-index:1;
        cursor: pointer;
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #fff !important;
        -webkit-transform: scale(2);
        transform: scale(2);
    }

    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;

        border-top: 16px solid #333333;
        border-bottom: 16px solid #333333;

        width: 120px;
        height: 120px;
        -webkit-animation: spin .5s linear infinite;
        animation: spin .5s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    td:hover {
        position: relative;
    }

    td[title]:hover:after {
        text-align: center;
        content: attr(title);
        padding: 4px 8px 0px 0px;
        position: absolute;
        left: 0;
        top: 100%;
        white-space: nowrap;
        z-index: 1;
        background: #0099cc;
        color: #fff;
    }
    table tr  td > input[name^="T"].numbersOnly ,table tr  td > input[name^="C"].numbersOnly  {
        width: 35px !important;
    }
    table > tfoot > tr th{
        border: 1px solid #fff;
    }

    .btn-warning-3d  {
        border-color: #d08f29;
        border-bottom-width: 10px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19)!important;
    }
    .btn-warning-3d:active {
        background-color: #F39C12;
        border-top-width: 0px;
        border-bottom-width: 0px;
        margin-top: 10px;
    }
    tr.selected td.NoHasStock{
        color: #fff !important;
        background-color: #d32f2f !important;
    }
    tr.selected td.Descuento{
        color: #fff !important;
        background-color: #F39C12 !important;
    }
    tr.selected td.Importe{
        color: #fff !important;
        background-color: #669900 !important;
    }
    tr.selected td.Pares{
        color: #fff !important;
        background-color: #0099cc !important;
    }
    div.table-responsive tr:not(.Serie):hover > td:not(.HasStock){
        color: #000 !important;
        background-color: #fff !important;
        font-weight: bold !important;
        /*box-shadow: inset 0 -2px 0 #0099cc;*/
        box-shadow: inset 0 -2px 0 #0099cc;  
    }
    div.table-responsive tr:not(.Serie):hover > td:not(.HasStock):hover{
        color: #000 !important;
        background-color: #fff !important;
        font-weight: bold !important;
        box-shadow: inset 0 -2px 0 #669900;   
    }     
</style>