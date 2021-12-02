<?php
    /*<sumary>
        Essa Pagina é responsável pela controle do objeto Usuario
    </sumary>*/

    #region "Inclusao de todas as paginas necessarias"

    require_once("Base/BaseDao.php");

    #endregion

    class UsuarioDao extends BaseDao
    {
        #region "Metodo Construtor"

        public function __construct()
        {
            parent::__construct();
        }

        #endregion

        #region "Metodo Para Validar o Login"

        public function ValidarLogin($modelo)
        {
            $sql = "CALL PROCEDO_USUARIO_0006(?,?)";

            try
            {
                $this->AbrirConexao();
                $this->Qry = $this->Base->prepare($sql);
                $this->Qry->bindValue(1, $modelo->getEmail());
                $this->Qry->bindValue(2, $modelo->getCriptografia());
                $this->Qry->execute();

                $ret = $this->BaseToModel($modelo);
                $this->QryClose();
                $this->FecharConexao();
            }
            catch(PDOException $e)
            {
                throw new PDOException($e);
            }

            return $ret;
        }

        #endregion
    }
?>