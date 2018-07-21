<?php 
namespace Controller\control;		

use \Controller\model\Turma_has_Aluno;
use \Controller\dao\Turma_has_alunoSql;
	/**
	* 
	*/
	class TurmaHasAlunoController extends CrudController
{
	public static function insert($table)
	{
		$requireds = $table->getRequireds();

		if (CrudController::isVerifyRequireds($table,$requireds)) {
			
			return parent::insert($table);
		}
		else{
			return array();
		}
	}
	public static function delete($table)
	{
		return parent::delete($table);
	}

	public static function update_matricula($id, $table)
	{
		$crud = new Turma_has_alunoSql();
		return $crud->update_matricula($id, $table);
	}
	// public static function delete_matricula($table)
	// {
	// 	$crud = new Turma_has_alunoSql();
	// 	return $crud->delete_matricula($table);
	// }
	public function getMatricula(Turma_has_Aluno $table)
	{
		$crud = new Turma_has_alunoSql();
		return $crud->getMatricula($table);
	}
	public function getDataToCpf($cpf)
	{
		$crud = new Turma_has_alunoSql();
		return $crud->getDataToCpf($cpf);
	}
	public function getDataToIdTurma($idturma)
	{
		$crud = new Turma_has_alunoSql();
		return $crud->getDataToIdTurma($idturma);
	}
	public function getMatriculasToAluno($idaluno){
		$crud = new Turma_has_alunoSql();
		return $crud->getMatriculasToAluno($idaluno);
	}
	public function getMatriculasToTurma($idturma){
		$crud = new Turma_has_alunoSql();
		return $crud->getMatriculasToTurma($idturma);
	}
}
		
			

	

 ?>