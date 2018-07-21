<?php 
namespace ViewController\view\routers;

/*require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/libraryitego/WebContent/view/routers/config/Config.php');*/
use \ViewController\{RainTpl,Email,EmailRainTpl};
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno,Multa};
	use \Controller\control\{Controller, CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController};
	use \Controller\util\Convert;
	
/**
 * @emprestimos_usuario=usr
 * @post_insert=btc
 * @end_emprestimo=btc
 * @get_search_emprestimo_for_usuario=btc
 * @post_search_emprestimo_for_usuario=btc
 * @get_search_emprestimo_for_usuario_patrimonio=btc
 * @post_search_emprestimo_for_usuario_patrimonio=btc
 * @disabled_emprestimo=btc
 * @search_usuario_emprestimo_disabled=btc
 * @disabled_all_emprestimo=btc
 * @get_SearchAutorizacao=btc
 * @post_SearchAutorizacao=btc
 * @detalhes_indisponivel=btc
 * @detalhes_indisponivel_funcionario=btc
 * @get_pagamento_multa=btc
 */
class EmprestimoRotas 
{

	public function detalhes_indisponivel_funcionario($idusuario){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$control = new EmprestimoController();

		$usuario = new Usuario();
		$usuario->setIdusuario($idusuario);

		$res = $control->select($usuario,true);
		
		$qtdlivros = $control->getQtdeLivros($idusuario);
		if ($qtdlivros[0]['count(*)'] < 2) {
			$status_qtde = "Quantidade de empréstimos abaixo do limite";
		}
		else{
			$status_qtde = "O Usuário tem dois empréstimos ativos!";
		}

		$multa = $control->getMultasAtivas($idusuario);

		if ($multa[0]['count(*)'] === '0') {
			
			$status_multa = "O Usuário não possui multas ativas!";
		}
		else{
			$status_multa = "O Usuário tem multas ativas!";
		}


		
		$rain->setConteudo(array("detalhes_funcionario","scripts_mascara"),array(

			'nome_usuario' => $res[0]['nome_usuario'],
			'cpf' => $res[0]['cpf'],
			'telefone_celular' => $res[0]['telefone_celular'],
			'email' => $res[0]['email'],
			'status_multa' => $status_multa,
			'status_qtde' => $status_qtde
		));

	}

	public function detalhes_indisponivel($idusuario){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$control = new EmprestimoController();

		$usuario = new Usuario();
		$usuario->setIdusuario($idusuario);

		$res = $control->select($usuario,true);
		
		$qtdlivros = $control->getQtdeLivros($idusuario);
		if ($qtdlivros[0]['count(*)'] < 2) {
			$status_qtde = "Quantidade de empréstimos abaixo do limite";
		}
		else{
			$status_qtde = "O Usuário tem dois empréstimos ativos!";
		}

		$multa = $control->getMultasAtivas($idusuario);

		if ($multa[0]['count(*)'] === '0') {
			
			$status_multa = "O Usuário não possui multas ativas!";
		}
		else{
			$status_multa = "O Usuário tem multas ativas!";
		}

		$turma = $control->verificaTurmasAtivas($idusuario);
		if ($turma === true) {
			$status_turma = "O Usuário está matriculado em uma ou mais turmas ativas!";
		}
		else{
			$status_turma = "O Usuário não está matriculado em nenhuma turma!";
		}

		
		$rain->setConteudo(array("detalhes","scripts_mascara"),array(

			'nome_usuario' => $res[0]['nome_usuario'],
			'cpf' => $res[0]['cpf'],
			'telefone_celular' => $res[0]['telefone_celular'],
			'email' => $res[0]['email'],
			'status_multa' => $status_multa,
			'status_qtde' => $status_qtde,
			'status_turma' => $status_turma

		));

	}
	public function get_SearchAutorizacao(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("busca_usuario_autorizacao_emprestimo", "scripts_cadastro_usuario"));	
	}

	public function post_SearchAutorizacao(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$control = new EmprestimoController();
		$res = $control->getDataToCpfUser($_POST['cpf']);
		
		if (!empty($res)) {
			
			$selectEmprestimo = $control->select2(new Emprestimo(),true,array('usuario' => array(),'patrimonio' => array('livro' =>array())),array("idemprestimo","nome_livro","nome_usuario","idusuario","idpatrimonio","data_emprestimo","data_devolucao"),array('idusuario' => $res[0]['idusuario']));
			
			foreach ($selectEmprestimo as $key => $value) {

				if ($selectEmprestimo[$key]['data_devolucao'] == "" || $selectEmprestimo[$key]['data_devolucao'] == "0000-00-00" ) {
					
					$res1[$key] = $selectEmprestimo[$key];
					$res1[$key]['data_emprestimo'] = date('d-m-Y', strtotime($res1[$key]['data_emprestimo']));
					$res1[$key]['data_devolucao'] = "Empréstimo não devolvido";
					
				}else{
					$res1[$key] = $selectEmprestimo[$key];
					$res1[$key]['data_emprestimo'] = date('d-m-Y', strtotime($res1[$key]['data_emprestimo']));
					$res1[$key]['data_devolucao'] = date('d-m-Y', strtotime($res1[$key]['data_devolucao']));
				}
				


			}

			$rain->setConteudo(array("resultado_usuario_emprestimo_autorizacao"), array(

				'nome_usuario' => $res[0]['nome_usuario'],
				'result' => $res1
				
				
			));
		}
		else{
			$rain->setConteudo(array("mensagem", "busca_usuario_autorizacao_emprestimo", "scripts_cadastro_usuario"), array(
				'mensagem' => 'Erro ao buscar usuário ou o usuário ainda nao realizou empréstimos!',
				'resultado' => 'danger'

			));

		}
	}
	public function emprestimos_usuario($idusuario)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$control = new EmprestimoController();

		$res = $control->select2(new Emprestimo(),true,array('usuario' => array(),'patrimonio' => array('livro' => array())),array("idpatrimonio","nome_livro","data_emprestimo","data_devolucao","idemprestimo"),array('idusuario' => $_SESSION['id']),array(),'');
		
		if (!empty($res)) {

			foreach ($res as $key => $value) {
			
					if ($res[$key]['data_devolucao'] == "0000-00-00" || $res[$key]['data_devolucao'] == "") {
						
						$res[$key]['data_devolucao'] = "Não foi devolvido";
						$res[$key]['data_emprestimo'] = date('d-m-Y', strtotime($res[$key]['data_emprestimo']));
						$res[$key]['avaliacao'] = "disabled";

					}else{
						
						$res[$key]['data_emprestimo'] = date('d-m-Y', strtotime($res[$key]['data_emprestimo']));
						$res[$key]['data_devolucao'] = date('d-m-Y', strtotime($res[$key]['data_devolucao']));
						$res[$key]['avaliacao'] = "";
					}
						
			}
			
			$rain->setConteudo(array("emprestimos_usuario"),array(

					'result' => $res,
				
				));

		}
		else{
			$rain->setConteudo(array("mensagem"),array(

				'mensagem' => "Você ainda não realizou empréstimos!",
				'resultado' => "danger"

			));
		}
		
	}

	public function list()
	{
		# code...
	}
	
	public function post_insert()
	{
		$acesso = Controller::getAcesso($_SESSION);
		
		$crud = new EmprestimoController();
		$emprestimo = new Emprestimo();
		$usuario = new Usuario();
		$patrimonio = new Patrimonio();

		$res_emprestimo = $crud->select2(new Emprestimo(),true,array(),array("COUNT(*)"),array('usuario_idusuario' => $_POST['idusuario'], 'data_devolucao' => ""));

			if ($res_emprestimo[0]['COUNT(*)'] >= 2) {
				$rain = new RainTpl($acesso);
				$rain->setConteudo(array('mensagem'),array(

					'mensagem' => "Empréstimos ativos foram excedidos!",
					'resultado' => "danger"
				));

			}else{

		$usuario->setIdusuario($_POST['idusuario']);
		$selectUsuario = $crud->select($usuario,true);

		if (!empty($selectUsuario)) {
		
			$i = 0;
			$res = array();
			$mensagem = "";
			$nemprestimos = 0;
			for ($i=1; $i<=2 ; $i++) { 
				 
				if (isset($_POST["idpatrimonio$i"])) {
					$npatrimonio = $_POST["idpatrimonio$i"];

					$selectEmprestimo = $crud->select2(new Emprestimo(),true,array('patrimonio' => array()),array(),array('idpatrimonio' => $_POST["idpatrimonio$i"], 'data_devolucao' => "''"));

					if (empty($selectEmprestimo)) {

						$patrimonio->setIdpatrimonio($npatrimonio);
					
						$emprestimo->setUsuario_idusuario($usuario);
						$emprestimo->setPatrimonio_idpatrimonio($patrimonio);

						$res[$i] = $crud->insert($emprestimo);
						if (!empty($res[$i])) {
							
							$nemprestimos ++;
							$mensagem .= ". Patrimônio ".$res[$i][0]['patrimonio_idpatrimonio']." emprestado com sucesso!";
						}else{
							$mensagem .= ". Erro ao realizar o empréstimo do patrimônio ".$npatrimonio."!";
						}
					}
					else{
						$mensagem .= ". Erro ao realizar o empréstimo do patrimônio ".$npatrimonio." já está com o empréstimo ativo!";

					}
					
					
				}
			}

			if ($nemprestimos>0) {

					RelatorioRotas::saveRelatorioAutorizacao($selectUsuario[0]['idusuario']);
					if (!empty($res[1])) {
						EmprestimoRotas::sendEmailPdfAutorizacao($res[1]);
					}
					else{
						EmprestimoRotas::sendEmailPdfAutorizacao($res[2]);
					}
					$email = new Email();
					unlink($email->getComprovante().$selectUsuario[0]['nome_usuario'].".pdf");


				$rain = new RainTpl($acesso);
				$rain->setConteudo(array("mensagem","relatorio_autorizacao"),array(

					'mensagem' => substr($mensagem, 1),
					'resultado' => "warning",
					'idusuario' => $selectUsuario[0]['idusuario']

				));
			}else{
				$rain = new RainTpl($acesso);
				$rain->setConteudo(array("mensagem"),array(

					'mensagem' => substr($mensagem, 1),
					'resultado' => "danger"

				));
			}		
		}
	}
}	

	public function sendEmailPdfDevolucaoAll($usuario){

					$email = new Email();
					$rain_email = new EmailRainTpl();			
					$html = $rain_email->setConteudo(array("devolucao_emprestimo")); 

					$res = $email->enviar(array(
						'emailsend' => $usuario[0]['email'],
						'subject' => "Comprovante de devolução de empréstimo da biblioteca do ITEGO",
						'contents' => $html
					),array($usuario[0]['nome_usuario'].".pdf"));

	}


	public function sendEmailPdfDevolucao($usuario){

					$email = new Email();
					$rain_email = new EmailRainTpl();			
					$html = $rain_email->setConteudo(array("devolucao_emprestimo")); 


					$res = $email->enviar(array(
						'emailsend' => $usuario[0]['email'],
						'subject' => "Comprovante de devolução de empréstimo da biblioteca do ITEGO",
						'contents' => $html
					),array($usuario[0]['nome_usuario'].".pdf"));

	}

	public function sendEmailPdfAutorizacao($usuario){

					$email = new Email();
					$rain_email = new EmailRainTpl();			
					$html = $rain_email->setConteudo(array("autorizacao_emprestimo")); 


					$res = $email->enviar(array(
						'emailsend' => $usuario[0]['email'],
						'subject' => "Comprovante de autorização de empréstimo da biblioteca do ITEGO",
						'contents' => $html
					),array($usuario[0]['nome_usuario'].".pdf"));
	}
	public static function end_emprestimo($idemprestimo){

		$emprestimo = new Emprestimo();
		$crud = new EmprestimoController();
		$emprestimo->setIdemprestimo($idemprestimo);

		return $crud->update($emprestimo);

	}

	
	public function get_search_emprestimo_for_usuario()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);

		$rain->setConteudo(array("busca_usuario_emprestimo", "scripts_cadastro_usuario"));	
	}

	
	public function post_search_emprestimo_for_usuario(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new EmprestimoController();
		$res = $crud->getDataToCpfUser($_POST['cpf']);

		$control = new EmprestimoController();

		$selectAluno = $control->select2(new Aluno(), true, array('usuario' => array()),array(),array('cpf' => $_POST['cpf']));

		$selectFuncionario = $control->select2(new Funcionario(),true,array('usuario' => array()),array(),array('cpf' => $_POST['cpf']));

		if (empty($selectAluno) && empty($selectFuncionario)) {
			
			$rain->setConteudo(array("mensagem", "busca_usuario_emprestimo", "scripts_cadastro_usuario"), array(
				'mensagem' => 'Erro ao buscar resultado!',
				'resultado' => 'danger'

			));

		}elseif (!empty($selectAluno)) {
			if ($selectAluno[0]['usuario_status'] == 0) {
				
				$rain->setConteudo(array("mensagem", "busca_usuario_emprestimo", "scripts_cadastro_usuario"), array(
				'mensagem' => 'O aluno ainda não está com a conta ativa no sistema!',
				'resultado' => 'danger'

				));
			}
			else{

				$status = $crud->getStatusEmprestimo($res[0]['idusuario']);
				$rain->setConteudo(array("resultado_usuario_emprestimo"), array(

				'cpf' => $selectAluno[0]['cpf'],
				'nome_usuario' => $selectAluno[0]['nome_usuario'],
				'dtnasc' => Convert::date_to_string($selectAluno[0]['dtnasc']),
				'status' => $status[0],
				'livrodisp' => $status[1],
				'idusuario' => $selectAluno[0]['idusuario']
				
				
			));

			}
		}elseif (!empty($selectFuncionario)) {

			if ($selectFuncionario[0]['usuario_status'] == 0) {
				
				$rain->setConteudo(array("mensagem", "busca_usuario_emprestimo", "scripts_cadastro_usuario"), array(
				'mensagem' => 'O aluno ainda não está com a conta ativa no sistema!',
				'resultado' => 'danger'

				));
			}
			else{

				$status = $crud->getStatusEmprestimoFuncionario($res[0]['idusuario']);
				$rain->setConteudo(array("resultado_usuario_emprestimo_funcionario"), array(

				'cpf' => $selectFuncionario[0]['cpf'],
				'nome_usuario' => $selectFuncionario[0]['nome_usuario'],
				'dtnasc' => Convert::date_to_string($selectFuncionario[0]['dtnasc']),
				'status' => $status[0],
				'livrodisp' => $status[1],
				'idusuario' => $selectFuncionario[0]['idusuario']
				
				
			));

			}
			
		}else{

			$rain->setConteudo(array("mensagem", "busca_usuario_emprestimo", "scripts_cadastro_usuario"), array(
				'mensagem' => 'Erro no sistema!',
				'resultado' => 'danger'

			));

		}
}

	
	public function get_search_emprestimo_for_usuario_patrimonio($idusuario){
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new CrudController();
		$usuario = new Usuario();

		$usuario->setIdusuario($idusuario);
		$selectUsuario = $crud->select($usuario, true);

		$qtdemprestimos = $crud->select2(new Emprestimo(),true,array('usuario' => array()),array("COUNT(*)"),array('idusuario' => $idusuario,'data_devolucao' => ""));

		if ($qtdemprestimos[0]["COUNT(*)"] == 1) {
			$disabled = "disabled";
		}
		else{
			$disabled = "";
		}

		$rain->setConteudo(array("busca_patrimonio_emprestimo"), array(

			'idusuario' => $selectUsuario[0]['idusuario'],
			'nome_usuario' => $selectUsuario[0]['nome_usuario'],
			'disabled' => $disabled
		));	
	}

	
	public function post_search_emprestimo_for_usuario_patrimonio(){
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new EmprestimoController();
		$patri = new Patrimonio();
		$usuario = new Usuario();
		$livro = new Livro();

		$usuario->setIdusuario($_POST['idusuario']);
		$selectUsuario = $crud->select($usuario, true);

		if (isset($_POST['idpatrimonio2'])) {

		$patrimonio = array($_POST['idpatrimonio1'], $_POST['idpatrimonio2']);
		$res = array();
		foreach ($patrimonio as $key => $value) {
			if (!empty($value)) {
			
				$patri->setIdpatrimonio($value);
				$ret = $crud->select($patri, true, array($livro)); 
				
				$livro->setIdlivro($ret[0]['idlivro']);
				$selectLivro = $crud->select($livro, true, array(new Area(), new Editora()));
				
				$resultado = array_merge($ret[0], $selectLivro[0]);
				$res[$key] = $resultado;
						
			}
			
		}
		$status = "";
		foreach ($res as $key => $value) {
			if ($res[$key]['patrimonio_status'] === "0") {
				unset($res[$key]);
				
			}
		}

		if (!empty($res)) {
			$rain->setConteudo(array("resultado_patrimonio_emprestimo"), array(

			'idusuario' => $selectUsuario[0]['idusuario'],
			'nome_usuario' => $selectUsuario[0]['nome_usuario'],
			'patrimonio' => $res,
			'idusuario' => $selectUsuario[0]['idusuario']

		));
		}else{
			$rain->setConteudo(array("mensagem","voltar"), array(

			'mensagem' => "Patrimônio não foi encontrado ou não está mais disponível!",
			'resultado' => "danger",
			'link' => "/crud/emprestimo/".$selectUsuario[0]['idusuario']."/usuario/patrimonio/search",
			'botao' => "Registrar outro Patrimônio"
		));

		}
	}else{

		$patrimonio = array($_POST['idpatrimonio1']);
		$res = array();
		foreach ($patrimonio as $key => $value) {
			if (!empty($value)) {
			
				$patri->setIdpatrimonio($value);
				$ret = $crud->select($patri, true, array($livro)); 
				
				$livro->setIdlivro($ret[0]['idlivro']);
				$selectLivro = $crud->select($livro, true, array(new Area(), new Editora()));
				
				$resultado = array_merge($ret[0], $selectLivro[0]);
				$res[$key] = $resultado;
						
			}
			
		}
		$status = "";
		foreach ($res as $key => $value) {
			if ($res[$key]['patrimonio_status'] === "0") {
				unset($res[$key]);
				
			}
		}

		if (!empty($res)) {
			$rain->setConteudo(array("resultado_patrimonio_emprestimo"), array(

			'idusuario' => $selectUsuario[0]['idusuario'],
			'nome_usuario' => $selectUsuario[0]['nome_usuario'],
			'patrimonio' => $res,
			'idusuario' => $selectUsuario[0]['idusuario']

		));
		}else{
			$rain->setConteudo(array("mensagem","voltar"), array(

			'mensagem' => "Patrimônio não foi encontrado ou não está mais disponível!",
			'resultado' => "danger",
			'link' => "/crud/emprestimo/".$selectUsuario[0]['idusuario']."/usuario/patrimonio/search",
			'botao' => "Registrar outro Patrimônio"
		));

		}
	}


		
	}

	
	public function disabled_emprestimo($idemprestimo){

		$acesso = Controller::getAcesso($_SESSION);
		$crud = new EmprestimoController();

		$res = \ViewController\view\routers\EmprestimoRotas::end_emprestimo($idemprestimo);
		if (!empty($res)) {
			foreach ($res as $keys => $values) {
				foreach ($values as $key => $value) {
				if ($key == 'data_devolucao' || $key == 'data_emprestimo') {
					
					$res["$keys"]["$key"] = Convert::date_to_string($value);
				}
			}
			}

		

			$selectEmprestimo = $crud->select2(new Emprestimo(),true,array('usuario' => array()),array(),array('idemprestimo' => $idemprestimo));
			$selectUsuario = $crud->select2(new Usuario(),true,array(),array(),array('idusuario' => $selectEmprestimo[0]['idusuario']));



			$previsao_devolucao = new \DateTime($selectEmprestimo[0]['data_emprestimo'],new \DateTimeZone('America/Sao_Paulo'));
			$previsao_devolucao->add(new \DateInterval('PT168H'));
			$previsao =  $previsao_devolucao->format('Y-m-d');

			$data_devolucao = new \DateTime($selectEmprestimo[0]['data_devolucao'],new \DateTimeZone('America/Sao_Paulo'));
			$devolucao =  $data_devolucao->format('Y-m-d');

			$resultado = $crud->contaData($devolucao,$previsao);

			foreach ($resultado as $key => $value) {
				$multa_resultado = $resultado[$key]["DATEDIFF('".$devolucao."','".$previsao."')"];
			}             

			if ($multa_resultado > 0 ) {
				$selectvalor = $crud->select2(new Valor(),false,array(),array(),array(),array('idvalor' => "desc"));
				
				$multa = $crud->insertMultaTrue($selectvalor[0]['idvalor'],$selectEmprestimo[0]['idemprestimo']);
				$valor_multa = $multa_resultado * $selectvalor[0]['valor_diario_multa'];

					$devolucao2 =  $data_devolucao->format('d/m/Y');
					$previsao2 =  $previsao_devolucao->format('d/m/Y');
					$exists_multa = "Este empréstimo possui multa!";
					$dias_atraso = $multa_resultado;
					$valor_diario_multa = "R$ ".$selectvalor[0]['valor_diario_multa'].",00";
					$valor_total_multa = "R$ ".$valor_multa.",00";

				$selectMulta = $crud->select2(new Multa(),true,array('emprestimo' => array()),array(),array('idemprestimo' => $idemprestimo));
				
				RelatorioRotas::saveRelatorioDevolucao($selectUsuario[0]['idusuario']);
				EmprestimoRotas::sendEmailPdfDevolucao($selectUsuario);
				
				$email = new Email();
				unlink($email->getComprovante().$selectEmprestimo[0]['nome_usuario'].".pdf");

				$rain = new RainTpl($acesso);
				$rain->setConteudo(array("mensagem", "encerrar_emprestimo_ativo","verifica_multa","pagamento_multa","scripts_cadastro_usuario"),array(
					
					'mensagem' => "Empréstimo encerrado com sucesso!",
					'resultado' => "success",
					'nome_usuario' => $res[0]['nome_usuario'],
					'cpf' => $res[0]['cpf'],
					'data_devolucao' => $res[0]['data_devolucao'],
					'emprestimo' => $res,
					'devolucao' => $devolucao2,
					'previsao' => $previsao2,
					'exists_multa' => $exists_multa,
					'dias_atraso' => $dias_atraso,
					'valor_diario_multa' => $valor_diario_multa,
					'valor_total_multa' => $valor_total_multa,
					'idmulta' => $selectMulta[0]['idmulta']

				));
				
			}
			else{


				RelatorioRotas::saveRelatorioDevolucao($selectUsuario[0]['idusuario']);
				EmprestimoRotas::sendEmailPdfDevolucao($selectUsuario);

				$email = new Email();
				unlink($email->getComprovante().$selectEmprestimo[0]['nome_usuario'].".pdf");

				$selectvalor = $crud->select2(new Valor(),false,array(),array(),array(),array('idvalor' => "desc"));

				$devolucao2 =  $data_devolucao->format('d/m/Y');
				$previsao2 =  $previsao_devolucao->format('d/m/Y');
				$exists_multa = "Este empréstimo não possui multa!";
				$dias_atraso = "0";
				$valor_diario_multa = "R$ ".$selectvalor[0]['valor_diario_multa'].",00";
				$valor_total_multa = "R$ 0,00";

				$rain = new RainTpl($acesso);
				$rain->setConteudo(array("mensagem","encerrar_emprestimo_ativo","verifica_multa","scripts_cadastro_usuario"),array(

					'mensagem' => "Empréstimo encerrado com sucesso!",
					'resultado' => "success",
					'nome_usuario' => $res[0]['nome_usuario'],
					'cpf' => $res[0]['cpf'],
					'data_devolucao' => $res[0]['data_devolucao'],
					'emprestimo' => $res,
					'devolucao' => $devolucao2,
					'previsao' => $previsao2,
					'exists_multa' => $exists_multa,
					'dias_atraso' => $dias_atraso,
					'valor_diario_multa' => $valor_diario_multa,
					'valor_total_multa' => $valor_total_multa
				));

				
			}
			
			
		}

		else{
			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao encerrar empréstimo",
				'resultado' => "danger"
			) );
		}
	}

	public function get_pagamento_multa($idmulta){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new EmprestimoController();

		$resultado = $crud->updateSituacaoMulta($idmulta);
		$selectMulta = $crud->select2(new Multa(),true,array(),array(),array('idmulta' => $idmulta));

		if ($idmulta == $selectMulta[0]['idmulta'] ) {
			
		
			if (!empty($selectMulta)) {
				if ($selectMulta[0]['situacao'] == 1) {
					
						$rain->setConteudo(array("mensagem","comprovante_pagamento"),array(

							'mensagem' => "A multa foi paga pelo usuário!",
							'resultado' => "success",
							'idmulta' => $idmulta
						));
				}else{

						$rain->setConteudo(array("mensagem"),array(

							'mensagem' => "Erro ao finalizar pagamento!",
							'resultado' => "danger"
						));

				}
			}else{
				$rain->setConteudo(array("mensagem"),array(

							'mensagem' => "Erro no sitema!",
							'resultado' => "danger"
						));
			}
		}else{

			$rain->setConteudo(array("mensagem"),array(

						'mensagem' => "Erro no sitema!",
						'resultado' => "danger"
					));

		}


		
	}

	
	public function search_usuario_emprestimo_disabled(){

		$usuario = new Usuario();
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new EmprestimoController();

		$selectUsuario = $crud->getDataToCpfUser($_POST['cpf']);
		
		if (!empty($selectUsuario)) {

		unset($selectUsuario[0]['endereco_idendereco']);
		$usuario = $rain->setTable($selectUsuario[0],$usuario);
		$res = $crud->searchEmprestimosAtivos($usuario);
		if (!empty($res)) {
			$cpf = $crud->mask($_POST['cpf'],'###.###.###-##');
			$rain->setConteudo(array("mensagem", "resultado_emprestimos_usuario_ativos"), array(
				'mensagem' => "Empréstimos ativos do usuário ".$res[0]['nome_usuario']." e portador do CPF ".$cpf,
				'resultado' => "success",

				'patrimonio' => $res


			));
		
		}else{
				$rain->setConteudo(array("mensagem","busca_usuario_emprestimo", "scripts_cadastro_usuario"),array(
				'action'=> "/crud/emprestimo/usuario/disabled/search",
				'mensagem' => "Não foram encontrados empréstimos para este CPF ".$_POST['cpf'],
				'resultado' => "danger"
			
			));
		}		
	 }else{

	 		$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Cpf não foi encontrado no sistema!",
				'resultado' => "danger"
			));
	 }
		
	}
	
	
	public function disabled_all_emprestimo(){

		$acesso = Controller::getAcesso($_SESSION);
		$crud = new EmprestimoController();
		$Emprestimo = new Emprestimo();


		$res = array();
		foreach ($_POST as $key => $value){ 
					
				array_push($res, \ViewController\view\routers\EmprestimoRotas::end_emprestimo($value));
		}
		foreach ($res as $key => $value) {
			if (empty($value)) {
				unset($res["$key"]);
			}
		}
		if (count($res) == count($_POST)) {
			foreach ($res as $keys => $values) {
				foreach ($values as $chave => $valor) {
					foreach ($valor as $key => $value) {
						if ($key == 'data_devolucao' || $key == 'data_emprestimo') {
							
							$res["$keys"]["$chave"]["$key"] = Convert::date_to_string($value);
						}
					}
				}
			}

			$today = new \DateTime();
			$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
			$atual = $today->format('Y-m-d');

			$selectEmprestimo = $crud->select2(new Emprestimo(),true,array('usuario' => array(),'patrimonio' => array('livro' => array())),array('nome_usuario','idusuario','cpf','idemprestimo','data_emprestimo','data_devolucao','nome_livro'),array('data_devolucao' => $atual, 'idusuario' => $res[0][0]['idusuario'] ));

			$selectUsuario = $crud->select2(new Usuario(),true,array(),array(),array('idusuario' => $res[0][0]['idusuario']));

				$emprestimo = $crud->select2(new Emprestimo(),true,array('usuario' => array()),array('idemprestimo'),array('data_devolucao' => $atual, 'idusuario' => $res[0][0]['idusuario'] ));
			
				$quantidade = $crud->select2(new Emprestimo(),true,array('usuario' => array()),array('COUNT(*)'),array('data_devolucao' => $atual, 'idusuario' => $res[0][0]['idusuario'] ));


			if ($quantidade[0]['COUNT(*)'] == 2) {

			$previsao_devolucao = new \DateTime($selectEmprestimo[0]['data_emprestimo'],new \DateTimeZone('America/Sao_Paulo'));
			$previsao_devolucao->add(new \DateInterval('PT168H'));
			$previsao =  $previsao_devolucao->format('Y-m-d');

			$data_devolucao = new \DateTime($selectEmprestimo[0]['data_devolucao'],new \DateTimeZone('America/Sao_Paulo'));
			$devolucao =  $data_devolucao->format('Y-m-d');

			$resultado = $crud->contaData($devolucao,$previsao);

			foreach ($resultado as $key => $value) {
				$multa_resultado = $resultado[$key]["DATEDIFF('".$devolucao."','".$previsao."')"];
			}           

			if ($multa_resultado > 0 ) {
				$selectvalor = $crud->select2(new Valor(),false,array(),array(),array(),array('idvalor' => "desc"));

				foreach ($selectEmprestimo as $key => $value) {
					$multa = $crud->insertMultaTrue($selectvalor[0]['idvalor'],$emprestimo[$key]['idemprestimo']);
				}
				
				$valor_multa = $multa_resultado * $selectvalor[0]['valor_diario_multa'] * $quantidade[0]['COUNT(*)'];


					$devolucao2 =  $data_devolucao->format('d/m/Y');
					$previsao2 =  $previsao_devolucao->format('d/m/Y');
					$exists_multa = "Este empréstimo possui multa!";
					$dias_atraso = $multa_resultado;
					$total_livros = $quantidade[0]['COUNT(*)'];
					$valor_diario_multa = "R$ ".$selectvalor[0]['valor_diario_multa'].",00";
					$valor_total_multa = "R$ ".$valor_multa.",00";


				$selectMulta = $crud->select2(new Multa(),true,array('emprestimo' => array()),array(),array('idemprestimo' => $res[0][0]['idemprestimo']));

				RelatorioRotas::saveRelatorioDevolucaoAll($selectUsuario[0]['idusuario']);
				EmprestimoRotas::sendEmailPdfDevolucaoAll($selectUsuario);

				$email = new Email();
				unlink($email->getComprovante().$selectUsuario[0]['nome_usuario'].".pdf");

				$rain = new RainTpl($acesso);
				$rain->setConteudo(array("mensagem", "encerrar_emprestimo_ativo_all","verifica_multa2","pagamento_multa","scripts_cadastro_usuario"),array(
					
					'devolucao' => $devolucao2,
					'previsao' => $previsao2,
					'exists_multa' => $exists_multa,
					'dias_atraso' => $dias_atraso,
					'valor_diario_multa' => $valor_diario_multa,
					'valor_total_multa' => $valor_total_multa,
					'total_livros' => $total_livros,
					'idmulta' => $selectMulta[0]['idmulta'],
					'mensagem' => "Empréstimos encerrados com sucesso!",
					'resultado' => "success",
					'nome_usuario' => $res[0][0]['nome_usuario'],
					'cpf' => $res[0][0]['cpf'],
					'data_devolucao' => $res[0][0]['data_devolucao'],
					'emprestimo' => $res

				));
				
			}
			else{

				$selectvalor = $crud->select2(new Valor(),false,array(),array(),array(),array('idvalor' => "desc"));

				$devolucao2 =  $data_devolucao->format('d/m/Y');
				$previsao2 =  $previsao_devolucao->format('d/m/Y');
				$exists_multa = "Este empréstimo não possui multa!";
				$dias_atraso = "0";
				$valor_diario_multa = "R$ ".$selectvalor[0]['valor_diario_multa'].",00";
				$valor_total_multa = "R$ 0,00";

				RelatorioRotas::saveRelatorioDevolucaoAll($selectUsuario[0]['idusuario']);
				EmprestimoRotas::sendEmailPdfDevolucaoAll($selectUsuario);

				$email = new Email();
				unlink($email->getComprovante().$selectUsuario[0]['nome_usuario'].".pdf");

				$rain = new RainTpl($acesso);
				$rain->setConteudo(array("mensagem", "encerrar_emprestimo_ativo_all","verifica_multa","scripts_cadastro_usuario"),array(

					'devolucao' => $devolucao2,
					'previsao' => $previsao2,
					'exists_multa' => $exists_multa,
					'dias_atraso' => $dias_atraso,
					'valor_diario_multa' => $valor_diario_multa,
					'valor_total_multa' => $valor_total_multa,
					'mensagem' => "Empréstimos encerrados com sucesso!",
					'resultado' => "success",
					'nome_usuario' => $res[0][0]['nome_usuario'],
					'cpf' => $res[0][0]['cpf'],
					'data_devolucao' => $res[0][0]['data_devolucao'],
					'emprestimo' => $res
				));

				

			}
				
			}else{


			$previsao_devolucao = new \DateTime($selectEmprestimo[0]['data_emprestimo'],new \DateTimeZone('America/Sao_Paulo'));
			$previsao_devolucao->add(new \DateInterval('PT168H'));
			$previsao =  $previsao_devolucao->format('Y-m-d');

			$data_devolucao = new \DateTime($selectEmprestimo[0]['data_devolucao'],new \DateTimeZone('America/Sao_Paulo'));
			$devolucao =  $data_devolucao->format('Y-m-d');

			$resultado = $crud->contaData($devolucao,$previsao);

			foreach ($resultado as $key => $value) {
				$multa_resultado = $resultado[$key]["DATEDIFF('".$devolucao."','".$previsao."')"];
			}             

			if ($multa_resultado > 0 ) {

				$selectvalor = $crud->select2(new Valor(),false,array(),array(),array(),array('idvalor' => "desc"));

				foreach ($selectEmprestimo as $key => $value) {
					
					$multa[$key] = $crud->insertMultaTrue($selectvalor[0]['idvalor'],$selectEmprestimo[$key]['idemprestimo']);
					
				}

				$valor_multa = $multa_resultado * $selectvalor[0]['valor_diario_multa'];
				
				

					$devolucao2 =  $data_devolucao->format('d/m/Y');
					$previsao2 =  $previsao_devolucao->format('d/m/Y');
					$exists_multa = "Este empréstimo possui multa!";
					$dias_atraso = $multa_resultado;
					$valor_diario_multa = "R$ ".$selectvalor[0]['valor_diario_multa'].",00";
					$total_livros = $quantidade[0]['COUNT(*)'];
					$valor_total_multa = "R$ ".$valor_multa.",00";

				$selectMulta = $crud->select2(new Multa(),true,array('emprestimo' => array()),array(),array('idemprestimo' => $res[0][0]['idemprestimo']));

				RelatorioRotas::saveRelatorioDevolucaoAll($selectUsuario[0]['idusuario']);
				EmprestimoRotas::sendEmailPdfDevolucaoAll($selectUsuario);

				$email = new Email();
				unlink($email->getComprovante().$selectUsuario[0]['nome_usuario'].".pdf");

				$rain = new RainTpl($acesso);
				$rain->setConteudo(array("mensagem", "encerrar_emprestimo_ativo_all","verifica_multa2","pagamento_multa","scripts_cadastro_usuario"),array(
					
					'devolucao' => $devolucao2,
					'previsao' => $previsao2,
					'exists_multa' => $exists_multa,
					'dias_atraso' => $dias_atraso,
					'valor_diario_multa' => $valor_diario_multa,
					'valor_total_multa' => $valor_total_multa,
					'total_livros' => $total_livros,
					'idmulta' => $selectMulta[0]['idmulta'],
					'mensagem' => "Empréstimos encerrados com sucesso!",
					'resultado' => "success",
					'nome_usuario' => $res[0][0]['nome_usuario'],
					'cpf' => $res[0][0]['cpf'],
					'data_devolucao' => $res[0][0]['data_devolucao'],
					'emprestimo' => $res

				));
				
			}
			else{

				$selectvalor = $crud->select2(new Valor(),false,array(),array(),array(),array('idvalor' => "desc"));

				$devolucao2 =  $data_devolucao->format('d/m/Y');
				$previsao2 =  $previsao_devolucao->format('d/m/Y');
				$exists_multa = "Este empréstimo não possui multa!";
				$dias_atraso = "0";
				$valor_diario_multa = "R$ ".$selectvalor[0]['valor_diario_multa'].",00";
				$valor_total_multa = "R$ 0,00";

				RelatorioRotas::saveRelatorioDevolucaoAll($selectUsuario[0]['idusuario']);
				EmprestimoRotas::sendEmailPdfDevolucaoAll($selectUsuario);

				$email = new Email();
				unlink($email->getComprovante().$selectUsuario[0]['nome_usuario'].".pdf");

				$rain = new RainTpl($acesso);
				$rain->setConteudo(array("mensagem", "encerrar_emprestimo_ativo_all","verifica_multa","scripts_cadastro_usuario"),array(

					'devolucao' => $devolucao2,
					'previsao' => $previsao2,
					'exists_multa' => $exists_multa,
					'dias_atraso' => $dias_atraso,
					'valor_diario_multa' => $valor_diario_multa,
					'valor_total_multa' => $valor_total_multa,
					'mensagem' => "Empréstimos encerrados com sucesso!",
					'resultado' => "success",
					'nome_usuario' => $res[0][0]['nome_usuario'],
					'cpf' => $res[0][0]['cpf'],
					'data_devolucao' => $res[0][0]['data_devolucao'],
					'emprestimo' => $res
				));
				
			}
		}


		}
		else{

			$rain = new RainTpl($acesso);
			$rain->setConteudo(array("mensagem"),array(
				'mensagem' => "Erro ao encerrar todos os empréstimos. Verifique a lista dos empréstimos!",
				'resultado' => "danger"
				
			) );

		}

	}

}

 ?>