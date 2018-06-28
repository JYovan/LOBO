<div class="modal " id="mdlExplosionInsumos"  role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Imprimir Explosión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmExplosionInsumos">
                    <div class="row">

                        <div class="col-12 col-sm-6">
                            <label>De la Maq</label>
                            <input type="text" maxlength="2" class="form-control form-control-sm numbersOnly" id="dMaquila" name="dMaquila" >
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>A la Maq</label>
                            <input type="text" maxlength="2" class="form-control form-control-sm numbersOnly" id="aMaquila" name="aMaquila" >
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>De la Sem</label>
                            <input type="text" maxlength="2" class="form-control form-control-sm numbersOnly" id="dSemana" name="dSemana" >
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>A la Sem</label>
                            <input type="text" maxlength="2" class="form-control form-control-sm numbersOnly" id="aSemana" name="aSemana" >
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Año</label>
                            <input type="text" maxlength="4" class="form-control form-control-sm numbersOnly" id="Ano" name="Ano" >
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Tipo Explosión</label>
                            <select class="form-control form-control-sm required" id="TipoE" name="TipoE" required="">
                                <option value=""></option>
                                <option value="1">PIEL Y FORRO</option>
                                <option value="2">SUELA</option>
                                <option value="3">INDIRECTOS</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-primary" id="btnImprimirReporteExplosion">IMPRIMIR</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>
<script>
    var master_url = base_url + 'index.php/ReportesCompras/';
    $(document).ready(function () {

        $('#mdlExplosionInsumos').on('shown.bs.modal', function () {
            $(':input:text:enabled:visible:first').focus();
        });

        $('#btnImprimirReporteExplosion').on("click", function () {
            HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
            var frm = new FormData($('#mdlExplosionInsumos').find("#frmExplosionInsumos")[0]);
            frm.append('Ano', $('#Ano').val().substr(2));
            $.ajax({
                url: master_url + 'onImprimirExplosion',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: frm
            }).done(function (data, x, jq) {
                console.log(data);
                if (data.length > 0) {
                    onNotify('<span class="fa fa-check fa-lg"></span>', 'REPORTE GENERADO', 'success');
                    window.open(data, '_blank');
                } else {
                    onNotify('<span class="fa fa-exclamation fa-lg"></span>', 'NO EXISTEN DATOS PARA EL REPORTE', 'danger');
                }
                HoldOn.close();
            }).fail(function (x, y, z) {
                console.log(x, y, z);
                HoldOn.close();
            }).always(function () {
            });
        });
        handleEnter();
    });

</script>