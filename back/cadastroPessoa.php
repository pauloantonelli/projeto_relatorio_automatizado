<?php
//conexao com banco
$conect = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
mysqli_select_db($conect,"pessoa");

//definicoes
$nomePessoa = $_GET['pessoa'];
$apelidoPessoa = $_GET['apelido'];
$observPessoa = $_GET['observPessoa'];

//cadastro de novos estudantes
mysqli_query($conect, "INSERT INTO pessoa (nome, apelido, observacoes) values ('{$nomePessoa}','{$apelidoPessoa}','{$observPessoa}')");

//update estudante
mysqli_query($conect,"UPDATE  `pessoa` SET `idpessoa`='6', `nome`='Patricia2', `apelido`='paty2', `observacoes`='doida xp rss' WHERE `idpessoa`='5'");

mysqli_close($conect);
?>