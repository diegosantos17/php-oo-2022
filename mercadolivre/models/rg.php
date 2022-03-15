<?php

class Rg extends Documento {
	private String $validade;
	private String $orgaoExpedidor;

	public function __construct()
	{
		parent::__construct(TipoDocumentoEnum::Rg);
		$this->id = 0;
	}

	public function setNumero(String $numeroParam){
		$this->numero = $numeroParam;
	}

	private function validarRg()
	{
		if(!isset($this->orgaoExpedidor))
		{
			throw new Exception("Orgão expedidor é obrigatório");
		}
	}

}