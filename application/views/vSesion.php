<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .div-login {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

</style>
<form id="frmIngresar" class="div-login text-center">
    <h4 class="mb-3">Control de Acceso</h4>
    <input type="email" id="Usuario" name="Usuario" class="form-control" placeholder="Usuario" required autofocus>
    <input type="password" id="Contrasena" name="Contrasena" class="form-control" placeholder="Contraseña" required>
    <br>
    <button class="btn btn-primary btn-block" id="btnIngresar" type="button">Ingresar</button>
    <hr>
    <button class="btn btn-warning btn-block" id="btnOlvidasteContrasena" type="button">Olvidaste tu contraseña?</button>
</form>

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
        HoldOn.open({
            theme: 'sk-bounce',
            message: 'ESPERE...'
        });
        if (Usuario.val() !== '' && Contrasena.val() !== '') {
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
                    HoldOn.close();
                }).fail(function (x, y, z) {
                    console.log(x, y, z);
                    HoldOn.close();
                }).always(function () {

                });
            }, 1000);
        } else {
        }
    }

</script>