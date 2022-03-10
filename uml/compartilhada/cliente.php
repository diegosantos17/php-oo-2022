<?php


class Cliente
{

	// Propriedades
	private String $nome;
	private String $sobrenome;
	private String $documento;
	private int $scoreSerasa;
	private $carros = array();


	public function __construct(String $nomeParam = "", String $sobrenomeParam = "", int $scoreSerasaParam = 0)
	{
		$this->nome = $nomeParam;
		$this->sobrenome = $sobrenomeParam;
		$this->scoreSerasa = $scoreSerasaParam;
	}

	// getter
	public function obterScoreSerasa()
	{
		return $this->scoreSerasa;
	}

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

	public function obterNomeCompleto()
	{
		return ucwords("$this->nome $this->sobrenome");
		//return "$this->nome $this->sobrenome";
	}


	public function obterNomeAbreviado()
	{

		// Regra: Diego Santos Rodrigues = Diego S Rodrigues
		return "";
	}


	public function obterCarrosAlugados()
	{
		return $this->carros;
	}

	// getter
	public function obterDocumento()
	{
		return $this->documento;
	}

	//setter
	public function registrarDocumento($documentoParam)
	{

		$isValidoCpf = $this->validaCPF($documentoParam);

		if ($isValidoCpf) {
			$this->documento = $documentoParam;
		}
	}

	private function validaCPF($cpf)
	{

		// Extrai somente os números
		$cpf = preg_replace('/[^0-9]/is', '', $cpf);

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

	public function obterTaxa()
	{
		$taxa = 0;

		switch ($this->scoreSerasa) {
			case 100:
				$taxa = 25;
				break;
			case 300:
				$taxa = 22;
				break;
			case 500:
				$taxa = 15;
				break;
			default:
				$taxa = 30;
				break;
		}

		return $taxa;
	}
}
