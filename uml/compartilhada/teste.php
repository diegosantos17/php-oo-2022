<?php

require 'cliente.php';

$clienteOuro = new Cliente("anne caroline", "pereira", "22244455577", 100);
$clientePrata = new Cliente();


echo $clienteOuro->obterNomeCompleto() .PHP_EOL;
echo "Taxa praticada: {$clienteOuro->obterTaxa()}%" .PHP_EOL;