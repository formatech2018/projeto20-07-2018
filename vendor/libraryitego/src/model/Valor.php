<?php 

namespace Controller\model;
use Controller\model\Table;


	class Valor extends Table{
		
		/**
		* @column(nome=idvalor,required=false)
		*/
		private $idvalor;
		/**
		* @column(nome=valor_diario_multa,required=true)
		*/
		private $valor_diario_multa;

		public function getObject()
		{
			return get_object_vars($this);
		}
		
		public function getIdvalor(){
			return $this->idvalor;
		}
		public function getValor_diario_multa(){
			return $this->valor_diario_multa;
		}
		
		
		public function setIdvalor($idvalor)
		{
			$this->idvalor = $idvalor;
		}
		public function setValor_diario_multa( $valor_diario_multa){
			$this->valor_diario_multa = $valor_diario_multa;
		}
		



	}

 ?>
 