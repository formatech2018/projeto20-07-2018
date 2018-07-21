<?php 
namespace Controller\dao;
	/**
	* 
	*/
	class RelatorioAnoSql extends RelatorioSql
	{
		public function maiorQuantidadeAno(){

				$q = "SELECT ano_livro, count(ano_livro) from livro group by ano_livro order by SUM(ano_livro) DESC LIMIT 1;";
				
				return $this->executeSql($q);

			}
	}
