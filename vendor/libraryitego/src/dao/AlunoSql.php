<?php 
namespace Controller\dao;

use Controller\dao\Sql;

/**
* 
*/
class AlunoSql extends UsuarioSql
{

	public function insert($table)
	{
		$q = "CALL sp_aluno_insert(:NOME, :CPF, :FIXO, :CELULAR, :EMAIL, :DTNASC, :RUA, :COMPLEMENTO, :NUMERO, :BAIRRO, :CEP, :CIDADE, :ESTADO);";
		
		$values = array();

		$values += $this->setData($table);

		return $this->executeSql($q, $values);
	}
	public function update ($table){
		$q = "CALL sp_aluno_update(:IDALUNO, :IDUSUARIO, :IDENDERECO, :NOME, :CPF, :FIXO, :CELULAR, :EMAIL, :DTNASC, :RUA, :COMPLEMENTO, :NUMERO, :BAIRRO, :CEP, :CIDADE, :ESTADO);";
			
			$values = array(
				':IDUSUARIO' => $table->getUsuario_idusuario()->getIdusuario(),
				':IDALUNO' => $table->getIdaluno(),
				':IDENDERECO' => $table->getUsuario_idusuario()->getEndereco_idendereco()->getIdendereco()
			);
			$values += $this->setData($table);
			//var_dump($values);
				
			return $this->executeSql($q, $values);

	}
		
}
 
 ?>