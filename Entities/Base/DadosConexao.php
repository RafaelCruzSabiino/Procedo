<?php

     /*<sumary>
        Classe preparada para os dados de acesso à base
    </sumary>*/

    class DadosConexao
    {
        #region "Propriedades"

        public $User;
        public $Pass;
        public $Host;
        public $Base;

        #endregion

        #region "Construtor"

        public function __construct()
        {
            $this->User = "root"; 
            $this->Pass = "rfc@1001";
            $this->Host = "localhost";
            $this->Base = "PROCEDO";
        }

        #endregion

        #region "Métodos GET"

        public function getUser()    { return $this->User; }
        public function getPass()    { return $this->Pass; }
        public function getHost()    { return $this->Host; }
        public function getBase()    { return $this->Base; }

        #endregion
    }

?>