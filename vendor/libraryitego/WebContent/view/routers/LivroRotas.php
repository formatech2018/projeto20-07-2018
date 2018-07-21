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
 * @listall_usuario=usr
 * @get_search_livro=btc
 * @post_search_livro=btc
 */
class LivroRotas 
{
	
	public function get_search_livro()
	{
		$tipo = new Livro();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new LivroController();
		$rain->setConteudo(array("busca_livro")

		);
	}

	
	public function post_search_livro()
	{
		$crud = new LivroController();

		$resultado = $crud->search_livro_like_name($_POST['nome_livro'], $_POST['isbn']);
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		
		if (!empty($resultado)) {
			
			$rain->setConteudo(array("busca_livro", "resultado_busca_livro"), array(
			'resultlivro' => $resultado
			
		));	
		}else{
			$rain->setConteudo(array("mensagem","busca_livro"), array(
			'resultlivro' => $resultado,
			'mensagem' => "Erro ao buscar livro!",
			'resultado' => "danger"
		));	
		}
	}

	
	public function get_insert()
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		
		$selectEditora = $crud->select2(new Editora(),false,array(),array(),array(),array("nome_editora" => "asc"),'');
		$selectArea = $crud->select2(new Area(),false,array(),array(),array(),array("nome_area" => "asc"),'');


		$rain->setConteudo(array("cadastro_livro"), array(
			'editora' => $selectEditora,
			'area' => $selectArea,
			'action' => 'insert',
			'title' => 'Cadastrar'
		));	
	}

	
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$liv = new Livro();
		$edit = new Editora();
		$are = new Area();

		$livro = $rain->setTable($_POST, $liv);
		$editora = $rain->setTable($_POST, $edit);
		$area = $rain->setTable($_POST, $are);

		$livro->setEditora_ideditora($editora);
		$livro->setArea_idarea($area);

		$crud = new LivroController();
		$res = $crud->insert($livro);
		
		if (!empty($res[0])) {
			
			$caminho = "/crud/livro/".$res[0]['idlivro']."/autor/insert";
			header("Location: $caminho");
			exit();
		}
		else
		{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao cadastrar livro",
				'resultado' => "danger"
			) );
		}



	}

	
	public function get_update($idlivro)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new LivroController();
		
		$selectLivro = $crud->select2(new Livro(),true,array('editora' => array(),'area' => array()),array(),array('idlivro' => $idlivro));

		$selectEditora = $crud->select2(new Editora(),false,array(),array(),array(),array('nome_editora' => "asc"));
		$selectArea = $crud->select2(new Area(),false,array(),array(),array(),array('nome_area' => "asc"));

		$rain->setConteudo(array("edit_cadastro_livro"),
			array(
				'isbn' => $selectLivro[0]['isbn'],
				'nome_livro' => $selectLivro[0]['nome_livro'],
				'ano_livro' => $selectLivro[0]['ano_livro'],
				'assunto' => $selectLivro[0]['assunto'],
				'edicao' => $selectLivro[0]['edicao'],
				'idlivro' => $selectLivro[0]['idlivro'],
				'idarea' => $selectLivro[0]['area_idarea'],
				'ideditora' => $selectLivro[0]['editora_ideditora'],
				'nome_area' => $selectLivro[0]['nome_area'],
				'nome_editora' => $selectLivro[0]['nome_editora'],
				'areas' => $selectArea,
				'editoras' => $selectEditora,
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$liv = new Livro();
		$edit = new Editora();
		$are = new Area();

		$livro = $rain->setTable($_POST, $liv);
		$editora = $rain->setTable($_POST, $edit);
		$area = $rain->setTable($_POST, $are);

		$livro->setEditora_ideditora($editora);
		$livro->setArea_idarea($area);
		$livro = $rain->setTable($_POST, $livro);

		$crud = new LivroController();
		$res = $crud->update($livro);



		if (!empty($res)) {
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Livro editado com sucesso!",
				'resultado' => "success",
				'link' => "/crud/livro/0/10/read",
				'name' => "livros"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Erro ao editar livro",
				'resultado' => "danger",
				'link' => "/crud/livro/0/10/read",
				'name' => "livros"
			) );
			
		}
	}
	
	
	public function listall($inicio, $limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new LivroController();
		$livro = new Livro();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'nome_livro'
		);

		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Livro(),$list, array(new Editora(), new Area()));
		$rain->setConteudo(array("read_livro", "pagination"), array(

			'resultlivro' => $resultado[0],
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => 'livro'
		));
		
	}	

	public function listall_usuario($inicio, $limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new LivroController();
		$livro = new Livro();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'nome_livro'
		);

		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Livro(),$list, array(new Editora(), new Area()));

		if ($resultado[1][0]['COUNT(*)'] != 0) {
				$rain->setConteudo(array("read_livro_usuario", "pagination"), array(

				'resultlivro' => $resultado[0],
				'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
				'table' => 'livro/usuario'
			));
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Não existem livros cadastrados no sistema!",
				'resultado' => "danger"
				
			) );

		}
		
	}	

	
	public function get_delete($idivro){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new LivroController();
		$livro = new Livro();
		$editora = new Editora();
		$area = new Area();
		
		$livro->setIdlivro($idivro);
				
		$selectLivro = $crud->select($livro, true, array($editora, $area));

		$editora = $rain->setTable($selectLivro[0], $editora);
		$selectLivro[0]['editora_ideditora'] = $editora;

		$area = $rain->setTable($selectLivro[0], $area);
		$selectLivro[0]['area_idarea'] = $area;

		$livro = $rain->setTable($selectLivro[0], $livro);
		

		if (!empty($livro)) {
			
			$rain->setConteudo(array("delete_livro","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_livro' => $livro->getNome_livro(),
				'idlivro' => $livro->getIdlivro(),
				'isbn' => $livro->getIsbn(),
				'edicao' => $livro->getEdicao(),
				'ano_livro' => $livro->getAno_livro(),
				'nome_editora' =>$livro->getEditora_ideditora()->getNome_editora(),
				'nome_area' => $livro->getArea_idarea()->getNome_area(),
				'assunto' => $livro->getAssunto()

				
			)
		);	
		}
		else
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar turno!",
			'resultado' => "danger"

		));

	}

	
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new LivroController();

		$livro = new Livro();
		$livro = $rain->setTable($_POST, $livro);
		$res = $crud->delete($livro);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'table' => "livro",
				'linklista' => "/crud/livro/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list"),array(
				'mensagem' => $res->getMessage()." Para excluir o livro, é necessário excluir todos os autores deste livro!",
				'resultado' => "danger",
				'table' => "livro",
				'linklista' => "/crud/livro/0/10/read"
			) );
			
		}
	}
}

 ?>