<?php 


namespace Controller\model;
use Controller\model\Table;


	class Editora extends Table{
		
		/**
		* @column(nome=ideditora,required=false)
		*/
		private $ideditora;
		/**
		* @column(nome=nome_editora,required=true)
		*/
		private $nome_editora;
		function __construct()
		{
			$this->nome_editora = "";
		}

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdeditora(){
			return $this->ideditora;
		}
		public function getNome_editora(){
			return $this->nome_editora;
		}

		public function setIdeditora($ideditora)
		{
			$this->ideditora = $ideditora;
		}
		public function setNome_editora($nome_editora){
			$this->nome_editora = $nome_editora;
		}




	}
 ?>