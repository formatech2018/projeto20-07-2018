<?php 
namespace Controller\control;
use \Controller\dao\Livro_has_autorSql;
/**
* 
*/
class LivroHasAutorController extends CrudController
{
	public static function select($table, $bool = false, $join = array())
	{
		$crud = new Livro_has_autorSql();
		return $crud->select($table, $bool, $join);
	}

	public static function insert($table)
	{
		return parent::insert($table);
	}

	public function delete_livro_has_autor ($table)
	{
		$livroHasAutorSql = new Livro_has_autorSql();
		return $livroHasAutorSql->delete_livro_has_autor($table);
	}
}

 ?>