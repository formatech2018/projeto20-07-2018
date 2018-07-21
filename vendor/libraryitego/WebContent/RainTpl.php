<?php 
namespace ViewController;
use Rain\Tpl;
	/**
	* 
	*/
class RainTpl extends Tpl
{
	
	protected $tpl;
	private $caminho = "vendor/libraryitego/WebContent/view";

	protected $config = array(
		"tpl_dir" => "vendor/libraryitego/WebContent/view/",
		"cache_dir" => "vendor/libraryitego/WebContent/cache/"
	);
	protected $menu_visitante = array(
		"menu" => array(
				 array(
				 	"item" => "Conta", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastre-se", "sublink" => "/crud/usuario/insert"),
						array("subitem" => "Entrar" , "sublink" => "/login" ),
					)
				 )

		)
	);

	protected $menu_usr = array(
		"menu" => array(
				 array(
					"item" => "Listar Livros ", "link" => "/crud/livro/usuario/0/10/read", "dropdown" => "", "toggle" => "", "selected" => false
				),
				 array(
					"item" => "Empréstimos Realizados", "link" => "/usuario/emprestimo", "dropdown" => "", "toggle" => "", "selected" => false
				),
				  array(
				 	"item" => "Conta", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Editar", "sublink" => "/update"),
						array("subitem" => "Desativar" , "sublink" => "/crud/usuario/conta/disabled" ),
						array("subitem" => "Logout" , "sublink" => "/logout" ),
						array("subitem" => "Alterar Senha" , "sublink" => "/crud/alter/usuario/senha" ),
						array("subitem" => "Emitir Carteirinha" , "sublink" => "/carteirinha/usuario" )
					)
				 )
		)
	);
	
	protected $menu_btc = array(
		"menu" => array(
				 array(
				 	"item" => "Empréstimo", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
				 	"submenu" => array(
						array("subitem" => "Valor Diário da Multa", "sublink" => "/crud/multa/valor/insert"),
						array("subitem" => "Realizar Empréstimo", "sublink" => "/crud/emprestimo/usuario/search"),
						array("subitem" => "Encerrar Empréstimo", "sublink" => "/crud/emprestimo/usuario/disabled/search"),
						array("subitem" => "Pesquisar Empréstimo", "sublink" => "/crud/emprestimo/autorizacao/usuario/search")
					)
					
				 ),
				 array(
				 	"item" => "Relatórios", "link" => "/relatorios", "dropdown" => "", "toggle" => "", "selected" => false
					
				 ),
				  array(
				 	"item" => "Funcionário", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Cargo", "sublink" => "/crud/funcionario/cargo/insert"),
						array("subitem" => "Listar Cargos", "sublink" => "/crud/funcionario/cargo/0/10/read"),
						array("subitem" => "Cadastrar Formação", "sublink" => "/crud/funcionario/formacao/insert"),
						array("subitem" => "Listar Formações", "sublink" => "/crud/funcionario/formacao/0/10/read")
						
					)
				),
				  array(
				 	"item" => "Livro", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Livro", "sublink" => "/crud/livro/insert"),
						array("subitem" => "Listar Livros", "sublink" => "/crud/livro/0/10/read"),
						array("subitem" => "Cadastrar Patrimônio", "sublink" => "/crud/livro/search"),
						array("subitem" => "Listar Patrimônios", "sublink" => "/crud/livro/patrimonio/0/10/read")
					)
				 ),
				  array(
				 	"item" => "Editora", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Editora" , "sublink" => "/crud/livro/editora/insert" ),
						array("subitem" => "Listar Editoras", "sublink" => "/crud/livro/editora/0/10/read")
						
					)
				 ),
				  array(
				 	"item" => "Área", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Área" , "sublink" => "/crud/livro/area/insert" ),
						array("subitem" => "Listar Áreas", "sublink" => "/crud/livro/area/0/10/read")
						
					)
				 ),
				  array(
				 	"item" => "Autor", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Autor" , "sublink" => "/crud/livro/autor/insert" ),
						array("subitem" => "Listar Autores", "sublink" => "/crud/livro/autor/0/10/read")
					)
				 ),
				  array(
				 	"item" => "Curso", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Curso", "sublink" => "/crud/curso/insert"),
						array("subitem" => "Listar Cursos", "sublink" => "/crud/curso/0/10/read"),
						array("subitem" => "Cadastrar Tipo de Curso" , "sublink" => "/crud/curso/tipo/insert" ),
						array("subitem" => "Listar Tipos de Curso", "sublink" => "/crud/curso/tipo/0/10/read")

					)
				 ),
				  array(
				  	"item" => "Turma", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
				  	"submenu" => array(
				  		array("subitem" => "Cadastrar Turma", "sublink" => "/crud/curso/search"),
				  		array("subitem" => "Listar Turmas", "sublink" => "/crud/curso/turmas/0/10/read"),
				  		array("subitem" => "Cadastrar Turnos" , "sublink" => "/crud/turma/turno/insert"),
				  		array("subitem" => "Listar Turnos" , "sublink" => "/crud/turma/turno/0/10/read")
				  	)
				  ),
				  array(
				  	"item" => "Matrícula", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
				  	"submenu" => array(
						array("subitem" => "Cadastrar Matrícula" , "sublink" => "/crud/turma/matricula/insert"),
				  		array("subitem" => "Listar Matrículas" , "sublink" => "/crud/matricula/0/10/read")
				  	)
				  ),

				  array(
				  	"item" => "Conta", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
				  	"submenu" => array(
						array("subitem" => "Editar", "sublink" => "/update"),
						array("subitem" => "Desativar" , "sublink" => "/crud/usuario/conta/disabled"),
						array("subitem" => "Logout" , "sublink" => "/logout" ),
						array("subitem" => "Alterar Senha" , "sublink" => "/crud/alter/usuario/senha" )
				  	)
				  ),
				 
				  

		)
	);

		protected $menu_adm = array(
		"menu" => array(
				 array(
				 	"item" => "Empréstimo", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
				 	"submenu" => array(
						array("subitem" => "Valor Diário da Multa", "sublink" => "/crud/multa/valor/insert"),
						array("subitem" => "Realizar Empréstimo", "sublink" => "/crud/emprestimo/usuario/search"),
						array("subitem" => "Encerrar Empréstimo", "sublink" => "/crud/emprestimo/usuario/disabled/search"),
						array("subitem" => "Pesquisar Empréstimo", "sublink" => "/crud/emprestimo/autorizacao/usuario/search")
						
					)
					
				 ),
				 array(
				 	"item" => "Relatórios", "link" => "/relatorios", "dropdown" => "", "toggle" => "", "selected" => false
					
				 ),
				  array(
				 	"item" => "Funcionário", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Cargo", "sublink" => "/crud/funcionario/cargo/insert"),
						array("subitem" => "Listar Cargos", "sublink" => "/crud/funcionario/cargo/0/10/read"),
						array("subitem" => "Cadastrar Formação", "sublink" => "/crud/funcionario/formacao/insert"),
						array("subitem" => "Listar Formações", "sublink" => "/crud/funcionario/formacao/0/10/read"),
						array("subitem" => "Validar Funcionário", "sublink" => "/valida/funcionario"),
						array("subitem" => "Nível de Acesso" , "sublink" => "/crud/cargo/nivel/read" )
						
					)
				),
				  array(
				 	"item" => "Livro", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Livro", "sublink" => "/crud/livro/insert"),
						array("subitem" => "Listar Livros", "sublink" => "/crud/livro/0/10/read"),
						array("subitem" => "Cadastrar Patrimônio", "sublink" => "/crud/livro/search"),
						array("subitem" => "Listar Patrimônios", "sublink" => "/crud/livro/patrimonio/0/10/read")
					)
				 ),
				  array(
				 	"item" => "Editora", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Editora" , "sublink" => "/crud/livro/editora/insert" ),
						array("subitem" => "Listar Editoras", "sublink" => "/crud/livro/editora/0/10/read")
						
					)
				 ),
				  array(
				 	"item" => "Área", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Área" , "sublink" => "/crud/livro/area/insert" ),
						array("subitem" => "Listar Áreas", "sublink" => "/crud/livro/area/0/10/read")
						
					)
				 ),
				  array(
				 	"item" => "Autor", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Autor" , "sublink" => "/crud/livro/autor/insert" ),
						array("subitem" => "Listar Autores", "sublink" => "/crud/livro/autor/0/10/read")
					)
				 ),
				  array(
				 	"item" => "Curso", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
					"submenu" => array(
						array("subitem" => "Cadastrar Curso", "sublink" => "/crud/curso/insert"),
						array("subitem" => "Listar Cursos", "sublink" => "/crud/curso/0/10/read"),
						array("subitem" => "Cadastrar Tipo de Curso" , "sublink" => "/crud/curso/tipo/insert" ),
						array("subitem" => "Listar Tipos de Curso", "sublink" => "/crud/curso/tipo/0/10/read")

					)
				 ),
				  array(
				  	"item" => "Turma", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
				  	"submenu" => array(
				  		array("subitem" => "Cadastrar Turma", "sublink" => "/crud/curso/search"),
				  		array("subitem" => "Listar Turmas", "sublink" => "/crud/curso/turmas/0/10/read"),
				  		array("subitem" => "Cadastrar Turnos" , "sublink" => "/crud/turma/turno/insert"),
				  		array("subitem" => "Listar Turnos" , "sublink" => "/crud/turma/turno/0/10/read")
				  	)
				  ),
				  array(
				  	"item" => "Matrícula", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
				  	"submenu" => array(
						array("subitem" => "Cadastrar Matrícula" , "sublink" => "/crud/turma/matricula/insert"),
				  		array("subitem" => "Listar Matrículas" , "sublink" => "/crud/matricula/0/10/read")
				  	)
				  ),
				  array(
				  	"item" => "Conta", "link" => "/#", "dropdown" => "dropdown", "toggle" => "dropdown-toggle", "selected" => true,
				  	"submenu" => array(
						array("subitem" => "Editar", "sublink" => "/update"),
						array("subitem" => "Desativar" , "sublink" => "/crud/usuario/conta/disabled" ),
						array("subitem" => "Logout" , "sublink" => "/logout" ),
						array("subitem" => "Alterar Senha" , "sublink" => "/crud/alter/usuario/senha" )
				  	)
				  ),

		)
	);

	public function getMenu($usuario = "")
	{

		switch ($usuario) {
			case "":
				$this->setData($this->menu_visitante);
				break;
			case '0':
				$this->setData($this->menu_usr);

				break;
			case '1':
				$this->setData($this->menu_btc);
				break;
			case '2':
				$this->setData($this->menu_adm);
				break;
			default:
				$this->setData($this->menu_visitante);
				break;
		}
	}

	function __construct($usuario = "visitante")
	{
		$this->tpl = new Tpl();
		$this->tpl->configure($this->config);
		
		$this->getMenu($usuario);
		$this->setTpl(array("head", "header","scripts"));
		
		
	}
	protected function setTpl($template = array()){
		foreach ($template as $key => $value) {
			$this->tpl->draw($value);

		}
	}
	public function setData($dados = array()){

		foreach ($dados as $key => $value) {
			$this->tpl->assign($key, $value);
		}		
	}
	public function setDataSelect($dados = array())
	{
		foreach ($dados as $key => $value) {
			$this->setData($key, $value);
		}
	}
	public function setConteudo($value = array(), $data = array())
	{
		$this->setData($data);
		$this->setTpl($value);
	}
	public function setTable($dados = array(), $table)
	{
		foreach ($dados as $key => $value) {
			$method = "set".ucfirst($key);
			if (method_exists($table, $method)) {
				$table->{$method}($value);
			}
		}
		return $table;
	}
	public function getPagination($value = array(),$inicio,$limite,$totalLivro)
	{
		$totalpag = round(($totalLivro / $limite));
	
		if ($inicio == 0) {
			$numero1 = 0;
			$numero2 = 1;
			$numero3 = 2;
		}
		else{
			$numero1 = (int)($inicio -$limite)/$limite;
			$numero2 = (int)($inicio )/$limite;
			$numero3 = (int)($inicio + $limite)/$limite;
		}
				$pages = array(array(
			'numero1' => (int) $numero1 + 1,
			'numero2' => (int) $numero2 + 1,
			'numero3' => (int) $numero3 + 1,
			'pag1' =>  (int) $numero1 *$limite,
			'pag2' =>  (int) $numero2 *$limite,
			'pag3' =>  (int) $numero3 *$limite,
			'ultima' => (int)($limite * $totalpag) - $limite,
			'limite' => $limite,
			'totalpag' => $totalpag
		));
		
		return $pages;
	}
	
	function __destruct(){

		$this->setTpl(array("footer"));
	
	}
	
	
}


 ?>