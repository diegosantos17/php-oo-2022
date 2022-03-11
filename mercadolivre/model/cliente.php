<?php

require_once 'documento.php';
require_once '../enums/sexo.php';

class Cliente
{
	private String $nomeCompleto;
	private Sexo $sexo;
	private $documentos = array();

	public function __construct(String $nomeParam, Sexo $sexoParam)
	{
		$this->nome = $nomeParam;
		$this->sexo = $sexoParam;
	}

	public function getNomeCompleto():String{
		return $this->nomeCompleto;
	}

	public function addDocumento(Documento $documentoParam){
		array_push($this->documentos, $documentoParam);
	}
}
