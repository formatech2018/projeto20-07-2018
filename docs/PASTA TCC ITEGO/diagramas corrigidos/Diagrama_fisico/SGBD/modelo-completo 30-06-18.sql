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
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (109,0,10),(110,0,11),(111,0,12),(112,0,13),(113,0,14),(114,0,15),(115,0,16),(116,0,17),(117,0,18),(118,0,19),(119,0,20),(120,0,21),(121,0,22),(122,0,23),(123,0,24),(124,0,25),(125,0,26),(126,0,27),(127,0,28),(128,0,29),(129,0,30),(130,0,31),(131,0,32),(132,0,33),(133,0,34),(134,0,35),(135,0,36),(136,0,37),(137,0,38),(138,0,39),(139,0,40),(140,0,41),(141,0,42),(142,0,43),(143,0,44),(144,0,45),(145,0,46),(146,0,47),(147,0,48),(148,0,49),(149,0,50),(150,0,51),(151,0,52),(152,0,53),(153,0,54),(154,0,55),(155,0,56),(156,0,57),(157,0,58),(158,0,59),(159,0,60),(160,0,61),(161,0,62),(162,0,63),(163,0,64),(164,0,65),(165,0,66),(166,0,67),(167,0,68),(168,0,69),(169,0,70),(170,0,71),(171,0,72),(172,0,73),(173,0,74),(174,0,75),(175,0,76),(176,0,77),(177,0,78),(178,0,79),(179,0,80),(180,0,81),(181,0,82),(182,0,83),(183,0,84),(184,0,85),(185,0,86),(186,0,87),(187,0,88),(188,0,89),(189,0,90),(190,0,91),(191,0,92),(192,0,93),(193,0,94),(194,0,95),(195,0,96),(196,0,97),(197,0,98),(198,0,99),(199,0,100);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'692-1532 Sodales Street','982 A, Rd.',75,'morumbi',7500000,'anápolis','GO'),(2,'4975 Eu St.','Ap #497-4973 Fringilla, St.',261,'morumbi',7500000,'anápolis','GO'),(3,'719-4286 Non St.','8779 Lectus. Rd.',151,'morumbi',7500000,'anápolis','GO'),(4,'P.O. Box 146, 5480 Semper St.','457-5761 Eu Avenue',268,'morumbi',7500000,'anápolis','GO'),(5,'4812 Varius Rd.','767-4713 Et, Rd.',252,'morumbi',7500000,'anápolis','GO'),(6,'P.O. Box 803, 8315 Lacinia St.','P.O. Box 182, 7533 Vestibulum Rd.',34,'morumbi',7500000,'anápolis','GO'),(7,'P.O. Box 823, 3705 Sed Street','P.O. Box 687, 3601 In Road',47,'morumbi',7500000,'anápolis','GO'),(8,'865-6198 Hendrerit Road','P.O. Box 445, 8019 Quam, St.',249,'morumbi',7500000,'anápolis','GO'),(9,'P.O. Box 844, 5330 Erat, Rd.','2162 Posuere, Rd.',66,'morumbi',7500000,'anápolis','GO'),(10,'413-4846 Cum Rd.','Ap #187-8917 Duis Av.',120,'morumbi',7500000,'anápolis','GO'),(11,'Ap #324-2569 Eu, Rd.','P.O. Box 691, 4726 Maecenas Rd.',81,'morumbi',7500000,'anápolis','GO'),(12,'9396 Vestibulum. Rd.','P.O. Box 727, 3140 Nec, Av.',118,'morumbi',7500000,'anápolis','GO'),(13,'770-883 In Avenue','350-7526 Pede. Rd.',207,'morumbi',7500000,'anápolis','GO'),(14,'P.O. Box 627, 6800 Cursus, Avenue','Ap #833-4453 A Av.',147,'morumbi',7500000,'anápolis','GO'),(15,'Ap #698-984 Nulla. Rd.','P.O. Box 144, 6744 Aliquam St.',8,'morumbi',7500000,'anápolis','GO'),(16,'P.O. Box 124, 6544 Nec, Road','P.O. Box 109, 5776 Consectetuer, St.',38,'morumbi',7500000,'anápolis','GO'),(17,'3099 Egestas Rd.','352 Ac Rd.',44,'morumbi',7500000,'anápolis','GO'),(18,'580-6418 Nulla. Rd.','P.O. Box 730, 9355 Mi Rd.',288,'morumbi',7500000,'anápolis','GO'),(19,'280-1345 Semper Avenue','793-3933 Eleifend. St.',170,'morumbi',7500000,'anápolis','GO'),(20,'Ap #135-7991 Gravida. Road','Ap #695-3818 Cursus Road',282,'morumbi',7500000,'anápolis','GO'),(21,'629-9351 Vitae St.','Ap #623-974 Felis Street',113,'morumbi',7500000,'anápolis','GO'),(22,'Ap #913-8775 Adipiscing. St.','7662 Sit St.',220,'morumbi',7500000,'anápolis','GO'),(23,'Ap #774-7953 Mauris Rd.','Ap #721-6226 Neque Ave',15,'morumbi',7500000,'anápolis','GO'),(24,'P.O. Box 776, 943 Orci Rd.','P.O. Box 440, 7757 Quis Avenue',108,'morumbi',7500000,'anápolis','GO'),(25,'P.O. Box 751, 2247 Sem. Avenue','7047 Lacus. Road',159,'morumbi',7500000,'anápolis','GO'),(26,'Ap #432-3634 Malesuada St.','957-879 At Ave',291,'morumbi',7500000,'anápolis','GO'),(27,'P.O. Box 580, 9325 Ac Road','P.O. Box 544, 4869 Nunc Road',223,'morumbi',7500000,'anápolis','GO'),(28,'9004 Nulla Ave','1050 Posuere Av.',268,'morumbi',7500000,'anápolis','GO'),(29,'646-7337 Rutrum Av.','P.O. Box 628, 9858 Eu St.',159,'morumbi',7500000,'anápolis','GO'),(30,'Ap #419-547 Egestas. Avenue','8146 Vestibulum Rd.',241,'morumbi',7500000,'anápolis','GO'),(31,'P.O. Box 165, 5412 Aenean Ave','180-4920 Nulla St.',203,'morumbi',7500000,'anápolis','GO'),(32,'2785 Arcu. St.','P.O. Box 453, 181 Ornare, Street',13,'morumbi',7500000,'anápolis','GO'),(33,'Ap #913-1474 Natoque Avenue','Ap #504-4323 Nec Ave',248,'morumbi',7500000,'anápolis','GO'),(34,'Ap #796-8974 Urna. Ave','788-9008 Fusce St.',55,'morumbi',7500000,'anápolis','GO'),(35,'P.O. Box 373, 2953 Ac Ave','4319 Mauris Ave',45,'morumbi',7500000,'anápolis','GO'),(36,'567-6784 Vitae, Road','Ap #818-1551 Dolor Av.',126,'morumbi',7500000,'anápolis','GO'),(37,'Ap #348-3666 Vestibulum St.','P.O. Box 543, 3103 Habitant Ave',72,'morumbi',7500000,'anápolis','GO'),(38,'412-3482 Velit Street','P.O. Box 952, 2180 Ut Road',147,'morumbi',7500000,'anápolis','GO'),(39,'P.O. Box 957, 5260 Ac Rd.','8980 In, Street',242,'morumbi',7500000,'anápolis','GO'),(40,'P.O. Box 681, 6264 Egestas. Av.','Ap #956-1624 Massa Ave',20,'morumbi',7500000,'anápolis','GO'),(41,'P.O. Box 512, 9755 Parturient Road','851-8699 Vitae Ave',68,'morumbi',7500000,'anápolis','GO'),(42,'Ap #725-3404 Nullam Rd.','Ap #287-6141 Odio Avenue',202,'morumbi',7500000,'anápolis','GO'),(43,'Ap #211-2015 Lacinia St.','Ap #375-1178 Interdum. St.',190,'morumbi',7500000,'anápolis','GO'),(44,'9267 Ac Rd.','Ap #399-1870 A Rd.',117,'morumbi',7500000,'anápolis','GO'),(45,'Ap #626-1730 Tincidunt Rd.','8162 Maecenas St.',150,'morumbi',7500000,'anápolis','GO'),(46,'886-9350 Et Rd.','321-8436 Consequat Rd.',174,'morumbi',7500000,'anápolis','GO'),(47,'Ap #366-5773 Vestibulum Ave','Ap #701-525 Sed Street',13,'morumbi',7500000,'anápolis','GO'),(48,'Ap #354-8943 Sem Street','P.O. Box 505, 1515 Dolor Rd.',51,'morumbi',7500000,'anápolis','GO'),(49,'3898 Integer Rd.','Ap #886-6219 Pede, Avenue',55,'morumbi',7500000,'anápolis','GO'),(50,'320-2947 Ornare Av.','Ap #120-8777 Sollicitudin St.',48,'morumbi',7500000,'anápolis','GO'),(51,'6056 Vehicula Street','743 Amet Ave',93,'morumbi',7500000,'anápolis','GO'),(52,'965-5796 A Rd.','P.O. Box 920, 2140 Ac Rd.',35,'morumbi',7500000,'anápolis','GO'),(53,'Ap #497-9425 A, Avenue','Ap #909-6496 Non Road',211,'morumbi',7500000,'anápolis','GO'),(54,'P.O. Box 180, 9481 Vestibulum Avenue','Ap #705-861 Non, Street',127,'morumbi',7500000,'anápolis','GO'),(55,'6321 Nulla St.','Ap #347-8692 Sagittis St.',155,'morumbi',7500000,'anápolis','GO'),(56,'Ap #463-6913 Mauris St.','P.O. Box 918, 7892 Scelerisque Street',248,'morumbi',7500000,'anápolis','GO'),(57,'3639 Iaculis Rd.','P.O. Box 122, 2690 Nonummy Rd.',58,'morumbi',7500000,'anápolis','GO'),(58,'P.O. Box 379, 3996 Pretium Rd.','Ap #843-8149 Molestie. St.',31,'morumbi',7500000,'anápolis','GO'),(59,'203-6187 Interdum. Av.','Ap #518-6864 Dictum Street',77,'morumbi',7500000,'anápolis','GO'),(60,'832-6801 Quisque St.','Ap #283-2545 Fringilla St.',156,'morumbi',7500000,'anápolis','GO'),(61,'6866 In, St.','Ap #917-3071 Nibh. Rd.',84,'morumbi',7500000,'anápolis','GO'),(62,'P.O. Box 736, 554 Nam Av.','P.O. Box 980, 8438 Ornare, Avenue',70,'morumbi',7500000,'anápolis','GO'),(63,'952-695 Condimentum. Rd.','Ap #677-9947 Mauris Rd.',73,'morumbi',7500000,'anápolis','GO'),(64,'797-1194 Nascetur Avenue','9181 Porttitor Road',139,'morumbi',7500000,'anápolis','GO'),(65,'844-6208 Diam. St.','466-3851 Eros Street',239,'morumbi',7500000,'anápolis','GO'),(66,'Ap #942-1248 Lorem Street','712-5323 Nunc Street',122,'morumbi',7500000,'anápolis','GO'),(67,'P.O. Box 313, 5234 Placerat. Av.','6961 Dapibus Ave',40,'morumbi',7500000,'anápolis','GO'),(68,'894-6846 Sapien. Road','294-9672 Donec St.',7,'morumbi',7500000,'anápolis','GO'),(69,'P.O. Box 964, 6085 Tincidunt. St.','978-1348 Ut Road',103,'morumbi',7500000,'anápolis','GO'),(70,'P.O. Box 411, 6243 Mauris St.','7798 Dolor, Rd.',174,'morumbi',7500000,'anápolis','GO'),(71,'Ap #364-9281 Cras Street','P.O. Box 558, 7955 Vivamus St.',54,'morumbi',7500000,'anápolis','GO'),(72,'P.O. Box 124, 2094 Turpis. Ave','6726 Tortor, Avenue',130,'morumbi',7500000,'anápolis','GO'),(73,'211-7800 Quisque Road','977 Montes, Road',176,'morumbi',7500000,'anápolis','GO'),(74,'P.O. Box 554, 8742 Etiam Rd.','Ap #216-9926 A, St.',125,'morumbi',7500000,'anápolis','GO'),(75,'6500 Egestas. St.','7560 In Ave',250,'morumbi',7500000,'anápolis','GO'),(76,'6697 Lorem Street','P.O. Box 573, 1934 Magna. Street',212,'morumbi',7500000,'anápolis','GO'),(77,'7775 Mattis Street','Ap #802-5922 Dapibus St.',177,'morumbi',7500000,'anápolis','GO'),(78,'P.O. Box 401, 9056 Vitae Road','P.O. Box 545, 1253 Amet, Avenue',71,'morumbi',7500000,'anápolis','GO'),(79,'P.O. Box 555, 3296 Etiam Street','P.O. Box 288, 3398 Ante. St.',291,'morumbi',7500000,'anápolis','GO'),(80,'768-3298 Commodo St.','671-3972 Tincidunt, St.',105,'morumbi',7500000,'anápolis','GO'),(81,'P.O. Box 113, 5450 Dolor, St.','Ap #491-1754 Congue. St.',192,'morumbi',7500000,'anápolis','GO'),(82,'Ap #923-5020 Augue St.','P.O. Box 602, 6291 Lacus. Rd.',159,'morumbi',7500000,'anápolis','GO'),(83,'359-2166 Ut Road','121-3508 Facilisis Rd.',99,'morumbi',7500000,'anápolis','GO'),(84,'P.O. Box 855, 9474 Tristique Road','P.O. Box 332, 5934 Quam. Rd.',70,'morumbi',7500000,'anápolis','GO'),(85,'Ap #786-289 Natoque Rd.','P.O. Box 932, 2564 Sem, St.',137,'morumbi',7500000,'anápolis','GO'),(86,'4405 Et, St.','861-6014 Eu Street',190,'morumbi',7500000,'anápolis','GO'),(87,'P.O. Box 127, 7440 Proin Rd.','691-6654 Est Av.',136,'morumbi',7500000,'anápolis','GO'),(88,'Ap #897-1490 Elit Road','2759 Leo St.',289,'morumbi',7500000,'anápolis','GO'),(89,'Ap #155-7939 Magnis Street','P.O. Box 198, 7017 Tempor St.',41,'morumbi',7500000,'anápolis','GO'),(90,'P.O. Box 516, 5721 Non, Avenue','P.O. Box 406, 3601 Ut, Ave',194,'morumbi',7500000,'anápolis','GO'),(91,'5309 Lectus St.','2774 Ante Street',204,'morumbi',7500000,'anápolis','GO'),(92,'P.O. Box 843, 5360 Arcu Road','Ap #248-7674 Sed Rd.',171,'morumbi',7500000,'anápolis','GO'),(93,'399-3070 Egestas St.','Ap #720-2402 Orci. Rd.',55,'morumbi',7500000,'anápolis','GO'),(94,'5053 Felis. Av.','8668 Lorem St.',24,'morumbi',7500000,'anápolis','GO'),(95,'433-3880 Amet Av.','7030 Sem Road',298,'morumbi',7500000,'anápolis','GO'),(96,'Ap #316-5848 Nec Ave','7030 Vitae Ave',25,'morumbi',7500000,'anápolis','GO'),(97,'P.O. Box 790, 3012 Id, St.','Ap #323-7463 Dui Road',279,'morumbi',7500000,'anápolis','GO'),(98,'617-2527 Mollis. Rd.','P.O. Box 546, 5333 Consectetuer Avenue',249,'morumbi',7500000,'anápolis','GO'),(99,'P.O. Box 149, 3471 In, Av.','P.O. Box 126, 3037 Sed, Rd.',147,'morumbi',7500000,'anápolis','GO'),(100,'Ap #363-6938 Nunc Ave','Ap #688-4847 Enim, St.',268,'morumbi',7500000,'anápolis','GO');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (2,101,4,1),(3,102,5,6),(4,103,6,5),(5,104,5,1),(6,105,2,5),(7,106,5,2),(8,107,5,1),(9,108,6,3),(10,109,5,1);
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
INSERT INTO `patrimonio` VALUES (15062274,9),(34283677,9),(38565943,9),(40981105,9),(69099970,9),(69313960,9),(74649408,9),(76643837,9),(78592431,9),(83393893,9),(84619112,9),(88365159,9),(93837571,9),(96359324,9),(10885489,10),(34001737,10),(35887956,10),(43395299,10),(54149749,10),(60537433,10),(76023015,10),(77760595,10),(88232163,10),(93792980,10),(11341058,11),(14442099,11),(21698052,11),(22918149,11),(27398549,11),(29134385,11),(38466474,11),(40304506,11),(54865496,11),(55406362,11),(59652586,11),(60924332,11),(65005046,11),(66181796,11),(66367013,11),(73067273,11),(77471980,11),(92628754,11),(92954526,11),(98738163,11),(10836892,12),(24128225,12),(32182926,12),(33652303,12),(36212449,12),(40316709,12),(46497818,12),(50634203,12),(55591849,12),(56501846,12),(56668515,12),(60288341,12),(82827818,12),(84968363,12),(87831636,12),(90152553,12),(92079083,12),(93401310,12),(14305132,13),(14428864,13),(37236563,13),(63934892,13),(67653475,13),(68518507,13),(74222162,13),(77937696,13),(80726716,13),(98465352,13),(20040664,14),(24576051,14),(30581863,14),(31126857,14),(35556645,14),(52843632,14),(68104930,14),(73508971,14),(85829764,14),(90658982,14),(91753941,14),(22808725,15),(37552791,15),(38530553,15),(44113414,15),(50189050,15),(54336547,15),(55780670,15),(70391425,15),(71210788,15),(79301701,15),(80879614,15),(92475535,15),(19341282,16),(21408196,16),(22021347,16),(27694435,16),(28403205,16),(34624139,16),(35138158,16),(36149210,16),(38453925,16),(52983290,16),(56907560,16),(57947894,16),(62096330,16),(63003682,16),(64405847,16),(67565084,16),(78175924,16),(89307664,16),(93060582,16),(93338504,16),(98833268,16),(14233638,17),(18612412,17),(30221827,17),(36031392,17),(52861256,17),(52956410,17),(85546394,17),(99942485,17),(12360606,18),(15500267,18),(18514294,18),(18723436,18),(29598810,18),(30200801,18),(39227781,18),(40445059,18),(41068026,18),(55144054,18),(71094170,18),(71645217,18),(72857249,18),(82749946,18),(83131885,18),(90210577,18),(91701838,18),(95409319,18),(98020101,18),(10604898,19),(18467772,19),(20851881,19),(21406701,19),(28838278,19),(30620552,19),(37864211,19),(39074647,19),(48468371,19),(51971856,19),(59406951,19),(61137165,19),(62190059,19),(64098819,19),(70073037,19),(71054408,19),(87851102,19),(91510477,19),(95435075,19),(97360766,19),(99744278,19),(10510972,20),(20912703,20),(26322769,20),(26709227,20),(33225864,20),(41547561,20),(45546899,20),(52711953,20),(61021547,20),(67318443,20),(69257472,20),(69517126,20),(85298853,20),(90642158,20),(91809650,20),(95607200,20),(98157541,20),(10248292,21),(11073169,21),(12731872,21),(18338875,21),(30963283,21),(32948362,21),(33106390,21),(33985025,21),(39763174,21),(48165778,21),(57581205,21),(60651224,21),(61278294,21),(75423102,21),(93374162,21),(96615306,21),(98684083,21),(13587651,22),(16674622,22),(20469404,22),(23735212,22),(24558863,22),(26748004,22),(28741704,22),(48306949,22),(51415713,22),(61821340,22),(64550885,22),(79098787,22),(85413604,22),(88422073,22),(10490630,23),(16461240,23),(18727745,23),(23423653,23),(24285494,23),(36527558,23),(49940680,23),(53765922,23),(60661296,23),(72281395,23),(76841284,23),(79253886,23),(82745584,23),(89528047,23),(95198112,23),(96792777,23),(17152414,24),(20479665,24),(22335597,24),(28497247,24),(33108149,24),(38942979,24),(45295617,24),(50066664,24),(53931947,24),(63639911,24),(63915653,24),(69358262,24),(71018168,24),(71377199,24),(76983508,24),(77035743,24),(88963880,24),(91483114,24),(96810663,24),(12067108,25),(13089643,25),(13610001,25),(29877647,25),(40834538,25),(45947596,25),(53039702,25),(54413387,25),(73032671,25),(86242075,25),(86334677,25),(96027529,25),(99836048,25),(11955547,26),(13810760,26),(21778945,26),(25563307,26),(27395057,26),(37641489,26),(40831623,26),(48718423,26),(58402962,26),(59792006,26),(67412270,26),(67849717,26),(73994418,26),(81062214,26),(83232020,26),(89550950,26),(99190235,26),(99591823,26),(10958756,27),(11618523,27),(11636237,27),(29647817,27),(29966459,27),(33403396,27),(37862254,27),(37991424,27),(40252733,27),(42259716,27),(44209127,27),(49844467,27),(57561773,27),(60793141,27),(61014426,27),(61949430,27),(64576382,27),(64848564,27),(67406950,27),(68568548,27),(83727437,27),(85370562,27);
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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `senha`
--

LOCK TABLES `senha` WRITE;
/*!40000 ALTER TABLE `senha` DISABLE KEYS */;
INSERT INTO `senha` VALUES (10,'TBS83HNZ2WY','2018-06-26',10),(12,'XIZ67RZH7LQ','2018-06-26',10),(13,'NSL78OCA8ZU','2018-06-26',11),(14,'KHF94GIF4UL','2018-06-27',12),(15,'LNY39ILA1BI','2018-06-25',13),(16,'PZY84NBP7DK','2018-06-29',14),(17,'DYQ31DBO6DC','2018-06-29',15),(18,'PEN87RIH3WO','2018-06-26',16),(19,'JER48BRD7ZF','2018-06-24',17),(20,'EFT98ARE5GB','2018-06-24',18),(21,'JDW05OPL1ZH','2018-06-26',19),(22,'UKY88VVE9IM','2018-06-26',20),(23,'BZK16MMZ0IG','2018-06-25',21),(24,'DVT37LBD3JZ','2018-06-26',22),(25,'GYH16QSA0IF','2018-06-30',23),(26,'KIM80CYL8ED','2018-06-26',24),(27,'VWD02MHP4VZ','2018-06-24',25),(28,'HSV42SBN7VY','2018-06-27',26),(29,'XKF89IBS3RB','2018-06-26',27),(30,'UCE57UDW0KC','2018-06-25',28),(31,'RXE75HDT8VE','2018-06-24',29),(32,'BHY54IUW1UD','2018-06-28',30),(33,'UMF16BIP1QP','2018-06-30',31),(34,'OYD68MGW4BR','2018-06-27',32),(35,'WHM48JFL5UC','2018-06-27',33),(36,'RFM56SPO8RB','2018-06-29',34),(37,'LAZ14NGU5NS','2018-06-25',35),(38,'HHT04AJI9FA','2018-06-24',36),(39,'TSB33CNC6UG','2018-06-24',37),(40,'SKB21RPE4UH','2018-06-30',38),(41,'UAA28XZH3YF','2018-06-30',39),(42,'CNC39MDM4SM','2018-06-27',40),(43,'TZD86MQC1GR','2018-06-24',41),(44,'GUX81CET0UR','2018-06-29',42),(45,'AVM52YHC2JP','2018-06-29',43),(46,'KIB33LYN5JL','2018-06-24',44),(47,'WKY13HLN9WV','2018-06-29',45),(48,'DTD34RNO3JT','2018-06-26',46),(49,'XCO67HIZ2WA','2018-06-30',47),(50,'HLD49NNM4RL','2018-06-30',48),(51,'DPD44KCH1ZI','2018-06-29',49),(52,'FCM52AFZ5NV','2018-06-27',50),(53,'VRF34CMI1EU','2018-06-24',51),(54,'CYO67CUI3SR','2018-06-25',52),(55,'NDI81SMS7XZ','2018-06-24',53),(56,'OCU53PEF2UM','2018-06-24',54),(57,'QLV64AOG0CR','2018-06-25',55),(58,'RBF67FPL4BF','2018-06-26',56),(59,'JPT48RAK8NR','2018-06-29',57),(60,'YRJ59UKR4SG','2018-06-28',58),(61,'VSR01YCU8BK','2018-06-25',59),(62,'IVC50EKO0ZR','2018-06-28',60),(63,'PXI50AKE0KK','2018-06-26',61),(64,'TEC09WAI7UB','2018-06-27',62),(65,'CCP88CCO3IB','2018-06-25',63),(66,'KPI65MRI3NF','2018-06-26',64),(67,'KNE70JOP9MI','2018-06-25',65),(68,'WCS10UHM6GB','2018-06-29',66),(69,'XSH08HHW8QI','2018-06-28',67),(70,'ATB67WUL6XM','2018-06-28',68),(71,'LVG89KHT9FC','2018-06-27',69),(72,'NYI96FIV9BH','2018-06-25',70),(73,'IWW62YTC4JC','2018-06-27',71),(74,'GKC97NQH8OS','2018-06-30',72),(75,'VVR27ZZG7PM','2018-06-26',73),(76,'UNP74LDT0MU','2018-06-28',74),(77,'NFX11FPR7CU','2018-06-26',75),(78,'RGA97VVQ0MT','2018-06-24',76),(79,'ELA18ZKU1RO','2018-06-28',77),(80,'IEZ85DWM9LA','2018-06-30',78),(81,'SPU63SMT4VS','2018-06-28',79),(82,'TKW24EKE1UR','2018-06-28',80),(83,'WAO75ZBM2JF','2018-06-28',81),(84,'IHF10MCW6JK','2018-06-24',82),(85,'TPY16CYO8WH','2018-06-27',83),(86,'QNG08RIE0PV','2018-06-29',84),(87,'MHN95CXK5RL','2018-06-30',85),(88,'GFO45YFT4NG','2018-06-28',86),(89,'IUT23VOR2RA','2018-06-26',87),(90,'XFE83KRP9CU','2018-06-26',88),(91,'YZL91ZJT7FQ','2018-06-28',89),(92,'IMP83GVW1AK','2018-06-26',90),(93,'VKA99OFY3RX','2018-06-24',91),(94,'EXU88FNU7WV','2018-06-29',92),(95,'DCQ24NYQ8FI','2018-06-25',93),(96,'ULY35WLV6ZY','2018-06-24',94),(97,'VNN38QJT1YU','2018-06-29',95),(98,'MGA46NAE9KX','2018-06-25',96),(99,'UWN38RME0JA','2018-06-30',97),(100,'RVJ95TEX8LS','2018-06-29',98),(101,'CSZ65VTN6DR','2018-06-24',99),(102,'TVD98FXO9RD','2018-06-28',100),(103,'ROD07ORN8EH','2018-06-29',101),(104,'XJP26LDL4VU','2018-06-30',102),(105,'XTP05MSB9KO','2018-06-28',103),(106,'LWC14XHO2KS','2018-06-27',104),(107,'RHL94QML1FF','2018-06-26',105),(108,'NQW56WXA5CP','2018-06-24',106),(109,'OGA49GAT6JC','2018-06-25',107),(110,'NKV71NSV9NJ','2018-06-25',108),(111,'LNZ29UEK0NQ','2018-06-29',109);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
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
  CONSTRAINT `fk_usuario_endereco1` FOREIGN KEY (`endereco_idendereco`) REFERENCES `endereco` (`idendereco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (10,'Ariel Wolfe','16740324958',5093124226,75634787393,'Integer.aliquam@odioNam.com','2002-06-06',0,'2018-05-02','2018-05-11',1),(11,'Ora Gaines','16070828850',4133835655,97115692565,'dignissim@convallisestvitae.ca','1996-07-29',1,'2018-06-28','2018-05-12',2),(12,'Carla Morales','16931208837',458540075,59907174415,'ut@sapienimperdietornare.net','1992-12-15',1,'2018-06-09','2018-06-14',3),(13,'Lydia Golden','16430911321',5854180290,88559683024,'lobortis.mauris@semperNam.co.uk','2001-05-22',0,'2018-03-26','2018-06-30',4),(14,'Wade Griffin','16840912411',2349547914,30858682510,'a@amet.org','1992-12-23',0,'2018-04-08','2018-06-14',5),(15,'Stephen Walker','16030827871',1636415851,7053665691,'In.mi.pede@consequatdolorvitae.net','1997-12-26',0,'2018-03-05','2018-05-25',6),(16,'Arsenio Baxter','16590915218',2683545547,49180773983,'tortor@mi.edu','1991-10-22',0,'2018-05-17','2018-05-16',7),(17,'India Blankenship','16610221932',5814284496,73474069613,'ac@Nunclaoreetlectus.ca','1997-12-30',0,'2018-05-18','2018-06-17',8),(18,'Tyrone Simpson','16101209523',7055955027,21758559513,'pretium.aliquet@erat.edu','1998-03-08',1,'2018-06-24','2018-06-10',9),(19,'Taylor Carey','16560920306',3301622678,74771653076,'bibendum.sed@adipiscing.org','1995-03-23',0,'2018-05-17','2018-04-06',10),(20,'Burton Moon','16740802483',3857196836,87892086229,'eget.nisi@tinciduntnibh.ca','1996-02-28',0,'2018-06-05','2018-03-29',11),(21,'Shana Holloway','16540627363',3337364305,72927770338,'auctor@natoque.org','1993-04-24',1,'2018-04-16','2018-03-26',12),(22,'Castor Dillard','16001202906',5150208543,6987531450,'mi.pede.nonummy@etmagnis.co.uk','1991-09-30',1,'2018-04-19','2018-03-03',13),(23,'Teegan Woods','16971229852',3454806137,994112141,'dolor@Phasellus.com','2000-12-12',1,'2018-06-09','2018-04-18',14),(24,'Micah Santos','16240212953',9720277049,37165340208,'ligula@tinciduntadipiscingMauris.ca','2001-09-09',0,'2018-06-20','2018-05-19',15),(25,'Casey Russo','16770207390',7558005791,16192359708,'montes.nascetur.ridiculus@eutellus.co.uk','1996-06-27',1,'2018-05-01','2018-03-30',16),(26,'Baker Mathews','16150316720',1297153833,62443985214,'Donec.nibh.Quisque@pedesagittis.com','1993-05-14',1,'2018-06-23','2018-06-24',17),(27,'Denise Roth','16701012068',6643750855,99488105189,'vel@elitAliquam.com','2001-05-10',1,'2018-05-20','2018-06-24',18),(28,'Christopher Ramirez','16680501870',4044706709,91624694763,'ullamcorper.eu@nostraperinceptos.com','1990-02-23',0,'2018-06-19','2018-03-22',19),(29,'Nolan Vaughn','16261216376',5568759036,31752628638,'elementum.sem@id.org','1990-10-15',0,'2018-05-11','2018-06-06',20),(30,'Clementine Foley','16121018679',9814008810,44943023028,'adipiscing.ligula@PhasellusnullaInteger.ca','1995-02-03',1,'2018-03-05','2018-04-13',21),(31,'Chiquita Hyde','16691014758',1471546639,25575297106,'pede.ac@lorem.co.uk','1996-10-07',1,'2018-04-10','2018-03-19',22),(32,'Donna Lawrence','16850620278',681721338,87887355547,'tempus.risus.Donec@estacmattis.ca','2000-06-20',0,'2018-06-11','2018-05-16',23),(33,'Britanni Watson','16281114191',7176807715,38627692429,'mi.felis@Crasvehicula.net','1995-03-08',0,'2018-05-13','2018-04-07',24),(34,'Preston Sanford','16060523625',6666134286,77295857794,'ante.iaculis.nec@lorem.net','1993-09-02',1,'2018-06-22','2018-06-15',25),(35,'Rudyard Powell','16890324739',6911778630,12675791422,'eu.elit@adipiscing.net','1999-11-09',1,'2018-06-27','2018-03-16',26),(36,'George Buckner','16840826434',2863536790,10389098681,'bibendum@massaVestibulum.co.uk','1997-11-01',0,'2018-03-06','2018-04-23',27),(37,'Lewis Burks','16020318325',656303081,4029493786,'est.arcu.ac@Cras.ca','1999-08-10',0,'2018-04-26','2018-03-13',28),(38,'Raymond Gould','16770330140',1840703334,88835518592,'tellus.id.nunc@metusVivamuseuismod.net','1999-03-25',0,'2018-04-07','2018-04-05',29),(39,'Carl Parsons','16950123604',6808358833,19376784351,'rhoncus@lectusrutrum.org','1998-07-22',1,'2018-03-23','2018-06-06',30),(40,'Rashad Nash','16080326503',7097331283,96423700710,'lectus@temporloremeget.co.uk','1993-06-05',1,'2018-05-04','2018-03-06',31),(41,'Maia Herman','16400304663',3150360278,91642183283,'ligula.consectetuer.rhoncus@Etiam.co.uk','2002-04-04',1,'2018-06-25','2018-05-24',32),(42,'Fitzgerald Riley','16180804960',8978935781,81289111455,'a.nunc@egestas.ca','1992-03-22',1,'2018-06-14','2018-03-01',33),(43,'Lilah Roach','16380529579',9873195672,43965985856,'enim@risus.net','1995-09-25',0,'2018-04-16','2018-03-18',34),(44,'Rhiannon Sherman','16150204066',1741649654,86946204153,'Vivamus@tristique.com','1991-06-05',1,'2018-06-15','2018-03-02',35),(45,'Murphy Noble','16251203641',7742526951,59110241532,'pede.ac.urna@pede.net','2000-08-29',0,'2018-03-04','2018-03-13',36),(46,'Cade Hines','16960807283',2121972391,62346984134,'neque@Nullaeu.ca','1997-02-04',0,'2018-05-30','2018-03-30',37),(47,'Noel Williams','16750710070',9159321629,24020921573,'et.arcu@felis.com','1998-04-14',0,'2018-05-06','2018-03-13',38),(48,'James Carpenter','16080215651',4791320681,77395326597,'sed.leo@consequatlectus.ca','1995-03-24',1,'2018-03-07','2018-03-14',39),(49,'Stone Savage','16050119097',2960465664,80915291489,'tempus.mauris@malesuadafames.com','1992-03-18',1,'2018-04-24','2018-05-29',40),(50,'Garrett Leonard','16240311547',8988416819,189029700,'eget.laoreet@imperdietnecleo.edu','1996-09-15',1,'2018-05-04','2018-04-22',41),(51,'Clark Barron','16761102273',391216143,98716805626,'erat.Sed@Aeneansedpede.ca','1998-02-24',1,'2018-04-21','2018-05-26',42),(52,'Chastity Buckley','16451228398',8260979389,71590158314,'ut.erat.Sed@ac.net','1992-08-23',1,'2018-05-12','2018-06-22',43),(53,'Fritz Pruitt','16250521427',4733710390,5946581399,'pellentesque@pedeSuspendisse.ca','1990-04-17',0,'2018-04-01','2018-05-30',44),(54,'Cora Nichols','16850115726',9012168718,71784588262,'dapibus@nisl.co.uk','1990-06-18',1,'2018-06-24','2018-05-29',45),(55,'Adena Mcbride','16530816088',5575103519,3282823759,'Curae.Donec@adipiscing.edu','1996-05-17',0,'2018-04-11','2018-03-30',46),(56,'Martin Bartlett','16221113467',175063100,31649727425,'Cras.dolor@et.edu','1996-07-09',0,'2018-06-28','2018-06-03',47),(57,'Orla Peters','16360514575',4340635913,91615497082,'vitae.posuere@dignissim.edu','1998-07-06',1,'2018-06-17','2018-06-30',48),(58,'Elijah Dale','16760919236',9081602536,35033364782,'tristique@condimentumDonecat.co.uk','1992-01-27',0,'2018-04-05','2018-06-08',49),(59,'Dana Whitney','16410826094',8940964605,4270749773,'congue@Donecegestas.ca','1993-11-29',0,'2018-03-07','2018-03-07',50),(60,'Nichole Burch','16371129306',7061971162,77007289549,'enim.diam.vel@Aliquamrutrum.edu','2002-10-06',0,'2018-03-18','2018-05-25',51),(61,'Rudyard Watts','16410720145',7100418591,67314696055,'pellentesque.Sed@pedesagittis.edu','1998-09-15',0,'2018-04-08','2018-05-22',52),(62,'Leslie Webster','16791011373',3376437176,75706218829,'tristique.senectus.et@ut.ca','1995-03-03',0,'2018-04-09','2018-03-08',53),(63,'Kamal Phelps','16721018043',4424730464,32857892880,'Nullam@mipede.com','2002-09-29',0,'2018-06-28','2018-06-14',54),(64,'Jacqueline Turner','16700302973',3938939015,16176184535,'hendrerit.a.arcu@liberoat.edu','1991-03-19',0,'2018-04-23','2018-05-16',55),(65,'Allen Oneill','16970203962',3191974372,41297216534,'id.libero@laoreetipsum.edu','2001-02-12',0,'2018-04-08','2018-03-25',56),(66,'Kendall Weaver','16900403936',4839639633,86285754363,'eu.turpis@adipiscing.org','1994-05-14',1,'2018-04-21','2018-03-14',57),(67,'Melanie Boone','16840728038',3037746871,85829697815,'imperdiet.ornare@magna.net','1999-07-17',1,'2018-05-29','2018-05-28',58),(68,'Bernard Bonner','16580926824',730773245,52361031838,'Fusce.mollis@eratEtiamvestibulum.ca','1993-06-19',0,'2018-05-08','2018-03-19',59),(69,'Ebony Lindsey','16290503446',2726270380,20602002625,'aliquam.arcu@fermentumfermentum.com','1998-06-28',1,'2018-04-20','2018-06-25',60),(70,'Fleur Hodge','16761213140',4036325553,23991138297,'auctor@nuncnulla.org','1992-01-29',0,'2018-04-10','2018-03-01',61),(71,'Molly Schmidt','16461013377',8025624296,26625794507,'convallis@volutpat.co.uk','1990-05-18',1,'2018-05-12','2018-04-09',62),(72,'Lydia Travis','16311014467',4945456784,65670427399,'eu.augue@Morbi.org','1998-01-24',0,'2018-05-20','2018-03-26',63),(73,'Griffith Gilliam','16140309417',6648861995,52412351130,'Phasellus.ornare.Fusce@enimCurabitur.com','2002-05-24',1,'2018-05-05','2018-04-07',64),(74,'Nadine Perkins','16770520834',4738476482,2866109461,'nisi.a@ridiculusmus.edu','2001-04-28',1,'2018-04-08','2018-06-23',65),(75,'Shaine Torres','16160711535',8241415031,74516005000,'auctor.nunc@miAliquamgravida.com','1990-04-07',1,'2018-03-15','2018-06-22',66),(76,'Kay Vazquez','16981217247',8440141146,61141969610,'scelerisque@Nam.ca','1996-04-14',1,'2018-05-18','2018-05-05',67),(77,'Bryar Knapp','16560828365',7021594225,55158699601,'nec.tellus.Nunc@lacus.com','1996-02-14',1,'2018-04-10','2018-06-05',68),(78,'Axel Cleveland','16650821928',5449015088,49829883943,'facilisis.eget.ipsum@ipsumdolor.com','2000-02-25',1,'2018-03-22','2018-03-28',69),(79,'Colby Kane','16141015492',4358758055,70624610504,'blandit.at.nisi@egestasblanditNam.co.uk','1997-07-06',1,'2018-06-25','2018-04-01',70),(80,'Buckminster Davenport','16180218807',8847697148,92434155499,'imperdiet.dictum.magna@egetvolutpatornare.ca','1993-09-06',0,'2018-05-19','2018-04-18',71),(81,'Rudyard Acosta','16680401087',3915775963,71623561183,'id.blandit.at@pretiumaliquetmetus.org','1998-01-25',0,'2018-03-10','2018-06-13',72),(82,'Abel Guy','16521115970',4383001641,96933550415,'Cras.sed.leo@sitametmassa.net','2002-04-20',1,'2018-04-25','2018-06-06',73),(83,'Colorado Boyer','16091228350',4885011729,11658665948,'consectetuer@Quisqueornare.co.uk','2000-07-07',1,'2018-06-04','2018-05-05',74),(84,'Ulric Buchanan','16490512818',7196300389,12205922640,'nisi@aduiCras.com','1999-11-30',1,'2018-05-07','2018-06-03',75),(85,'Denise Salas','16360130483',7068939754,50358626459,'bibendum.fermentum@nullaat.edu','1990-11-30',1,'2018-04-07','2018-04-15',76),(86,'Zahir Durham','16280124297',9866189080,15766525573,'velit.Quisque.varius@Sedeu.org','1995-11-18',1,'2018-04-07','2018-05-10',77),(87,'Regan Dalton','16220925567',3202038878,61240544894,'ridiculus.mus.Donec@in.edu','2002-07-20',1,'2018-05-20','2018-05-11',78),(88,'Dorian Drake','16610907854',8594756767,70255399018,'eu@augueeutempor.net','1991-04-29',0,'2018-06-24','2018-04-07',79),(89,'Alisa Ward','16760629496',9184435943,47678012300,'diam.eu.dolor@enimmitempor.edu','1992-07-24',0,'2018-06-24','2018-04-21',80),(90,'Melanie Russo','16850416902',6126939129,95029867650,'non.arcu@risusDuisa.ca','1997-07-01',1,'2018-06-16','2018-05-17',81),(91,'Brittany Cline','16540106540',7085458403,38732083850,'mollis.vitae.posuere@laoreetlectusquis.org','1996-01-09',0,'2018-04-27','2018-06-28',82),(92,'Ishmael Church','16820221328',2175299255,79738823095,'lacus.Quisque.imperdiet@Nuncquisarcu.co.uk','2000-10-13',0,'2018-06-18','2018-05-17',83),(93,'Walter Harrison','16071101338',5850879494,59469841254,'Donec@bibendumsed.org','1999-02-04',0,'2018-03-12','2018-05-14',84),(94,'Pearl Davidson','16120803340',7615709436,32204100244,'lorem.vehicula.et@bibendumsed.edu','1996-04-02',1,'2018-05-15','2018-03-12',85),(95,'Tucker Rojas','16510904767',6983155356,3948566301,'velit.Cras@velitegestaslacinia.co.uk','1999-07-27',1,'2018-06-03','2018-04-03',86),(96,'Neil Mcmillan','16650628041',7189442124,58186114710,'velit@dignissimpharetraNam.org','2000-04-13',0,'2018-04-13','2018-06-07',87),(97,'Germane Barlow','16101207144',6339752221,24875122558,'Class.aptent@acmattis.ca','1998-09-02',0,'2018-05-18','2018-06-07',88),(98,'Bell Watkins','16460923214',7783196546,98989311597,'nascetur.ridiculus.mus@consequat.ca','1992-11-14',1,'2018-05-30','2018-06-07',89),(99,'Winter Trevino','16300215096',7139750574,75399850403,'risus.Donec@nuncsed.ca','1998-06-09',1,'2018-05-19','2018-06-27',90),(100,'Callie Perry','16700829871',2562312787,23150010234,'ornare@ligula.co.uk','2002-11-29',0,'2018-03-25','2018-06-20',91),(101,'Maris Irwin','16840108576',821503796,93555622164,'imperdiet.erat.nonummy@sagittis.co.uk','1996-10-07',0,'2018-04-22','2018-06-26',92),(102,'Charissa Avila','16610710341',8408963140,72946315172,'vulputate.risus.a@augue.ca','1999-09-09',0,'2018-06-28','2018-03-07',93),(103,'Cullen Pickett','16331011886',6178120476,38917429098,'interdum@Cumsociisnatoque.ca','1997-10-15',0,'2018-03-18','2018-05-27',94),(104,'Ira Roberts','16430712111',4598024698,29862030162,'ultrices.Duis.volutpat@feliseget.com','1995-08-18',0,'2018-05-07','2018-06-03',95),(105,'Keelie Calderon','16920404957',6078427111,6959198381,'interdum.Sed@enim.ca','1990-06-23',0,'2018-04-29','2018-04-01',96),(106,'Peter Le','16700427517',1127735948,958302919,'Nunc@pharetraNamac.org','1996-05-25',1,'2018-06-14','2018-04-08',97),(107,'Althea Valenzuela','16950624420',9800986227,81928812268,'risus.Quisque.libero@purusinmolestie.net','1995-03-22',1,'2018-05-29','2018-06-05',98),(108,'Elizabeth Rowland','16360316229',1688482613,86823362237,'eu@Maurisblandit.net','1990-01-01',1,'2018-04-24','2018-05-06',99),(109,'Tanya Cardenas','16801112799',4954960982,44749503339,'justo@aliquam.co.uk','1994-02-15',1,'2018-06-26','2018-03-09',100);
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-30 11:48:39
