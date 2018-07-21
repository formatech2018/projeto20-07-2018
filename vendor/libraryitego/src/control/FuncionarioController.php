<?php 

namespace Controller\control;

use Controller\dao\CrudSql;
//use Controller\dao\UsuarioSql;

/**
* 
*/
class FuncionarioController extends UsuarioController
{

	public static function insert($funcionario)
	{
		
		$requireds = $funcionario->getRequireds();
		

		if (CrudController::isVerifyRequireds($funcionario,$requireds)) {
			
			return parent::insert($funcionario);
		}
		else{
			return array();
		}
		
	}
	
}
?>