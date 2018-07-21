CREATE DATABASE  IF NOT EXISTS `libraryitego` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `libraryitego`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
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
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (109,0,10),(110,0,11),(111,0,12),(112,0,13),(113,0,14),(114,0,15),(115,0,16),(116,0,17),(117,0,18),(118,0,19),(119,0,20),(120,0,21),(121,0,22),(122,0,23),(123,0,24),(124,0,25),(125,0,26),(126,0,27),(127,0,28),(128,0,29),(129,0,30),(130,0,31),(131,0,32),(132,0,33),(133,0,34),(134,0,35),(135,0,36),(136,0,37),(137,0,38),(138,0,39),(139,0,40),(140,0,41),(141,0,42),(142,0,43),(143,0,44),(144,0,45),(145,0,46),(146,0,47),(147,0,48),(148,0,49),(149,0,50),(150,0,51),(151,0,52),(152,0,53),(153,0,54),(154,0,55),(155,0,56),(156,0,57),(157,0,58),(158,0,59),(159,0,60),(160,0,61),(161,0,62),(162,0,63),(163,0,64),(164,0,65),(165,0,66),(166,0,67),(167,0,68),(168,0,69),(169,0,70),(170,0,71),(171,0,72),(172,0,73),(173,0,74),(174,0,75),(175,0,76),(176,0,77),(177,0,78),(178,0,79),(179,0,80),(180,0,81),(181,0,82),(182,0,83),(183,0,84),(184,0,85),(185,0,86),(186,0,87),(187,0,88),(188,0,89),(189,0,90),(190,0,91),(191,0,92),(192,0,93),(193,0,94),(194,0,95),(195,0,96),(196,0,97),(197,0,98),(198,0,99),(199,0,100),(205,0,120),(206,0,121),(208,0,123),(209,0,124),(210,0,125),(211,0,126),(212,0,130);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'J. K. Rowling'),(2,'William Shakespeare'),(3,'José de Alencar'),(4,'Paulo Coelho'),(5,'Bill Gates'),(6,'Machado de Assis'),(7,'Monteiro Lobato'),(8,'Carlos Drumond de Andrade'),(9,'Fernando Pessoa'),(10,'Leonardo da Vincci'),(11,'Manuel Bandeira'),(12,'Umberto Eco'),(13,'Luís de Camões'),(14,'Oscar Wilde');
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (7,'informática básica',40,25,2),(8,'curso técnico em logística',1240,25,2),(9,'curso técnico em meio ambiente',1328,25,2),(10,'informática básica',60,20,3),(11,'segurança do trabalho',1200,25,2),(12,'inglês básico',180,10,3),(13,'assistente administrativo',303,20,3),(14,'excel avançado',42,20,3),(15,'mestre de obra',120,15,3),(16,'auxiliar de contabilidade',300,15,3),(17,'recepsionista secretária',318,10,3),(18,'operador de caixa',249,25,3),(19,'operador de computador',282,20,3),(20,'qualidade no atendimento',36,15,4),(21,'processos quimícos',1800,20,4),(22,'Telemarketing',80,10,1),(23,'Gestão de Estoque',42,25,1),(24,'Gestão de Pessoas/RH\n',60,10,1),(25,'Matemática Comercial',40,18,3),(26,'Analista de Crédito e Cobrança',42,10,3),(27,'Assistente Contábil',44,15,3),(28,'Departamento Pessoal',78,20,1),(29,'Português Instrumental',36,10,4),(30,'curso técnico em química',1330,25,2),(31,'curso técnico de informática para internet',1192,20,2),(32,'curso técnico em redes de computadores',1080,20,2),(33,'informática',40,25,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'692-1532 Sodales Street','982 A, Rd.',75,'morumbi',7500000,'anápolis','GO'),(2,'4975 Eu St.','Ap #497-4973 Fringilla, St.',261,'morumbi',7500000,'anápolis','GO'),(3,'719-4286 Non St.','8779 Lectus. Rd.',151,'morumbi',7500000,'anápolis','GO'),(4,'P.O. Box 146, 5480 Semper St.','457-5761 Eu Avenue',268,'morumbi',7500000,'anápolis','GO'),(5,'4812 Varius Rd.','767-4713 Et, Rd.',252,'morumbi',7500000,'anápolis','GO'),(6,'P.O. Box 803, 8315 Lacinia St.','P.O. Box 182, 7533 Vestibulum Rd.',34,'morumbi',7500000,'anápolis','GO'),(7,'P.O. Box 823, 3705 Sed Street','P.O. Box 687, 3601 In Road',47,'morumbi',7500000,'anápolis','GO'),(8,'865-6198 Hendrerit Road','P.O. Box 445, 8019 Quam, St.',249,'morumbi',7500000,'anápolis','GO'),(9,'P.O. Box 844, 5330 Erat, Rd.','2162 Posuere, Rd.',66,'morumbi',7500000,'anápolis','GO'),(10,'413-4846 Cum Rd.','Ap #187-8917 Duis Av.',120,'morumbi',7500000,'anápolis','GO'),(11,'Ap #324-2569 Eu, Rd.','P.O. Box 691, 4726 Maecenas Rd.',81,'morumbi',7500000,'anápolis','GO'),(12,'9396 Vestibulum. Rd.','P.O. Box 727, 3140 Nec, Av.',118,'morumbi',7500000,'anápolis','GO'),(13,'770-883 In Avenue','350-7526 Pede. Rd.',207,'morumbi',7500000,'anápolis','GO'),(14,'P.O. Box 627, 6800 Cursus, Avenue','Ap #833-4453 A Av.',147,'morumbi',7500000,'anápolis','GO'),(15,'Ap #698-984 Nulla. Rd.','P.O. Box 144, 6744 Aliquam St.',8,'morumbi',7500000,'anápolis','GO'),(16,'P.O. Box 124, 6544 Nec, Road','P.O. Box 109, 5776 Consectetuer, St.',38,'morumbi',7500000,'anápolis','GO'),(17,'3099 Egestas Rd.','352 Ac Rd.',44,'morumbi',7500000,'anápolis','GO'),(18,'580-6418 Nulla. Rd.','P.O. Box 730, 9355 Mi Rd.',288,'morumbi',7500000,'anápolis','GO'),(19,'280-1345 Semper Avenue','793-3933 Eleifend. St.',170,'morumbi',7500000,'anápolis','GO'),(20,'Ap #135-7991 Gravida. Road','Ap #695-3818 Cursus Road',282,'morumbi',7500000,'anápolis','GO'),(21,'629-9351 Vitae St.','Ap #623-974 Felis Street',113,'morumbi',7500000,'anápolis','GO'),(22,'Ap #913-8775 Adipiscing. St.','7662 Sit St.',220,'morumbi',7500000,'anápolis','GO'),(23,'Ap #774-7953 Mauris Rd.','Ap #721-6226 Neque Ave',15,'morumbi',7500000,'anápolis','GO'),(24,'P.O. Box 776, 943 Orci Rd.','P.O. Box 440, 7757 Quis Avenue',108,'morumbi',7500000,'anápolis','GO'),(25,'P.O. Box 751, 2247 Sem. Avenue','7047 Lacus. Road',159,'morumbi',7500000,'anápolis','GO'),(26,'Ap #432-3634 Malesuada St.','957-879 At Ave',291,'morumbi',7500000,'anápolis','GO'),(27,'P.O. Box 580, 9325 Ac Road','P.O. Box 544, 4869 Nunc Road',223,'morumbi',7500000,'anápolis','GO'),(28,'9004 Nulla Ave','1050 Posuere Av.',268,'morumbi',7500000,'anápolis','GO'),(29,'646-7337 Rutrum Av.','P.O. Box 628, 9858 Eu St.',159,'morumbi',7500000,'anápolis','GO'),(30,'Ap #419-547 Egestas. Avenue','8146 Vestibulum Rd.',241,'morumbi',7500000,'anápolis','GO'),(31,'P.O. Box 165, 5412 Aenean Ave','180-4920 Nulla St.',203,'morumbi',7500000,'anápolis','GO'),(32,'2785 Arcu. St.','P.O. Box 453, 181 Ornare, Street',13,'morumbi',7500000,'anápolis','GO'),(33,'Ap #913-1474 Natoque Avenue','Ap #504-4323 Nec Ave',248,'morumbi',7500000,'anápolis','GO'),(34,'Ap #796-8974 Urna. Ave','788-9008 Fusce St.',55,'morumbi',7500000,'anápolis','GO'),(35,'P.O. Box 373, 2953 Ac Ave','4319 Mauris Ave',45,'morumbi',7500000,'anápolis','GO'),(36,'567-6784 Vitae, Road','Ap #818-1551 Dolor Av.',126,'morumbi',7500000,'anápolis','GO'),(37,'Ap #348-3666 Vestibulum St.','P.O. Box 543, 3103 Habitant Ave',72,'morumbi',7500000,'anápolis','GO'),(38,'412-3482 Velit Street','P.O. Box 952, 2180 Ut Road',147,'morumbi',7500000,'anápolis','GO'),(39,'P.O. Box 957, 5260 Ac Rd.','8980 In, Street',242,'morumbi',7500000,'anápolis','GO'),(40,'P.O. Box 681, 6264 Egestas. Av.','Ap #956-1624 Massa Ave',20,'morumbi',7500000,'anápolis','GO'),(41,'P.O. Box 512, 9755 Parturient Road','851-8699 Vitae Ave',68,'morumbi',7500000,'anápolis','GO'),(42,'Ap #725-3404 Nullam Rd.','Ap #287-6141 Odio Avenue',202,'morumbi',7500000,'anápolis','GO'),(43,'Ap #211-2015 Lacinia St.','Ap #375-1178 Interdum. St.',190,'morumbi',7500000,'anápolis','GO'),(44,'9267 Ac Rd.','Ap #399-1870 A Rd.',117,'morumbi',7500000,'anápolis','GO'),(45,'Ap #626-1730 Tincidunt Rd.','8162 Maecenas St.',150,'morumbi',7500000,'anápolis','GO'),(46,'886-9350 Et Rd.','321-8436 Consequat Rd.',174,'morumbi',7500000,'anápolis','GO'),(47,'Ap #366-5773 Vestibulum Ave','Ap #701-525 Sed Street',13,'morumbi',7500000,'anápolis','GO'),(48,'Ap #354-8943 Sem Street','P.O. Box 505, 1515 Dolor Rd.',51,'morumbi',7500000,'anápolis','GO'),(49,'3898 Integer Rd.','Ap #886-6219 Pede, Avenue',55,'morumbi',7500000,'anápolis','GO'),(50,'320-2947 Ornare Av.','Ap #120-8777 Sollicitudin St.',48,'morumbi',7500000,'anápolis','GO'),(51,'6056 Vehicula Street','743 Amet Ave',93,'morumbi',7500000,'anápolis','GO'),(52,'965-5796 A Rd.','P.O. Box 920, 2140 Ac Rd.',35,'morumbi',7500000,'anápolis','GO'),(53,'Ap #497-9425 A, Avenue','Ap #909-6496 Non Road',211,'morumbi',7500000,'anápolis','GO'),(54,'P.O. Box 180, 9481 Vestibulum Avenue','Ap #705-861 Non, Street',127,'morumbi',7500000,'anápolis','GO'),(55,'6321 Nulla St.','Ap #347-8692 Sagittis St.',155,'morumbi',7500000,'anápolis','GO'),(56,'Ap #463-6913 Mauris St.','P.O. Box 918, 7892 Scelerisque Street',248,'morumbi',7500000,'anápolis','GO'),(57,'3639 Iaculis Rd.','P.O. Box 122, 2690 Nonummy Rd.',58,'morumbi',7500000,'anápolis','GO'),(58,'P.O. Box 379, 3996 Pretium Rd.','Ap #843-8149 Molestie. St.',31,'morumbi',7500000,'anápolis','GO'),(59,'203-6187 Interdum. Av.','Ap #518-6864 Dictum Street',77,'morumbi',7500000,'anápolis','GO'),(60,'832-6801 Quisque St.','Ap #283-2545 Fringilla St.',156,'morumbi',7500000,'anápolis','GO'),(61,'6866 In, St.','Ap #917-3071 Nibh. Rd.',84,'morumbi',7500000,'anápolis','GO'),(62,'P.O. Box 736, 554 Nam Av.','P.O. Box 980, 8438 Ornare, Avenue',70,'morumbi',7500000,'anápolis','GO'),(63,'952-695 Condimentum. Rd.','Ap #677-9947 Mauris Rd.',73,'morumbi',7500000,'anápolis','GO'),(64,'797-1194 Nascetur Avenue','9181 Porttitor Road',139,'morumbi',7500000,'anápolis','GO'),(65,'844-6208 Diam. St.','466-3851 Eros Street',239,'morumbi',7500000,'anápolis','GO'),(66,'Ap #942-1248 Lorem Street','712-5323 Nunc Street',122,'morumbi',7500000,'anápolis','GO'),(67,'P.O. Box 313, 5234 Placerat. Av.','6961 Dapibus Ave',40,'morumbi',7500000,'anápolis','GO'),(68,'894-6846 Sapien. Road','294-9672 Donec St.',7,'morumbi',7500000,'anápolis','GO'),(69,'P.O. Box 964, 6085 Tincidunt. St.','978-1348 Ut Road',103,'morumbi',7500000,'anápolis','GO'),(70,'P.O. Box 411, 6243 Mauris St.','7798 Dolor, Rd.',174,'morumbi',7500000,'anápolis','GO'),(71,'Ap #364-9281 Cras Street','P.O. Box 558, 7955 Vivamus St.',54,'morumbi',7500000,'anápolis','GO'),(72,'P.O. Box 124, 2094 Turpis. Ave','6726 Tortor, Avenue',130,'morumbi',7500000,'anápolis','GO'),(73,'211-7800 Quisque Road','977 Montes, Road',176,'morumbi',7500000,'anápolis','GO'),(74,'P.O. Box 554, 8742 Etiam Rd.','Ap #216-9926 A, St.',125,'morumbi',7500000,'anápolis','GO'),(75,'6500 Egestas. St.','7560 In Ave',250,'morumbi',7500000,'anápolis','GO'),(76,'6697 Lorem Street','P.O. Box 573, 1934 Magna. Street',212,'morumbi',7500000,'anápolis','GO'),(77,'7775 Mattis Street','Ap #802-5922 Dapibus St.',177,'morumbi',7500000,'anápolis','GO'),(78,'P.O. Box 401, 9056 Vitae Road','P.O. Box 545, 1253 Amet, Avenue',71,'morumbi',7500000,'anápolis','GO'),(79,'P.O. Box 555, 3296 Etiam Street','P.O. Box 288, 3398 Ante. St.',291,'morumbi',7500000,'anápolis','GO'),(80,'768-3298 Commodo St.','671-3972 Tincidunt, St.',105,'morumbi',7500000,'anápolis','GO'),(81,'P.O. Box 113, 5450 Dolor, St.','Ap #491-1754 Congue. St.',192,'morumbi',7500000,'anápolis','GO'),(82,'Ap #923-5020 Augue St.','P.O. Box 602, 6291 Lacus. Rd.',159,'morumbi',7500000,'anápolis','GO'),(83,'359-2166 Ut Road','121-3508 Facilisis Rd.',99,'morumbi',7500000,'anápolis','GO'),(84,'P.O. Box 855, 9474 Tristique Road','P.O. Box 332, 5934 Quam. Rd.',70,'morumbi',7500000,'anápolis','GO'),(85,'Ap #786-289 Natoque Rd.','P.O. Box 932, 2564 Sem, St.',137,'morumbi',7500000,'anápolis','GO'),(86,'4405 Et, St.','861-6014 Eu Street',190,'morumbi',7500000,'anápolis','GO'),(87,'P.O. Box 127, 7440 Proin Rd.','691-6654 Est Av.',136,'morumbi',7500000,'anápolis','GO'),(88,'Ap #897-1490 Elit Road','2759 Leo St.',289,'morumbi',7500000,'anápolis','GO'),(89,'Ap #155-7939 Magnis Street','P.O. Box 198, 7017 Tempor St.',41,'morumbi',7500000,'anápolis','GO'),(90,'P.O. Box 516, 5721 Non, Avenue','P.O. Box 406, 3601 Ut, Ave',194,'morumbi',7500000,'anápolis','GO'),(91,'5309 Lectus St.','2774 Ante Street',204,'morumbi',7500000,'anápolis','GO'),(92,'P.O. Box 843, 5360 Arcu Road','Ap #248-7674 Sed Rd.',171,'morumbi',7500000,'anápolis','GO'),(93,'399-3070 Egestas St.','Ap #720-2402 Orci. Rd.',55,'morumbi',7500000,'anápolis','GO'),(94,'5053 Felis. Av.','8668 Lorem St.',24,'morumbi',7500000,'anápolis','GO'),(95,'433-3880 Amet Av.','7030 Sem Road',298,'morumbi',7500000,'anápolis','GO'),(96,'Ap #316-5848 Nec Ave','7030 Vitae Ave',25,'morumbi',7500000,'anápolis','GO'),(97,'P.O. Box 790, 3012 Id, St.','Ap #323-7463 Dui Road',279,'morumbi',7500000,'anápolis','GO'),(98,'617-2527 Mollis. Rd.','P.O. Box 546, 5333 Consectetuer Avenue',249,'morumbi',7500000,'anápolis','GO'),(99,'P.O. Box 149, 3471 In, Av.','P.O. Box 126, 3037 Sed, Rd.',147,'morumbi',7500000,'anápolis','GO'),(100,'Ap #363-6938 Nunc Ave','Ap #688-4847 Enim, St.',268,'morumbi',7500000,'anápolis','GO'),(111,'Rua Uru','Quadra 19 Lote 05',144,'Jardim Suíço',75143650,'Anápolis','GO'),(112,'Rua Uru','Quadra 19 Lote 05',0,'Jardim Suíço',75143650,'Anápolis','GO'),(114,'0','0',0,'0',0,'0','0'),(115,'Rua Uru','Quadra 19 Lote 05',0,'Jardim Suíço',75143650,'Anápolis','GO'),(116,'Rua Uru','Quadra 19 Lote 05',123,'Jardim Suíço',75143650,'Anápolis','GO'),(117,'Rua Uru','Quadra 19 Lote 05',123,'Jardim Suíço',75143650,'Anápolis','GO'),(118,'Avenida N-003','q30 l18',160,'Anápolis City',75094080,'Anápolis','GO'),(119,'Avenida N-003','q30 l18',160,'Anápolis City',75094080,'Anápolis','GO'),(120,'Avenida N-003','q30 l18',160,'Anápolis City',75094080,'Anápolis','GO'),(121,'Rua N-004','489374',10,'Anápolis City',75094090,'Anápolis','GO');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (2,101,4,1),(3,102,5,6),(4,103,6,5),(5,104,5,1),(6,105,2,5),(7,106,5,2),(8,107,5,1),(9,108,6,3),(10,109,5,1),(16,127,1,3),(17,128,1,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES (9,'9788573035381','A Mãe do Freud',1987,'literatura',1,'3',1,1),(10,'9788573035327','Mario Vargas Llosa',1977,'literatura',1,'1',1,1),(11,'9788573035302','Livro a coisa stephen ',2001,'literatura',1,'1',1,1),(12,'9788564065918','O Livro Dos Espiões ',2012,'literatura',1,'1',1,1),(13,'9788564065917','À Espera de Um Milagre ',2000,'literatura',1,'4',1,1),(14,'9788564065917','Matemática Financeira ',2000,'calculo',1,'9',1,1),(15,'9788539004799','1940 do Abismo À Esperança ',2013,'historia geral',1,'1',1,1),(16,'9788573027198\n','Veneno Antimonotonia ',2005,'poesia',1,'1',1,1),(17,'9788539001026\n','Evangelho De Barrabas ',2010,'religiao',4,'1',1,1),(18,'9788570018489','Reengenharia',1994,'administracao',1,'1',1,1),(19,'9788573025382','Como Conquistyar um ótimo Emprego',2001,'administracao',1,'3',1,1),(20,'978-85-325-3106-3','OS HÓSPEDES',2001,'ficcao',3,'1',1,1),(21,'9788573023382','Áustria Fatos e Números',1989,'turismo',3,'1',1,1),(22,'9788573023343','Manutenção Completa em Computadores',2000,'informatica',4,'1',1,1),(23,'9788537100141','Adobe Photoshop Cs - Guia Prático',2005,'informatica',4,'2',1,1),(24,'9788537100128','Novo Hamburgo: o Florescente Município do Vale do Rio dos Sinos',2016,'historia',5,'2',1,1),(25,'978-85-7522-647-6','Aplicativos & Software',2016,'informatica',2,'5',1,1),(26,'978-85-7522-514-1','	\nMoodle 3 para gestores, autores e tutores',2016,'informatica',2,'8',1,1),(27,'978-85-7522-443-4','	\nMoodle 3 para gestores, autores e tutores',2015,'informatica',2,'10',1,1);
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
INSERT INTO `livro_has_autor` VALUES (9,7),(9,8),(9,9),(9,11),(9,14),(10,7),(10,10),(11,7),(11,8),(11,9),(11,10),(12,2),(12,10),(12,13),(12,14),(13,10),(13,12),(14,2),(14,7),(14,10),(14,13),(15,1),(15,4),(15,5),(15,6),(15,8),(15,9),(15,10),(15,12),(15,13),(15,14),(16,1),(16,2),(16,4),(16,8),(16,10),(17,4),(17,7),(18,8),(18,13),(19,3),(19,8),(20,2),(20,5),(20,7),(20,14),(21,1),(21,2),(21,3),(21,4),(22,3),(22,6),(22,7),(22,8),(22,10),(22,12),(22,13),(22,14),(23,2),(23,5),(23,10),(23,11),(23,12),(24,1),(24,6),(24,9),(24,10),(24,13),(25,3),(25,8),(25,11),(25,14),(26,2),(26,3),(26,10),(26,11),(26,13),(27,2),(27,3),(27,4),(27,10),(27,13);
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
  `patrimonio_status` tinyint(1) NOT NULL,
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
INSERT INTO `patrimonio` VALUES (10248292,21,0),(10490630,23,0),(10510972,20,0),(10604898,19,0),(10836892,12,0),(10885489,10,0),(10958756,27,0),(11073169,21,0),(11341058,11,0),(11618523,27,0),(11636237,27,0),(11955547,26,0),(12067108,25,0),(12360606,18,0),(12731872,21,0),(13089643,25,0),(13587651,22,0),(13610001,25,0),(13810760,26,0),(14233638,17,0),(14305132,13,0),(14428864,13,0),(14442099,11,0),(15062274,9,0),(15500267,18,0),(16461240,23,0),(16674622,22,0),(17152414,24,0),(18338875,21,0),(18467772,19,0),(18514294,18,0),(18612412,17,0),(18723436,18,0),(18727745,23,0),(19341282,16,0),(20040664,14,0),(20469404,22,0),(20479665,24,0),(20851881,19,0),(20912703,20,0),(21406701,19,0),(21408196,16,0),(21698052,11,0),(21778945,26,0),(22021347,16,0),(22335597,24,0),(22808725,15,0),(22918149,11,0),(23423653,23,0),(23735212,22,0),(24128225,12,0),(24285494,23,0),(24558863,22,0),(24576051,14,0),(25563307,26,0),(26322769,20,0),(26709227,20,0),(26748004,22,0),(27395057,26,0),(27398549,11,0),(27694435,16,0),(28403205,16,0),(28497247,24,0),(28741704,22,0),(28838278,19,0),(29134385,11,0),(29598810,18,0),(29647817,27,0),(29877647,25,0),(29966459,27,0),(30200801,18,0),(30221827,17,0),(30581863,14,0),(30620552,19,0),(30963283,21,0),(31126857,14,0),(32182926,12,0),(32948362,21,0),(33106390,21,0),(33108149,24,0),(33225864,20,0),(33403396,27,0),(33652303,12,0),(33985025,21,0),(34001737,10,0),(34283677,9,0),(34624139,16,0),(35138158,16,0),(35556645,14,0),(35887956,10,0),(36031392,17,0),(36149210,16,0),(36212449,12,0),(36527558,23,0),(37236563,13,0),(37552791,15,0),(37641489,26,0),(37862254,27,0),(37864211,19,0),(37991424,27,0),(38453925,16,0),(38466474,11,0),(38530553,15,0),(38565943,9,0),(38942979,24,0),(39074647,19,0),(39227781,18,0),(39763174,21,0),(40252733,27,0),(40304506,11,0),(40316709,12,0),(40445059,18,0),(40831623,26,0),(40834538,25,0),(40981105,9,0),(41068026,18,0),(41547561,20,0),(42259716,27,0),(43395299,10,0),(44113414,15,0),(44209127,27,0),(45295617,24,0),(45546899,20,0),(45947596,25,0),(46497818,12,0),(48165778,21,0),(48306949,22,0),(48468371,19,0),(48718423,26,0),(49844467,27,0),(49940680,23,0),(50066664,24,0),(50189050,15,0),(50634203,12,0),(51415713,22,0),(51971856,19,0),(52711953,20,0),(52843632,14,0),(52861256,17,0),(52956410,17,0),(52983290,16,0),(53039702,25,0),(53765922,23,0),(53931947,24,0),(54149749,10,0),(54336547,15,0),(54413387,25,0),(54865496,11,0),(55144054,18,0),(55406362,11,0),(55591849,12,0),(55780670,15,0),(56501846,12,0),(56668515,12,0),(56907560,16,0),(57561773,27,0),(57581205,21,0),(57947894,16,0),(58402962,26,0),(59406951,19,0),(59652586,11,0),(59792006,26,0),(60288341,12,0),(60537433,10,0),(60651224,21,0),(60661296,23,0),(60793141,27,0),(60924332,11,0),(61014426,27,0),(61021547,20,0),(61137165,19,0),(61278294,21,0),(61821340,22,0),(61949430,27,0),(62096330,16,0),(62190059,19,0),(63003682,16,0),(63639911,24,0),(63915653,24,0),(63934892,13,0),(64098819,19,0),(64405847,16,0),(64550885,22,0),(64576382,27,0),(64848564,27,0),(65005046,11,0),(66181796,11,0),(66367013,11,0),(67318443,20,0),(67406950,27,0),(67412270,26,0),(67565084,16,0),(67653475,13,0),(67849717,26,0),(68104930,14,0),(68518507,13,0),(68568548,27,0),(69099970,9,0),(69257472,20,0),(69313960,9,0),(69358262,24,0),(69517126,20,0),(70073037,19,0),(70391425,15,0),(71018168,24,0),(71054408,19,0),(71094170,18,0),(71210788,15,0),(71377199,24,0),(71645217,18,0),(72281395,23,0),(72857249,18,0),(73032671,25,0),(73067273,11,0),(73508971,14,0),(73994418,26,0),(74222162,13,0),(74649408,9,0),(75423102,21,0),(76023015,10,0),(76643837,9,0),(76841284,23,0),(76983508,24,0),(77035743,24,0),(77471980,11,0),(77760595,10,0),(77937696,13,0),(78175924,16,0),(78592431,9,0),(79098787,22,0),(79253886,23,0),(79301701,15,0),(80726716,13,0),(80879614,15,0),(81062214,26,0),(82745584,23,0),(82749946,18,0),(82827818,12,0),(83131885,18,0),(83232020,26,0),(83393893,9,0),(83727437,27,0),(84619112,9,0),(84968363,12,0),(85298853,20,0),(85370562,27,0),(85413604,22,0),(85546394,17,0),(85829764,14,0),(86242075,25,0),(86334677,25,0),(87831636,12,0),(87851102,19,0),(88232163,10,0),(88365159,9,0),(88422073,22,0),(88963880,24,0),(89307664,16,0),(89528047,23,0),(89550950,26,0),(90152553,12,0),(90210577,18,0),(90642158,20,0),(90658982,14,0),(91483114,24,0),(91510477,19,0),(91701838,18,0),(91753941,14,0),(91809650,20,0),(92079083,12,0),(92475535,15,0),(92628754,11,0),(92954526,11,0),(93060582,16,0),(93338504,16,0),(93374162,21,0),(93401310,12,0),(93792980,10,0),(93837571,9,0),(95198112,23,0),(95409319,18,0),(95435075,19,0),(95607200,20,0),(96027529,25,0),(96359324,9,0),(96615306,21,0),(96792777,23,0),(96810663,24,0),(97360766,19,0),(98020101,18,0),(98157541,20,0),(98465352,13,0),(98684083,21,0),(98738163,11,0),(98833268,16,0),(99190235,26,0),(99591823,26,0),(99744278,19,0),(99836048,25,0),(99942485,17,0);
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
  CONSTRAINT `fk_senha_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `senha`
--

LOCK TABLES `senha` WRITE;
/*!40000 ALTER TABLE `senha` DISABLE KEYS */;
INSERT INTO `senha` VALUES (10,'TBS83HNZ2WY','2018-06-26',10),(12,'XIZ67RZH7LQ','2018-06-26',10),(13,'NSL78OCA8ZU','2018-06-26',11),(14,'KHF94GIF4UL','2018-06-27',12),(15,'LNY39ILA1BI','2018-06-25',13),(16,'PZY84NBP7DK','2018-06-29',14),(17,'DYQ31DBO6DC','2018-06-29',15),(18,'PEN87RIH3WO','2018-06-26',16),(19,'JER48BRD7ZF','2018-06-24',17),(20,'EFT98ARE5GB','2018-06-24',18),(21,'JDW05OPL1ZH','2018-06-26',19),(22,'UKY88VVE9IM','2018-06-26',20),(23,'BZK16MMZ0IG','2018-06-25',21),(24,'DVT37LBD3JZ','2018-06-26',22),(25,'GYH16QSA0IF','2018-06-30',23),(26,'KIM80CYL8ED','2018-06-26',24),(27,'VWD02MHP4VZ','2018-06-24',25),(28,'HSV42SBN7VY','2018-06-27',26),(29,'XKF89IBS3RB','2018-06-26',27),(30,'UCE57UDW0KC','2018-06-25',28),(31,'RXE75HDT8VE','2018-06-24',29),(32,'BHY54IUW1UD','2018-06-28',30),(33,'UMF16BIP1QP','2018-06-30',31),(34,'OYD68MGW4BR','2018-06-27',32),(35,'WHM48JFL5UC','2018-06-27',33),(36,'RFM56SPO8RB','2018-06-29',34),(37,'LAZ14NGU5NS','2018-06-25',35),(38,'HHT04AJI9FA','2018-06-24',36),(39,'TSB33CNC6UG','2018-06-24',37),(40,'SKB21RPE4UH','2018-06-30',38),(41,'UAA28XZH3YF','2018-06-30',39),(42,'CNC39MDM4SM','2018-06-27',40),(43,'TZD86MQC1GR','2018-06-24',41),(44,'GUX81CET0UR','2018-06-29',42),(45,'AVM52YHC2JP','2018-06-29',43),(46,'KIB33LYN5JL','2018-06-24',44),(47,'WKY13HLN9WV','2018-06-29',45),(48,'DTD34RNO3JT','2018-06-26',46),(49,'XCO67HIZ2WA','2018-06-30',47),(50,'HLD49NNM4RL','2018-06-30',48),(51,'DPD44KCH1ZI','2018-06-29',49),(52,'FCM52AFZ5NV','2018-06-27',50),(53,'VRF34CMI1EU','2018-06-24',51),(54,'CYO67CUI3SR','2018-06-25',52),(55,'NDI81SMS7XZ','2018-06-24',53),(56,'OCU53PEF2UM','2018-06-24',54),(57,'QLV64AOG0CR','2018-06-25',55),(58,'RBF67FPL4BF','2018-06-26',56),(59,'JPT48RAK8NR','2018-06-29',57),(60,'YRJ59UKR4SG','2018-06-28',58),(61,'VSR01YCU8BK','2018-06-25',59),(62,'IVC50EKO0ZR','2018-06-28',60),(63,'PXI50AKE0KK','2018-06-26',61),(64,'TEC09WAI7UB','2018-06-27',62),(65,'CCP88CCO3IB','2018-06-25',63),(66,'KPI65MRI3NF','2018-06-26',64),(67,'KNE70JOP9MI','2018-06-25',65),(68,'WCS10UHM6GB','2018-06-29',66),(69,'XSH08HHW8QI','2018-06-28',67),(70,'ATB67WUL6XM','2018-06-28',68),(71,'LVG89KHT9FC','2018-06-27',69),(72,'NYI96FIV9BH','2018-06-25',70),(73,'IWW62YTC4JC','2018-06-27',71),(74,'GKC97NQH8OS','2018-06-30',72),(75,'VVR27ZZG7PM','2018-06-26',73),(76,'UNP74LDT0MU','2018-06-28',74),(77,'NFX11FPR7CU','2018-06-26',75),(78,'RGA97VVQ0MT','2018-06-24',76),(79,'ELA18ZKU1RO','2018-06-28',77),(80,'IEZ85DWM9LA','2018-06-30',78),(81,'SPU63SMT4VS','2018-06-28',79),(82,'TKW24EKE1UR','2018-06-28',80),(83,'WAO75ZBM2JF','2018-06-28',81),(84,'IHF10MCW6JK','2018-06-24',82),(85,'TPY16CYO8WH','2018-06-27',83),(86,'QNG08RIE0PV','2018-06-29',84),(87,'MHN95CXK5RL','2018-06-30',85),(88,'GFO45YFT4NG','2018-06-28',86),(89,'IUT23VOR2RA','2018-06-26',87),(90,'XFE83KRP9CU','2018-06-26',88),(91,'YZL91ZJT7FQ','2018-06-28',89),(92,'IMP83GVW1AK','2018-06-26',90),(93,'VKA99OFY3RX','2018-06-24',91),(94,'EXU88FNU7WV','2018-06-29',92),(95,'DCQ24NYQ8FI','2018-06-25',93),(96,'ULY35WLV6ZY','2018-06-24',94),(97,'VNN38QJT1YU','2018-06-29',95),(98,'MGA46NAE9KX','2018-06-25',96),(99,'UWN38RME0JA','2018-06-30',97),(100,'RVJ95TEX8LS','2018-06-29',98),(101,'CSZ65VTN6DR','2018-06-24',99),(102,'TVD98FXO9RD','2018-06-28',100),(103,'ROD07ORN8EH','2018-06-29',101),(104,'XJP26LDL4VU','2018-06-30',102),(105,'XTP05MSB9KO','2018-06-28',103),(106,'LWC14XHO2KS','2018-06-27',104),(107,'RHL94QML1FF','2018-06-26',105),(108,'NQW56WXA5CP','2018-06-24',106),(109,'OGA49GAT6JC','2018-06-25',107),(110,'NKV71NSV9NJ','2018-06-25',108),(111,'LNZ29UEK0NQ','2018-06-29',109),(122,'qwer1234','2018-07-07',120),(123,'qwer1234','2018-07-07',121),(125,'qwer1234','2018-07-07',124),(126,'qwer1234','2018-07-07',125),(127,'qwer1234','2018-07-07',126),(128,'asdf12345','2018-07-07',127),(129,'asdf12345','2018-07-07',128),(130,'asdf12345','2018-07-07',129),(131,'asdf12345','2018-07-07',130);
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
) ENGINE=InnoDB AUTO_INCREMENT=306 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (6,'2017-03-02','2018-09-21',15,4),(7,'2017-09-02','2019-01-01',28,5),(8,'2018-03-29','2017-06-03',25,3),(9,'2017-07-25','2017-03-16',33,3),(10,'2018-05-30','2018-11-01',9,3),(11,'2018-01-10','2019-03-08',25,3),(12,'2018-07-02','2019-03-17',33,4),(13,'2017-08-23','2019-06-21',13,3),(14,'2017-04-14','2018-07-16',17,4),(15,'2017-07-08','2019-06-08',27,2),(16,'2017-04-25','2018-09-26',17,3),(17,'2017-01-10','2017-08-23',15,3),(18,'2017-05-19','2018-12-21',15,5),(19,'2018-04-16','2019-01-21',26,3),(20,'2018-01-26','2018-02-16',28,4),(21,'2017-09-12','2018-01-13',10,2),(22,'2017-06-10','2018-06-15',11,2),(23,'2018-03-19','2017-12-14',25,3),(24,'2017-05-06','2017-05-02',24,4),(25,'2017-12-17','2017-08-05',23,2),(26,'2017-04-28','2019-03-17',33,2),(27,'2017-06-24','2018-04-28',9,3),(28,'2017-10-17','2019-02-08',26,2),(29,'2017-03-10','2017-10-13',11,5),(30,'2017-12-11','2019-02-08',15,2),(31,'2018-04-30','2017-11-14',20,4),(32,'2018-05-23','2019-06-21',23,2),(33,'2017-10-26','2018-02-03',21,3),(34,'2017-07-28','2017-03-26',21,3),(35,'2017-11-23','2017-05-02',23,5),(36,'2017-06-22','2017-08-22',21,5),(37,'2018-05-27','2017-06-29',33,2),(38,'2017-01-30','2018-12-17',17,4),(39,'2017-02-14','2018-12-27',13,5),(40,'2018-02-09','2017-06-10',10,3),(41,'2017-03-10','2017-11-03',31,5),(42,'2017-06-16','2018-05-15',7,3),(43,'2017-11-12','2017-04-03',24,2),(44,'2018-03-13','2018-12-31',26,5),(45,'2017-11-02','2019-06-06',26,2),(46,'2017-06-08','2017-09-04',18,4),(47,'2018-02-24','2018-07-17',20,4),(48,'2017-10-01','2019-02-14',26,4),(49,'2017-11-23','2018-11-23',11,4),(50,'2017-08-23','2018-06-11',12,2),(51,'2017-01-26','2019-04-01',16,5),(52,'2017-04-01','2018-10-12',33,5),(53,'2017-03-18','2018-09-16',19,3),(54,'2017-10-30','2017-09-05',21,5),(55,'2017-01-08','2017-08-01',27,4),(56,'2017-06-14','2018-06-28',10,4),(57,'2017-08-30','2019-04-13',26,4),(58,'2018-06-07','2019-04-26',15,2),(59,'2017-01-24','2018-10-09',33,4),(60,'2017-08-01','2018-11-20',31,2),(61,'2017-01-21','2019-01-27',29,4),(62,'2018-06-16','2018-05-28',25,4),(63,'2018-05-12','2018-08-20',20,5),(64,'2017-04-10','2017-09-10',27,5),(65,'2018-04-27','2018-06-27',10,2),(66,'2017-07-07','2018-01-02',17,5),(67,'2017-02-20','2019-03-29',11,3),(68,'2017-10-04','2017-04-01',7,2),(69,'2017-08-05','2018-12-06',24,2),(70,'2018-05-03','2017-12-21',16,4),(71,'2017-08-09','2017-06-09',23,5),(72,'2018-05-08','2017-03-15',20,5),(73,'2017-04-22','2018-11-16',17,4),(74,'2017-10-06','2018-10-12',13,2),(75,'2017-10-30','2018-10-03',21,3),(76,'2018-03-26','2017-07-24',31,4),(77,'2017-02-27','2018-04-07',20,2),(78,'2017-05-01','2018-07-04',18,3),(79,'2017-09-11','2019-01-11',13,2),(80,'2018-06-19','2017-10-26',33,3),(81,'2017-07-25','2017-05-19',11,2),(82,'2017-11-13','2018-06-16',11,4),(83,'2017-04-20','2018-10-29',12,4),(84,'2017-04-09','2018-08-18',30,4),(85,'2017-01-16','2017-08-27',30,5),(86,'2017-05-24','2018-01-13',14,3),(87,'2017-07-30','2017-03-29',26,2),(88,'2017-04-01','2018-04-29',20,3),(89,'2018-06-17','2017-11-30',29,5),(90,'2018-07-02','2019-04-01',18,5),(91,'2017-01-03','2019-05-08',13,5),(92,'2017-01-07','2017-11-30',21,4),(93,'2017-12-20','2017-09-21',18,4),(94,'2017-10-03','2018-07-27',26,5),(95,'2018-04-19','2018-08-05',27,5),(96,'2017-11-24','2018-12-14',32,4),(97,'2017-07-15','2017-12-04',31,4),(98,'2017-12-17','2019-02-24',25,2),(99,'2018-05-10','2017-11-06',16,2),(100,'2018-03-11','2019-05-04',23,4),(101,'2017-08-23','2017-10-18',25,4),(102,'2017-08-24','2018-06-16',21,2),(103,'2018-01-29','2017-10-13',25,3),(104,'2018-05-10','2018-03-24',11,2),(105,'2017-06-11','2017-03-16',23,3),(106,'2017-10-04','2018-07-24',25,5),(107,'2017-03-12','2017-06-25',26,5),(108,'2017-03-06','2019-02-20',20,5),(109,'2017-08-29','2018-12-19',20,5),(110,'2017-08-28','2017-10-03',22,5),(111,'2017-01-09','2019-06-06',24,5),(112,'2018-06-01','2018-11-14',11,2),(113,'2017-01-08','2017-10-21',15,5),(114,'2017-11-12','2018-01-16',30,4),(115,'2017-06-20','2017-10-15',7,4),(116,'2017-06-23','2019-02-10',32,4),(117,'2017-04-06','2018-01-14',29,2),(118,'2017-06-21','2017-09-01',14,5),(119,'2018-03-30','2018-06-09',24,3),(120,'2017-07-20','2018-08-23',33,2),(121,'2018-04-05','2017-08-20',30,2),(122,'2017-08-23','2017-08-01',8,2),(123,'2018-06-08','2019-06-22',14,3),(124,'2017-09-04','2019-06-20',11,5),(125,'2018-05-22','2017-06-30',33,3),(126,'2018-02-26','2018-09-24',26,2),(127,'2018-04-22','2018-03-10',32,5),(128,'2017-04-12','2019-01-01',33,3),(129,'2017-11-14','2019-07-03',21,3),(130,'2017-02-22','2019-01-19',30,2),(131,'2017-07-07','2018-02-12',18,5),(132,'2018-06-04','2017-05-27',27,3),(133,'2018-04-10','2018-03-15',22,2),(134,'2018-04-22','2019-02-02',17,3),(135,'2018-01-23','2017-08-27',7,2),(136,'2017-05-31','2018-06-18',29,5),(137,'2017-12-23','2019-02-13',8,2),(138,'2018-05-08','2018-08-24',23,3),(139,'2017-09-15','2019-03-24',31,4),(140,'2017-04-28','2017-03-18',24,2),(141,'2017-03-04','2018-05-02',27,3),(142,'2017-09-15','2019-02-08',8,4),(143,'2017-01-03','2018-12-29',24,3),(144,'2017-03-13','2019-03-05',32,4),(145,'2018-01-03','2017-12-10',17,4),(146,'2018-01-21','2017-11-23',23,5),(147,'2017-01-20','2019-02-04',21,2),(148,'2018-06-02','2018-03-30',30,2),(149,'2017-09-25','2019-04-22',32,3),(150,'2017-12-28','2018-07-10',11,5),(151,'2017-08-06','2018-10-29',16,2),(152,'2017-12-27','2018-06-10',9,2),(153,'2018-03-22','2018-09-26',11,4),(154,'2017-04-04','2018-09-19',25,4),(155,'2017-08-04','2019-05-07',10,2),(156,'2017-09-04','2017-10-17',30,2),(157,'2018-06-05','2018-11-27',20,4),(158,'2018-07-03','2018-11-26',21,3),(159,'2017-06-10','2019-06-13',31,2),(160,'2017-02-07','2018-02-25',33,3),(161,'2018-02-18','2017-07-01',11,4),(162,'2017-05-09','2017-08-07',14,4),(163,'2017-05-27','2017-06-14',20,3),(164,'2018-04-15','2018-01-20',25,2),(165,'2017-09-18','2018-07-30',32,2),(166,'2017-02-01','2017-07-16',20,2),(167,'2017-07-19','2018-10-16',18,5),(168,'2018-03-18','2017-08-17',13,4),(169,'2017-05-20','2017-08-05',20,5),(170,'2017-02-07','2018-08-03',19,5),(171,'2017-12-09','2019-04-30',7,2),(172,'2017-02-06','2017-12-11',27,3),(173,'2018-05-05','2018-01-05',22,4),(174,'2017-07-31','2018-10-24',33,3),(175,'2017-06-01','2018-12-13',19,3),(176,'2017-02-25','2017-05-01',16,5),(177,'2018-04-25','2017-08-11',19,5),(178,'2017-08-25','2019-02-13',30,3),(179,'2017-05-06','2017-07-09',25,3),(180,'2017-05-25','2019-04-23',8,3),(181,'2018-05-04','2019-05-25',33,3),(182,'2018-04-18','2017-04-23',27,4),(183,'2017-11-23','2019-03-02',14,5),(184,'2017-05-14','2017-08-03',8,5),(185,'2017-01-06','2017-08-27',17,5),(186,'2018-01-27','2018-06-20',10,4),(187,'2017-11-19','2019-02-12',13,2),(188,'2018-05-21','2017-06-09',14,5),(189,'2017-01-28','2019-02-19',23,3),(190,'2017-06-17','2017-09-11',17,3),(191,'2018-05-09','2017-09-27',22,2),(192,'2017-02-05','2018-10-11',7,4),(193,'2017-11-01','2017-12-13',21,5),(194,'2017-01-04','2018-04-30',24,5),(195,'2017-06-04','2019-02-02',30,5),(196,'2017-02-14','2018-03-21',21,4),(197,'2017-05-08','2018-05-11',16,3),(198,'2017-07-07','2019-05-25',28,2),(199,'2017-05-30','2017-10-11',19,4),(200,'2018-02-10','2018-05-16',19,2),(201,'2017-08-09','2018-11-03',14,3),(202,'2017-12-20','2018-04-18',28,4),(203,'2018-02-28','2017-05-05',24,4),(204,'2017-12-04','2019-02-11',7,3),(205,'2017-03-31','2017-04-04',31,3),(206,'2017-01-17','2018-03-09',19,4),(207,'2017-12-15','2017-07-02',14,5),(208,'2017-09-01','2018-10-29',15,3),(209,'2018-01-14','2018-02-12',14,5),(210,'2018-05-07','2018-01-27',32,5),(211,'2017-04-19','2018-06-13',21,2),(212,'2017-11-08','2018-04-22',12,5),(213,'2017-05-17','2019-02-18',16,2),(214,'2017-09-08','2018-10-16',25,5),(215,'2018-03-29','2018-07-09',24,5),(216,'2017-04-25','2017-11-22',18,4),(217,'2017-12-20','2018-07-23',9,2),(218,'2018-03-30','2017-07-19',26,2),(219,'2017-08-02','2018-08-10',12,5),(220,'2017-03-10','2017-06-15',16,2),(221,'2017-01-25','2018-08-23',9,2),(222,'2018-01-27','2018-05-15',18,2),(223,'2017-12-20','2018-07-31',33,2),(224,'2017-08-21','2019-03-01',16,4),(225,'2017-06-07','2018-03-22',26,4),(226,'2017-08-14','2019-06-16',18,3),(227,'2017-04-20','2019-05-10',27,3),(228,'2018-02-04','2018-12-29',11,5),(229,'2017-09-14','2018-09-20',15,3),(230,'2017-08-12','2018-12-31',8,2),(231,'2017-11-28','2017-05-02',17,3),(232,'2017-05-17','2018-10-02',32,4),(233,'2018-05-10','2018-03-18',8,5),(234,'2017-11-27','2019-05-12',26,4),(235,'2017-05-08','2017-07-27',12,2),(236,'2017-12-18','2019-04-09',22,3),(237,'2018-06-12','2018-04-07',14,3),(238,'2017-04-20','2017-04-17',21,5),(239,'2017-10-06','2019-05-06',7,5),(240,'2017-02-10','2017-12-02',14,2),(241,'2017-02-10','2017-07-14',18,4),(242,'2018-02-13','2017-07-11',26,4),(243,'2018-03-12','2019-02-08',25,2),(244,'2018-04-25','2017-07-04',18,4),(245,'2018-01-19','2019-04-27',14,4),(246,'2017-07-20','2018-09-14',8,5),(247,'2017-01-04','2019-05-25',9,4),(248,'2018-01-02','2019-01-27',10,3),(249,'2017-05-28','2017-09-22',33,3),(250,'2018-03-30','2018-04-16',19,2),(251,'2018-03-04','2019-06-02',33,3),(252,'2017-03-06','2019-02-01',18,2),(253,'2017-09-19','2019-06-04',32,2),(254,'2017-08-22','2019-03-14',33,4),(255,'2017-07-30','2018-08-20',16,3),(256,'2017-04-08','2019-05-25',16,4),(257,'2017-03-23','2018-05-16',8,3),(258,'2017-04-18','2018-02-21',29,3),(259,'2017-06-21','2019-05-12',23,5),(260,'2018-06-08','2018-04-12',30,2),(261,'2017-11-13','2019-03-23',12,3),(262,'2017-11-10','2017-10-13',26,4),(263,'2017-11-29','2018-06-26',19,3),(264,'2018-02-06','2017-08-29',11,5),(265,'2017-09-27','2018-10-23',19,4),(266,'2018-04-30','2018-01-13',10,5),(267,'2017-12-29','2018-10-20',29,4),(268,'2018-02-26','2017-04-22',8,2),(269,'2017-11-06','2017-04-27',24,5),(270,'2017-10-06','2019-05-29',9,4),(271,'2018-02-01','2019-03-03',31,5),(272,'2018-05-10','2017-12-24',10,3),(273,'2017-10-11','2019-06-30',31,3),(274,'2018-02-27','2019-02-23',27,4),(275,'2017-09-11','2017-08-30',13,4),(276,'2017-07-13','2018-01-05',23,2),(277,'2017-12-03','2017-09-22',22,4),(278,'2017-10-25','2017-12-11',21,5),(279,'2018-02-28','2019-01-15',32,4),(280,'2017-10-07','2018-12-25',29,5),(281,'2018-04-15','2018-10-09',18,2),(282,'2018-02-27','2019-04-14',30,2),(283,'2018-04-14','2019-01-03',7,2),(284,'2018-03-15','2017-07-21',19,3),(285,'2018-04-23','2019-04-24',13,5),(286,'2018-05-06','2017-07-12',9,4),(287,'2017-01-07','2019-02-20',20,5),(288,'2017-05-06','2017-05-14',23,5),(289,'2017-06-13','2017-07-23',33,3),(290,'2017-11-08','2017-10-13',19,5),(291,'2017-06-16','2017-07-30',10,5),(292,'2017-07-28','2018-01-25',31,2),(293,'2017-07-04','2018-10-19',32,2),(294,'2017-04-13','2017-09-16',30,4),(295,'2018-04-29','2018-03-07',16,2),(296,'2017-04-26','2017-04-01',18,5),(297,'2018-02-16','2018-03-01',15,3),(298,'2017-04-11','2018-07-12',11,5),(299,'2017-11-27','2019-04-09',20,5),(300,'2017-05-18','2018-11-22',17,2),(301,'2017-01-27','2019-03-31',14,5),(302,'2017-02-25','2017-11-24',15,2),(303,'2017-05-30','2018-07-08',21,4),(304,'2018-06-19','2017-06-07',21,3),(305,'2017-10-31','2019-05-30',8,4);
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
INSERT INTO `turma_has_aluno` VALUES (100558,92,117),(101673,136,147),(101700,264,185),(106679,239,167),(108775,171,133),(108945,244,111),(109775,59,123),(109842,150,158),(110079,147,157),(110480,158,178),(110620,112,118),(112642,244,150),(113985,104,145),(114171,202,164),(114818,32,154),(115630,254,164),(119119,163,188),(120989,104,149),(122612,78,140),(134335,279,196),(138457,171,160),(138770,71,143),(138864,252,144),(139228,238,147),(141956,239,132),(142552,61,137),(143001,250,146),(145078,9,120),(145336,276,116),(145433,35,164),(148173,211,176),(153064,190,121),(153258,91,130),(155096,273,156),(155622,231,159),(161068,71,163),(166168,227,177),(168077,138,194),(168319,66,170),(169448,77,142),(170959,9,125),(171008,8,172),(171086,207,121),(172001,31,129),(173118,98,143),(173576,280,173),(175381,109,182),(176970,143,187),(178089,214,135),(179440,67,185),(183570,134,187),(185492,110,117),(187507,105,153),(187758,212,195),(188266,24,145),(189834,242,176),(191647,259,157),(192199,23,195),(192638,92,195),(193396,204,111),(195221,75,144),(197921,125,179),(198804,262,197),(199179,218,141),(200700,203,195),(201043,59,172),(201839,206,141),(202799,164,137),(204551,180,161),(205855,209,181),(207040,294,181),(208642,229,123),(208654,255,178),(214038,275,115),(220067,258,156),(221507,286,144),(224168,111,142),(225347,263,130),(226194,207,128),(227515,302,183),(230054,261,173),(234954,93,114),(236282,174,175),(237995,225,147),(239913,278,166),(240838,141,126),(244756,284,128),(249735,46,116),(249787,110,149),(249911,37,138),(256857,258,160),(263241,185,115),(264556,230,136),(265543,17,110),(267146,305,122),(268276,303,121),(273954,125,118),(277848,17,140),(279720,179,143),(280030,6,136),(280801,249,196),(283878,107,131),(285499,107,115),(287493,231,144),(288607,65,129),(289108,269,134),(293221,108,114),(294049,259,120),(294883,14,196),(296207,40,164),(297370,113,110),(298535,300,198),(298705,259,175),(299102,257,123),(300840,108,142),(300922,166,120),(302953,226,161),(303824,305,118),(306810,102,185),(308238,144,176),(311710,208,147),(312577,219,163),(316638,212,129),(321686,299,153),(322180,110,165),(326038,131,194),(327133,71,196),(331858,36,198),(333367,39,144),(333657,161,179),(336074,42,135),(336543,171,152),(337254,176,176),(337481,287,158),(338801,287,109),(339510,202,168),(342217,97,152),(349085,63,187),(351936,59,189),(356209,179,117),(356739,230,146),(357169,98,183),(357738,53,114),(358222,285,151),(358813,195,161),(359073,11,136),(360295,31,113),(363347,178,170),(364711,140,121),(367991,39,131),(369335,26,115),(369623,303,113),(376491,254,142),(377538,108,120),(378824,202,122),(384844,179,118),(386160,274,195),(386677,266,119),(386993,115,160),(388574,297,140),(388604,26,110),(389991,295,135),(396489,195,190),(396944,18,122),(399348,32,193),(399352,191,182),(401390,260,114),(415290,181,129),(416825,151,142),(418234,264,184),(418362,114,153),(420766,278,148),(423717,230,189),(430122,131,179),(431237,208,197),(433263,25,135),(438799,141,131),(441280,153,140),(441469,302,199),(443809,35,163),(445162,302,188),(447552,108,131),(448321,219,186),(448445,222,125),(448649,106,181),(449226,160,116),(453248,210,151),(455994,126,116),(458528,241,199),(462157,251,170),(462694,54,121),(465877,39,146),(468180,74,136),(470343,149,136),(473162,291,196),(473953,12,176),(478726,181,164),(480492,104,196),(483512,273,142),(484886,297,142),(486749,107,156),(488689,115,120),(491065,232,146),(492879,45,121),(493893,104,141),(494252,53,183),(494291,183,181),(497276,85,166),(499100,277,165),(505519,55,150),(506305,240,131),(506987,283,188),(507292,146,164),(507397,84,149),(509877,141,142),(515236,231,170),(517288,75,131),(517575,68,111),(522404,102,179),(525464,268,132),(529368,152,144),(531223,158,174),(531881,147,117),(535083,196,168),(535526,108,132),(536353,273,164),(546129,273,165),(547512,32,162),(548299,286,143),(551291,12,183),(551699,126,133),(553472,251,137),(554255,34,157),(557078,224,109),(560179,156,165),(561768,18,116),(567735,281,122),(567896,247,184),(569430,158,198),(571046,285,174),(573265,152,143),(574297,267,128),(574597,253,121),(576717,52,122),(577039,77,177),(581754,163,187),(584713,102,125),(585084,111,164),(585092,7,114),(585776,78,186),(587875,113,162),(588837,256,150),(590171,127,125),(591079,190,165),(591190,63,119),(591656,172,120),(594412,39,140),(594694,24,139),(597375,255,138),(602934,185,166),(604972,56,180),(607101,299,151),(607172,175,121),(610510,59,133),(611449,266,135),(611690,104,198),(612217,297,111),(613600,231,194),(614332,291,142),(614950,58,121),(616634,141,168),(617333,41,120),(617775,45,184),(619209,118,188),(619810,248,167),(621585,243,184),(622618,249,112),(622783,54,141),(622857,268,109),(624201,52,135),(624624,197,134),(624716,156,126),(626470,91,182),(627875,62,186),(630854,280,153),(631434,227,186),(634710,92,192),(636419,95,192),(639196,81,147),(639678,74,159),(642382,305,194),(643636,151,117),(644410,16,136),(644742,287,118),(646842,136,192),(648173,300,160),(648853,36,153),(649441,123,186),(653334,103,111),(655259,71,139),(655467,179,192),(657422,138,122),(662137,20,144),(662843,50,178),(663204,40,133),(663301,263,118),(664422,22,166),(664551,301,175),(666442,208,198),(667238,61,176),(668956,294,145),(671134,241,136),(672047,236,180),(675076,266,116),(675247,272,152),(675960,112,139),(676120,139,167),(676638,180,131),(677570,138,152),(677801,303,118),(679227,51,147),(682227,301,189),(682754,269,170),(683831,280,179),(687268,108,194),(687616,257,155),(688977,201,129),(689581,102,116),(691458,217,197),(692041,94,162),(693693,301,176),(695036,41,134),(698233,102,134),(698824,273,169),(700682,96,140),(701444,127,152),(703255,41,136),(704479,6,184),(706696,227,168),(710208,156,151),(711135,168,112),(711733,123,135),(713112,208,126),(718075,292,158),(721073,261,135),(723991,119,196),(726683,263,166),(727963,104,134),(728004,45,127),(728362,92,172),(729576,88,180),(729647,24,137),(730648,89,160),(731546,272,176),(731806,220,184),(731828,198,142),(732722,44,176),(737853,171,170),(740176,54,161),(743987,292,180),(745770,98,188),(747952,51,169),(748221,94,157),(750219,58,196),(751640,96,160),(757663,25,175),(759663,219,142),(760991,186,117),(762733,6,169),(762734,46,138),(765768,233,199),(767232,207,126),(768930,201,156),(772160,191,148),(772327,152,137),(780909,216,174),(780928,105,121),(783423,38,181),(784911,167,116),(786224,57,177),(790091,177,126),(793383,205,123),(794468,160,127),(803712,299,155),(804682,281,166),(810059,109,167),(810170,166,175),(811131,9,122),(811652,198,143),(811890,173,119),(813715,261,194),(814348,162,162),(817959,286,179),(818073,148,129),(821950,56,181),(825482,60,161),(826579,125,177),(828497,57,115),(828673,18,119),(830037,206,137),(830367,122,168),(830522,257,159),(830751,178,164),(832070,54,112),(833171,78,160),(833542,108,173),(834792,20,185),(840808,139,153),(842895,217,172),(847072,258,135),(847591,20,161),(847906,22,188),(850048,16,199),(851789,68,191),(853324,303,179),(856340,215,169),(856415,228,169),(858844,125,192),(860459,88,146),(860903,277,149),(862196,22,124),(866046,121,143),(867675,134,179),(867948,73,160),(873403,73,120),(874936,40,132),(883115,131,180),(884340,49,135),(885404,175,174),(888945,276,163),(890171,285,186),(893234,56,135),(895412,298,155),(896613,173,190),(899466,46,169),(903025,281,179),(903350,139,194),(904305,112,140),(906424,246,188),(907239,99,186),(908158,289,126),(908804,157,162),(910785,173,159),(912179,83,143),(913572,9,136),(914104,101,176),(914748,260,177),(915387,32,170),(915553,62,143),(915891,272,131),(915899,164,172),(920856,39,171),(921894,203,185),(923618,280,191),(924014,202,116),(926022,28,197),(926148,113,134),(927073,16,162),(931107,211,186),(934957,36,135),(935047,55,124),(935687,102,145),(936456,147,115),(938073,229,180),(938136,56,164),(939630,32,187),(940801,213,165),(940998,297,149),(946774,237,157),(947107,184,124),(947174,40,184),(950101,104,172),(950349,50,198),(951757,70,190),(952618,116,171),(954094,209,129),(954288,280,114),(958399,47,187),(959412,135,131),(960590,206,163),(963237,245,189),(965256,114,191),(966452,14,127),(969213,40,133),(971481,22,110),(972046,181,127),(973025,93,136),(973371,94,134),(973568,278,169),(975581,273,145),(978237,299,140),(979515,204,143),(982946,176,198),(983791,56,172),(985413,146,137),(987049,235,181),(995143,210,189),(995523,61,196),(996412,233,169),(998753,166,169);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES (2,'Matutino'),(3,'Vespertino'),(4,'Noturno'),(5,'Integral');
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
  CONSTRAINT `fk_usuario_endereco1` FOREIGN KEY (`endereco_idendereco`) REFERENCES `endereco` (`idendereco`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (10,'Ariel Wolfe','16740324958',5093124226,75634787393,'Integer.aliquam@odioNam.com','2002-06-06',0,'2018-05-02','2018-05-11',1),(11,'Ora Gaines','16070828850',4133835655,97115692565,'dignissim@convallisestvitae.ca','1996-07-29',1,'2018-06-28','2018-05-12',2),(12,'Carla Morales','16931208837',458540075,59907174415,'ut@sapienimperdietornare.net','1992-12-15',1,'2018-06-09','2018-06-14',3),(13,'Lydia Golden','16430911321',5854180290,88559683024,'lobortis.mauris@semperNam.co.uk','2001-05-22',0,'2018-03-26','2018-06-30',4),(14,'Wade Griffin','16840912411',2349547914,30858682510,'a@amet.org','1992-12-23',0,'2018-04-08','2018-06-14',5),(15,'Stephen Walker','16030827871',1636415851,7053665691,'In.mi.pede@consequatdolorvitae.net','1997-12-26',0,'2018-03-05','2018-05-25',6),(16,'Arsenio Baxter','16590915218',2683545547,49180773983,'tortor@mi.edu','1991-10-22',0,'2018-05-17','2018-05-16',7),(17,'India Blankenship','16610221932',5814284496,73474069613,'ac@Nunclaoreetlectus.ca','1997-12-30',0,'2018-05-18','2018-06-17',8),(18,'Tyrone Simpson','16101209523',7055955027,21758559513,'pretium.aliquet@erat.edu','1998-03-08',1,'2018-06-24','2018-06-10',9),(19,'Taylor Carey','16560920306',3301622678,74771653076,'bibendum.sed@adipiscing.org','1995-03-23',0,'2018-05-17','2018-04-06',10),(20,'Burton Moon','16740802483',3857196836,87892086229,'eget.nisi@tinciduntnibh.ca','1996-02-28',0,'2018-06-05','2018-03-29',11),(21,'Shana Holloway','16540627363',3337364305,72927770338,'auctor@natoque.org','1993-04-24',1,'2018-04-16','2018-03-26',12),(22,'Castor Dillard','16001202906',5150208543,6987531450,'mi.pede.nonummy@etmagnis.co.uk','1991-09-30',1,'2018-04-19','2018-03-03',13),(23,'Teegan Woods','16971229852',3454806137,994112141,'dolor@Phasellus.com','2000-12-12',1,'2018-06-09','2018-04-18',14),(24,'Micah Santos','16240212953',9720277049,37165340208,'ligula@tinciduntadipiscingMauris.ca','2001-09-09',0,'2018-06-20','2018-05-19',15),(25,'Casey Russo','16770207390',7558005791,16192359708,'montes.nascetur.ridiculus@eutellus.co.uk','1996-06-27',1,'2018-05-01','2018-03-30',16),(26,'Baker Mathews','16150316720',1297153833,62443985214,'Donec.nibh.Quisque@pedesagittis.com','1993-05-14',1,'2018-06-23','2018-06-24',17),(27,'Denise Roth','16701012068',6643750855,99488105189,'vel@elitAliquam.com','2001-05-10',1,'2018-05-20','2018-06-24',18),(28,'Christopher Ramirez','16680501870',4044706709,91624694763,'ullamcorper.eu@nostraperinceptos.com','1990-02-23',0,'2018-06-19','2018-03-22',19),(29,'Nolan Vaughn','16261216376',5568759036,31752628638,'elementum.sem@id.org','1990-10-15',0,'2018-05-11','2018-06-06',20),(30,'Clementine Foley','16121018679',9814008810,44943023028,'adipiscing.ligula@PhasellusnullaInteger.ca','1995-02-03',1,'2018-03-05','2018-04-13',21),(31,'Chiquita Hyde','16691014758',1471546639,25575297106,'pede.ac@lorem.co.uk','1996-10-07',1,'2018-04-10','2018-03-19',22),(32,'Donna Lawrence','16850620278',681721338,87887355547,'tempus.risus.Donec@estacmattis.ca','2000-06-20',0,'2018-06-11','2018-05-16',23),(33,'Britanni Watson','16281114191',7176807715,38627692429,'mi.felis@Crasvehicula.net','1995-03-08',0,'2018-05-13','2018-04-07',24),(34,'Preston Sanford','16060523625',6666134286,77295857794,'ante.iaculis.nec@lorem.net','1993-09-02',1,'2018-06-22','2018-06-15',25),(35,'Rudyard Powell','16890324739',6911778630,12675791422,'eu.elit@adipiscing.net','1999-11-09',1,'2018-06-27','2018-03-16',26),(36,'George Buckner','16840826434',2863536790,10389098681,'bibendum@massaVestibulum.co.uk','1997-11-01',0,'2018-03-06','2018-04-23',27),(37,'Lewis Burks','16020318325',656303081,4029493786,'est.arcu.ac@Cras.ca','1999-08-10',0,'2018-04-26','2018-03-13',28),(38,'Raymond Gould','16770330140',1840703334,88835518592,'tellus.id.nunc@metusVivamuseuismod.net','1999-03-25',0,'2018-04-07','2018-04-05',29),(39,'Carl Parsons','16950123604',6808358833,19376784351,'rhoncus@lectusrutrum.org','1998-07-22',1,'2018-03-23','2018-06-06',30),(40,'Rashad Nash','16080326503',7097331283,96423700710,'lectus@temporloremeget.co.uk','1993-06-05',1,'2018-05-04','2018-03-06',31),(41,'Maia Herman','16400304663',3150360278,91642183283,'ligula.consectetuer.rhoncus@Etiam.co.uk','2002-04-04',1,'2018-06-25','2018-05-24',32),(42,'Fitzgerald Riley','16180804960',8978935781,81289111455,'a.nunc@egestas.ca','1992-03-22',1,'2018-06-14','2018-03-01',33),(43,'Lilah Roach','16380529579',9873195672,43965985856,'enim@risus.net','1995-09-25',0,'2018-04-16','2018-03-18',34),(44,'Rhiannon Sherman','16150204066',1741649654,86946204153,'Vivamus@tristique.com','1991-06-05',1,'2018-06-15','2018-03-02',35),(45,'Murphy Noble','16251203641',7742526951,59110241532,'pede.ac.urna@pede.net','2000-08-29',0,'2018-03-04','2018-03-13',36),(46,'Cade Hines','16960807283',2121972391,62346984134,'neque@Nullaeu.ca','1997-02-04',0,'2018-05-30','2018-03-30',37),(47,'Noel Williams','16750710070',9159321629,24020921573,'et.arcu@felis.com','1998-04-14',0,'2018-05-06','2018-03-13',38),(48,'James Carpenter','16080215651',4791320681,77395326597,'sed.leo@consequatlectus.ca','1995-03-24',1,'2018-03-07','2018-03-14',39),(49,'Stone Savage','16050119097',2960465664,80915291489,'tempus.mauris@malesuadafames.com','1992-03-18',1,'2018-04-24','2018-05-29',40),(50,'Garrett Leonard','16240311547',8988416819,189029700,'eget.laoreet@imperdietnecleo.edu','1996-09-15',1,'2018-05-04','2018-04-22',41),(51,'Clark Barron','16761102273',391216143,98716805626,'erat.Sed@Aeneansedpede.ca','1998-02-24',1,'2018-04-21','2018-05-26',42),(52,'Chastity Buckley','16451228398',8260979389,71590158314,'ut.erat.Sed@ac.net','1992-08-23',1,'2018-05-12','2018-06-22',43),(53,'Fritz Pruitt','16250521427',4733710390,5946581399,'pellentesque@pedeSuspendisse.ca','1990-04-17',0,'2018-04-01','2018-05-30',44),(54,'Cora Nichols','16850115726',9012168718,71784588262,'dapibus@nisl.co.uk','1990-06-18',1,'2018-06-24','2018-05-29',45),(55,'Adena Mcbride','16530816088',5575103519,3282823759,'Curae.Donec@adipiscing.edu','1996-05-17',0,'2018-04-11','2018-03-30',46),(56,'Martin Bartlett','16221113467',175063100,31649727425,'Cras.dolor@et.edu','1996-07-09',0,'2018-06-28','2018-06-03',47),(57,'Orla Peters','16360514575',4340635913,91615497082,'vitae.posuere@dignissim.edu','1998-07-06',1,'2018-06-17','2018-06-30',48),(58,'Elijah Dale','16760919236',9081602536,35033364782,'tristique@condimentumDonecat.co.uk','1992-01-27',0,'2018-04-05','2018-06-08',49),(59,'Dana Whitney','16410826094',8940964605,4270749773,'congue@Donecegestas.ca','1993-11-29',0,'2018-03-07','2018-03-07',50),(60,'Nichole Burch','16371129306',7061971162,77007289549,'enim.diam.vel@Aliquamrutrum.edu','2002-10-06',0,'2018-03-18','2018-05-25',51),(61,'Rudyard Watts','16410720145',7100418591,67314696055,'pellentesque.Sed@pedesagittis.edu','1998-09-15',0,'2018-04-08','2018-05-22',52),(62,'Leslie Webster','16791011373',3376437176,75706218829,'tristique.senectus.et@ut.ca','1995-03-03',0,'2018-04-09','2018-03-08',53),(63,'Kamal Phelps','16721018043',4424730464,32857892880,'Nullam@mipede.com','2002-09-29',0,'2018-06-28','2018-06-14',54),(64,'Jacqueline Turner','16700302973',3938939015,16176184535,'hendrerit.a.arcu@liberoat.edu','1991-03-19',0,'2018-04-23','2018-05-16',55),(65,'Allen Oneill','16970203962',3191974372,41297216534,'id.libero@laoreetipsum.edu','2001-02-12',0,'2018-04-08','2018-03-25',56),(66,'Kendall Weaver','16900403936',4839639633,86285754363,'eu.turpis@adipiscing.org','1994-05-14',1,'2018-04-21','2018-03-14',57),(67,'Melanie Boone','16840728038',3037746871,85829697815,'imperdiet.ornare@magna.net','1999-07-17',1,'2018-05-29','2018-05-28',58),(68,'Bernard Bonner','16580926824',730773245,52361031838,'Fusce.mollis@eratEtiamvestibulum.ca','1993-06-19',0,'2018-05-08','2018-03-19',59),(69,'Ebony Lindsey','16290503446',2726270380,20602002625,'aliquam.arcu@fermentumfermentum.com','1998-06-28',1,'2018-04-20','2018-06-25',60),(70,'Fleur Hodge','16761213140',4036325553,23991138297,'auctor@nuncnulla.org','1992-01-29',0,'2018-04-10','2018-03-01',61),(71,'Molly Schmidt','16461013377',8025624296,26625794507,'convallis@volutpat.co.uk','1990-05-18',1,'2018-05-12','2018-04-09',62),(72,'Lydia Travis','16311014467',4945456784,65670427399,'eu.augue@Morbi.org','1998-01-24',0,'2018-05-20','2018-03-26',63),(73,'Griffith Gilliam','16140309417',6648861995,52412351130,'Phasellus.ornare.Fusce@enimCurabitur.com','2002-05-24',1,'2018-05-05','2018-04-07',64),(74,'Nadine Perkins','16770520834',4738476482,2866109461,'nisi.a@ridiculusmus.edu','2001-04-28',1,'2018-04-08','2018-06-23',65),(75,'Shaine Torres','16160711535',8241415031,74516005000,'auctor.nunc@miAliquamgravida.com','1990-04-07',1,'2018-03-15','2018-06-22',66),(76,'Kay Vazquez','16981217247',8440141146,61141969610,'scelerisque@Nam.ca','1996-04-14',1,'2018-05-18','2018-05-05',67),(77,'Bryar Knapp','16560828365',7021594225,55158699601,'nec.tellus.Nunc@lacus.com','1996-02-14',1,'2018-04-10','2018-06-05',68),(78,'Axel Cleveland','16650821928',5449015088,49829883943,'facilisis.eget.ipsum@ipsumdolor.com','2000-02-25',1,'2018-03-22','2018-03-28',69),(79,'Colby Kane','16141015492',4358758055,70624610504,'blandit.at.nisi@egestasblanditNam.co.uk','1997-07-06',1,'2018-06-25','2018-04-01',70),(80,'Buckminster Davenport','16180218807',8847697148,92434155499,'imperdiet.dictum.magna@egetvolutpatornare.ca','1993-09-06',0,'2018-05-19','2018-04-18',71),(81,'Rudyard Acosta','16680401087',3915775963,71623561183,'id.blandit.at@pretiumaliquetmetus.org','1998-01-25',0,'2018-03-10','2018-06-13',72),(82,'Abel Guy','16521115970',4383001641,96933550415,'Cras.sed.leo@sitametmassa.net','2002-04-20',1,'2018-04-25','2018-06-06',73),(83,'Colorado Boyer','16091228350',4885011729,11658665948,'consectetuer@Quisqueornare.co.uk','2000-07-07',1,'2018-06-04','2018-05-05',74),(84,'Ulric Buchanan','16490512818',7196300389,12205922640,'nisi@aduiCras.com','1999-11-30',1,'2018-05-07','2018-06-03',75),(85,'Denise Salas','16360130483',7068939754,50358626459,'bibendum.fermentum@nullaat.edu','1990-11-30',1,'2018-04-07','2018-04-15',76),(86,'Zahir Durham','16280124297',9866189080,15766525573,'velit.Quisque.varius@Sedeu.org','1995-11-18',1,'2018-04-07','2018-05-10',77),(87,'Regan Dalton','16220925567',3202038878,61240544894,'ridiculus.mus.Donec@in.edu','2002-07-20',1,'2018-05-20','2018-05-11',78),(88,'Dorian Drake','16610907854',8594756767,70255399018,'eu@augueeutempor.net','1991-04-29',0,'2018-06-24','2018-04-07',79),(89,'Alisa Ward','16760629496',9184435943,47678012300,'diam.eu.dolor@enimmitempor.edu','1992-07-24',0,'2018-06-24','2018-04-21',80),(90,'Melanie Russo','16850416902',6126939129,95029867650,'non.arcu@risusDuisa.ca','1997-07-01',1,'2018-06-16','2018-05-17',81),(91,'Brittany Cline','16540106540',7085458403,38732083850,'mollis.vitae.posuere@laoreetlectusquis.org','1996-01-09',0,'2018-04-27','2018-06-28',82),(92,'Ishmael Church','16820221328',2175299255,79738823095,'lacus.Quisque.imperdiet@Nuncquisarcu.co.uk','2000-10-13',0,'2018-06-18','2018-05-17',83),(93,'Walter Harrison','16071101338',5850879494,59469841254,'Donec@bibendumsed.org','1999-02-04',0,'2018-03-12','2018-05-14',84),(94,'Pearl Davidson','16120803340',7615709436,32204100244,'lorem.vehicula.et@bibendumsed.edu','1996-04-02',1,'2018-05-15','2018-03-12',85),(95,'Tucker Rojas','16510904767',6983155356,3948566301,'velit.Cras@velitegestaslacinia.co.uk','1999-07-27',1,'2018-06-03','2018-04-03',86),(96,'Neil Mcmillan','16650628041',7189442124,58186114710,'velit@dignissimpharetraNam.org','2000-04-13',0,'2018-04-13','2018-06-07',87),(97,'Germane Barlow','16101207144',6339752221,24875122558,'Class.aptent@acmattis.ca','1998-09-02',0,'2018-05-18','2018-06-07',88),(98,'Bell Watkins','16460923214',7783196546,98989311597,'nascetur.ridiculus.mus@consequat.ca','1992-11-14',1,'2018-05-30','2018-06-07',89),(99,'Winter Trevino','16300215096',7139750574,75399850403,'risus.Donec@nuncsed.ca','1998-06-09',1,'2018-05-19','2018-06-27',90),(100,'Callie Perry','16700829871',2562312787,23150010234,'ornare@ligula.co.uk','2002-11-29',0,'2018-03-25','2018-06-20',91),(101,'Maris Irwin','16840108576',821503796,93555622164,'imperdiet.erat.nonummy@sagittis.co.uk','1996-10-07',1,'2018-04-22','2018-06-26',92),(102,'Charissa Avila','16610710341',8408963140,72946315172,'vulputate.risus.a@augue.ca','1999-09-09',1,'2018-06-28','2018-03-07',93),(103,'Cullen Pickett','16331011886',6178120476,38917429098,'interdum@Cumsociisnatoque.ca','1997-10-15',1,'2018-03-18','2018-05-27',94),(104,'Ira Roberts','16430712111',4598024698,29862030162,'ultrices.Duis.volutpat@feliseget.com','1995-08-18',1,'2018-05-07','2018-06-03',95),(105,'Keelie Calderon','16920404957',6078427111,6959198381,'interdum.Sed@enim.ca','1990-06-23',1,'2018-04-29','2018-04-01',96),(106,'Peter Le','16700427517',1127735948,958302919,'Nunc@pharetraNamac.org','1996-05-25',1,'2018-06-14','2018-04-08',97),(107,'Althea Valenzuela','16950624420',9800986227,81928812268,'risus.Quisque.libero@purusinmolestie.net','1995-03-22',1,'2018-05-29','2018-06-05',98),(108,'Elizabeth Rowland','16360316229',1688482613,86823362237,'eu@Maurisblandit.net','1990-01-01',1,'2018-04-24','2018-05-06',99),(109,'Tanya Cardenas','16801112799',4954960982,44749503339,'justo@aliquam.co.uk','1994-02-15',1,'2018-06-26','2018-03-09',100),(120,'Bruno Messias','03830310102',6233331213,62982703288,'bruno21vk@gmail.com','1991-11-15',1,'2018-07-07','2018-07-07',111),(121,'Bruno Messias','03830310105',6233331213,62982703288,'brunovk21@mailna.co','1991-11-15',1,'2018-07-07','2018-07-07',112),(123,'0','0',0,0,'0','0000-00-00',0,'2018-07-07','2018-07-07',114),(124,'Wesley Pereira da Silva','03830310106',6233331213,62982703288,'wesley@mohmal.in','1991-11-15',1,'2018-07-07','2018-07-07',115),(125,'Wesley Pereira','03830310125',6233331213,62982703288,'wesleypereira10@mohmal.in','1991-11-15',1,'2018-07-07','2018-07-07',116),(126,'Wesley Pereira','03830310113',6233331213,62982703288,'wesleypereira@mohmal.in','1991-11-15',1,'2018-07-07','2018-07-07',117),(127,'Vinícius Alves Modesto e Silva','04221293136',6233193086,62991267068,'vinialves08@gmail.com','1993-03-21',1,'2018-07-07','2018-07-07',118),(128,'Vinícius Alves Modesto e Silva','04221293137',6233193086,62991267068,'vinialves09@gmail.com','1993-03-21',1,'2018-07-07','2018-07-07',119),(129,'Vinícius Alves Modesto e Silva','04221293138',6233193086,62991267068,'vinialves10@gmail.com','1993-03-21',0,'2018-07-07','2018-07-07',120),(130,'zbzdfb','24532454533',9999999999,88888888888,'aluno1@mohmal.in','1958-02-11',1,'2018-07-07','2018-07-07',121);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valor`
--

LOCK TABLES `valor` WRITE;
/*!40000 ALTER TABLE `valor` DISABLE KEYS */;
INSERT INTO `valor` VALUES (1,1);
/*!40000 ALTER TABLE `valor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verifica`
--

DROP TABLE IF EXISTS `verifica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verifica` (
  `usuario_idusuario` int(11) NOT NULL,
  `hash_verifica` text NOT NULL,
  `data_verifica` datetime NOT NULL,
  PRIMARY KEY (`usuario_idusuario`),
  CONSTRAINT `fk_verifica_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verifica`
--

LOCK TABLES `verifica` WRITE;
/*!40000 ALTER TABLE `verifica` DISABLE KEYS */;
INSERT INTO `verifica` VALUES (120,'$2y$12$QCMkJSYqISEvKiYmQCQjMOm8C3fqJkkqWSaGp3BgiG4ZjUjmUTdK2','2018-07-07 08:25:20'),(121,'$2y$12$QCMkJSYqISEvKiYmQCQjMOIlFSvtqIqUBCjooFtTAUd5k9Fi3zNOm','2018-07-07 08:38:13'),(124,'$2y$12$QCMkJSYqISEvKiYmQCQjMOIlHWQN5s8gsWv2s52NZUSUTapXOo8lW','2018-07-07 08:53:10'),(125,'$2y$12$QCMkJSYqISEvKiYmQCQjMO7tv7DpoCrwl0LRCZA5qla7nEHHPQHtC','2018-07-07 09:02:23'),(126,'$2y$12$QCMkJSYqISEvKiYmQCQjMOelcYv9esYOjcZSnobbEJO.MSp9Iu3Ry','2018-07-07 09:05:36'),(128,'$2y$12$QCMkJSYqISEvKiYmQCQjMOpyPbCq1AyDMBg9/6lgz.XdcrOlgPpo2','2018-07-07 09:34:26'),(129,'$2y$12$QCMkJSYqISEvKiYmQCQjMOA3CAfvQgiRrnRefIPaNfccRdWUCIZIa','2018-07-07 09:33:03'),(130,'$2y$12$QCMkJSYqISEvKiYmQCQjMOo4sjPYiHhbd1fPsyQD9u/PqVlqC7Yni','2018-07-07 09:32:00');
/*!40000 ALTER TABLE `verifica` ENABLE KEYS */;
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
values (pnome_usuario, pcpf, ptelefone_fixo, ptelefone_celular, pemail, pdtnasc, false, timenow, timenow, address);

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
/*!50003 DROP PROCEDURE IF EXISTS `sp_devolucao_emprestimo_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_devolucao_emprestimo_update`(pid int)
BEGIN
    UPDATE emprestimo set data_devolucao=now() where idemprestimo = pid; 
    select * from emprestimo 
    inner join patrimonio on emprestimo.patrimonio_idpatrimonio = patrimonio.idpatrimonio
    inner join livro on patrimonio.livro_idlivro = livro.idlivro
    inner join usuario on emprestimo.usuario_idusuario = usuario.idusuario
	where idemprestimo = pid;


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
insert into emprestimo (data_emprestimo, patrimonio_idpatrimonio, usuario_idusuario)
values(now(), ppatrimonio, pusuario);

select idemprestimo, data_emprestimo, patrimonio_idpatrimonio, usuario_idusuario, nome_livro, nome_usuario, email from emprestimo
inner join patrimonio on emprestimo.patrimonio_idpatrimonio = patrimonio.idpatrimonio
inner join livro on patrimonio.livro_idlivro = livro.idlivro
inner join usuario on emprestimo.usuario_idusuario = usuario.idusuario
where idemprestimo = LAST_INSERT_ID();
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
/*!50003 DROP PROCEDURE IF EXISTS `sp_patrimonio_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_patrimonio_update`(pantigoid int, pnovoid int)
BEGIN
    UPDATE patrimonio set idpatrimonio = pnovoid where idpatrimonio = pantigoid;
    
    select idpatrimonio from patrimonio where idpatrimonio = pnovoid;

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
/*!50003 DROP PROCEDURE IF EXISTS `sp_turma_has_aluno_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turma_has_aluno_update`(pantigoid int, pnovoid int)
BEGIN
    UPDATE turma_has_aluno set matricula = pnovoid where matricula = pantigoid;
    
    select matricula from turma_has_aluno where matricula = pnovoid;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_turma_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turma_insert`(pinicio date, ptermino date, pcurso int, pturno int)
BEGIN

insert into turma (data_inicio, data_termino, curso_idcurso, turno_idturno)
values (pinicio, ptermino, pcurso, pturno);

select idturma from turma where idturma = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_turma_update` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_turma_update`(pid int,pinicio date, ptermino date, pturno int)
BEGIN
    UPDATE turma set data_inicio=pinicio, data_termino=ptermino, turno_idturno=pturno where idturma = pid;
    
    select idturma,data_inicio,data_termino,turno_idturno from turma where idturma = pid;

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
/*!50003 DROP PROCEDURE IF EXISTS `sp_verifica_insert` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_verifica_insert`(pusuario int, phash text)
BEGIN
insert into verifica (usuario_idusuario,hash_verifica,data_verifica)
values (pusuario, phash, now());

select usuario_idusuario, hash_verifica, data_verifica from verifica where usuario_idusuario = pusuario;

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

-- Dump completed on 2018-07-07 11:29:46
