<?php 
//conecta para fazer a atualizacao de entrada
$conectId = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectId,"entrada");

//atualizacao dos dados existentes
$id = $_GET['idDia'];
$dia = $_GET['dia'];
$horas = $_GET['horas'];
$minutos = $_GET['minutos'];
$revisitas = $_GET['revisitas'];
$revistas = $_GET['revistas'];
$livros = $_GET['livros'];
$broxuras = $_GET['broxuras'];
$obs = $_GET['observacoes'];
mysqli_query($conectId, "UPDATE `relatorio`.`entrada` SET `dia`='{$dia}',`horas`='{$horas}', `minutos`='{$minutos}', `revisitas`='{$revisitas}', `revistas`='{$revistas}', `livros`='{$livros}', `broxuras`='{$broxuras}',`observacoes`='{$obs}' WHERE `idDia`='{$id}'");

header("location:javascript://history.go(-1)");
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
?>