<?php 
namespace ViewController\view\routers;

/*require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/libraryitego/WebContent/view/routers/config/Config.php');*/
use \ViewController\RainTpl;
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{Controller,CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController};
	use \Controller\util\Convert;
	
/**
 * @get_update=usr
 */
class FuncionarioRotas 
{

	public function get_update($idfuncionario)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new FuncionarioController();
		$funcionario = new Funcionario();
		$endereco = new Endereco();
		$formacao = new Formacao();
		$cargo = new Cargo();
		$funcionario->setIdfuncionario($idfuncionario);
		$res = $crud->select($funcionario, true);

		
		$selectFuncionario = $crud->select($funcionario, true, array($funcionario->getUsuario_idusuario(), $funcionario->getCargo_idcargo(), $funcionario->getFormacao_idformacao()));

		//$selectFuncionario = $crud->select($funcionario, true, array($funcionario->getUsuario_idusuario()));

		$endereco->setIdendereco($selectFuncionario[0]['endereco_idendereco']);
		$formacao->setIdformacao($selectFuncionario[0]['formacao_idformacao']);
		$cargo->setIdcargo($selectFuncionario[0]['cargo_idcargo']);

		$selectEndereco = $crud->select($endereco, true);
		$formacao = $rain->setTable($selectFuncionario[0], $formacao);
		$cargo = $rain->setTable($selectFuncionario[0], $cargo);

		$funcionario->setFormacao_idformacao($formacao);
		$funcionario->setCargo_idcargo($cargo);
		$endereco = $rain->setTable($selectEndereco[0], $endereco);

		$arrayobj = array(
		
		'endereco_idendereco' => $endereco	
			
		);
		$result = array_merge($selectFuncionario[0], $arrayobj);
		$funcionario->setUsuario_idusuario($rain->setTable($result, $funcionario->getUsuario_idusuario()));
		
		$rain->setConteudo(array("edit_cadastro_funcionario", "scripts_cadastro_usuario"),
			array(
				'idfuncionario' => $funcionario->getIdfuncionario(),
				'idusuario' => $funcionario->getUsuario_idusuario()->getIdusuario(),
				'nome_usuario' => $funcionario->getUsuario_idusuario()->getNome_usuario(),
				'cpf' => $funcionario->getUsuario_idusuario()->getCpf(),
				'email' => $funcionario->getUsuario_idusuario()->getEmail(),
				'telefone_fixo' => $funcionario->getUsuario_idusuario()->getTelefone_fixo(),
				'telefone_celular' => $funcionario->getUsuario_idusuario()->getTelefone_celular(),
				'dtnasc' => Convert::date_to_string($funcionario->getUsuario_idusuario()->getDtnasc()),

				'idendereco' => $funcionario->getUsuario_idusuario()->getEndereco_idendereco()->getIdendereco(),
				'rua' => $funcionario->getUsuario_idusuario()->getEndereco_idendereco()->getRua(),
				'complemento' => $funcionario->getUsuario_idusuario()->getEndereco_idendereco()->getComplemento(),
				'numero' => $funcionario->getUsuario_idusuario()->getEndereco_idendereco()->getNumero(),
				'bairro' =>$funcionario->getUsuario_idusuario()->getEndereco_idendereco()->getBairro(),
				'cep' => $funcionario->getUsuario_idusuario()->getEndereco_idendereco()->getCep(),
				'cidade' => $funcionario->getUsuario_idusuario()->getEndereco_idendereco()->getCidade(),
				'estado' => $funcionario->getUsuario_idusuario()->getEndereco_idendereco()->getEstado(),
				'formacao' => $crud->select(new Formacao()),
				'idformacao' => $funcionario->getFormacao_idformacao()->getIdformacao(),
				'cargo' => $crud->select(new Cargo()),
				'idcargo' => $funcionario->getCargo_idcargo()->getIdcargo(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}
}

 ?>