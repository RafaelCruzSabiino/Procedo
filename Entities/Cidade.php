<?php
    /*<sumary>
        Modelo referente a tabela de Cidade.
    </sumary>*/

    require_once("Base/BaseEntity.php");

    class Cidade extends BaseEntity
    {
        #region "Propriedades"

        public $Codigo;
        public $Nome;
        public $Estado;

        #endregion

        #region "Construtor"

        public function __construct($Codigo=0,$Nome="",$Estado=0)
        {
            $this->Codigo     = $Codigo;
            $this->Nome       = $Nome;
            $this->Estado     = $Estado;
            parent::__construct();
        }

        #endregion

        #region "Metodos Get"

        public function getCodigo()     {   return $this->Codigo;     }
        public function getNome()       {   return $this->Nome;       }
        public function getEstado()     {   return $this->Estado;     }
        
        #endregion

        #region "Metodos Set"

        public function setCodigo($Codigo)         {   $this->Codigo     = $Codigo;     }
        public function setNome($Nome)             {   $this->Nome       = $Nome;       }
        public function setEstado($Estado)         {   $this->Estado     = $Estado;     }

        #endregion

        #region "Dicionário da classe"

        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "CODIGO"    , "IndiceClass" => "Codigo"     ]
                , ["IndiceBase" => "NOME"      , "IndiceClass" => "Nome"       ]
                , ["IndiceBase" => "ESTADO"    , "IndiceClass" => "Estado"     ]
            );
        }

        #endregion
    }

?>