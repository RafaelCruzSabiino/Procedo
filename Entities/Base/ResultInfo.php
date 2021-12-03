<?php
    /*<sumary>
        Modelo result info
    </sumary>*/

    class ResultInfo
    {
        #region "Propriedades"

        public $RowCount;
        public $Item;
        public $Itens;
        public $Mensagem;
        public $Erro;
        public $ReturnInfo;

        #endregion

        #region "Construtor"

        public function __construct($RowCount=0, $Item="", $Itens="", $Mensagem="Sucesso!", $Erro=false, $ReturnInfo="")
        {
            $this->RowCount   = $RowCount;
            $this->Item       = $Item;
            $this->Itens      = $Itens;
            $this->Mensagem   = $Mensagem;
            $this->Erro       = $Erro;
            $this->ReturnInfo = $ReturnInfo;
        }

        #endregion

        #region "Metodos Get"

        public function getRowCount()   {   return $this->RowCount;   }
        public function getItem()       {   return $this->Item;       }
        public function getItens()      {   return $this->Itens;      }
        public function getMensagem()   {   return $this->Mensagem;   }
        public function getErro()       {   return $this->Erro;       }
        public function getReturnInfo() {   return $this->ReturnInfo; }
        
        #endregion

        #region "Metodos Set"

        public function setRowCount($RowCount)     {   $this->RowCount   = $RowCount;   }
        public function setItem($Item)             {   $this->Item       = $Item;       }
        public function setItens($Itens)           {   $this->Itens      = $Itens;      }
        public function setMensagem($Mensagem)     {   $this->Mensagem   = $Mensagem;   }
        public function setErro($Erro)             {   $this->Erro       = $Erro;       }
        public function setReturnInfo($ReturnInfo) {   $this->ReturnInfo = $ReturnInfo; }

        #endregion
    }

?>