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
	require_once("$rootDir/enums/tipoDocumentoEnum.php");

	$sexos = Cliente::getSexos();
	$tiposDocumento = Cliente::getTiposDocumento();

	// Declaração/Inicialização de variáveis
	$nomeCompleto = $sexoHelp = $nomeCompletoHelp = $tipoDoc1Help = $numeroDoc1Help = $validadeDoc1Help = $orgaoExpedidor1Help = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//var_dump($_POST);

		if (empty($_POST["nomeCompleto"])) {
			$nomeCompletoHelp = "Nome é obrigatório";
		} else {
			$nomeCompleto = $_POST["nomeCompleto"];
		}

		if (empty($_POST["sexo"]))
		{
			$sexoHelp = "Sexo é obrigatório";
		}

		if (empty($_POST["tipoDoc1"]))
		{
			$tipoDoc1Help = "Tipo obrigatório";
		}

		if (empty($_POST["numeroDoc1"]))
		{
			$numeroDoc1Help = "Número é obrigatório";
		}

		// Validação dos documentos	
		switch ($_POST["tipoDoc1"]) {
			case TipoDocumentoEnum::Rg->value:								

				if (empty($_POST["validadeDoc1"]))
				{
					$validadeDoc1Help = "Validade é obrigatória";
				}

				if (empty($_POST["orgaoExpedidor1"]))
				{
					$orgaoExpedidor1Help = "Orgão expedidor é obrigatório";
				}
				break;
			case TipoDocumentoEnum::Cpf->value:				
				break;
			case TipoDocumentoEnum::Cnh->value:
				if (empty($_POST["validadeDoc1"]))
				{
					$validadeDoc1Help = "Validade é obrigatória";
				}
				break;
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
							<option selected value="">Selecione</option>
							<?php
							foreach ($sexos as $key => $sexo) {
								echo "<option value='{$sexo["id"]}'>{$sexo["text"]}</option>";
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
							<option selected value="">Selecione</option>
							<?php
							foreach ($tiposDocumento as $key => $tipoDocumento) {
								echo "<option value='{$tipoDocumento["id"]}'>{$tipoDocumento["text"]}</option>";
							}
							?>
						</select>
						<small id="tipoDoc1Help" class="form-text"><?php echo $tipoDoc1Help ?></small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="numeroDoc1">Número</label>
						<input type="text" class="form-control" id="numeroDoc1" name="numeroDoc1">
						<small id="numeroDoc1Help" class="form-text"><?php echo $numeroDoc1Help ?></small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="validadeDoc1">Validade</label>
						<input type="text" class="form-control" id="validadeDoc1" name="validadeDoc1">
						<small id="validadeDoc1Help" class="form-text"><?php echo $validadeDoc1Help?></small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="orgaoExpedidor1">Orgão expedidor</label>
						<input type="text" class="form-control" id="orgaoExpedidor1" name="orgaoExpedidor1">
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