<div class="card " id="pnlTablero">
    <div class="card-body">
        <legend class="float-left">Gestión de Fracciones X Estilo</legend>
        <div align="right">
            <button type="button" class="btn btn-dark" id="btnNuevo"><span class="fa fa-plus"></span><br>AGREGAR</button>
            <button type="button" class="btn btn-dark" id="btnRefrescar"><span class="fa fa-refresh"></span><br>REFRESCAR</button>
            <button type="button" class="btn btn-dark" id="btnConfirmarEliminar"><span class="fa fa-trash"></span><br>ELIMINAR</button>
        </div>

        <div class="card-block">
            <div id="tblRegistros"></div>
        </div>
    </div>
</div>

<!--SCRIPT-->
<script>
    var master_url = base_url + 'index.php/FraccionesXEstilo/';

    var pnlTablero = $("#pnlTablero");
//    var pnlNuevo = $("#pnlNuevo");
    var btnNuevo = $("#btnNuevo");
//    var btnGuardar = pnlNuevo.find("#btnGuardar");
//    var btnCancelar = pnlNuevo.find("#btnCancelar");
//    var pnlEditar = $("#pnlEditar");
//    var btnModificar = pnlEditar.find("#btnModificar");
//    var btnCancelarModificar = pnlEditar.find("#btnCancelar");
    var btnRefrescar = $("#btnRefrescar");
    var btnEliminar = $("#btnEliminar");
//    var btnConfirmarEliminar = $("#btnConfirmarEliminar");
//    var mdlConfirmar = $("#mdlConfirmar");

    $(document).ready(function () {

        $(".select2-selection").on("focus", function () {
            $(this).parent().parent().prev().select2("open");
        });

        btnRefrescar.click(function () {
            getRecords();
        });

        getRecords();
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
            console.log(data);
            if(data.length > 0){
                
            
            $("#tblRegistros").html(getTable('tblFraccionesXEstilo', data));

            $('#tblFraccionesXEstilo tfoot th').each(function () {
                $(this).html('');
            });
            var thead = $('#tblFraccionesXEstilo thead th');
            var tfoot = $('#tblFraccionesXEstilo tfoot th');
            thead.eq(0).addClass("d-none");
            tfoot.eq(0).addClass("d-none");
            $.each($.find('#tblFraccionesXEstilo tbody tr'), function (k, v) {
                var td = $(v).find("td");
                td.eq(0).addClass("d-none");
            });
            var tblSelected = $('#tblFraccionesXEstilo').DataTable(tableOptions);
            $('#tblFraccionesXEstilo_filter input[type=search]').focus();

            $('#tblFraccionesXEstilo tbody').on('click', 'tr', function () {

                $("#tblFraccionesXEstilo tbody tr").removeClass("success");
                $(this).addClass("success");
                var dtm = tblSelected.row(this).data();
                temp = parseInt(dtm[0]);
            });

            $('#tblFraccionesXEstilo tbody').on('dblclick', 'tr', function () {
                $("#tblFraccionesXEstilo tbody tr").removeClass("success");
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
                    HoldOn.open({
                        theme: "sk-bounce",
                        message: "CARGANDO DATOS..."
                    });
                    $.ajax({
                        url: master_url + 'getFraccionXEstiloByID',
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            ID: temp
                        }
                    }).done(function (data, x, jq) {

//                        pnlEditar.find("input").val("");
//                        pnlEditar.find("select").val("").trigger('change');
//                        $.each(data[0], function (k, v) {
//                            pnlEditar.find("#" + k).val(v);
//                            //pnlEditar.find("#" + k).val(v).trigger('change');
//                            pnlEditar.find("[name='" + k + "']").val(v).trigger('change');
//                        });
//                        pnlTablero.addClass("d-none");
//                        pnlEditar.removeClass('d-none');
//                        $(':input:text:enabled:visible:first').focus();
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
            }else{
            
            
            }
        }).fail(function (x, y, z) {
            console.log(x, y, z);
        }).always(function () {
            HoldOn.close();
        });
    }

</script>
