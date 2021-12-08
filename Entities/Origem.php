<?php
    /*<sumary>
        Modelo referente a tabela de Origens.
    </sumary>*/

    require_once("Base/BaseEntity.php");

    class Origem extends BaseEntity
    {
        #region "Propriedades"

        public $Codigo;
        public $Descricao;
        public $Cliente;

        #endregion

        #region "Construtor"

        public function __construct($Codigo="",$Descricao="",$Cliente="")
        {
            $this->Codigo     = $Codigo;
            $this->Descricao  = $Descricao;
            $this->Cliente    = $Cliente;
            parent::__construct();
        }

        #endregion

        #region "Metodos Get"

        public function getCodigo()     {   return $this->Codigo;     }
        public function getDescricao()  {   return $this->Descricao;  }
        public function getCliente()    {   return $this->Cliente;    }  
        
        #endregion

        #region "Metodos Set"

        public function setCodigo($Codigo)         {   $this->Codigo     = $Codigo;     }
        public function setDescricao($Descricao)   {   $this->Descricao  = $Descricao;  }
        public function setCliente($Cliente)       {   $this->Cliente    = $Cliente;    }

        #endregion

        #region "Dicionário da classe"

        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "CODIGO"    , "IndiceClass" => "Codigo"     ]
                , ["IndiceBase" => "DESCRICAO" , "IndiceClass" => "Descricao"  ]
                , ["IndiceBase" => "CLIENTE"   , "IndiceClass" => "Cliente"    ]
            );
        }

        #endregion
    }

?>