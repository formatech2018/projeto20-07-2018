<?php 
namespace Controller\dao;

/**
 * 
 */
class TurnoSql extends CrudSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_turno_insert(:NOME);";
			$values = array(
				':NOME' => $table->getNome_turno()
			);
		
			return $this->executeSql($q, $values);
		}

	public function update($table)
	{
		$q = "CALL sp_turno_update(:ID,:NOME);";
		$values = array(
			':ID'=> $table->getIdturno(),
			':NOME' => $table->getNome_turno()
		);
		
		return $this->executeSql($q, $values);
	}	

	/*public function delete($table)
	{
		$q = "DELETE FROM turno WHERE idturno = :ID;";
		$values = array(
			':ID' =>	$table->getIdturno()
			
		);
		return $this->executeSql($q, $values);
	}					*/
}

 ?>