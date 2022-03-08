<?php

require "calculadora.php";

$calculadoraCassio = new Calculadora();

$calculadoraCassio->marca = "Cássio";
$calculadoraCassio->tipo = "Comunm";
$calculadoraCassio->cor = "Vermelho";

$calculadoraCassio->somar(15.5, 20);
// $calculadoraCassio->resultado = 80; -- Erro de acesso a propriedade privada
//$retorno = $calculadoraCassio->obterResultado();
//$calculadoraCassio->exibirResultado();

print_r($calculadoraCassio);
$calculadoraCassio->limpar();
print_r($calculadoraCassio);
//die();

$calculadoraMultilaser = new Calculadora();

$calculadoraMultilaser->marca = "Multilaser";
$calculadoraMultilaser->tipo = "Comunm";
$calculadoraMultilaser->cor = "Azul";

$calculadoraMultilaser->somar(20, 30);
$calculadoraMultilaser->exibirResultado();
