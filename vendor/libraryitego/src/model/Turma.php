<?php 
namespace Controller\model;
use Controller\model\{Table, Curso, Turno};
/**
 * 
 */
class Turma extends Table
{
	
	function __construct()
	{
		$this->curso_idcurso = new Curso();
		$this->turno_idturno = new Turno();
	}
	
		/**
		* @column(nome=idturma,required=false)
		*/
		private $idturma;
		/**
		* @column(nome=data_inicio,required=true)
		*/
		private $data_inicio;
		/**
		* @column(nome=data_termino,required=true)
		*/
		private $data_termino;
		/**
		* @column(nome=idcurso,required=true)
		*/
		private $curso_idcurso;
		/**
		* @column(nome=idturno,required=true)
		*/
		private $turno_idturno;

		public function getObject()
		{
			return get_object_vars($this);
		}

		public function getIdturma(){
			return $this->idturma;
		}
		public function getData_inicio(){
			return $this->data_inicio;
		}
		public function getData_termino(){
			return $this->data_termino;
		}
		public function getCurso_idcurso(): Curso{
			return $this->curso_idcurso;
		}
		public function getTurno_idturno(): Turno{
			return $this->turno_idturno;
		}

		public function setIdturma($idturma){
			$this->idturma = $idturma;
		}
		public function setData_inicio($data_inicio){
			$this->data_inicio = $data_inicio;
		}
		public function setData_termino($data_termino){
			$this->data_termino = $data_termino;
		}
		public function setCurso_idcurso(Curso $curso_idcurso){
			$this->curso_idcurso = $curso_idcurso;
		}
		public function setTurno_idturno(Turno $turno_idturno){
			$this->turno_idturno = $turno_idturno;
		}
		
	}


 ?>