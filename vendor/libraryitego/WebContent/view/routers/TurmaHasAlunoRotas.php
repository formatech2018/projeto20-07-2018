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
 * @search_post_insert=btc
 * @list_matricula_turma=btc
 * @list_matricula_aluno=btc
 * @listall=btc
 */


class TurmaHasAlunoRotas 
{
	
	public function list_matricula_turma($idturma,$inicio,$limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaHasAlunoController();
		$turma = new Turma();
		$turma_has_aluno = new Turma_has_Aluno();

		$turma->setIdturma($idturma);
		$turma_has_aluno->setTurma_idturma($turma);


		$selectTurmaHasAluno = $crud->read($turma_has_aluno);
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'data_inicio'
		);
		
		if (!empty($selectTurmaHasAluno)) {

			if (!empty($selectTurmaHasAluno[0])) {
				foreach ($selectTurmaHasAluno[0] as $keys => $values) {
					foreach ($values as $key => $value) {
						if ($key == 'data_inicio' || $key == 'data_termino') {
							
							$selectTurmaHasAluno[0]["$keys"]["$key"] = Convert::date_to_string($value);
						}
					}
				}
			}
			$rain->setConteudo(array("read_turma_has_aluno_idturma","pagination","scripts_cadastro_usuario"), array(

			'resultturmahasaluno' => $selectTurmaHasAluno[0],
			'title' => "Lista da turma ".$idturma,

			'pages' => $rain->getPagination($selectTurmaHasAluno[0], $inicio,$limite,$selectTurmaHasAluno[1][0]["COUNT(*)"]),
			'table' => "turma/$idturma/matriculas"
		));
			
			
		}
		else{
			$selectAluno = $crud->select($aluno,true, array(new Usuario()));
			if (!empty($selectAluno)) {
				
			}
			else{
				$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Não foi encontrada a turma",
				'resultado' => "danger"
				) );

			}

		}
	}

	
	public function list_matricula_aluno($idaluno,$inicio,$limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaHasAlunoController();
		$aluno = new Aluno();
		$turma_has_aluno = new Turma_has_Aluno();

		$aluno->setIdaluno($idaluno);
		$turma_has_aluno->setAluno_idaluno($aluno);


		$selectTurmaHasAluno = $crud->read($turma_has_aluno);
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'data_inicio'
		);
		
		if (!empty($selectTurmaHasAluno)) {
				foreach ($selectTurmaHasAluno[0] as $keys => $values) {
					foreach ($values as $key => $value) {
						if ($key == 'data_inicio' || $key == 'data_termino') {
							
							$selectTurmaHasAluno[0]["$keys"]["$key"] = Convert::date_to_string($value);
						}
					}
				}

			$rain->setConteudo(array("read_turma_has_aluno_idaluno","pagination","scripts_cadastro_usuario"), array(

			'resultturmahasaluno' => $selectTurmaHasAluno[0],
			'title' => "Lista de matrículas do aluno(a) ".$selectTurmaHasAluno[0][0]['nome_usuario'],

			'pages' => $rain->getPagination($selectTurmaHasAluno[0], $inicio,$limite,$selectTurmaHasAluno[1][0]["COUNT(*)"]),
			'table' => "aluno/$idaluno/matriculas"
		));
			
			
		}
		else{
			$selectAluno = $crud->select($aluno,true, array(new Usuario()));
			if (!empty($selectAluno)) {
				
			}
			else{
				$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Não foi encontrado o aluno",
				'resultado' => "danger"
				) );

			}

		}	
	}

	
	public function get_insert($idaluno,$idturma){
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaHasAlunoController();

		$selectAluno = $crud->select2(new Aluno(),true,array('usuario' => array()),array(),array('idaluno' => $idaluno));
		
		$selectTurma = $crud->select2(new Turma,true,array('curso' => array('tipo' => array()), 'turno' => array()),array(),array('idturma' => $idturma));

		if (empty($selectAluno) && empty($selectTurma)) {
			
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Aluno e turma não foram encontrados no sistema!",
				'resultado' => "danger"
			));
		}elseif (!empty($selectAluno) && empty($selectTurma)) {
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "A turma não foi encontrada no sistema!",
				'resultado' => "danger"
			));
			
		}elseif (!empty($selectTurma) && empty($selectAluno)) {
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "O aluno não foi encontrado no sistema!",
				'resultado' => "danger"
			));
		
		}elseif (!empty($selectTurma) && !empty($selectAluno)) {
			
			$rain->setConteudo(array("cadastro_turma_has_aluno"),array(
				'title' => "Cadastrar",
				'action' => "insert",
				'idturma' => $selectTurma[0]['idturma'],
				'nome_curso' => $selectTurma[0]['nome_curso'],
				'idcurso' => $selectTurma[0]['idcurso'],
				'idaluno' => $selectAluno[0]['idaluno'],
				'nome_usuario' => $selectAluno[0]['nome_usuario'],
				'cpf' => $selectAluno[0]['cpf'],
				'data_inicio' =>Convert::date_to_string($selectTurma[0]['data_inicio']),
				'data_termino' =>Convert::date_to_string($selectTurma[0]['data_termino']),
				'nome_tipo' =>$selectTurma[0]['nome_tipo'],
				'nome_turno' =>$selectTurma[0]['nome_turno']
				
			) );
		}
	}

	
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$turma_has_aluno = new Turma_has_Aluno();
		$crud = new TurmaHasAlunoController();
		$turma = new Turma();
		$aluno = new Aluno();

		$aluno->setIdaluno($_POST['idaluno']);
		$selectAluno = $crud->select($aluno, true);
		$turma->setIdturma($_POST['idturma']);
		$selectTurma = $crud->select($turma, true);

		$turma_has_aluno->setMatricula($_POST['matricula']);
		$selectMatricula = $crud->select($turma_has_aluno, true);

		if (!empty($selectAluno) && (!empty($selectTurma))) {
				
				if (empty($selectMatricula)) {
					
					$turma->setIdturma($selectTurma[0]['idturma']);
					$aluno->setIdaluno($selectAluno[0]['idaluno']);
					$turma_has_aluno->setMatricula($_POST['matricula']);

					$turma_has_aluno->setTurma_idturma($turma);
					$turma_has_aluno->setAluno_idaluno($aluno);

					$res = $crud->insert($turma_has_aluno);
					if (!empty($res)) {
						$rain->setConteudo(array("mensagem", "busca_turma_has_aluno"),array(
							'mensagem' => "Matrícula cadastrada com sucesso",
							'resultado' => "success"
						) );
					}
					else
						{
							$rain->setConteudo(array("mensagem", "busca_turma_has_aluno"),array(
								'mensagem' => "Erro ao cadastrar matrícula",
								'resultado' => "danger"
							) );
						}
				}
				else{
					$rain->setConteudo(array("mensagem", "busca_turma_has_aluno"),array(
					'mensagem' => "Matrícula já está cadastrada",
					'resultado' => "danger"
			) );
				}
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao encontrar Curso ou Aluno",
				'resultado' => "danger"
			) );
		}
	}

	
	public function search_post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaHasAlunoController();

		$selectAluno = $crud->select2(new Aluno(),true,array('usuario' => array()),array(),array('cpf' => $_POST['cpf'], 'usuario_status' => 1));
		
		$selectTurma = $crud->select2(new Turma(),true,array('turno' => array(),'curso' => array('tipo' => array())),array(),array('idturma' => $_POST['idturma']));
		
		if (!empty($selectAluno) && !empty($selectTurma)) {
			

			$rain->setConteudo(array("mensagem","busca_turma_has_aluno","resultado_busca_turma_has_aluno"),array(
					'idaluno' => $selectAluno[0]['idaluno'],
					'cpf'=> $selectAluno[0]['cpf'],
					'nome_usuario' => $selectAluno[0]['nome_usuario'],
					'dtnasc' => Convert::date_to_string($selectAluno[0]['dtnasc']),
					'idturma' => $selectTurma[0]['idturma'],
					'idcurso' => $selectTurma[0]['idcurso'],
					'nome_curso' => $selectTurma[0]['nome_curso'],
					'nome_tipo' => $selectTurma[0]['nome_tipo'],
					'data_inicio' => Convert::date_to_string($selectTurma[0]['data_inicio']),
					'data_termino' => Convert::date_to_string($selectTurma[0]['data_termino']),
					'nome_turno' => $selectTurma[0]['nome_turno'],
					'mensagem' => "Dados encontrados com sucesso!",
					'resultado' => "success"
			) );

		}
		else{
			$cpf = $crud->mask($_POST['cpf'],'###.###.###-##');
			if (empty($selectAluno) && empty($selectTurma)) {
				$mensagem = "Cpf ".$cpf." e turma ".$_POST['idturma']." não foram encontrados! verifique se o aluno já ativou sua conta no sistema!";
			}elseif(empty($selectTurma)){
				$mensagem = "Erro ao encontrar turma ".$_POST['idturma'];
			}
			else{
				$mensagem = "Erro ao encontrar CPF ".$cpf." ou o aluno ainda está desativado no sistema!";
			}
			$rain->setConteudo(array("mensagem","busca_turma_has_aluno" ),array(
				'mensagem' => $mensagem,
				'resultado' => "danger"
			) );

		}
	
	}

	
	public function get_update($matricula)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaHasAlunoController();
		$turma_has_aluno = new Turma_has_Aluno();
		$aluno = new Aluno();
		$turma = new Turma();
		$curso = new Curso();
		$usuario = new Usuario();
		$tipo = new Tipo();
		$turno = new Turno();


		$turma_has_aluno->setMatricula($matricula);
		$selectMatricula = $crud->select($turma_has_aluno, true);

		$aluno->setIdaluno($selectMatricula[0]['aluno_idaluno']);
		$selectAluno = $crud->select($aluno, true, array($usuario));

		unset($selectAluno[0]['endereco_idendereco']);
		$usuario = $rain->setTable($selectAluno[0],$usuario);
		$selectAluno[0]['usuario_idusuario'] = $usuario;

		$aluno = $rain->setTable($selectAluno[0], $aluno);
		$turma_has_aluno->setAluno_idaluno($aluno);

		$turma->setIdturma($selectMatricula[0]['turma_idturma']);
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

		$turma_has_aluno->setTurma_idturma($turma);


		if (!empty($turma_has_aluno)) {
			
			$rain->setConteudo(array("edit_cadastro_turma_has_aluno", "scripts_cadastro_usuario"),
			array(
				
				'action' => 'update',
				'title' => 'Editar',
				'cpf' => $turma_has_aluno->getAluno_idaluno()->getUsuario_idusuario()->getCpf(),
				'nome_usuario' => $turma_has_aluno->getAluno_idaluno()->getUsuario_idusuario()->getNome_usuario(),
				'idturma' => $turma_has_aluno->getTurma_idturma()->getIdturma(),
				'idaluno' => $turma_has_aluno->getAluno_idaluno()->getIdaluno(),
				'nome_curso' => $turma_has_aluno->getTurma_idturma()->getCurso_idcurso()->getNome_curso(),
				'nome_tipo' => $turma_has_aluno->getTurma_idturma()->getCurso_idcurso()->getTipo_idtipo()->getNome_tipo(),
				'nome_turno' => $turma_has_aluno->getTurma_idturma()->getTurno_idturno()->getNome_turno(),
				'data_inicio' => Convert::date_to_string($turma_has_aluno->getTurma_idturma()->getData_inicio()),
				'data_termino' => Convert::date_to_string($turma_has_aluno->getTurma_idturma()->getData_termino()),
				'matricula'=> $turma_has_aluno->getMatricula()
			)
		);	
		}
		else
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar matrícula!",
			'resultado' => "danger"

		));
	}

	
	public function post_update()
	{
		

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaHasAlunoController();

		$turma_has_aluno = new Turma_has_Aluno();
		$turma_has_aluno = $rain->setTable($_POST, $turma_has_aluno);

		$res = $crud->update_matricula($_POST['matriculaantiga'],$turma_has_aluno);

		
		if (!empty($res)) {
			$rain->setConteudo(array("mensagem","list_after_update"),array(
				'mensagem' => "Matrícula editada com sucesso!",
				'resultado' => "success",
				'link' => "/crud/matricula/0/10/read",
				'name' => "matrículas"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "list_after_update"),array(
				'mensagem' => "Erro ao editar Matrícula",
				'resultado' => "danger",
				'link' => "/crud/matricula/0/10/read",
				'name' => "matrículas"
			) );
			
		}
		
	}

	
	public function post_delete(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaHasAlunoController();

		$turma_has_aluno = new Turma_has_Aluno();
		$turma_has_aluno = $rain->setTable($_POST, $turma_has_aluno);

		$res = $crud->delete($turma_has_aluno);

		
		if (empty($res)) {
			$rain->setConteudo(array("mensagem","voltar_list"),array(
				'mensagem' => "Matrícula excluída com sucesso!",
				'resultado' => "success",
				'table' => "matricula",
				'linklista' => "/crud/matricula/0/10/read"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem", "voltar_list"),array(
				'mensagem' => "Erro ao excluir Matrícula",
				'resultado' => "danger",
				'table' => "matricula",
				'linklista' => "/crud/matricula/0/10/read"
			) );
			
		}
	}

	
	public function get_delete($matricula){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaHasAlunoController();
		$turma_has_aluno = new Turma_has_Aluno();
		$aluno = new Aluno();
		$turma = new Turma();
		$curso = new Curso();
		$usuario = new Usuario();
		$tipo = new Tipo();
		$turno = new Turno();


		$turma_has_aluno->setMatricula($matricula);
		$selectMatricula = $crud->select($turma_has_aluno, true);

		$aluno->setIdaluno($selectMatricula[0]['aluno_idaluno']);
		$selectAluno = $crud->select($aluno, true, array($usuario));

		unset($selectAluno[0]['endereco_idendereco']);
		$usuario = $rain->setTable($selectAluno[0],$usuario);
		$selectAluno[0]['usuario_idusuario'] = $usuario;

		$aluno = $rain->setTable($selectAluno[0], $aluno);
		$turma_has_aluno->setAluno_idaluno($aluno);

		$turma->setIdturma($selectMatricula[0]['turma_idturma']);
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

		$turma_has_aluno->setTurma_idturma($turma);


		if (!empty($turma_has_aluno)) {
			
			$rain->setConteudo(array("delete_turma_has_aluno", "scripts_cadastro_usuario"),
			array(
				
				'action' => 'delete',
				'title' => 'Excluir',
				'cpf' => $turma_has_aluno->getAluno_idaluno()->getUsuario_idusuario()->getCpf(),
				'nome_usuario' => $turma_has_aluno->getAluno_idaluno()->getUsuario_idusuario()->getNome_usuario(),
				'idturma' => $turma_has_aluno->getTurma_idturma()->getIdturma(),
				'idaluno' => $turma_has_aluno->getAluno_idaluno()->getIdaluno(),
				'nome_curso' => $turma_has_aluno->getTurma_idturma()->getCurso_idcurso()->getNome_curso(),
				'nome_tipo' => $turma_has_aluno->getTurma_idturma()->getCurso_idcurso()->getTipo_idtipo()->getNome_tipo(),
				'nome_turno' => $turma_has_aluno->getTurma_idturma()->getTurno_idturno()->getNome_turno(),
				'data_inicio' => Convert::date_to_string($turma_has_aluno->getTurma_idturma()->getData_inicio()),
				'data_termino' => Convert::date_to_string($turma_has_aluno->getTurma_idturma()->getData_termino()),
				'matricula'=> $turma_has_aluno->getMatricula()
			)
		);	
		}
		else
		
		$rain->setConteudo(array("mensagem"), array(

			'mensagem' => "Erro ao encontrar matrícula!",
			'resultado' => "danger"

		));

	}
	
	
	public function listall($inicio,$limite)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new TurmaHasAlunoController();
		
		$list = array(
			'inicio' => $inicio,
			'limite' => $limite,
			'ordem' => 'matricula'
		);
		//$list = array_merge($list, $previous);
		$resultado = $crud->read(new Turma_has_Aluno(),$list, array(new Aluno(), new Turma()));
		;

		$rain->setConteudo(array("read_turma_has_aluno", "pagination"), array(

			'resultturmahasaluno' => $resultado[0], 
			'pages' => $rain->getPagination($resultado[0], $inicio,$limite,$resultado[1][0]["COUNT(*)"]),
			'title' => "Lista de Matriculas",

			'table' => 'matricula'
		));
		
	}	
}

 ?>