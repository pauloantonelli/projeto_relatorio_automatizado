<?php 
//conecta para fazer a atualizacao de entrada
$conectId = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
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
mysqli_query($conectId, "UPDATE `entrada` SET `dia`='{$dia}',`horas`='{$horas}', `minutos`='{$minutos}', `revisitas`='{$revisitas}', `revistas`='{$revistas}', `livros`='{$livros}', `broxuras`='{$broxuras}',`observacoes`='{$obs}' WHERE `idDia`='{$id}'");

mysqli_close($conectId);
//header("location:javascript://history.go(-1)");
//$suc = file_get_contents("../../front/atualizacao-entrada.php");
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
echo "<meta http-equiv='refresh' content='0000;URL=../../front/atualizacao-entrada.php'>";
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