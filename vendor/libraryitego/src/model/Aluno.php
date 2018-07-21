<?php 

namespace Controller\model;
use Controller\model\Usuario;


	class Aluno extends Table{
		
		/**
		* @column(nome=idaluno,required=false)
		*/
		private $idaluno;
		/**
		* @column(nome=nivel,required=false)
		*/
		private $nivel;
		/**
		* @column(nome=usuario_idusuario,required=false)
		*/
		private $usuario_idusuario;

		function __construct()
		{
			$this->usuario_idusuario = new Usuario();
		}

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdaluno(){
			return $this->idaluno;
		}
		public function getNivel(){
			return $this->nivel;
		}
		public function getUsuario_idusuario(): Usuario{
			return $this->usuario_idusuario;
		}

		public function setIdaluno($idaluno)
		{
			$this->idaluno = $idaluno;
		}
		public function setNivel($nivel){
			$this->nivel = $nivel;
		}
		public function setUsuario_idusuario(Usuario $usuario){
			$this->usuario_idusuario = $usuario;
		}





	}

 ?>