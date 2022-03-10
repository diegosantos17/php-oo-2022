<?php

require 'exercicio.php';
require 'contato.php';

class Aluno {

	private String $nome;
	private $exercicios = array();
	private $contatos = array();

	public function __construct()
	{		
	}

	// Permite que propriedades privadas, sejam acessadas como publicas
	// São métroso mágicos
	public function __set($atrib, $value){
        $this->$atrib = $value;
    }

    public function __get($atrib){
        return $this->$atrib;
    }

	public function adicionarExercicio(Exercicio $exercicioParam){
		array_push($this->exercicios, $exercicioParam);
	}

	public function adicionarContato(TipoContato $tipoContatoParam, String $contatoParam){		
		
		// Modo 1: (Mais rápido)
		array_push($this->contatos, new Contato($tipoContatoParam, $contatoParam));

		// Modo 2: Mais extenso
		// $contato = new Contato($tipoContatoParam, $contatoParam);
		// array_push($this->contatos, $contato);

		// Modo 3: Mais extenso
		// $contato = new Contato();
		// $contato->registrarTipoContato($tipoContatoParam);
		// $contato->registrarContato($contatoParam);

		// array_push($this->contatos, $contato);
	}

}