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

class TipoRotas 
{
	
	public function get_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("cadastro_tipo_curso"), array(
			'action' => 'insert',
			'title' => 'Cadastrar'
		));	
	}

	
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);

		$tipo = new Tipo();
		$tipo = $rain->setTable($_POST, $tipo);
		$crud = new TipoController();
		$res = $crud->insert($tipo);


		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "cadastro_tipo_curso"),array(
				'mensagem' => "Tipo de curso cadastrado com sucesso!",
				'resultado' => "success",
				'action' => 'insert',
				'title' => 'Cadastrar'
			));
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao cadastrar o tipo de curso",
				'resultado' => "danger"
			) );
			
		}
	}

	
	public function get_update($idtipo)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		$tipo = new Tipo();
		$tipo->setIdtipo($idtipo);
		$selectTipo = $crud->select($tipo, true);
		$tipo->setNome_tipo($selectTipo[0]['nome_tipo']);
		$rain->setConteudo(array("edit_cadastro_tipo"),
			array(
				'nome_tipo' => $tipo->getNome_tipo(),
				'idtipo' => $tipo->getIdtipo(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$tipo = new Tipo();
		$tipo = $rain->setTable($_POST, $tipo);
		$crud = new TipoController();
		$res = $crud->update($tipo);
		
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "list_after_update"),array(
				'mensagem' => "Tipo do curso editado com sucesso!",
				'resultado' => "success",
				'link' => "/crud/curso/tipo/0/10/read",
				'name' => "tipos de curso"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "list_after_update"),array(
				'mensagem' => "Erro ao editar o tipo do curso",
				'resultado' => "danger",
				'link' => "/crud/curso/tipo/0/10/read",
				'name' => "tipos de curso"
			) );
			
		}
	}
	
	
	public function listall($inicio,$limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TipoController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'nome_tipo'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Tipo(),$list);
		

		$rain->setConteudo(array("read_tipo", "pagination"), array(

			'resulttipo' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => 'tipo'
		));
	}	

	
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TipoController();

		$tipo = new Tipo();
		$tipo = $rain->setTable($_POST, $tipo);
		
		$res = $crud->delete($tipo);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'table' => "tipo",
				'linklista' => "/crud/curso/tipo/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'table' => "tipo",
				'linklista' => "/crud/curso/tipo/0/10/read"
			) );
			
		}
	}

	
	public function get_delete($idtipo){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TipoController();
		$tipo = new Tipo();
		
		$tipo->setIdtipo($idtipo);
		$selectTipo = $crud->select($tipo, true);
		
		if (!empty($selectTipo)) {
			
			$rain->setConteudo(array("delete_tipo","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_tipo' => $selectTipo[0]['nome_tipo'],
				'idtipo' => $selectTipo[0]['idtipo']
				
			)
		);	
		}
		else
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar Cargo!",
			'resultado' => "danger"

		));

	}			
}

 ?>