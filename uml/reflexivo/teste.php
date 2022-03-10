<?php

require 'paciente.php';

$titular = new Paciente();
$titular->nome = "Diego";

$titular->dependente = new Paciente();
$titular->dependente->nome = "Thiago";

var_dump($titular);