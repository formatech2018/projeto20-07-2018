<?php 
	namespace ViewController\view\routers;
	
	use \Slim\Slim;
	use \ViewController\{RainTpl,RelatorioRainTpl};
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{Controller, RelatorioAnoController, CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController,LoginController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController,RelatorioController};
	use \Controller\util\{Convert, Retorno,RetornoLogin};
	/**
	 * 
	 */
	class LoginRotas
	{
		public function get_login()
		{
			$rain = new RainTpl();
			$rain->setConteudo(array("login"));
		}

		public function post_login(){
			
			$login = new LoginController();

			$email = $_POST['email'];
			$senha = $_POST['senha'];

			$selectUsuario = $login->select3(new Senha(),true,array('usuario' => array()),array(),array('senha_usuario' => $senha, 'email' => $email, 'usuario_status' => 0),array('idsenha' => "desc"));

			if (empty($selectUsuario)) {
			
				$res = $login->login($email, $senha);

				if ($res->getSuccess()) {
					$_SESSION['acesso'] = $res->getNivel();
					$_SESSION['id'] = $res->getId(); 
					$acesso = Controller::getAcesso($_SESSION);
					$rain = new RainTpl($acesso);
					$rain->setConteudo(array("mensagem","index"), array(

						"mensagem" => $res->getMessage(),
						'resultado' => "success"
					));
		
				}
				else{
					$acesso = Controller::getAcesso($_SESSION);
					$rain = new RainTpl($acesso);
					$rain->setConteudo(array("mensagem", "login"), array(

						'mensagem' => $res->getMessage(),
						'resultado' => "danger"

					));

				}
			}else{
				$rain = new RainTpl();
				$rain->setConteudo(array("mensagem", "login"), array(

						'mensagem' => "Usuário foi desativado!",
						'resultado' => "danger"

					));
				
			}
		}
		
	}

 ?>