<?php

require 'carro.php';

$fabr1cante1 = new Fabricante();
$fabr1cante1->registrarNome("Ford");

$carro1 = new Carro($fabr1cante1);

$carro1->registrarNome("Gol");

echo "Carro: " . $carro1->obterNome() . PHP_EOL;
echo "Fabrincante: " .$carro1->obterFabricante()->obterNome() . PHP_EOL;

$fabricanteCarro = $carro1->obterFabricante();
echo "Fabrincante: " .$fabricanteCarro->obterNome() . PHP_EOL;

//print_r($carro1);
//var_dump($carro1);