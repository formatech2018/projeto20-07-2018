<?php
namespace Controller\dao;

use \PDO;
/**
CREATE TABLE usuario( idusuario int AUTO_INCREMENT not null primary key, 
nome text not null, 
email text not null, 
senha text not null )
*/
class Sql extends PDO{
//class Sql {	
	private $conn;
	private $host = "localhost";
	private $dbname = "libraryitego";
	private $user = "root";
	private $senha = "";

	function __construct(){
		$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}

	private function setParams($statment, $parameters = array()){
		foreach ($parameters as $key => $value) {
			$this->setParam($statment, $key, $value);
		}
	}
	
	private function setParam($statment, $key, $value){
		$statment->bindParam($key, $value);
	}

	public function query($rawQuery, $paramms = array()){
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $paramms);
		
		$stmt->execute();
		
		return $stmt;
	}
	public function executeSql($rawQuery, $paramms = array()){
		
		$res = $this->query($rawQuery, $paramms);
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}
	public function read($table,$busca = array('inicio' => 0, 'limite' => 10, 'ordem' => ''), $join = array(), $where = array())
	{
		$q = " SELECT * FROM ".$table->getTableName();
		if (!empty($join)) {
			$q .= $this->setJoin($table, $join);
		}
		if (!empty($where)) {
			$q .= " where ".$where['name']." = ".$where['id'];
		}
		if (!empty($busca['ordem'])) {
			$q .= " order by ".$busca['ordem']." asc "; 
		}
		
		$q .= "  LIMIT ".$busca['inicio']." , ".(int) $busca['limite']. ";";
		

		$q2 = " SELECT COUNT(*) FROM ".$table->getTableName();
		if (!empty($where)) {
			$q2 .= " where ".$where['name']." = ".$where['id'];
		}
		 $values = array();
		 $resultado = array($this->executeSql($q, $values), $this->executeSql($q2, $values));
		
		 return $resultado;
	}
	private function setJoin($table, $join = array())
	{
		$q = "";
		foreach ($join as $key => $value) {
			$q .= " inner join ". $value->getTableName(). " on ". $table->getTableName().".". $value->getTableName()."_". $value->getTableKeyName()." = ". $value->getTableName().".". $value->getTableKeyName();
		}
		
		return $q;
	}

		

}
?>
