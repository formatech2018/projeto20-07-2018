CREATE DATABASE  IF NOT EXISTS `libraryitego` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `libraryitego`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: libraryitego
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `idaluno` int(11) NOT NULL AUTO_INCREMENT COMMENT '		\n\n',
  `nivel` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idaluno`),
  KEY `fk_aluno_usuario1_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_aluno_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (1,0,1),(2,0,2),(3,0,3),(4,0,5),(5,0,6),(6,0,7),(7,0,8),(8,0,9);
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `nome_area` text NOT NULL,
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'Literatura'),(2,'Informática'),(3,'Química'),(4,'Química'),(5,'Inglês'),(6,'Matemática');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autor` (
  `idautor` int(11) NOT NULL AUTO_INCREMENT,
  `nome_autor` text NOT NULL,
  PRIMARY KEY (`idautor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'J. K. Rowling'),(2,'William Shakespeare'),(3,'José de Alencar'),(4,'Paulo Coelho'),(5,'Bill Gates'),(6,'Machado de Assis'),(7,'Monteiro Lobato'),(8,'Carlos Drumond de Andrade'),(9,'Fernando Pessoa'),(10,'Leonardo da Vincci');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avaliacao` (
  `idavaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text,
  `emprestimo_idemprestimo` int(11) NOT NULL,
  PRIMARY KEY (`idavaliacao`),
  KEY `fk_avaliacao_emprestimo1_idx` (`emprestimo_idemprestimo`),
  CONSTRAINT `fk_avaliacao_emprestimo1` FOREIGN KEY (`emprestimo_idemprestimo`) REFERENCES `emprestimo` (`idemprestimo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao`
--

LOCK TABLES `avaliacao` WRITE;
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cargo` text NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`idcargo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Professor',0),(2,'Bibliotecário',0),(3,'Coordenador',0),(4,'Assistente Administrativo',0),(5,'Secretária',0),(6,'Auxiliar de Limpeza',0);
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT COMMENT '			',
  `nome_curso` text NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `vagas` int(11) NOT NULL,
  `tipo_idtipo` int(11) NOT NULL,
  PRIMARY KEY (`idcurso`),
  KEY `fk_curso_tipo1_idx` (`tipo_idtipo`),
  CONSTRAINT `fk_curso_tipo1` FOREIGN KEY (`tipo_idtipo`) REFERENCES `tipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'Informática para Internet',1080,30,2),(2,'Meio Ambiente',1080,30,2),(3,'Logística',1080,35,2),(4,'Segurança do Trabalho',1110,40,2),(5,'Auxiliar Administrativo',200,35,3),(6,'Contabilidade',800,30,1);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editora`
--

DROP TABLE IF EXISTS `editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editora` (
  `ideditora` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `nome_editora` text NOT NULL,
  PRIMARY KEY (`ideditora`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editora`
--

LOCK TABLES `editora` WRITE;
/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
INSERT INTO `editora` VALUES (1,'Objetiva'),(2,'Nova Tec'),(3,'Rocco'),(4,'Viena'),(5,'FNAC');
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emprestimo` (
  `idemprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date NOT NULL,
  `patrimonio_idpatrimonio` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idemprestimo`),
  KEY `fk_emprestimo_patrimonio1` (`patrimonio_idpatrimonio`),
  KEY `fk_emprestimo_usuario1` (`usuario_idusuario`),
  CONSTRAINT `fk_emprestimo_patrimonio1` FOREIGN KEY (`patrimonio_idpatrimonio`) REFERENCES `patrimonio` (`idpatrimonio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimo`
--

LOCK TABLES `emprestimo` WRITE;
/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `idendereco` int(11) NOT NULL AUTO_INCREMENT,
  `rua` text NOT NULL,
  `complemento` text NOT NULL,
  `numero` decimal(10,0) NOT NULL,
  `bairro` text NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` text NOT NULL,
  `estado` text NOT NULL,
  PRIMARY KEY (`idendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'Avenida ANS 3','Quadra 18 Lote 04',10,'Sítios Recreio Denise',75085114,'Anápolis','GO'),(2,'Rua Antenor Joaquim Rodovalho','Quadra 14 Lote 12',23,'Setor Residencial Pedro Ludovico',75124863,'Anápolis','GO'),(3,'Rua Uru','',16,'Jardim Suíço',75143650,'Anápolis','GO'),(4,'Rua Antonieta Martino','Quadra 18 Lote 04',29,'Polocentro I - 2ª Etapa',75130780,'Anápolis','GO'),(5,'Avenida Central','Quadra 14 Lote 16',10,'Setor Industrial Munir Calixto',75133570,'Anápolis','GO'),(6,'Avenida Central','Quadra 14 Lote 16',10,'Setor Industrial Munir Calixto',75133570,'Anápolis','GO'),(7,'Avenida Central','Quadra 14 Lote 16',10,'Setor Industrial Munir Calixto',75133570,'Anápolis','GO'),(8,'Avenida Central','Quadra 14 Lote 16',10,'Setor Industrial Munir Calixto',75133570,'Anápolis','GO'),(9,'Avenida Central','Quadra 14 Lote 16',10,'Setor Industrial Munir Calixto',75133570,'Anápolis','GO');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formacao`
--

DROP TABLE IF EXISTS `formacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formacao` (
  `idformacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_formacao` text NOT NULL,
  PRIMARY KEY (`idformacao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formacao`
--

LOCK TABLES `formacao` WRITE;
/*!40000 ALTER TABLE `formacao` DISABLE KEYS */;
INSERT INTO `formacao` VALUES (1,'Ensino Fundamental Incompleto'),(2,'Ensino Fundamental Completo'),(3,'Ensino Superior Completo'),(4,'Ensino Médio Completo'),(5,'Ensino Médio Incompleto'),(6,'Ensino Superior Incompleto');
/*!40000 ALTER TABLE `formacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` int(11) NOT NULL,
  `cargo_idcargo` int(11) NOT NULL,
  `formacao_idformacao` int(11) NOT NULL,
  PRIMARY KEY (`idfuncionario`),
  KEY `fk_funcionario_usuario1_idx` (`usuario_idusuario`),
  KEY `fk_funcionario_cargo1_idx` (`cargo_idcargo`),
  KEY `fk_funcionario_formacao1_idx` (`formacao_idformacao`),
  CONSTRAINT `fk_funcionario_cargo1` FOREIGN KEY (`cargo_idcargo`) REFERENCES `cargo` (`idcargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_formacao1` FOREIGN KEY (`formacao_idformacao`) REFERENCES `formacao` (`idformacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,4,1,3);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `idlivro` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` text NOT NULL,
  `nome_livro` text NOT NULL,
  `ano_livro` int(11) NOT NULL,
  `assunto` text NOT NULL,
  `livro_status` tinyint(1) NOT NULL,
  `edicao` text NOT NULL,
  `area_idarea` int(11) NOT NULL,
  `editora_ideditora` int(11) NOT NULL,
  PRIMARY KEY (`idlivro`),
  KEY `fk_livro_area1_idx` (`area_idarea`),
  KEY `fk_livro_editora1_idx` (`editora_ideditora`),
  CONSTRAINT `fk_livro_area1` FOREIGN KEY (`area_idarea`) REFERENCES `area` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_livro_editora1` FOREIGN KEY (`editora_ideditora`) REFERENCES `editora` (`ideditora`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES (1,'1020304050','Romeu e Julieta',2000,'Romance Jovem',1,'1',1,3),(2,'1121314151','Senhora',2003,'Drama',1,'2',1,3),(3,'1222324252','Harry Potter e a pedra filosofal',2005,'Aventura',1,'1',1,5),(4,'1333234353','Menina Bonita dos laços de fita',1995,'infantil',1,'1',1,1),(5,'1414141414','Dom Quixote',2000,'Aventura',1,'1',1,3);
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro_has_autor`
--

DROP TABLE IF EXISTS `livro_has_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro_has_autor` (
  `livro_idlivro` int(11) NOT NULL,
  `autor_idautor` int(11) NOT NULL,
  PRIMARY KEY (`livro_idlivro`,`autor_idautor`),
  KEY `fk_livro_has_autor_autor1_idx` (`autor_idautor`),
  KEY `fk_livro_has_autor_livro1_idx` (`livro_idlivro`),
  CONSTRAINT `fk_livro_has_autor_autor1` FOREIGN KEY (`autor_idautor`) REFERENCES `autor` (`idautor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_livro_has_autor_livro1` FOREIGN KEY (`livro_idlivro`) REFERENCES `livro` (`idlivro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro_has_autor`
--

LOCK TABLES `livro_has_autor` WRITE;
/*!40000 ALTER TABLE `livro_has_autor` DISABLE KEYS */;
INSERT INTO `livro_has_autor` VALUES (1,2),(2,3),(3,1),(4,7),(5,1);
/*!40000 ALTER TABLE `livro_has_autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multa`
--

DROP TABLE IF EXISTS `multa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multa` (
  `idmulta` int(11) NOT NULL,
  `situacao` tinyint(1) NOT NULL,
  `valor_idvalor` int(11) NOT NULL,
  `emprestimo_idemprestimo` int(11) NOT NULL,
  PRIMARY KEY (`idmulta`),
  KEY `fk_multa_valor1_idx` (`valor_idvalor`),
  KEY `fk_multa_emprestimo1_idx` (`emprestimo_idemprestimo`),
  CONSTRAINT `fk_multa_emprestimo1` FOREIGN KEY (`emprestimo_idemprestimo`) REFERENCES `emprestimo` (`idemprestimo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_multa_valor1` FOREIGN KEY (`valor_idvalor`) REFERENCES `valor` (`idvalor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multa`
--

LOCK TABLES `multa` WRITE;
/*!40000 ALTER TABLE `multa` DISABLE KEYS */;
/*!40000 ALTER TABLE `multa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patrimonio`
--

DROP TABLE IF EXISTS `patrimonio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patrimonio` (
  `idpatrimonio` int(11) NOT NULL,
  `livro_idlivro` int(11) NOT NULL,
  PRIMARY KEY (`idpatrimonio`),
  KEY `fk_patrimonio_livro1` (`livro_idlivro`),
  CONSTRAINT `fk_patrimonio_livro1` FOREIGN KEY (`livro_idlivro`) REFERENCES `livro` (`idlivro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patrimonio`
--

LOCK TABLES `patrimonio` WRITE;
/*!40000 ALTER TABLE `patrimonio` DISABLE KEYS */;
INSERT INTO `patrimonio` VALUES (1000000,1),(10000002,2),(10000009,2),(10000003,3),(10000004,3),(10000005,4),(10000007,4),(10000010,5);
/*!40000 ALTER TABLE `patrimonio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `senha`
--

DROP TABLE IF EXISTS `senha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `senha` (
  `idsenha` int(11) NOT NULL AUTO_INCREMENT,
  `senha_usuario` text NOT NULL,
  `data_cadastro` date NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idsenha`),
  KEY `fk_senha_usuario1_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_senha_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `senha`
--

LOCK TABLES `senha` WRITE;
/*!40000 ALTER TABLE `senha` DISABLE KEYS */;
INSERT INTO `senha` VALUES (1,'qwer1234','2018-05-20',1),(2,'zxcv1234','2018-05-20',2),(3,'aaaa1111','2018-05-20',3),(4,'qqqq2222','2018-05-20',4),(5,'qwert12345','2018-05-21',5),(6,'qwert12345','2018-05-21',6),(7,'qwert12345','2018-05-21',7),(8,'qwert12345','2018-05-21',8),(9,'qwert12345','2018-05-21',9);
/*!40000 ALTER TABLE `senha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo` text NOT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'EAD'),(2,'Técnico'),(3,'Qualificação'),(4,'Pronatec');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `idturma` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` date NOT NULL,
  `data_termino` date NOT NULL,
  `curso_idcurso` int(11) NOT NULL,
  `turno_idturno` int(11) NOT NULL,
  PRIMARY KEY (`idturma`),
  KEY `fk_turma_curso1_idx` (`curso_idcurso`),
  KEY `fk_turma_turno1_idx` (`turno_idturno`),
  CONSTRAINT `fk_turma_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_turno1` FOREIGN KEY (`turno_idturno`) REFERENCES `turno` (`idturno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (1,'2018-06-12','2020-06-12',1,2);
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma_has_aluno`
--

DROP TABLE IF EXISTS `turma_has_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma_has_aluno` (
  `matricula` double NOT NULL,
  `turma_idturma` int(11) NOT NULL,
  `aluno_idaluno` int(11) NOT NULL,
  PRIMARY KEY (`matricula`,`turma_idturma`,`aluno_idaluno`),
  KEY `fk_turma_has_aluno_aluno1_idx` (`aluno_idaluno`),
  KEY `fk_turma_has_aluno_turma1_idx` (`turma_idturma`),
  CONSTRAINT `fk_turma_has_aluno_aluno1` FOREIGN KEY (`aluno_idaluno`) REFERENCES `aluno` (`idaluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_has_aluno_turma1` FOREIGN KEY (`turma_idturma`) REFERENCES `turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma_has_aluno`
--

LOCK TABLES `turma_has_aluno` WRITE;
/*!40000 ALTER TABLE `turma_has_aluno` DISABLE KEYS */;
INSERT INTO `turma_has_aluno` VALUES (1894940,1,3);
/*!40000 ALTER TABLE `turma_has_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turno` (
  `idturno` int(11) NOT NULL AUTO_INCREMENT,
  `nome_turno` text NOT NULL,
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES (2,'Matutino'),(3,'Vespertino'),(4,'Noturno');
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` text NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone_fixo` double DEFAULT NULL,
  `telefone_celular` double NOT NULL,
  `email` text NOT NULL,
  `dtnasc` date NOT NULL,
  `usuario_status` tinyint(1) NOT NULL,
  `first_register` date NOT NULL,
  `last_activation` date NOT NULL,
  `endereco_idendereco` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_endereco1_idx` (`endereco_idendereco`),
  CONSTRAINT `fk_usuario_endereco1` FOREIGN KEY (`endereco_idendereco`) REFERENCES `endereco` (`idendereco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Lidiane Soares','01233454554',6233214447,62984712225,'lidiane@gmail.com','1994-05-10',0,'2018-05-20','2018-05-20',1),(2,'Ravilla Caroline','04578787878',6233889888,62982453265,'ravilla@gmail.com','2000-06-11',0,'2018-05-20','2018-05-20',2),(3,'Bruno Messias','03830310102',6298270328,62982703288,'bruno21vk@gmail.com','1991-11-15',0,'2018-05-20','2018-05-20',3),(4,'Vinicius Alves','20030040050',6233112523,62998454212,'vinicius@gmail.com','1993-03-23',0,'2018-05-20','2018-05-20',4),(5,'Help','00029302930',6233124545,62981454755,'help@gmail.com','1984-03-11',0,'2018-05-21','2018-05-21',5),(6,'Help','00029302930',6233124545,62981454755,'help@gmail.com','1984-03-11',0,'2018-05-21','2018-05-21',6),(7,'Help','00029302930',6233124545,62981454755,'help@gmail.com','1984-03-11',0,'2018-05-21','2018-05-21',7),(8,'Help','00029302930',6233124545,62981454755,'help@gmail.com','1984-03-11',0,'2018-05-21','2018-05-21',8),(9,'Help','00029302930',6233124545,62981454755,'help@gmail.com','1984-03-11',0,'2018-05-21','2018-05-21',9);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valor`
--

DROP TABLE IF EXISTS `valor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valor` (
  `idvalor` int(11) NOT NULL AUTO_INCREMENT,
  `valor_diario_multa` double NOT NULL,
  PRIMARY KEY (`idvalor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valor`
--

LOCK TABLES `valor` WRITE;
/*!40000 ALTER TABLE `valor` DISABLE KEYS */;
/*!40000 ALTER TABLE `valor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'libraryitego'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_aluno_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_aluno_insert`(pnome_usuario text, pcpf varchar(11), ptelefone_fixo double, ptelefone_celular double, pemail text, pdtnasc date, prua text, pcomplemento text, pnumero numeric, pbairro text, pcep int, pcidade text, pestado text)
BEGIN 
declare address, user int default 0;
declare timenow datetime;
insert into endereco (rua, complemento, numero, bairro, cep, cidade, estado) 
values (prua, pcomplemento, pnumero, pbairro, pcep, pcidade, pestado);

select idendereco into address from endereco where idendereco = LAST_INSERT_ID();
select now() into timenow;

insert into usuario (nome_usuario, cpf, telefone_fixo, telefone_celular, email, dtnasc, usuario_status, first_register, last_activation, endereco_idendereco) 
values (pnome_usuario, pcpf, ptelefone_fixo, ptelefone_celular, pemail, pdtnasc, 0, timenow, timenow, address);

select idusuario into user from usuario where idusuario = LAST_INSERT_ID();

insert into aluno (nivel, usuario_idusuario)
values(0, user);

select idaluno,first_register,usuario_idusuario from aluno inner join usuario on aluno.usuario_idusuario = usuario.idusuario
where idaluno = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_aluno_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_aluno_update`( pidaluno int,pidusuario int, pidendereco int, pnome_usuario text, pcpf varchar(11), ptelefone_fixo double, ptelefone_celular double, pemail text, pdtnasc date, prua text, pcomplemento text, pnumero numeric, pbairro text, pcep int, pcidade text, pestado text)
BEGIN
	
    update usuario set nome_usuario=pnome_usuario, cpf=pcpf, telefone_fixo=ptelefone_fixo, telefone_celular=ptelefone_celular, email=pemail, dtnasc=pdtnasc  where idusuario = pidusuario;
    update endereco set rua=prua, complemento=pcomplemento, numero=pnumero, bairro=pbairro, cep=pcep, cidade=pcidade, estado=pestado where idendereco = pidendereco;
 	
 	select idaluno,idusuario,idendereco,nome_usuario,cpf,telefone_fixo,telefone_celular,email,dtnasc,rua,complemento,numero,bairro , cep , cidade , estado from aluno 
 	inner join usuario on aluno.usuario_idusuario = usuario.idusuario 
 	inner join endereco on usuario.endereco_idendereco = endereco.idendereco
 	where idaluno = pidaluno;
 	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_area_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_area_insert`(pnome_area text)
BEGIN
insert into area (nome_area)
values (pnome_area);

select idarea, nome_area from area where idarea = LAST_INSERT_ID();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_area_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_area_update`(pid int, pnome text)
BEGIN
    UPDATE area set nome_area=pnome where idarea = pid;
    
    select idarea,nome_area from area where idarea = pid;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_autor_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_autor_insert`(pnome_autor text)
BEGIN
insert into autor (nome_autor)
values (pnome_autor);

select idautor, nome_autor from autor where idautor = LAST_INSERT_ID();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_autor_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_autor_update`(pid int, pnome text)
BEGIN
    UPDATE autor set nome_autor=pnome where idautor = pid;
    
    select idautor,nome_autor from autor where idautor = pid;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_avaliacao_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_avaliacao_insert`(pcomentario text, pemprestimo int)
BEGIN
insert into avaliacao (comentario, emprestimo_idemprestimo)
values (pcomentario, pemprestimo);

select idavaliacao, comentario, emprestimo_idemprestimo from avaliacao where idavaliacao = LAST_INSERT_ID();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_cargo_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cargo_insert`(pnome_cargo text)
BEGIN
insert into cargo (nome_cargo, nivel)
values (pnome_cargo, 0);

select idcargo, nome_cargo, nivel from cargo where idcargo = LAST_INSERT_ID();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_cargo_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cargo_update`(pid int, pnome text)
BEGIN
    UPDATE cargo set nome_cargo=pnome where idcargo = pid;
    
    select idcargo,nome_cargo from cargo where idcargo = pid;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_curso_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_curso_insert`(pnome_curso text, ptipo int, pcarga_horaria int, pvagas int)
BEGIN

insert into curso (nome_curso, tipo_idtipo, carga_horaria, vagas)
values (pnome_curso, ptipo, pcarga_horaria, pvagas);

select idcurso, nome_curso, tipo_idtipo, carga_horaria, vagas from curso where idcurso = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_curso_turma_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_curso_turma_insert`(pinicio date, ptermino date, pidcurso int, pidturno int)
BEGIN
insert into turma (data_inicio, data_termino, curso_idcurso, turno_idturno)
values (pinicio , ptermino , pidcurso, pidturno );

select idturma, data_inicio, data_termino, curso_idcurso, turno_idturno from turma where idturma = LAST_INSERT_ID();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_curso_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_curso_update`(pidcurso int,pnome_curso text, ptipo int, pcarga_horaria int, pvagas int)
BEGIN

UPDATE curso set nome_curso=pnome_curso, tipo_idtipo=ptipo, carga_horaria=pcarga_horaria, vagas=pvagas where idcurso = pidcurso;
    
    select idcurso,nome_curso,tipo_idtipo,carga_horaria,vagas from curso where idcurso = pidcurso;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_editora_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editora_insert`(pnome_editora text)
BEGIN
insert into editora (nome_editora)
values (pnome_editora);

select ideditora, nome_editora from editora where ideditora = LAST_INSERT_ID();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_editora_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_editora_update`(pid int, pnome text)
BEGIN
    UPDATE editora set nome_editora=pnome where ideditora = pid;
    
    select ideditora,nome_editora from editora where ideditora = pid;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_emprestimo_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_emprestimo_insert`(ppatrimonio int, pusuario int)
BEGIN
insert into emprestimo (data_emprestimo, data_devolucao, patrimonio_idpatrimonio, usuario_idusuario)
values(now(), now(), ppatrimonio, pusuario);

select idemprestimo, patrimonio_idpatrimonio, usuario_idusuario from emprestimo where idemprestimo = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_formacao_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_formacao_insert`(pnome_formacao text)
BEGIN
insert into formacao (nome_formacao)
values (pnome_formacao);

select idformacao, nome_formacao from formacao where idformacao = LAST_INSERT_ID();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_formacao_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_formacao_update`(pid int, pnome text)
BEGIN
    UPDATE formacao set nome_formacao=pnome where idformacao = pid;
    
    select idformacao,nome_formacao from formacao where idformacao = pid;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_funcionario_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_funcionario_insert`(pnome_usuario text, pcpf varchar(11), ptelefone_fixo double, ptelefone_celular double, pemail text, pdtnasc date, prua text, pcomplemento text, pnumero numeric, pbairro text, pcep int, pcidade text, pestado text, pcargo int, pformacao int)
BEGIN 
declare address, user int default 0;
declare timenow datetime;
insert into endereco (rua, complemento, numero, bairro, cep, cidade, estado) 
values (prua, pcomplemento, pnumero, pbairro, pcep, pcidade, pestado);

select idendereco into address from endereco where idendereco = LAST_INSERT_ID();
select now() into timenow;

insert into usuario (nome_usuario, cpf, telefone_fixo, telefone_celular, email, dtnasc, usuario_status, first_register, last_activation, endereco_idendereco) 
values (pnome_usuario, pcpf, ptelefone_fixo, ptelefone_celular, pemail, pdtnasc, 0, timenow, timenow, address);

select idusuario into user from usuario where idusuario = LAST_INSERT_ID();

insert into funcionario (usuario_idusuario, formacao_idformacao, cargo_idcargo)
values(user, pformacao, pcargo);

select idfuncionario,first_register,usuario_idusuario from funcionario inner join usuario on funcionario.usuario_idusuario = usuario.idusuario where idfuncionario = LAST_INSERT_ID();


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_funcionario_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_funcionario_update`( pidfuncionario int,pidusuario int, pidendereco int, pnome_usuario text, pcpf varchar(11), ptelefone_fixo double, ptelefone_celular double, pemail text, pdtnasc date, prua text, pcomplemento text, pnumero numeric, pbairro text, pcep int, pcidade text, pestado text, pcargo int, pformacao int)
BEGIN
	UPDATE funcionario set cargo_idcargo=pcargo, formacao_idformacao=pformacao where idfuncionario = pidfuncionario ;
    update usuario set nome_usuario=pnome_usuario, cpf=pcpf, telefone_fixo=ptelefone_fixo, telefone_celular=ptelefone_celular, email=pemail, dtnasc=pdtnasc  where idusuario = pidusuario;
    update endereco set rua=prua, complemento=pcomplemento, numero=pnumero, bairro=pbairro, cep=pcep, cidade=pcidade, estado=pestado where idendereco = pidendereco;
 	
 	select idfuncionario,idusuario,idendereco,nome_usuario,cpf,telefone_fixo,telefone_celular,email,dtnasc,rua,complemento,numero,bairro , cep , cidade , estado , cargo_idcargo , formacao_idformacao from funcionario 
 	inner join usuario on funcionario.usuario_idusuario = usuario.idusuario 
 	inner join endereco on usuario.endereco_idendereco = endereco.idendereco
 	where idfuncionario = pidfuncionario;
 	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_livro_has_autor_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_livro_has_autor_insert`(plivro int, pautor int)
BEGIN
insert into livro_has_autor (livro_idlivro, autor_idautor)
values (plivro, pautor);

select livro_idlivro, autor_idautor from livro_has_autor where livro_idlivro = plivro and autor_idautor = pautor;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_livro_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_livro_insert`(pisbn text, pnome text, pano int, passunto text, pedicao text, peditora int, parea int)
BEGIN

insert into livro (isbn, nome_livro, ano_livro, assunto, livro_status, edicao, editora_ideditora, area_idarea)
values (pisbn, pnome, pano, passunto, 1, pedicao,peditora,parea);

select idlivro from livro where idlivro = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_livro_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_livro_update`(pid int,pisbn text, pnome text, pano int, passunto text, pedicao text, peditora int, parea int)
BEGIN
    UPDATE livro set isbn=pisbn, nome_livro=pnome, ano_livro=pano, assunto=passunto, edicao=pedicao, editora_ideditora=peditora, area_idarea=parea where idlivro = pid;
    
    select idlivro,isbn,nome_livro,ano_livro,assunto,edicao,editora_ideditora,area_idarea from livro where idlivro = pid;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_patrimonio_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_patrimonio_insert`(pidpatrimonio int, plivro_idlivro int)
BEGIN

insert into patrimonio (idpatrimonio, livro_idlivro)
values (pidpatrimonio, plivro_idlivro);

select idpatrimonio, livro_idlivro from patrimonio where idpatrimonio = pidpatrimonio;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_tipo_curso_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tipo_curso_insert`(pnome_tipo text)
BEGIN
insert into tipo (nome_tipo)
values (pnome_tipo);

select idtipo, nome_tipo from tipo where idtipo = LAST_INSERT_ID();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_tipo_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tipo_update`(pid int, pnome text)
BEGIN
    UPDATE tipo set nome_tipo=pnome where idtipo = pid;
    
    select idtipo,nome_tipo from tipo where idtipo = pid;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_turma_has_aluno_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turma_has_aluno_insert`(pturma int, paluno int, pmatricula double)
BEGIN
insert into turma_has_aluno (turma_idturma, aluno_idaluno, matricula)
values (pturma, paluno,pmatricula);

select turma_idturma, aluno_idaluno, matricula from turma_has_aluno where turma_idturma = pturma and aluno_idaluno = paluno ;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_turno_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turno_insert`(pnome_turno text)
BEGIN
insert into turno (nome_turno)
values (pnome_turno);

select idturno, nome_turno from turno where idturno = LAST_INSERT_ID();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_turno_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turno_update`(pid int, pnome text)
BEGIN
    UPDATE turno set nome_turno=pnome where idturno = pid;
    
    select idturno,nome_turno from turno where idturno = pid;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_usuario_senha_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario_senha_insert`(psenha_usuario text, pdata_cadastro date, pusuario int)
BEGIN
insert into senha (senha_usuario, data_cadastro, usuario_idusuario)
values(psenha_usuario, pdata_cadastro, pusuario);
select idsenha from senha where idsenha = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_valor_multa_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_valor_multa_insert`( pvalor_diario_multa double)
BEGIN
insert into valor (valor_diario_multa)
values (pvalor_diario_multa);

select idvalor, valor_diario_multa from valor where idvalor = LAST_INSERT_ID();

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

-- Dump completed on 2018-05-22 11:47:42
