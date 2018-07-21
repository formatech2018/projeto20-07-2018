<?php 
namespace ViewController\view\routers;

/*require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/libraryitego/WebContent/view/routers/config/Config.php');*/
use \ViewController\{EmailRainTpl,RainTpl,Email,RelatorioRainTpl};
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno,Verifica};
	use \Controller\control\{Controller,CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController,VerificaController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController,UsuarioController,RelatorioController};
	use \Controller\util\{Convert,Encripty};
	
/**
 * @get_update_senha=usr
 * @post_update_senha=usr
 * @get_update_senha_email=usr
 * @post_update_senha_email=usr
 * @get_disabled_usuario=usr
 * @post_disabled_usuario=usr
 * @busca_carteirinha_usuario=usr
 * @usr_emitir_carteirinha=usr
 * @adm_emitir_carteirinha=btc
 */
class UsuarioRotas 
{
	public function busca_carteirinha_usuario()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		
		$rain->setConteudo(array("busca_carteirinha_usuario","scripts_cadastro_usuario"));

	}
	public function adm_emitir_carteirinha()
	{
		
		$user = new UsuarioController();
		$selectUsuario = $user->select2(new Usuario(),true,array(),array('idusuario','cpf','nome_usuario'),array('cpf' => $_POST['cpf']));

		if (!empty($selectUsuario)) {
			$acesso = Controller::getAcesso($_SESSION);
			$relatorio = new RelatorioController();
			$rainR = new RelatorioRainTpl();

			$today = new \DateTime();
			$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
			$atual = $today->format('d/m/Y');

			$generator = new \Picqer\Barcode\BarcodeGeneratorJPG();
			$jpgbarcode = $generator->getBarcode($selectUsuario[0]['cpf'],$generator::TYPE_CODE_128);
			$cod = base64_encode($jpgbarcode);

				
				
				$html = $rainR->setConteudo(array("resultado_busca_carteirinha"),array(

				'nome_usuario'=> strtoupper($selectUsuario[0]['nome_usuario']),
				'imgbarra' => $cod,
				'atual' => $atual
				

			));
				$pdf = $relatorio->callMpdf2($html);
				exit;
		}else{
			
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","busca_carteirinha_usuario","scripts_cadastro_usuario"),array(
				'mensagem' => "CPF não encontrado!",
				'resultado' => "danger"
			)); 
		}
	}
	public function usr_emitir_carteirinha()
	{
		
		UsuarioRotas::emitir_carteirinha($_SESSION['id']); 
	}


	private function emitir_carteirinha($idusuario)
	{
		$relatorio = new RelatorioController();
		$rainR = new RelatorioRainTpl();
		$selectUsuario = $relatorio->select(new Usuario(),true,array(),array(),array('idusuario' => $idusuario)); 

			$today = new \DateTime();
			$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
			$atual = $today->format('d/m/Y');

			$generator = new \Picqer\Barcode\BarcodeGeneratorJPG();
			$jpgbarcode = $generator->getBarcode($selectUsuario[0]['cpf'],$generator::TYPE_CODE_128);
			$cod = base64_encode($jpgbarcode);

				
				
				$html = $rainR->setConteudo(array("resultado_busca_carteirinha"),array(

				'nome_usuario'=> strtoupper($selectUsuario[0]['nome_usuario']),
				'imgbarra' => $cod,
				'atual' => $atual
				

			));
				$relatorio->callMpdf2($html);
				exit;

		
	}

	public function get_disabled_usuario(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);

		$rain->setConteudo(array("mensagem","disabled_usuario"),array(

			'mensagem' => "Atenção! Ao desativar seu cadastro, não poderá ter acesso ao sistema!",
			'resultado' => "danger"
		));




	}

	public function post_disabled_usuario(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);

		$control = new UsuarioController();

		$res = $control->update_status($_SESSION['id'],0);

		$selectUsuario = $control->select2(new Usuario(), true, array(), array(),array('idusuario' => $_SESSION['id']));

		if ($selectUsuario[0]['usuario_status'] == 0) {

			session_destroy();
			$rain->setConteudo(array("mensagem","index"),array(

				'mensagem' => "A conta do usuário ".$selectUsuario[0]['nome_usuario']." foi desativada com sucesso!",
				'resultado' => "success"

			));
		}

		else{

			$rain->setConteudo(array("mensagem","index"),array(

				'mensagem' => "Erro ao desativar a conta do usuário ".$selectUsuario[0]['nome_usuario'],
				'resultado' => "danger"

			));
		}

		


	}
	
	
	public function get_insert()
	{
		$crud = new CrudController();
		

		$carg = $crud->select2(new Cargo(),false,array(),array(),array(),array('nome_cargo' => 'asc'));
		$form = $crud->select2(new Formacao(),false,array(),array(),array(),array('nome_formacao' => 'asc'));
		

		
		$rain = new RainTpl();
		$rain->setConteudo(array("cadastro","scripts_cadastro_usuario"),
			array(
				'formacao' => $form,
				'cargo' => $carg,
				'action' => 'insert',
				'title' => 'Cadastrar'
			) 
		);
	}

	public function get_verify(){
		$hash = $_GET['h'];

		$today = new \DateTime();
		$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
		$crud = new UsuarioController();


		$res = $crud->get_verify($hash);
			
		if (!empty($res)) {

		$datasolicitacao = new \DateTime($res[0]['data_verifica'],new \DateTimeZone('America/Sao_Paulo'));
		//$datasolicitacao->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
		$datasolicitacao->add(new \DateInterval('PT0H15M'));


		//var_dump($datasolicitacao);
		//$datasolicitacao = (new \DateTime($datasolicitacao))->add(new \DateInterval('PT0H15M'));
		$data =  $datasolicitacao->format('Y-m-d H:i:s');	

		$data_atual = $today->format("Y-m-d H:i:s");
		$maisquinze = strtotime($data);

		

			if (strtotime($data_atual) < $maisquinze) {
				$status = $crud->update_status($res[0]['idusuario']);
				$rain = new RainTpl();
				$rain->setConteudo(array("mensagem","login"),array(

					'mensagem' => "Email validado com Sucesso! Faça seu Login!",
					'resultado' => "success"

				));


				
			}else{

				$rain = new RainTpl();
				$rain->setConteudo(array("mensagem","verificacao","login"),array(

					'mensagem' => "Tempo de verificação do email foi excedido!",
					'resultado' => "danger"

				));


			}
			

		}else{
				$rain = new RainTpl();
				$rain->setConteudo(array("mensagem","verificacao"),array(

					'mensagem' => "Hash não foi encontrada! Digite seu email para enviarmos uma nova validação de email!",
					'resultado' => "danger"
				));

			
		}


	}
	
	
	public function post_update_or_insert($action)
	{
		$tipo = ucfirst($_POST['tipo_usuario']);
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$class = "Controller\model\\".$tipo;
		$usr = new $class();
		//$usr = new {$class}();
		$usuario = new Usuario();
		$end = new Endereco();
		$senha = new Senha();
		if (strcmp($_POST['tipo_usuario'], "funcionario") === 0) {
			$crud = new FuncionarioController();	
		}else{
			$crud = new AlunoController();
		}
		
		$usr_select = $crud->select($usuario,false);
		

		
		$usr = $rain->setTable($_POST, $usr);
		$usuario = $rain->setTable($_POST, $usuario);
		$end = $rain->setTable($_POST, $end);
		$usuario->setEndereco_idendereco($end);
		$senha = $rain->setTable($_POST, $senha);
		
		$usr->setUsuario_idusuario($usuario);


		if (strcmp($_POST['tipo_usuario'], "funcionario") === 0) {
			$formacao = new Formacao();
			$cargo = new Cargo();
			$carg = $rain->setTable($_POST, $cargo);
			$form = $rain->setTable($_POST, $formacao);

			$usr->setFormacao_idformacao($form);
			$usr->setCargo_idcargo($carg);
			
		}

		$classController = "Controller\control\\".$tipo . "Controller";
		$crud = new $classController();
		$res = $crud->{$action}($usr);
	
		if (strcmp($action, "insert") === 0) {	

		
			if (!empty($res)) {
				$usuario->setIdusuario($res[0]['usuario_idusuario']);
				
				$senha->setUsuario_idusuario($usuario);
				$senha->setData_cadastro($res[0]['first_register']);

				$senhaController = new SenhaController();
		
				$res2 = $senhaController->insert($senha);
		
				if (!empty($res2)) {

					if (strcmp($_POST['tipo_usuario'], "funcionario") != 0) {
						header('Location: /valida/email/'.$res[0]['usuario_idusuario']);
						exit;
					}else{
						$rain->setConteudo(array("mensagem"),array(
							'mensagem' => "Usuario cadastrado com sucesso",
							'resultado' => "success"
						));	
					}
						
				}
				else{

					$rain->setConteudo(array("mensagem", "cadastro", "scripts_cadastro_usuario"),array(
					'mensagem' => "Erro ao cadastrar Usuário",
					'resultado' => "danger",
					'title' => 'Cadastrar',
					'action' => 'insert'
				));
					
				}
					
			}else{
					$rain->setConteudo(array("mensagem", "cadastro", "scripts_cadastro_usuario"),array(
					'mensagem' => "Erro ao cadastrar Usuário",
					'resultado' => "danger",
					'title' => 'Cadastrar',
					'action' => 'insert'
				));
			}
	}
		else{
			if (!empty($res)) {

				$array_usuario = array(
				
				'idusuario' => $res[0]['idusuario'],
				'nome_usuario' => $res[0]['nome_usuario'],
				'cpf' => $res[0]['cpf'],
				'email' => $res[0]['email'],
				'telefone_fixo' => $res[0]['telefone_fixo'],
				'telefone_celular' => $res[0]['telefone_celular'],
				'dtnasc' => Convert::date_to_string($res[0]['dtnasc']),

				'idendereco' =>$res[0]['idendereco'],
				'rua' => $res[0]['rua'],
				'complemento' => $res[0]['complemento'],
				'numero' => $res[0]['numero'],
				'bairro' =>$res[0]['bairro'],
				'cep' => $res[0]['cep'],
				'cidade' =>$res[0]['cidade'],
				'estado' => $res[0]['estado'],
				
				'action' => 'update',
				'title' => 'Editar'
			);
				if ($tipo === 'Funcionario') {

					$array_usuario_funcionario = array(
						'idfuncionario' => $res[0]['idfuncionario'],
						'formacao' => $crud->select(new Formacao()),
						'idformacao' => $res[0]['formacao_idformacao'],
						'cargo' => $crud->select(new Cargo()),
						'idcargo' => $res[0]['cargo_idcargo']
					);
					$array_usuario_result = array_merge($array_usuario, $array_usuario_funcionario);
				}
				else{
					$array_usuario_aluno = array(
						'idaluno' => $res[0]['idaluno']
						
					);
					$array_usuario_result = array_merge($array_usuario, $array_usuario_aluno);


				}
				$array_usuario_result  = array_merge($array_usuario_result, array(
					'mensagem' => "Usuário editado com sucesso",
					'resultado' => "success",
					'title' => 'Editar',
					'action' => 'update'

				));
				$rain->setConteudo(array("mensagem", "edit_cadastro_".strtolower($tipo), "scripts_cadastro_usuario"), $array_usuario_result);
			}
			else{
				$rain->setConteudo(array("mensagem", "edit_cadastro_".strtolower($tipo), "scripts_cadastro_usuario"),array(
					'mensagem' => "Erro ao editar Usuário",
					'resultado' => "danger",
					'title' => 'Editar',
					'action' => 'update'

				));
			}
		}
	

	}

	public function get_update_senha()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("edit_cadastro_usuario_senha","scripts_cadastro_usuario"),array(
					
				));
	}

	public function post_update_senha()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$control = new SenhaController();
		$res = $control->select2(new Senha(),true,array(),array(),array(
			'usuario_idusuario' => $_SESSION['id'],
			'senha_usuario' => $_POST['senha_antiga']
		));

		if (!empty($res)) {
			$senha = new Senha();
			$usuario = new Usuario();
			$usuario->setIdusuario($res[0]['usuario_idusuario']);
		
		$today = new \DateTime();
		$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));

		

				$senha->setUsuario_idusuario($usuario);
				$senha->setData_cadastro($today->format('Y-m-d'));
				$senha->setSenha_usuario($_POST['senha_usuario']);
		
				$res2 = $control->insert($senha);

				$rain->setConteudo(array("mensagem","index"), array(

					'mensagem' => "Senha alterada com sucesso!",
					'resultado' => "success"
				));
		}
		else{

			$rain->setConteudo(array("mensagem","index"), array(

					'mensagem' => "Não foi possível alterar a senha!",
					'resultado' => "danger"
				));

		}

	}

	public function post_update_senha_email(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$control = new SenhaController();
		
		$res = $control->select2(new Senha(),true,array(),array(),array(
			'usuario_idusuario' => $_SESSION['id']
			
		));

		if (!empty($res)) {

			$senha = new Senha();
			$usuario = new Usuario();
			$usuario->setIdusuario($res[0]['usuario_idusuario']);
		
			$today = new \DateTime();
			$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));

		

				$senha->setUsuario_idusuario($usuario);
				$senha->setData_cadastro($today->format('Y-m-d'));
				$senha->setSenha_usuario($_POST['senha_usuario']);
		
				$res2 = $control->insert($senha);

				$rain->setConteudo(array("mensagem","index"), array(

					'mensagem' => "Senha alterada com sucesso!",
					'resultado' => "success"
				));
		}
		else{

			$rain->setConteudo(array("mensagem","index"), array(

					'mensagem' => "Não foi possível alterar a senha!",
					'resultado' => "danger"
				));

		}

		
	}

	public function post_update_senha_email_forget_alter(){

		
		$rain = new RainTpl();
		$control = new SenhaController();
		
		$res = $control->select2(new Senha(),true,array('usuario' => array()),array(),array(
			'email' => $_POST['email']
			
		));

		if (!empty($res)) {

			$senha = new Senha();
			$usuario = new Usuario();
			$usuario->setIdusuario($res[0]['usuario_idusuario']);
		
			$today = new \DateTime();
			$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));

		

				$senha->setUsuario_idusuario($usuario);
				$senha->setData_cadastro($today->format('Y-m-d'));
				$senha->setSenha_usuario($_POST['senha_usuario']);
		
				$res2 = $control->insert($senha);

				$rain->setConteudo(array("mensagem","index"), array(

					'mensagem' => "Senha alterada com sucesso!",
					'resultado' => "success"
				));
		}
		else{

			$rain->setConteudo(array("mensagem","index"), array(

					'mensagem' => "Não foi possível alterar a senha!",
					'resultado' => "danger"
				));

		}

		
	}
	public function get_update_senha_email_forget_alter(){

		
		$control = new SenhaController();
		
		$res = $control->select2(new Verifica(),true,array('usuario' => array()),array(),array(
			'hash_verifica' => $_GET['h']
			
		));

		$rain = new RainTpl();
		$rain->setConteudo(array("edit_cadastro_usuario_senha_email_forget","scripts_cadastro_usuario"));

		
	}

	public function get_update_senha_email_forget(){

		$rain = new RainTpl();
		$rain->setConteudo(array("email_forget"));
	}

	public function post_update_senha_email_forget(){
		
		$control = new SenhaController();
		$controlverify = new VerificaController();
		$res = $control->select2(new Senha(),true,array('usuario' => array()),array(),array(
			'email' => $_POST['email']
			
		));

		$hash = Encripty::toEncripty(strtotime("now"));
		$email = new Email();
		$rain_email = new EmailRainTpl();
		$ret = $controlverify->insert_hash($res[0]['idusuario'],$hash);
					
					$html = $rain_email->setConteudo(array("valida_email_senha"),array(

						'hash' => $hash,
						'rota' => "crud/alter/usuario/senha/email/forget/alter"

					)); 

					$usuario = new Usuario();
					$usuario->setIdusuario($res[0]['idusuario']);
					$res = $control->select($usuario,true);


					$res_email = $email->enviar(array(

						'emailsend' => $res[0]['email'],
						'subject' => "Alteração de senha do sistema de biblioteca do ITEGO",
						'contents' => $html
					));
					$rain = new RainTpl();
					if ($res_email) {
						
					$rain->setConteudo(array("mensagem"),array(
							'mensagem' => "Solicitação foi enviada para o email ".$res[0]['email'],
							'resultado' => "success"
					));	
					}else{

					$rain->setConteudo(array("mensagem"),array(
							'mensagem' => "Falha ao enviar solicitação para o email ".$res[0]['email'],
							'resultado' => "danger"
					));	

					}
					
	}

	private static function alter_senha(SenhaController $control, $res = array()){
		
		$rain = new RainTpl();
		if (!empty($res)) {

			$senha = new Senha();
			$usuario = new Usuario();
			$usuario->setIdusuario($res[0]['usuario_idusuario']);
		
		$today = new \DateTime();
		$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));

		

				$senha->setUsuario_idusuario($usuario);
				$senha->setData_cadastro($today->format('Y-m-d'));
				$senha->setSenha_usuario($_POST['senha_usuario']);
		
				$res2 = $control->insert($senha);

				$rain->setConteudo(array("mensagem","index"), array(

					'mensagem' => "Senha alterada com sucesso!",
					'resultado' => "success"
				));
		}
		else{

			$rain->setConteudo(array("mensagem","index"), array(

					'mensagem' => "Não foi possível alterar a senha!",
					'resultado' => "danger"
				));

		}
	}

	public function get_update_senha_email(){

		
		if (!isset($_GET['h'])) {
			$control = new VerificaController();

		$hash = Encripty::toEncripty(strtotime("now"));
		$email = new Email();
		$rain_email = new EmailRainTpl();
		$ret = $control->insert_hash($_SESSION['id'],$hash);
					
					$html = $rain_email->setConteudo(array("valida_email_senha"),array(

						'hash' => $hash,
						'rota' => "/crud/alter/usuario/senha/email"

					)); 

					$usuario = new Usuario();
					$usuario->setIdusuario($_SESSION['id']);
					$res = $control->select($usuario,true);


					$res_email = $email->enviar(array(

						'emailsend' => $res[0]['email'],
						'subject' => "Alteração de senha do sistema de biblioteca do ITEGO",
						'contents' => $html
					));
					unset($rain_email);
					$rain = new RainTpl();
					if ($res_email) {
						
					$rain->setConteudo(array("mensagem"),array(
							'mensagem' => "Solicitação foi enviada para o email ".$res[0]['email'],
							'resultado' => "success"
					));	
					}else{

					$rain->setConteudo(array("mensagem"),array(
							'mensagem' => "Falha ao enviar solicitação para o email ".$res[0]['email'],
							'resultado' => "danger"
					));	

					}


		}else{

			$rain = new RainTpl();
			$rain->setConteudo(array("edit_cadastro_usuario_senha_email", "scripts_cadastro_usuario"));
		}
					
	}

	
}

 ?>




				