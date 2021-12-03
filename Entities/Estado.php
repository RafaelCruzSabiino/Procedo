<?php
    /*<sumary>
        Modelo referente a tabela de Estados.
    </sumary>*/

    require_once("Base/BaseEntity.php");

    class Estado extends BaseEntity
    {
        #region "Propriedades"

        public $Codigo;
        public $Nome;
        public $Sigla;

        #endregion

        #region "Construtor"

        public function __construct($Codigo=0,$Nome="",$Sigla="")
        {
            $this->Codigo     = $Codigo;
            $this->Nome       = $Nome;
            $this->Sigla      = $Sigla;
            parent::__construct();
        }

        #endregion

        #region "Metodos Get"

        public function getCodigo()     {   return $this->Codigo;     }
        public function getNome()       {   return $this->Nome;       }
        public function getSigla()      {   return $this->Sigla;      }
        
        #endregion

        #region "Metodos Set"

        public function setCodigo($Codigo)         {   $this->Codigo     = $Codigo;     }
        public function setNome($Nome)             {   $this->Nome       = $Nome;       }
        public function setSigla($Sigla)           {   $this->Sigla      = $Sigla;      }

        #endregion

        #region "Dicionário da classe"

        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "CODIGO"    , "IndiceClass" => "Codigo"     ]
                , ["IndiceBase" => "NOME"      , "IndiceClass" => "Nome"       ]
                , ["IndiceBase" => "SIGLA"     , "IndiceClass" => "Sigla"      ]
            );
        }

        #endregion
    }

?>