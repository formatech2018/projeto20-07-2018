<?php 
namespace Controller\control;

use \Controller\model\{Emprestimo, Usuario};
use \Controller\dao\EmprestimoSql;
/**
* 
*/
class EmprestimoController extends CrudController
{
	public function selectDataDevolucao($idpatrimonio){
		$crud = new EmprestimoSql();
		return $crud->selectDataDevolucao($idpatrimonio);
	}
	public static function insert($table)
	{
		return parent::insert($table);
	}
	public function getDataToCpfUser($cpf)
	{
		$crud = new EmprestimoSql();
		return $crud->getDataToCpfUser($cpf);
	}
	public function getDataToIdPatrimonio($idpatrimonio)
	{
		$crud = new EmprestimoSql();
		return $crud->getDataToIdPatrimonio($idpatrimonio);
	}
	public function  searchEmprestimosAtivos($usuario){
		$crud = new EmprestimoSql();
		
		return $crud->getDataToEmprestimosAtivos($usuario);
	}

	public function update_status_patrimonio($idpatrimonio){
		$sql = new EmprestimoSql();
		return $sql->update_status_patrimonio($idpatrimonio);
	}

	public function getQtdeLivros($idusuario){
		$sql = new EmprestimoSql();
		return $sql->getQtdeLivros($idusuario);
	}

	public function getMultasAtivas($idusuario){
		$sql = new EmprestimoSql();
		return $sql->getMultasAtivas($idusuario);
	}

	public function updateSituacaoMulta($idmulta){
		$sql = new EmprestimoSql();
		return $sql->updateSituacaoMulta($idmulta);
	}
	public function insertMultaTrue($idvalor,$idemprestimo){
		$sql = new EmprestimoSql();
		return $sql->insertMultaTrue($idvalor,$idemprestimo);
	}

	public function contaData($devolucao,$previsao){
		$sql = new EmprestimoSql();
		return $sql->contaData($devolucao,$previsao);

	}

	public function getStatusEmprestimoFuncionario($idusuario)
	{
		$usuario = new Usuario();
		
		$usuario->setIdusuario($idusuario);
		$status = 0;
		$sql = new EmprestimoSql();
		
		$qtdelivros = $sql->getQtdeLivros($idusuario);
		$multa = $sql->getMultasAtivas($idusuario);
		$statususuario = $this->select($usuario, true);
		
		
		if ($qtdelivros[0]['count(*)'] >= 2 || $multa[0]['count(*)'] === true) {
			
			$status = 0;
		}
		else{
			$status = 1;
		}
		$ret = array($status,$qtdelivros[0]['count(*)']);
		return $ret;
	}

	public function getStatusEmprestimo($idusuario)
	{
		$usuario = new Usuario();
		
		$usuario->setIdusuario($idusuario);
		$status = 0;
		$sql = new EmprestimoSql();
		
		$qtdelivros = $sql->getQtdeLivros($idusuario);
		$multa = $sql->getMultasAtivas($idusuario);
		$statususuario = $this->select($usuario, true);
		
		$isaluno = $sql->isAluno($idusuario);
		if ($isaluno) {
			$isaluno = $this->verificaTurmasAtivas($idusuario);
			
		}
		
		if ($qtdelivros[0]['count(*)'] >= 2 || $multa[0]['count(*)'] === true || $isaluno === false) {
			
			$status = 0;
		}
		else{
			$status = 1;
		}
		$ret = array($status,$qtdelivros[0]['count(*)']);
		return $ret;
	}

	public function verificaTurmasAtivas($idusuario){
		$sql = new EmprestimoSql();
		$cursos = $sql->getTurmasAtivas($idusuario);

		if ($cursos > 0) {
			return true;
		}
		else
		{
			return false;
		}
	}
}

 ?>