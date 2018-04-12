<div class="container ">
    <div class="row ">
        <div class="Absolute-Center is-Responsive panel">
            <center><img class="mb-4" src="<?php print base_url('img/LS.png'); ?>" alt="" width="72" height="72"></center>
            <form id="frmIngresar" class="form-horizontal ">
                <div class="form-group">
                    <input type="email" class="form-control form-control-sm" id="Usuario" name="Usuario" placeholder="Email*" >
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-sm" id="Contrasena" name="Contrasena" placeholder="Contraseña*">
                </div>
                <div align="right">
                    <button id="btnIngresar" type="button" class="btn btn-raised btn-primary">INGRESAR</button>
                    <hr>
                </div>
                <div class=" dt-buttons" align="left">
                    <button id="btnOlvidasteContrasena" type="button"  class="btn btn-default">Olvidaste tu contraseña?</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var master_url = base_url + "Login/";
    var btnIngresar = $("#btnIngresar");
    var Usuario = $("#Usuario");
    var Contrasena = $("#Contrasena");

    $(document).ready(function () {
        handleEnter();
        Usuario.focus();
        Usuario.val("");
        Contrasena.val("");
        btnIngresar.click(function () {
            login();
        });
        btnIngresar.keypress(function (e) {
            if (e.which === 13) {
                login();
            }
            e.preventDefault();
        });
    });

    function login() {
        if (Usuario.val() !== '' && Contrasena.val() !== '') {
            HoldOn.open({
                theme: 'sk-bounce',
                message: 'ESPERE...'
            });
            setTimeout(function () {
                var frm = $("#frmIngresar");
                $.ajax({
                    url: master_url + "onIngreso",
                    type: "POST",
                    data: {
                        USUARIO: frm.find("#Usuario").val(),
                        CONTRASENA: frm.find("#Contrasena").val()
                    }
                }).done(function (data, x, jq) {
                    if (parseInt(data) === 1) {
                        location.reload(true);
                    } else {
                        onNotify('<span class="fa fa-exclamation fa-lg"></span>', data, 'danger');
                    }
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                }).always(function () {
                    HoldOn.close();
                });
            }, 1000);
        } else {
        }
    }

</script>