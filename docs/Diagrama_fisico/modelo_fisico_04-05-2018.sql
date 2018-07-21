-- MySQL Script generated by MySQL Workbench
-- Fri May  4 09:38:56 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema libraryitego
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema libraryitego
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `libraryitego` DEFAULT CHARACTER SET utf8 ;
USE `libraryitego` ;

-- -----------------------------------------------------
-- Table `libraryitego`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`endereco` (
  `idendereco` INT NOT NULL AUTO_INCREMENT,
  `rua` TEXT NOT NULL,
  `complemento` TEXT NOT NULL,
  `numero` DECIMAL(10,0) NOT NULL,
  `bairro` TEXT NOT NULL,
  `cep` INT NOT NULL,
  `cidade` TEXT NOT NULL,
  `estado` TEXT NOT NULL,
  PRIMARY KEY (`idendereco`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome_usuario` TEXT NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `telefone_fixo` DOUBLE NULL,
  `telefone_celular` DOUBLE NOT NULL,
  `email` TEXT NOT NULL,
  `dtnasc` DATE NOT NULL,
  `usuario_status` TINYINT(1) NOT NULL,
  `first_register` DATETIME NOT NULL,
  `last_activation` DATETIME NOT NULL,
  `endereco_idendereco` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_endereco1_idx` (`endereco_idendereco` ASC),
  CONSTRAINT `fk_usuario_endereco1`
    FOREIGN KEY (`endereco_idendereco`)
    REFERENCES `libraryitego`.`endereco` (`idendereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`area` (
  `idarea` INT NOT NULL AUTO_INCREMENT,
  `nome_area` TEXT NOT NULL,
  PRIMARY KEY (`idarea`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`editora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`editora` (
  `ideditora` INT NOT NULL AUTO_INCREMENT COMMENT '	',
  `nome_editora` TEXT NOT NULL,
  PRIMARY KEY (`ideditora`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`livro` (
  `idlivro` INT NOT NULL AUTO_INCREMENT,
  `isbn` TEXT NOT NULL,
  `nome_livro` TEXT NOT NULL,
  `ano_livro` INT(11) NOT NULL,
  `assunto` TEXT NOT NULL,
  `status_livro` TINYINT(1) NOT NULL,
  `edicao` TEXT NOT NULL,
  `area_idarea` INT NOT NULL,
  `editora_ideditora` INT NOT NULL,
  PRIMARY KEY (`idlivro`),
  INDEX `fk_livro_area1_idx` (`area_idarea` ASC),
  INDEX `fk_livro_editora1_idx` (`editora_ideditora` ASC),
  CONSTRAINT `fk_livro_area1`
    FOREIGN KEY (`area_idarea`)
    REFERENCES `libraryitego`.`area` (`idarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_livro_editora1`
    FOREIGN KEY (`editora_ideditora`)
    REFERENCES `libraryitego`.`editora` (`ideditora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`avaliacao` (
  `idavaliacao` INT NOT NULL AUTO_INCREMENT,
  `comentario` TEXT NULL,
  PRIMARY KEY (`idavaliacao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`multa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`multa` (
  `idmulta` INT NOT NULL,
  `situacao` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idmulta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`patrimonio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`patrimonio` (
  `idpatrimonio` INT NOT NULL,
  `livro_idlivro` INT NOT NULL,
  PRIMARY KEY (`idpatrimonio`),
  INDEX `fk_patrimonio_livro1` (`livro_idlivro` ASC),
  CONSTRAINT `fk_patrimonio_livro1`
    FOREIGN KEY (`livro_idlivro`)
    REFERENCES `libraryitego`.`livro` (`idlivro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`emprestimo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`emprestimo` (
  `idemprestimo` INT NOT NULL AUTO_INCREMENT,
  `data_emprestimo` DATETIME  NOT NULL,
  `data_devolucao` DATETIME NOT NULL,
  `avaliacao_idavaliacao` INT NOT NULL,
  `multa_idmulta` INT NOT NULL,
  `patrimonio_idpatrimonio` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idemprestimo`),
  INDEX `fk_emprestimo_avalicao1_idx` (`avaliacao_idavaliacao` ASC),
  INDEX `fk_emprestimo_multa1_idx` (`multa_idmulta` ASC),
  INDEX `fk_emprestimo_patrimonio1` (`patrimonio_idpatrimonio` ASC),
  INDEX `fk_emprestimo_usuario1` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_emprestimo_avalicao1`
    FOREIGN KEY (`avaliacao_idavaliacao`)
    REFERENCES `libraryitego`.`avaliacao` (`idavaliacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_multa1`
    FOREIGN KEY (`multa_idmulta`)
    REFERENCES `libraryitego`.`multa` (`idmulta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_patrimonio1`
    FOREIGN KEY (`patrimonio_idpatrimonio`)
    REFERENCES `libraryitego`.`patrimonio` (`idpatrimonio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `libraryitego`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`valor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`valor` (
  `idvalor` INT NOT NULL AUTO_INCREMENT,
  `valor_diario_multa` DOUBLE NOT NULL,
  `multa_idmulta` INT NOT NULL,
  PRIMARY KEY (`idvalor`),
  INDEX `fk_valor_multa1_idx` (`multa_idmulta` ASC),
  CONSTRAINT `fk_valor_multa1`
    FOREIGN KEY (`multa_idmulta`)
    REFERENCES `libraryitego`.`multa` (`idmulta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`senha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`senha` (
  `idsenha` INT NOT NULL AUTO_INCREMENT,
  `senha_usuario` TEXT NOT NULL,
  `data_cadastro` DATETIME NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idsenha`),
  INDEX `fk_senha_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_senha_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `libraryitego`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`aluno` (
  `idaluno` INT NOT NULL AUTO_INCREMENT COMMENT '		\n\n',
  `nivel` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idaluno`),
  INDEX `fk_aluno_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_aluno_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `libraryitego`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`cargo` (
  `idcargo` INT NOT NULL AUTO_INCREMENT,
  `nome_cargo` TEXT NOT NULL,
  `nivel` INT NOT NULL,
  PRIMARY KEY (`idcargo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`formacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`formacao` (
  `idformacao` INT NOT NULL AUTO_INCREMENT,
  `nome_formacao` TEXT NOT NULL,
  PRIMARY KEY (`idformacao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`funcionario` (
  `idfuncionario` INT NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` INT NOT NULL,
  `cargo_idcargo` INT NOT NULL,
  `formacao_idformacao` INT NOT NULL,
  PRIMARY KEY (`idfuncionario`),
  INDEX `fk_funcionario_usuario1_idx` (`usuario_idusuario` ASC),
  INDEX `fk_funcionario_cargo1_idx` (`cargo_idcargo` ASC),
  INDEX `fk_funcionario_formacao1_idx` (`formacao_idformacao` ASC),
  CONSTRAINT `fk_funcionario_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `libraryitego`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_cargo1`
    FOREIGN KEY (`cargo_idcargo`)
    REFERENCES `libraryitego`.`cargo` (`idcargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_formacao1`
    FOREIGN KEY (`formacao_idformacao`)
    REFERENCES `libraryitego`.`formacao` (`idformacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`tipo` (
  `idtipo` INT NOT NULL AUTO_INCREMENT,
  `nome_tipo` TEXT NOT NULL,
  PRIMARY KEY (`idtipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`curso` (
  `idcurso` INT NOT NULL AUTO_INCREMENT COMMENT '			',
  `nome_curso` TEXT NOT NULL,
  `tipo_idtipo` INT NOT NULL,
  PRIMARY KEY (`idcurso`),
  INDEX `fk_curso_tipo1_idx` (`tipo_idtipo` ASC),
  CONSTRAINT `fk_curso_tipo1`
    FOREIGN KEY (`tipo_idtipo`)
    REFERENCES `libraryitego`.`tipo` (`idtipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`curso_has_aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`curso_has_aluno` (
  `idcurso_has_aluno` INT NOT NULL AUTO_INCREMENT,
  `curso_idcurso` INT NOT NULL,
  `aluno_idaluno` INT NOT NULL,
  `matricula` DOUBLE NOT NULL,
  PRIMARY KEY (`idcurso_has_aluno`, `curso_idcurso`, `aluno_idaluno`),
  INDEX `fk_curso_has_aluno_aluno1_idx` (`aluno_idaluno` ASC),
  INDEX `fk_curso_has_aluno_curso1_idx` (`curso_idcurso` ASC),
  CONSTRAINT `fk_curso_has_aluno_curso1`
    FOREIGN KEY (`curso_idcurso`)
    REFERENCES `libraryitego`.`curso` (`idcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_curso_has_aluno_aluno1`
    FOREIGN KEY (`aluno_idaluno`)
    REFERENCES `libraryitego`.`aluno` (`idaluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`autor` (
  `idautor` INT NOT NULL AUTO_INCREMENT,
  `nome_autor` TEXT NOT NULL,
  PRIMARY KEY (`idautor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libraryitego`.`livro_has_autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `libraryitego`.`livro_has_autor` (
  `idlivro_has_autor` INT NOT NULL AUTO_INCREMENT,
  `livro_idlivro` INT NOT NULL,
  `autor_idautor` INT NOT NULL,
  PRIMARY KEY (`idlivro_has_autor`, `livro_idlivro`, `autor_idautor`),
  INDEX `fk_livro_has_autor_autor1_idx` (`autor_idautor` ASC),
  INDEX `fk_livro_has_autor_livro1_idx` (`livro_idlivro` ASC),
  CONSTRAINT `fk_livro_has_autor_livro1`
    FOREIGN KEY (`livro_idlivro`)
    REFERENCES `libraryitego`.`livro` (`idlivro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_livro_has_autor_autor1`
    FOREIGN KEY (`autor_idautor`)
    REFERENCES `libraryitego`.`autor` (`idautor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
