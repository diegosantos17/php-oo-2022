<?php

require_once 'model/cliente.php';
require_once 'model/rg.php';
require_once 'model/cpf.php';
require_once 'model/cnh.php';

$cliente1 = new Cliente("Anna Raio", Sexo::Feminino);

$cpf = new Cpf();
$cpf->setNumero("123456");

$cnh = new Cnh();
$cnh->setNumero("44344434");

$rg = new Rg();
$rg->setNumero("44344434");

$cliente1->addDocumento($cpf);
$cliente1->addDocumento($rg);
$cliente1->addDocumento($cnh);