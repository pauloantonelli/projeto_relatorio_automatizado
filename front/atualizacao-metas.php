<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inserção de horas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="css/entrada.css"/>
</head>
<body onload="folga(), diaHoje()">
        <?php 
        $conectId = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectId,"metamensal");
        $queryId = mysqli_query($conectId, "SELECT * FROM metamensal");
        ?>
    <section>
        <h1>Relatório Diário</h1>
        <h2>dia</h2><h2 id="diaHoje"></h2>
        <!--Inicio formulario mes-->
        <label>Escolha o mês desejado: </label>
        <select id="escolhaMes">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php while($mesId = mysqli_fetch_array($queryId)) { ?>
                <option form="atualizacao" id="optSelect" value="<?php echo "id".$mesId['idMes']."mes".$mesId['mes']."hora".$mesId['hora']."revisita".$mesId['revisita']."revista".$mesId['revista']."livro".$mesId['livro']."broxura".$mesId['broxura']?>"><?php echo $mesId['mes']?></option>
            <?php } ?>
        </select>
            <input type="hidden" id="id" name="idMes" form="atualizacao"/>
            <input type="hidden" id="mes" name="mes" form="atualizacao"/>
            <br/>
            <label for="horas">Alvo de Horas: </label>
            <input type="number" id="hora" name="horas" form="atualizacao" min="0" value="1" onblur="" required/>
            <div id="msgHora">Atenção defina pelo menos 1 hora como alvo</div>
            <br/>
            <label for="revisitas">Alvo de revisitas: </label>
            <input type="number" id="revisita" name="revisitas" form="atualizacao" value="1"/>
            <div id="msgRevi">Atenção defina pelo menos 1 revisita como alvo</div>
            <br/>
            <label for="revistas">Alvo de revistas: </label>
            <input type="number" id="revista" name="revistas" form="atualizacao" value="1"/>
            <div id="msgRev">Atenção defina pelo menos 1 revista como alvo</div>
            <br/>
            <label for="livros">Alvo de livros: </label>
            <input type="number" id="livro" name="livros" form="atualizacao" value="1"/>
            <div id="msgLivr">Atenção defina pelo menos 1 livro como alvo</div>
            <br/>
            <label for="broxuras">Alvo de broxuras: </label>
            <input type="number" id="broxura" name="broxuras" form="atualizacao" value="1"/>
            <div id="msgBrox">Atenção defina pelo menos 1 broxura como alvo</div>
            <br/>
            <form id="atualizacao" method="GET" action="../back/controle/atualiza-metas.php">
                <input type="submit" id="envia" value="Enviar!"/>
            </form>
        <!--Final formulario mes-->
    </section>
    <div id="msg-sucesso">Atualizado com sucesso!</div>
</body>
<script src="../back/model/funcoes-atualizacao-metas1.js"></script>
</html>