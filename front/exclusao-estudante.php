<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inserção de horas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="css/entrada.css"/>
</head>
<body onload="diaHoje()">
        <?php 
        $conectId = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectId,"pessoa");
        $queryId = mysqli_query($conectId, "SELECT * FROM pessoa");
        mysqli_select_db($conectId,"regPessoa");
        $queryRegis = mysqli_query($conectId, "SELECT id FROM regPessoa");
        ?>
    <section>
        <h1>Administração dos estudantes</h1>
        <h2>dia</h2><h2 id="diaHoje"></h2>
        <!--Inicio formulario mes-->
        <label>Escolha o estudante: </label>
        <select id="escolhaEstudante">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php while($pessoaId = mysqli_fetch_array($queryId)) { ?>
                <option form="atualizacao" id="optSelectDia" value="<?php echo "id".$pessoaId['id']."nome".$pessoaId['nome']."apelido".$pessoaId['apelido']?>"><?php echo $pessoaId['nome']?></option>
            <?php } ?>
        </select>
        <select id="escolhaId">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php while($contDia = mysqli_fetch_array($queryRegis)) { ?>
                <option form="atualizacao" id="optSelect" value="<?php echo "id".$contDia['id']?>"></option>
            <?php } ?>
        </select>
            <input type="hidden" id="id" name="ids" form="atualizacao"/>
            <br/>
            <h3>Se quiser somente editar algum dado de <p id="estudanteDeleta"></p>edite aqui: </h3>
            <label for="nomeEditado">Estudante: </label>
            <br/>
            <input type="text" id="nomeEditar" name="nomeEditado" form="atualizacao" value=""/>
            <br/>
            <label for="apelido">Apelido: </label>
            <br/>
            <input type="text" id="apelido" name="apelidos" form="atualizacao" value="" placeholder="*opcional"/>
            <br/>
            <form id="atualizacao" method="GET" action="../back/controle/exclui-estudante.php">
                <input type="submit" id="edita" value="Editar!"/>
            </form>
        <div id="msg-sucesso">Atualizado com sucesso!</div>
        <!--Final formulario-->
            <hr/>
        <h2>Atenção!</h2>
        <h3>Se quiser deletar permanentemente <p id="estudanteDeleta"></p> use o botão abaixo!</h3>
        <br/>
        <form id="deletando" method="GET" action="../back/controle/exclui-estudante.php">
        <input type="hidden" id="edito" name="editou" value="nao" form="deletando"/>
        <input type="hidden" id="idCopy" name="idsCopy" form="deletando"/>
        <input type="submit" id="delet" value="Deletar!"/>
        </form>
    </section>
</body>
<script src="../back/model/funcoes-exclusao-estudantes.js"></script>
</html>