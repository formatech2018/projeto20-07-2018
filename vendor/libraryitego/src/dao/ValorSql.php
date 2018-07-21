<?php 
namespace Controller\dao;

/**
* 
*/
class ValorSql extends CrudSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_valor_multa_insert(:VALOR_DIARIO_MULTA);";
			$values = array(
				':VALOR_DIARIO_MULTA' => $table->getValor_diario_multa()
			);
			
			return $this->executeSql($q, $values);
		}	
}

 ?>