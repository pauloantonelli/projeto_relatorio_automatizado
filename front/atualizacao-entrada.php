<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inserção de horas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="css/entrada1.css"/>
    
</head>
<body onload="folga(), diaHoje()">
        <?php 
        $conectId = mysqli_connect('localhost','root','','relatorio');
        mysqli_select_db($conectId,"entrada");
        $queryId = mysqli_query($conectId, "SELECT * FROM entrada");
        ?>
    <section>
        <h1>Relatório Diário</h1>
        <h2>dia</h2><h2 id="diaHoje"></h2>
        <!--Inicio formulario-->
        <label>Escolha o dia para modificar: </label>
        <select id="escolhaDia">
            <option selected>Selecione...</option>
            <!--contador while enquanto houver registros ele continua no loopin-->
            <?php while($diaId = mysqli_fetch_array($queryId)) { ?>
                <option form="atualizacao" id="optSelect" value="<?php echo "idDia".$diaId['idDia']."dia".$diaId['dia']."horas".$diaId['horas']."minutos".$diaId['minutos']."revisitas".$diaId['revisitas']."revistas".$diaId['revistas']."livros".$diaId['livros']."broxuras".$diaId['broxuras']."obs".$diaId['observacoes']?>"><?php echo $diaId['dia']?></option>
            <?php } ?>
        </select>
            <input type="text" id="id" name="idDia" form="atualizacao"/>
            <input type="text" id="dia" name="dia" form="atualizacao"/>
            <br/>
            <label for="horas">Suas horas total do dia: </label>
            <input type="number" id="hora" name="horas" form="atualizacao" min="0" value="0" onblur="" required/>
            <br/>
            <label for="minutos">Seus minutos avulsos do dia: </label>
            <input type="number" id="minuto" name="minutos" min="0" form="atualizacao" value="0"/>
            <br/>
            <div id="msg">Aviso! 0 horas e 0 minutos no mesmo registro significa dia de folga</div>
            <label for="revisitas">Total de revisitas do dia: </label>
            <input type="number" id="revisita" name="revisitas" form="atualizacao" value="0"/>
            <br/>
            <label for="revistas">Total de revistas: </label>
            <input type="number" id="revista" name="revistas" form="atualizacao" value="0"/>
            <br/>
            <label for="livros">Total de livros: </label>
            <input type="number" id="livro" name="livros" form="atualizacao" value="0"/>
            <br/>
            <label for="broxuras">Total de broxuras: </label>
            <input type="number" id="broxura" name="broxuras" form="atualizacao" value="0"/>
            <br/>
            <label for="observacoes">Observações do dia: </label>
            <textarea id="observacao" name="observacoes" placeholder="Opcional" value="" form="atualizacao"></textarea>
            <br/>
            <form id="atualizacao" method="GET" action="../back/controle/atualiza-entrada.php">
                <input type="submit" id="envia" value="Enviar!"/>
            </form>
        <!--Final formulario-->
    </section>
    <div id="msg-sucesso">Atualizado com sucesso!</div>
</body>
<script src="../back/model/funcoes-atualizacao-entrada1.js"></script>
</html>