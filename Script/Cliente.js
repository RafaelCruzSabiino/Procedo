$(document).ready(function(){
    ListarCliente();
});

function ListarCliente(){
    if ($.fn.dataTable.isDataTable("#table-cliente")) {
        $("#table-cliente").DataTable().destroy();
    }

    $('#table-cliente').DataTable({ 
        ajax: {
            url: "../Controllers/Base/Gerenciar.php?Controller=ClienteController&Funcao=ListarCliente",
            dataSrc: ''
        },
        language: LanguageDefault()
    });   
};