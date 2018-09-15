<?php
//conexao com banco
$conect = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
mysqli_select_db($conect,"regPessoa");
$conectPess = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
mysqli_select_db($conectPess,"pessoa");
//consulta o ultimo id criado
$conectIDs = mysqli_connect('mysql.hostinger.com.br','u613824788_cidin','fgli4545','u613824788_relat');
mysqli_select_db($conectIDs,"pessoa");

//definicoes
$idTransacaoNovoEstudante = $_GET['idTrans'];
$idPessoa = $_GET['ids']?? 'default';
$nomePessoa = $_GET['nomeEditado'];
$novoEstudante = $_GET['pessoas'];
$apelido = $_GET['apelidos'];
$dia = $_GET['dias'];
$hora = $_GET['horas'];
$minuto = $_GET['minutos'];
$revisita = $_GET['revisitas'];
$revista = $_GET['revistas'];
$livro = $_GET['livros'];
$broxura = $_GET['broxuras'];
$obs = $_GET['observacoes'];

if($novoEstudante){
    //cadastro novo estudante
    mysqli_query($conectPess, "INSERT into pessoa (id, nome, apelido) values ('{$idPessoa}','{$novoEstudante}','{$apelido}')");
    //registro novo de estudante novo
    mysqli_query($conect, "INSERT into regPessoa (id, idPessoa, dia, horasPessoa, minutosPessoa, revisitasPessoa, revistasPessoa, livrosPessoa, broxurasPessoa, observacoes) values ('{$idTransacaoNovoEstudante}','{$idPessoa}','{$dia}','{$hora}','{$minuto}','{$revisita}','{$revista}','{$livro}','{$broxura}','{$obs}')");
}else{
    //registro novo de estudante antigo
    mysqli_query($conect, "INSERT into regPessoa (id, idPessoa, dia, horasPessoa, minutosPessoa, revisitasPessoa, revistasPessoa, livrosPessoa, broxurasPessoa, observacoes) values ('default','{$idPessoa}','{$dia}','{$hora}','{$minuto}','{$revisita}','{$revista}','{$livro}','{$broxura}','{$obs}')");   
    mysqli_query($conectPess, "UPDATE  `pessoa` SET `nome` = '{$nomePessoa}', `apelido` = '{$apelido}' WHERE (`id` = '{$idPessoa}')");
}

mysqli_close($conect);
mysqli_close($conectPess);
mysqli_close($conectIDs);
//header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
echo "<meta http-equiv='refresh' content='0000;URL=../../front/cadastro-estudante.php'>";
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