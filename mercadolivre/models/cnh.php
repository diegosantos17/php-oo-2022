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
		
		$isValida = $this->validarVencimentoCnh($validadeParam);

		if($isValida){
			$this->validade = $validadeParam;
		} else 
		{
			throw new Exception("CNH não pode estar vencida");
		}
	}

	private function validarVencimentoCnh($validadeParam):bool
	{
		//TODO: Validar se a CNH está vencida
		return true;
	}
}