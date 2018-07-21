<?php
namespace Controller\control;
use Controller\dao\RelatorioAnoSql;
	/**
	 * 
	 */
	class RelatorioAnoController extends RelatorioController
	{
		
			public function setQuantidade($array1 = array(), $array2 = array())
			{
				$i = 0;
				foreach ($array1 as $key => $value) {
				
					$array2[$i]['ano_livro'] = $key;
					$array2[$i]['quantidade'] = $array1[$key][0]['COUNT(*)'];
				$i++;
				}
				
				return $array2;
			}

			public function MaiorQuantidadeAno(){

				$relatorio = new RelatorioAnoSql();
				return $relatorio->MaiorQuantidadeAno();
			}
	}


?>