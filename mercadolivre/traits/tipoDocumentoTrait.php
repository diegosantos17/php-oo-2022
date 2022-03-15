<?php

$rootDir = dirname(__DIR__);
require_once("$rootDir/enums/tipoDocumentoEnum.php");

trait TipoDocumentoTrait {

	public static function getTiposDocumento(){
		$tipoDocumento = array();

		array_push($tipoDocumento, array("id"=> TipoDocumentoEnum::Cpf->value, "text"=> "CPF" ));
		array_push($tipoDocumento, array("id"=> TipoDocumentoEnum::Rg->value, "text"=> "RG" ));
		array_push($tipoDocumento, array("id"=> TipoDocumentoEnum::Cnh->value, "text"=> "CNH" ));

		return $tipoDocumento; 
	}
}