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
 * @get_busca=btc
 * @list=btc
 * @listall=btc
 */
class TurmaRotas 
{
	
	public function list($idcurso,$inicio, $limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaController();
		$curso = new Curso();

		$curso->setIdcurso($idcurso);
		$selectCurso = $crud->select($curso, true, array(new Tipo()));
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'data_inicio'
		);
		
		$resultado = $crud->read(new Turma(),$list, array(new Curso(),new Turno()), array(
			'id' => $idcurso,
			'name' => 'curso_idcurso'
		));
		
		
		if (!empty($resultado[0])) {

			foreach ($resultado as $keys => $values) {
				foreach ($values as $chave => $valor) {
					foreach ($valor as $key => $value) {
						if ($key == 'data_inicio' || $key == 'data_termino') {
							
							$resultado["$keys"]["$chave"]["$key"] = Convert::date_to_string($value);
						}
					}
				}
			}

			
			$rain->setConteudo(array("read_turma", "pagination"), array(

			'resultturma' => $resultado[0],
			'title' => "Listar turmas do curso ".  $resultado[0][0]['nome_curso']." do tipo ". $selectCurso[0]['nome_tipo'],
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'table' => "curso/$idcurso/turmas"
		));
		}
		else{
			$list['ordem'] = "nome_curso";
			$rescurso = $crud->read(new Curso(),$list, array(new Tipo()));
			$rain->setConteudo(array("mensagem", "read_curso", "pagination"),array(
				
				'resultcurso' => $rescurso[0], 
				'pages' => $rain->getPagination($rescurso[0], $inicio,$limite,$rescurso[1][0]["COUNT(*)"]),
				'table' => 'curso',
				'mensagem' => "Não foram encontradas turmas para esse curso!",
				'resultado' => "danger"
			) );

		}
	}

	
	public function get_busca(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CursoController();
		$rain->setConteudo(array("busca_curso"), array(

				'tipo' => $crud->select(new Tipo())
		));	
	}
	
	
	public function get_insert($idcurso)
	{
		$crud = new TurmaController();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$curso = new Curso();
		$tipo = new Tipo();
		$curso->setIdcurso($idcurso);
		$selectCurso = $crud->select($curso, true);
		$tipo = $rain->setTable($selectCurso[0], $tipo);
		$selectCurso[0] = array_merge($selectCurso[0], array(
			'tipo_idtipo' => $tipo
		));
		$curso = $rain->setTable($selectCurso[0], $curso);

		
		$rain->setConteudo(array("cadastro_turma"),
			array(
				'action' => 'insert',
				'title' => 'Cadastrar',
				'idcurso' => $curso->getIdcurso(),
				'nome_curso' => $curso->getNome_curso(),
				'turno' => $crud->select(new Turno())

			) 
		);
	}

	
	public function post_insert()
	{
		
		$turma = new Turma();
		$turno = new Turno();
		$curso = new Curso();
		$tipo = new Tipo();
		$crud = new TurmaController();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);

		$turno = $rain->setTable($_POST, $turno);
		$selectTurno = $crud->select($turno, true);

		$curso = $rain->setTable($_POST, $curso);
		$selectCurso = $crud->select($curso, true);
		
		$tipo = $rain->setTable($selectCurso[0], $tipo);
		$selectCurso[0] = array_merge($selectCurso[0], array(
			'tipo_idtipo' => $tipo
		));
		$curso = $rain->setTable($selectCurso[0], $curso);
		$turma = $rain->setTable($_POST, $turma);

		$turma->setCurso_idcurso($curso);
		$turma->setTurno_idturno($turno);

		$res = $crud->insert($turma);

		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "cadastro_turma"),
			array(
				'action' => 'insert',
				'title' => 'Cadastrar',
				'mensagem' => 'Turma Cadastrada com sucesso',
				'resultado'  => 'success',
				'idcurso' => $turma->getCurso_idcurso()->getIdcurso(),
				'idturno' => $turma->getTurno_idturno()->getIdturno(),
				'nome_curso' => $turma->getCurso_idcurso()->getNome_curso(),
				'nome_turno' => $turma->getTurno_idturno()->getNome_turno(),
				'turno' => $crud->select(new Turno())
			));
		}
			else{

			$rain->setConteudo(array("mensagem", "cadastro_turma"),
			array(
				'action' => 'insert',
				'title' => 'Cadastrar',
				'mensagem' => 'Erro ao cadastrar turma',
				'resultado'  => 'danger',
				'idcurso' => $turma->getCurso_idcurso()->getIdcurso(),
				'nome_curso' => $turma->getCurso_idcurso()->getNome_curso(),
				'turno' => $crud->select(new Turno())
			));
		}
		
	
	}

	
	public function get_update($idturma)
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		$turma = new Turma();
		$curso = new Curso();
		$turno = new Turno();
		$turma->setIdturma($idturma);

		$selectTurma = $crud->select($turma, true, array($turma->getCurso_idcurso(),$turma->getturno_idturno()));
		unset($selectTurma[0]['tipo_idtipo']);
		
		$curso = $rain->setTable($selectTurma[0], $curso);
		$turno = $rain->setTable($selectTurma[0], $turno);

		$arrayobj = array(
			'curso_idcurso' => $curso,
			'turno_idturno' => $turno
		);
		$result = array_merge($selectTurma[0], $arrayobj);
		$turma = $rain->setTable($result, $turma);
		

		$rain->setConteudo(array("edit_cadastro_turma"),
			array(
				'data_inicio' => $turma->getData_inicio(),
				'data_termino' => $turma->getData_termino(),
				'idturma' => $turma->getIdturma(),
				'idcurso' => $turma->getCurso_idcurso()->getIdcurso(),
				'nome_curso' => $turma->getCurso_idcurso()->getNome_curso(),
				'nome_turno' => $turma->getTurno_idturno()->getNome_turno(),
				'idturno' => $turma->getTurno_idturno()->getIdturno(),
				'turno'=> $crud->select(new Turno()),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}

	
	public function post_update()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$turma = new Turma();
		$curso = new Curso();
		$turno = new Turno();

		$turma = $rain->setTable($_POST, $turma);
		$curso = $rain->setTable($_POST, $curso);
		$turno = $rain->setTable($_POST, $turno);

		$turma->setCurso_idcurso($curso);
		$turma->setTurno_idturno($turno);
		$turma = $rain->setTable($_POST, $turma);
		$crud = new TurmaController();
		$res = $crud->update($turma);
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem", "list_after_update"),array(
				'mensagem' => "Turma editada com sucesso!",
				'resultado' => "success",
				'link' => "/crud/curso/turmas/0/10/read",
				'name' => "turmas"
			) );
		}
		else{
			$selectCurso = $crud->select($curso,true);
			$curso = $turma->getCurso_idcurso();
			$curso->setNome_curso($selectCurso[0]['nome_curso']);
			$turma->setCurso_idcurso($curso);
			$rain->setConteudo(array("mensagem", "edit_cadastro_turma"),array(
				'mensagem' => "Erro ao editar turma",
				'resultado' => "danger",
				'data_inicio' => $turma->getData_inicio(),
				'data_termino' => $turma->getData_termino(),
				'idturma' => $turma->getIdturma(),
				'idcurso' => $turma->getCurso_idcurso()->getIdcurso(),
				'nome_curso' => $turma->getCurso_idcurso()->getNome_curso(),
				'nome_turno' => $turma->getTurno_idturno()->getNome_turno(),
				'idturno' => $turma->getTurno_idturno()->getIdturno(),
				'turno'=> $crud->select(new Turno()),
				'action' => 'update',
				'title' => 'Editar'
			) );
			
		}
	}
	
	
	public function listall($inicio,$limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'idturma'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Turma(),$list, array( new Curso(),new Turno()));
		if (!empty($resultado)) {
			foreach ($resultado as $keys => $values) {
				foreach ($values as $chave => $valor) {
					foreach ($valor as $key => $value) {
						if ($key == 'data_inicio' || $key == 'data_termino') {
							
							$resultado["$keys"]["$chave"]["$key"] = Convert::date_to_string($value);
						}
					}
				}
			}
		$rain->setConteudo(array("read_turma", "pagination"), array(

			'resultturma' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'title' => "Lista de turmas",
			'table' => 'curso/turmas'
		));
		}
		else{

		}	
	}

		
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaController();

		$turma = new Turma();
		$turma = $rain->setTable($_POST, $turma);
		$res = $crud->delete($turma);
		
		if ($res->getSuccess()) {
			$rain->setConteudo(array("mensagem","voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "success",
				'table' => "turma",
				'linklista' => "/crud/curso/turmas/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list"),array(
				'mensagem' => $res->getMessage(),
				'resultado' => "danger",
				'table' => "turma",
				'linklista' => "/crud/curso/turmas/0/10/read"
			) );
			
		}
	}

	
	public function get_delete($idturma){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaController();
		$turma = new Turma();
		$turno = new Turno();
		$curso = new Curso();
		$tipo =  new Tipo();
		
		$turma->setIdturma($idturma);
				
		$selectTurma = $crud->select($turma, true, array($curso, $turno));

		$turno = $rain->setTable($selectTurma[0], $turno);
		$selectTurma[0]['turno_idturno'] = $turno;

		$curso->setIdcurso($selectTurma[0]['curso_idcurso']);
		$selectCurso = $crud->select($curso,true, array($tipo));

		$tipo = $rain->setTable($selectCurso[0], $tipo);
		$selectCurso[0]['tipo_idtipo'] = $tipo;

		$curso = $rain->setTable($selectCurso[0], $curso);

		$selectTurma[0]['curso_idcurso'] = $curso;

		$turma = $rain->setTable($selectTurma[0], $turma);
		

		if (!empty($turma)) {
			
			$rain->setConteudo(array("delete_turma","scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'nome_turno' => $turma->getTurno_idturno()->getNome_turno(),
				'idturno' => $turma->getTurno_idturno(),
				'idturma' => $turma->getIdturma(),
				'nome_curso' => $turma->getCurso_idcurso()->getNome_curso(),
				'nome_tipo' => $turma->getCurso_idcurso()->getTipo_idtipo()->getNome_tipo(),
				'data_inicio' => Convert::date_to_string($turma->getData_inicio()),
				'data_termino' => Convert::date_to_string($turma->getData_termino())

				
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