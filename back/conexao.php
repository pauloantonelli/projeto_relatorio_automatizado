<?php 
$conect = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conect,"pessoa");

$nome = 'Paulo';
$apelido = 'uchiha';
$obervacoes = 'Sou foda pohaaa';

mysqli_query($conect, "INSERT INTO pessoa (nome, apelido, observacoes) values ('{$nome}','{$apelido}','{$obervacoes}')");
?>