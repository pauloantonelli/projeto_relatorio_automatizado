<?php
//conexao com banco
$conectPess = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
mysqli_select_db($conectPess,"pessoa");

//definicoes
$edita = $_GET['editou'];
$idPessoa = $_GET['ids'] ?? null;
$idPessoaCopy = $_GET['idsCopy'] ?? null;
$nomePessoa = $_GET['nomeEditado'] ?? null;
$apelido = $_GET['apelidos'] ?? null;

if($edita == "ok"){
    mysqli_query($conectPess, "UPDATE  `pessoa` SET `nome` = '{$nomePessoa}', `apelido` = '{$apelido}' WHERE (`id` = '{$idPessoa}')");
    echo $edita;
}elseif($edita == "nao"){
    //deleta o estudante atual
    mysqli_query($conectPess, "DELETE FROM  `regPessoa` WHERE (`idPessoa` = '{$idPessoaCopy}')");
    mysqli_query($conectPess, "DELETE FROM  `pessoa` WHERE (`id` = '{$idPessoaCopy}')");
    echo $edita;
};

//header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
echo "<meta http-equiv='refresh' content='0000;URL=../../front/exclusao-estudante.php'>";
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