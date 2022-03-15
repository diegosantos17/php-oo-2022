<?php

class Cpf extends Documento {

	public function __construct()
	{
		parent::__construct(TipoDocumento::Cpf);
	}

	public function setNumero(String $numeroParam){
		$isValid = $this->validarCpf($numeroParam);

		if($isValid){
			$this->numero = $numeroParam;
		} else {
			throw new Exception("CPF inválido");
		}
	}

	private function validarCpf($numeroParam)
	{
		// Extrai somente os números
		$cpf = preg_replace('/[^0-9]/is', '', $numeroParam);

		// Verifica se foi informado todos os digitos corretamente
		if (strlen($cpf) != 11) {
			return false;
		}

		// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
		if (preg_match('/(\d)\1{10}/', $cpf)) {
			return false;
		}

		// Faz o calculo para validar o CPF
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return false;
			}
		}
		return true;
	}

}