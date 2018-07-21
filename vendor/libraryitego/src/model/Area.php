<?php 

namespace Controller\model;
use Controller\model\Table;


	class Area extends Table{
		
		/**
		* @column(nome=idarea,required=false)
		*/
		private $idarea;
		/**
		* @column(nome=nome_area,required=true)
		*/
		private $nome_area;

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdarea(){
			return $this->idarea;
		}
		public function getNome_area(){
			return $this->nome_area;
		}

		public function setIdarea($idarea)
		{
			$this->idarea = $idarea;
		}
		public function setNome_area($nome_area){
			$this->nome_area = $nome_area;
		}




	}

 ?>
 