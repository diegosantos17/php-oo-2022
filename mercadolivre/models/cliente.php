<?php

$rootDir = dirname(__DIR__);
require_once("$rootDir/models/documento.php");
require_once("$rootDir/repository/clienteRepository.php");
require_once("$rootDir/enums/sexoEnum.php");
require_once("$rootDir/traits/sexoTrait.php");
require_once("$rootDir/traits/tipoDocumentoTrait.php");

class Cliente
{
	use SexoTrait;
	use TipoDocumentoTrait;

	private String $nomeCompleto;
	private SexoEnum $sexo;
	private $documentos = array();	

	public function __construct(String $nomeParam, SexoEnum $sexoParam = SexoEnum::Masculino)
	{
		$this->nomeCompleto = $nomeParam;
		$this->sexo = $sexoParam;
	}

	public function getNomeCompleto():String{
		return $this->nomeCompleto;
	}

	public function getSexo():String{
		return $this->sexo == SexoEnum::Feminino ? "Feminino" : "Masculino";
	}

	public function addDocumento(Documento $documentoParam){
		array_push($this->documentos, $documentoParam);
	}

	public function getDocumentos(){
		$this->documentos;
	}

	public function salvar(){		
		$clienteRepository = new ClienteRepository();		
		$clienteRepository->salvarCliente($this);
	}

	public static function obterClientes(){
		return ClienteRepository::getClientes();				
	}
}
