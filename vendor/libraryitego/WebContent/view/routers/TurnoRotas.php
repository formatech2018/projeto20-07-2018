<?php 
namespace ViewController\view\routers;

/*require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/libraryitego/WebContent/view/routers/config/Config.php');*/
use \ViewController\RainTpl;
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{Controller,CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController};
	use \Controller\util\Convert;
	
/**
 * @get_insert=btc
 * @post_insert=btc
 * @get_update=btc
 * @post_update=btc
 * @get_delete=btc
 * @post_delete=btc
 * @listall=btc
 */

class TurnoRotas 
{
	
	public function get_insert()
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("cadastro_turno"), array(
			'action' => 'insert',
			'title' => 'Cadastrar'
		));	
	}

	
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$turno = new Turno();
		$turno = $rain->setTable($_POST, $turno);
		$crud = new TurnoController();
		$res = $crud->insert($turno);

		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "cadastro_turno"),array(
				'mensagem' => "Turno cadastrado com sucesso!",
				'resultado' => "success",
				'action' => 'insert',
				'title' => 'Cadastrar'
			) );
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao cadastrar turno",
				'resultado' => "danger"
			) );
			
		}

	}

	
	public function get_update($idturno)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		$turno = new Turno();
		$turno->setIdturno($idturno);
		$selectturno = $crud->select($turno, true);
		$turno->setNome_turno($selectturno[0]['nome_turno']);
		$rain->setConteudo(array("edit_cadastro_turno"),
			array(
				'nome_turno' => $turno->getNome_turno(),
				'idturno' => $turno->getIdturno(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$turno = new Turno();
		$turno = $rain->setTable($_POST, $turno);
		$crud = new TurnoController();
		$res = $crud->update($turno);
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "list_after_update"),array(
				'mensagem' => "Turno editado com sucesso!",
				'resultado' => "success",
				'link' => "/crud/turma/turno/0/10/read",
				'name' => "turnos"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "list_after_update"),array(
				'mensagem' => "Erro ao editar turno",
				'resultado' => "danger",
				'link' => "/crud/turma/turno/0/10/read",
				'name' => "turnos"
			) );
			
		}
	}
	
	
	public function listall($inicio,$limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurnoController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'nome_turno'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Turno(),$list);
		

		$rain->setConteudo(array("read_turno", "pagination"), array(

			'resultturno' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => 'turno'
		));
		
	}	

	
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurnoController();

		$turno = new Turno();
		$turno = $rain->setTable($_POST, $turno);
		
		$res = $crud->delete($turno);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'table' => "turno",
				'linklista' => "/crud/turma/turno/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'table' => "turno",
				'linklista' => "/crud/turma/turno/0/10/read"
			) );
			
		}
	}

	
	public function get_delete($idturno){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurnoController();
		$turno = new Turno();
		
		$turno->setIdturno($idturno);
		$selectturno = $crud->select($turno, true);
		
		if (!empty($selectturno)) {
			
			$rain->setConteudo(array("delete_turno","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_turno' => $selectturno[0]['nome_turno'],
				'idturno' => $selectturno[0]['idturno']
				
			)
		);	
		}
		else
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar turno!",
			'resultado' => "danger"

		));

	}
}

 ?>