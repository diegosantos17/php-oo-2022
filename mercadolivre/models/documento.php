<?php

$rootDir = dirname(__DIR__);
require_once("$rootDir/enums/tipoDocumentoEnum.php");


abstract class Documento
{
	protected int $id;
	protected String $numero;	
	protected TipoDocumentoEnum $tipoDocumento;

	public function __construct(TipoDocumentoEnum $tipoDocumentoParam)
	{
		$this->tipoDocumento  = $tipoDocumentoParam;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function getTipoDocumento():TipoDocumentoEnum{
		return $this->tipoDocumento;
	}

	

	protected abstract function validarDocumento($numeroParam):bool;
}