<?php 
namespace Controller\control;

use \Controller\dao\LoginSql;
use \Controller\util\{RetornoLogin,Encripty};
	/**
	 * 
	 */
	class LoginController extends Controller
	{
		
		public function login($email = "", $senha = "")
		{
			$senha = Encripty::toEncripty($senha);
			$sql = new LoginSql();
			$res = $sql->is_exist($email, $senha);
			
			if (!empty($res)) {
				
				if ($res[0]['usuario_status'] == 1) {
					
					$passwords = $sql->getPasswords($res[0]['idusuario']);
	
				if (strcmp($senha, $passwords[0]['senha_usuario']) === 0) {
					if ($sql->is_funcionario($res[0]['idusuario'])) {
						$funcionario = $sql->selectFuncionario($res[0]['idusuario']);
						return new RetornoLogin(true, "Login executado com sucesso!",$funcionario[0]['nivel'], $res[0]['idusuario']);
					}
					else{
						return new RetornoLogin(true,"Login executado com sucesso!", '0',$res[0]['idusuario']);
					}
				}
				else{
						return new RetornoLogin(false,"Esta senha digitada foi alterada no nosso banco de dados!", null);
				}
				}else{
					if ($sql->is_funcionario($res[0]['idusuario'])) {
						$mensagem = "Este endereço de email precisa ser validado pelo Coodenador do Sistema";
					}else{
						$mensagem = "Acesse o email ".$res[0]['email']." para que seja validado!!";
					}
					return new RetornoLogin(false, $mensagem);
				}


			 } else{
			 	return new RetornoLogin(false, "Usuário e/ou senha não encotrados!!",null);

			 }
		}

		public function select3($table, $bool = false, $join = array(),$count = false, $condicao = array(), $ordem = array(), $group = ""){

			$crud = new LoginSql();
			return $crud->select3($table, $bool, $join,$count,$condicao,$ordem,$group);
		}
	}
 ?>