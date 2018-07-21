<?php 
namespace Controller\dao;

/**
* 
*/
class TipoSql extends CrudSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_tipo_curso_insert(:NOME);";
			$values = array(
				':NOME' => $table->getNome_tipo(),
			);
			
			return $this->executeSql($q, $values);
		}	

		public function update($table)
	{
		$q = "CALL sp_tipo_update(:ID,:NOME);";
		$values = array(
			':ID'=> $table->getIdtipo(),
			':NOME' => $table->getNome_tipo()
		);
		
		return $this->executeSql($q, $values);
	}	
}



 ?>