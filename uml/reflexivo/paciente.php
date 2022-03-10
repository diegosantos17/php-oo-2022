<?php

enum Idioma {
	case Portugues;
	case Ingles;
}

enum Sexo {
	case Feminino;
	case Masculino;
}

class Paciente {

	private int $idade;
	private String $nome;
	private Sexo $sexo;
	private Idioma $idioma;
	private Paciente $dependente;	

	public function __construct(Idioma $idiomaParam = Idioma::Portugues)
	{		
		$this->idioma = $idiomaParam;
	}	
	
	public function getNome():String{
		return $this->formatarSaudacao();
	}

	public function setNome(String $nomeParam){
		$this->nome = $nomeParam;
	}

	public function getDependente():Paciente{
		return $this->dependente;
	}

	public function setDependente(Paciente $dependenteParam){
		$this->dependente = $dependenteParam;
	}

	private function formatarSaudacao():String{

		$nomeFormatado = "";

		if($this->idioma == Idioma::Ingles)
		{
			$nomeFormatado = "Mr. ";	
		}
		else if($this->idioma == Idioma::Portugues)
		{
			$nomeFormatado = "Sr. ";	
		}

		$nomeFormatado = $nomeFormatado . ucwords($this->nome);

		return $nomeFormatado;
	}
}

// Só porque estamos em aula
$titular = new Paciente();
$titular->setNome("Roberto");

$dependente = new Paciente(); 
$dependente->setNome("Eduardo");

$titular->setDependente($dependente);

echo $titular->getNome() . PHP_EOL;