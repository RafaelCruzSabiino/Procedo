<?php
    /*<sumary>
        Essa pagina gerencia o redirecionamento de pagina do sistema e inicia a session.
    </sumary>*/

    class BaseController
    {
        #region "Metodo construtor"

        protected function __construct()
        {
            if (session_status() !== PHP_SESSION_ACTIVE) 
            {
                session_start();
            }
        }

        #endregion

        #region "Metodo para redirecionamento de pagina"

        public function Redirecionar($Page="")
        {
            $Page = $Page != "" ? $Page : $_GET['Page'];
            eval("Header('Location: ../../Views/" . $Page . ".php');");
            exit;
        }

        #endregion

        #region "Método que previne tentativas de invasão ao sistema por meio do login"

        protected function AntiSqlInjector($String){

            $String = str_ireplace(" or ", "",          $String);
            $String = str_ireplace("select ", "",       $String);
            $String = str_ireplace("delete ", "",       $String);
            $String = str_ireplace("create ", "",       $String);
            $String = str_ireplace("drop ", "",         $String);
            $String = str_ireplace("update ", "",       $String);
            $String = str_ireplace("drop table", "",    $String);
            $String = str_ireplace("show table", "",    $String);
            $String = str_ireplace("'", "",             $String);
            $String = str_replace("#", "",              $String);
            $String = str_replace("=", "",              $String);
            $String = str_replace("--", "",             $String);
            $String = str_replace("-", "",              $String);
            $String = str_replace(";", "",              $String);
            $String = str_replace("*", "",              $String);
            $String = strip_tags($String);
            return $String;

        }
        
        #endregion
    }
?>