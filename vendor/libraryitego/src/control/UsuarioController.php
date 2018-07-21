<?php 
namespace Controller\control;
use \Controller\dao\UsuarioSql;
use \Controller\util\Retorno;
use \Controller\model\Usuario;
/**
 * 
 */
class UsuarioController extends CrudController
{
	
	public function get_verify($hash){

		$sql = new UsuarioSql();
		return $sql->get_verify($hash);

	}

	public function update_status($idusuario, $status = 1){

		$sql = new UsuarioSql();
		return $sql->update_status($idusuario,$status);

	}

	public function get_DeleteFuncionario($idusuario){

		$sql = new UsuarioSql();
		return $sql->get_DeleteFuncionario($idusuario);
	}

	public static function update($table)
	{


		
		$requireds1 = $table->getUsuario_idusuario()->getRequireds();
		$requireds2 = $table->getUsuario_idusuario()->getEndereco_idendereco()->getRequireds();

		$requireds = array_merge($requireds1,$requireds2);


		if (CrudController::isVerifyRequireds($table,$requireds) && UsuarioController::validar_cpf($table->getUsuario_idusuario()->getCpf()) != false) {
				
				return parent::update($table);
		}
		else{
			return array();
		}
	}

	public static function insert($table)
	{
	
	
		$requireds = $table->getUsuario_idusuario()->getRequireds();

		if (CrudController::isVerifyRequireds($table,$requireds) && UsuarioController::validar_cpf($table->getUsuario_idusuario()->getCpf()) != false) {


			$verificacao = UsuarioController::verificar_email_cpf($table->getUsuario_idusuario()->getEmail(),$table->getUsuario_idusuario()->getCpf());

			if ($verificacao) {


			 $res = parent::insert($table);


			 if (empty($res)) {
			 	return array();
			 }else{
			 	return $res;
			 }
				
			}else{
				
				return array();
			}
			
		}
		else{
			return array();
		}
		
	}

	private function verificar_email_cpf($email,$cpf){

		$sql = new UsuarioSql();
		$retorno = new Retorno();

		 $selectUsuarioEmail = $sql->select2(new Usuario(),true,array(),array(),array('email' => $email));
		

		 $selectUsuarioCpf = $sql->select2(new Usuario(),true,array(),array(),array('cpf' => $cpf));


		 if (!empty($selectUsuarioCpf) || !empty($selectUsuarioEmail)) {
		 
		 	return false;
		 }
		 
		 else{
		 
		 	return true;
		 }
		
	}

	private static function validar_cpf($cpf)
		{
			
			if ( ! function_exists('calc_digitos_posicoes') )  {
		function calc_digitos_posicoes( $digitos, $posicoes = 10, $soma_digitos = 0 ) {
			// Faz a soma dos digitos com a posição
			// Ex. para 10 posições: 
			//   0    2    5    4    6    2    8    8   4
			// x10   x9   x8   x7   x6   x5   x4   x3  x2
			// 	 0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
			for ( $i = 0; $i < strlen( $digitos ); $i++  ) {
				$soma_digitos = $soma_digitos + ( $digitos[$i] * $posicoes );
				$posicoes--;
			}

			// Captura o resto da divisão entre $soma_digitos dividido por 11
			// Ex.: 196 % 11 = 9
			$soma_digitos = $soma_digitos % 11;

			// Verifica se $soma_digitos é menor que 2
			if ( $soma_digitos < 2 ) {
				// $soma_digitos agora será zero
				$soma_digitos = 0;
			} else {
				// Se for maior que 2, o resultado é 11 menos $soma_digitos
				// Ex.: 11 - 9 = 2
				// Nosso dígito procurado é 2
				$soma_digitos = 11 - $soma_digitos;
			}

			// Concatena mais um digito aos primeiro nove digitos
			// Ex.: 025462884 + 2 = 0254628842
			$cpf = $digitos . $soma_digitos;
			
			// Retorna
			return $cpf;
		}
	}
	
	// Verifica se o CPF foi enviado
	if ( ! $cpf ) {
		return false;
	}

	// Remove tudo que não é número do CPF
	// Ex.: 025.462.884-23 = 02546288423
	$cpf = preg_replace( '/[^0-9]/is', '', $cpf );

	// Verifica se o CPF tem 11 caracteres
	// Ex.: 02546288423 = 11 números
	if ( strlen( $cpf ) != 11 ) {
		return false;
	}	

	// Captura os 9 primeiros dígitos do CPF
	// Ex.: 02546288423 = 025462884
	$digitos = substr($cpf, 0, 9);
	
	// Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
	$novo_cpf = calc_digitos_posicoes( $digitos );
	
	// Faz o cálculo dos 10 digitos do CPF para obter o último dígito
	$novo_cpf = calc_digitos_posicoes( $novo_cpf, 11 );
	
	// Verifica se o novo CPF gerado é identico ao CPF enviado
	if ( $novo_cpf === $cpf ) {
		// CPF válido
		return true;
	} else {
		// CPF inválido
		return false;
	}
		}

}

 ?>