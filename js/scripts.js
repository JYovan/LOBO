/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*******************************************************************************
 * VAR FOR TEMPORAL DATA
 *******************************************************************************/
var temp = 0;
/*******************************************************************************
 * VAR FOR VALID DATA
 *******************************************************************************/
var valido = false;
/*******************************************************************************
 * EVENT FOR CLICK ROW
 *******************************************************************************/
var selected = [];
/*******************************************************************************
 * OPTIONS FOR TABLES
 *******************************************************************************/
var tableOptions = {
    "dom": 'Bfrtip',
     buttons: [
        {
            extend: 'excelHtml5',
            text: ' <i class="fa fa-file-excel"></i>',
            titleAttr: 'Excel',
            exportOptions: {
                columns: ':visible'
            }
        }
        ,
        {

            extend: 'colvis',
            text: '<i class="fa fa-columns"></i>',
            titleAttr: 'Seleccionar Columnas',
            exportOptions: {
                modifier: {
                    page: 'current'
                },
                columns: ':visible'
            }
        }

    ],
    language: {
        processing: "Proceso en curso...",
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ Elementos",
        info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
        infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
        infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
        infoPostFix: "",
        loadingRecords: "Procesando los datos...",
        zeroRecords: "No se encontro nada.",
        emptyTable: "No existen datos en la tabla.",
        paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "&Uacute;ltimo"
        },
        aria: {
            sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
            sortDescending: ": Habilitado para ordenar la columna en orden descendente"
        },
        buttons: {
            copyTitle: 'Registros copiados a portapapeles',
            copyKeys: 'Copiado con teclas clave.',
            copySuccess: {
                _: ' %d Registros copiados',
                1: ' 1 Registro copiado'
            }
        }
    },
    "autoWidth": true,
    "colReorder": true,
    "displayLength": 20,
    "bStateSave": true,
    "bLengthChange": false,
    "deferRender": true,
//    "scrollY": false,
//    "scrollX": true,
    "scrollCollapse": false,
    "bSort": true,
    "aaSorting": [
        [1, 'desc']
    ]
            //    ,
            //    "columnDefs": [
            //        {"width": "20%", "targets": [0]}
            //    ]
};

var tableOptionsDetalleInfinito = {
    "dom": 'frti',
    language: {
        processing: "Proceso en curso...",
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ Elementos",
        info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
        infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
        infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
        infoPostFix: "",
        loadingRecords: "Procesando los datos...",
        zeroRecords: "No se encontro nada.",
        emptyTable: "No existen datos en la tabla.",
        paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "&Uacute;ltimo"
        },
        aria: {
            sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
            sortDescending: ": Habilitado para ordenar la columna en orden descendente"
        },
        buttons: {
            copyTitle: 'Registros copiados a portapapeles',
            copyKeys: 'Copiado con teclas clave.',
            copySuccess: {
                _: ' %d Registros copiados',
                1: ' 1 Registro copiado'
            }
        }
    },

    "autoWidth": true,
    "colReorder": true,
    "displayLength": 200,
    "bStateSave": true,
    "bLengthChange": false,
    "deferRender": true,
    "scrollY": 450,
    "scrollX": true,
    "scrollCollapse": false,
    "bSort": false
//    "aaSorting": [
//        [0, 'desc']
//    ]
            //    ,
            //    "columnDefs": [
            //        {"width": "20%", "targets": [0]}
            //    ]
};

var tableOptionsDetalle = {
    "dom": 'frt',
    language: {
        processing: "Proceso en curso...",
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ Elementos",
        info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
        infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
        infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
        infoPostFix: "",
        loadingRecords: "Procesando los datos...",
        zeroRecords: "No se encontro nada.",
        emptyTable: "No existen datos en la tabla.",
        paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "&Uacute;ltimo"
        },
        aria: {
            sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
            sortDescending: ": Habilitado para ordenar la columna en orden descendente"
        },
        buttons: {
            copyTitle: 'Registros copiados a portapapeles',
            copyKeys: 'Copiado con teclas clave.',
            copySuccess: {
                _: ' %d Registros copiados',
                1: ' 1 Registro copiado'
            }
        }
    },

    "autoWidth": true,
    "colReorder": true,
    "bStateSave": true,
    "bLengthChange": false,
    "deferRender": true,
    "scrollX": true,
    "scrollCollapse": false,
    "bSort": false
//    "aaSorting": [
//        [0, 'desc']
//    ]
            //    ,
            //    "columnDefs": [
            //        {"width": "20%", "targets": [0]}
            //    ]
};

var tableOptionsMiniTables = {
    "dom": 'frt',
    language: {
        processing: "Proceso en curso...",
        search: "Buscar:",
        lengthMenu: "Mostrar _MENU_ Elementos",
        info: "Mostrando  _START_ de _END_ , de _TOTAL_ Elementos.",
        infoEmpty: "Mostrando 0 de 0 A 0 Elementos.",
        infoFiltered: "(Filtrando un total _MAX_ Elementos. )",
        infoPostFix: "",
        loadingRecords: "Procesando los datos...",
        zeroRecords: "No se encontro nada.",
        emptyTable: "No existen datos en la tabla.",
        paginate: {
            first: "Primero",
            previous: "Anterior",
            next: "Siguiente",
            last: "&Uacute;ltimo"
        },
        aria: {
            sortAscending: ": Habilitado para ordenar la columna en orden ascendente",
            sortDescending: ": Habilitado para ordenar la columna en orden descendente"
        },
        buttons: {
            copyTitle: 'Registros copiados a portapapeles',
            copyKeys: 'Copiado con teclas clave.',
            copySuccess: {
                _: ' %d Registros copiados',
                1: ' 1 Registro copiado'
            }
        }
    },

    "autoWidth": true,
    "colReorder": true,
    "bStateSave": true,
    "bLengthChange": false,
    "deferRender": true,
    "scrollY": 200,
    scrollX: "100%",
    "scrollCollapse": false,
    "paging": false,
    "bSort": true
//    "aaSorting": [
//        [0, 'desc']
//    ]
            //    ,
            //    "columnDefs": [
            //        {"width": "20%", "targets": [0]}
            //    ]
};

function getTable(tblname, data) {
    var column = '';
    var i = 0;
    var div = "<div class=\" \">";
    div = "<table id=\"" + tblname + "\" class=\" table table-sm  \"  width=\"100%\">";
    //Create header
    div += "<thead>";
    div += "<tr class=\"\" >";
    for (var key in data[i]) {
        column += "<th>" + key + "</th>";
    }
    div += column;
    div += "</tr></thead>";
    //Create Rows
    div += "<tbody>";
    $.each(data, function (key, value) {
        div += "<tr data-toggle='tooltip' title='Haga clic para editar' >";
        $.each(value, function (key, value) {
            div += "<td>" + value + "</td>";
        });
        div += "</tr>";
    });
    div += "</tbody>";
    //Create Footer
    div += "<tfoot>";
    div += "<tr class=\"\">";
    div += column;
    div += "</tr></tfoot>";
    div += "</table>";
    div += "</div>";
    return div;
}
function getExt(filename) {
    var dot_pos = filename.lastIndexOf(".");
    if (dot_pos === -1)
        return "";
    return filename.substr(dot_pos + 1).toLowerCase();
}



function handleEnter() {
    $('input:not(.notEnter)').keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });
    $('body').on('keydown', 'input, select, textarea', function (e) {
        var self = $(this)
                , form = self.parents('body')
                , focusable
                , next
                ;
        if (e.keyCode === 13) {
            focusable = form.find('input,a,select,button,textarea').filter(':visible:enabled').not('.disabledForms');
            next = focusable.eq(focusable.index(this) + 1);
            if (next.length) {
                next.focus();
                next.select();
            }
            return false;
        }
    });
}

function getNumber(x) {
    return x.replace(/\s+/g, '').replace(/,/g, "").replace("$", "");
}

function getNumberFloat(x) {
    return parseFloat(x.replace(/\s+/g, '').replace(/,/g, "").replace("$", ""));
}