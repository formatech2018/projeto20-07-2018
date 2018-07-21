<?php 

namespace Controller\model;
use Controller\model\Table;


	class Tipo extends Table{
		
		/**
		* @column(nome=idtipo,required=false)
		*/
		private $idtipo;
		/**
		* @column(nome=nome_tipo,required=true)
		*/
		private $nome_tipo;

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdtipo(){
			return $this->idtipo;
		}
		public function getNome_tipo(){
			return $this->nome_tipo;
		}

		public function setIdtipo($idtipo)
		{
			$this->idtipo = $idtipo;
		}
		public function setNome_tipo($nome_tipo){
			$this->nome_tipo = $nome_tipo;
		}




	}

 ?>
 