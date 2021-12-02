<?php
    /*<sumary>
        Essa Pagina é responsável pela autentificação do login
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseController.php");
    require_once("../Entities/Usuario.php");
    require_once("../DAO/TB_PRJ_0001_DAO.php");

    #endregion

    class AutentificarController extends BaseController
    {
        private $Dao;

        #region "Metodo Construtor"

        function __construct()
        {
            parent::__construct();    
        }

        #endregion
    }
?>