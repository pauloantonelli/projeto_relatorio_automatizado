<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inserção de horas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="css/entrada.css"/>
    
</head>
<body onload="minAlert(), diaHoje()">
        <?php 
        $conectId = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectId,"pessoa");
        mysqli_select_db($conectId, "regpessoa");
        $queryId = mysqli_query($conectId, "SELECT * from pessoa");

        $queryDia = mysqli_query($conectId, "SELECT p.*, r.* 
            from pessoa as p inner join regpessoa as r 
            on p.id = r.idpessoa
            order by p.nome;");
        ?>
    <section>
        <h1>Relatório Diário</h1>
        <h2>dia</h2><h2 id="diaHoje"></h2>
        <!--Inicio formulario-->
        <label>Escolha o dia para modificar: </label>
        <select id="escolhaEstudante">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php
            while($dia = mysqli_fetch_array($queryDia)) { ?>
                <option form="atualizacao" id="optSelect" value="<?php echo "idTransacao".$dia['id']."idPessoa".$dia['idPessoa']."dia".$dia['dia']."nome".$dia['nome']."apelido".$dia['apelido']."horas".$dia['horasPessoa']. "minutos".$dia['minutosPessoa']. "revisitas".$dia['revisitasPessoa']. "revistas".$dia['revistasPessoa']. "livros".$dia['livrosPessoa']. "broxuras".$dia['broxurasPessoa']. "obs".$dia['observacoes']?>"><?php echo "Dia: ".$dia['dia']." - Estudante: ".$dia['nome']?></option>
            <?php } ?>
        </select>
            <input type="hidden" id="id" name="id" form="atualizacao" readonly/>
            <input type="hidden" id="identPessoa" name="idPessoa" form="atualizacao" readonly/>
            <br/>
            <label for="dia">Dia escolhido: </label>
            <input type="date" id="diaEscolhido" name="dia" form="atualizacao" min="0" value="" readonly/>
            <br/>
            <label for="nome">Estudante: </label>
            <input type="text" id="nomePessoa" name="nome" form="atualizacao" min="0" value="" readonly/>
            <br/>
            <label for="horas">Horas usadas nesse estudante: </label>
            <input type="number" id="hora" name="horasPessoa" form="atualizacao" min="0" value="0" onblur="" required/>
            <br/>
            <label for="minutos">Minutos usados nesse estudante: </label>
            <input type="number" id="minuto" name="minutosPessoa" min="0" form="atualizacao" value="0"/>
            <br/>
            <div id="msgMin">se nao tiver minutos avulsos deixe este campo minutos em 0 ou vazio</div>
            <label for="revisitas">Revisitas usados nesse estudante: </label>
            <input type="number" id="revisita" name="revisitasPessoa" form="atualizacao" value="0"/>
            <br/>
            <label for="revistas">Revistas usados nesse estudante: </label>
            <input type="number" id="revista" name="revistasPessoa" form="atualizacao" value="0"/>
            <br/>
            <label for="livros">Livros usados nesse estudante: </label>
            <input type="number" id="livro" name="livrosPessoa" form="atualizacao" value="0"/>
            <br/>
            <label for="broxuras">Broxuras usados nesse estudante: </label>
            <input type="number" id="broxura" name="broxurasPessoa" form="atualizacao" value="0"/>
            <br/>
            <label for="observacoes">Observações do estudante: </label>
            <textarea id="observacao" name="observacoes" placeholder="Opcional" value="" form="atualizacao"></textarea>
            <br/>
            <form id="atualizacao" method="GET" action="../back/controle/atualiza-estudantes.php">
                <input type="submit" id="envia" value="Enviar!"/>
            </form>
        <!--Final formulario-->
    </section>
    <div id="msg-sucesso">Atualizado com sucesso!</div>
</body>
<script src="../back/model/funcoes-atualizacao
-estudantes1.js"></script>
</html>