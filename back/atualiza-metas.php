<?php 
//conecta para fazer a atualizacao de entrada
$conectMeses = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
mysqli_select_db($conectMeses,"metaMensal");

//conecta para fazer a atualizacao de entrada
$conectAno = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
mysqli_select_db($conectAno,"metaAnual");

//atualizacao dos dados existentes dos meses
$idMes = $_GET['idMes'];
$mes = $_GET['mes'];
$horas = $_GET['horas'];
$revisitas = $_GET['revisitas'];
$revistas = $_GET['revistas'];
$livros = $_GET['livros'];
$broxuras = $_GET['broxuras'];
//atualizacao dos dados existentes dos ano
$metaAnualHors = $_GET['metaAnualHors'];
$metaAnualRevis = $_GET['metaAnualRevis'];
$metaAnualRevs = $_GET['metaAnualRevis'];
$metaAnualLivrs = $_GET['metaAnualLivrs'];
$metaAnualBroxs = $_GET['metaAnualBroxs'];

//colocar o ano atual no banco automaticamente.
mysqli_query($conectMeses, "UPDATE `metaMensal` SET `idMes`='{$idMes}',`mes`='{$mes}',`hora`='{$horas}', `revisita`='{$revisitas}', `revista`='{$revistas}', `livro`='{$livros}', `broxura`='{$broxuras}' WHERE `idMes`='{$idMes}'");

//colocar o ano atual no banco automaticamente.
mysqli_query($conectAno, "UPDATE `metaAnual` SET `idAno` = 2018, `hora` = '{$metaAnualHors}', `revisita` = '{$metaAnualRevis}', `revista` = '{$metaAnualRevs}', `livro` = '{$metaAnualLivrs}', `broxura` = '{$metaAnualBroxs}' WHERE (`idAno` = 2018)");

//header("location:javascript://history.go(-1)");
//echo "<script> window.sessionStorage.setItem('pagina','atualiza-metas'); </script>";
echo "<meta http-equiv='refresh' content='0000;URL=../../front/atualizacao-metas.php'>";
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
//echo "<script> window.sessionStorage.getItem('enviou'); </script>";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color: #3f51b5;">
</body>
</html>