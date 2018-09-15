<?php
//conexao com banco
$conect = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
mysqli_select_db($conect,"pessoa");

//definicoes
$nomePessoa = $_GET['pessoa'];
$ids = mysqli_query($conect, "SELECT idpessoa from pessoa where nome like '{$nomePessoa}%'");//pesquisando pelo nome o id do usuario
$res = mysqli_fetch_assoc($ids);//array com id usuario requisitado

//deleta estudantes pelo id
mysqli_query($conect, "DELETE FROM pessoa where idpessoa = '{$res['idpessoa']}'");

mysqli_close($conect);
?>