<?php
//conexao com banco
$conect = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conect,"pessoa");

//definicoes mensais
$mes = $_GET['mes'];
$horaMensal = $_GET['mensalHora'] ?? 1;
$revisitasMensal = $_GET['mensalRevisitas'] ?? 1;
$revistasMensal = $_GET['mensalRevistas'] ?? 1;
$livroMensal = $_GET['mensalLivros'] ?? 1;
$broxuraMensal = $_GET['mensalBroxuras'] ?? 1;

//cadastro novas metas mensais
mysqli_query($conect, "INSERT INTO metaMensal (idMes, hora, revisita, revista, livro, broxura) values ('{$mes}','{$horaMensal}','{$revistasMensal}','{$revistasMensal}','{$livroMensal}','{$broxuraMensal}')");

header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
?>