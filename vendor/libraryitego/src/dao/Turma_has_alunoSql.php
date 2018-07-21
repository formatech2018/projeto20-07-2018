<?php 
namespace Controller\dao;
use \Controller\model\Turma_has_Aluno;
/**
* 
*/
class Turma_has_alunoSql extends CrudSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_turma_has_aluno_insert ( :TURMA, :ALUNO, :MATRICULA);";
			$values = array(
				':TURMA' => $table->getTurma_idturma()->getIdturma(),
				':ALUNO' => $table->getAluno_idaluno()->getIdaluno(),
				':MATRICULA' => $table->getMatricula()
			);
			return $this->executeSql($q, $values);

		}

	public function update_matricula($id, $table)
	{
		$q = "CALL sp_turma_has_aluno_update(:IDANTIGO, :IDNOVO);";
		$values = array(
			':IDANTIGO'=> $id,
			'IDNOVO' =>	$table->getMatricula()
			
		);
		return $this->executeSql($q, $values);
	}

	public function delete($table)
	{
		$q = "DELETE FROM turma_has_aluno WHERE matricula = :MATRICULA;";
		$values = array(
			':MATRICULA' =>	$table->getMatricula()
			
		);
		return $this->executeSql($q, $values);
	}				

	public  function getMatricula(Turma_has_Aluno $table){
		$q = "SELECT matricula from ".$table->getTableName()." where turma_idturma = :TURMA and aluno_idaluno = :ALUNO;";
		$values = array(

			':TURMA' => $table->getTurma_idturma()->getIdturma(),
			':ALUNO' => $table->getAluno_idaluno()->getIdaluno()
		);
		return $this->executeSql($q, $values);
	}
	public function getDataToCpf($cpf)
		{
			//$q = "CALL sp_usuario_getidtocpf( :CPF);";
			$q = "select idaluno, cpf, nome_usuario, dtnasc from aluno inner join usuario 
    				on aluno.usuario_idusuario = usuario.idusuario
   					 where cpf = :CPF ;";
			 $values = array(

			 	':CPF' => $cpf
			 );
			 return $this->executeSql($q, $values);

		}
		public function read($table,$busca = array('inicio' => 0, 'limite' => 10, 'ordem' => ''), $join = array(), $where = array()){

			$q = "select ";
		
			if ($table->getTurma_idturma()->getIdturma() != null) {
				$q .= " matricula, idturma, data_inicio, data_termino, nome_curso, nome_usuario, nome_tipo, idcurso, nome_turno from turma_has_aluno 
					inner join turma on turma_has_aluno.turma_idturma = turma.idturma
					 inner join aluno on turma_has_aluno.aluno_idaluno = aluno.idaluno
 					inner join usuario on aluno.usuario_idusuario = usuario.idusuario
					inner join curso on turma.curso_idcurso = curso.idcurso 
					inner join tipo on curso.tipo_idtipo = tipo.idtipo 
					inner join turno on turma.turno_idturno = turno.idturno 
   					where turma.idturma = :IDTURMA ";

   				$q2 = " SELECT COUNT(*) FROM ".$table->getTableName()." where turma_idturma = :IDTURMA ;";

			}
			else if ($table->getAluno_idaluno()->getIdaluno() != null) {
				$q .= " matricula, idaluno, nome_usuario, cpf,nome_curso, nome_tipo, data_inicio, data_termino, nome_turno from turma_has_aluno
				  inner join aluno on turma_has_aluno.aluno_idaluno = aluno.idaluno
				  inner join turma on turma_has_aluno.turma_idturma = turma.idturma
				  inner join turno on turma.turno_idturno = turno.idturno
				  inner join curso on turma.curso_idcurso = curso.idcurso
				  inner join tipo on curso.tipo_idtipo = tipo.idtipo
				  inner join usuario on aluno.usuario_idusuario = usuario.idusuario
				  where idaluno = :IDALUNO ";

				$q2 = " SELECT COUNT(*) FROM ".$table->getTableName()." where aluno_idaluno = :IDALUNO ;";
			}
			else
			{
				$q.= " * from turma_has_aluno 
				
				  inner join aluno on turma_has_aluno.aluno_idaluno = aluno.idaluno
				  inner join turma on turma_has_aluno.turma_idturma = turma.idturma
				  inner join turno on turma.turno_idturno = turno.idturno
				  inner join curso on turma.curso_idcurso = curso.idcurso
				  inner join tipo on curso.tipo_idtipo = tipo.idtipo
				  inner join usuario on aluno.usuario_idusuario = usuario.idusuario";

				  $q2 = " SELECT COUNT(*) FROM ".$table->getTableName();
			}

			if (!empty($busca['ordem'])) {

				$q .= " order by ".$busca['ordem']." asc "; 
			}
		
				$q .= "  LIMIT ".$busca['inicio']." , ".(int) $busca['limite']. ";";

			$values = array();

			if ($table->getTurma_idturma()->getIdturma() != null) {
				$values[':IDTURMA'] = $table->getTurma_idturma()->getIdturma();
			}
			elseif ($table->getAluno_idaluno()->getIdaluno() != null) {
				$values[':IDALUNO'] = $table->getAluno_idaluno()->getIdaluno();
			}
			
			$resultado = array($this->executeSql($q, $values), $this->executeSql($q2, $values));
			return $resultado;


		}	
		public function getDataToIdTurma($idturma)
		{
			$q = "select idturma, data_inicio, data_termino, nome_curso, nome_tipo, idcurso, nome_turno from turma 
			inner join curso on turma.curso_idcurso = curso.idcurso 
			inner join tipo on curso.tipo_idtipo = tipo.idtipo 
			inner join turno on turma.turno_idturno = turno.idturno 
   			where turma.idturma = :IDTURMA ;";
			 $values = array(

			 	':IDTURMA' => $idturma
			 );
			 return $this->executeSql($q, $values);
		}

		public function getMatriculasToAluno($idaluno){

			$q = "select matricula, idaluno, nome_usuario, cpf,nome_curso, nome_tipo, data_inicio, data_termino, nome_turno from turma_has_aluno
				  inner join aluno on turma_has_aluno.aluno_idaluno = aluno.idaluno
				  inner join turma on turma_has_aluno.turma_idturma = turma.idturma
				  inner join turno on turma.turno_idturno = turno.idturno
				  inner join curso on turma.curso_idcurso = curso.idcurso
				  inner join tipo on curso.tipo_idtipo = tipo.idtipo
				  inner join usuario on aluno.usuario_idusuario = usuario.idusuario
				  where idaluno = :IDALUNO;";

			$values = array(

				':IDALUNO' => $idaluno

			);
			return $this->executeSql($q, $values);
		}

		public function getMatriculasToTurma($idturma){

			$q = "select matricula, idturma,nome_curso, nome_tipo, data_inicio, nome_usuario,data_termino, nome_turno from turma_has_aluno
				  inner join turma on turma_has_aluno.turma_idturma = turma.idturma
				  inner join turno on turma.turno_idturno = turno.idturno
				  inner join curso on turma.curso_idcurso = curso.idcurso
				  inner join tipo on curso.tipo_idtipo = tipo.idtipo
				  inner join aluno on turma_has_aluno.aluno_idaluno = aluno.idaluno
				  inner join usuario on aluno.usuario_idusuario = usuario.idusuario
				  where idturma = :IDTURMA;";

			$values = array(

				':IDTURMA' => $idturma

			);
			return $this->executeSql($q, $values);
		}

}

 ?>