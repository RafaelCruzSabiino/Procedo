CREATE DATABASE  IF NOT EXISTS `procedo` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `procedo`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: procedo
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping events for database 'procedo'
--

--
-- Dumping routines for database 'procedo'
--
/*!50003 DROP FUNCTION IF EXISTS `ISVALIDEMAIL` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ISVALIDEMAIL`(
	pEMAIL VARCHAR(255),
	pCODIGO INT
) RETURNS int
    DETERMINISTIC
BEGIN

	DECLARE V_VERIFICADOR INT;
    
    SELECT
		COUNT(*) INTO V_VERIFICADOR
	FROM
		PROCEDO_USUARIO
	WHERE
		EMAIL = pEMAIL
        AND (pCODIGO IS NULL OR CODIGO != pCODIGO);
    
	RETURN V_VERIFICADOR;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `ISVALIDSENHA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `ISVALIDSENHA`(
	pSENHA  VARCHAR(255),
    pCODIGO INT
) RETURNS int
    DETERMINISTIC
BEGIN

	DECLARE V_VERIFICADOR INT;
    
    SELECT
		COUNT(*) INTO V_VERIFICADOR
	FROM
		PROCEDO_USUARIO
	WHERE
		SENHA = pSENHA
        AND (pCODIGO IS NULL OR CODIGO != pCODIGO);
    
	RETURN V_VERIFICADOR;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_CIDADE_0001` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_CIDADE_0001`(
	pESTADO INT
)
BEGIN
	
    SELECT
		CODIGO,
        NOME
	FROM
		PROCEDO_CIDADE
	WHERE
		(pESTADO IS NULL OR (ESTADO = pESTADO));
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_CLIENTE_0001` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_CLIENTE_0001`(	
	pNOME 			  VARCHAR(255),
    pEMAIL      	  VARCHAR(255),
    pDOCUMENTO  	  VARCHAR(19),
    pTELEFONE   	  VARCHAR(15),
    pCIDADE           INT,
    pOBSERVACAO       VARCHAR(255)
)
BEGIN

	INSERT INTO
		PROCEDO_CLIENTE
		(
			NOME,
            EMAIL,
            DOCUMENTO,
            TELEFONE,
            CIDADE,
            SITUACAO,
            OBSERVACAO,
            DATA_ALTERACAO,
            DATA_INSERCAO
        )
	VALUES
		(
			pNOME,
            pEMAIL,
            pDOCUMENTO,
            pTELEFONE,
            pCIDADE,
            1,
            pOBSERVACAO,
            NOW(),
            NOW()
        );       
	
    SELECT LAST_INSERT_ID() AS RETURN_VALUE FROM DUAL;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_CLIENTE_0002` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_CLIENTE_0002`(
	pCODIGO           INT,
    pNOME             VARCHAR(255),
    pEMAIL            VARCHAR(255),
    pDOCUMENTO        VARCHAR(19),
    pTELEFONE         VARCHAR(15),
    pCIDADE           INT,
    pSITUACAO         INT,
    pOBSERVACAO       VARCHAR(255)
)
BEGIN

	UPDATE
		PROCEDO_CLIENTE
	SET
		NOME 		   = pNOME,
        EMAIL 	       = pEMAIL,
        DOCUMENTO      = pDOCUMENTO,
        TELEFONE       = pTELEFONE,
        CIDADE         = pCIDADE,
        SITUACAO       = pSITUACAO,
        OBSERVACAO     = pOBSERVACAO,
        DATA_ALTERACAO = NOW()
	WHERE
		CODIGO = pCODIGO;
        
	SELECT ROW_COUNT() AS RETURN_VALUE FROM DUAL;
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_CLIENTE_0003` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_CLIENTE_0003`(
	pCODIGO           INT
)
BEGIN

	DELETE FROM
		PROCEDO_CLIENTE_ORIGEM
	WHERE
		CODIGO_CLIENTE = pCODIGO;
        
	DELETE FROM
		PROCEDO_CLIENTE
	WHERE
		CODIGO = pCODIGO;
	
    SELECT ROW_COUNT() AS RETURN_VALUE FROM DUAL;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_CLIENTE_0004` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_CLIENTE_0004`(
	pCODIGO INT
)
BEGIN

	SELECT
		A.CODIGO,
		A.NOME,
        A.EMAIL,
        A.DOCUMENTO,
        A.TELEFONE,
        A.CIDADE,
        A.SITUACAO,
        A.OBSERVACAO,
        B.ESTADO
	FROM
		PROCEDO_CLIENTE A
        INNER JOIN PROCEDO_CIDADE B ON A.CIDADE = B.CODIGO
	WHERE
		A.CODIGO = pCODIGO;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_CLIENTE_0005` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_CLIENTE_0005`(
)
BEGIN

	SELECT
		CODIGO,
		NOME,
		EMAIL,
		TELEFONE,
		DOCUMENTO,
		SITUACAO
	FROM
		PROCEDO_CLIENTE;    
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_ESTADO_0001` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_ESTADO_0001`(
)
BEGIN

	SELECT
		CODIGO,
		SIGLA
	FROM
		PROCEDO_ESTADO;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_ORIGEM_0001` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_ORIGEM_0001`(
	pCODIGO_CLIENTE   INT,
    pCODIGO_ORIGEM    INT
)
BEGIN

	INSERT INTO
		PROCEDO_CLIENTE_ORIGEM
		(
			CODIGO_CLIENTE,
            CODIGO_ORIGEM
        )
	VALUES
		(
			pCODIGO_CLIENTE,
            pCODIGO_ORIGEM
		);
        
	SELECT ROW_COUNT() AS RETURN_VALUE FROM DUAL;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_ORIGEM_0002` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_ORIGEM_0002`(
	pCODIGO_CLIENTE INT
)
BEGIN

	DELETE FROM 
		PROCEDO_CLIENTE_ORIGEM 
	WHERE 
		CODIGO_CLIENTE = pCODIGO_CLIENTE;
        
	SELECT ROW_COUNT() AS RETURN_VALUE FROM DUAL;
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_ORIGEM_0003` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_ORIGEM_0003`(
	pCODIGO_CLIENTE INT
)
BEGIN

	SELECT
		CODIGO_ORIGEM as CODIGO
	FROM
		PROCEDO_CLIENTE_ORIGEM
	WHERE
		CODIGO_CLIENTE = pCODIGO_CLIENTE;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_ORIGEM_0004` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_ORIGEM_0004`()
BEGIN

	SELECT
		CODIGO,
        DESCRICAO
	FROM
		PROCEDO_ORIGEM;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_USUARIO_0001` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_USUARIO_0001`(
	pNOME 	          VARCHAR(255),
    pEMAIL 			  VARCHAR(255),
    pSENHA 			  VARCHAR(255),
    pCRIPTOGRAFIA     VARCHAR(255),
    pSEXO             CHAR(1),
    pTELEFONE         VARCHAR(15),
    pCIDADE           INT
)
BEGIN
	IF(ISVALIDEMAIL(pEMAIL, NULL) > 0) THEN
		SELECT -1 AS RETURN_VALUE FROM DUAL;
	ELSE
		IF(ISVALIDSENHA(pSENHA, NULL) > 0) THEN
			SELECT -2 AS RETURN_VALUE FROM DUAL;
		ELSE        
			INSERT INTO
				PROCEDO_USUARIO
				(
					NOME,
					EMAIL,
					SENHA,
					CRIPTOGRAFIA,
					SEXO,
					TELEFONE,
					CIDADE,
					SITUACAO,
					DATA_ALTERACAO,
					DATA_INSERCAO
				)
			VALUES
				(
					pNOME,
					pEMAIL,
					pSENHA,
					pCRIPTOGRAFIA,
					pSEXO,
					pTELEFONE,
					pCIDADE,
					1,
					NOW(),
					NOW()
				);
				
			SELECT LAST_INSERT_ID() AS RETURN_VALUE FROM DUAL;            
		END IF;        
	END IF;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_USUARIO_0002` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_USUARIO_0002`(
	pCODIGO 	      INT,
    pNOME   		  VARCHAR(255),
    pEMAIL 		      VARCHAR(255),
    pSENHA 			  VARCHAR(255),
    pCRIPTOGRAFIA     VARCHAR(255),
    pSEXO 			  CHAR(1),
    pTELEFONE         VARCHAR(15),
    pCIDADE           INT,
    pSITUACAO         INT
)
BEGIN

	IF(ISVALIDEMAIL(pEMAIL, pCODIGO) > 0) THEN
		SELECT -1 AS RETURN_VALUE FROM DUAL;
	ELSE
		IF(ISVALIDSENHA(pSENHA, pCODIGO) > 0) THEN
			SELECT -2 AS RETURN_VALUE FROM DUAL;
		ELSE
			UPDATE
				PROCEDO_USUARIO
			SET
				NOME 		   = pNOME,
                EMAIL 	       = pEMAIL,
                SENHA 		   = pSENHA,
                CRIPTOGRAFIA   = pCRIPTOGRAFIA,
                SEXO 		   = pSEXO,
                TELEFONE       = pTELEFONE,
                CIDADE 		   = pCIDADE,
                SITUACAO 	   = pSITUACAO,
                DATA_ALTERACAO = NOW()
			WHERE
				CODIGO = pCODIGO;
			
            SELECT ROW_COUNT() AS RETURN_VALUE FROM DUAL;
        END IF;
	END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_USUARIO_0003` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_USUARIO_0003`(	
	pCODIGO           INT
)
BEGIN

	DELETE FROM
		PROCEDO_USUARIO
	WHERE
		CODIGO = pCODIGO;
        
	SELECT ROW_COUNT() AS RETURN_VALUE FROM DUAL;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_USUARIO_0004` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_USUARIO_0004`(
	pCODIGO INT
)
BEGIN

	SELECT
		A.NOME,
        A.EMAIL,
        A.SENHA,
        A.SEXO,
        A.TELEFONE,
        A.CIDADE,
        A.SITUACAO,
        B.ESTADO
	FROM
		PROCEDO_USUARIO A
        INNER JOIN PROCEDO_CIDADE B ON A.CIDADE = B.CODIGO
	WHERE
		A.CODIGO = pCODIGO;
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_USUARIO_0005` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_USUARIO_0005`(
	pESTADO   INT,
    pCIDADE   INT,
    pNOME     VARCHAR(255),
    pSITUACAO INT
)
BEGIN

	SELECT
		A.CODIGO,
		A.NOME,
        A.SITUACAO,
        A.EMAIL,
        A.TELEFONE
	FROM
		PROCEDO_USUARIO A
        INNER JOIN PROCEDO_CIDADE B ON A.CIDADE = B.CODIGO
	WHERE
		(pNOME         IS NULL OR (A.NOME     LIKE CONCAT('%', TRIM(pNOME), '%')))
        AND (pESTADO   IS NULL OR (B.ESTADO   = pESTADO))
        AND (pCIDADE   IS NULL OR (A.CIDADE   = pCIDADE))
        AND (pSITUACAO IS NULL OR (A.SITUACAO = pSITUACAO));

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PROCEDO_USUARIO_0006` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROCEDO_USUARIO_0006`(
	pEMAIL        VARCHAR(255),
    pCRIPTOGRAFIA VARCHAR(255)
)
BEGIN

	SELECT
		CODIGO,
        NOME
	FROM
		PROCEDO_USUARIO
	WHERE
		EMAIL            = pEMAIL
        AND CRIPTOGRAFIA = pCRIPTOGRAFIA
        AND SITUACAO     = 1;
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-07 16:30:15
