<?php

    /*<sumary>
        Classe preparada para gerenciar os acessos e transações que precisam acessar a base
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("../../Entities/Base/DadosConexao.php");

    #endregion

    abstract class Conexao
    {
        #region "Propriedades"

        protected $Base;

        #endregion
            
        #region "Construtor"

        protected function __construct()
        {
            $this->Base = null;
        }

        #endregion

        #region "Método para abrir a conexaõ com a base"

        protected function AbrirConexao()
        {
            $DadosConexao = new DadosConexao();

            $dsn = sprintf(
                            "mysql:host=%s;dbname=%s;charset=utf8mb4", 
                            $DadosConexao->getHost()
                            , $DadosConexao->getBase()
                            , array(
                                        PDO::ATTR_PERSISTENT => true
                                        , PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                                    )
                    );
            
            try
            {
                $this->Base = new PDO($dsn, $DadosConexao->getUser(), $DadosConexao->getPass());
            }
            catch (Exception $e)
            {
                die ($e->getMessage());
            }
        }

        #endregion

        #region "Método para fechar a conexao com a base"

        protected function FecharConexao()
        {
            $this->Base = null;
        }

        #endregion
    }
?>