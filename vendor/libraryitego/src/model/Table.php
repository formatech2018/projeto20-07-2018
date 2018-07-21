<?php 
namespace Controller\model;

use \Controller\interfaces\ITable;
/**
* 
*/
abstract class Table implements ITable
{
		function __toString(){
			return json_encode($this->getObject());
		}
	// Retorna o nome da tabela
	public function getTableName(){
		 $table = get_class($this);
		return strtolower(substr($table, strripos($table, "\\")+1));
	}
	public function getPK()
		{	
			return $this->{"get". ucfirst($this->getTableKeyName())}();
		}
	// Retorna o ID da tabela
	public function getTableKeyName()
	{
		return "id".$this->getTableName();
	}
	public function getTableColumnsNamesOutKey()
	{
		$obj = $this->getObject();
		$nameColumns = $this->returnKeysArray($obj);
		return implode(",", $nameColumns);//Retornando uma lista de colunas separadas por vígula
	}
	public function returnKeysArray($array = array())
	{
		$ret = array();
		foreach ($array as $key => $value) {
			array_push($ret, $key);
		}
		return $ret;
	}
	public function getColumnNames()
		{
			$nameColumns = $this->getColumnsArray();
			return implode(",", $nameColumns);//Retornando uma lista de colunas separadas por vígula
		}
	public function getColumnsArray()
		{
			$obj = $this->getObject();
			return $this->getColums($obj);
		}
	public function getColums($obj)
		{
			$nameColumns = array();
			foreach ($obj as $key => $value) {
				array_push($nameColumns, $key);
			}
			return $nameColumns;
		}
	public function getRequireds(){
		$ret = array();

		$colunas = $this->getColumnsArray();
		$class = "\Controller\model\\".ucfirst($this->getTableName());
		$rc = new \ReflectionClass($class);
			
			foreach ($colunas as $key => $value) {
				
				$atr = new \ReflectionProperty($class,$value);
				$comment = $atr->getDocComment();
				$res = $this->getCommentsCollumn($comment);
				$ret[$res['nome']] = $res['required'];
			}

		return $ret;
	}

	private function getCommentsCollumn($coments){

		$ret = array();
		$coments = substr($coments, strpos($coments, "(")+1);
		$coments = substr($coments,0, strpos($coments, ")"));

		$coments = explode(",", $coments);

		foreach ($coments as $key => $value) {
			$ret[substr($value, 0, strpos($value, "="))] = substr($value, strpos($value, "=")+1);
		}

		return $ret;
	}
	
	/*
	//Retorna todas as colunas do Objeto
		public function getColumnNames()
		{
			$nameColumns = $this->getColumnsArray();
			return implode(",", $nameColumns);//Retornando uma lista de colunas separadas por vígula
		}
		public function getColumnNamesNotNull(){
			$obj = $this->getObject();
			$obj = $this->OutNullArray($obj);
			return implode(",", $this->getColums($obj));
		}
		// Retorna todas as colunas do Objeto exceto ID
		public function getColumnNamesOutKey()
		{
			$nameColumns = $this->getColumnsArray();
			$key = array_search($this->getTableKeyName(), $nameColumns);// Buscando a chave do ID
			unset($nameColumns[$key]); // Excluindo o ID do array

			return implode(",", $nameColumns);// Retornando uma lista de colunas separadas por vígula sem o ID		
		}
		public function getColumnsArray()
		{
			$obj = $this->getObject();
			return $this->getColums($obj);
		}
		//Retorna todos os atributos em um array inclusive os nulos
		public function getToArrayValues()
		{
			$obj = 	$this->getObject();
			$arrayValues = array();
			foreach ($obj as $key => $value) {
				$arrayValues[":".strtoupper($key)] = $value;
			}
			return $arrayValues;
		}
		//Retorna todos os atributos em um array exceto os nulos
		public function getToArrayValuesNotNull()
		{
			$arrayValues = $this->getToArrayValues();
			$arrayValues = $this->OutNullArray($arrayValues);
			return $arrayValues;
		}
		public function getToArrayKeyValues()
		{
			$array = $this->getToArrayValues();
			$arrayValues = array();
			foreach ($array as $key => $value) {
				array_push($arrayValues, $key);
			}
			return implode(",", $arrayValues);
		}
		public function getToArrayKeyValuesNotNull()
		{
			$array = $this->getToArrayValuesNotNull();
			$arrayValues = array();
			foreach ($array as $key => $value) {
				array_push($arrayValues, $key);
			}
			return implode(",", $arrayValues);
		}
		public function OutNullArray($arrayValues)
		{
			$keys = array_keys($arrayValues, "");
			foreach ($keys as $key => $value) {
				unset($arrayValues[$value]);
			}
			return $arrayValues;
		}
		public function getColums($obj)
		{
			$nameColumns = array();
			foreach ($obj as $key => $value) {
				array_push($nameColumns, $key);
			}
			return $nameColumns;
		}
		public function getUpdateSetValuesNotNull($table)
		{
			$obj = $this->OutNullArray($this->getObject());
			unset($obj[$table->getTableKeyName()]); // Excluindo o ID do array
			$newObj = array();
			foreach ($obj as $key => $value) {
				$newObj[$key] = $key . "=:".strtoupper($key);
			}
			return implode(",", $newObj);
		}
		public function getToArrayUpdateValuesNotNull($table){
			$obj = $this->OutNullArray($this->getObject());
			unset($obj[$table->getTableKeyName()]); // Excluindo o ID do array
			$newObj = array();
			foreach ($obj as $key => $value) {
				$newObj[":".strtoupper($key)] = $value;
			}
			return $newObj;
		}
	*/	
}

 ?>