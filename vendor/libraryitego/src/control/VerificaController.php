<?php 
namespace Controller\control;
use \Controller\dao\VerificaSql;
/**
 * 
 */
class VerificaController extends CrudController
{
	public function insert_hash($idusuario,$hash)
	{
		$sql = new VerificaSql();
		return $sql->insert_hash($idusuario,$hash);
	}

}




 ?>