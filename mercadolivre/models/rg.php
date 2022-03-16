<?php

class Rg extends Documento {
	private String $validade;
	private String $orgaoExpedidor;

	public function __construct(String $validadeParam, String $orgaoExpedidorParam)
	{
		parent::__construct(TipoDocumentoEnum::Rg);
		$this->id = 0;
		$this->validade = $validadeParam;
		$this->orgaoExpedidor = $orgaoExpedidorParam;
	}

	public function setNumero(String $numeroParam){
		$this->numero = $numeroParam;
		
	}

	protected function validarDocumento($numeroParam):bool
	{
		// if(!isset($this->orgaoExpedidor))
		// {
		// 	throw new Exception("Orgão expedidor é obrigatório");
		// }
		return true;			
	}

	public function getValidade(){
		return $this->validade;
	}

	public function getOrgaoExpedidor(){
		return $this->orgaoExpedidor;
	}

}