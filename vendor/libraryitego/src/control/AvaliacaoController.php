<?php 
namespace Controller\control;
use \Controller\dao\AvaliacaoSql;
/**
* 
*/
class AvaliacaoController extends CrudController
{
	
	public static function insert($table)
	{
		return parent::insert($table);
	}

	public static function avaliacaoInsert($comentario,$idmeprestimo){

		$sql = new AvaliacaoSql();
		return $sql->avaliacaoInsert($comentario,$idmeprestimo);
	}
}

 ?>