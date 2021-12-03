<?php
    /*<sumary>
        Essa Pagina é responsável pela busca de estados e cidades.
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("../../BusinessObject/EstadoCidadeBo.php");
    require_once("../../Entities/Estado.php");
    require_once("../../Entities/Cidade.php");

    #endregion

    class EstadoCidadeController
    {
        public $Bo;
        public $CidadeEntity;
        public $EstadoEntity;

        #region "Construtor"

        function __construct()
        {
            $this->Bo           = new EstadoCidadeBo();
            $this->CidadeEntity = new Cidade();
            $this->EstadoEntity = new Estado();
        } 

        #endregion

        #region "Metodo Para pegar os Estados"

        function GetEstado()
        {
            echo json_encode($this->Bo->GetEstado($this->EstadoEntity));
        }

        #endregion

        #region "Metodo Para pegar as Cidades"

        function GetCidade()
        {
            $modelo = $this->CidadeEntity->MapToClass($this->CidadeEntity, $_POST);

            echo json_encode($this->Bo->GetCidade($modelo));
        }

        #endregion
    }
?>