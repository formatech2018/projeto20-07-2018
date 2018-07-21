<?php 
namespace Controller\dao;

//use Controller\dao\Sql;
use \Controller\util\Retorno;
use \Controller\dao\ControllerSql;
use \PDO;
/**
* 
*/
class CrudSql extends ControllerSql
{
	public function insert($table)
	{
		
		
	}

	public function select2($table, $bool = false, $join = array(),$count = array(),$condicao = array(),$ordem = array(), $group = ""){

			$colunas = "";
			$q = "SELECT  ";

			if (!empty($count)) {
				
				foreach ($count as $key => $value) {
					$colunas .= ", ".$value;
				}	
				$colunas = substr($colunas, 1);
			}
			else{
				$colunas = "*";
			}
			$q .= $colunas." FROM ".$table->getTableName()." ";
			
			if (!empty($join)) {				
				$q .=  $this->setJoin($join, "", $table->getTableName());
			}
			if ($bool) {
				$q .= " WHERE ";
				if (empty($condicao)) {
					$q .= $table->getTableKeyName(). " = '".$table->getPK()."'";
				}
				else{
					$cond = "";
					foreach ($condicao as $key => $value) {
						$cond .= 'and '.$key.' = "'.$value.'" ';
					}
					$cond = substr($cond, 3);
					$q .= $cond;

				}
			}
			if (!empty($group)) {
				$q .= " GROUP BY ".$group." ";
			}
			if (!empty($ordem)) {
				$q .= " ORDER BY ";
				$ord = "";
				foreach ($ordem as $key => $value) {
				
					$ord .= ", ".$key." ".$value;

				}
				$q .= substr($ord, 1);
			}
			//var_dump($q);
			return $this->executeSql($q);
		}
		
		private function setJoin($variables = array(), $res = "", $chave = ""){
			$modelPaste = "Controller\model\\";
			foreach ($variables as $keys => $values) {
						$nameClassKey = $modelPaste.ucfirst($keys);
						$nameClassChave = $modelPaste.ucfirst($chave);
						$tableKeys = new $nameClassKey();
						$tableChave = new $nameClassChave();

						$res .= " inner join ".$tableKeys->getTableName(). " on ".$tableChave->getTableName().".".$tableKeys->getTableName()."_".$tableKeys->getTableKeyName(). " = ".$tableKeys->getTableName().".".$tableKeys->getTableKeyName();
						if (!empty($values)) {
							$res .= $this->setJoin($values, "", $keys);
						}
			}
			return $res;
		}
	
	public function delete($table)
	{
		$q = "DELETE FROM ".$table->getTableName()." where ".$table->getTableKeyName()." = :ID;";

		$values = array(

			':ID' => $table->getPK()
		);
				
			$this->query($q, $values);
			
		//$q2 = "SELECT * FROM ".$table->getTableName()." where ".$table->getTableKeyName()." = :ID;";

			$res = $this->select($table,true);
		
			if (empty($res)) {
				$ret = new Retorno(true, "O registro foi excluído com sucesso!");
				return $ret ;
			}
			else{
				$ret = new Retorno(false, "Erro ao excluir registro da tabela!");
				return $ret;
			}
					
			
		
	}
	public function select($table, $bool = false, $join = array())
	{
		
		$nome_das_colunas = $table->getColumnNames();
		
		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$nome_das_colunas .= "," . $value->getColumnNames();
			}
		}


		$q = "SELECT ".$nome_das_colunas." FROM ". $table->getTableName();
		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$q .= " inner join ". $value->getTableName(). " on ". $table->getTableName().".". $value->getTableName()."_". $value->getTableKeyName()." = ". $value->getTableName().".". $value->getTableKeyName();
			}
		}
		if ($bool) {
			$q .= " WHERE ".$table->getTableKeyName(). " = ".$table->getPK();
		}	
		
		$res = $this->query($q);
		
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}
	/*public function update($table)
	{
		$q = "UPDATE ".$table->getTableName() ." SET ".$table->getUpdateSetValuesNotNull($table)." WHERE ".$table->getTableKeyName(). " = ".$table->getPK().";";

		$arrayupdate = $table->getToArrayUpdateValuesNotNull($table);
		//print_r($arrayupdate);
		$this->query($q, $arrayupdate);
	}*/

}


?>