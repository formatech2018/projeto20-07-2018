<?php 

	require_once 'vendor/autoload.php';
	use \Slim\Slim;
	use \ViewController\{RainTpl,RelatorioRainTpl};
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{Controller, RelatorioAnoController, CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController,RelatorioController, UsuarioController};
	use \Controller\util\{Convert, Retorno,RetornoLogin,Encripty};

	$app = new Slim();

	//ROTA VALIDACAO
	$app->get("/valida/email/:idusuario", function($idusuario){

			\ViewController\view\routers\ValidacaoRotas::validacaoEmail($idusuario);
	});

	$app->get("/valida/email/disabled/:idusuario", function($idusuario){

			\ViewController\view\routers\ValidacaoRotas::validacaoEmailDisabled($idusuario);
	});

	$app->get("/valida/funcionario/:idusuario",function($idusuario)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('ValidacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_AtivaFuncionario'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\ValidacaoRotas::get_AtivaFuncionario($idusuario);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/usuario/funcionario/delete/:idusuario",function($idusuario)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('ValidacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_DeleteFuncionario'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\ValidacaoRotas::get_DeleteFuncionario($idusuario);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
		
	});

	$app->get("/valida/funcionario",function()
	{

		session_start();
		$anotacao = Controller::getAnotacoes('ValidacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_validaFuncionario'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\ValidacaoRotas::get_validaFuncionario();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});
	//ROTAS TURMA_HAS_ALUNO//
	$app->get("/crud/aluno/:idaluno/matriculas/:inicio/:limite/read", function($idaluno,$inicio,$limite){

		session_start();
		$anotacao = Controller::getAnotacoes('TurmaHasAlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['list_matricula_aluno'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaHasAlunoRotas::list_matricula_aluno($idaluno,$inicio, $limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/turma/:idturma/matriculas/:inicio/:limite/read", function($idturma,$inicio,$limite){

		session_start();
		$anotacao = Controller::getAnotacoes('TurmaHasAlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['list_matricula_turma'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaHasAlunoRotas::list_matricula_turma($idturma,$inicio, $limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/matricula/:inicio/:limite/read", function($inicio,$limite){

		session_start();
		$anotacao = Controller::getAnotacoes('TurmaHasAlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaHasAlunoRotas::listall($inicio, $limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});

	$app->get("/crud/turma/aluno/matricula/:idaluno/:idturma/insert",function ($idaluno,$idturma)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaHasAlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaHasAlunoRotas::get_insert($idaluno,$idturma);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/turma/aluno/:matricula/matricula/update",function ($matricula)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaHasAlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaHasAlunoRotas::get_update($matricula);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	$app->get("/crud/turma/aluno/:matricula/matricula/delete",function ($matricula)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaHasAlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaHasAlunoRotas::get_delete($matricula);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/turma/aluno/matricula/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaHasAlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaHasAlunoRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/turma/aluno/insert",function ()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaHasAlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['search_post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaHasAlunoRotas::search_post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/turma/matricula/insert",function ()
	{	
		session_start();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("busca_turma_has_aluno"));
	});

	$app->post("/crud/turma/aluno/matricula/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaHasAlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaHasAlunoRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/turma/aluno/matricula/update",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaHasAlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaHasAlunoRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});


	//ROTAS VALOR MULTA//

	$app->get("/crud/multa/valor/:idvalor/update",function ($idvalor)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('ValorRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\ValorRotas::get_update($idvalor);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/multa/valor/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('ValorRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\ValorRotas::get_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

	});

	$app->post("/crud/multa/valor/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('ValorRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\ValorRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	//ROTAS TURMA//

	$app->get("/crud/curso/:idcurso/turmas/:inicio/:limite/read", function($idcurso,$inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaRotas');
		$ret = Controller::getValidaSessoes($anotacao['list'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaRotas::list($idcurso,$inicio, $limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	
	$app->get("/crud/curso/turmas/:inicio/:limite/read", function($inicio,$limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaRotas::listall($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/curso/:idturma/turma/update", function($idturma)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaRotas::get_update($idturma);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/curso/turma/:idturma/delete",function ($idturma)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaRotas::get_delete($idturma);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});


	$app->get("/crud/curso/turma/:idcurso/insert",function($idcurso)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaRotas::get_insert($idcurso);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/curso/turma/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/curso/turma/update", function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});


	$app->post("/crud/curso/turma/insert", function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TurmaRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurmaRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	//ROTAS LOGIN/LOGOUT //

	$app->get("/logout", function(){

		session_start();
		session_unset();
		header('location: /');
		exit;
	});

	$app->get("/login", function(){

		session_start(); 
		session_unset();
		\ViewController\view\routers\LoginRotas::get_login();

	});


	$app->post("/login", function(){

		session_start(); 
		session_unset();
		\ViewController\view\routers\LoginRotas::post_login();

	});


	//ROTAS USUARIO/ALUNO/FUNCIONARIO//

	$app->get("/carteirinha/usuario",function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('UsuarioRotas');
		$ret = Controller::getValidaSessoes($anotacao['usr_emitir_carteirinha'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\UsuarioRotas::usr_emitir_carteirinha();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
			
	});

	$app->get("/carteirinha/usuario/search",function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('UsuarioRotas');
		$ret = Controller::getValidaSessoes($anotacao['busca_carteirinha_usuario'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\UsuarioRotas::busca_carteirinha_usuario();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
			
	});

	$app->post("/carteirinha/usuario/search",function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('UsuarioRotas');
		$ret = Controller::getValidaSessoes($anotacao['adm_emitir_carteirinha'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\UsuarioRotas::adm_emitir_carteirinha();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
			
	});

	
	$app->post("/crud/usuario/:action",function($action)
	{
		session_start();
		\ViewController\view\routers\UsuarioRotas::post_update_or_insert($action);
			
	});

	$app->get("/crud/usuario/conta/disabled", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('UsuarioRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_disabled_usuario'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\UsuarioRotas::get_disabled_usuario();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};


	});

	$app->post("/crud/usuario/conta/disabled", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('UsuarioRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_disabled_usuario'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\UsuarioRotas::post_disabled_usuario();
		session_unset();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};


	});
	
	$app->get("/crud/usuario/verify/",function()
	{
		
		\ViewController\view\routers\UsuarioRotas::get_verify();
		
	});

	$app->get("/crud/usuario/insert",function()
	{
		
		\ViewController\view\routers\UsuarioRotas::get_insert();
		
	});

	
	$app->get("/update",function()
	{
		session_start();
		$control = new Controller();
		if($control->is_funcionario($_SESSION['id']))
		 {
			$funcionario = $control->selectFuncionario($_SESSION['id']);
			$redirect = "/crud/usuario/funcionario/".$funcionario[0]['idfuncionario']."/update"; 
			
			
		}else{
			$aluno = $control->selectAluno($_SESSION['id']);
			$redirect = "/crud/usuario/aluno/".$aluno[0]['idaluno']."/update"; 
			
		}
		header('location: '.$redirect);
			exit;
		
		
		
	});

	$app->get("/crud/usuario/funcionario/:idfuncionario/update", function ($idfuncionario){
		
		session_start();
		$anotacao = Controller::getAnotacoes('FuncionarioRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);

		$control = new FuncionarioController();
		$res = $control->select2(new Funcionario(),true,array(),array("usuario_idusuario"),array('idfuncionario' => $idfuncionario));

		if ($ret->getSuccess() && $res[0]['usuario_idusuario'] == $_SESSION['id']) {
		\ViewController\view\routers\FuncionarioRotas::get_update($idfuncionario);
		}else{
			$mensagem = "";
			if (empty($ret->getMessage())) {
				$mensagem = "Acesso Negado!";
			}
			else{
				$mensagem = $ret->getMessage();
			}
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $mensagem,
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/usuario/aluno/:idaluno/update",function ($idaluno)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);

		$control = new AlunoController();
		$res = $control->select2(new Aluno(),true,array(),array("usuario_idusuario"),array('idaluno' => $idaluno));

		

		if ($ret->getSuccess() && $res[0]['usuario_idusuario'] == $_SESSION['id']) {
		\ViewController\view\routers\AlunoRotas::get_update($idaluno);
		}else{
			$mensagem = "";
			if (empty($ret->getMessage())) {
				$mensagem = "Acesso Negado!";
			}
			else{
				$mensagem = $ret->getMessage();
			}
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $mensagem,
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/alter/usuario/senha/email/forget/alter",function(){

		\ViewController\view\routers\UsuarioRotas::post_update_senha_email_forget_alter();

	});

	$app->get("/crud/alter/usuario/senha/email/forget/alter", function(){

		\ViewController\view\routers\UsuarioRotas::get_update_senha_email_forget_alter();
	});

	$app->get("/crud/alter/usuario/senha/email/forget", function(){

		\ViewController\view\routers\UsuarioRotas::get_update_senha_email_forget();
	});

	$app->post("/crud/alter/usuario/senha/email/forget", function(){

		\ViewController\view\routers\UsuarioRotas::post_update_senha_email_forget();
	});

	$app->get("/crud/alter/usuario/senha", function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('AlunoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\UsuarioRotas::get_update_senha();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});

	$app->get("/crud/alter/usuario/senha/email", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('UsuarioRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update_senha_email'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\UsuarioRotas::get_update_senha_email();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});

	$app->post("/crud/alter/usuario/senha/email", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('UsuarioRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update_senha_email'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\UsuarioRotas::post_update_senha_email();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});

	

	$app->post("/crud/alter/usuario/senha", function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('UsuarioRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update_senha'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\UsuarioRotas::post_update_senha();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});


	//ROTAS TURNO//

	$app->get("/crud/turma/turno/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TurnoRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurnoRotas::listall($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/turma/turno/:idturno/update",function ($idturno)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurnoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurnoRotas::get_update($idturno);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/turma/turno/:idturno/delete",function ($idturno)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurnoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurnoRotas::get_delete($idturno);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/turma/turno/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurnoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurnoRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/turma/turno/update",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurnoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurnoRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/turma/turno/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurnoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurnoRotas::get_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/turma/turno/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TurnoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TurnoRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	//ROTAS EDITORA//

	$app->get("/crud/livro/editora/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('EditoraRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EditoraRotas::listall($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
			
	});

	$app->get("/crud/livro/editora/:ideditora/update",function ($ideditora)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EditoraRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EditoraRotas::get_update($ideditora);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/livro/editora/:ideditora/delete",function ($ideditora)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EditoraRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EditoraRotas::get_delete($ideditora);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/livro/editora/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EditoraRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EditoraRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/livro/editora/update",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EditoraRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EditoraRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
			
	});

	$app->get("/crud/livro/editora/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EditoraRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EditoraRotas::get_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/livro/editora/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EditoraRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EditoraRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	//ROTAS ÁREA//	

	$app->get("/crud/livro/area/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('AreaRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AreaRotas::listall($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	$app->get("/crud/livro/area/:idarea/update",function ($idarea)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AreaRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AreaRotas::get_update($idarea);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
	});

	$app->get("/crud/livro/area/:idarea/delete",function ($idarea)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AreaRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AreaRotas::get_delete($idarea);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	$app->post("/crud/livro/area/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AreaRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AreaRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
	});

	$app->post("/crud/livro/area/update",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AreaRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AreaRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
	});

	$app->get("/crud/livro/area/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AreaRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AreaRotas::get_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
	});

	$app->post("/crud/livro/area/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AreaRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AreaRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
	});

	//ROTAS AUTOR//

	$app->get("/crud/livro/autor/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('AutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AutorRotas::listall($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
			
	});

	$app->get("/crud/livro/autor/:idautor/update",function ($idautor)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AutorRotas::get_update($idautor);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	$app->get("/crud/livro/autor/:idautor/delete",function ($idautor)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AutorRotas::get_delete($idautor);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}

	});

	$app->post("/crud/livro/autor/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AutorRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	$app->post("/crud/livro/autor/update",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AutorRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	$app->get("/crud/livro/autor/insert", function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('AutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AutorRotas::get_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});
	
	$app->post("/crud/livro/autor/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\AutorRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	//ROTAS CARGO//

	$app->get("/crud/funcionario/cargo/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('CargoRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\CargoRotas::listall($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	$app->get("/crud/funcionario/cargo/:idcargo/update",function ($idcargo)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CargoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\CargoRotas::get_update($idcargo);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	$app->get("/crud/funcionario/cargo/:idcargo/delete",function ($idcargo)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CargoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\CargoRotas::get_delete($idcargo);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	$app->get("/crud/cargo/nivel/:idcargo/update", function($idcargo){

		session_start();
		$anotacao = Controller::getAnotacoes('CargoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update_nivel_cargo'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CargoRotas::get_update_nivel_cargo($idcargo);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

	});


	$app->get("/crud/cargo/nivel/read", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('CargoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_read_nivel_cargo'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CargoRotas::get_read_nivel_cargo();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

	});

	
	$app->post("/crud/cargo/nivel/:idcargo/update", function($idcargo){

		session_start();
		$anotacao = Controller::getAnotacoes('CargoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update_nivel_cargo'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CargoRotas::post_update_nivel_cargo($idcargo);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});


	$app->post("/crud/funcionario/cargo/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CargoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\CargoRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
	
	});

	$app->post("/crud/funcionario/cargo/update",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CargoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\CargoRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
		
	});

	$app->get("/crud/funcionario/cargo/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CargoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
			\ViewController\view\routers\CargoRotas::get_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	$app->post("/crud/funcionario/cargo/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CargoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CargoRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	//ROTAS FORMACAO//

	$app->get("/crud/funcionario/formacao/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('FormacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\FormacaoRotas::listall($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});

	$app->get("/crud/funcionario/formacao/:idformacao/update",function ($idformacao)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('FormacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\FormacaoRotas::get_update($idformacao);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/funcionario/formacao/:idformacao/delete",function ($idformacao)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('FormacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\FormacaoRotas::get_delete($idformacao);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/funcionario/formacao/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('FormacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\FormacaoRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/funcionario/formacao/update",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('FormacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\FormacaoRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/funcionario/formacao/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('FormacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\FormacaoRotas::get_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	$app->post("/crud/funcionario/formacao/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('FormacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\FormacaoRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	
	});

	//ROTAS TIPO//

	$app->get("/crud/curso/tipo/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TipoRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TipoRotas::listall($inicio, $limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/curso/tipo/update", function ()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TipoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TipoRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/curso/tipo/:idtipo/update", function ($idtipo)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('TipoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TipoRotas::get_update($idtipo);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/curso/tipo/:idtipo/delete",function ($idtipo)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TipoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TipoRotas::get_delete($idtipo);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/curso/tipo/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TipoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TipoRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/curso/tipo/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TipoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TipoRotas::get_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/curso/tipo/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('TipoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\TipoRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
			
	});

	//ROTAS PATRIMONIO//

	$app->get("/crud/livro/:idlivro/patrimonio/:inicio/:limite/read", function($idlivro,$inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('PatrimonioRotas');
		$ret = Controller::getValidaSessoes($anotacao['list'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\PatrimonioRotas::list($idlivro,$inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	
	$app->get("/crud/livro/patrimonio/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('PatrimonioRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\PatrimonioRotas::listall($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	
	$app->get("/crud/livro/patrimonio/:idpatrimonio/update", function($idpatrimonio)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('PatrimonioRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\PatrimonioRotas::get_update($idpatrimonio);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/livro/patrimonio/:idlivro/insert",function($idlivro)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('PatrimonioRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\PatrimonioRotas::get_insert($idlivro);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/livro/patrimonio/:idpatrimonio/delete",function ($idpatrimonio)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('PatrimonioRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\PatrimonioRotas::get_delete($idpatrimonio);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/livro/patrimonio/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('PatrimonioRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\PatrimonioRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/livro/patrimonio/insert", function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('PatrimonioRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\PatrimonioRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/livro/patrimonio/update", function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('PatrimonioRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\PatrimonioRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	//ROTAS LIVRO//

	$app->get("/crud/livro/usuario/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('LivroRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall_usuario'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroRotas::listall_usuario($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
		
	});

	$app->get("/crud/livro/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('LivroRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroRotas::listall($inicio,$limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
		
	});

	$app->get("/crud/livro/:idlivro/update",function ($idlivro)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('LivroRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroRotas::get_update($idlivro);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/livro/:idlivro/delete",function ($idivro)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('LivroRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroRotas::get_delete($idivro);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
		
	});

	$app->post("/crud/livro/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('LivroRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	
	$app->get("/crud/livro/search",function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('LivroRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_search_livro'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\livroRotas::get_search_livro();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/livro/search",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('LivroRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_search_livro'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroRotas::post_search_livro();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/livro/update",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('LivroRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	
	$app->get("/crud/livro/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('LivroRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroRotas::get_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/livro/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('LivroRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	//ROTAS CURSO//

	$app->get("/crud/curso/:inicio/:limite/read", function($inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('CursoRotas');
		$ret = Controller::getValidaSessoes($anotacao['listall'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CursoRotas::listall($inicio, $limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/curso/:idcurso/update",function ($idcurso)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CursoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CursoRotas::get_update($idcurso);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/curso/:idcurso/delete",function ($idcurso)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CursoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CursoRotas::get_delete($idcurso);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/curso/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CursoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CursoRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	
	$app->post("/crud/curso/update", function()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('CursoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_update'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CursoRotas::post_update();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/curso/search",function ()
	{
		session_start();
		$anotacao = Controller::getAnotacoes('CursoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_search_curso'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CursoRotas::get_search_curso();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/curso/search",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CursoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_search_curso'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CursoRotas::post_search_curso();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	
	$app->get("/crud/curso/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CursoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CursoRotas::get_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/curso/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('CursoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\CursoRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	//ROTAS LIVRO_HAS_AUTOR//

	$app->get("/crud/livro/:idlivro/autores/:inicio/:limite/read", function($idlivro,$inicio, $limite)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('LivroHasAutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['list'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroHasAutorRotas::list($idlivro,$inicio, $limite);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/livro/:idlivro/autor/insert", function($idlivro)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('LivroHasAutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroHasAutorRotas::get_insert($idlivro);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/livro/:idlivro/autores/:idautor/delete",function ($idlivro,$idautor)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('LivroHasAutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroHasAutorRotas::get_delete($idlivro,$idautor);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
		
	});

	$app->post("/crud/livro/autores/delete",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('LivroHasAutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_delete'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroHasAutorRotas::post_delete();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/livro/autores/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('LivroHasAutorRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\LivroHasAutorRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	//ROTAS EMPRÉSTIMO//

	$app->get("/crud/emprestimo/:idusuario/usuario/detalhes", function($idusuario){

		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['detalhes_indisponivel'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::detalhes_indisponivel($idusuario);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
	});

	$app->get("/crud/emprestimo/:idusuario/usuario/funcionario/detalhes", function($idusuario){

		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['detalhes_indisponivel_funcionario'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::detalhes_indisponivel_funcionario($idusuario);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}
	});

	$app->get("/usuario/emprestimos/:idusuario",function($idusuario){

		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['emprestimos_usuario'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::emprestimos_usuario($idusuario);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		}

	});

	$app->get("/usuario/emprestimo",function()
	{
		session_start();
		$control = new Controller();
		if($control->is_funcionario($_SESSION['id']))
		 {
			$funcionario = $control->selectFuncionario($_SESSION['id']);
			$redirect = "/usuario/emprestimos/".$funcionario[0]['idfuncionario']; 
			
			
		}else{
			$aluno = $control->selectAluno($_SESSION['id']);
			$redirect = "/usuario/emprestimos/".$aluno[0]['idaluno']; 
			
		}
		header('location: '.$redirect);
			exit;
		
		
		
	});

	$app->get("/crud/emprestimo/usuario/:idemprestimo/disabled", function ($idemprestimo)
	{
		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['disabled_emprestimo'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::disabled_emprestimo($idemprestimo);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});


	$app->get("/crud/emprestimo/:idusuario/usuario/patrimonio/search",function ($idusuario)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_search_emprestimo_for_usuario_patrimonio'],$_SESSION);
		if ($ret->getSuccess()) {
		$acesso = Controller::getAcesso($_SESSION);
		\ViewController\view\routers\EmprestimoRotas::get_search_emprestimo_for_usuario_patrimonio($idusuario);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
		
	});

	$app->post("/crud/emprestimo/usuario/disabled/all", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['disabled_all_emprestimo'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::disabled_all_emprestimo();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
		
	});

	$app->post("/crud/emprestimo/usuario/patrimonio/search",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_search_emprestimo_for_usuario_patrimonio'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::post_search_emprestimo_for_usuario_patrimonio();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	  $app->get("/crud/emprestimo/usuario/disabled/search",function ()
	{	
		
		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['search_usuario_emprestimo_disabled'],$_SESSION);
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("busca_usuario_emprestimo", "scripts_cadastro_usuario"),array(
			'action'=> "/crud/emprestimo/usuario/disabled/search"
		));		
	});

	 $app->post("/crud/emprestimo/usuario/disabled/search",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['search_usuario_emprestimo_disabled'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::search_usuario_emprestimo_disabled();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/emprestimo/usuario/search",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_search_emprestimo_for_usuario'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::get_search_emprestimo_for_usuario();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->post("/crud/emprestimo/usuario/search",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_search_emprestimo_for_usuario'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::post_search_emprestimo_for_usuario();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});


	$app->post("/crud/emprestimo/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_insert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::post_insert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/crud/emprestimo/autorizacao/usuario/search",function(){

		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_SearchAutorizacao'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::get_SearchAutorizacao();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});

	$app->get("/emprestimo/multa/:idmulta/finalized",function($idmulta){

		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_pagamento_multa'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::get_pagamento_multa($idmulta);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

	});

	$app->post("/crud/emprestimo/autorizacao/usuario/result",function(){

		session_start();
		$anotacao = Controller::getAnotacoes('EmprestimoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_SearchAutorizacao'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\EmprestimoRotas::post_SearchAutorizacao();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});

	//ROTAS AVALIACAO//
	
	$app->get("/crud/avaliacao/:idemprestimo/insert",function ($idemprestimo)
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AvaliacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['get_AvaliacaoInsert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\AvaliacaoRotas::get_AvaliacaoInsert($idemprestimo);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});

	$app->post("/crud/avaliacao/insert",function ()
	{	
		session_start();
		$anotacao = Controller::getAnotacoes('AvaliacaoRotas');
		$ret = Controller::getValidaSessoes($anotacao['post_AvaliacaoInsert'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\AvaliacaoRotas::post_AvaliacaoInsert();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		

	});

	//ROTAS RELATORIO//

	$app->get("/relatorio/autorizacao/emprestimo/:idusuario/:idemprestimo", function($idusuario,$idemprestimo){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioAutorizacao2'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioAutorizacao2($idusuario,$idemprestimo);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};


	});

	$app->get("/relatorio/funcionario/formacao", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioFormacao'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioFormacao();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/relatorio/funcionario/cargo", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioCargo'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioCargo();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

	});

	$app->get("/relatorio/funcionario/quantidade", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioQtdFuncionarios'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioQtdFuncionarios();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		


	});

	$app->get("/relatorio/curso/tipo" , function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioCursoTipo'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioCursoTipo();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

	
	});

	$app->get("/relatorio/curso/quantidade", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioQtdCurso'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioQtdCurso();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

		
	});


	$app->get("/relatorio/turma/aluno", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioTurmaAluno'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioTurmaAluno();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

		
	});

	$app->get("/relatorio/turma/curso", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioTurmaCurso'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioTurmaCurso();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
	});

	$app->get("/relatorio/turma/turno", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioTurmaTurno'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioTurmaTurno();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});
	$app->get("/relatorio/turma/turno/matutino", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioTurmaTurnoMatutino'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioTurmaTurnoMatutino();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/relatorio/turma/turno/vespertino", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioTurmaTurnoVespertino'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioTurmaTurnoVespertino();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/relatorio/turma/turno/noturno", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioTurmaTurnoNoturno'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioTurmaTurnoNoturno();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});


	$app->get("/relatorio/turma/quantidade", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioQtdTurmas'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioQtdTurmas();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};
		
	});

	$app->get("/relatorio/emprestimo/autorizacao", function(){
		$rain = new RelatorioRainTpl();
		$relatorio = new RelatorioAnoController();
		$html = $rain->setConteudo(array("header","teste_emprestimo","footer"));
		
		$relatorio->callMpdf($html);
	});

	$app->get("/relatorio/usuario/aluno", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioUsuarioAluno'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioUsuarioAluno();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

	});

	$app->get("/relatorio/usuario/funcionario", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioUsuarioFuncionario'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioUsuarioFuncionario();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

	});

	$app->get("/relatorio/emprestimo/patrimonio", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioEmprestimoPatrimonio'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioEmprestimoPatrimonio();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};

	});

	$app->get("/relatorio/emprestimo/quantidade" ,function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioQtdEmprestimos'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioQtdEmprestimos();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	

	});

	$app->get("/relatorio/emprestimo/usuario", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioEmprestimoUsuario'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioEmprestimoUsuario();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	
		

	});

	$app->get("/relatorio/livro/patrimonio", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioLivroPatrimonio'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioLivroPatrimonio();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	

		
	});

	$app->get("/relatorio/livro/emprestimo", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioLivroEmprestimo'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioLivroEmprestimo();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	

		
	});
	

	$app->get("/relatorio/livro/ano", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioLivroAno'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioLivroAno();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	
	});

	$app->get("/relatorio/livro/autor", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioLivroAutor'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioLivroAutor();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	
		

	});

	$app->get("/relatorio/livro/area", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioLivroArea'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioLivroArea();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	

	});

	$app->get("/relatorio/livro/editora", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioLivroEditora'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioLivroEditora();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	


	});

	$app->get("/relatorio/livro/quantidade", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioQtdLivros'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioQtdLivros();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	
		
	});

	$app->get("/relatorio/avaliacao/livro", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioAvaliacaoLivro'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioAvaliacaoLivro();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	


	});

	$app->get("/relatorio/cargo/nivel", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioCargoNivel'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioCargoNivel();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	
	});

	$app->get("/relatorio/autorizacao/:idusuario", function($idusuario){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioAutorizacao'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioAutorizacao($idusuario);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	

	});

	$app->get("/emprestimo/multa/:idmulta/comprovante", function($idmulta){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorioComprovanteMulta'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorioComprovanteMulta($idmulta);
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	


	});



	$app->get("/relatorios", function(){

		session_start();
		$anotacao = Controller::getAnotacoes('RelatorioRotas');
		$ret = Controller::getValidaSessoes($anotacao['relatorio'],$_SESSION);
		if ($ret->getSuccess()) {
		\ViewController\view\routers\RelatorioRotas::relatorio();
		}else{
			$acesso = Controller::getAcesso($_SESSION);
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem","index"),array(
				'mensagem' => $ret->getMessage(),
				'resultado' => "danger"
			) );
		};	
		

	});


	$app->get("/",function ()
	{	
		session_start();
		
		$acesso = Controller::getAcesso($_SESSION);
		
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("index"));	
	});

	$app->get("/teste/mpdf",function(){
			$html = "Olá Mundo!";
			$mpdf = new \Mpdf\Mpdf(); 
			$mpdf->SetDisplayMode('fullpage');
			$css = file_get_contents("vendor/libraryitego/WebContent/viewRelatorio/css/estilo.css");
	 		$mpdf->WriteHTML($css,1);
	 		$mpdf->WriteHTML($html,2);
	 		$mpdf->Output('vendor/libraryitego/WebContent/viewRelatorio/comprovante/teste.pdf');
	 		exit;

	});

	$app->get("/teste",function ()
	{	
		session_start();
		$_SESSION['acesso'] = "2";

		
	});





	$app->get("/teste/barcode",function ()
	{	
		session_start();
		$relatorio = new RelatorioController();
		$rain = new RelatorioRainTpl();
		$generator = new \Picqer\Barcode\BarcodeGeneratorJPG();

		$selectUsuario = $relatorio->select(new Usuario(),true,array(),array(),array('idusuario' => $_SESSION['id']));

		$jpgbarcode = $generator->getBarcode($selectUsuario[0]['cpf'],$generator::TYPE_CODE_128);

		$cod = base64_encode($jpgbarcode);

		$html = $rain->setConteudo(array("teste_barcode"),array(

			'usuario' => $selectUsuario,
			'image' => $cod
		));

		$relatorio->callMpdf($html, ['format' => 'utf-8'], [190, 236]);

		
	});
	

	$app->run();


 ?>