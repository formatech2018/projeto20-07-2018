<?php
namespace Controller\model;
use Controller\model\Table;


	class Endereco extends Table{
		
		/**
		* @column(nome=idendereco,required=false)
		*/
		private $idendereco;
		/**
		* @column(nome=rua,required=true)
		*/
		private $rua;
		/**
		* @column(nome=complemento,required=true)
		*/
		private $complemento;
		/**
		* @column(nome=numero,required=false)
		*/
		private $numero;
		/**
		* @column(nome=bairro,required=true)
		*/
		private $bairro;
		/**
		* @column(nome=cep,required=true)
		*/
		private $cep;
		/**
		* @column(nome=cidade,required=true)
		*/
		private $cidade;
		/**
		* @column(nome=estado,required=true)
		*/
		private $estado;

		public function getObject()
		{
			return get_object_vars($this);
		}
		public function getIdendereco(){
			return $this->idendereco;
		}
		public function getRua(){
			return $this->rua;
		}
		public function getComplemento(){
			return $this->complemento;
		}
		public function getNumero(){
			return $this->numero;
		}
		public function getBairro(){
			return $this->bairro;
		}
		public function getCep(){
			return $this->cep;
		}
		public function getCidade(){
			return $this->cidade;
		}
		public function getEstado(){
			return $this->estado;
		}


		public function setIdendereco($idendereco)
		{
			$this->idendereco = $idendereco;
		}
		public function setRua($rua){
			$this->rua = $rua;
		}
		public function setComplemento($complemento){
			$this->complemento = $complemento;
		}
		public function setNumero($numero){
			$this->numero = $numero;
		}
		public function setBairro($bairro){
			$this->bairro = $bairro;
		}
		public function setCep($cep){
			$this->cep = $cep;
		}
		public function setCidade($cidade){
			$this->cidade = $cidade;
		}
		public function setEstado($estado){
			$this->estado = $estado;
		}
	}
?>