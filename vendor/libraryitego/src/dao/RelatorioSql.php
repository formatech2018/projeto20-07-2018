<?php 
namespace Controller\dao;
	/**
	* 
	*/
	class RelatorioSql extends Sql
	{
		public function select($table, $bool = false, $join = array(),$count = array(),$condicao = array(),$ordem = array(), $group = ""){

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
						$cond .= 'and '.$key.' = '.$value.' ';
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
		public function selectTurmasAtivas($data, $turno)
		{
			$q = "SELECT * from turma INNER JOIN turno on turma.turno_idturno = turno.idturno WHERE data_termino >= :DATA AND nome_turno = :TURNO and data_inicio <= :DATA;";

			$values = array(
				':DATA' => $data,
				':TURNO' => $turno
						
			);
			 
			return $this->executeSql($q, $values);
		}

	}
 ?>