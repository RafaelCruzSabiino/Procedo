$(document).ready(function(){
    ListarCliente();
    GetOrigem();
    GetEstados();
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

function GetCliente(){
    if(Cliente.Codigo != null && Cliente.Codigo != ""){
        $.post(
            "../Controllers/Base/Gerenciar.php?Controller=ClienteController&Funcao=GetCliente",{
                Codigo : Cliente.Codigo
            }, function(data){
                debugger;
                Info = JSON.parse(data);
                if(!Info.Erro){
                    var origem = [];
                    for(var i=0;  i < Info.Item.Origem.length; i++){
                        origem.push(Info.Item.Origem[i].Codigo);
                    }

                   $("#Nome").val(Info.Item.Nome);
                   Cliente.Nome = Info.Item.Nome;
                   $("#Email").val(Info.Item.Email);
                   Cliente.Email = Info.Item.Email;
                   $("#Documento").val(Info.Item.Documento);
                   Cliente.Documento = Info.Item.Documento;
                   $("#Telefone").val(Info.Item.Telefone);
                   Cliente.Telefone = Info.Item.Telefone;
                   $("#Estado").val(Info.Item.Estado);
                   $("#Cidade").val(Info.Item.Cidade);
                   Cliente.Cidade = Info.Item.Cidade;
                   $("#Situacao").val(Info.Item.Situacao);
                   Cliente.Situacao = Info.Item.Situacao;
                   $("#Observacao").val(Info.Item.Observacao);
                   Cliente.Observacao = Info.Item.Observacao;
                   $("#Origem").val(origem).trigger("change");
                }
                else{
                    $("#labelErrorResponse").html(Info.Mensagem);
                    $("#ErrorResponse").fadeIn();
                }
            }
        );
    }else{
        $("#labelErrorResponse").html("Houve Algum Erro na Busca do Usuário!");
        $("#ErrorResponse").fadeIn();
    }
}

function SelecionarModalAlterar(codigo){
    $("#ErrorResponse").fadeOut();
    Cliente.Codigo = codigo;
    GetCliente();    
    $("#modal-alterar-cliente").modal();
}

function SelecionarModalExcluir(codigo, usuario){
    Cliente.Codigo = codigo;
    $("#returnExcluir").html(usuario);
    $("#modal-excluir-cliente").modal();
}

function AlterarCliente(){
    Cliente.Origem = $("#Origem").val();

    if(ValidarCliente()){
        $.ajax({
                url: "https://api.hunter.io/v2/email-verifier?email=" + Cliente.Email + "&api_key=838f1852ed755b445253132ca98aaeb81fff1c6f",                
                type: 'GET',
                success:function(info){
                if(info != null && info.data.webmail){
                    ConfirmarAlteracao();
                }else{
                    $("#labelErrorResponse").html("E-mail Inválido!");
                    $("#ErrorResponse").fadeIn();
                }
            }
        });
    }else{
        $("#labelErrorResponse").html(Cliente.MensagemError);
        $("#ErrorResponse").fadeIn();
    }
}

function ConfirmarAlteracao(){    
    $.post(
        "../Controllers/Base/Gerenciar.php?Controller=ClienteController&Funcao=AlterarCliente",{
            Dados : JSON.stringify(Cliente)
        }, function(data){
            debugger;
            Info = JSON.parse(data);
            if(!Info.Erro){
                ListarCliente();                    
                $("#modal-alterar-cliente").modal("hide");
            }
            else{
                $("#labelErrorResponse").html(Info.Mensagem);
                $("#ErrorResponse").fadeIn();
            }
        }
    );
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