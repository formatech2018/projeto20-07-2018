<?php 
namespace Controller\util;
/**
 * 
 */
class RetornoLogin extends Retorno
{
	private $nivel;
	private $id;
	function __construct($success, $message, $nivel = '0',$id = null)
	{
		$this->success = $success;
		$this->message = $message;
		$this->nivel = $nivel;
		$this->id = $id;

	}

		public function getNivel(){
			return $this->nivel;
		}

		public function setNivel($nivel){
			$this->nivel = $nivel;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}
}

 ?>