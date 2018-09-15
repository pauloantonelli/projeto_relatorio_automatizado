<?php
//conexao com banco
$conect = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
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

mysqli_close($conect);
//header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
echo "<meta http-equiv='refresh' content='0000;URL=../../front/atualizacao-entrada.php'>";
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
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