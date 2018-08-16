<?php
//conexao com banco
$conectPess = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectPess,"pessoa");

//definicoes
$edita = $_GET['editou']?? "ok";
$idPessoa = $_GET['ids'] ?? null;
$idPessoaCopy = $_GET['idsCopy'] ?? null;
$nomePessoa = $_GET['nomeEditado'] ?? null;
$apelido = $_GET['apelidos'] ?? null;

if($edita == "ok"){
    mysqli_query($conectPess, "UPDATE `relatorio`.`pessoa` SET `nome` = '{$nomePessoa}', `apelido` = '{$apelido}' WHERE (`id` = '{$idPessoa}')");
}elseif($edita == "nao"){
    //deleta o estudante atual
    mysqli_query($conectPess, "DELETE FROM `relatorio`.`regPessoa` WHERE (`idPessoa` = '{$idPessoaCopy}')");
    mysqli_query($conectPess, "DELETE FROM `relatorio`.`pessoa` WHERE (`id` = '{$idPessoaCopy}')");
};

header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
?>