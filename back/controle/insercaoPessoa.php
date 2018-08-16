<?php
//conexao com banco
$conect = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conect,"regPessoa");
$conectPess = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectPess,"pessoa");
//consulta o ultimo id criado
$conectIDs = mysqli_connect('localhost','root','','relatorio');
mysqli_select_db($conectIDs,"pessoa");

//definicoes
$idTransacaoNovoEstudante = $_GET['idTrans'];
$idPessoa = $_GET['ids']?? 'default';
$nomePessoa = $_GET['nomeEditado'];
$novoEstudante = $_GET['pessoas']?? null;
$apelido = $_GET['apelidos'];
$dia = $_GET['dias'];
$hora = $_GET['horas'];
$minuto = $_GET['minutos'];
$revisita = $_GET['revisitas'];
$revista = $_GET['revistas'];
$livro = $_GET['livros'];
$broxura = $_GET['broxuras'];
$obs = $_GET['observacoes'];

if($novoEstudante == null){
    //registro novo de estudante antigo
    mysqli_query($conect, "INSERT INTO regpessoa (id, idPessoa, dia, horasPessoa, minutosPessoa, revisitasPessoa, revistasPessoa, livrosPessoa, broxurasPessoa, observacoes) values ('default','{$idPessoa}','{$dia}','{$hora}','{$minuto}','{$revisita}','{$revista}','{$livro}','{$broxura}','{$obs}')");   
    mysqli_query($conectPess, "UPDATE `relatorio`.`pessoa` SET `nome` = '{$nomePessoa}', `apelido` = '{$apelido}' WHERE (`id` = '{$idPessoa}')");
}else{
    //cadastro novo estudante
    mysqli_query($conectPess, "INSERT into pessoa (id, nome, apelido) values ('{$idPessoa}','{$novoEstudante}','{$apelido}')");
    //registro novo de estudante novo
    mysqli_query($conect, "INSERT INTO regpessoa (id, idPessoa, dia, horasPessoa, minutosPessoa, revisitasPessoa, revistasPessoa, livrosPessoa, broxurasPessoa, observacoes) values ('{$idTransacaoNovoEstudante}','{$idPessoa}','{$dia}','{$hora}','{$minuto}','{$revisita}','{$revista}','{$livro}','{$broxura}','{$obs}')");
}


header("location:javascript://history.go(-1)");
echo "<script> window.sessionStorage.setItem('enviou','sim'); </script>";
//header("location:javascript://window.sessionStorage.setItem('enviou','sim')");
echo "<script> window.sessionStorage.getItem('enviou'); </script>";
?>