<?php  
namespace Controller\control;
use \Controller\util\Retorno;
use\Controller\dao\ControllerSql;
/**
* 
*/
class Controller
{
	public static function getAnotacoes(String $classe){

		$reflection = new  \ReflectionClass('\ViewController\view\routers\\'.$classe);
		$doc = $reflection->getDocComment();

		$doc = substr($doc, 3,-2);
		$res = explode('* @', $doc);
		unset($res[0]);
		$anotacao = array();
		foreach ($res as $key => $value) {

			$anotacao[substr($value, 0, strpos($value, '='))] = trim(substr($value, strpos($value, '=')+1));


		}

		return $anotacao;
	}

	public static function getValidaSessoes(String $sessao,$tipo){

		
		switch ($sessao) {
			case 'usr':
				if (isset($tipo['acesso'])) {
					return new Retorno(true,"");
				}else{
					return new Retorno(false,"É necessário ser um usuario logado para acessar essa página");
				}
				break;
			case 'btc':
				if (isset($tipo['acesso']) && ($tipo['acesso'] == 1 || $tipo['acesso'] == 2 )) {
					return new Retorno(true,"");
				}else{
					return new Retorno(false,"É necessário ser um usuario logado como bibliotecário ou administrador para acessar essa página");
				}
				break;
			case 'adm':
				if (isset($tipo['acesso']) && ($tipo['acesso'] == 2)) {
					return new Retorno(true,"");
				}else{
					return new Retorno(false,"É necessário ser um usuario logado como administrador para acessar essa página");
				}
				break;
			default:
				return new Retorno(false,"Erro ao validar sessão");
				break;
		}

		}
		public static function getAcesso($value='')
		{
			if (isset($value['acesso'])) {
					$acesso = $value['acesso'];
				}else{
					$acesso = "";
				}
				return $acesso;
		}

		public function is_funcionario($idusuario)
		{
			$sql = new ControllerSql();
			return $sql->is_funcionario($idusuario);
		}
		public function selectFuncionario($idusuario)
		{
			$sql = new ControllerSql();
			return $sql->selectFuncionario($idusuario);
		}
		public function selectAluno($idusuario)
		{
			$sql = new ControllerSql();
			return $sql->selectAluno($idusuario);
		}	




	}




?>