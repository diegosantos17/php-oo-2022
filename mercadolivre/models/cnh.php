<?php

class Cnh extends Documento {
	private String $validade;

	public function __construct()
	{
		parent::__construct(TipoDocumentoEnum::Rg);
	}

	public function setNumero(String $numeroParam){
		$this->numero = $numeroParam;
	}

	public function setValidade(String $validadeParam){
		
		$isValida = $this->validarDocumento($validadeParam);

		if($isValida){
			$this->validade = $validadeParam;
		} else 
		{
			throw new Exception("CNH não pode estar vencida");
		}
	}

	protected function validarDocumento($validadeParam):bool
	{
		//TODO: Validar se a CNH está vencida
		return true;
	}
}