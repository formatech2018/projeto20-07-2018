<?php 
namespace Controller\dao;
use \Controller\util\Retorno;

/**
* 
*/
class PatrimonioSql extends CrudSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_patrimonio_insert(:PATRIMONIO, :LIVRO);";
			$values = array(
				':PATRIMONIO' => $table->getIdpatrimonio(),
				':LIVRO' => $table->getLivro_idlivro()->getIdlivro()

				
			);
			
			return $this->executeSql($q, $values);

		}

	public function update_patrimonio($id, $table)
	{
		$q = "CALL sp_patrimonio_update(:IDANTIGO, :IDNOVO);";
		$values = array(
			':IDANTIGO'=> $id,
			'IDNOVO' =>	$table->getIdpatrimonio()
			
		);
		return $this->executeSql($q, $values);
	}

	public function disabled($table){

		$q = "UPDATE patrimonio set patrimonio_status = 0 where idpatrimonio = :ID ;";
		$q2 = "SELECT * from patrimonio where idpatrimonio = :ID and patrimonio_status = 0;";

		$values = array(

			'ID' => $table->getIdpatrimonio()

		);

		$this->executeSql($q,$values);

		$res = $this->executeSql($q2, $values);

		if (!empty($res)) {
			$ret = new Retorno(true, "O Patrimônio foi excluído com sucesso!");
				return $ret ;
			}
			else{
				$ret = new Retorno(false, "Erro ao excluir patrimônio da tabela!");
				return $ret;
			}

	}

	public function qtd_emprestimos($table){

		$q = "SELECT COUNT(*) from emprestimo where patrimonio_idpatrimonio = :ID;";

		$values = array(

			'ID' => $table->getIdpatrimonio()

		);
		return $this->executeSql($q,$values);

	}		
}


 ?>