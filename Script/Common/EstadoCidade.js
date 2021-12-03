function GetEstados(){
    $.post(
            "../Controllers/Base/Gerenciar.php?Controller=EstadoCidadeController&Funcao=GetEstado",{
            }, function(data){
                Info = JSON.parse(data);
                if(!Info.Erro){
                    $("#Estado").html("");
                    $("#Estado").append("<option value=''>Selecione</option>");
                    for(var i=0; i < Info.Itens.length; i++){
                        $("#Estado").append("<option value='" + Info.Itens[i].Codigo + "'>" + Info.Itens[i].Sigla + "</option>");
                    }

                    GetCidade();
                }
                else{
                    alert("Erro: " + Info.Mensagem);
                }
            }
        );
}

function GetCidade(estado){
    if(estado == null){
        estado = 0;
    }

    $.post(
        "../Controllers/Base/Gerenciar.php?Controller=EstadoCidadeController&Funcao=GetCidade",{
            Estado: estado
        }, function(data){
            Info = JSON.parse(data);
            if(!Info.Erro){
                $("#Cidade").html("");
                $("#Cidade").append("<option value=''>Selecione</option>");
                for(var i=0; i < Info.Itens.length; i++){
                    $("#Cidade").append("<option value='" + Info.Itens[i].Codigo + "'>" + Info.Itens[i].Nome + "</option>");
                }
            }
            else{
                alert("Erro: " + Info.Mensagem);
            }
        }
    );
}

$("#Estado").on("change", function(){
    GetCidade($(this).val() != "#" ? $(this).val() : null);
    $("#Cidade").focus();
});