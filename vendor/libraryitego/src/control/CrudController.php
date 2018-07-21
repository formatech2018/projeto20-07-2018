<?php 
namespace Controller\control;

use Controller\dao\CrudSql;

//use Controller\dao\UsuarioSql;

/**
* 
*/
class CrudController extends Controller
{
	public function select2($table, $bool = false, $join = array(),$count = false, $condicao = array(), $ordem = array(), $group = ""){

			$crud = new CrudSql();
			return $crud->select2($table, $bool, $join,$count,$condicao,$ordem,$group);
		}

	public static function select($table, $bool = false, $join = array())
	{
		$crud = new CrudSql();
		return $crud->select($table, $bool, $join);
	}
	public static function insert($table)
	{
		$class = "Controller\dao\\".ucfirst($table->getTableName())."Sql";
		$crud = new $class();
		return $crud->insert($table);
	}
	public static function delete($table)
	{
		$class = "Controller\dao\\".ucfirst($table->getTableName())."Sql";
		$crud = new $class();
		return $crud->delete($table);
	}
	public static function update($table)
	{
		$class = "Controller\dao\\".ucfirst($table->getTableName())."Sql";
		$crud = new $class();
		return $crud->update($table);
	}
	public function read($table, $busca = array('inicio' => 0, 'limite' => 10, 'ordem' => ''), $join = array(), $where = array())
	{
		$class = "Controller\dao\\".ucfirst($table->getTableName())."Sql";
		$crud = new $class();
		return $crud->read($table,$busca, $join, $where);
	}

	public static function isVerifyRequireds($table,$requireds)
	{
		$i = 0;
		foreach ($_POST as $key => $value) {
			
			if (empty($_POST[$key]) && isset($requireds[$key]) && $requireds[$key] == true) {
				$i++;
			}
			
		}
		if ($i > 0) {
			return false;
		}
		else{
			return true;
		}


	}

	public function mask($val, $mask)

	{

		 $maskared = '';

		 $k = 0;

		 for($i = 0; $i<=strlen($mask)-1; $i++)

		 {

			 if($mask[$i] == '#')

		 {

			 if(isset($val[$k]))

		 $maskared .= $val[$k++];

		 }

			 else

		 {

			 if(isset($mask[$i]))

		 $maskared .= $mask[$i];

		 }

		 }

		 return $maskared;

		}
	
}
	
?>
