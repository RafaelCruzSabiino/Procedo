$(document).ready(function(){
    ListarUsuario();
});

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
                                                            "   <button type='button' class='btn btn-primary' onclick='SelecionarModalAlterar("+ Info.Itens[i].Id +")'><i class='fa fa-pencil-square-o'></i></button>" +
                                                            "   <button type='button' class='btn btn-danger'  onclick='SelecionarModalExcluir("+ Info.Itens[i].Id +")'><i class='fa fa-times'></i></button>" + 
                                                            "</td>" +  
                                                       "</tr>");
                }                
            }
        }
    );
};

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

