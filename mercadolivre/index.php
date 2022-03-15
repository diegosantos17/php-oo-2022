<!doctype html>
<html lang="en">

<head>
	<title>Mercado Livre</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

	<?php
	// Um bloco chique de PHP
	$rootDir = dirname(__DIR__) . "/mercadolivre";
	require_once("$rootDir/models/cliente.php");

	$sexos = Cliente::getSexos();
	$tiposDocumento = Cliente::getTiposDocumento();	
	?>

	<div class="container">
		<form action="processar.php" method="POST">
			<!-- Nome completo -->
			<div class="row">
				<div class="col-8">
					<div class="form-group">
						<label for="nomeCompleto">Nome completo</label>
						<input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto">
						<small id="nomeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
				</div>
				<div class="col-4">
					<div class="form-group">
						<label for="sexo">Sexo</label>
						<select id="sexo" class="form-control">
							<option selected>Selecione</option>
							<?php
							foreach ($sexos as $key => $sexo) {
								echo "<option value='{$sexo["id"]}'>{$sexo["text"]}</option>";
							}
							?>
						</select>
					</div>
				</div>
			</div>

			<!-- Documentos -->
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="tipoDocumento">Tipo</label>
						<select id="tipoDocumento" class="form-control">
							<option selected>Selecione</option>
							<?php
							foreach ($tiposDocumento as $key => $tipoDocumento) {
								echo "<option value='{$tipoDocumento["id"]}'>{$tipoDocumento["text"]}</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="nomeCompleto">Número</label>
						<input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto">
						<small id="nomeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="nomeCompleto">Validade</label>
						<input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto">
						<small id="nomeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="nomeCompleto">Orgão expedidor</label>
						<input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto">
						<small id="nomeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
				</div>
			</div>
			<!-- Aceito os termos -->
			<div class="row">
				<div class="col-12">
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="aceitaOfertas" name="aceitaOfertas">
						<label class="form-check-label" for="aceitaOfertas">Aceita receber ofertas?</label>
					</div>
				</div>
			</div>

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