<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php print base_url(); ?>img/LS32X32.png">
        <meta name="theme-color" content="#ffffff">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Zap Lobo Solo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php print base_url(); ?>js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap CSS -->
        <link href="<?php print base_url('css/bootstrap-r.css') ?>" rel="stylesheet">

        <link href="<?php print base_url('js/submenu-boostrap4/bootstrap-4-navbar.min.css') ?>" rel="stylesheet">

        <!--DataTables Plugin-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.css">
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.js"></script>

        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/JSZip-3.1.3/jszip.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/tabletools/master/DataTables/Buttons-1.5.1/js/buttons.html5.min.js" type="text/javascript"></script>

        <!--select2 control-->
        <script src="<?php echo base_url(); ?>js/selectize/js/standalone/selectize.min.js"></script>
        <link href="<?php echo base_url(); ?>js/selectize/css/selectize.bootstrap.css" rel="stylesheet" />
        <!-- Validacion forms -->
        <script rel="javascript" type="text/javascript" href="<?php echo base_url(); ?>js/additional-methods.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
        <!-- Shortcut key -->
        <script src="<?php echo base_url(); ?>js/ShortCut/shortcut.js"></script>
        <!--Font Awesome Icons-->
        <script defer src="<?php print base_url(); ?>js/fontawesome-all.js"></script>
        <link rel="stylesheet" href="<?php print base_url(); ?>css/animate.min.css">
        <!--HoldOn Stupid Accions-->
        <link href="<?php print base_url(); ?>css/HoldOn.min.css" rel="stylesheet">
        <script src="<?php print base_url(); ?>js/HoldOn.min.js"></script>

        <script src="<?php print base_url(); ?>js/pace.min.js"></script>
        <link href="<?php print base_url(); ?>css/pace.css" rel="stylesheet" />
        <!--Masked number format money etc-->
        <script src="<?php print base_url(); ?>js/jquery.maskedinput.min.js"></script>
        <!--Masked number format money etc-->
        <script src="<?php print base_url(); ?>js/jquery.maskMoney.min.js"></script>
        <!--Modales simplificados-->
        <script src="<?php print base_url(); ?>js/sweetalert.min.js"></script>

        <!--Notifiers-->
        <script src="<?php echo base_url(); ?>js/notify/bootstrap-notify-3.1.3/bootstrap-notify.min.js"></script>
        <!--Date picker-->
        <link href="<?php echo base_url(); ?>js/datepicker/datepicker3.css" rel="stylesheet"/>
        <script src="<?php echo base_url(); ?>js/datepicker/bootstrap-datepicker.min.js"></script>
        <!--Time picker-->
        <link href="<?php echo base_url(); ?>js/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <script src="<?php echo base_url(); ?>js/timepicker/bootstrap-timepicker.min.js"></script>
        <!--jQuery Number Format-->
        <script src="<?php echo base_url(); ?>js/jnumber/jquery.number.min.js"></script>

        <!-- Custom styles for this template -->
        <link href="<?php print base_url('css/style.css') ?>" rel="stylesheet">

        <!-- Custom scripts for this template -->
        <script src="<?php echo base_url(); ?>js/scripts.js"></script>
    </head>

    <script>
        var base_url = "<?php print base_url(); ?>";
        $(function () {
            $('.money').maskMoney({prefix: '$', allowNegative: false, thousands: ',', decimal: '.', affixesStay: false});
            // $(".btn").addClass("animated shake");
            $("table.display").DataTable(tableOptions);
            $('table').css('display', 'block');
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            });
            $('a[data-toggle="collapse"]').on('shown.bs.tab', function (e) {
                $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            });
            $("select").not('.NotOpenDropDown').selectize({
                hideSelected: true,
                openOnFocus: true
            });
            $("select").filter('.NotOpenDropDown').selectize({
                hideSelected: true,
                openOnFocus: false
            });


            $('.numbersOnly').keypress(function (event) {
                var charCode = (event.which) ? event.which : event.keyCode;
                if (
                        (charCode !== 45 || $(this).val().indexOf('-') !== -1) && // “-” CHECK MINUS, AND ONLY ONE.
                        (charCode !== 46 || $(this).val().indexOf('.') !== -1) && // “.” CHECK DOT, AND ONLY ONE.
                        (charCode < 48 || charCode > 57))
                    return false;

                return true;
            });

            $('.modal').on('shown.bs.modal', function (e) {
                $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
            });
            //Esto se hace para que ejecute el validador de campos
            $('[data-provide="datepicker"]').on('changeDate', function (ev) {
//               $(this).valid();
            });
            $('[data-provide="datepicker"]').datepicker({
                todayBtn: true,
                autoclose: true,
                todayHighlight: true
            });

            /*Mensajes de jquery validate*/
            jQuery.validator.messages.required = 'Este campo es obligatorio';
            jQuery.validator.messages.number = 'Este campo debe ser numérico';
            jQuery.validator.messages.email = 'Correo no válido';

        });

        function isValid(p) {
            var inputs = $('#' + p).find("div.card-body").find("input.form-control:required").length;
            var selects = $('#' + p).find("div.card-body").find("select.required").length;
            var valid_inputs = 0;
            var valid_selects = 0;

            $.each($('#' + p).find("div.card-body").find("input.form-control:required"), function () {
                var e = $(this).parent().find("small.text-danger");
                if ($(this).val() === '' && e.length === 0) {
                    $(this).parent().find("label").after("<small class=\"text-danger\"> Este campo es obligatorio</small>");
                    $(this).css("border", "1px solid #d01010");
                    valido = false;
                } else {
                    if ($(this).val() !== '') {
                        $(this).css("border", "1px solid #ccc");
                        $(this).parent().find("small.text-danger").remove();
                        valid_inputs += 1;
                    }
                }
            });
            $.each($('#' + p).find("div.card-body").find("select.required"), function () {
                var e = $(this).parent().find("small.text-danger");
                if ($(this).val() === '' && e.length === 0) {
                    $(this).after("<small class=\"text-danger\"> Este campo es obligatorio</small>");
                    $(this).parent().find(".selectize-input").css("border", "1px solid #d01010");
                    valido = false;
                } else {
                    if ($(this).val() !== '') {
                        $(this).parent().find(".selectize-input").css("border", "1px solid #ccc");
                        $(this).parent().find("small.text-danger").remove();
                        valid_selects += 1;
                    }
                }
            });

            if (valid_inputs === inputs && valid_selects === selects) {
                valido = true;
            }
        }

        function onNotify(span, message, type) {
            $.notify({
                title: span,
                message: message
            }, {
                type: type,
                z_index: 3031,
                delay: 2000,
                placement: {
                    from: "bottom",
                    align: "right"
                },
                animate: {
                    enter: 'animated fadeInUp',
                    exit: 'animated fadeOutDown'
                }
            });
        }
        var valido = false;
        function isValid(p) {
            var inputs = $('#' + p).find("div.card-body").find("input.form-control:required").length;
            var selects = $('#' + p).find("div.card-body").find("select.required").length;
            var valid_inputs = 0;
            var valid_selects = 0;

            $.each($('#' + p).find("div.card-body").find("input.form-control:required"), function () {
                var e = $(this).parent().find("small.text-danger");
                if ($(this).val() === '' && e.length === 0) {
                    $(this).parent().find("label").after("<small class=\"text-danger\"> Este campo es obligatorio</small>");
                    $(this).css("border", "1px solid #d01010");
                    valido = false;
                } else {
                    if ($(this).val() !== '') {
                        $(this).css("border", "1px solid #ccc");
                        $(this).parent().find("small.text-danger").remove();
                        valid_inputs += 1;
                    }
                }
            });
            $.each($('#' + p).find("div.card-body").find("select.required"), function () {
                var e = $(this).parent().find("small.text-danger");
                if ($(this).val() === '' && e.length === 0) {
                    $(this).after("<small class=\"text-danger\"> Este campo es obligatorio</small>");
                    $(this).parent().find(".selectize-input").css("border", "1px solid #d01010");
                    valido = false;
                } else {
                    if ($(this).val() !== '') {
                        $(this).parent().find(".selectize-input").css("border", "1px solid #ccc");
                        $(this).parent().find("small.text-danger").remove();
                        valid_selects += 1;
                    }
                }
            });

            if (valid_inputs === inputs && valid_selects === selects) {
                valido = true;
            }
        }
        function onBeep(indice) {
            var audio = new Audio('<?php print base_url(); ?>media/' + indice + '.mp3');
            audio.play();
        }
    </script>
