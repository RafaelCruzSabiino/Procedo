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

function SelecionarModalExcluir(codigo, usuario){
    Cliente.Codigo = codigo;
    $("#returnExcluir").html(usuario);
    $("#modal-excluir-cliente").modal();
}

function ExcluirCliente(){
    if(Cliente.Codigo != ""){
        $.post(
            "../Controllers/Base/Gerenciar.php?Controller=ClienteController&Funcao=ExcluirCliente",{
                Codigo : Cliente.Codigo
            }, function(data){
                Info = JSON.parse(data);
                if(!Info.Erro){
                    ListarCliente();                    
                    $("#modal-excluir-cliente").modal("hide");
                }
                else{
                    $("#labelErrorResponseExcluir").html(Info.Mensagem);
                    $("#ErrorResponseExcluir").fadeIn();
                }
            }
        );
    }else{
        $("#labelErrorResponseExcluir").html("Codigo Não Encontrado!");
        $("#ErrorResponseExcluir").fadeIn();
    }
}