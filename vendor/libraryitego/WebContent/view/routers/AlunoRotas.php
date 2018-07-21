<?php 
namespace ViewController\view\routers;

/*require_once ($_SERVER["DOCUMENT_ROOT"].'/vendor/libraryitego/WebContent/view/routers/config/Config.php');*/
use \ViewController\RainTpl;
	use \ViewController\SuperAdmin;
	use \Controller\model\{Usuario, Endereco, Senha, Formacao, Cargo, Area, Editora, Livro, Autor, Livro_has_Autor, Tipo, Curso, Turma_has_Aluno, Aluno, Patrimonio, Valor, Emprestimo, Avaliacao, Funcionario,Turma, Turno};
	use \Controller\control\{Controller, CrudController,SenhaController, AreaController, EditoraController, LivroController,AutorController, LivroHasAutorController, TipoController, CursoController, TurmaHasAlunoController, AlunoController, CargoController, FormacaoController, PatrimonioController, ValorController, EmprestimoController, AvaliacaoController, FuncionarioController, TurmaController, TurnoController};
	use \Controller\util\Convert;
	
/**
 * @get_update=usr
 */
class AlunoRotas 
{
	
	public function get_update($idaluno)
	{
		
		$acesso = Controller::getAcesso($_SESSION);
		$rain = new RainTpl($acesso);
		$crud = new AlunoController();
		$aluno = new Aluno();
		$endereco = new Endereco();
		$aluno->setIdaluno($idaluno);
		$res = $crud->select($aluno, true);
		if (!empty($res)) {
					$alun = $crud->select($aluno, true, array($aluno->getUsuario_idusuario()));
		$endereco->setIdendereco($alun[0]['endereco_idendereco']);
		$end = $crud->select($endereco, true);
		$endereco = $rain->setTable($end[0], $endereco);
		

		$arrayobj = array(
		
		'endereco_idendereco' => $endereco	
			
		);
		$result = array_merge($alun[0], $arrayobj);
		$aluno->setUsuario_idusuario($rain->setTable($result, $aluno->getUsuario_idusuario()));

		

		$rain->setConteudo(array("edit_cadastro_aluno", "scripts_cadastro_usuario"),
			array(
				'idaluno' => $aluno->getIdaluno(),
				'idusuario' => $aluno->getUsuario_idusuario()->getIdusuario(),
				'nome_usuario' => $aluno->getUsuario_idusuario()->getNome_usuario(),
				'cpf' => $aluno->getUsuario_idusuario()->getCpf(),
				'email' => $aluno->getUsuario_idusuario()->getEmail(),
				'telefone_fixo' => $aluno->getUsuario_idusuario()->getTelefone_fixo(),
				'telefone_celular' => $aluno->getUsuario_idusuario()->getTelefone_celular(),
				'dtnasc' => Convert::date_to_string($aluno->getUsuario_idusuario()->getDtnasc()),
				'idendereco' => $aluno->getUsuario_idusuario()->getEndereco_idendereco()->getIdendereco(),
				'rua' => $aluno->getUsuario_idusuario()->getEndereco_idendereco()->getRua(),
				'complemento' => $aluno->getUsuario_idusuario()->getEndereco_idendereco()->getComplemento(),
				'numero' => $aluno->getUsuario_idusuario()->getEndereco_idendereco()->getNumero(),
				'bairro' =>$aluno->getUsuario_idusuario()->getEndereco_idendereco()->getBairro(),
				'cep' => $aluno->getUsuario_idusuario()->getEndereco_idendereco()->getCep(),
				'cidade' => $aluno->getUsuario_idusuario()->getEndereco_idendereco()->getCidade(),
				'estado' => $aluno->getUsuario_idusuario()->getEndereco_idendereco()->getEstado(),

				'action' => 'update',
				'title' => 'Editar'
			)
		);	
		}else{
			$rain->setConteudo(array("mensagem", "index"), array(

				'mensagem' => "Não foi possível mostrar seus dados!",
				'resulado' => "danger"


			));
		}
	}
}

 ?>