<?php 
namespace ViewController\view\routers;

/*require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/libraryitego/WebContent/view/routers/config/Config.php');*/
use \ViewController\RainTpl;
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{Controller,CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController};
	use \Controller\util\Convert;
	
/**
 * @get_AvaliacaoInsert=usr
 * @post_AvaliacaoInsert=usr
 */
class AvaliacaoRotas 
{
	
	
	public function get_AvaliacaoInsert($idemprestimo)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$control = new CrudController();

		$res = $control->select2(new Emprestimo(),true,array('patrimonio' => array('livro' => array())),array("idpatrimonio","nome_livro","idemprestimo"),array('idemprestimo' => $idemprestimo),array(),"");

		$res2 = $control->select2(new Avaliacao(),true,array('emprestimo' => array()),array("idemprestimo"),array('idemprestimo' => $idemprestimo),array(),"");

		if(empty($res2)){
			$rain->setConteudo(array("avaliacao"), array(
						'result' => $res,
						'idemprestimo' => $res[0]['idemprestimo']
			
						));
		}else{

			$rain->setConteudo(array("mensagem"), array(
						'mensagem' => "Você já realizou a avaliação!",
						'resultado' => "danger"
			
						));
		}
	}

	public function post_AvaliacaoInsert(){

		$acesso = Controller::getAcesso($_SESSION);
		$control = new AvaliacaoController();
		$rain = new RainTpl($acesso);
		$avaliacao =  new Avaliacao();
		$emprestimo = new Emprestimo();

		$res = $control->avaliacaoInsert($_POST['comentario'],$_POST['emprestimo_idemprestimo']);

		if (empty($res)) {
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Avaliação realizada com sucesso!",
				'resultado' => "success"
			) );
		}
		else{
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao realizar avaliação!",
				'resultado' => "danger"
			) );
			
		}
	}

		
}

 ?>