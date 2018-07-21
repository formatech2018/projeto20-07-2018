<?php 
namespace Controller\dao;

use Controller\dao\UsuarioSql;

/**
* 
*/
class FuncionarioSql extends UsuarioSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_funcionario_insert(:NOME, :CPF, :FIXO, :CELULAR, :EMAIL, :DTNASC, :RUA, :COMPLEMENTO, :NUMERO, :BAIRRO, :CEP, :CIDADE, :ESTADO, :CARGO, :FORMACAO);";
			
			$values = $this->setData($table);
			
			$values += array(

				':CARGO' => $table->getCargo_idcargo()->getIdcargo(),
				':FORMACAO' => $table->getFormacao_idformacao()->getIdformacao()
			);
				
			return $this->executeSql($q, $values);
		}	
		public function update($table){
			$q = "CALL sp_funcionario_update(:IDFUNCIONARIO, :IDUSUARIO, :IDENDERECO, :NOME, :CPF, :FIXO, :CELULAR, :EMAIL, :DTNASC, :RUA, :COMPLEMENTO, :NUMERO, :BAIRRO, :CEP, :CIDADE, :ESTADO, :CARGO, :FORMACAO);";
			
			$values = array(

				':IDUSUARIO' => $table->getUsuario_idusuario()->getIdusuario(),
				':IDFUNCIONARIO' => $table->getIdfuncionario(),
				':IDENDERECO' => $table->getUsuario_idusuario()->getEndereco_idendereco()->getIdendereco()
			);
			$values += $this->setData($table);

			$values += array(

				':CARGO' => $table->getCargo_idcargo()->getIdcargo(),
				':FORMACAO' => $table->getFormacao_idformacao()->getIdformacao()
			);
			//var_dump($values);
				
			return $this->executeSql($q, $values);
		}
		
			

}

 ?>