<?php
//conexao com banco
$conectDia = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectDia,"entrada");

//definicoes
$edita = $_GET['editou'];
$idDia = $_GET['ids'] ?? null;
$idDiaCopy = $_GET['idsCopy'] ?? null;
$dia = $_GET['dias'] ?? null;
$hora = $_GET['horas'] ?? null;
$minuto = $_GET['minutos'] ?? null;
$revisita = $_GET['revisitas'] ?? null;
$revista = $_GET['revistas'] ?? null;
$livro = $_GET['livros'] ?? null;
$broxura = $_GET['broxuras'] ?? null;
$obs = $_GET['obs'] ?? null;

if($edita == "ok"){
    mysqli_query($conectDia, "UPDATE `relatorio`.`entrada` SET `idDia` = '{$idDia}', `dia` = '{$dia}', `horas` = '{$hora}', `minutos` = '{$minuto}', `revisitas` = '{$revisita}', `revistas` = '{$revista}', `livros` = '{$livro}', `broxuras` = '{$broxura}', `observacoes` = '{$obs}' WHERE (`idDia` = '{$idDia}')");
    echo "foi no ok";
}elseif($edita == "nao"){
    //deleta o estudante atual
    mysqli_query($conectDia, "DELETE FROM `relatorio`.`entrada` WHERE (`idDia` = '{$idDiaCopy}')");
    echo "foi no nao";
};

header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
?>