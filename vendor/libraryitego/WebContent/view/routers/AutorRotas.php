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
class AutorRotas 
{
	
	public function get_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("cadastro_autor"), array(
			'action' => 'insert',
			'title' => 'Cadastrar'
		));	
	}

	
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$autor = new Autor();
		$autor = $rain->setTable($_POST, $autor);
		$crud = new AutorController();
		$res = $crud->insert($autor);

		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "cadastro_autor"),array(
				'mensagem' => "Autor cadastrado com sucesso",
				'resultado' => "success",
				'action' => 'insert',
				'title' => 'Cadastrar'
			) );
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao cadastrar autor",
				'resultado' => "danger"
			) );
			
		}
	}

	
	public function get_update($idautor)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		$autor = new Autor();
		$autor->setIdautor($idautor);
		$selectAutor = $crud->select($autor, true);
		$autor->setNome_autor($selectAutor[0]['nome_autor']);
		$rain->setConteudo(array("edit_cadastro_autor"),
			array(
				'nome_autor' => $autor->getNome_autor(),
				'idautor' => $autor->getIdautor(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$autor = new Autor();
		$autor = $rain->setTable($_POST, $autor);
		$crud = new AutorController();
		$res = $crud->update($autor);
		
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Autor editado com sucesso!",
				'resultado' => "success",
				'link' => "/crud/livro/autor/0/10/read",
				'name' => "autores"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Erro ao editar autor",
				'resultado' => "danger",
				'link' => "/crud/livro/autor/0/10/read",
				'name' => "autores"
			) );
			
		}
	}

	
	public function listall($inicio,$limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new AutorController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'nome_autor'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Autor(),$list);
		

		$rain->setConteudo(array("read_autor_all", "pagination"), array(

			'resultautor' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => 'livro/autor'
		));
	}

	
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new AutorController();

		$autor = new Autor();
		$autor = $rain->setTable($_POST, $autor);
		
		$res = $crud->delete($autor);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list_autores"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'table' => "autor",
				'linklista' => "/crud/livro/autor/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list_autores"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'table' => "área",
				'linklista' => "/crud/livro/autor/0/10/read"
			) );
			
		}
		
	}
	
	
	public function get_delete($idautor){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new AutorController();
		$autor = new Autor();
		
		$autor->setIdautor($idautor);
		$selectautor = $crud->select($autor, true);
		
		if (!empty($selectautor)) {
			
			$rain->setConteudo(array("delete_autor","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_autor' => $selectautor[0]['nome_autor'],
				'idautor' => $selectautor[0]['idautor']
				
			)
		);	
		}
		else
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar Autor!",
			'resultado' => "danger"

		));

	}			
}

 ?>