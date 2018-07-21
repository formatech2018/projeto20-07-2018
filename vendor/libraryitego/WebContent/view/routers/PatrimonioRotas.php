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
 * @list=btc
 * @listall=btc
 */
class PatrimonioRotas 
{
	
	public function list($idlivro,$inicio, $limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new PatrimonioController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'idpatrimonio'
		);
		//$list = array_merge($list, $previous);
		$where = array(
			'name' => 'livro_idlivro',
			'id' => $idlivro
		);
		$resultado = $crud->read(new Patrimonio(),$list, array(new Livro()), $where);
		
			if ($resultado[1][0]['COUNT(*)'] != 0) {
				$rain->setConteudo(array("read_patrimonio", "pagination"), array(

				'resultpatrimonio' => $resultado[0], 
				'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
				'table' => 'livro/patrimonio'
			));
		}else{

			$rain->setConteudo(array("mensagem"), array(

				'mensagem' => "Este livro não possui patrimônios cadastrados no sistema!",
				'resultado' => "danger" 
			));
				
		}


		
		
	}

	
	public function get_insert($idlivro)
	{
		$crud = new LivroController();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$livro = new Livro();
		
		$livro->setIdlivro($idlivro);
		$selectlivro = $crud->select($livro, true);
		unset($selectlivro[0]['area_idarea']);
		unset($selectlivro[0]['editora_ideditora']);
		$livro = $rain->setTable($selectlivro[0], $livro);

		
		$rain->setConteudo(array("cadastro_patrimonio"),
			array(
				'action' => 'insert',
				'title' => 'Cadastrar',
				'idlivro' => $livro->getIdlivro(),
				'nome_livro' => $livro->getNome_livro(),
				'isbn' => $livro->getIsbn()

			) 
		);
	}

	
	public function post_insert()
	{
		
		$livro = new Livro();
		$patrimonio = new Patrimonio();
		$crud = new PatrimonioController();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);

		$livro = $rain->setTable($_POST, $livro);

		$selectlivro = $crud->select($livro, true);
		unset($selectlivro[0]['area_idarea']);
		unset($selectlivro[0]['editora_ideditora']);
		$livro = $rain->setTable($selectlivro[0], $livro);
		$patrimonio = $rain->setTable($_POST, $patrimonio);

		$patrimonio->setLivro_idlivro($livro);

		$res = $crud->insert($patrimonio);

		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "cadastro_patrimonio"),
			array(
				'action' => 'insert',
				'title' => 'Cadastrar',
				'mensagem' => 'Patrimônio Cadastrado com sucesso',
				'resultado'  => 'success',
				'idlivro' => $patrimonio->getLivro_idlivro()->getIdlivro(),
				'nome_livro' => $patrimonio->getLivro_idlivro()->getNome_livro(),
				'isbn' => $patrimonio->getLivro_idlivro()->getIsbn()
			));
		}
			else{

			$rain->setConteudo(array("mensagem", "cadastro_patrimonio"),
			array(
				'action' => 'insert',
				'title' => 'Cadastrar',
				'mensagem' => 'Erro ao cadastrar Patrimônio',
				'resultado'  => 'danger',
				'idlivro' => $patrimonio->getLivro_idlivro()->getIdlivro(),
				'nome_livro' => $patrimonio->getLivro_idlivro()->getNome_livro(),
				'isbn' => $patrimonio->getLivro_idlivro()->getIsbn()
			));
		}
		
	
	}

	
	public function get_update($idpatrimonio)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		$patrimonio = new Patrimonio();
		$patrimonio->setIdpatrimonio($idpatrimonio);
		$selectPatrimonio = $crud->select($patrimonio, true);
		$patrimonio->setIdpatrimonio($selectPatrimonio[0]['idpatrimonio']);
		$rain->setConteudo(array("edit_cadastro_patrimonio"),
			array(
				'idpatrimonio' => $patrimonio->getIdpatrimonio(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$patrimonio = new Patrimonio();
		$patrimonio = $rain->setTable($_POST, $patrimonio);
		$crud = new PatrimonioController();
		$res = $crud->update_patrimonio($_POST['patrimonioantigo'],$patrimonio);
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "list_after_update"),array(
				'mensagem' => "Patrimônio editado com sucesso!",
				'resultado' => "success",
				'link' => "/crud/livro/patrimonio/0/10/read",
				'name' => "patrimônios"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "list_after_update"),array(
				'mensagem' => "Erro ao editar patrimônio",
				'resultado' => "danger",
				'link' => "/crud/livro/patrimonio/0/10/read",
				'name' => "patrimônios"
			) );
			
		}
		
	}
	
	
	public function listall($inicio,$limite)
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new PatrimonioController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'idpatrimonio'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Patrimonio(),$list, array(new Livro()),array(
			'name' => "patrimonio_status",
			'id' => "true"
		));

		if ($resultado[1][0]['COUNT(*)'] != 0) {

			$rain->setConteudo(array("read_patrimonio", "pagination"), array(

			'resultpatrimonio' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => 'livro/patrimonio'
		));
			
		}else{

			$rain->setConteudo(array("mensagem"),array(

				'mensagem' => "Não existem patrimônios cadastrados no sistema!",
				'resultado' => "danger"
			));
		}
			
		

		
	}

	
	public function get_delete($patri){

		$crud = new PatrimonioController();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$patrimonio = new Patrimonio();
		$livro = new Livro();

		$patrimonio->setIdpatrimonio($patri);

		$selectPatrimonio = $crud->select($patrimonio, true, array($livro));

		unset($selectPatrimonio[0]['area_idarea']);
		unset($selectPatrimonio[0]['editora_ideditora']);

		$livro = $rain->setTable($selectPatrimonio[0], $livro);
		$selectPatrimonio[0]['livro_idlivro'] = $livro;

		
		$patrimonio = $rain->setTable($selectPatrimonio[0], $patrimonio);

		if (!empty($livro)) {
			
			$rain->setConteudo(array("delete_patrimonio","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_livro' => $patrimonio->getLivro_idlivro()->getNome_livro(),
				'idpatrimonio' => $patrimonio->getIdpatrimonio()
				

				
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
		$crud = new PatrimonioController();

		$patrimonio = new Patrimonio();
		$patrimonio = $rain->setTable($_POST, $patrimonio);
		$res = $crud->delete($patrimonio);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'table' => "patrimônio",
				'linklista' => "/crud/livro/patrimonio/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'table' => "patrimônio",
				'linklista' => "/crud/livro/patrimonio/0/10/read"
			) );
			
		}
	}
	
}

 ?>