<?php 
namespace Controller\dao;

use \Controller\dao\ControllerSql;

/**
* 
*/
class LoginSql extends ControllerSql
{
	

	public function is_exist($email = "", $senha = "")
	{
		$q = "SELECT * from usuario inner join senha on usuario.idusuario = senha.usuario_idusuario where senha_usuario = :SENHA and email = :EMAIL";

		$values = array(
			':EMAIL' => $email,
			':SENHA' => $senha
		);

		return $this->executeSql($q, $values);
				
	}
	public function getPasswords($idusuario)
	{
		$q = "SELECT senha_usuario from senha where usuario_idusuario = :ID
		order by senha.idsenha desc;";
		$values = array(
			'ID' => $idusuario
		);
		return $this->executeSql($q, $values);
	}

		public function getNivelFuncionario($idusuario)
		{
			$q = "SELECT nivel from funcionario INNER JOIN cargo on funcionario.cargo_idcargo = cargo.idcargo 
				WHERE usuario_idusuario = :ID;";
			$values = array(
				':ID' => $idusuario
			);
			$res = $this->executeSql($q, $values);
			return $res[0];
		}

		public function select3($table, $bool = false, $join = array(),$count = array(),$condicao = array(),$ordem = array(), $group = ""){

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

}
?>