<?php 

namespace Controller\dao;

use \Controller\dao\Sql;


/**
 * 
 */
class ControllerSql extends Sql
{
	
	public function selectFuncionario($idusuario){

		$q = "SELECT * from funcionario 
			  inner join cargo on funcionario.cargo_idcargo = cargo.idcargo
			  where usuario_idusuario = :ID;";

		$values = array(

			':ID' => $idusuario
		);

		return $this->executeSql($q,$values);

	}

	public function selectAluno($idusuario){

		$q = "SELECT * from aluno 
			   where usuario_idusuario = :ID;";

		$values = array(

			':ID' => $idusuario
		);

		return $this->executeSql($q,$values);

	}

	public function is_funcionario($idusuario)
		{
			$q = "SELECT * from funcionario WHERE usuario_idusuario = :ID;";
			$values = array(
				':ID' => $idusuario
			);
				$ret = $this->executeSql($q, $values);
				if (!empty($ret)) {
					return true;
				}else{
					return false;
				}
		}
}

 ?>