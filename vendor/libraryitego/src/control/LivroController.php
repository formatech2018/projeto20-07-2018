<?php 
namespace Controller\control;
use Controller\dao\LivroSql;
use \Controller\model\Livro;
/**
* 
*/
class LivroController extends CrudController
{
	
	public static function insert($table)
	{
		$requireds = $table->getEditora_ideditora()->getRequireds();
		$requireds = $table->getArea_idarea()->getRequireds();

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


	public function search_livro_like_name ($nome_livro, $isbn)
	{
		$livrosql = new LivroSql();
		return $livrosql->search_livro_like_name($nome_livro,$isbn);
	}

}

 ?>