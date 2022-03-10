<?php

require 'aluno.php';

$aluno = new Aluno();
$aluno->nome = "Danilo";

$aluno->adicionarExercicio(new Exercicio(TipoExercicio::Costas));
$aluno->adicionarExercicio(new Exercicio(TipoExercicio::Pernas));

$aluno->adicionarContato(TipoContato::Email, "diego@gmail.com");
$aluno->adicionarContato(TipoContato::Telefone, "11989893232");

print_r($aluno);
//var_dump($aluno);