<?php 
//conecta para fazer a atualizacao de entrada
$conectId = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectId,"metaMensal");

//atualizacao dos dados existentes
$idMes = $_GET['idMes'];
$mes = $_GET['mes'];
$horas = $_GET['horas'];
$revisitas = $_GET['revisitas'];
$revistas = $_GET['revistas'];
$livros = $_GET['livros'];
$broxuras = $_GET['broxuras'];
mysqli_query($conectId, "UPDATE `relatorio`.`metaMensal` SET `idMes`='{$idMes}',`mes`='{$mes}',`hora`='{$horas}', `revisita`='{$revisitas}', `revista`='{$revistas}', `livro`='{$livros}', `broxura`='{$broxuras}' WHERE `idMes`='{$idMes}'");

//criar comando para requisitar os resultados de todos os meses da tabela metamensal e fazer uma soma, apos isso popular o banco de ano nos respectivos campos.
//colocar o ano atual no banco automaticamente.
//UPDATE `relatorio`.`metaAnual` SET `idAno` = 2019, `hora` = '5', `revisita` = '6', `revista` = '7', `livro` = '8', `broxura` = '9' WHERE (`idAno` = 2018);


header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('pagina','atualiza-metas'); </script>";
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
//echo "<script> window.sessionStorage.getItem('enviou'); </script>";
?>