<?php

class Fabricante
{

	// Propriedades
	private $nome;


	// getter
	public function obterNome()
	{
		return $this->nome;
	}

	//setter
	public function registrarNome($nomeParam)
	{
		$this->nome = $nomeParam;
	}
}
