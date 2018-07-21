<?php 
namespace Controller\dao;

use \Controller\util\Retorno;
/**
* 
*/
class Livro_has_autorSql extends CrudSql
{
	
	public function select($table, $bool = false, $join = array()){
		$q = "SELECT livro_idlivro, idlivro, idautor, autor_idautor, nome_livro, nome_autor FROM livro_has_autor 
			INNER JOIN livro on livro_has_autor.livro_idlivro=livro.idlivro
			INNER JOIN autor on livro_has_autor.autor_idautor=autor.idautor
			WHERE livro_idlivro=:LIVRO and autor_idautor=:AUTOR;";
		$values = array(
			':LIVRO' => $table->getLivro_idlivro()->getIdlivro(),
			':AUTOR' => $table->getAutor_idautor()->getIdautor()
		);
		return  $this->executeSql($q,$values);
	}


	public function insert($table)
		{
			$q = "CALL sp_livro_has_autor_insert (:LIVRO, :AUTOR);";
			$values = array(
				':LIVRO' => $table->getLivro_idlivro()->getIdlivro(),
				':AUTOR' => $table->getAutor_idautor()->getIdautor()
			);
			return $this->executeSql($q, $values);
		}	

	public function delete_livro_has_autor($table)
	{
		$q = "DELETE FROM livro_has_autor WHERE livro_idlivro = :LIVRO and autor_idautor = :AUTOR;";
		$values = array(
			':LIVRO' =>	$table->getLivro_idlivro()->getIdlivro(),
			':AUTOR' => $table->getAutor_idautor()->getIdautor()
			
		);
		$this->query($q, $values);
			
		//$q2 = "SELECT * FROM ".$table->getTableName()." where ".$table->getTableKeyName()." = :ID;";

			$res = $this->select($table,true);
			//var_dump($table);
			if (empty($res)) {
				$ret = new Retorno(true, "Registro foi excluído com sucesso!");
				
				return $ret ;
			}
			else{
				$ret = new Retorno(false, "Erro ao excluir registro!");
				return $ret;
			}
	}				
}
	

 ?>