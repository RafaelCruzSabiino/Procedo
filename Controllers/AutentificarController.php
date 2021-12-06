<?php
    /*<sumary>
        Essa Pagina é responsável pela autentificação do login
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseController.php");
    require_once("../../Entities/Usuario.php");
    require_once("../../BusinessObject/UsuarioBo.php");

    #endregion

    class AutentificarController extends BaseController
    {
        public $Entity;
        public $Bo;

        #region "Metodo Construtor"

        function __construct()
        {
            parent::__construct(); 
            $this->Bo     = new UsuarioBo();
            $this->Entity = new Usuario();
        }

        #endregion

        #region "Metodo Para Validar o Login"

        public function ValidarLogin()
        {            
            $_POST["Email"]        = $this->AntiSqlInjector($_POST["Email"]);   
            $_POST["Criptografia"] = md5($this->AntiSqlInjector($_POST["Senha"])); 

            $modelo = $this->Entity->MapToClass($this->Entity, $_POST);            
            $ret    = $this->Bo->ValidarLogin($modelo);

            if(!$ret->getErro())
            {
                $_SESSION["UserCodigo"]    = $ret->getItem()->getCodigo();
                $_SESSION["UserName"]      = $ret->getItem()->getNome();
                $this->Redirecionar("Cliente");
            }
            else
            {
                $_SESSION["ErrorResponse"] = $ret->getMensagem();
                $this->Redirecionar("Login");
            }
        }

        #endregion
    }
?>