<?php

class Calculadora {

	public $marca;
	public $cor;
	public $tipo; // comum, cientifíca
	private $resultado = 0;

	public function somar($numero1, $numero2){
		$this->resultado = $numero1 + $numero2;		
	}

	public function obterResultado(){
		return $this->resultado;
	}

	public function exibirResultado(){
		echo "$this->marca: resultado é $this->resultado" . PHP_EOL;
	}

	public function limpar(){
		$this->resultado = 0;
	}
}