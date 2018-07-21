<?php 

namespace Controller\model;
use Controller\model\Table;


	class Autor extends Table{
		
		/**
		* @column(nome=idautor,required=false)
		*/
		private $idautor;
		/**
		* @column(nome=nome_autor,required=true)
		*/
		private $nome_autor;

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdautor(){
			return $this->idautor;
		}
		public function getNome_autor(){
			return $this->nome_autor;
		}

		public function setIdautor($idautor)
		{
			$this->idautor = $idautor;
		}
		public function setNome_autor($nome_autor){
			$this->nome_autor = $nome_autor;
		}




	}

 ?>