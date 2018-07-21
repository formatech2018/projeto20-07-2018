<?php 
namespace Controller\dao;

/**
* 
*/
class CursoSql extends CrudSql
{
	
	public function insert($table)
		{
			
			$q = "CALL sp_curso_insert(:NOME,:TIPO,:CARGA,:VAGAS);";
			$values = array(
				':NOME' => $table->getNome_curso(),
				':TIPO'=> $table->getTipo_idtipo()->getIdtipo(),
				':CARGA' => $table->getCarga_horaria(),
				':VAGAS' => $table->getVagas()
				
				
				
			);
			
			return $this->executeSql($q, $values);
		}
		public function update($table)
		{
			$q = "CALL sp_curso_update(:ID,:NOME,:TIPO,:CARGA,:VAGAS);";
			$values = array(
				':ID'=> $table->getIdcurso(),
				':NOME' => $table->getNome_curso(),
				':TIPO' => $table->getTipo_idtipo()->getIdtipo(),
				':CARGA' => $table->getCarga_horaria(),
				':VAGAS' => $table->getVagas()
			);
			
			return $this->executeSql($q, $values);
		}	
		public function search_curso_like_name ($nome_curso, $tipo){

			$q = "SELECT idcurso,nome_curso,nome_tipo from curso inner join tipo on
			curso.tipo_idtipo = tipo.idtipo 

			where nome_curso like '%".$nome_curso."%' ";

			if (!empty($tipo)) {
				
				$q .= " and tipo_idtipo = :TIPO;";
			}

			$values = array(
				//':CURSO' => $nome_curso,
				':TIPO'=> $tipo
			);
			return $this->executeSql($q, $values);
		}
		
}

 ?>