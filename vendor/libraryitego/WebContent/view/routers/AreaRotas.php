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
 * @listall=btc
 * @get_delete=btc
 * @post_delete=btc
 */
class AreaRotas 
{
	
	
	public function get_insert()
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("cadastro_area"), array(
			'action' => 'insert',
			'title' => 'Cadastrar'
		));	
	}

	
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$area = new Area();
		$area = $rain->setTable($_POST, $area);
		$crud = new AreaController();
		$res = $crud->insert($area);

		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "cadastro_area"),array(
				'mensagem' => "Área cadastrada com sucesso!",
				'resultado' => "success",
				'action' => 'insert',
				'title' => 'Cadastrar'
			) );
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao cadastrar área",
				'resultado' => "danger"
			) );
			
		}
	}

	public function get_update($idarea)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		$area = new Area();
		$area->setIdarea($idarea);
		$selectArea = $crud->select($area, true);
		$area->setNome_area($selectArea[0]['nome_area']);
		$rain->setConteudo(array("edit_cadastro_area"),
			array(
				'nome_area' => $area->getNome_area(),
				'idarea' => $area->getIdarea(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$area = new Area();
		$area = $rain->setTable($_POST, $area);
		$crud = new AreaController();
		$res = $crud->update($area);
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Área editada com sucesso!",
				'resultado' => "success",
				'link' => "/crud/livro/area/0/10/read",
				'name' => "áreas"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Erro ao editar área",
				'resultado' => "danger",
				'link' => "/crud/livro/area/0/10/read",
				'name' => "áreas"

			) );
			
		}
	}

	
	public function listall($inicio,$limite)
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new AreaController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'nome_area'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Area(),$list);

		$rain->setConteudo(array("read_area", "pagination"), array(

			'resultarea' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => 'area'
		));
	}

	
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new AreaController();

		$area = new Area();
		$area = $rain->setTable($_POST, $area);
		
		$res = $crud->delete($area);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'table' => "area",
				'linklista' => "/crud/livro/area/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'table' => "área",
				'linklista' => "/crud/livro/area/0/10/read"
			) );
			
		}
	}

	public function get_delete($idarea){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new AreaController();
		$area = new Area();
		
		$area->setIdarea($idarea);
		$selectarea = $crud->select($area, true);
		
		if (!empty($selectarea)) {
			
			$rain->setConteudo(array("delete_area","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_area' => $selectarea[0]['nome_area'],
				'idarea' => $selectarea[0]['idarea']
				
			)
		);	
		}
		else
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar Área!",
			'resultado' => "danger"

		));

	}		
}

 ?>