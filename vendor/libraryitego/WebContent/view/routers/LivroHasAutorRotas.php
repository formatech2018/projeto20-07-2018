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
 * @get_delete=btc
 * @post_delete=btc
 * @list=btc
 */
class LivroHasAutorRotas 
{

	
	public function list($idlivro,$inicio, $limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new LivroHasAutorController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'nome_autor'
		);
		
		$resultado = $crud->read(new Livro_has_Autor(),$list, array(new Autor(), new Livro()), array(
			'id' => $idlivro,
			'name' => 'livro_idlivro'
		));
		if ($resultado[1][0]['COUNT(*)'] > 0) {
				$rain->setConteudo(array("read_autor", "pagination"), array(
				'idlivro' => $idlivro,
				'resultautor' => $resultado[0], 
				'nome_livro' => $resultado[0][0]['nome_livro'],
				'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
				'table' => 'livro/'.$resultado[0][0]['idlivro'].'/autores'
			));
		}else{
			$rain->setConteudo(array("mensagem","read_autor"), array(
				'idlivro' => $idlivro,
				'mensagem' => "Não foram cadastrados autores para esse livro",
				'resultado' => "danger",
				'nome_livro' => " "		
			));
		}
		
		
	}

	
	public function get_insert($idlivro)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();


		$autor = $crud->select2(new Autor(),false,array(),array(),array(),array('nome_autor' => 'asc'));
		$rain->setConteudo(array("mensagem","cadastro_livro_has_autor"),array(
				'mensagem' => "Cadastrado com sucesso!",
				'resultado' => "success",
				'idlivro' => $idlivro,
				'autor' => $autor,
				'action' => 'insert',
				'title' => 'Cadastrar'
			) );
	}

	
	public function post_insert()
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$livro_has_autor = new Livro_has_Autor();
		$livro = new Livro();
		$autor = new Autor();
		$autor = $rain->setTable($_POST, $autor);
		$livro = $rain->setTable($_POST, $livro);

		$livro_has_autor->setAutor_idautor($autor);
		$livro_has_autor->setLivro_idlivro($livro);


		$crud = new LivroHasAutorController();
		$res = $crud->insert($livro_has_autor);
		if (!empty($res)) {
			$caminho = "/crud/livro/".$res[0]['livro_idlivro']."/autor/insert";
			header("Location: $caminho");
			exit();
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao cadastrar autor",
				'resultado' => "danger"
			) );
			
		}
			
	}

	
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$livro_has_autor = new Livro_has_Autor();
		$crud = new LivroHasAutorController();

		$livro = new Livro();
		$autor = new Autor();
		$autor = $rain->setTable($_POST, $autor);
		$livro = $rain->setTable($_POST, $livro);

		$livro_has_autor->setAutor_idautor($autor);
		$livro_has_autor->setLivro_idlivro($livro);

		$res = $crud->delete_livro_has_autor($livro_has_autor);
		
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
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'table' => "livro",
				'linklista' => "/crud/livro/0/10/read"
			) );
			
		}
	}

	
	public function get_delete($idlivro,$idautor){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new LivroHasAutorController();
		$livro_has_autor = new Livro_has_Autor();
		$livro = new livro();
		$autor = new Autor();
		
		$livro->setIdlivro($idlivro);
		$autor->setIdautor($idautor);
		
		$livro_has_autor->setAutor_idautor($autor);
		$livro_has_autor->setLivro_idlivro($livro);
				
		$selectlivro_has_autor = $crud->select($livro_has_autor);

		$livro = $rain->setTable($selectlivro_has_autor[0], $livro);
		$selectlivro_has_autor[0]['livro_idlivro'] = $livro;

		$autor = $rain->setTable($selectlivro_has_autor[0], $autor);
		$selectlivro_has_autor[0]['autor_idautor'] = $autor;

		
		if (!empty($livro_has_autor)) {
			
			$rain->setConteudo(array("delete_livro_has_autor","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_livro' => $selectlivro_has_autor[0]['nome_livro'],
				'idlivro' => $selectlivro_has_autor[0]['idlivro'],
				'idautor' => $selectlivro_has_autor[0]['idautor'],
				'nome_autor' => $selectlivro_has_autor[0]['nome_autor']
				
				
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