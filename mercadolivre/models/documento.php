<?php

$rootDir = dirname(__DIR__);
require_once("$rootDir/enums/tipoDocumento.php");


abstract class Documento
{
	protected int $id;
	protected String $numero;	
	protected TipoDocumento $tipoDocumento;

	public function __construct(TipoDocumento $tipoDocumentoParam)
	{
		$this->tipoDocumento  = $tipoDocumentoParam;
	}

}
