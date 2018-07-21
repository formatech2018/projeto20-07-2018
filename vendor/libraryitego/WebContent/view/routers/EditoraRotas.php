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
class EditoraRotas 
{

	
	public function get_insert()
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("cadastro_editora") ,array(
			'action' => 'insert',
			'title' => 'Cadastrar'

		));	
	}

	
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$editora = new Editora();
		$editora = $rain->setTable($_POST, $editora);
		$crud = new EditoraController();
		$res = $crud->insert($editora);

		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "cadastro_editora"),array(
				'mensagem' => "Editora ".$res[0]['nome_editora']." cadastrada com sucesso!",
				'resultado' => "success",
				'action' => 'insert',
				'title' => 'Cadastrar'
			) );
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao cadastrar editora",
				'resultado' => "danger"
			) );
			
		}

	}

	
	public function get_update($ideditora)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		$editora = new Editora();
		$editora->setIdeditora($ideditora);
		$selectEditora = $crud->select($editora, true);
		$editora->setNome_editora($selectEditora[0]['nome_editora']);
		$rain->setConteudo(array("edit_cadastro_editora"),
			array(
				'nome_editora' => $editora->getNome_editora(),
				'ideditora' => $editora->getIdeditora(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$editora = new Editora();
		$editora = $rain->setTable($_POST, $editora);
		$crud = new EditoraController();
		$res = $crud->update($editora);
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Editora editada com sucesso!",
				'resultado' => "success",
				'link' => "/crud/livro/editora/0/10/read",
				'name' => "editoras"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Erro ao editar editora",
				'resultado' => "danger",
				'link' => "/crud/livro/0/editora/10/read",
				'name' => "editoras"
			) );
			
		}
	}

	
	public function listall($inicio,$limite)
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new EditoraController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'nome_editora'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Editora(),$list);

		$rain->setConteudo(array("read_editora", "pagination"), array(

			'resulteditora' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => 'livro/editora'
		));
	}

	
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new EditoraController();

		$editora = new Editora();
		$editora = $rain->setTable($_POST, $editora);
		
		$res = $crud->delete($editora);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'table' => "editora",
				'linklista' => "/crud/livro/editora/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'table' => "editora",
				'linklista' => "/crud/livro/editora/0/10/read"
			) );
			
		}
	}

	
	public function get_delete($ideditora){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new EditoraController();
		$editora = new Editora();
		
		$editora->setIdeditora($ideditora);
		$selecteditora = $crud->select($editora, true);
		
		if (!empty($selecteditora)) {
			
			$rain->setConteudo(array("delete_editora","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_editora' => $selecteditora[0]['nome_editora'],
				'ideditora' => $selecteditora[0]['ideditora']
				
			)
		);	
		}
		else
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar Editora!",
			'resultado' => "danger"

		));

	}	
}

 ?>