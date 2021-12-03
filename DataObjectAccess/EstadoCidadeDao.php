<?php
    /*<sumary>
        Essa Pagina é responsável pela conexao com o banco para o Estado e Cidades
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseDao.php");

    #endregion

    class EstadoCidadeDao extends BaseDao
    {
        #region "Metodo Construtor"

        public function __construct()
        {
            parent::__construct();
        }

        #endregion

        #regino "Metodo para buscar os estados"

        public function GetEstado($modelo)
        {
            $sql = "CALL PROCEDO_ESTADO_0001()";

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

        #regino "Metodo para buscar as Cidade"

        public function GetCidade($modelo)
        {
            $sql = "CALL PROCEDO_CIDADE_0001(?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, ($modelo->getEstado() == 0 ? null : $modelo->getEstado()));
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