<?php 

namespace Controller\model;
use Controller\model\{Table,Livro};


	class Patrimonio extends Table{
		
		/**
		* @column(nome=idpatrimonio,required=false)
		*/
		private $idpatrimonio;
		/**
		* @column(nome=livro_idlivro,required=true)
		*/
		private $livro_idlivro;
		/**
		* @column(nome=patrimonio_status,required=false)
		*/
		private $patrimonio_status;

		function __construct()
		{
			$this->livro_idlivro = new Livro();
		}

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdpatrimonio(){
			return $this->idpatrimonio;
		}
		public function getLivro_idlivro(): Livro{
			return $this->livro_idlivro;
		}

		public function getPatrimonio_status(){
			return $this->patrimonio_status;
		}

		public function setIdpatrimonio($idpatrimonio)
		{
			$this->idpatrimonio = $idpatrimonio;
		}
		public function setLivro_idlivro(Livro $livro){
			$this->livro_idlivro = $livro;
		}
		public function setPatrimonio_status($patrimonio_status){
			$this->patrimonio_status = $patrimonio_status;
		}





	}

 ?>