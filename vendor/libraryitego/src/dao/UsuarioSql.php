<?php 
namespace Controller\dao;

//use Controller\dao\Sql;

/**
* 
*/
class UsuarioSql extends CrudSql
{

	protected function setData ($table){
			$values = array(
				
				':NOME' => $table->getUsuario_idusuario()->getNome_usuario(),
				':EMAIL' => $table->getUsuario_idusuario()->getEmail(),
				':CPF' => $table->getUsuario_idusuario()->getCpf(),
				':CELULAR' => $table->getUsuario_idusuario()->getTelefone_celular(),
				':FIXO'=> $table->getUsuario_idusuario()->getTelefone_fixo(),
				':DTNASC' => $table->getUsuario_idusuario()->getDtnasc(),
				':RUA' => $table->getUsuario_idusuario()->getEndereco_idendereco()->getRua(),
				':COMPLEMENTO' => $table->getUsuario_idusuario()->getEndereco_idendereco()->getComplemento(),
				':NUMERO' => $table->getUsuario_idusuario()->getEndereco_idendereco()->getNumero(),
				':BAIRRO' => $table->getUsuario_idusuario()->getEndereco_idendereco()->getBairro(),
				':CEP'=> $table->getUsuario_idusuario()->getEndereco_idendereco()->getCep(),
				':CIDADE' => $table->getUsuario_idusuario()->getEndereco_idendereco()->getCidade(),
				':ESTADO' => $table->getUsuario_idusuario()->getEndereco_idendereco()->getEstado()
				
			);
			return $values;
		}

		public function get_verify($hash){

			$q = "SELECT * from verifica inner join usuario on verifica.usuario_idusuario = usuario.idusuario where hash_verifica = :HASH;";  

			$values = array(

				':HASH' => $hash
			);

			return $this->executeSql($q,$values);
		

	}

	
	public function update_status($idusuario, $status = 1){


		$q = "UPDATE usuario set usuario_status = :STATUS where idusuario = :ID;";

		$values = array(

			':ID' => $idusuario,
			':STATUS'=> $status
		);


		return $this->executeSql($q,$values);
	}

	public function get_DeleteFuncionario($idusuario){

		$q = "DELETE from funcionario where :ID = $idusuario;";

		$values = array(

			':ID' => $idusuario
		);

		return $this->executeSql($q,$values);

	}
			
}
 
 ?>