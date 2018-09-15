<?php 
//conecta para fazer a atualizacao de entrada
$conectId = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
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
mysqli_query($conectId, "UPDATE `regPessoa` SET `id`='{$id}',`idPessoa` = '{$idPessoa}', `dia` = '{$dia}',`horasPessoa`='{$horas}', `minutosPessoa`='{$minutos}', `revisitasPessoa`='{$revisitas}', `revistasPessoa`='{$revistas}', `livrosPessoa`='{$livros}', `broxurasPessoa`='{$broxuras}',`observacoes`='{$obs}' WHERE (`id`='{$id}')");

mysqli_close($conectId);
//header("location:javascript://history.go(-1)");
echo "<meta http-equiv='refresh' content='0000;URL=../../front/atualizacao-estudantes.php'>";
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
echo "<script> window.sessionStorage.setItem('cadastro','sim'); </script>";
//echo "<script> window.sessionStorage.getItem('cadastro'); </script>";
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