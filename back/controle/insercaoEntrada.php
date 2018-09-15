<?php 
$conect = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
mysqli_select_db($conect,"entrada");
?>
<?php
$id = $_GET['id'] ?? 'default';
$dia = $_GET['dia'];
$horas = $_GET['horas'];
$minutos = $_GET['minutos'];
$revisitas = $_GET['revisitas'];
$revistas = $_GET['revistas'];
$livros = $_GET['livros'];
$broxuras = $_GET['broxuras'];
$obs = $_GET['observacoes'];

//insercao de dados novos
mysqli_query($conect, "INSERT into entrada values('{$id}','{$dia}','{$horas}','{$minutos}','{$revisitas}','{$revistas}', '{$livros}','{$broxuras}','{$obs}')");

mysqli_close($conect);
//header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
echo "<meta http-equiv='refresh' content='0000;URL=../../front/inserir-relatorio.html'>";
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
?>
<!--DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color: #3f51b5;">
</body>
</html>