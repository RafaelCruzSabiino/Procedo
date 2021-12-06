<?php
    /*<sumary>
        Essa Pagina é responsável pela busca de origens.
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("../../BusinessObject/OrigemBo.php");
    require_once("../../Entities/Origem.php");

    #endregion

    class OrigemController
    {
        public $Bo;
        public $Entity;

        #region "Construtor"

        function __construct()
        {
            $this->Bo     = new OrigemBo();
            $this->Entity = new Origem();
        } 

        #endregion

        #region "Metodos para buscar as origens"

        public function SelecionarOrigem()
        {                       
            echo json_encode($this->Bo->SelecionarOrigem($this->Entity));
        }

        #endregion
    }

?>