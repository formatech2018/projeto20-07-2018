<?php 
namespace ViewController\view\routers;

/*require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/libraryitego/WebContent/view/routers/config/Config.php');*/
use \ViewController\RainTpl;
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{Controller, CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController};
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
class FormacaoRotas 
{
	
	public function get_insert()
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("cadastro_formacao_funcionario"), array(
			'action' => 'insert',
			'title' => 'Cadastrar'
		));	
	}

	
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$formacao = new Formacao();
		$formacao = $rain->setTable($_POST, $formacao);
		$crud = new FormacaoController();
		$res = $crud->insert($formacao);

		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "cadastro_formacao_funcionario"),array(
				'mensagem' => "Formação cadastrado com sucesso!",
				'resultado' => "success",
				'action' => 'insert',
				'title' => 'Cadastrar'
			) );
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao cadastrar Formação",
				'resultado' => "danger",
				
			) );
			
		}

	}

	
	public function get_update($idformacao)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		$formacao = new formacao();
		$formacao->setIdformacao($idformacao);
		$selectFormacao = $crud->select($formacao, true);
		$formacao->setNome_formacao($selectFormacao[0]['nome_formacao']);
		$rain->setConteudo(array("edit_cadastro_formacao_funcionario"),
			array(
				'nome_formacao' => $formacao->getNome_formacao(),
				'idformacao' => $formacao->getIdformacao(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$formacao = new Formacao();
		$formacao = $rain->setTable($_POST, $formacao);
		$crud = new FormacaoController();
		$res = $crud->update($formacao);
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Formação editada com sucesso!",
				'resultado' => "success",
				'link' => "/crud/funcionario/formacao/0/10/read",
				'name' => "formações"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Erro ao editar formação",
				'resultado' => "danger",
				'link' => "/crud/funcionario/formacao/0/10/read",
				'name' => "formações"
			) );
			
		}
	}
	
	
	public function listall($inicio,$limite)
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new FormacaoController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'nome_formacao'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Formacao(),$list);

		$rain->setConteudo(array("read_formacao", "pagination"), array(

			'resultformacao' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => 'formacao'
		));
		
	}	

	
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new FormacaoController();

		$formacao = new Formacao();
		$formacao = $rain->setTable($_POST, $formacao);
		
		$res = $crud->delete($formacao);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list_formacoes"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'linklista' => "/crud/funcionario/formacao/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list_formacoes"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'linklista' => "/crud/funcionario/formacao/0/10/read"
			) );
			
		}

	}

	
	public function get_delete($idcargo){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new FormacaoController();
		$formacao = new Formacao();
		
		$formacao->setIdformacao($idcargo);
		$selectFormacao = $crud->select($formacao, true);
		
		if (!empty($selectFormacao)) {
			
			$rain->setConteudo(array("delete_formacao","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_formacao' => $selectFormacao[0]['nome_formacao'],
				'idformacao' => $selectFormacao[0]['idformacao']
				
			)
		);	
		}
		else{
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar Formação!",
			'resultado' => "danger"

		));
		}

	}			
}

 ?>