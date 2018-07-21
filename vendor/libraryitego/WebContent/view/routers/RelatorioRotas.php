<?php 
namespace ViewController\view\routers;

/*require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/libraryitego/WebContent/view/routers/config/Config.php');*/
	use \Slim\Slim;
	use \ViewController\{RainTpl,RelatorioRainTpl,Email,EmailRainTpl};
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno, Multa};
	use \Controller\control\{Controller, RelatorioAnoController, CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController,RelatorioController};
	use \Controller\util\{Convert, Retorno,RetornoLogin,Encripty};
	
/**
 * @relatorioFormacao=btc
 * @relatorioCargo=btc
 * @relatorioQtdFuncionarios=btc
 * @relatorioCursoTipo=btc
 * @relatorioQtdCurso=btc
 * @relatorioTurmaAluno=btc
 * @relatorioTurmaCurso=btc
 * @relatorioTurmaTurno=btc
 * @relatorioQtdTurmas=btc
 * @relatorioUsuarioAluno=btc
 * @relatorioUsuarioFuncionario=btc
 * @relatorioEmprestimoPatrimonio=btc
 * @relatorioQtdEmprestimos=btc
 * @relatorioEmprestimoUsuario=btc
 * @relatorioLivroPatrimonio=btc
 * @relatorioLivroEmprestimo=btc
 * @relatorioLivroAno=btc
 * @relatorioLivroAutor=btc
 * @relatorioLivroArea=btc
 * @relatorioLivroEditora=btc
 * @relatorioQtdLivros=btc
 * @relatorio=btc
 * @relatorioAvaliacaoLivro=btc
 * @relatorioAvaliacaoPatrimonio=btc
 * @relatorioAutorizacao2=btc
 * @relatorioCargoNivel=adm
 * @relatorioTurmaTurnoMatutino=btc
 * @relatorioTurmaTurnoVespertino=btc
 * @relatorioTurmaTurnoNoturno=btc
 * @relatorioAutorizacao=btc
 */
class RelatorioRotas 
{

	
	public function pdfDevolucaoEmprestimoAll($idusuario)
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();
		$control = new EmprestimoController();


		$selectmulta = $relatorio->select(new Multa(),true,array('emprestimo' => array('usuario' => array())),array(),array('situacao' => 0, 'idusuario' => $idusuario));

		if (!empty($selectmulta)) {
	

			$selectEmprestimo =  $relatorio->select(new Emprestimo(),true,array('usuario' => array(),'patrimonio' => array('livro' => array())),array(),array('idemprestimo' => $selectmulta[0]['emprestimo_idemprestimo']));

			$today = new \DateTime();
			$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
			$atual = $today->format('Y-m-d');

			$quantidade = $relatorio->select(new Emprestimo(),true,array('usuario' => array()),array('COUNT(*)'),array('idusuario' => $selectEmprestimo[0]['idusuario'], 'data_devolucao' => "'".$atual."'"));


				if ($quantidade[0]['COUNT(*)'] > 1) {

					$today = new \DateTime();
					$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
					$atual = $today->format('Y-m-d');
					$hoje = $today->format('d/m/Y');

			$selectEmprestimo = $relatorio->select(new Emprestimo(),true,array('usuario' => array(),'patrimonio' => array('livro' => array())),array(),array('idusuario' => $idusuario, 'data_devolucao' => "'".$atual."'"));

			$selectValor = $relatorio->select(new Valor(),false,array(),array(),array(),array('valor_diario_multa' => "desc"));
			;

			foreach ($selectEmprestimo as $key => $value) {

				$data_emprestimo = new \DateTime($selectEmprestimo[$key]['data_emprestimo'],new \DateTimeZone('America/Sao_Paulo'));
				$data_devolucao = new \DateTime($selectEmprestimo[$key]['data_devolucao'],new \DateTimeZone('America/Sao_Paulo'));
				$data_previsao = $data_emprestimo->add(new \DateInterval('PT168H'));

				$diferenca = $data_previsao->diff($data_devolucao);


				if ((int)$diferenca->format('%R%d') > 0) {
					$selectEmprestimo[$key]['atraso_devolucao'] = (int)$diferenca->format('%R%d')." dias";
					$selectEmprestimo[$key]['valor_total_multa'] = (int)$diferenca->format('%R%d') * (int)$selectValor[0]['valor_diario_multa'];
				}else{
					$selectEmprestimo[$key]['atraso_devolucao'] = '0 dias';
					$selectEmprestimo[$key]['valor_total_multa'] = "0";
				}


				
				$selectEmprestimo[$key]['valor_diario'] = $selectValor[0]['valor_diario_multa'];
				
				$selectEmprestimo[$key]['data_previsao'] = $data_previsao->format('d/m/Y');
				$selectEmprestimo[$key]['data_emprestimo'] = Convert::date_to_string($selectEmprestimo[$key]['data_emprestimo']);
				$selectEmprestimo[$key]['data_devolucao'] = Convert::date_to_string($selectEmprestimo[$key]['data_devolucao']);
				
			}

			$cpf = $relatorio->mask($selectEmprestimo[0]['cpf'],'###.###.###-##');
			$celular = $relatorio->mask($selectEmprestimo[0]['telefone_celular'],'(##) # ####-####');

				$html = $rain->setConteudo(array("header","devolucao_emprestimo","footer"),array(

				'nome_usuario' => strtoupper($selectEmprestimo[0]['nome_usuario']),
				'cpf' => $cpf,
				'telefone_celular' => $celular,
				'resultado' => $selectEmprestimo,
				'data_devolucao' => $hoje

			));

				return $html;


		}



		}else{


			$today = new \DateTime();
			$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
			$atual = $today->format('Y-m-d');
			$hoje = $today->format('d/m/Y');

			$selectEmprestimo = $relatorio->select(new Emprestimo(),true,array('usuario' => array(),'patrimonio' => array('livro' => array())),array(),array('idusuario' => $idusuario, 'data_devolucao' => "'".$atual."'"));

			$selectValor = $relatorio->select(new Valor(),false,array(),array(),array(),array('valor_diario_multa' => "desc"));
			;

			foreach ($selectEmprestimo as $key => $value) {

				$data_emprestimo = new \DateTime($selectEmprestimo[$key]['data_emprestimo'],new \DateTimeZone('America/Sao_Paulo'));
				$data_devolucao = new \DateTime($selectEmprestimo[$key]['data_devolucao'],new \DateTimeZone('America/Sao_Paulo'));
				$data_previsao = $data_emprestimo->add(new \DateInterval('PT168H'));

				$diferenca = $data_previsao->diff($data_devolucao);


				if ((int)$diferenca->format('%R%d') > 0) {
					$selectEmprestimo[$key]['atraso_devolucao'] = (int)$diferenca->format('%R%d')." dias";
					$selectEmprestimo[$key]['valor_total_multa'] = (int)$diferenca->format('%R%d') * (int)$selectValor[0]['valor_diario_multa'];
				}else{
					$selectEmprestimo[$key]['atraso_devolucao'] = '0 dias';
					$selectEmprestimo[$key]['valor_total_multa'] = "0";
				}


				
				$selectEmprestimo[$key]['valor_diario'] = $selectValor[0]['valor_diario_multa'];
				
				$selectEmprestimo[$key]['data_previsao'] = $data_previsao->format('d/m/Y');
				$selectEmprestimo[$key]['data_emprestimo'] = Convert::date_to_string($selectEmprestimo[$key]['data_emprestimo']);
				$selectEmprestimo[$key]['data_devolucao'] = Convert::date_to_string($selectEmprestimo[$key]['data_devolucao']);
				
			}

			$cpf = $relatorio->mask($selectEmprestimo[0]['cpf'],'###.###.###-##');
			$celular = $relatorio->mask($selectEmprestimo[0]['telefone_celular'],'(##) # ####-####');

				$html = $rain->setConteudo(array("header","devolucao_emprestimo","footer"),array(

				'nome_usuario' => strtoupper($selectEmprestimo[0]['nome_usuario']),
				'cpf' => $cpf,
				'telefone_celular' => $celular,
				'resultado' => $selectEmprestimo,
				'data_devolucao' => $hoje

			));
		
		return $html;

		}
	}


	public function relatorioAutorizacao($idusuario){

		$acesso = Controller::getAcesso($_SESSION);
		$relatorio = new RelatorioController();
	
	
		$relatorio->callMpdf(RelatorioRotas::pdfAutorizacaoEmprestimo($idusuario));

	}
	public function relatorioDevolucao($idusuario){

		$acesso = Controller::getAcesso($_SESSION);
		$relatorio = new RelatorioController();
	
	
		$relatorio->callMpdf(RelatorioRotas::pdfDevolucaoEmprestimo($idusuario));
	}

	public function relatorioDevolucaoAll($idusuario){

		$acesso = Controller::getAcesso($_SESSION);
		$relatorio = new RelatorioController();
	
	
		$relatorio->callMpdf(RelatorioRotas::pdfDevolucaoEmprestimoAll($idusuario));
	}
	public static function saveRelatorioAutorizacao($idusuario){

		$acesso = Controller::getAcesso($_SESSION);
		$relatorio = new RelatorioController();
		$email = new Email();
		$selectUsuario = $relatorio->select(new Usuario(),true,array(),array(),array('idusuario' => $idusuario));
		$output = $email->getComprovante().$selectUsuario[0]['nome_usuario'];
	
		$relatorio->callMpdf(RelatorioRotas::pdfAutorizacaoEmprestimo($idusuario),$output);

	}

	public static function saveRelatorioDevolucao($idusuario){

		$acesso = Controller::getAcesso($_SESSION);
		$relatorio = new RelatorioController();
		$email = new Email();
		$selectUsuario = $relatorio->select(new Usuario(),true,array(),array(),array('idusuario' => $idusuario));
		$output = $email->getComprovante().$selectUsuario[0]['nome_usuario'];
	
		$relatorio->callMpdf(RelatorioRotas::pdfDevolucaoEmprestimo($idusuario),$output);

	}

	public static function saveRelatorioDevolucaoAll($idusuario){

		$acesso = Controller::getAcesso($_SESSION);
		$relatorio = new RelatorioController();
		$email = new Email();
		$selectUsuario = $relatorio->select(new Usuario(),true,array(),array(),array('idusuario' => $idusuario));
		$output = $email->getComprovante().$selectUsuario[0]['nome_usuario'];
	
		$relatorio->callMpdf(RelatorioRotas::pdfDevolucaoEmprestimoAll($idusuario),$output);

	}

	public function pdfDevolucaoEmprestimo($idusuario){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();
		$control = new EmprestimoController();

		$today = new \DateTime();
			$today->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
			$atual = $today->format('Y-m-d');
			$hoje = $today->format('d/m/Y');

		$selectEmprestimo = $relatorio->select(new Emprestimo(),true,array('usuario' => array(),'patrimonio' => array('livro' => array())),array(),array('idusuario' => $idusuario, 'data_devolucao' => "'".$atual."'"));	

		$multa = $relatorio->select(new Multa(),true,array('emprestimo' => array('usuario' => array())),array("COUNT(*)"),array('idusuario' => $selectEmprestimo[0]['idusuario'], 'situacao' => 0, 'data_devolucao' => "'".$atual."'"));

		if ($multa[0]['COUNT(*)'] >= 1) {
			
			$selectValor = $relatorio->select(new Valor(),false,array(),array(),array(),array('valor_diario_multa' => "desc"));
			;
			$cpf = $relatorio->mask($selectEmprestimo[0]['cpf'],'###.###.###-##');
			$celular = $relatorio->mask($selectEmprestimo[0]['telefone_celular'],'(##) # ####-####');

			//$valor_multa = $multa[0]['COUNT(*)'] * $selectValor[0]['valor_diario_multa'] * $multa_resultado;

			//$devolucao = $previsao_devolucao->format('d/m/Y');

			foreach ($selectEmprestimo as $key => $value) {

				$data_emprestimo = new \DateTime($selectEmprestimo[$key]['data_emprestimo'],new \DateTimeZone('America/Sao_Paulo'));
				$data_devolucao = new \DateTime($selectEmprestimo[$key]['data_devolucao'],new \DateTimeZone('America/Sao_Paulo'));
				$data_previsao = $data_emprestimo->add(new \DateInterval('PT168H'));

				$diferenca = $data_previsao->diff($data_devolucao);
				//var_dump((int)$diferenca->format('%R%d'));
				if ((int)$diferenca->format('%R%d') > 0) {
					$selectEmprestimo[$key]['atraso_devolucao'] = (int)$diferenca->format('%R%d')." dias";
					$selectEmprestimo[$key]['valor_total_multa'] = (int)$diferenca->format('%R%d') * (int)$selectValor[0]['valor_diario_multa'];
				}else{
					$selectEmprestimo[$key]['atraso_devolucao'] = '0 dias';
					$selectEmprestimo[$key]['valor_total_multa'] = "0";
				}


				
				$selectEmprestimo[$key]['valor_diario'] = $selectValor[0]['valor_diario_multa'];
				
				$selectEmprestimo[$key]['data_previsao'] = $data_previsao->format('d/m/Y');
				$selectEmprestimo[$key]['data_emprestimo'] = Convert::date_to_string($selectEmprestimo[$key]['data_emprestimo']);
				$selectEmprestimo[$key]['data_devolucao'] = Convert::date_to_string($selectEmprestimo[$key]['data_devolucao']);
				
			}

				$html = $rain->setConteudo(array("header","devolucao_emprestimo","footer"),array(

					'nome_usuario' => strtoupper($selectEmprestimo[0]['nome_usuario']),
					'cpf' => $cpf,
					'telefone_celular' => $celular,
					'resultado' => $selectEmprestimo,
					'data_devolucao' => $hoje
				));

		return $html;


		}else{

			$selectValor = $relatorio->select(new Valor(),false,array(),array(),array(),array('valor_diario_multa' => "desc"));
			;

			foreach ($selectEmprestimo as $key => $value) {

				$data_emprestimo = new \DateTime($selectEmprestimo[$key]['data_emprestimo'],new \DateTimeZone('America/Sao_Paulo'));
				$data_devolucao = new \DateTime($selectEmprestimo[$key]['data_devolucao'],new \DateTimeZone('America/Sao_Paulo'));
				$data_previsao = $data_emprestimo->add(new \DateInterval('PT168H'));

				$diferenca = $data_previsao->diff($data_devolucao);
				//var_dump((int)$diferenca->format('%R%d'));
				if ((int)$diferenca->format('%R%d') > 0) {
					$selectEmprestimo[$key]['atraso_devolucao'] = (int)$diferenca->format('%R%d')." dias";
					$selectEmprestimo[$key]['valor_total_multa'] = (int)$diferenca->format('%R%d') * (int)$selectValor[0]['valor_diario_multa'];
				}else{
					$selectEmprestimo[$key]['atraso_devolucao'] = '0 dias';
					$selectEmprestimo[$key]['valor_total_multa'] = "0";
				}


				
				$selectEmprestimo[$key]['valor_diario'] = $selectValor[0]['valor_diario_multa'];
				
				$selectEmprestimo[$key]['data_previsao'] = $data_previsao->format('d/m/Y');
				$selectEmprestimo[$key]['data_emprestimo'] = Convert::date_to_string($selectEmprestimo[$key]['data_emprestimo']);
				$selectEmprestimo[$key]['data_devolucao'] = Convert::date_to_string($selectEmprestimo[$key]['data_devolucao']);
				
			}

			$cpf = $relatorio->mask($selectEmprestimo[0]['cpf'],'###.###.###-##');
			$celular = $relatorio->mask($selectEmprestimo[0]['telefone_celular'],'(##) # ####-####');

				$html = $rain->setConteudo(array("header","devolucao_emprestimo","footer"),array(

				'nome_usuario' => strtoupper($selectEmprestimo[0]['nome_usuario']),
				'cpf' => $cpf,
				'telefone_celular' => $celular,
				'resultado' => $selectEmprestimo,
				'data_devolucao' => $hoje

			));
		return $html;


		}

	}

	public function pdfAutorizacaoEmprestimo($idusuario){
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectEmprestimo = $relatorio->select(new Emprestimo(),true,array('usuario' => array(),'patrimonio' => array('livro' => array())),array(),array('idusuario' => $idusuario, 'data_devolucao' => "''"),array('data_emprestimo' => "desc"));

		foreach ($selectEmprestimo as $key => $value) {

			$data = new \DateTime($selectEmprestimo[$key]['data_emprestimo'],new \DateTimeZone('America/Sao_Paulo'));
			$data->add(new \DateInterval('PT168H'));
			$previsao =  $data->format('d/m/Y');
			$selectEmprestimo[$key]['previsao'] = $previsao;
			$selectEmprestimo[$key]['data_emprestimo'] = Convert::date_to_string($selectEmprestimo[$key]['data_emprestimo']);

		}

		$selectValor = $relatorio->select(new Valor(),false,array(),array(),array(),array('valor_diario_multa' => "desc"));
		$atual = Date('d/m/Y');
		
		$cpf = $relatorio->mask($selectEmprestimo[0]['cpf'],'###.###.###-##');
		$celular = $relatorio->mask($selectEmprestimo[0]['telefone_celular'],'(##) # ####-####');
		


		$html = $rain->setConteudo(array("header","autorizacao_emprestimo","footer"),array(

			'nome_usuario' => strtoupper($selectEmprestimo[0]['nome_usuario']),
			'cpf' => $cpf,
			'telefone_celular' => $celular,
			'resultado' => $selectEmprestimo,
			'data_emprestimo' => $atual,
			'valor_diario_multa' =>$selectValor[0]['valor_diario_multa']
			


		));
		return $html;
	}

	
	public function relatorioCargoNivel(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$html = $rain->setConteudo(array("header","cargo_nivel","footer"));
			
		
		$relatorio->callMpdf($html);



	}
	public function relatorioFormacao(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Funcionario(), false, array('formacao' => array()),array("nome_formacao", "COUNT(*)"),array(),array('count(*)' => "desc"), "nome_formacao");

		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_formacao'] = $res1[$key]['nome_formacao'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}

		$res3 = $relatorio->select(new Formacao(),false,array(),array("COUNT(*)"));

		$selectFormacao = $relatorio->select(new Formacao(),false,array());

		foreach ($selectFormacao as $key => $value) {
			$res4[$key] = $relatorio->select(new Funcionario(),true,array('formacao' => array()),array("nome_formacao","COUNT(*)"),array('idformacao' => $selectFormacao[$key]['idformacao']), array(),"");

		}
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_formacao'] = $res4[$key][0]['nome_formacao'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_funcionarios_formacao","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_funcionarios_formacao","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);
	}

	public function relatorioCargo(){


		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Funcionario(), false, array('cargo' => array()),array("nome_cargo", "COUNT(*)"),array(),array('count(*)' => "desc"), "nome_cargo");

		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_cargo'] = $res1[$key]['nome_cargo'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}

		$res3 = $relatorio->select(new Cargo(),false,array(),array("COUNT(*)"));

		$selectCargo = $relatorio->select(new Cargo(),false,array());

		foreach ($selectCargo as $key => $value) {
			$res4[$key] = $relatorio->select(new Funcionario(),true,array('cargo' => array()),array("nome_cargo","COUNT(*)"),array('idcargo' => $selectCargo[$key]['idcargo']), array(),"");

		}
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_cargo'] = $res4[$key][0]['nome_cargo'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}
		

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_funcionarios_cargo","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_funcionarios_cargo","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);
	}	

	public function relatorioQtdFuncionarios(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Funcionario(),false,array(),array("COUNT(*)"));

		$html = $rain->setConteudo(array("header","quantidade_funcionarios","footer"),array(

			'total' => $res1[0]['COUNT(*)']
		));
		
		$relatorio->callMpdf($html);

	}

	public function relatorioCursoTipo(){


		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Curso(), false, array('tipo' =>array()),array("nome_tipo", "COUNT(*)"),array(),array('count(*)' => "desc"),"nome_tipo");

		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_tipo'] = $res1[$key]['nome_tipo'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}

		$res3 = $relatorio->select(new Tipo(),false,array(),array("COUNT(*)"));

		$selectTipo = $relatorio->select(new Tipo(),false,array());

		foreach ($selectTipo as $key => $value) {
			$res4[$key] = $relatorio->select(new Curso(),true,array('tipo' => array()),array("nome_tipo","COUNT(*)"),array('idtipo' => $selectTipo[$key]['idtipo']), array(),"");

		}
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_tipo'] = $res4[$key][0]['nome_tipo'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_cursos_tipo","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_cursos_tipo","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);

	}

	public function relatorioQtdCurso(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Curso(),false,array(),array("COUNT(*)"));

		$html = $rain->setConteudo(array("header","quantidade_cursos","footer"),array(

			'total' => $res1[0]['COUNT(*)']
		));
		
		$relatorio->callMpdf($html);

	}

	public function relatorioTurmaAluno(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Turma_has_Aluno(),false,array('aluno' => array('usuario' => array()),'turma' => array()),array("idturma","COUNT(*)"), array(), array('count(*)' => "desc"), "idturma");

		
		foreach ($res1 as $key => $value) {
				
				$res2[$key]['idturma'] = $res1[$key]['idturma'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			}

		$selectTurma = $relatorio->select(new Turma(),false,array());

		foreach ($selectTurma as $key => $value) {
			$res4[$key] = $relatorio->select(new Turma_has_Aluno(),true,array('aluno' => array('usuario' => array()),'turma' => array()),array("idturma","COUNT(*)"),array('idturma' => $selectTurma[$key]['idturma']), array(),"");

		}

		foreach ($res4 as $key => $value) {
				
				$res5[$key]['idturma'] = $res4[$key][0]['idturma'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_turmas_aluno","footer"),array(

					'result' => $res2,
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_turmas_aluno","footer"),array(

					'result' => $res2,
				));
			}
		}
		$relatorio->callMpdf($html);

	}

	public function relatorioTurmaCurso(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Turma(),false,array('curso' => array('tipo' => array())),array("nome_curso","nome_tipo","COUNT(*)"), array(), array('count(*)' => "desc"), "nome_curso");


		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_curso'] = $res1[$key]['nome_curso'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
				$res2[$key]['nome_tipo'] = $res1[$key]['nome_tipo'];
			
			}
			
		$selectCurso = $relatorio->select(new Curso(),false,array());

		foreach ($selectCurso as $key => $value) {
			$res4[$key] = $relatorio->select(new Turma(),true,array('curso' => array('tipo' => array())),array("nome_curso","nome_tipo","COUNT(*)"),array('idcurso' => $selectCurso[$key]['idcurso']), array(),"");

		}
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_curso'] = $res4[$key][0]['nome_curso'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
				$res5[$key]['nome_tipo'] = $res4[$key][0]['nome_tipo'];
			
			}

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_turmas_curso","footer"),array(

					'result' => $res2,
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_turmas_curso","footer"),array(

					'result' => $res2,
				));
			}
		}
		$relatorio->callMpdf($html);
	}

	public function relatorioTurmaTurno(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Turma(),false,array('turno' => array()),array("nome_turno","COUNT(*)"), array(), array('count(*)' => "desc"), "nome_turno");


		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_turno'] = $res1[$key]['nome_turno'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}

		$res3 = $relatorio->select(new Turno(),false,array(),array("COUNT(*)"));

		$selectTurno = $relatorio->select(new Turno(),false,array());

		foreach ($selectTurno as $key => $value) {
			$res4[$key] = $relatorio->select(new Turma(),true,array('turno' => array()),array("nome_turno","COUNT(*)"),array('idturno' => $selectTurno[$key]['idturno']), array(),"");

		}
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_turno'] = $res4[$key][0]['nome_turno'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_turmas_turno","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_turmas_turno","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);
	}
	public function relatorioTurmaTurnoMatutino()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Turma(),true,array('turno' => array()),array(), array('nome_turno' => "'matutino'"), array('data_inicio' => "desc"));
		//var_dump($res1);

		$data = new \DateTime('now');
		$data->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
		$dt = $data->format("Y-m-d");	
		
		$ret = $relatorio->selectTurmasAtivas($dt,$res1[0]['nome_turno']);
		
			foreach ($ret as $key => $value) {
			$res2[$key]['data_inicio'] =  date('d-m-Y', strtotime($ret[$key]['data_inicio']));
				$res2[$key]['data_termino'] =  date('d-m-Y', strtotime($ret[$key]['data_termino']));
				$res2[$key]['idturma'] = $ret[$key]['idturma'];
			}
				
				$html = $rain->setConteudo(array("header","turmas_turno_matutino","footer"),array(

					'result' => $res2
				));

		
			$relatorio->callMpdf($html);
			
	}

	public function relatorioTurmaTurnoVespertino()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Turma(),true,array('turno' => array()),array(), array('nome_turno' => "'vespertino'"), array('data_inicio' => "desc"));
		//var_dump($res1);

		$data = new \DateTime('now');
		$data->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
		$dt = $data->format("Y-m-d");	
		
		$ret = $relatorio->selectTurmasAtivas($dt,$res1[0]['nome_turno']);
		
			foreach ($ret as $key => $value) {
			$res2[$key]['data_inicio'] =  date('d-m-Y', strtotime($ret[$key]['data_inicio']));
				$res2[$key]['data_termino'] =  date('d-m-Y', strtotime($ret[$key]['data_termino']));
				$res2[$key]['idturma'] = $ret[$key]['idturma'];
			}
				
				$html = $rain->setConteudo(array("header","turmas_turno_vespertino","footer"),array(

					'result' => $res2
				));

		
			$relatorio->callMpdf($html);
			
	}

	public function relatorioTurmaTurnoNoturno()
	{
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Turma(),true,array('turno' => array()),array(), array('nome_turno' => "'noturno'"), array('data_inicio' => "desc"));
		//var_dump($res1);

		$data = new \DateTime('now');
		$data->setTimezone(new \DateTimeZone('America/Sao_Paulo'));
		$dt = $data->format("Y-m-d");	
		
		$ret = $relatorio->selectTurmasAtivas($dt,$res1[0]['nome_turno']);
		
			foreach ($ret as $key => $value) {
			$res2[$key]['data_inicio'] =  date('d-m-Y', strtotime($ret[$key]['data_inicio']));
				$res2[$key]['data_termino'] =  date('d-m-Y', strtotime($ret[$key]['data_termino']));
				$res2[$key]['idturma'] = $ret[$key]['idturma'];
			}
				
				$html = $rain->setConteudo(array("header","turmas_turno_noturno","footer"),array(

					'result' => $res2
				));

		
			$relatorio->callMpdf($html);
			
	}

	public function relatorioQtdTurmas(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioAnoController();

		$res1 = $relatorio->select(new Turma(), false, array(),array("COUNT(*)"));

		$html = $rain->setConteudo(array("header","quantidade_turmas","footer"),array(

			'total' => $res1[0]['COUNT(*)']
		));
		
		$relatorio->callMpdf($html);

	}

	public function relatorioUsuarioAluno(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Aluno(),false,array('usuario' => array()),array("nome_usuario","email"),array(),array('nome_usuario' => 'asc'),"");


		$res2 = $relatorio->select(new Aluno(),false,array(),array("COUNT(*)"));

		$html = $rain->setConteudo(array("header","quantidade_usuarios_aluno","footer"),array(

					'result' => $res1,
					'total' => $res2[0]['COUNT(*)']
					
				));

		$relatorio->callMpdf($html);
	}

	public function relatorioUsuarioFuncionario(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$res1 = $relatorio->select(new Funcionario(),false,array('usuario' => array(),'cargo' => array()),array("nome_usuario","nome_cargo","email"),array(),array('nome_usuario' => 'asc'),"");

		$res2 = $relatorio->select(new Funcionario(),false,array(),array("COUNT(*)"));

		$html = $rain->setConteudo(array("header","quantidade_usuarios_funcionario","footer"),array(

					'result' => $res1,
					'total' => $res2[0]['COUNT(*)']
					
				));

		$relatorio->callMpdf($html);
	}

	public function relatorioEmprestimoPatrimonio(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectPatrimonio = $relatorio->select(new Patrimonio(),false);


		$res1 = $relatorio->select(new Emprestimo(), false, array('patrimonio' => array()),array("idpatrimonio", "COUNT(*)"),array(),array('count(*)' => "desc"), "idpatrimonio");

		foreach ($res1 as $key => $value) {
				
				$res2[$key]['idpatrimonio'] = $res1[$key]['idpatrimonio'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}


		$res3 = $relatorio->select(new Patrimonio(),false,array(),array("COUNT(*)"));
		
		foreach ($selectPatrimonio as $key => $value) {
			$res4[$key] = $relatorio->select(new Emprestimo(),true,array('patrimonio' => array()),array("idpatrimonio","COUNT(*)"),array('idpatrimonio' => $selectPatrimonio[$key]['idpatrimonio']), array('COUNT(*)' => "desc"),"");

		}
		
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['idpatrimonio'] = $res4[$key][0]['idpatrimonio'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_emprestimos_patrimonio","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_emprestimos_patrimonio","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);

	}

	public function relatorioQtdEmprestimos(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectEmprestimo = $relatorio->select(new Emprestimo(),false);
		$res1 = $relatorio->select(new Emprestimo(),false,array(),array("COUNT(*)"), array());

			$res2 = $relatorio->select(new Emprestimo(), true,array(),array("COUNT(*)"),array(

			'data_devolucao' => "0000-00-00" 
		));	
		
		$res3  = $res1[0]['COUNT(*)'] - $res2[0]['COUNT(*)'];
		$res4 = strval($res3);

		$html = $rain->setConteudo(array("header","quantidade_emprestimos","footer"),array(

			'total' => $res1[0]['COUNT(*)'],
			'ativo' => $res2[0]['COUNT(*)'],
			'inativo' => $res4
			
		));
		
		$relatorio->callMpdf($html);
	}

	public function relatorioEmprestimoUsuario(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectUsuario = $relatorio->select(new Usuario(),false);


		$res1 = $relatorio->select(new Emprestimo(), false, array('usuario' => array()),array("nome_usuario", "COUNT(*)"),array(),array('count(*)' => "desc"), "nome_usuario");


		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_usuario'] = $res1[$key]['nome_usuario'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}


		$res3 = $relatorio->select(new Usuario(),false,array(),array("COUNT(*)"));
		
		foreach ($selectUsuario as $key => $value) {
			$res4[$key] = $relatorio->select(new Emprestimo(),true,array('usuario' => array()),array("nome_usuario","COUNT(*)"),array('idusuario' => $selectUsuario[$key]['idusuario']), array('COUNT(*)' => "desc"),"");

		}
		
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_usuario'] = $res4[$key][0]['nome_usuario'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_emprestimos_usuario","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_emprestimos_usuario","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);
	}

	public function relatorioLivroPatrimonio(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectLivro = $relatorio->select(new Livro(),false);


		$res1 = $relatorio->select(new Patrimonio(), false, array('livro' => array()),array("nome_livro", "COUNT(*)"),array(),array('count(*)' => "desc"), "nome_livro");


		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_livro'] = $res1[$key]['nome_livro'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}


		$res3 = $relatorio->select(new Patrimonio(),false,array(),array("COUNT(*)"));
		
		foreach ($selectLivro as $key => $value) {
			$res4[$key] = $relatorio->select(new Patrimonio(),true,array('livro' => array()),array("nome_livro","COUNT(*)"),array('idlivro' => $selectLivro[$key]['idlivro']), array('COUNT(*)' => "desc"),"");

		}
		
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_livro'] = $res4[$key][0]['nome_livro'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}


		$res10 = $relatorio->select(new Patrimonio(),true,array(),array("COUNT(*)"),array(

			'patrimonio_status' => 1
		));
		
		$res11 = $relatorio->select(new Patrimonio(),true,array(),array("COUNT(*)"),array(

			'patrimonio_status' => 0
		));

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_livros_patrimonio","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6,
					'ativo' => $res10[0]['COUNT(*)'],
					'inativo' => $res11[0]['COUNT(*)']
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_livros_patrimonio","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'ativo' => $res10[0]['COUNT(*)'],
					'inativo' => $res11[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);
	}

	public function relatorioLivroEmprestimo(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectLivro = $relatorio->select(new Livro(),false);


		$res1 = $relatorio->select(new Emprestimo(), false, array('patrimonio' => array('livro' => array())),array("nome_livro", "COUNT(*)"),array(),array('count(*)' => "desc"), "nome_livro");



		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_livro'] = $res1[$key]['nome_livro'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}


		$res3 = $relatorio->select(new Emprestimo(),false,array(),array("COUNT(*)"));
		
		foreach ($selectLivro as $key => $value) {
			$res4[$key] = $relatorio->select(new Emprestimo(),true,array('patrimonio' => array('livro' => array())),array("nome_livro","COUNT(*)"),array('idlivro' => $selectLivro[$key]['idlivro']), array('COUNT(*)' => "desc"),"");

		}
		
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_livro'] = $res4[$key][0]['nome_livro'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_livros_emprestimo","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_livros_emprestimo","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);
	}

	public function relatorioLivroAno(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioAnoController();

		$selectLivro = $relatorio->select(new Livro(),false,array(),array());
		$selectMin = $relatorio->select(new Livro(), false,array(),array("min(ano_livro)"));

		$date = getDate();
		$key = 0;
		for ($i = $date['year']; $i >= $selectMin[0]['min(ano_livro)'] ; $i--) { 
			$res1[$i] = $relatorio->select(new Livro(),true,array(),array("COUNT(*)"),array(

				'ano_livro' => $i
			));
		$key++;

		} 
		$res1 = $relatorio->setQuantidade($res1);

		$res2 = $relatorio->select(new Livro(),false,array(),array('ano_livro', 'COUNT(ano_livro)'),array(),array('sum(ano_livro)' => "desc"),'ano_livro');
		
		$html = $rain->setConteudo(array("header","quantidade_livros_ano","footer"),array(

			'result' => $res1,
			'ano_livro' => $res2[0]['ano_livro'],
			'quantidade' => $res2[0]['COUNT(ano_livro)']
		));
		
		$relatorio->callMpdf($html);
	}

	public function relatorioLivroAutor(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectAutor = $relatorio->select(new Autor(),false);


		$res1 = $relatorio->select(new Livro_has_Autor(), false, array('autor' => array(), 'livro' => array()),array("nome_autor", "COUNT(*)"),array(),array('count(*)' => "desc"), "nome_autor");

		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_autor'] = $res1[$key]['nome_autor'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}

		$res3 = $relatorio->select(new Autor(),false,array(),array("COUNT(*)"));

		foreach ($selectAutor as $key => $value) {
			$res4[$key] = $relatorio->select(new Livro_has_Autor(),true,array('autor' => array(), 'livro' => array()),array("nome_autor","COUNT(*)"),array('idautor' => $selectAutor[$key]['idautor']), array('COUNT(*)' => "desc"),"");

		}
		
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_autor'] = $res4[$key][0]['nome_autor'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}

		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_livros_autor","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_livros_autor","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);
	}

	public function relatorioLivroArea(){


		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectArea = $relatorio->select(new Area(),false);


		$res1 = $relatorio->select(new Livro(), false, array('area' => array()),array("nome_area", "COUNT(*)"),array(),array('count(*)' => "desc"), "nome_area");



		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_area'] = $res1[$key]['nome_area'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}


		$res3 = $relatorio->select(new Area(),false,array(),array("COUNT(*)"));
	
		foreach ($selectArea as $key => $value) {
			$res4[$key] = $relatorio->select(new Livro(),true,array('area' => array()),array("nome_area","COUNT(*)"),array('idarea' => $selectArea[$key]['idarea']), array('COUNT(*)' => "desc"),"");

		}
		
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_area'] = $res4[$key][0]['nome_area'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}


		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_livros_area","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_livros_area","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);
	}

	public function relatorioLivroEditora(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectEditora = $relatorio->select(new Editora(),false);


		$res1 = $relatorio->select(new Livro(), false, array('editora' => array()),array("nome_editora", "COUNT(*)"),array(),array('count(*)' => "desc"), "nome_editora");



		foreach ($res1 as $key => $value) {
				
				$res2[$key]['nome_editora'] = $res1[$key]['nome_editora'];
				$res2[$key]['quantidade'] = $res1[$key]['COUNT(*)'];
			
			}


		$res3 = $relatorio->select(new Editora(),false,array(),array("COUNT(*)"));
	
		foreach ($selectEditora as $key => $value) {
			$res4[$key] = $relatorio->select(new Livro(),true,array('editora' => array()),array("nome_editora","COUNT(*)"),array('ideditora' => $selectEditora[$key]['ideditora']), array('COUNT(*)' => "desc"),"");

		}
		
		foreach ($res4 as $key => $value) {
				
				$res5[$key]['nome_editora'] = $res4[$key][0]['nome_editora'];
				$res5[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
			
			}


		foreach ($res5 as $key => $value) {
			if ($res5[$key]['quantidade'] == 0) {
				$res6[$key] = $res5[$key];

				$html = $rain->setConteudo(array("header","quantidade_livros_editora","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)'],
					'result2' => $res6
				));
		
			}
			else{

				$html = $rain->setConteudo(array("header","quantidade_livros_editora","footer"),array(

					'result' => $res2,
					'total' => $res3[0]['COUNT(*)']
				));
			}
		}
		$relatorio->callMpdf($html);
	}

	public function relatorioQtdLivros(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();
		$livro = new Livro();

		$res1 = $relatorio->select(new Livro(),false,array(),array("COUNT(*)"),array());

		$selectLivro = $relatorio->select(new Livro(),false,array('editora' => array(),'area'=> array()),array("nome_livro","nome_editora","nome_area"),array(),array('nome_livro' => "asc"));
		
		$html = $rain->setConteudo(array("header","quantidade_livros","footer"),array(

			'total' => $res1[0]['COUNT(*)'],
			'result'=> $selectLivro
			
		));
		
		$relatorio->callMpdf($html);


	}

	public function relatorio(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$rain->setConteudo(array("relatorio"));	
	}

	public function relatorioAvaliacaoLivro(){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectLivro = $relatorio->select(new Livro(),false,array(),array("nome_livro","idlivro"));
		
		foreach ($selectLivro as $key => $value) {

			$res1[$key] = $relatorio->select(new Avaliacao(),true,array('emprestimo' =>array('patrimonio' => array('livro' => array()))),array("COUNT(*)","nome_livro"),array('comentario' => "'Péssimo'",'idlivro' => $selectLivro[$key]['idlivro']));

			$res2[$key] = $relatorio->select(new Avaliacao(),true,array('emprestimo' =>array('patrimonio' => array('livro' => array()))),array("COUNT(*)","nome_livro"),array('comentario' => "'Ruim'",'idlivro' => $selectLivro[$key]['idlivro']));

			$res3[$key] = $relatorio->select(new Avaliacao(),true,array('emprestimo' =>array('patrimonio' => array('livro' => array()))),array("COUNT(*)","nome_livro"),array('comentario' => "'Regular'",'idlivro' => $selectLivro[$key]['idlivro']));

			$res4[$key] = $relatorio->select(new Avaliacao(),true,array('emprestimo' =>array('patrimonio' => array('livro' => array()))),array("COUNT(*)","nome_livro"),array('comentario' => "'Ótimo'",'idlivro' => $selectLivro[$key]['idlivro']));

			$res5[$key] = $relatorio->select(new Avaliacao(),true,array('emprestimo' =>array('patrimonio' => array('livro' => array()))),array("COUNT(*)","nome_livro"),array('comentario' => "'Excelente'",'idlivro' => $selectLivro[$key]['idlivro']));
		}

		foreach ($res1 as $key => $value) {
			
			$res_pessimo[$key]['quantidade'] = $res1[$key][0]['COUNT(*)'];
		}

		foreach ($res2 as $key => $value) {
			
			$res_ruim[$key]['quantidade'] = $res2[$key][0]['COUNT(*)'];
		}

		foreach ($res3 as $key => $value) {
			
			$res_regular[$key]['quantidade'] = $res3[$key][0]['COUNT(*)'];
		}

		foreach ($res4 as $key => $value) {
			
			$res_otimo[$key]['quantidade'] = $res4[$key][0]['COUNT(*)'];
		}

		foreach ($res5 as $key => $value) {
			
			$res_excelente[$key]['quantidade'] = $res5[$key][0]['COUNT(*)'];
		}

		foreach ($selectLivro as $key => $value) {
			unset($selectLivro[$key]['idlivro']);
			$res_livro[$key]['nome_livro'] = $selectLivro[$key]['nome_livro'];
			$res_livro[$key]['quantidade_pessimo'] = $res_pessimo[$key]['quantidade'];
			$res_livro[$key]['quantidade_ruim'] = $res_ruim[$key]['quantidade'];
			$res_livro[$key]['quantidade_regular'] = $res_regular[$key]['quantidade'];
			$res_livro[$key]['quantidade_otimo'] = $res_otimo[$key]['quantidade'];
			$res_livro[$key]['quantidade_excelente'] = $res_excelente[$key]['quantidade'];
			
		}

		foreach ($res_livro as $key => $value) {

			$res_livro[$key]['media'] = RelatorioRotas::mediaAvaliacoes($res_livro[$key]);
		}

		$html = $rain->setConteudo(array("header","quantidade_avaliacao_livro","footer"),array(

					'result' => $res_livro
					
				));
		
		$relatorio->callMpdf($html);

	}

	private static function mediaAvaliacoes($avaliacao = array()){

		$excelente = $avaliacao['quantidade_excelente']*5;
		$otimo = $avaliacao['quantidade_otimo']*4;
		$regular = $avaliacao['quantidade_regular']*3;
		$ruim = $avaliacao['quantidade_ruim']*2;
		$pessimo = $avaliacao['quantidade_pessimo']*1;

		$total = $avaliacao['quantidade_excelente'] + $avaliacao['quantidade_otimo'] + $avaliacao['quantidade_regular'] + $avaliacao['quantidade_ruim'] + $avaliacao['quantidade_pessimo'];
		
		if ($total > 0) {
			$media = ($excelente + $otimo + $regular + $ruim + $pessimo)/$total;
		}
		else{
			$media = 0;
		}
		return $media;

	}	

	public function relatorioAutorizacao2($idusuario,$idemprestimo){

		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RelatorioRainTpl($acesso);
		$relatorio = new RelatorioController();

		$selectAluno = $relatorio->select(new Aluno(),true,array('usuario' => array()),array(),array('idusuario' => $idusuario));

		if (!empty($selectAluno)) {

		$selectEmprestimo = $relatorio->select(new Emprestimo(),true,array('usuario' => array(),'patrimonio' => array('livro' => array())),array(),array('idusuario' => $idusuario, 'idemprestimo' => $idemprestimo));


		$selectTurma = $relatorio->select(new Turma_has_Aluno(),true,array('turma' => array('curso' => array()), 'aluno' => array()),array(),array('usuario_idusuario' => $idusuario));


		$data = new \DateTime($selectEmprestimo[0]['data_emprestimo'],new \DateTimeZone('America/Sao_Paulo'));

		$data->add(new \DateInterval('PT168H'));
		$devolucao =  $data->format('d/m/Y');

		$hora_emprestimo = date('d/m/Y',  strtotime($selectEmprestimo[0]['data_emprestimo']));
		
		$cpf = $relatorio->mask($selectEmprestimo[0]['cpf'],'###.###.###-##');
		$celular = $relatorio->mask($selectEmprestimo[0]['telefone_celular'],'(##) # ####-####');


		$html = $rain->setConteudo(array("header","autorizacao_emprestimo_aluno","footer"),array(

			'nome_usuario' => $selectEmprestimo[0]['nome_usuario'],
			'cpf' => $cpf,
			'telefone_celular' => $celular,
			'resultado' => $selectEmprestimo,
			'nome_curso' => $selectTurma[0]['nome_curso'],
			'data_emprestimo' => $hora_emprestimo,
			'devolucao' => $devolucao


		));
			
	
			$relatorio->callMpdf($html);
		}else{

			$selectEmprestimo = $relatorio->select(new Emprestimo(),true,array('usuario' => array(),'patrimonio' => array('livro' => array())),array(),array('idusuario' => $idusuario, "idemprestimo" => $idemprestimo));

		$selectFuncionario = $relatorio->select(new Funcionario(),true,array('cargo' => array(), 'formacao' => array()),array(),array('usuario_idusuario' => $idusuario));

		
		$data = new \DateTime($selectEmprestimo[0]['data_emprestimo'],new \DateTimeZone('America/Sao_Paulo'));

		$data->add(new \DateInterval('PT168H'));
		$devolucao =  $data->format('d/m/Y');

		$hora_emprestimo = date('d/m/Y',  strtotime($selectEmprestimo[0]['data_emprestimo']));
		
		$cpf = $relatorio->mask($selectEmprestimo[0]['cpf'],'###.###.###-##');
		$celular = $relatorio->mask($selectEmprestimo[0]['telefone_celular'],'(##) # ####-####');
		


		$html = $rain->setConteudo(array("header","autorizacao_emprestimo_funcionario","footer"),array(

			'nome_usuario' => $selectEmprestimo[0]['nome_usuario'],
			'cpf' => $cpf,
			'telefone_celular' => $celular,
			'resultado' => $selectEmprestimo,
			'nome_cargo' => $selectFuncionario[0]['nome_cargo'],
			'data_emprestimo' => $hora_emprestimo,
			'devolucao' => $devolucao


		));
			
	
		$relatorio->callMpdf($html);



		}

	}

}

 ?>