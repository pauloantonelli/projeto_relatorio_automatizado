<?php
$dia = $_GET['dia'] ?? 0;
$horas = $_GET['horas'] ?? 0;
$minutos = $_GET['minutos'] ?? 0;
$revisitas = $_GET['revisitas'] ?? 0;
$revistas = $_GET['revistas'] ?? 0;
$livros = $_GET['livros'] ?? 0;
$broxuras = $_GET['broxuras'] ?? 0;
$pessoas = $_GET['pessoas'] ?? null;
$observacoes = $_GET['observacoes'] ?? null;

//debug de recebimento de array
var_dump($horas);
echo "<br/>";
var_dump($minutos);
echo "<br/>";
var_dump($revisitas);
echo "<br/>";
var_dump($revistas);
echo "<br/>";
var_dump($livros);
echo "<br/>";
var_dump($broxuras);
echo "<br/>";
var_dump($pessoas);
echo "<br/>";
var_dump($observacoes);
echo "<br/>";

?>