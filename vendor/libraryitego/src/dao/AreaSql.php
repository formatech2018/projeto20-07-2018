<?php 
namespace Controller\dao;		
/**
* 
*/
class AreaSql extends CrudSql
{
	
	public function insert($table)
	{
		$q = "CALL sp_area_insert(:NOME);";
		$values = array(
			':NOME' => $table->getNome_area(),
		);
		
		return $this->executeSql($q, $values);
	}
	public function update($table)
	{
		$q = "CALL sp_area_update(:ID,:NOME);";
		$values = array(
			':ID'=> $table->getIdarea(),
			':NOME' => $table->getNome_area()
		);
		
		return $this->executeSql($q, $values);
	}	
}


 ?>