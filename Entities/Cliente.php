<?php
    /*<sumary>
        Modelo referente a tabela de Clientes.
    </sumary>*/

    require_once("Base/BaseEntity.php");

    class Cliente extends BaseEntity
    {
        #region "Propriedades"

        public $Codigo;
        public $Nome;
        public $Email;
        public $Documento;
        public $Telefone;
        public $Cidade;
        public $Estado;
        public $Situacao;
        public $Observacao;
        public $TotalRegistro;

        #endregion

        #region "Construtor"

        public function __construct($Codigo=0,$Nome="",$Email="",$Documento="",$Telefone="",$Cidade=0,$Estado=0,$Situacao="",$Observacao="",$TotalRegistro=0)
        {
            $this->Codigo        = $Codigo;
            $this->Nome          = $Nome;
            $this->Email         = $Email;
            $this->Documento     = $Documento;
            $this->Telefone      = $Telefone;
            $this->Cidade        = $Cidade;
            $this->Estado        = $Estado;
            $this->Situacao      = $Situacao;
            $this->Observacao    = $Observacao;
            $this->TotalRegistro = $TotalRegistro;
            parent::__construct();
        }

        #endregion

        #region "Metodos Get"

        public function getCodigo()        {   return $this->Codigo;        }
        public function getNome()          {   return $this->Nome;          }
        public function getEmail()         {   return $this->Email;         }
        public function getDocumento()     {   return $this->Documento;     }
        public function getTelefone()      {   return $this->Telefone;      }
        public function getCidade()        {   return $this->Cidade;        }
        public function getEstado()        {   return $this->Estado;        }
        public function getSituacao()      {   return $this->Situacao;      }
        public function getObservacao()    {   return $this->Observacao;    }
        public function getTotalRegistro() {   return $this->TotalRegistro; }
        
        #endregion

        #region "Metodos Set"

        public function setCodigo($Codigo)               {   $this->Codigo        = $Codigo;        }
        public function setNome($Nome)                   {   $this->Nome          = $Nome;          }
        public function setEmail($Email)                 {   $this->Email         = $Email;         }
        public function setDocumento($Documento)         {   $this->Documento     = $Documento;     }
        public function setTelefone($Telefone)           {   $this->Telefone      = $Telefone;      }
        public function setCidade($Cidade)               {   $this->Cidade        = $Cidade;        }
        public function setEstado($Estado)               {   $this->Estado        = $Estado;        }
        public function setSituacao($Situacao)           {   $this->Situacao      = $Situacao;      }
        public function setObservacao($Observacao)       {   $this->Observacao    = $Observacao;    }
        public function setTotalRegistro($TotalRegistro) {   $this->TotalRegistro = $TotalRegistro; }

        #endregion

        #region "Dicionário da classe"

        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "CODIGO"    ,     "IndiceClass" => "Codigo"        ]
                , ["IndiceBase" => "NOME"      ,     "IndiceClass" => "Nome"          ]
                , ["IndiceBase" => "EMAIL"     ,     "IndiceClass" => "Email"         ]
                , ["IndiceBase" => "DOCUMENTO" ,     "IndiceClass" => "Documento"     ]
                , ["IndiceBase" => "TELEFONE"  ,     "IndiceClass" => "Telefone"      ]
                , ["IndiceBase" => "CIDADE"    ,     "IndiceClass" => "Cidade"        ]
                , ["IndiceBase" => "ESTADO"    ,     "IndiceClass" => "Estado"        ]
                , ["IndiceBase" => "SITUACAO"  ,     "IndiceClass" => "Situacao"      ]
                , ["IndiceBase" => "OBSERVACAO",     "IndiceClass" => "Observacao"    ]
                , ["IndiceBase" => "TOTAL_REGISTRO", "IndiceClass" => "TotalRegistro" ]
            );
        }

        #endregion
    }

?>