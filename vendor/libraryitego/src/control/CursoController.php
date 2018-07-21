<?php 
namespace Controller\control;
use Controller\dao\CursoSql;
/**
* 
*/
class CursoController extends CrudController
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

	public static function update($table)
	{
		$requireds = $table->getRequireds();

		if (CrudController::isVerifyRequireds($table,$requireds)) {
			
			return parent::update($table);
		}
		else{
			return array();
		}
	}
	
	public function search_curso_like_name ($nome_curso, $tipo)
	{
		$cursosql = new CursoSql();
		return $cursosql->search_curso_like_name($nome_curso,$tipo);
	}
}

 ?>