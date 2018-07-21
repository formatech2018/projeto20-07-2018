<?php 

namespace Controller\model;
use Controller\model\{Usuario,Cargo,Formacao};


	class Funcionario extends Table{

		/**
		* @column(nome=idfuncionario,required=false)
		*/
		private $idfuncionario;
		/**
		* @column(nome=usuario_idusuario,required=false)
		*/
		private $usuario_idusuario;
		/**
		* @column(nome=idcargo,required=true)
		*/
		private $cargo_idcargo;
		/**
		* @column(nome=idformacao,required=true)
		*/
		private $formacao_idformacao;

		function __construct()
		{
			$this->cargo_idcargo = new Cargo();
			$this->formacao_idformacao = new Formacao();
			$this->usuario_idusuario = new Usuario();
		}
		
		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdfuncionario(){
			return $this->idfuncionario;
		}
		public function getUsuario_idusuario(): Usuario{
			return $this->usuario_idusuario;
		}
		public function getCargo_idcargo(): Cargo{
			return $this->cargo_idcargo;
		}
		public function getFormacao_idformacao(): Formacao{
			return $this->formacao_idformacao;
		}

		public function setIdfuncionario($idfuncionario)
		{
			$this->idfuncionario = $idfuncionario;
		}
		public function setUsuario_idusuario(Usuario $usuario){
			$this->usuario_idusuario = $usuario;
		}
		public function setCargo_idcargo(Cargo $cargo){
			$this->cargo_idcargo = $cargo;
		}
		public function setFormacao_idformacao(Formacao $formacao){
			$this->formacao_idformacao = $formacao;
		}


	}

 ?>
 