<?php 
namespace Controller\dao;

/**
* 
*/
class AvaliacaoSql extends CrudSql
{
	
	public function insert($table)
		{
			$q = "CALL sp_avaliacao_insert(:COMENTARIO, :EMPRESTIMO);";
			$values = array(
				':COMENTARIO' => $table->getComentario(),
				':EMPRESTIMO' => $table->getEmprestimo_idemprestimo()->getIdemprestimo()
			);
			var_dump($values);
			return $this->executeSql($q, $values);

		}
	public function AvaliacaoInsert($comentario,$idemprestimo){

		$q = "INSERT into avaliacao (comentario,emprestimo_idemprestimo) values (:COMENTARIO,:ID);";

		$values = array(

			':COMENTARIO' => $comentario,
			':ID' => $idemprestimo
		);
		
		return $this->executeSql($q, $values);
	}	
}

 ?>