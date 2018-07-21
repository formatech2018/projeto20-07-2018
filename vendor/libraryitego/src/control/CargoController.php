<?php 
namespace Controller\control;
use \Controller\dao\CargoSql;
/**
* 
*/
class CargoController extends CrudController
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

	public function update_nivel($idcargo,$nivel){

		$sql = new CargoSql();
		return $sql->update_nivel($idcargo,$nivel);
	}
}
 ?>