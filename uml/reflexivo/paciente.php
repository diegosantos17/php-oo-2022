<?php

class Paciente {

	private String $nome;
	private Paciente $dependente;

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
}