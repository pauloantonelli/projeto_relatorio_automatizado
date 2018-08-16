<?php 
$conect = mysqli_connect('localhost','root','','relatorio');
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
mysqli_query($conect, "INSERT INTO `relatorio`.`entrada` (`idDia`, `dia`, `horas`, `minutos`, `revisitas`, `revistas`, `livros`, `broxuras`, `observacoes`) values ('{$id}','{$dia}','{$horas}','{$minutos}','{$revisitas}','{$revistas}', '{$livros}','{$broxuras}','{$obs}')");

header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
?>