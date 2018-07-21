<?php 
namespace Controller\dao;

/**
 * 
 */
class TurmaSql extends CrudSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_curso_turma_insert(:INICIO, :TERMINO ,:IDCURSO, :IDTURNO);";
			$values = array(
				':INICIO' => $table->getData_inicio(),
				':TERMINO' => $table->getData_termino(),
				':IDCURSO' =>$table->getCurso_idcurso()->getIdcurso(),
				':IDTURNO' =>$table->getTurno_idturno()->getIdturno()
			);
			
			return $this->executeSql($q, $values);
		}
		public function update($table)
	{
		$q = "CALL sp_turma_update(:ID,:INICIO,:TERMINO,:TURNO);";
		$values = array(
			':ID'=> $table->getIdturma(),
			':INICIO' => $table->getData_inicio(),
			':TERMINO' => $table->getData_termino(),
			':TURNO' => $table->getTurno_idturno()->getIdturno()
			
		);
		return $this->executeSql($q, $values);
	}		
}

 ?>