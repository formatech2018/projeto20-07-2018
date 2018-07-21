<?php 
namespace Controller\dao;

/**
* 
*/
class LivroSql extends CrudSql
{
	
	public function insert($table)
		{
			//var_dump($table);
			$q = "CALL sp_livro_insert(:ISBN,:NOME,:ANO,:ASSUNTO,:EDICAO,:EDITORA,:AREA);";
			//call sp_usuario_insert('Vinicius', 'vinialves08@gmail.com', '04221293136', 62991267068,6233193086, 'AV N3', 'QD 30 LT 20', '0', 'ANÁPOLIS CITY', '75094080', 'ANÁPOLIS', 'GO');
			$values = array(
				':ISBN' => $table->getIsbn(),
				':NOME' => $table->getNome_livro(),
				':ANO' => $table->getAno_livro(),
				':ASSUNTO' => $table->getAssunto(),
				':EDICAO' => $table->getEdicao(),
				':EDITORA'=> $table->getEditora_ideditora()->getIdeditora(),
				':AREA' => $table->getArea_idarea()->getIdarea()
				
				
			);
			
			return $this->executeSql($q, $values);
		}	
		public function update($table)
	{
		$q = "CALL sp_livro_update(:ID,:ISBN,:NOME,:ANO,:ASSUNTO,:EDICAO,:EDITORA,:AREA);";
		$values = array(
			':ID'=> $table->getIdlivro(),
			':ISBN' => $table->getIsbn(),
			':NOME' => $table->getNome_livro(),
			':ANO' => $table->getAno_livro(),
			':ASSUNTO' => $table->getAssunto(),
			':EDICAO' => $table->getEdicao(),
			':EDITORA'=> $table->getEditora_ideditora()->getIdeditora(),
			':AREA' => $table->getArea_idarea()->getIdarea()
			
		);
		
		return $this->executeSql($q, $values);
	}
	public function search_livro_like_name ($nome_livro, $isbn){

			if (!empty($nome_livro) && !empty($isbn)) {

			$q = "SELECT idlivro,nome_livro,isbn from livro 
			where nome_livro like '%".$nome_livro."%' or isbn = '".$isbn."';";
				
			}
			else if (!empty($isbn) && empty($nome_livro)) {

			$q = "SELECT idlivro,nome_livro,isbn from livro 
			where isbn = '".$isbn."';";
			}
			else if (empty($isbd) && !empty($nome_livro)) {

				$q = "SELECT idlivro,nome_livro,isbn from livro 
				where nome_livro like '%".$nome_livro."%'; ";
			}
			else{
				
				$q = "";
			}
			return $this->executeSql($q);
		}
			
}

 ?>