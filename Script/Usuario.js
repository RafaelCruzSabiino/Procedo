$(document).ready(function(){
    ListarUsuario();
    GetEstados();
});

function AplicarFiltro(css){
    if(css != "none"){
        $("#btnFiltrar").html("").append("Cancelar <i class='fa fa-times'></i>").removeClass("btn-primary").addClass("btn-danger").attr("onclick", "AplicarFiltro('none')");      
    }else{
        $("#btnFiltrar").html("").append("Filtros").removeClass("btn-danger").addClass("btn-primary").attr("onclick", "AplicarFiltro('block')");
    }

    if($("#EstadoFiltro").val() == null){
        GetEstados('EstadoFiltro', 'CidadeFiltro');
    }

    $("#filtrosUsuario, #filtrarUsuario").css("display", css);
};

function ListarUsuario(){   
    Usuario.Nome     = $("#NomeFiltro").val();
    Usuario.Estado   = $("#EstadoFiltro").val();
    Usuario.Cidade   = $("#CidadeFiltro").val();
    Usuario.Situacao = $("#SituacaoFiltro").val();

    if ($.fn.dataTable.isDataTable("#table-usuario")) {
        $("#table-usuario").DataTable().destroy();
    }

    $('#table-usuario').DataTable({
        language: LanguageDefault()
    });    
    
    $.post(
        "../Controllers/Base/Gerenciar.php?Controller=UsuarioController&Funcao=ListarUsuarios",{
            Dados: JSON.stringify(Usuario)
        },function(data){
            debugger;
            Info = JSON.parse(data);
            if(!Info.Erro){
                $("#table-usuario > tbody").html("");
                for(var i=0; i < Info.Itens.length; i++){
                    $("#table-usuario > tbody").append("<tr>" +
                                                            "<td>" + Info.Itens[i].Nome     + "</td>" + 
                                                            "<td>" + Info.Itens[i].Email    + "</td>" + 
                                                            "<td>" + Info.Itens[i].Telefone + "</td>" +
                                                            "<td>" + (Info.Itens[i].Situacao != 0 ? "Ativo" : "Inativo") + "</td>" +
                                                            "<td>" +
                                                            "   <button type='button' class='btn btn-primary' onclick='SelecionarModalAlterar("+ Info.Itens[i].Codigo +")'><i class='fa fa-pencil-square-o'></i></button>" +
                                                            "   <button type='button' class='btn btn-danger'  onclick='SelecionarModalExcluir("+ Info.Itens[i].Codigo +",\""+ Info.Itens[i].Nome +"\")'><i class='fa fa-times'></i></button>" + 
                                                            "</td>" +  
                                                       "</tr>");
                }                
            }
        }
    );
};

function GetUsuario(){
    if(Usuario.Codigo != null && Usuario.Codigo != ""){
        $.post(
            "../Controllers/Base/Gerenciar.php?Controller=UsuarioController&Funcao=GetUsuario",{
                Codigo : Usuario.Codigo
            }, function(data){
                Info = JSON.parse(data);
                if(!Info.Erro){
                   $("#Nome").val(Info.Item.Nome);
                   Usuario.Nome = Info.Item.Nome;
                   $("#Email").val(Info.Item.Email);
                   Usuario.Email = Info.Item.Email;
                   $("#Senha").val(Info.Item.Senha);
                   Usuario.Senha = Info.Item.Senha;
                   $("#ConfirmarSenha").val(Info.Item.Senha);
                   Usuario.Confirm = Info.Item.Senha;
                   $("#Sexo").val(Info.Item.Sexo);
                   Usuario.Sexo = Info.Item.Sexo;
                   $("#Telefone").val(Info.Item.Telefone);
                   Usuario.Telefone = Info.Item.Telefone;
                   $("#Estado").val(Info.Item.Estado);
                   $("#Cidade").val(Info.Item.Cidade);
                   Usuario.Cidade = Info.Item.Cidade;
                   $("#Situacao").val(Info.Item.Situacao);
                   Usuario.Situacao = Info.Item.Situacao;
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
    Usuario.Codigo = codigo;
    GetUsuario();    
    $("#modal-alterar-usuario").modal();
}

function SelecionarModalExcluir(codigo, usuario){
    Usuario.Codigo = codigo;
    $("#returnExcluir").html(usuario);
    $("#modal-excluir-usuario").modal();
}

function AlterarUsuario(){
    if(ValidarUsuario()){
        $.post(
            "../Controllers/Base/Gerenciar.php?Controller=UsuarioController&Funcao=AlterarUsuario",{
                Dados : JSON.stringify(Usuario)
            }, function(data){
                Info = JSON.parse(data);
                if(!Info.Erro){
                    ListarUsuario();                    
                    $("#modal-alterar-usuario").modal("hide");
                }
                else{
                    $("#labelErrorResponse").html(Info.Mensagem);
                    $("#ErrorResponse").fadeIn();
                }
            }
        );
    }else{
        $("#labelErrorResponse").html(Usuario.MensagemError);
        $("#ErrorResponse").fadeIn();
    }
}

function ExcluirUsuario(){
    if(Usuario.Codigo != ""){
        $.post(
            "../Controllers/Base/Gerenciar.php?Controller=UsuarioController&Funcao=ExcluirUsuario",{
                Codigo : Usuario.Codigo
            }, function(data){
                Info = JSON.parse(data);
                if(!Info.Erro){
                    ListarUsuario();                    
                    $("#modal-excluir-usuario").modal("hide");
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

