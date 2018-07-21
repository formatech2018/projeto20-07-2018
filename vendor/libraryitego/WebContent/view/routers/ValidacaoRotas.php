<?php 
namespace ViewController\view\routers;

use \Slim\Slim;
	use \ViewController\{RainTpl,RelatorioRainTpl,EmailRainTpl,Email};
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{Controller, RelatorioAnoController, CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController,RelatorioController,VerificaController,UsuarioController};
	use \Controller\util\{Convert, Retorno,RetornoLogin,Encripty};

/**
 * @get_validaFuncionario=btc
 * @get_AtivaFuncionario=btc
 * @get_DeleteFuncionario=btc

 */
class ValidacaoRotas
{


	public function validacaoEmail($idusuario)
	{
		$user = new Usuario();
		$user->setIdusuario($idusuario);
		$crud = new CrudController();
		$usr_control = new UsuarioController();
		$res = $crud->select($user, true);

					if (!empty($res)) {
					$verifica = new VerificaController();
					$hash = Encripty::toEncripty(strtotime("now"));
					//$status = $usr_control->update_status($res[0]['idusuario']);
					$email = new Email();
					$rain_email = new EmailRainTpl();
					$ret = $verifica->insert_hash($res[0]['idusuario'],$hash);
					
					$html = $rain_email->setConteudo(array("valida_email"),array(

						'hash' => $hash

					)); 


					$email->enviar(array(

						'emailsend' => $res[0]['email'],
						'subject' => "Validação de email do sistema de biblioteca do ITEGO",
						'contents' => $html
					));
					
					$rain = new RainTpl();
					$rain->setConteudo(array("mensagem"),array(
							'mensagem' => "Usuario cadastrado com sucesso, acesse seu email para que seja validado",
							'resultado' => "success"
					));	
					}else{

						
					$rain = new RainTpl();
						$rain->setConteudo(array("mensagem"),array(
							'mensagem' => "Usuário não encontrado!",
							'resultado' => "danger"
					));
					}
	}

	public function get_validaFuncionario()
	{
		$control = new CrudController();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);

		$res = ValidacaoRotas::get_FuncionariosDesativados();
		if (!empty($res)) {

			$rain->setConteudo(array("lista_funcionarios_desativados","scripts_delete"),array(

			'result' => $res
		));

		}else{

			$rain->setConteudo(array("mensagem"),array(

			'mensagem' => "Não existem funcionários desativados!",
			'resultado' => "danger"
		));

		}
		
		
		
	}
	public function get_AtivaFuncionario($idusuario)
	{
		$control = new UsuarioController();
		$ativar = $control->update_status($idusuario);
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);

		$res = $control->select2(new Usuario(),true,array(),array("usuario_status"),array('idusuario' => $idusuario),array(),'');

		if ($res[0]['usuario_status'] == 1) {
			$rain->setConteudo(array("mensagem","lista_funcionarios_desativados","scripts_delete"),array(
					'mensagem' => "Funcionário Ativado com sucesso!",
					'resultado' => "success",
					'result' => ValidacaoRotas::get_FuncionariosDesativados()
					
			));
		}
		else{

			$rain->setConteudo(array("mensagem","lista_funcionarios_desativados","scripts_delete"),array(
					'mensagem' => "Funcionário não foi ativado!",
					'resultado' => "danger",
					'result' => ValidacaoRotas::get_FuncionariosDesativados()
			));
		}

	}

	public function get_DeleteFuncionario($idusuario){

		$control = new UsuarioController();
		$res = $control->get_DeleteFuncionario($idusuario);
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);

		if (empty($res)) {

			$rain->setConteudo(array("mensagem","lista_funcionarios_desativados"),array(
					'mensagem' => "Funcionário Excluído com sucesso!",
					'resultado' => "success",
					'result' => ValidacaoRotas::get_FuncionariosDesativados()
					
			));

			
		}else{
			$rain->setConteudo(array("mensagem","lista_funcionarios_desativados"),array(
					'mensagem' => "Funcionário não foi excluído!",
					'resultado' => "danger",
					'result' => ValidacaoRotas::get_FuncionariosDesativados()
			));
		}

	}

	private static function get_FuncionariosDesativados()
	{
		$control = new UsuarioController();
		return $control->select2(new Funcionario(),true, array('usuario' => array(),'cargo' => array()),array(),array('usuario_status' => 0),array('nome_usuario' => 'asc'),'');
	}

}

 ?>