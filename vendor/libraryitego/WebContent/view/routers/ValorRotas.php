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
 */
class ValorRotas 
{
	//@acesso=adm
	public function get_insert()
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("cadastro_valor_multa"));	
	}

	//@acesso=adm
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$valor = new Valor();
		$valor = $rain->setTable($_POST, $valor);
		$crud = new ValorController();
		$res = $crud->insert($valor);

		if (!empty($res)) {
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Valor fixo diário da multa cadastrado com sucesso!",
				'resultado' => "success",
				'action' => 'insert',
				'title' => 'Cadastrar'
			) );
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao cadastrar valor fixo diário da multa",
				'resultado' => "danger"
			) );
			
		}

	}

	//@acesso=adm
	public function get_update($idvalor)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new ValorController();
		$valor = new Valor();
		$valor->setIdvalor($idvalor);
		$selectValor = $crud->select($valor, true);
		$valor->setValor_diario_multa($selectValor[0]['valor_diario_multa']);
		$rain->setConteudo(array("edit_cadastro_valor_multa"),
			array(
				'valor_diario_multa' => $valor->getValor_diario_multa(),
				'idvalor' => $valor->getIdvalor(),
				'action' => 'update',
				'title' => 'Editar'
			)
		);	
	}
}

 ?>