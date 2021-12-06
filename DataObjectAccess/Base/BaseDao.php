<?php

    /*<sumary>
        Classe preparada para gerenciar as informações que transitam entre a base e o sistema
    </sumary>*/
    
    #region "Inclusao de todas as paginas necessarias"

    require_once("Conexao.php");   

    #endregion

    class BaseDao extends Conexao
    {
        #region "Propriedades"

        protected $Qry;

        #endregion

        #region "Construtor"

        protected function __construct()
        {
            $this->Qry = null;
            parent::__construct();
        }

        #endregion

        #region "Mátodo para reiniciar a propriedade Qry da classe"

        protected function QryClose()
        {
            $this->Qry = null;
        }

        #endregion

        #region "Método para atribuição dos valores de processo da base"

        protected function BaseToModel($Modelo)
        {
            $Info = $this->Qry->fetchAll(PDO::FETCH_ASSOC);
            $Item = "";
            if(!empty($Info))
            {    
                $Item = $Modelo->MapToModel($Modelo, $Info[0]);
            }

            return $Item;      
        }

        #endregion

        #region "Método para atribuição dos valores de processo da base em lista"

        protected function BaseToModels($Modelo)
        {            
            $Info = $this->Qry->fetchAll(PDO::FETCH_ASSOC);
            $Items = [];

            for($i = 0; $i < Count($Info); $i++)
            {
                $Classe = get_class($Modelo);
                $Modelo = new $Classe();
                $Item   = $Modelo->MapToModel($Modelo, $Info[$i]);
                array_push($Items, $Item);
            }

            return $Items;
        }

        #endregion

        #region "Método para trazer o return_value do banco"

        protected function ReturnValue()
        {
            return $this->Qry->fetchAll(PDO::FETCH_ASSOC)[0]["RETURN_VALUE"];
        }

        #endregion
    }    

?>