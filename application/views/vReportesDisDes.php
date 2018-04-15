<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Reportes Diseño y Desarrollo</legend>
        <!--        <div align="right">
                    <button type="button" class="btn btn-primary" id="btnNuevo"><span class="fa fa-file-pdf-o"></span><br>VER REPORTE</button>
                </div>-->

        <div class="card-block">
            <div class="card-body row">
                <div class="col-sm">
                    <label for="Reporte">Selecciona el reporte que deseas visualizar*</label>
                    <select class="form-control form-control-sm" id="Reporte" name="Reporte" required> 
                        <option value=""></option>
                        <option value="mdlImprimirFichaTecnica">FICHA TÉCNICA</option>
                        <option value="onReporteManoObra">MANO DE OBRA</option> 
                        <option value="onReporteMateriales">MATERIALES</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MODALES--> 
<!--Confirmacion Eliminar Concepto-->
<div class="modal" id="mdlImprimirFichaTecnica"  role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Imprimir Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmFichaTecnica">
                    <div class="row">
                        <div class="col-sm">
                            <label for="Estilo">Estilo*</label>
                            
                            
                            <select class="form-control form-control-sm" id="Estilo"   name="Estilo">  
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="Combinacion">Combinación*</label>
                            <select class="form-control form-control-sm" id="Combinacion"  name="Combinacion"> 
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-raised btn-primary" id="btnImprimirReporteFichaTecnica">IMPRIMIR</button>
            </div>
        </div>
    </div>
</div>

<script>
    var master_url = base_url + 'index.php/ReportesDisDes/';

    $(document).ready(function () {
        getEstilos();
        
        $("#Estilo").change(function () {
            getCombinacionesXPiezaMaterial($(this).val());
        });
        
        
        //Abrir modales para filtros
        $("#Reporte").change(function () {
            var modal = $(this).val();
            $('#' + modal).modal('show');
//            var fn = window[$(this).val()];
//            if (typeof fn === "function") {
//                fn();
//            }
        });

        $('#btnImprimirReporteFichaTecnica').on("click", function () {
            var frm = new FormData($('#mdlImprimirFichaTecnica').find("#frmFichaTecnica")[0]);
            frm.append('ID', 2);
            $.ajax({
                url: master_url + 'onImprimirFichaTecnica',
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
            }).always(function () {
            });
        });

    });


    function getEstilos() {
        $.getJSON(master_url + 'getEstilos').done(function (data, x, jq) {
            $.each(data, function (k, v) {
                 $('#mdlImprimirFichaTecnica').find("#Estilo")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

    function getCombinacionesXPiezaMaterial(Estilo) {
        
         HoldOn.open({theme: 'sk-bounce', message: 'ESPERE...'});
        $.ajax({
            url: master_url + 'getCombinacionesXPiezaMaterial',
            type: "POST",
            dataType: "JSON",
            data: {
                Estilo: Estilo
            }
        }).done(function (data, x, jq) {
            $.each(data, function (k, v) {
                  $('#mdlImprimirFichaTecnica').find("#Combinacion")[0].selectize.addOption({text: v.Descripcion, value: v.ID});
            });
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
        
      
    }

</script>