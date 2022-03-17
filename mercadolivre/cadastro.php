<!doctype html>
<html lang="en">

<head>
	<title>Mercado Livre</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="main.css">

</head>

<body>

	<?php
	// Um bloco chique de PHP
	$rootDir = dirname(__DIR__) . "/mercadolivre";
	require_once("$rootDir/models/cliente.php");
	require_once("$rootDir/models/cpf.php");
	require_once("$rootDir/models/rg.php");
	// require_once("$rootDir/models/cnh.php");
	require_once("$rootDir/enums/sexoEnum.php");
	require_once("$rootDir/enums/tipoDocumentoEnum.php");

	$sexos = Cliente::getSexos();
	$tiposDocumento = Cliente::getTiposDocumento();

	// Declaração/Inicialização de variáveis
	$nomeCompleto = $sexoForm = $tipoDoc1 = $numeroDoc1 = $validadeDoc1 = $orgaoExpedidor1 = $sexoHelp = $nomeCompletoHelp = $tipoDoc1Help = $numeroDoc1Help = $validadeDoc1Help = $orgaoExpedidor1Help = "";
	$isDocumentValid = true;
	$cliente;
	$mensagemFeedback;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$nomeCompleto = $_POST["nomeCompleto"];
		$sexoForm = $_POST["sexo"];
		$tipoDoc1 = $_POST["tipoDoc1"];
		$numeroDoc1 = $_POST["numeroDoc1"];
		$validadeDoc1 = $_POST["validadeDoc1"];
		$orgaoExpedidor1 = $_POST["orgaoExpedidor1"];

		if (empty($nomeCompleto)) {
			$nomeCompletoHelp = "Nome é obrigatório";
		}

		if (empty($sexoForm)) {
			$sexoHelp = "Sexo é obrigatório";
		}

		if (empty($nomeCompletoHelp) && empty($sexoHelp)) {
			$cliente = new Cliente($nomeCompleto, SexoEnum::from($sexoForm));
		}

		if (empty($tipoDoc1)) {
			$tipoDoc1Help = "Tipo obrigatório";
			$isDocumentValid = false;
		}

		if (empty($numeroDoc1)) {
			$numeroDoc1Help = "Número é obrigatório";
			$isDocumentValid = false;
		}

		$documento;
		// Validação dos documentos	
		switch ($tipoDoc1) {
			case TipoDocumentoEnum::Rg->value:

				if (empty($validadeDoc1)) {
					$validadeDoc1Help = "Validade é obrigatória";
					$isDocumentValid = false;
				}

				if (empty($orgaoExpedidor1)) {
					$orgaoExpedidor1Help = "Orgão expedidor é obrigatório";
					$isDocumentValid = false;
				}

				if ($isDocumentValid) {
					$rg = new Rg($validadeDoc1, $orgaoExpedidor1);
					$rg->setNumero($numeroDoc1);

					$documento = $rg;
				}
				break;
			case TipoDocumentoEnum::Cpf->value:

				if ($isDocumentValid) {
					try {

						$cpf = new Cpf();
						$cpf->setNumero($numeroDoc1);

						$documento = $cpf;
					} catch (\Exception $ex) {
						$numeroDoc1Help = $ex->getMessage();
					}
				}

				break;
			case TipoDocumentoEnum::Cnh->value:
				if (empty($validadeDoc1)) {
					$validadeDoc1Help = "Validade é obrigatória";
					$isDocumentValid = false;
				}

				break;
		}
		if (isset($documento)) {
			$cliente->addDocumento($documento);
			//var_dump($cliente);
		}


		if (!isset($cliente) || !isset($documento)) {
			$mensagemFeedback = "Algo deu errado";
		}

		if (isset($mensagemFeedback)) {
			echo "<div class='alert alert-danger' role='alert'>$mensagemFeedback</div>";
		} else {
			$cliente->salvar();
			echo "<div class='alert alert-success' role='alert'>Cliente salvo com sucesso! <a href='index.php'>ver todos clientes</a></div>";

		}
	}

	?>

	<div class="container">
		<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
			<!-- Nome completo -->
			<div class="row">
				<div class="col-8">
					<div class="form-group">
						<label for="nomeCompleto">Nome completo</label>
						<input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" value="<?php echo $nomeCompleto ?>" />
						<small id="nomeCompletoHelp" class="form-text"><?php echo $nomeCompletoHelp ?> </small>
					</div>
				</div>
				<div class="col-4">
					<div class="form-group">
						<label for="sexo">Sexo</label>
						<select id="sexo" name="sexo" class="form-control">
							<option value="">Selecione</option>
							<?php

							$selectedSexo = "";
							foreach ($sexos as $key => $sexo) {

								if ($sexo["id"] == $sexoForm) {
									$selectedSexo = "selected";
								} else {
									$selectedSexo = "";
								}

								echo "<option $selectedSexo value='{$sexo["id"]}'>{$sexo["text"]}</option>";
							}
							?>
						</select>
						<small id="sexoHelp" class="form-text"><?php echo $sexoHelp ?></small>
					</div>
				</div>
			</div>

			<!-- Documentos -->
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="tipoDoc1">Tipo</label>
						<select id="tipoDoc1" name="tipoDoc1" class="form-control">
							<option value="">Selecione</option>
							<?php
							$selectedTipoDoc1 = "";
							foreach ($tiposDocumento as $key => $tipoDocumento) {

								if ($tipoDocumento["id"] == $tipoDoc1) {
									$selectedTipoDoc1 = "selected";
								} else {
									$selectedTipoDoc1 = "";
								}

								echo "<option $selectedTipoDoc1 value='{$tipoDocumento["id"]}'>{$tipoDocumento["text"]}</option>";
							}
							?>
						</select>
						<small id="tipoDoc1Help" class="form-text"><?php echo $tipoDoc1Help ?></small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="numeroDoc1">Número</label>
						<input type="text" class="form-control" id="numeroDoc1" name="numeroDoc1" value="<?php echo $numeroDoc1 ?>">
						<small id="numeroDoc1Help" class="form-text"><?php echo $numeroDoc1Help ?></small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="validadeDoc1">Validade</label>
						<input type="text" class="form-control" id="validadeDoc1" name="validadeDoc1" value="<?php echo $validadeDoc1 ?>">
						<small id="validadeDoc1Help" class="form-text"><?php echo $validadeDoc1Help ?></small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="orgaoExpedidor1">Orgão expedidor</label>
						<input type="text" class="form-control" id="orgaoExpedidor1" name="orgaoExpedidor1" value="<?php echo $orgaoExpedidor1 ?>">
						<small id="orgaoExpedidor1Help" class="form-text"><?php echo $orgaoExpedidor1Help ?></small>
					</div>
				</div>
			</div>

			<!-- Aceito os termos -->
			<div class="row">
				<div class="col-12">
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="aceitaOfertas" name="aceitaOfertas" value="1">
						<label class="form-check-label" for="aceitaOfertas">Aceita receber ofertas?</label>
					</div>
				</div>
			</div>

			<!-- Botão de botões -->
			<div class="row">
				<div class="col-12">
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
		</form>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>