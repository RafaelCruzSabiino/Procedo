<?php

    /*<sumary>
        Classe preparada para padronizar e facilitar algumas funcionalidades (Dever ser herdada pela classes criadas)
    </sumary>*/

    class BaseEntity
    {
        #region "Construtor"

        public function __construct()
        {        
        }

        #endregion
        
        #region "Método para mapear as informações de um item da base para o modelo"

        function MapToModel($Classe, $Array)
        {            
            foreach ($Classe->Dicionario() as $key02 => $value) 
            {
                if(isset($Array[$value["IndiceBase"]]))
                {
                    if(!($value["IndiceBase"] == "INICIAL"))
                    {
                        $Executar = '$'. 'Classe->set' . $value['IndiceClass'] . '("'. $Array[$value['IndiceBase']] . '");';
                        eval($Executar);
                    }
                    else
                    {
                        $Classe->setInicial($Array[$value['IndiceBase']]);
                    }
                }
                else
                {
                    continue;
                }
            }   
            return $Classe;
        }
        
        #endregion

        #region "Método para mapear as informações de vários itens da base para o modelo"

        function MapToModels($Classe, $Array)
        {
            foreach ($Classe->Dicionario() as $key => $value) 
            {
                $Executar = '$'. 'Classe->set' . $value['IndiceClass'] . '("'. $Array[$value['IndiceBase']] . '");';
                eval($Executar);
            } 
            
            return $Classe;
        }

        #endregion

        #region "Método para mapear as informações de um array para o modelo indicado"

        function MapToClass($Class, $Array, $Tipo = "")
        {
            $Classe = get_class($Class);
            $Classe = new $Class();

            foreach ($Array as $Item => $ItemIndice)
            {
                foreach ($Classe->Dicionario() as $Indice) 
                {
                    if($Indice["IndiceClass"] == $Item)
                    {
                        if($Tipo == "")
                        {
                            $Executar = ("$". "Classe->set" . $Indice["IndiceClass"] . "('". addslashes($Array[$Item]) . "');" );
                        }
                        else 
                        {
                            $Executar = ("$". "Classe->set" . $Indice["IndiceClass"] . "('". addslashes($Array->$Item) . "');" );
                        }
                        eval($Executar);
                        break;
                    }
                    else
                    {
                        continue;
                    }
                }             
            }

            return $Classe;
        }

        #endregion
    }

?>