<?php 
namespace Controller\control;
use \Controller\dao\PatrimonioSql;

/**
* 
*/
class PatrimonioController extends CrudController
{
	
	public static function insert($table)
	{
		return parent::insert($table);
	}

	public static function update_patrimonio($id,$table)
	{
		
		$sql = new PatrimonioSql();
		return $sql->update_patrimonio($id,$table);
	}

	public static function delete($table)
	{
		$sql = new PatrimonioSql();
		$res = $sql->qtd_emprestimos($table);

		if ($res[0]['COUNT(*)'] === "0") {
			
			return parent::delete($table);
		}
		else{

			return $sql->disabled($table);
		}
	}
}


 ?>