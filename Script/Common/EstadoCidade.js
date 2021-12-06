function GetEstados(idEstado, idCidade){
    idEstado = idEstado != null ? idEstado : "Estado";
    idCidade = idCidade != null ? idCidade : "Cidade";
    $.post(
            "../Controllers/Base/Gerenciar.php?Controller=EstadoCidadeController&Funcao=GetEstado",{
            }, function(data){
                Info = JSON.parse(data);
                if(!Info.Erro){
                    $("#" + idEstado).html("");
                    $("#" + idEstado).append("<option value=''>Selecione</option>");
                    for(var i=0; i < Info.Itens.length; i++){
                        $("#" + idEstado).append("<option value='" + Info.Itens[i].Codigo + "'>" + Info.Itens[i].Sigla + "</option>");
                    }

                    GetCidade(null, idCidade);
                }
                else{
                    alert("Erro: " + Info.Mensagem);
                }
            }
        );
}

function GetCidade(estado, idCidade){
    if(estado == null){
        estado = 0;
    }

    $.post(
        "../Controllers/Base/Gerenciar.php?Controller=EstadoCidadeController&Funcao=GetCidade",{
            Estado: estado
        }, function(data){
            Info = JSON.parse(data);
            if(!Info.Erro){
                $("#" + idCidade).html("");
                $("#" + idCidade).append("<option value=''>Selecione</option>");
                for(var i=0; i < Info.Itens.length; i++){
                    $("#" + idCidade).append("<option value='" + Info.Itens[i].Codigo + "'>" + Info.Itens[i].Nome + "</option>");
                }
            }
            else{
                alert("Erro: " + Info.Mensagem);
            }
        }
    );
}

function FiltrarCidade(idEstado, idCidade){
    idEstado = idEstado != null ? idEstado : "Estado";
    idCidade = idCidade != null ? idCidade : "Cidade";
    GetCidade(($("#" + idEstado).val() != "#" ? $("#" + idEstado).val() : null), idCidade);
    $("#" + idCidade).focus();
}