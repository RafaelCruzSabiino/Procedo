<?php
    /*<sumary>
        Essa Pagina é responsável pela conexao com o banco para as ORIGENS
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseDao.php");

    #endregion

    class OrigemDao extends BaseDao
    {
        #region "Metodo Construtor"

        public function __construct()
        {
            parent::__construct();
        }

        #endregion

        #region "Metodo para Inserir relação de origem"

        public function InserirRelacaoOrigem($modelo)
        {
            $sql = "CALL PROCEDO_ORIGEM_0001(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $modelo->getCliente());
                $this->Qry->bindValue(2, $modelo->getCodigo());
                $this->Qry->execute();

                $ret = $this->ReturnValue();
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                throw new Exception($e);
            }

            return $ret;
        }

        #endregion

        #region "Metodo para Selecionar todas as origens Origens"

        public function SelecionarOrigem($modelo)
        {
            $sql = "CALL PROCEDO_ORIGEM_0004()";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->execute();

                $ret = $this->BaseToModels($modelo);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                throw new Exception($e);
            }

            return $ret;
        }

        #endregion
    }

?>