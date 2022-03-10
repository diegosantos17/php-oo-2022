<?php


require 'enums/tipoContato.php';

class Contato {	
	private $tipoContato;
	private $contato;

	public function __construct(TipoContato $tipoContato = TipoContato::Telefone, String $contato = "")
	{
		$this->tipoContato = $tipoContato;
		$this->contato = $contato;
	}

	public function obterContato(){
		$this->contato;
	}

	public function registrarContato(String $contato){
		$this->contato = $contato;
	}

	public function obterTipoContato(){
		$this->tipoContato;
	}

	public function registrarTipoContato(TipoContato $tipoContato){
		$this->tipoContato = $tipoContato;
	}
}