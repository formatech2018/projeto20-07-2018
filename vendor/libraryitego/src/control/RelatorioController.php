<?php 
namespace Controller\control;
use \Controller\dao\RelatorioSql;
	/**
	* 
	*/
	class RelatorioController extends Controller
	{
		
		public function select($table, $bool = false, $join = array(),$count = false, $condicao = array(), $ordem = array(), $group = ""){

			$crud = new RelatorioSql();
			return $crud->select($table, $bool, $join,$count,$condicao,$ordem,$group);
		}

		public function callMpdf($html,$output = ""){

			
			$mpdf = new \Mpdf\Mpdf(); 
			$mpdf->SetDisplayMode('fullpage');
			$css = file_get_contents("vendor/libraryitego/WebContent/viewRelatorio/css/estilo.css");
	 		$mpdf->WriteHTML($css,1);
	 		$mpdf->WriteHTML($html,2);
	 		if (empty($output)) {
	 			$mpdf->Output();
	 			exit;
	 		}
	 		else{
	 			$mpdf->Output($output.".pdf");
	 		}
	 		
	 		
		}

		public function callMpdf2($html){

			$mpdf = new \Mpdf\Mpdf(); 
			$mpdf->SetDisplayMode('fullpage');
			$css = file_get_contents("vendor/libraryitego/WebContent/viewRelatorio/css/estilo2.css");
	 		$mpdf->WriteHTML($css,1);
	 		$mpdf->WriteHTML($html,2);
	 		$mpdf->Output();

	 		//return $mpdf;
		}

		public function setQuantidade($array1 = array(), $array2 = array()){
			foreach ($array1 as $key => $value) {
				
				$array1[$key]['quantidade'] = $array2[$key][0]['COUNT(*)'];
			
			}
			return $array1;

		}
		public function selectTurmasAtivas($data, $turno)
		{
			$sql = new RelatorioSql();

			return $sql->selectTurmasAtivas($data,$turno);
		}
		public function mask($val, $mask)

	{

		 $maskared = '';

		 $k = 0;

		 for($i = 0; $i<=strlen($mask)-1; $i++)

		 {

			 if($mask[$i] == '#')

		 {

			 if(isset($val[$k]))

		 $maskared .= $val[$k++];

		 }

			 else

		 {

			 if(isset($mask[$i]))

		 $maskared .= $mask[$i];

		 }

		 }

		 return $maskared;

		}

	}
 ?>