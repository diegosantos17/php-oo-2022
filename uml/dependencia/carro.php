<?php

require 'fabricante.php';

class Carro {

	// Propriedades
	private String $nome;
	private int $anoFabricacao;
	private int $anoModelo;

	private Fabricante $fabricante;

	public function __construct(Fabricante $fabricanteParam)
	{
		$this->fabricante = $fabricanteParam;
	}

	// getter
	public function obterNome(){
		// Regra: Todo nome deve ser maisculo
		return $this->nome;
	}

	//setter
	public function registrarNome($nomeParam){

		/*Regras: 
			1. O nome não pode ser vazio
			2. O nome deve conter no mínimo 1 letras
		*/ 
		$this->nome = $nomeParam;
	}


	// getter
	public function obterFabricante(){		
		return $this->fabricante;
	}
}