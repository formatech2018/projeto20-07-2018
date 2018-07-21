<?php 

namespace Controller\model;
use Controller\model\Table;


	class Verifica extends Table{
		
		/**
		* @column(nome=usuario_idusuario,required=false)
		*/
		private $usuario_idusuario;
		/**
		* @column(nome=data_verifica,required=false)
		*/
		private $data_verifica;
		/**
		* @column(nome=hash_verifica,required=false)
		*/
		private $hash_verifica;
	

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getUsuario_idusuario(): Usuario{
			return $this->usuario_idusuario;
		}
		public function getData_verifica(){
			return $this->data_verifica;
		}
		public function getHash_verifica(){
			return $this->hash_verifica;
		}
		

		public function setUsuario_idusuario(Usuario $usuario_idusuario)
		{
			$this->usuario_idusuario = $usuario_idusuario;
		}

		public function setData_verifica($data_verifica){
			$this->data_verifica = $data_verifica;
		}

		public function setHash($hash_verifica){
			$this->hash_verifica = $hash_verifica;
		}

	}

 ?>
 