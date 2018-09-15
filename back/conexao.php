<?php 
$conect = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
mysqli_select_db($conect,"pessoa");

$nome = 'Paulo';
$apelido = 'uchiha';
$obervacoes = 'Sou foda pohaaa';

mysqli_query($conect, "INSERT INTO pessoa (nome, apelido, observacoes) values ('{$nome}','{$apelido}','{$obervacoes}')");

mysqli_close($conect);
?>