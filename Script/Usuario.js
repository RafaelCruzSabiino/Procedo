$(document).ready(function(){
    ListarUsuario();
});

function ListarUsuario(){    
    $.post(
        "../../Controllers/Base/Gerenciar.php?Controller=UsuarioController&Funcao=ListarUsuarios",{
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
                                                            "   <button type='button' class='btn btn-primary' onclick='SelecionarModalAlterar("+ Info.Itens[i].Id +")'><i class='fa fa-pencil-square-o'></i></button>" +
                                                            "   <button type='button' class='btn btn-danger'  onclick='SelecionarModalExcluir("+ Info.Itens[i].Id +")'><i class='fa fa-times'></i></button>" + 
                                                            "</td>" +  
                                                       "</tr>");
                }                
            }
        }
    );

    $('#table-usuario').DataTable({
        language: LanguageDefault()
    });    
};

function LimparFiltros(){
    Usuario.Estado   = "";
    Usuario.Cidade   = "";
    Usuario.Nome     = "";
    Usuario.Situacao = "";
}