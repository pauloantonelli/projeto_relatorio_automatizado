<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inserção de horas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="css/entrada.css"/>
</head>
<body onload="diaHoje(), valorDia(), minAlert()">
        <?php 
        $conectId = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectId,"pessoa");
        $queryId = mysqli_query($conectId, "SELECT * FROM pessoa");
        mysqli_select_db($conectId,"regPessoa");
        $queryRegis = mysqli_query($conectId, "SELECT id FROM regPessoa");
        ?>
    <section>
        <h1>Dados dos Estudantes</h1>
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
            <input type="hidden" id="idTran" name="idTrans" form="atualizacao"/>
            <br/>
            <label for="nomeEditado">Se quiser editar o nome existente edite aqui: </label>
            <input type="text" id="nomeEditar" name="nomeEditado" form="atualizacao" value=""/>
            <br/>
            <label for="pessoa">Ou cadastre um novo estudante aqui</label>
            <input type="text" id="pessoa" name="pessoas" form="atualizacao" placeholder="para estudante novo digite aqui"/>
            <br/>
            <label for="apelido">Apelido: </label>
            <input type="text" id="apelido" name="apelidos" form="atualizacao" value="" placeholder="*opcional"/>
            <br/>
            <label for="dia">Dia do registro: </label>
            <input type="date" id="diaPadrao" name="dias" form="atualizacao" min="0" value=""/>
            <br/>
            <label for="horas">Horas: </label>
            <input type="number" id="hora" name="horas" form="atualizacao" min="0" value="" onblur="" />
            <br/>
            <label for="minutos">Minutos: </label>
            <input type="number" id="minuto" name="minutos" form="atualizacao" min="" value="" onblur=""/>
            <div id="msgMin">se nao tiver minutos avulsos deixe este campo minutos vazio</div>
            <br/>
            <label for="revisitas">Revisitas: </label>
            <input type="number" id="revisita" name="revisitas" form="atualizacao" value=""/>
            <br/>
            <label for="revistas">Revistas: </label>
            <input type="number" id="revista" name="revistas" form="atualizacao" value=""/>
            <br/>
            <label for="livros">Livros: </label>
            <input type="number" id="livro" name="livros" form="atualizacao" value=""/>
            <br/>
            <label for="broxuras">Broxuras: </label>
            <input type="number" id="broxura" name="broxuras" form="atualizacao" value=""/>
            <br/>
            <label for="observacoes">Observações do estudante: </label>
            <textarea id="observacao" name="observacoes" placeholder="Opcional" value="" form="atualizacao"></textarea>
            <br/>
            <form id="atualizacao" method="GET" action="../back/controle/insercaoPessoa.php">
                <input type="submit" id="envia" value="Enviar!"/>
            </form>
        <!--Final formulario mes-->
    </section>
    <div id="msg-sucesso">Atualizado com sucesso!</div>
</body>
<script src="../back/model/funcoes-cadastro-estudantes1.js"></script>
</html>