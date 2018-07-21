<?php 
namespace Controller\control;

use \Controller\dao\CrudSql;
use \Controller\control\CrudController;
//use Controller\dao\UsuarioSql;

/**
* 
*/
class AlunoController extends UsuarioController
{
	public static function insert($aluno)
	{
		
		$requireds = $aluno->getRequireds();

		if (CrudController::isVerifyRequireds($aluno,$requireds)) {
			
			return parent::insert($aluno);
		}
		else{
			return array();
		}
		

	}

}
	
?>
