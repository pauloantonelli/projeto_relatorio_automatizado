<?php 
//conecta para fazer a atualizacao de entrada
$conectId = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectId,"regPessoa");

//atualizacao dos dados existentes
$id = $_GET['id'];
$idPessoa = $_GET['idPessoa'];
$dia = $_GET['dia'];
$horas = $_GET['horasPessoa'];
$minutos = $_GET['minutosPessoa'];
$revisitas = $_GET['revisitasPessoa'];
$revistas = $_GET['revistasPessoa'];
$livros = $_GET['livrosPessoa'];
$broxuras = $_GET['broxurasPessoa'];
$obs = $_GET['observacoes'];
mysqli_query($conectId, "UPDATE `relatorio`.`regpessoa` SET `id`='{$id}',`idPessoa` = '{$idPessoa}', `dia` = '{$dia}',`horasPessoa`='{$horas}', `minutosPessoa`='{$minutos}', `revisitasPessoa`='{$revisitas}', `revistasPessoa`='{$revistas}', `livrosPessoa`='{$livros}', `broxurasPessoa`='{$broxuras}',`observacoes`='{$obs}' WHERE (`id`='{$id}')");

header("location:javascript://history.go(-1)");
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
echo "<script> window.sessionStorage.setItem('cadastro','sim'); </script>";
//echo "<script> window.sessionStorage.getItem('cadastro'); </script>";
?> 