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
 * @get_search_curso=btc
 * @post_search_curso=btc
 * @listall=btc
 */
class CursoRotas 
{

	
	public function get_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		$tip = new Tipo();
		$tipo = $crud->select($tip);
		$rain->setConteudo(array("cadastro_curso"), array(
			'tipo' => $tipo,
			'action' => 'insert',
			'title' => 'Cadastrar'	
			));
	}

	
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$curs = new Curso();
		$tip = new Tipo();

		$curso = $rain->setTable($_POST, $curs);
		$tipo = $rain->setTable($_POST, $tip);

		$curso->setTipo_idtipo($tipo);
		//var_dump($_POST);

		$crud = new CursoController();
		$res = $crud->insert($curso);

		
		if (!empty($res[0])) {
			$tip = new Tipo();
			$tipo = $crud->select($tip);
			$rain->setConteudo(array("mensagem" ,"cadastro_curso"),array(
				'tipo' => $tipo,
				'mensagem' => "Curso Cadastrado com sucesso",
				'resultado' => "success",
				'action' => "insert",
				'title' => "Cadastrar"
			));
		}
		else
		{
			$rain->setConteudo(array("mensagem", "cadastro_curso"),array(
				'mensagem' => "Erro ao cadastrar curso",
				'resultado' => "danger",
				'action' => "insert",
				'title' => "Cadastrar"
			) );
		}

	}

	
	public function get_update($idcurso)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CursoController();
		$curso = new Curso();
		$tipo = new Tipo();
		$curso->setIdcurso($idcurso);
		
		$selectCurso = $crud->select($curso, true, array($curso->getTipo_idtipo()));
		$tipo = $rain->setTable($selectCurso[0], $tipo);

		$arrayobj = array(
			'tipo_idtipo' => $tipo
			
		);
		$result = array_merge($selectCurso[0], $arrayobj);
		$curso = $rain->setTable($result, $curso);

		$rain->setConteudo(array("edit_cadastro_curso"),
			array(
				'nome_curso' => $curso->getNome_curso(),
				'carga_horaria' => $curso->getCarga_horaria(),
				'vagas' => $curso->getVagas(),
				'idcurso' => $curso->getIdcurso(),
				'tipo' => $crud->select($curso->getTipo_idtipo()),
				'idtipo' => $curso->getTipo_idtipo()->getIdtipo(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$crud = new CursoController();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$curso = new Curso();
		$tipo = new Tipo();
		$tipo = $rain->setTable($_POST, $tipo);
		$curso = $rain->setTable($_POST, $curso);
		$curso->setTipo_idtipo($tipo);
		
		$res = $crud->update($curso);

		if (!empty($res)) {
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Curso editado com sucesso!",
				'resultado' => "success",
				'link' => "/crud/curso/0/10/read",
				'name' => "cursos"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Erro ao editar curso",
				'resultado' => "danger",
				'link' => "/crud/curso/0/10/read",
				'name' => "cursos"
			) );
			
		}
	}

	
	public function listall($inicio,$limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CursoController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'nome_curso'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Curso(),$list, array(new Tipo()));
		

		$rain->setConteudo(array("read_curso", "pagination"), array(

			'resultcurso' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => 'curso'
		));
		
	}

	
	public function get_search_curso()
	{
		$tipo = new Tipo();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CursoController();
		$rain->setConteudo(array("busca_curso"), array(
			'tipo' => $crud->select($tipo)
		));	
	}

	
	public function post_search_curso()
	{
		$crud = new CursoController();
		$tipo = new Tipo();
		$tipo->setIdtipo($_POST['idtipo']);
		$tipo = $crud->select($tipo, true);

		$resultado = $crud->search_curso_like_name($_POST['nome_curso'], $_POST['idtipo']);
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		if (!empty($resultado)) {
			$rain->setConteudo(array("busca_curso", "resultado_busca_curso"), array(
			'resultcurso' => $resultado,
			'tipo' => $crud->select(new Tipo())
		));	

		}
		else{
			$rain->setConteudo(array("mensagem", "busca_curso"), array(

			'mensagem' => 'Não foram encontrados cursos com nome '.$_POST['nome_curso'].' e com tipo '.$tipo[0]['nome_tipo'],
			'resultado' => 'danger',

			'tipo' => $crud->select(new Tipo())

		));	

		}
	}

	
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CursoController();

		$curso = new Curso();
		$curso = $rain->setTable($_POST, $curso);
		$res = $crud->delete($curso);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'table' => "curso",
				'linklista' => "/crud/curso/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'table' => "curso",
				'linklista' => "/crud/curso/0/10/read"
			) );
			
		}
	}
	
	
	public function get_delete($idcurso){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CursoController();
		$curso = new Curso();
		$tipo =  new Tipo();

		$curso->setIdcurso($idcurso);
		$selectCurso = $crud->select($curso,true, array($tipo));

		$tipo = $rain->setTable($selectCurso[0], $tipo);
		$selectCurso[0]['tipo_idtipo'] = $tipo;

		$curso = $rain->setTable($selectCurso[0], $curso);

		if (!empty($curso)) {
			
			$rain->setConteudo(array("delete_curso","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_curso' => $curso->getNome_curso(),
				'idcurso' => $curso->getIdcurso(),
				'nome_tipo' => $curso->getTipo_idtipo()->getNome_tipo(),
				'carga_horaria' => $curso->getCarga_horaria(),
				'vagas' => $curso->getVagas()	
			)
		);	
		}
		else
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar Curso!",
			'resultado' => "danger"

		));

	}
}

 ?>