<?php
    /*<sumary>
        Modelo referente a tabela de Usuarios.
    </sumary>*/

    require_once("Base/BaseEntity.php");

    class Usuario extends BaseEntity
    {
        #region "Propriedades"

        public int    $Codigo;
        public string $Nome;
        public string $Email;
        public string $Senha;
        public string $Criptografia;
        public string $Sexo;
        public string $Telefone;
        public int    $Cidade;
        public int    $Estado;
        public int    $Situacao;

        #endregion

        #region "Construtor"

        public function __construct()
        {
            $this->Codigo       = $Codigo;
            $this->Nome         = $Nome;
            $this->Email        = $Email;
            $this->Senha        = $Senha;
            $this->Criptografia = $Criptografia;
            $this->Sexo         = $Sexo;
            $this->Telefone     = $Telefone;
            $this->Cidade       = $Cidade;
            $this->Estado       = $Estado;
            $this->Situacao     = $Situacao;
            parent::__construct();
        }

        #endregion

        #region "Metodos Get"

        public function getCodigo()       {   return $this->Codigo;       }
        public function getNome()         {   return $this->Nome;         }
        public function getEmail()        {   return $this->Email;        }
        public function getSenha()        {   return $this->Senha;        }
        public function getCriptografia() {   return $this->Criptografia; }
        public function getSexo()         {   return $this->Sexo;         }
        public function getTelefone()     {   return $this->Telefone;     }
        public function getCidade()       {   return $this->Cidade;       }
        public function getEstado()       {   return $this->Estado;       }
        public function getSituacao()     {   return $this->Situacao;     }
        
        #endregion

        #region "Metodos Set"

        public function setCodigo($Codigo)             {   $this->Codigo           = $Codigo;       }
        public function setNome($Nome)                 {   $this->Nome             = $Nome;         }
        public function setEmail($Email)               {   $this->Email            = $Email;        }
        public function setSenha($Senha)               {   $this->Senha            = $Senha;        }
        public function setCriptografia($Criptografia) {   $this->Criptografia     = $Criptografia; }
        public function setSexo($Sexo)                 {   $this->Sexo             = $Sexo;         }
        public function setTelefone($Telefone)         {   $this->Telefone         = $Telefone;     }
        public function setCidade($Cidade)             {   $this->Cidade           = $Cidade;       }
        public function setEstado($Estado)             {   $this->Estado           = $Estado;       }
        public function setSituacao($Situacao)         {   $this->Situacao         = $Situacao;     }

        #endregion

        #region "Dicionário da classe"

        public function Dicionario()
        {
            return
                array
            (
                  ["IndiceBase" => "CODIGO"      , "IndiceClass" => "Codigo"       ]
                , ["IndiceBase" => "NOME"        , "IndiceClass" => "Nome"         ]
                , ["IndiceBase" => "EMAIL"       , "IndiceClass" => "Email"        ]
                , ["IndiceBase" => "SENHA"       , "IndiceClass" => "Senha"        ]
                , ["IndiceBase" => "CRIPTOGRAFIA", "IndiceClass" => "Criptografia" ]
                , ["IndiceBase" => "SEXO"        , "IndiceClass" => "Sexo"         ]
                , ["IndiceBase" => "TELEFONE"    , "IndiceClass" => "Telefone"     ]
                , ["IndiceBase" => "CIDADE"      , "IndiceClass" => "Cidade"       ]
                , ["IndiceBase" => "ESTADO"      , "IndiceClass" => "Estado"       ]
                , ["IndiceBase" => "SITUACAO"    , "IndiceClass" => "Situacao"     ]
            );
        }

        #endregion
    }

?>