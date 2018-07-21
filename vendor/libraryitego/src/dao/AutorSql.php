<?php 
namespace Controller\dao;


/**
* 
*/
class AutorSql extends CrudSql
{
		public function insert($table)
		{
			$q = "CALL sp_autor_insert(:NOME);";
			$values = array(
				':NOME' => $table->getNome_autor(),
			);
			
			return $this->executeSql($q, $values);
		}
		
		public function update($table)
		{
		$q = "CALL sp_autor_update(:ID,:NOME);";
		$values = array(
			':ID'=> $table->getIdautor(),
			':NOME' => $table->getNome_autor()
		);
		
		return $this->executeSql($q, $values);
		}		
}	



 ?>