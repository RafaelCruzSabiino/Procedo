<?php
    /*<sumary>
        Essa Pagina é responsável pelo o usuario.
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseController.php");
    require_once("../../Entities/Cliente.php");
    require_once("../../Entities/Origem.php");
    require_once("../../BusinessObject/ClienteBo.php");
    require_once("../../BusinessObject/OrigemBo.php");

    #endregion

    class ClienteController extends BaseController
    {
        public $Entity;
        public $Bo;
        public $OrigemEntity;
        public $OrigemBo;

        #region "Metodo Construtor"

        function __construct()
        {
            parent::__construct(); 
            $this->Bo           = new ClienteBo();
            $this->Entity       = new Cliente();
            $this->OrigemEntity = new Origem();
            $this->OrigemBo     = new OrigemBo();
        }

        #endregion

        #region "Metodo para inserir o Cliente"

        public function InserirCliente()
        {
            $dados      = json_decode($_POST["Dados"]);            
            $modelo     = $this->Entity->MapToClass($this->Entity, $dados, 1);                       
            $retCliente = $this->Bo->InserirCliente($modelo);

            if(!$retCliente->getErro())
            {
                $this->OrigemEntity->setCliente($retCliente->getReturnInfo());

                for($i=0; $i < Count($dados->Origem); $i++)
                {
                    $this->OrigemEntity->setCodigo($dados->Origem[$i]);                   
                    $retOrigem = $this->OrigemBo->InserirRelacaoOrigem($this->OrigemEntity);

                    if($retOrigem->getErro()){
                        $this->Bo->ExcluirCliente($retCliente->getReturnInfo());
                        $retCliente->setErro(true);
                        $retCliente->setMensagem("Erro ao Gravar a Origem!");
                        break;
                    }
                }
            }

            echo json_encode($retCliente);
        }

        #endregion
    }

?>