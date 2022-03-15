<?php

$rootDir = dirname(__DIR__);
require_once("$rootDir/enums/sexoEnum.php");

trait SexoTrait {

	public static function getSexos(){
		$sexos = array();

		array_push($sexos, array("id"=> SexoEnum::Masculino->value, "text"=> "Masculino" ));
		array_push($sexos, array("id"=> SexoEnum::Feminino->value, "text"=> "Feminíno" ));

		return $sexos; 
	}
}