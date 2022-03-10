<?php


require 'cliente.php';

class Carro {

	// Propriedades
	private String $nome;
	private int $anoFabricacao;
	private int $anoModelo;
	private $clientes = array();

	public function __construct()
	{
		
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

	public function obterLocatarios(){
		return $this->clientes;
	}
}