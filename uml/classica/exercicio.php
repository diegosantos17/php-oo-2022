<?php


require 'enums/tipoExercicio.php';

class Exercicio {	
	private $tipoExercicio;
	private $descricao;

	public function __construct(TipoExercicio $tipoExercicio)
	{
		$this->tipoExercicio = $tipoExercicio;
	}
}