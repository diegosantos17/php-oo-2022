<?php

$rootDir = dirname(__DIR__);
require_once("$rootDir/models/cliente.php");
require_once("$rootDir/enums/tipoDocumentoEnum.php");

class ClienteRepository {

	// Retornar todos os clientes
	public static function getClientes(){
		$dataBaseDir = dirname(__DIR__);
		require_once("$dataBaseDir/models/cliente.php");
		
		$dataBase = fopen("$dataBaseDir/repository/fakeDatabase/clientes.json", "r");
		$clientes = array();

		while (($sline = fgets($dataBase)) !== false) {			
			$cliente = json_decode($sline);

			array_push($clientes, $cliente);
		}

		fclose($dataBase);

		return $clientes;

	}

	public function salvarCliente(Cliente $clienteParam){

		try {			
			$dataBaseDir = dirname(__DIR__);
			require_once("$dataBaseDir/models/cliente.php");
			
			$dataBase = fopen("$dataBaseDir/repository/fakeDatabase/clientes.json", "a");
	
			$clienteNovo["nomeCompleto"] = $clienteParam->getNomeCompleto();
			$clienteNovo["sexo"] = $clienteParam->getSexo();				
			$documentos = $clienteParam->getDocumentos();
			
			$documentosNovo["numero"] = $documentos[0]->getNumero();
			$documentosNovo["tipoDocumento"] = $documentos[0]->getTipoDocumento()->name;

			if($documentos[0]->getTipoDocumento() == TipoDocumentoEnum::Rg){
				$documentosNovo["validade"] = $documentos[0]->getValidade();
				$documentosNovo["orgaoExpedidor"] = $documentos[0]->getOrgaoExpedidor(); 
			}

			if($documentos[0]->getTipoDocumento() == TipoDocumentoEnum::Cnh){
				$documentosNovo["validade"] = $documentos[0]->getValidade();				
			}

			$clienteNovo["documento"] = $documentosNovo;

			$clienteJson = json_encode($clienteNovo);
			
			fwrite($dataBase, "$clienteJson\n");
			fclose($dataBase);
		} catch (\Exception $ex) {
			echo $ex->getMessage();
		}
	}
}

// Somente para teste
// $cliente = new Cliente("Anne 2");
// ClienteRepository::salvarCliente($cliente);
// $clientes = ClienteRepository::getClientes();
// var_dump($clientes);
