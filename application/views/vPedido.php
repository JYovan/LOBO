<div class="card " id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Pedidos</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-plus"></span><br></button>
                <button type="button" class="btn btn-primary" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>

<!--NUEVO PEDIDO-->
<div class="modal" id="mdlNuevo" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">NUEVO PEDIDO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <label for="">Folio</label>
                        <input type="text" id="Folio" name="Folio" class="form-control" placeholder="0001">
                    </div>
                    
                    <div class="col-4">
                        <label for="">Fecha Entrega</label>
                        <input type="text" id="Folio" name="Folio" class="form-control" placeholder="0001">
                    </div>
                    
                    <div class="col-4">
                        <label for="">Cliente*</label>
                        <select class="form-control form-control-sm"  name="Cliente" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="w-100 d-none"></div>
                    <div class="col-4">
                        <label for="">Transporte*</label>
                        <select class="form-control form-control-sm"  name="Transporte" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="">Orden de compra*</label>
                        <select class="form-control form-control-sm"  name="Transporte" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="">Estatus*</label>
                        <select class="form-control form-control-sm"  name="Estatus" >
                            <option value=""></option>
                        </select>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-raised btn-primary" id="btnGuardar">GUARDAR</button>
            </div>
        </div>
    </div>
</div>


<!--ELIMINAR PEDIDO-->
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

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/Pedido';
    // IIFE - Immediately Invoked Function Expression
    (function (yourcode) {

        // The global jQuery object is passed as a parameter
        yourcode(window.jQuery, window, document);
    }(function ($, window, document) {

        // The $ is now locally scoped 

        // Listen for the jQuery ready event on the document
        $(function () {

        });
    }));
</script>