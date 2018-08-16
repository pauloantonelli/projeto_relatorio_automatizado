<?php
//conexao com banco
$conect = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conect,"pessoa");

//definicoes anuais
$ano = $_GET['ano'] ?? 18;
$horaAnual = $_GET['anualHora'] ?? 1;
$revisitasAnual = $_GET['anualRevisitas'] ?? 1;
$revistasAnual = $_GET['anualRevistas'] ?? 1;
$livroAnual = $_GET['anualLivros'] ?? 1;
$broxuraAnual = $_GET['anualBroxuras'] ?? 1;

//definicoes mensais
$mes = $_GET['mes'] ?? 2;
$horaMensal = $_GET['mensalHora'] ?? 1;
$revisitasMensal = $_GET['mensalRevisitas'] ?? 1;
$revistasMensal = $_GET['mensalRevistas'] ?? 1;
$livroMensal = $_GET['mensalLivros'] ?? 1;
$broxuraMensal = $_GET['mensalBroxuras'] ?? 1;

//cadastro novas metas anuais
mysqli_query($conect, "INSERT INTO metaAnual (idAno, hora, revisita, revista, livro, broxura) values ('{$ano}','{$horaAnual}','{$revisitasAnual}','{$revistasAnual}','{$livroAnual}','{$broxuraAnual}')");

//atualizando metas anuais
mysqli_query($conect, "UPDATE `relatorio`.`metaAnual` SET `hora`='{$horaAnual}', `revisita`='{$revisitasAnual}', `revista`='{$revistasAnual}', `livro`='{$livroAnual}', `broxura`='{$livroAnual}' WHERE `idAno`='{$ano}'");

//cadastro novas metas mensais
mysqli_query($conect, "INSERT INTO metaMensal (idMes, hora, revisita, revista, livro, broxura) values ('{$mes}','{$horaMensal}','{$revistasMensal}','{$revistasMensal}','{$livroMensal}','{$broxuraMensal}')");

//atualizando metas mensais
mysqli_query($conect, "UPDATE `relatorio`.`metaMensal` SET `hora`='{$horaMensal}', `revisita`='{$revisitasMensal}', `revista`='{$revistasMensal}', `livro`='{$livroMensal}', `broxura`='{$broxuraMensal}' WHERE `idMes`='{$mes}'");

?>