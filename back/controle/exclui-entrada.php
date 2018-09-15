<?php
//conexao com banco
$conectDia = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
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
    mysqli_query($conectDia, "UPDATE `entrada` SET `idDia` = '{$idDia}', `dia` = '{$dia}', `horas` = '{$hora}', `minutos` = '{$minuto}', `revisitas` = '{$revisita}', `revistas` = '{$revista}', `livros` = '{$livro}', `broxuras` = '{$broxura}', `observacoes` = '{$obs}' WHERE (`idDia` = '{$idDia}')");
    echo "foi no ok";
}elseif($edita == "nao"){
    //deleta o estudante atual
    mysqli_query($conectDia, "DELETE FROM `entrada` WHERE (`idDia` = '{$idDiaCopy}')");
    echo "foi no nao";
};

mysqli_close($conectDia);
//header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
echo "<meta http-equiv='refresh' content='0000;URL=../../front/exclusao-entrada.php'>";
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