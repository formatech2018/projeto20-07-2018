<?php 
namespace Controller\control;

/**
* 
*/
class ValorController extends CrudController
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
}
 ?>