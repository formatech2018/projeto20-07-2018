<?php 
namespace Controller\dao;
use \Controller\dao\CrudSql;
/**
 * 
 */
class VerificaSql extends CrudSql
{
	public function insert_hash($idusuario,$hash)
	{
		$q = "CALL sp_verifica_insert(:ID,:HASH);";
		$values = array(

			':ID' => $idusuario,
			':HASH' => $hash
		);

		return $this->executeSql($q, $values);
	}
	
	
}


 ?>