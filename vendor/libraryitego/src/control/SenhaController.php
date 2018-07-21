<?php 
namespace Controller\control;
use \Controller\util\Encripty;
/**
* 
*/
class SenhaController extends CrudController
{
	public static function insert($table)
	{
		$senha = $table->getSenha_usuario();
		$senha = Encripty::toEncripty($senha);
		$table->setSenha_usuario($senha);

		return parent::insert($table);
	}
}


 ?>