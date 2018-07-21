<?php 
namespace Controller\util;

class Retorno
{
	
	protected $success;
	protected $message;

	function __construct($success = false, $message = "")
	{
		$this->success = $success;
		$this->message = $message;
	}

		public function getSuccess(){
			return $this->success;
		}

		public function setSuccess($success){
			$this->success = $success;
		}

		public function getMessage(){
			return $this->message;
		}

		public function setMessage($message){
			$this->message = $message;
		}

}

 ?>